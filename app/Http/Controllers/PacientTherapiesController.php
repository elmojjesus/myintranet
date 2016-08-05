<?php

namespace MyIntranet\Http\Controllers;

use Illuminate\Http\Request;

use MyIntranet\Http\Requests;
use MyIntranet\Http\Controllers\Controller;
use Flash;

class PacientTherapiesController extends Controller
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
        $pacient = \MyIntranet\Pacient::findorFail($id);
        $therapies = \MyIntranet\Therapy::lists('name', 'id')->toArray();
        return view('pacientTherapies.create', compact('pacient', 'therapies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($therapies, $pacient_id)
    {
        foreach ($therapies as $input) {
            $input = array_unique($input);
            foreach ($input as $therapy_id) {
                if($therapy_id != ''){
                    \MyIntranet\PacientTherapy::insert(['pacient_id' => $pacient_id, 'therapy_id' => $therapy_id]);
                }
            }
        }

        #Falta flash message
        return redirect('pacient');
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
    public function update(Request $request, $pacient_id)
    {
        #Pega os inputs, somente terapias
        $therapies = $request->only('therapies');
     

        #Verifica se terapias requisitadas, já estão atribuidas ao paciente.
        $pacientTherapies = \MyIntranet\PacientTherapy::where('pacient_id', $pacient_id)
                        ->select('therapy_id')->get()->toArray();

        foreach ($therapies as $input) {
            foreach ($input as $therapy_id) {
                foreach ($pacientTherapies as $aS) {
                    if($aS['therapy_id'] == $therapy_id){
                        Flash::error("Você tentou inserir terapias já atribuidas ao paciente.");
                        return redirect('pacient');
                    }
                }
            }
        }

        
        $num = \MyIntranet\PacientTherapy::where('pacient_id', $pacient_id)->count();
        if($num == 0){
            $pacient = \MyIntranet\Pacient::where('id', $pacient_id)->first();
            if($pacient->status['name'] == "Inativo"){
                $pacient->status_id = 1;
                $pacient->save();
            }
        }

        #Aqui ele insere as novas terapias
        foreach ($therapies as $input) {
            $input = array_unique($input);
            foreach ($input as $therapy_id) {
                if($therapy_id != ''){
                    \MyIntranet\PacientTherapy::insert(['pacient_id' => $pacient_id, 'therapy_id' => $therapy_id]);
                }
            }
        }

        $pacient = new PacientController();
        $pacientName = $pacient->getPacientName($pacient_id);

        Flash::success("Terapias adicionadas para " . $pacientName . ".");
        return redirect('pacient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $pacient_id)
    {
        
        $checked = $request->only('therapies');
        foreach ($checked as $checkedBox) {
            foreach ($checkedBox as $therapy_id) {
                $therapiesIds[] = $therapy_id;
                \MyIntranet\PacientTherapy::where('pacient_id', $pacient_id)
                                    ->where('therapy_id', $therapy_id)
                                    ->forceDelete();
            }
            
        }

        $pacient = new PacientController();
        $pacientName = $pacient->getPacientName($pacient_id);

       
        $num = \MyIntranet\PacientTherapy::where('pacient_id', $pacient_id)->count();

        if($num == 0){
            \MyIntranet\Pacient::where('id', $pacient_id)->update(['status_id' => 2]);
            Flash::warning($pacientName . " não faz mais terapias, logo, seu status agora é inativo.");
            Flash::success($pacientName . " teve terapias excluídas.");
            return redirect('pacient');
        } else {
            Flash::success("O/a " . $pacientName . " teve terapias excluídas.");
            return redirect('pacient');
        }
    }
}
