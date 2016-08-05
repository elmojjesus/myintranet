<?php

namespace MyIntranet\Http\Controllers;

use Illuminate\Http\Request;

use MyIntranet\Http\Requests;
use MyIntranet\Http\Controllers\Controller;
use MyIntranet\Http\Requests\DepartamentRequest;
use Flash;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departaments = \MyIntranet\Departament::all();
        return view('departament.index', compact('departaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \MyIntranet\User::orderBy('name')->get();
        return view('departament.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DepartamentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        \MyIntranet\Departament::insert($data);
        Flash::success('Departamento cadastrado com sucesso.');
        return redirect('departament');
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
        $departament = \MyIntranet\Departament::find($id);
        $users = \MyIntranet\User::orderBy('name')->get();
        return view('departament.edit', compact('departament', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DepartamentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        \MyIntranet\Departament::where('id', $id)->update($data);
        Flash::success('Departamento editado com sucesso.');
        return redirect('departament');
    }

    public function delete($id) {
        $departament = \MyIntranet\Departament::find($id);
        return view('departament.delete', compact('departament'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \MyIntranet\Departament::where('id', $id)->delete($id);
        Flash::success('Departamento excluído com sucesso.');
        return redirect('departament');
    }
}
