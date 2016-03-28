<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Flash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->getUsersByQuery($request->all());
        $deficiencies = \App\Deficiency::all();
        return view('user.index', compact('users', 'deficiencies'));
    }

    public function getUsersByQuery($request) {
        return \App\User::where(function($query) use($request) {
            if (isset($request['name']) && $request['name'] != '') {
                $query->where('name', 'LIKE', '%'.$request['name'] .'%');
            }

            if (isset($request['deficiency_id']) && $request['deficiency_id'] != '') {
                $query->where('deficiency_id', $request['deficiency_id']);
            }
        })->orderBy('name')->paginate(20);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deficiencies = \App\Deficiency::all();
        $educations = \App\Education::all();
        $professions = \App\Profession::all();
        $status = \App\Status::all();
        return view('user.create', compact('deficiencies', 'educations', 'professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['password_confirm']);
        $data['password'] = bcrypt($data['password']);
        \App\User::insert($data);
        Flash::success('Usuário salvo com sucesso!');
        return redirect('user');
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
        $user = \App\User::find($id);
        $deficiencies = \App\Deficiency::all();
        $educations = \App\Education::all();
        $professions = \App\Profession::all();
        return view('user.edit', compact('user', 'deficiencies', 'educations', 'professions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($data['password'] == '') {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        unset($data['edit']);
        \App\User::where('id', $id)->update($data);
        return redirect('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = \App\User::find($id);
        return view('user.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\User::find($id)->delete();
        return redirect('user');
    }
}
