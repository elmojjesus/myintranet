<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Flash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = \App\Employee::all();
        return view('employee.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /* Old method
    public function create()
    {
        $users = \App\User::orderBy('name')->get();
        $departaments = \App\Departament::orderBy('name')->get();
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
        $user = \App\User::findorFail($id);
        $departaments = \App\Departament::lists('name', 'id')->toArray();
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
        $var = \App\Employee::insert($data);
        #dd($var);
        Flash::success('Salvo com sucesso.');
        return redirect('employee');
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
        $employee = \App\Employee::find($id);
        $users = \App\User::orderBy('name')->get();
        $departaments = \App\Departament::orderBy('name')->get();
        return view('employee.edit', compact('employee', 'users', 'departaments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Employee::where('id', $id)->update($data);
        Flash::success('Alterações realizadas com sucesso.');
        return redirect('employee');
    }

    public function delete($id) {
        $employee = \App\Employee::find($id);
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
        \App\Employee::where('id', $id)->delete();
        Flash::success('Funcionário deletado com sucesso.');
        return redirect('employee');
    }
}
