<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeficiencyRequest;
use Flash;

class DeficiencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deficiencies = \App\Deficiency::all();
        return view('deficiency.index', compact('deficiencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deficiency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DeficiencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeficiencyRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Deficiency::insert($data);
        Flash::success('Deficiência cadastrada com sucesso!');
        return redirect('deficiency');
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
        $deficiency = \App\Deficiency::find($id);
        return view('deficiency.edit', compact('deficiency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DeficiencyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeficiencyRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Deficiency::where('id', $id)->update($data);
        Flash::success('Deficiência editada com sucesso!');
        return redirect('deficiency');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deficiency = \App\Deficiency::find($id);
        return view('deficiency.delete', compact('deficiency'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Deficiency::find($id)->delete();
        Flash::success('Deficiência inativada com sucesso');
        return redirect('deficiency');
    }
}
