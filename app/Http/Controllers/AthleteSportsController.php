<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Flash;
use Carbon\Carbon;

class AthleteSportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $athlete = \App\Athlete::findorFail($id);
        $sports = \App\Sport::lists('name', 'id')->toArray();
        return view('athleteSports.create', compact('athlete', 'sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($sports, $athlete_id)
    {
        foreach ($sports as $input) {
            $input = array_unique($input);
            foreach ($input as $sport_id) {
                if($sport_id != ''){
                    \App\AthleteSport::insert(['athlete_id' => $athlete_id, 'sport_id' => $sport_id]);
                }
            }
        }

        #Falta flash message
        return redirect('athlete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $athlete_id)
    {
        $now = Carbon::now();
        
        #Pega os inputs, somente esportes
        $sports = $request->only('sports');
     

        #Verifica se esportes requisitados, já estão atribuidos ao atleta.
        $athleteSports = \App\AthleteSport::where('athlete_id', $athlete_id)
                        ->select('sport_id')->get()->toArray();

        foreach ($sports as $input) {
            foreach ($input as $sport_id) {
                foreach ($athleteSports as $aS) {
                    if($aS['sport_id'] == $sport_id){
                        #echo "Do input: " . $sport_id . "Do atleta: " . $aS['sport_id'] . "<br>";
                        Flash::error("Você tentou inserir esportes já atribuidos ao atleta.");
                        return redirect('athlete');
                    }
                }
            }
        }

        #Se atleta estiver sem esporte e status inativo, ele muda pra ativo, e insere os novos esportes
        $num = \App\AthleteSport::where('athlete_id', $athlete_id)->count();
        if($num == 0){
            $athlete = \App\Athlete::withTrashed()->where('id', $athlete_id)->first();
            if($athlete->deleted_at != null){
                $athlete->status_id = 1;
                $athlete->deleted_at = null;
                $athlete->save();
            }
        }

        #Aqui ele insere os novos esportes
        foreach ($sports as $input) {
            $input = array_unique($input);
            foreach ($input as $sport_id) {
                if($sport_id != ''){
                    \App\AthleteSport::insert(['athlete_id' => $athlete_id, 'sport_id' => $sport_id, 'created_at' => $now]);
                }
            }
        }

        \App\Athlete::withTrashed()->where('id', $athlete_id)->update(['updated_at' => $now]);
        
        $athlete = new AthleteController();
        $athleteName = $athlete->getAthleteName($athlete_id);

        Flash::success("Esportes adicionados para " . $athleteName . ".");
        return redirect('athlete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $athlete_id)
    {
        $now = Carbon::now();
        
        #seleciona somente os esportes marcados e percorre o array, deletando um por um
        $checked = $request->only('sports');
        foreach ($checked as $checkedBox) {
            foreach ($checkedBox as $sport_id) {
                $sportsIds[] = $sport_id;
                \App\AthleteSport::where('athlete_id', $athlete_id)
                                    ->where('sport_id', $sport_id)
                                    ->forceDelete();
            }
            
        }

        $athlete = new AthleteController();
        $athleteName = $athlete->getAthleteName($athlete_id);

        #Se deletar todos os esportes, usuário fica inativo
        $num = \App\AthleteSport::where('athlete_id', $athlete_id)->count();

        if($num == 0){
            #Atleta recebe status de inativo
            \App\Athlete::where('id', $athlete_id)->update(['status_id' => 2]);
            #Atleta recebe deleted at
            \App\Athlete::destroy($athlete_id);
            Flash::warning($athleteName . " não faz mais esportes, logo, seu status agora é inativo.");
            Flash::success($athleteName . " teve esportes excluídos.");
            return redirect('athlete');
        } else {
            \App\Athlete::withTrashed()->where('id', $athlete_id)->update(['updated_at' => $now]);
            Flash::success("O/a " . $athleteName . " teve esportes excluídos.");
            return redirect('athlete');
        }
        
    }
}
