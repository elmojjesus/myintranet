<?php

namespace MyIntranet\Http\Controllers;

use Illuminate\Http\Request;

use MyIntranet\Http\Requests;
use MyIntranet\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AthleteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $status = \MyIntranet\Status::all();
        $deficiencies = \MyIntranet\Deficiency::all();
        $sports = \MyIntranet\Sport::all();
        
        //$athlete = \MyIntranet\Athlete::find(1);
        // Quantidade de esportes só chamar isso aqui-> $athlete->scopeAmountSports();

        $users = \MyIntranet\User::with('athlete')
                    ->select('users.*')
                    #->distinct()
                    ->join('athletes', 'athletes.user_id', '=', 'users.id')
                    ->join('athlete_sports', 'athlete_sports.athlete_id', '=', 'athletes.id')
                    #->join('status', 'status.id', '=', 'athlete_sports.status_id')
                    ->where(function ($query) use($request){
                        
                        if (isset($request['id']) && $request['id'] != '') {
                            $query->where('users.id', 'LIKE', $request['id']);
                        }

                        if (isset($request['name']) && $request['name'] != '') {
                            $query->where('name', 'LIKE', '%'.$request['name'] .'%');
                        }

                        if (isset($request['sport_id']) && $request['sport_id'] != ''){
                            $query->where('athlete_sports.sport_id', $request['sport_id']);
                        }

                        #caso o status seja alterado para setor, devo mudar o where para status.id
                        # e adicionar um join da tabela status
                        if (isset($request['status_id']) && $request['status_id'] != '') {
                            $query->where('athlete_sports.status_id', $request['status_id']);
                        }

                        if (isset($request['deficiency_id']) && $request['deficiency_id'] != '') {
                            $query->where('deficiency_id', $request['deficiency_id']);
                        }

                        #$query->addSelect('athlete_sports.status_id as qtd');

                    })
                    
                    #->addSelect('athlete_sports.status_id as qtd')

                    #->where()->count()->as
                    ->orderBy('users.id')
                    ->groupBy('users.id')
                    ->paginate(10);
            
                    foreach($users as $index => $user){
                        $qtd = 0;
                        $inativos = 0;
                        
                        foreach($user->athlete->AthleteSport as $athleteSport){
                            $qtd++;
                            if($athleteSport->status->id == 2){
                             $inativos++;
                            }
                        }
                        
                        if($inativos == $qtd){
                            #return "não mostra usuario";
                            #dd($users['items']);
                            #unset($users[])

                            $filtered = $users->reject(function ($item){
                                return $item != $user->id;
                            });
                        }
                    }

                    $collection = collect([1, 2, 3, 4]);

                    $filtered = $collection->reject(function ($item) {
                        return $item > 2;
                    });

                    $filtered->all();
                    https://laravel.com/docs/5.1/collectionsx
                    
        return view('athlete.index', compact('users', 'status', 'deficiencies', 'sports'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userCon = new UserController();
        $users = $userCon->getCommonUsers($request, 'athletes');
        return view('athlete.create', compact('users'));        
    }

    public function createModal($id){
        $user = \MyIntranet\User::findorFail($id);
        $sports = \MyIntranet\Sport::lists('name', 'id')->toArray();
        return view('athlete.createModal', compact('user', 'sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        #$athlete = \MyIntranet\User::findorFail($id);
        $athlete = \MyIntranet\Athlete::where('user_id', $id)->first();
        if (is_null($athlete)) {
            \MyIntranet\Athlete::insert(['user_id' => $id]);
            $athlete = \MyIntranet\Athlete::where('user_id', $id)->first();
        }
        $data['athlete_id'] = $athlete->id;
        \MyIntranet\AthleteSport::insert($data);
        return redirect('athlete/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $athlete = \MyIntranet\Athlete::find($id);
        return view('athlete.show', compact('athlete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $athlete = \MyIntranet\Athlete::find($id);
        $status = \MyIntranet\Status::all();
        $sports = \MyIntranet\Sport::all();
        return view('athlete.edit', compact('athlete', 'status', 'sports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \MyIntranet\AthleteSport::where('athlete_id', $id)
                           ->where('sport_id', $request->input('sport_id'))
                           ->update(['status_id' => $request->input('status_id')]);
        return redirect('athlete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
    
}
