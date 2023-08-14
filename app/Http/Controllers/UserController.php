<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Reserve;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();

            $messageSuccess = session('messageSuccess');

            return view('users.index')
                ->with('users', $users)
                ->with('messageSuccess', $messageSuccess);

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserFormRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            User::create($data);

            $request->session()->flash('messageSuccess', 'Usuário inserido com sucesso');

            return redirect()->route('users.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    public function update(User $user, UserFormRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $user->fill($data);
            $user->save();

            $request->session()->flash('messageSuccess', 'Usuário atualizado com sucesso');

            return redirect()->route('users.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            if (Reserve::where('users_id', $request->user)) {
                throw new Exception('Não é possível remover usuários que possuem reservas cadastradas');
            } 

            User::destroy($request->user);

            $request->session()->flash('messageSuccess', 'Usuário removido com sucesso');

            return redirect()->route('users.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
