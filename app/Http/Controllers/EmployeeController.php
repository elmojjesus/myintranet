<?php

namespace MyIntranet\Http\Controllers;

use Illuminate\Http\Request;

use MyIntranet\Http\Requests;
use MyIntranet\Http\Controllers\Controller;
use MyIntranet\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\DB;
use Flash;

class EmployeeController extends Controller
{

    public function getEmployeeName($employee_id){
        $employee = DB::table('employees')
                        ->join('users', 'users.id', '=', 'employees.user_id')
                        ->select('users.name')
                        ->where('employees.id', '=', $employee_id)
                        ->get(); 
        $employee = array_get($employee, '0');

        return $employee->name;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->all();
        $status = \MyIntranet\Status::all();
        $departaments = \MyIntranet\Departament::all();

        $employees = DB::table('users as u')
            ->distinct()
            ->join('employees as e', 'u.id', '=', 'e.user_id')
            ->join('documents as doc', 'u.id', '=', 'doc.user_id')
            ->join('status as s', 's.id', '=', 'e.status_id')
            ->join('departaments as d', 'd.id', '=', 'e.departament_id')
            ->select(
                        array(
                                  'u.id as user_id', 
                                  'u.name',
                                  'doc.cpf as cpf', 
                                  'e.id as employee_id', 
                                  'e.status_id',
                                  'e.departament_id',
                                  's.name as status_name',
                                  'd.name as departament_name',
                                  'e.deleted_at',
                                  'e.updated_at'
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
                            $query->where('e.status_id', $request['status_id']);
                        }

                        if (isset($request['departament_id']) && $request['departament_id'] != '') {
                            $query->where('e.departament_id', $request['departament_id']);
                        }


                    })
                    ->orderBy('u.id')
                    ->groupBy('u.id')
                    ->paginate(10);

        return view('employee.index', compact('employees', 'status', 'departaments', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /* Old method
    public function create()
    {
        $users = \MyIntranet\User::orderBy('name')->get();
        $departaments = \MyIntranet\Departament::orderBy('name')->get();
        return view('employee.create', compact('users', 'departaments'));
    }
    */

    public function create(Request $request)
    {
        $userCon = new UserController();
        $users = $userCon->getCommonUsers($request, 'employees');
        return view('employee.create', compact('users'));        
    }

    public function createModal($id){
        $user = \MyIntranet\User::findorFail($id);
        $departaments = \MyIntranet\Departament::lists('name', 'id')->toArray();
        return view('employee.createModal', compact('user', 'departaments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = $id;
        #dd($data);
        unset($data['_token']);
        $var = \MyIntranet\Employee::insert($data);
        #dd($var);
        Flash::success('Funcionário cadastrado com sucesso.');
        return redirect('employee/create');
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
        $employee = \MyIntranet\Employee::withTrashed()->find($id);
        $status = \MyIntranet\Status::all();
        $departaments = \MyIntranet\Departament::orderBy('name')->get();
        return view('employee.edit', compact('employee', 'users', 'departaments', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        unset($data['_token']);

        $employee = \MyIntranet\Employee::withTrashed()->find($id);
        if($request->status_id != 2 and $employee->status_id == 2){
            $data["deleted_at"] = null;
        }
        
        \MyIntranet\Employee::withTrashed()->where('id', $id)->update($data);
        $employeeName = $this->getEmployeeName($id);

        Flash::success( $employeeName . ' teve informações atualizadas.');
        return redirect('employee');
    }




    public function delete($id) {
        $employee = \MyIntranet\Employee::find($id);
        return view('employee.delete', compact('employee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = \MyIntranet\Employee::find($id);

        if($employee->delete()) { // If softdeleted
            DB::table('employees')->where('id', $employee->id)
              ->update(['status_id' => 2]);
              #array('deleted_by' => 'SomeNameOrUserID')
        }

        $employeeName = $this->getEmployeeName($id);

        Flash::success($employeeName . ' agora é um funcionário inativo.');
        return redirect('employee');
    }
}
