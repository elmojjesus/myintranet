<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = \App\User::find($id);

        return view('document.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        \App\Document::insert($data);
        Flash::success('Usuário criado com sucesso.');
        return redirect('user/image/upload/' . $data['user_id']);
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
