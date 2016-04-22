<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        #$athletes = DB::table('users')
        #            ->join('athletes', 'users.id', '=', 'athletes.user_id')
        #            ->orderBy('users.name')
        #            ->paginate(10);

        #dd($athletes);
        #$users = DB::table('users')
        #            ->join('athletes', 'users.id', '=', 'athletes.user_id')
        #            ->join('athlete_sports', 'athletes.id', '=', 'athlete_sports.athlete_id')
        #            ->join('sports', 'sports.id', '=', 'athlete_sports.sport_id')
        #            ->orderBy('users.name')
        #           ->paginate(10);

        $status = \App\Status::all();
        $deficiencies = \App\Deficiency::all();
        $sports = \App\Sport::all();

        $users = \App\User::with('athlete')
                    ->whereExists(function ($query) {
                                $query->select(DB::raw(1))
                                        ->from('athletes')
                                        ->whereRaw('athletes.user_id = users.id');
                                #$query->select(DB::raw(1))
                                #        ->from('athlete_sports')
                                #        ->whereRaw('athlete_sports.athlete_id = athlete.id');
                                    }
                                )
                    #->join('athletes', 'athletes.user_id', '=', 'users.id')
                    #->join('athlete_sports', 'athlete_sports.athlete_id', '=', 'athletes.id')
                    ->where(function ($query) use($request){
                        
                        if (isset($request['id']) && $request['id'] != '') {
                            $query->where('id', 'LIKE', $request['id']);
                        }

                        if (isset($request['name']) && $request['name'] != '') {
                            $query->where('name', 'LIKE', '%'.$request['name'] .'%');
                        }

                        if (isset($request['deficiency_id']) && $request['deficiency_id'] != '') {
                            $query->where('deficiency_id', $request['deficiency_id']);
                        }

                        if (isset($request['status_id']) && $request['status_id'] != '') {
                            $query->where('status_id', $request['status_id']);
                        }

                        #if (isset($request['sport_id']) && $request['sport_id'] != ''){
                        #    $query->where('athlete_sports.sport_id', $request['sport_id']);
                        #}
                        
                    })

                    ->paginate(10);
                    #dd($users);
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
        $users = $userCon->getCommonUsers($request);
        return view('athlete.create', compact('users'));        
    }

    public function createModal($id){
        $user = \App\User::findorFail($id);
        $sports = \App\Sport::lists('name', 'id')->toArray();
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
        #$athlete = \App\User::findorFail($id);
        $athlete = \App\Athlete::where('user_id', $id)->first();
        if (is_null($athlete)) {
            \App\Athlete::insert(['user_id' => $id]);
            $athlete = \App\Athlete::where('user_id', $id)->first();
        }
        $data['athlete_id'] = $athlete->id;
        \App\AthleteSport::insert($data);
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
        return "Show";
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function test(){
        $nome = "Elmão";
        return view('test')->with('nome' , $nome);
    }
    
}
