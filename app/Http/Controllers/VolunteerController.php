<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;
use Flash;

class VolunteerController extends Controller
{
    public function getVolunteerName($volunteer_id){
        $volunteer = DB::table('volunteers')
                        ->join('users', 'users.id', '=', 'volunteers.user_id')
                        ->select('users.name')
                        ->where('volunteers.id', '=', $volunteer_id)
                        ->get(); 
        $volunteer = array_get($volunteer, '0');

        return $volunteer->name;
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
        $departaments = \App\Departament::all();

        $volunteers = DB::table('users as u')
            ->distinct()
            ->join('volunteers as v', 'u.id', '=', 'v.user_id')
            ->leftJoin('documents as doc', 'u.id', '=', 'doc.user_id')
            ->join('status as s', 's.id', '=', 'v.status_id')
            ->join('departaments as d', 'd.id', '=', 'v.departament_id')
            ->select(
                        array(
                                  'u.id as user_id', 
                                  'u.name',
                                  'doc.cpf as cpf', 
                                  'v.id as volunteer_id', 
                                  'v.status_id',
                                  'v.departament_id',
                                  's.name as status_name',
                                  'd.name as departament_name',
                                  'v.deleted_at',
                                  'v.updated_at'
                              )
                            )
            ->where(function ($query) use($request){
                        
                        if (isset($request['id']) && $request['id'] != '') {
                            $query->where('u.id', 'LIKE', $request['id']);
                        }

                        if (isset($request['cpf']) && $request['cpf'] != '') {
                            $query->where('doc.cpf', 'LIKE', $request['cpf']);
                        }

                        if (isset($request['name']) && $request['name'] != '') {
                            $query->where('u.name', 'LIKE', '%'.$request['name'] .'%');
                        }

                        if (isset($request['status_id']) && $request['status_id'] != '') {
                            $query->where('v.status_id', $request['status_id']);
                        }

                        if (isset($request['departament_id']) && $request['departament_id'] != '') {
                            $query->where('v.departament_id', $request['departament_id']);
                        }


                    })
                    ->orderBy('u.id')
                    ->groupBy('u.id')
                    ->paginate(10);

        return view('volunteer.index', compact('volunteers', 'status', 'departaments', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userCon = new UserController();
        #Parametro 3 - False - trás usuários com e sem deficiência.
        $users = $userCon->getCommonUsers($request, 'volunteers', false);
        return view('volunteer.create', compact('users'));        
    }

    public function createModal($id){
        $user = \App\User::findorFail($id);
        $departaments = \App\Departament::lists('name', 'id')->toArray();
        return view('volunteer.createModal', compact('user', 'departaments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        #Insere voluntário
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = $id;
        $data['created_at'] = Carbon::now();
        
        #Inativa todos os outros atendimentos, se não estiver sendo cadastrado como inativo
        if($request['status_id'] != 2){
            $now = Carbon::now();
            \App\User::where('id', $id)->update(['status_id' => '2', 'deleted_at' => $now]);
            \App\Athlete::where('user_id', $id)->update(['status_id' => '2', 'deleted_at' => $now]);
            \App\Employee::where('user_id', $id)->update(['status_id' => '2', 'deleted_at' => $now]);
            \App\Pacient::where('user_id', $id)->update(['status_id' => '2', 'deleted_at' => $now]);   
        } else { #Se voluntário já estiver sendo inserido como inativo, apenas recebe deleted_at
            $data['deleted_at'] = Carbon::now();
        }
        
        \App\Volunteer::insert($data);
        
        Flash::success('Voluntário cadastrado com sucesso.');
        return redirect('volunteer/create');
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
        $volunteer = \App\Volunteer::withTrashed()->find($id);
        $status = \App\Status::all();
        $departaments = \App\Departament::orderBy('name')->get();
        return view('volunteer.edit', compact('volunteer', 'users', 'departaments', 'status'));
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
        $data = $request->all();
        unset($data['_token']);

        $volunteer = \App\Volunteer::withTrashed()->find($id);
        #Se ele estiver inativo, mas receber outro status, deleted recebe nulo e será inativado em usuário
        if($request->status_id != 2 and $volunteer->status_id == 2){
            $userController = new UserController();
            $userController->destroy($volunteer->user_id);
            $data["deleted_at"] = null;
        } elseif($request->status_id == 2){
            $this->destroy($volunteer->id);
        }
        
        \App\Volunteer::withTrashed()->where('id', $id)->update($data);
        $volunteerName = $this->getVolunteerName($id);

        Flash::success( $volunteerName . ' teve informações atualizadas.');
        return redirect('volunteer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $volunteer = \App\Volunteer::find($id);
        return view('volunteer.delete', compact('volunteer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volunteer = \App\Volunteer::find($id);

        if($volunteer->delete()) { // If softdeleted
            DB::table('volunteers')->where('id', $volunteer->id)
              ->update(['status_id' => 2]);
              #array('deleted_by' => 'SomeNameOrUserID')
        }

        $volunteerName = $this->getVolunteerName($id);

        Flash::success($volunteerName . ' agora é um voluntário inativo.');
        return redirect('volunteer');
    }
}
