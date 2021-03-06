<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use Flash;


class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = \App\Education::all();
        return view('education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Education::insert($data);
        Flash::success('Educação cadastrada com sucesso!');
        return redirect('education');
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
        $education = \App\Education::find($id);
        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EducationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Education::where('id', $id)->update($data);
        Flash::success('Educação editada com sucesso!');
        return redirect('education');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $education = \App\Education::find($id);
        return view('education.delete', compact('education'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Education::find($id)->delete();
        Flash::success('Educação excluída com sucesso!');
        return redirect('education');
    }
}
