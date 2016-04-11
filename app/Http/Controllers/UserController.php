<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Flash;
use Illuminate\Support\Facades\DB;

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
        $status = \App\Status::all();
        return view('user.index', compact('users', 'deficiencies', 'status'));
    }

    public function getUsersByQuery($request) {
        return \App\User::where(function($query) use($request) {
            if (isset($request['id']) && $request['id'] != '') {
                $query->where('id', 'LIKE', $request['id']);
            }

            if (isset($request['name']) && $request['name'] != '') {
                $query->where('name', 'LIKE', '%'.$request['name'] .'%');
            }

            if (isset($request['deficiency_id']) && $request['deficiency_id'] != '') {
                $query->where('deficiency_id', $request['deficiency_id']);
            }

            if (isset($request['status_id']) && $request['status_id'] != '') {
                $query->where('status_id', $request['status_id']);
            }
        })->orderBy('name')->paginate(15);

    }

    public function getCommonUsers($request){
        
        return $users = DB::table('users')
                ->leftJoin('athletes', function ($join) {
                    $join->on('users.id', '=', 'athletes.user_id');
                         /*->where('athletes.id', '=', null);*/
                         
                })
                ->select('users.*')
                ->whereNull('athletes.id')
                ->where(function($query) use($request){
                    if (isset($request['id']) && $request['id'] != '') {
                        $query->where('users.id', '=', $request['id']);
                    }

                    if (isset($request['name']) && $request['name'] != '') {
                       $query->where('users.name', 'LIKE', '%'.$request['name'].'%');
                    } 
                })
                ->orderBy('users.name')
                ->paginate(10);
 
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
        return view('user.create', compact('deficiencies', 'educations', 'professions', 'status'));
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
        $user = \App\User::where('email', $data['email'])->first();
        Flash::success('Primeira etapa do usuário completa!');
        return redirect('document/create/' . $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::find($id);
        return view('user.show', compact('user'));
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
