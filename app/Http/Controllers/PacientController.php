<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Flash;

class PacientController extends Controller
{
    
    public function getPacientName($pacient_id){
        $pacient = DB::table('pacients')
                        ->join('users', 'users.id', '=', 'pacients.user_id')
                        ->select('users.name')
                        ->where('pacients.id', '=', $pacient_id)
                        ->get(); 
        $pacient = array_get($pacient, '0');

        return $pacient->name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->all();
        $status = \App\Status::all();
        $deficiencies = \App\Deficiency::all();
        $therapies = \App\Therapy::all();

        $users = DB::table('users as u')
                    ->distinct()
                    ->join('pacients as p', 'u.id', '=', 'p.user_id')
                    ->leftJoin('pacient_therapies as pt', 'pt.pacient_id', '=', 'p.id')
                    ->join('status as s', 's.id', '=', 'p.status_id')
                    ->join('deficiencies as d', 'd.id', '=', 'u.deficiency_id')
                    ->select(
                        array(
                                  'u.id as user_id', 
                                  'u.name', 
                                  'p.id as pacient_id', 
                                  'p.status_id',
                                  'u.deficiency_id',
                                  's.name as status_name',
                                  'd.name as deficiency_name',
                                  'p.deleted_at',
                                  'p.updated_at',
                                  DB::raw('count(pt.therapy_id) as therapies')
                              )
                            )
                    ->where(function ($query) use($request){
                        
                        if (isset($request['id']) && $request['id'] != '') {
                            $query->where('u.id', 'LIKE', $request['id']);
                        }

                        if (isset($request['name']) && $request['name'] != '') {
                            $query->where('u.name', 'LIKE', '%'.$request['name'] .'%');
                        }

                        if (isset($request['therapy_id']) && $request['therapy_id'] != ''){
                            $query->where('pt.therapy_id', $request['therapy_id']);
                        }

                        if (isset($request['status_id']) && $request['status_id'] != '') {
                            $query->where('p.status_id', $request['status_id']);
                        }

                        if (isset($request['deficiency_id']) && $request['deficiency_id'] != '') {
                            $query->where('u.deficiency_id', $request['deficiency_id']);
                        }


                    })
                    
                    ->orderBy('u.id')
                    ->groupBy('u.id')
                    ->paginate(10);

        return view('pacient.index', compact('users', 'status', 'deficiencies', 'therapies', 'query'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userCon = new UserController();
        $users = $userCon->getCommonUsers($request, 'pacients');
        return view('pacient.create', compact('users'));        
    }

    public function createModal($id){
        $user = \App\User::findorFail($id);
        $status = \App\Status::lists('name', 'id')->toArray();
        $therapies = \App\Therapy::lists('name', 'id')->toArray();
        return view('pacient.createModal', compact('user', 'therapies', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Pacient::insert($data);
        Flash::success('Cadastrado com sucesso.');
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
        $pacient = \App\Pacient::withTrashed()->find($id);
        return view('pacient.show', compact('pacient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacient = \App\Pacient::withTrashed()->find($id);
        $status = \App\Status::all();
        $therapies = \App\Therapy::lists('name', 'id')->toArray();
        return view('pacient.edit', compact('pacient', 'status', 'therapies'));
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
        $pacientName = $this->getPacientName($id);
        
        $num = \App\PacientTherapy::where('pacient_id', $id)->count();
        if($num == 0){
            Flash::error('O paciente ' . $pacientName . ' deve ter ao menos uma terapia cadastrada para ter seu status alterado novamente.');
            return redirect('pacient');
        }

        $pacient = \App\Pacient::withTrashed()->find($id);
        if($request->status_id != 2 and $pacient->status_id == 2){
            \App\Pacient::withTrashed()->where('id', $id)->update(['status_id' => $request->input('status_id'), 'deleted_at' => null]);
        } else {
            \App\Pacient::where('id', $id)->update(['status_id' => $request->input('status_id')]);
        }

        Flash::success("Status do " . $pacientName . " alterado com sucesso.");
        return redirect('pacient');
    }

    public function delete($id) {
        $pacient = \App\Pacient::find($id);
        return view('pacient.delete', compact('pacient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacient = \App\Pacient::find($id);

        if($pacient->delete()) { // If softdeleted
            DB::table('pacients')->where('id', $pacient->id)
              ->update(['status_id' => 2]);
        }

        $pacientName = $this->getPacientName($pacient->id);
        
        Flash::success($pacientName . " agora é um(a) paciente inativo(a).");
        return redirect('pacient');
    }
}
