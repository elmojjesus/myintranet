<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

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
    public function store(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        $athlete = \App\Athlete::where('id', $id)->first();
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
    public function destroy(Request $request, $athlete_id)
    {
        #$sport = \App\AthleteSport::where('athlete_id', $athlete_id)
        #                            ->where('sport_id', $sport_id);
        #$sport->delete();
        
        #return redirect('athlete');
        $checked = $request->only('sports');
        #$sportsIds = [];
        foreach ($checked as $checkedBox) {
            foreach ($checkedBox as $sport_id) {
                $sportsIds[] = $sport_id;
                \App\AthleteSport::where('athlete_id', $athlete_id)
                                    ->where('sport_id', $sport_id)
                                    ->delete();
            }
            
        }

        $num = \App\AthleteSport::where('athlete_id', $athlete_id)->count();

        if($num == 0){
            \App\Athlete::where('id', $athlete_id)->update(['status_id' => 2]);
        }
        #Falta flash message
        return redirect('athlete');
    }
}
