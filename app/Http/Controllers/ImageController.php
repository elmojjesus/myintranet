<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use File;
use Flash;

class ImageController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function userUpload ($id) {
        $user = \App\User::withTrashed()->find($id);
        return view('user.image.upload', compact('user'));
    }

    public function userStore(ImageRequest $request) {
        $data = $request->all();
        unset($data['_token']);
        $file = $request->file('image');
        $flag = false;
        $user = \App\User::withTrashed()->find($data['id']);
        if (!$file) {
            Flash::success('Alterações realizadas com sucesso!');
        } else {
            while(!$flag){
                $name = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 70) . '.' . $file->getClientOriginalExtension();
                $verify = \App\User::withTrashed()->where('image', $name)->count();    
                if($verify < 1){
                    $flag = true;
                }
            }
            $file->move(base_path() . '/public/images/profile/', $name);
            if ($user->image != NULL) {
                if(File::exists(public_path() . '/images/profile/' . $user->image)) {
                    File::delete(public_path() . '/images/profile/' . $user->image);
                }
            }
            $user->image = $name;
            $user->save();
            Flash::success('Imagem alterada com sucesso!');
        }
        return redirect('/user');
    }
}
