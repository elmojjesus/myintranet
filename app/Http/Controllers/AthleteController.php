<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Flash;


class AthleteController extends Controller
{


    public function getAthleteName($athlete_id){
        $athlete = DB::table('athletes')
                        ->join('users', 'users.id', '=', 'athletes.user_id')
                        ->select('users.name')
                        ->where('athletes.id', '=', $athlete_id)
                        ->get(); 
        $athlete = array_get($athlete, '0');

        return $athlete->name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #DB::connection()->enableQueryLog();
        $query = $request->all();
        $status = \App\Status::all();
        $deficiencies = \App\Deficiency::all();
        $sports = \App\Sport::all();
        
        //$athlete = \App\Athlete::find(1);
        // Quantidade de esportes só chamar isso aqui-> $athlete->scopeAmountSports();
        /*
        $users = \App\User::with('athlete')
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
                            $query->where('athletes.status_id', $request['status_id']);
                        }

                        if (isset($request['deficiency_id']) && $request['deficiency_id'] != '') {
                            $query->where('deficiency_id', $request['deficiency_id']);
                        }

                        #$query->addSelect('athlete_sports.status_id as qtd');

                    })
                    
                    #->addSelect('athlete_sports.status_id as qtd')

                    #->where()->count()->as
                    #--->whereNotNull('athletes.deleted_at')
                    
                    ->orderBy('users.id')
                    ->groupBy('users.id')
                    ->paginate(10);
                    #->get();
                    #dd($users);
                    
*/

        #$users = \App\Athlete::join("users", "users.id", "=", "athletes.user_id");
        #$users = \App\User::has('athlete')->withTrashed()->get();
        
        #esse deu bão
        #$users = \App\Athlete::withTrashed()
        #                       ->with('user')
                               #->orderBy('users.id')
        #                       ->get();
        
        

        #$athletes = \App\Athlete::with('user')
        #                        #->select('users.*')
        #                        ->withTrashed()->get();

        
        /*
        $athletes = \App\Athlete::all();

        $users = $athletes->load(['user' => function ($query) {
            $query->select('users.*')
                  ->join('users', 'users.id', '=', 'athletes.user_id')
            ->orderBy('users.id');
        }]);
        */
        #foreach ($athletes as $athlete) {
        #    print_r($athlete->user);
        #}


        $users = DB::table('users as u')
                    ->distinct()
                    ->join('athletes as a', 'u.id', '=', 'a.user_id')
                    ->join('athlete_sports as ats', 'ats.athlete_id', '=', 'a.id')
                    ->join('status as s', 's.id', '=', 'a.status_id')
                    ->join('deficiencies as d', 'd.id', '=', 'u.deficiency_id')
                    ->select(
                        array(
                                  'u.id as user_id', 
                                  'u.name', 
                                  'a.id as athlete_id', 
                                  'a.status_id',
                                  'u.deficiency_id',
                                  's.name as status_name',
                                  'd.name as deficiency_name',
                                  'a.deleted_at',
                                  DB::raw('count(ats.sport_id) as sports')
                              )
                            )
                    ->where(function ($query) use($request){
                        
                        if (isset($request['id']) && $request['id'] != '') {
                            $query->where('u.id', 'LIKE', $request['id']);
                        }

                        if (isset($request['name']) && $request['name'] != '') {
                            $query->where('u.name', 'LIKE', '%'.$request['name'] .'%');
                        }

                        if (isset($request['sport_id']) && $request['sport_id'] != ''){
                            $query->where('ats.sport_id', $request['sport_id']);
                        }

                        #caso o status seja alterado para setor, devo mudar o where para status.id
                        # e adicionar um join da tabela status
                        if (isset($request['status_id']) && $request['status_id'] != '') {
                            $query->where('a.status_id', $request['status_id']);
                        }

                        if (isset($request['deficiency_id']) && $request['deficiency_id'] != '') {
                            $query->where('u.deficiency_id', $request['deficiency_id']);
                        }


                    })
                    ->orderBy('u.id')
                    ->groupBy('u.id')
                    ->paginate(10);
                    #->get();
        #dd($users);
        #dd(DB::getQueryLog());        
        
        #$users = DB::select('select * from users where status_id = ?', [1]);


        #dd(DB::getQueryLog());


        return view('athlete.index', compact('users', 'status', 'deficiencies', 'sports', 'query'));

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
        $user = \App\User::findorFail($id);
        $status = \App\Status::lists('name', 'id')->toArray();
        $sports = \App\Sport::lists('name', 'id')->toArray();
        return view('athlete.createModal', compact('user', 'sports', 'status'));
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
        
        $athlete = \App\Athlete::where('user_id', $id)->first();
        if (is_null($athlete)) {
            \App\Athlete::insert(['user_id' => $id, 'status_id' => $data['status_id']]);
            $athlete = \App\Athlete::where('user_id', $id)->first();
        }
        
        $sports = $request->only('sports');
        $athleteSport = new AthleteSportsController();
        $athleteSport->store($sports, $athlete->id);

        $athleteName = $this->getAthleteName($athlete->id);
        
        Flash::success($athleteName . " agora é um(a) atleta.");
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
        $athlete = \App\Athlete::withTrashed()->find($id);
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
        $athlete = \App\Athlete::withTrashed()->find($id);
        $status = \App\Status::all();
        $sports = \App\Sport::lists('name', 'id')->toArray();
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
        $athleteName = $this->getAthleteName($id);
        
        $num = \App\AthleteSport::where('athlete_id', $id)->count();
        if($num == 0){
            Flash::error('O atleta ' . $athleteName . ' deve ter ao menos um esporte cadastrado para ter seu status alterado novamente.');
            return redirect('athlete');
        }

        Flash::success("Status do " . $athleteName . " alterado com sucesso.");
        \App\Athlete::where('id', $id)->update(['status_id' => $request->input('status_id')]);
        return redirect('athlete');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $athlete = \App\Athlete::find($id);
        return view('athlete.delete', compact('athlete'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $athlete = \App\Athlete::find($id);

        if($athlete->delete()) { // If softdeleted
            DB::table('athletes')->where('id', $athlete->id)
              ->update(['status_id' => 2]);
              #array('deleted_by' => 'SomeNameOrUserID')
        }

        $athleteName = $this->getAthleteName($athlete->id);
        
        Flash::success($athleteName . " agora é um(a) atleta inativo.");
        return redirect('athlete');
    }
    
}
