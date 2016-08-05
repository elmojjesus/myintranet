<?php

namespace MyIntranet\Http\Controllers;

use Illuminate\Http\Request;

use MyIntranet\Http\Requests;
use MyIntranet\Http\Controllers\Controller;
use Auth;
use Flash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->profile->role->name == 'Diretor') {
            $profiles = \MyIntranet\Profile::paginate(15, ['*'], 'pagProfile');
            $roles = \MyIntranet\Role::orderBy('name')->paginate(5,['*'],'pagRole');
        } else {
            $profiles = \MyIntranet\Profile::where('role_id', '>', 1)->paginate(15, ['*'], 'pagProfile');
            $roles = \MyIntranet\Role::where('id', '>', 1)->orderBy('name')->paginate(5,['*'],'pagRole');
        }
        $users = \MyIntranet\User::notProfile();
        $query = $request->all();
        return view('profile.index', compact('profiles', 'roles', 'query', 'users'));
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
        $data = $request->all();
        $password = bcrypt($data['password']);
        unset($data['_token'], $data['password_confirm'], $data['password']);
        if (\MyIntranet\Profile::where('user_id', $data['user_id'])->count() > 0) {
            \MyIntranet\Profile::where('user_id', $data['user_id'])
                ->update(['role_id' => $data['role_id']]);
        } else {
            \MyIntranet\Profile::insert($data);
        }
        \MyIntranet\User::where('id', $data['user_id'])->update(['password' => $password]);
        Flash::success('Acesso cadastrado com sucesso!');
        return redirect('profiles');
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
        if (Auth::user()->profile->role->name == 'Diretor') {
            $roles = \MyIntranet\Role::orderBy('name')->get();
        } else {
            $roles = \MyIntranet\Role::where('id', '>', 1)->orderBy('name')->get();
        }
        $profile = \MyIntranet\Profile::find($id);
        return view('profile.edit', compact('roles', 'profile'));
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
        $data = $request->all();
        $profile = \MyIntranet\Profile::find($id);
        if (isset($data['password']) && isset($data['password'])){
            if ($data['password'] != '' && $data['password_confirm'] != '') {
                $password = bcrypt($data['password']);
                \MyIntranet\User::where('id', $profile->user->id)->update(['password' => $password]);
            }
            unset($data['password_confirm'], $data['password']);
        }
        
        if (isset($data['role_id']) && $data['role_id'] != '') {
            \MyIntranet\Profile::where('id', $profile->id)
                ->update(['role_id' => $data['role_id']]);
        }
        Flash::success('Acesso atualizado com sucesso!');
        return redirect('profiles');
    }

    public function delete($id) {
        $profile = \MyIntranet\Profile::find($id);
        return view('profile.delete', compact('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = \MyIntranet\Profile::find($id);
        \MyIntranet\User::where('id', $profile->user->id)->update(['password' => null]);
        \MyIntranet\Profile::find($id)->delete();
        Flash::success('Acesso deletado com sucesso');
        return redirect('profiles');
    }
}
