<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Athlete extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('athlete.index')->with('athletetList', \App\Athlete::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $athlete = new \App\Athlete();
        $id = $request->input('id');
        $athlete->id = $id;
        
        #echo $athlete->pivot->sport_id;
        
        if($athlete->save()){
            $array['athlete_id'] = $id;
            $array['sport_id'] = $request->input('sport');
            $array['status'] = $request->input('status');
            #$athlete->pivot->athlete_id = $id;
            #$sport = \App\Sport::find($request->input('sport'));
            #$athlete->pivot->sport_id = 12;
            #$athlete->pivot->status = $request->input('status');
            #echo $athlete->pivot->status;
            \App\AthleteSport::insert($array);
            return \App\Athlete::all();
        } else {
            return "Não salvou.";
        }
        #return view('athlete.index');
        #return "teste";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
