<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        if (Auth::user()->profile->role->name == 'GOD') {
            $profiles = \App\Profile::paginate(15, ['*'], 'pagProfile');
            $roles = \App\Role::orderBy('name')->paginate(5,['*'],'pagRole');
        } else {
            $profiles = \App\Profile::where('role_id', '>', 1)->paginate(15, ['*'], 'pagProfile');
            $roles = \App\Role::where('id', '>', 1)->orderBy('name')->paginate(5,['*'],'pagRole');
        }
        $users = \App\User::notProfile();
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
        if (\App\Profile::where('user_id', $data['user_id'])->count() > 0) {
            \App\Profile::where('user_id', $data['user_id'])
                ->update(['role_id' => $data['role_id']]);
        } else {
            \App\Profile::insert($data);
        }
        \App\User::where('id', $data['user_id'])->update(['password' => $password]);
        Flash::success('Perfil cadastrado com sucesso!');
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
<<<<<<< HEAD:app/Http/Controllers/AthleteSportsController.php
        #\App\AthleteSport::destroy();
        $sport = \App\AthleteSport::where('athlete_id', $athlete_id)
                                    ->where('sport_id', $sport_id);
        #dd($sport);
        $sport->delete();
        return redirect('athlete');
=======
        //
>>>>>>> 3a2d3fb98947c970d0b2f2126a441025a571f146:app/Http/Controllers/ProfileController.php
    }
}
