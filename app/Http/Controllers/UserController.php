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
        $query = $request->all();
        $users = $this->getUsersByQuery($request->all());
        $deficiencies = \App\Deficiency::all();
        $status = \App\Status::all();
        return view('user.index', compact('users', 'deficiencies', 'status', 'query'));
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

    public function getCommonUsers($request, $table){
        $GLOBALS['tableGCU'] = $table;
        return $users = DB::table('users')
                ->leftJoin($table, function ($join) {
                    $join->on('users.id', '=', $GLOBALS['tableGCU'] . '.user_id');
                         /*->where('athletes.id', '=', null);*/
                })
                ->select('users.*')
                ->whereNull($table . '.id')
                ->where('users.status_id', '!=', 2)
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
        $document = [
            'rg' => $data['rg'],
            'cpf' => $data['cpf'],
            'passport' => $data['passport']
        ];
        unset($data['rg'], $data['cpf'], $data['passport']);

        if (isset($data['street'])) {
            $address = [
                'street' => $data['street'],
                'number' => $data['number'],
                'complement' => $data['complement'],
                'zip_code' => $data['codPostal'],
                'neighborhood' => $data['neighborhood'],
                'regional' => $data['regional'],
                'city' => $data['city'],
                'state' => $data['state']
            ];
            unset($data['street'], $data['number'], $data['complement'], $data['codPostal'], $data['bairro'], $data['regional'], $data['city'], $data['state']);
        }
        $birthDate = \DateTime::createFromFormat('d/m/Y', $data['birthDate']);
        $data['birthDate'] = $birthDate->format('Y-m-d');
        \App\User::insert($data);
        $user = \App\User::where('email', $data['email'])->first();
        $document['user_id'] = $user->id;
        $address['user_id'] = $user->id;
        \App\Document::insert($document);
        \App\Address::insert($address);
        Flash::success('Primeira etapa do usuário completa!');
        return redirect('user/image/upload/' . $user->id);
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
        $status = \App\Status::all();
        return view('user.edit', compact('user', 'deficiencies', 'educations', 'professions', 'status'));
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
        if (isset($data['password']) && $data['password'] != '') {
            $data['password'] = bcrypt($data['password']);
        }
        if (isset($data['undefined'])) {
            unset($data['undefined']);
        }
        if (isset($data['edit'])) {
            unset($data['edit']);
        }
        if (isset($data['rg'])) {
            $document = [
                'rg' => $data['rg'],
                'cpf' => $data['cpf'],
                'passport' => $data['passport'],
                'user_id' => $id
            ];
            unset($data['rg'], $data['cpf'], $data['passport']);
        }
        \App\User::where('id', $id)->update($data);
        \App\Document::where('user_id', $id)->update($document);
        Flash::success('Usuário editado com sucesso!');
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
