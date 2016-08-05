<?php

namespace MyIntranet\Http\Controllers;

use Illuminate\Http\Request;

use MyIntranet\Http\Requests;
use MyIntranet\Http\Controllers\Controller;
use Flash;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUsers = \MyIntranet\User::all()->count();
        $usersBySex = [
            'M' => \MyIntranet\User::where('sex', 'M')->count(),
            'F' => \MyIntranet\User::where('sex', 'F')->count()
        ];
        $totalAthletes = \MyIntranet\Athlete::all()->count();
        $athletesBySex = [
            'M' => \MyIntranet\Athlete::scopeSex('M')->count(),
            'F' => \MyIntranet\Athlete::scopeSex('F')->count()
        ];
        $totalPacients = \MyIntranet\Pacient::all()->count();
        $pacientsBySex = [
            'M' => \MyIntranet\Pacient::ScopeSex('M')->count(),
            'F' => \MyIntranet\Pacient::ScopeSex('F')->count()
        ];

        return view('reports.index', compact(
            'totalUsers',
            'usersBySex',
            'totalAthletes',
            'athletesBySex',
            'totalPacients',
            'pacientsBySex'
        ));
    }

    public function user(Request $request) {

        $totalUsers = \MyIntranet\User::all()->count();
        $usersBySex = [
            'M' => \MyIntranet\User::where('sex', 'M')->count(),
            'F' => \MyIntranet\User::where('sex', 'F')->count()
        ];
        $usersByStatus = [];
        $amountUsersStatus = 0;
        foreach (\MyIntranet\Status::all() as $status) {
            $amount = \MyIntranet\User::where('status_id', $status->id)->count();
            $amountUsersStatus += $amount;
            $usersByStatus[] = [
                'name' => $status->name,
                'y' => $amount
            ];
        }
        $usersByRegional = [];
        $amountUsersRegional = 0;
        $regionais = \MyIntranet\Address::groupBy('regional')->get();
        foreach ($regionais as $regional) {
            $amount = \MyIntranet\Address::where('regional', $regional->regional)->count();
            $amountUsersRegional += $amount;
            $usersByRegional[] = [
                'name' => $regional->regional,
                'y' => $amount
            ];
        }
        $voluntaryUsers = \MyIntranet\User::where('voluntary', true)->count();

        $usersByDeficiency = [];
        $amountUsersDeficiency = 0;
        $deficiencies = \MyIntranet\Deficiency::all();
        foreach ($deficiencies as $deficiency) {
            $amount = \MyIntranet\User::where('deficiency_id', $deficiency->id)->count();
            $amountUsersDeficiency += $amount;
            $usersByDeficiency[] = [
                'name' => $deficiency->name,
                'y' => $amount
            ];
        }

        $usersByProfession = [];
        $amountUsersProfession = 0;
        $professions = \MyIntranet\Profession::all();
        foreach ($professions as $profession) {
            $amount = \MyIntranet\User::where('profession_id', $profession->id)->count();
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

    public function athletes() {
        $totalAthletes = \MyIntranet\Athlete::all()->count();
        $athletesBySex = [
            'M' => \MyIntranet\Athlete::scopeSex('M')->count(),
            'F' => \MyIntranet\Athlete::scopeSex('F')->count()
        ];
        $usersBySport = [];
        $amountUsersSport = 0;
        foreach(\MyIntranet\Sport::all() as $sport) {
            $amount = \MyIntranet\AthleteSport::where('sport_id', $sport->id)->count();
            $amountUsersSport += $amount;
            $usersBySport[] = [
                'name' => $sport->name,
                'y' => $amount
            ];
        }

        $amountAthletesStatus = 0;
        $athletesByStatus = [];
        foreach (\MyIntranet\Status::all() as $status) {
            $amount = \MyIntranet\Athlete::where('status_id', $status->id)->count();
            $amountAthletesStatus += $amount;
            $athletesByStatus[] = [
                'name' => $status->name,
                'y' => $amount
            ];
        }

        $athletesByRegional = [];
        $amountAthletesRegional = 0;
        foreach (\MyIntranet\Regional::all() as $regional) {
            $amount = $regional->athletes($regional->id)->count();
            $amountAthletesRegional += $amount;
            $athletesByRegional[] = [
                'name' => $regional->name,
                'y' => $amount
            ];
        }

        $athletesByDeficiency = [];
        $amountAthletesDeficiency = 0;
        foreach(\MyIntranet\Deficiency::all() as $deficiency) {
            $amount = $deficiency->athletes($deficiency->id)->count();
            $amountAthletesDeficiency += $amount;
            $athletesByDeficiency[] = [
                'name' => $deficiency->name,
                'y' => $amount
            ];
        }

        return view('reports.athlete', compact(
            'totalAthletes',
            'athletesBySex',
            'usersBySport', 
            'amountUsersSport',
            'amountAthletesStatus',
            'athletesByStatus',
            'athletesByRegional',
            'amountAthletesRegional',
            'athletesByDeficiency',
            'amountAthletesDeficiency'
        ));
    }

    public function pacients() {
        $totalPacients = \MyIntranet\Pacient::all()->count();
        $pacientsBySex = [
            'M' => \MyIntranet\Pacient::ScopeSex('M')->count(),
            'F' => \MyIntranet\Pacient::ScopeSex('F')->count()
        ];
        $pacientsByTerapies = [];
        $amountPacientsTerapies = 0;
        foreach(\MyIntranet\Therapy::all() as $therapy) {
            $amount = \MyIntranet\PacientTherapy::where('therapy_id', $therapy->id)->count();
            $amountPacientsTerapies += $amount;
            $pacientsByTerapies[] = [
                'name' => $therapy->name,
                'y' => $amount
            ];
        }
        $pacientsByStatus = [];
        $amountPacientsStatus = 0;
        foreach (\MyIntranet\Status::all() as $status) {
            $amount = \MyIntranet\Pacient::where('status_id', $status->id)->count();
            $amountPacientsStatus += $amount;
            $pacientsByStatus[] = [
                'name' => $status->name,
                'y' => $amount
            ];
        }

        return view('reports.pacients', compact(
            'totalPacients',
            'pacientsBySex',
            'pacientsByTerapies',
            'amountPacientsTerapies',
            'pacientsByStatus',
            'amountPacientsStatus'
        ));
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
