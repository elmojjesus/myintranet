<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }

    public function user() {

        $totalUsers = \App\User::all()->count();
        $usersBySex = [
            'M' => \App\User::where('sex', 'M')->count(),
            'F' => \App\User::where('sex', 'F')->count()
        ];
        $usersByStatus = [];
        $amountUsersStatus = 0;
        foreach (\App\Status::all() as $status) {
            $amount = \App\User::where('status_id', $status->id)->count();
            $amountUsersStatus += $amount;
            $usersByStatus[] = [
                'name' => $status->name,
                'y' => $amount
            ];
        }
        $usersByRegional = [];
        $amountUsersRegional = 0;
        $regionais = \App\Address::groupBy('regional')->get();
        foreach ($regionais as $regional) {
            $amount = \App\Address::where('regional', $regional->regional)->count();
            $amountUsersRegional += $amount;
            $usersByRegional[] = [
                'name' => $regional->regional,
                'y' => $amount
            ];
        }
        $voluntaryUsers = \App\User::where('voluntary', true)->count();

        $usersByDeficiency = [];
        $amountUsersDeficiency = 0;
        $deficiencies = \App\Deficiency::all();
        foreach ($deficiencies as $deficiency) {
            $amount = \App\User::where('deficiency_id', $deficiency->id)->count();
            $amountUsersDeficiency += $amount;
            $usersByDeficiency[] = [
                'name' => $deficiency->name,
                'y' => $amount
            ];
        }

        $usersByProfession = [];
        $amountUsersProfession = 0;
        $professions = \App\Profession::all();
        foreach ($professions as $profession) {
            $amount = \App\User::where('profession_id', $profession->id)->count();
            $amountUsersProfession += $amount;
            $usersByProfession[] = [
                'name' => $profession->name,
                'y' => $amount
            ];
        }
        return view('reports.user', compact(
                'totalUsers',
                'usersBySex',
                'voluntaryUsers',
                'usersByStatus',
                'amountUsersStatus',
                'usersByRegional',
                'amountUsersRegional',
                'usersByDeficiency',
                'amountUsersDeficiency',
                'usersByProfession',
                'amountUsersProfession'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
