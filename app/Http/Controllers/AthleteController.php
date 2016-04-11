<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userCon = new UserController();
        $users = $userCon->getCommonUsers($request);
        return view('athlete.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        /*
        $sports = \App\Sport::all();
        $users = \App\User::all();
        return view('athlete.create', compact('sports', 'users'));
        */
        $user = \App\User::findorFail($id);
        $sports = \App\Sport::all();
        return view('athlete.create', compact('user', 'sports'));
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
