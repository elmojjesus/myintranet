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
    public function create()
    {
        $users = \App\User::orderBy('name')->get();
        $departaments = \App\Departament::orderBy('name')->get();
        return view('employee.create', compact('users', 'departaments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Employee::insert($data);
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