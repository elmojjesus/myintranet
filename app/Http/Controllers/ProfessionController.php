<?php

namespace MyIntranet\Http\Controllers;

use Illuminate\Http\Request;

use MyIntranet\Http\Requests;
use MyIntranet\Http\Controllers\Controller;
use MyIntranet\Http\Requests\ProfessionRequest;
use Flash;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = \MyIntranet\Profession::all();
        return view('profession.index', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profession.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProfessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        \MyIntranet\Profession::insert($data);
        Flash::success('Profissão cadastrada com sucesso');
        return redirect('profession');

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
        $profession = \MyIntranet\Profession::find($id);
        return view('profession.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        \MyIntranet\Profession::where('id', $id)->update($data);
        Flash::success('Profissão editada com sucesso');
        return redirect('profession');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $profession = \MyIntranet\Profession::find($id);
        return view('profession.delete', compact('profession'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \MyIntranet\Profession::find($id)->delete();
        Flash::success('Profissão excluída com sucesso');
        return redirect('profession');
    }
}
