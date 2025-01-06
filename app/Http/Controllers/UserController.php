<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Role;
class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create($input);
        return redirect()->route('users.index')->with('status','Usuário criado com sucesso');
    }

    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function edit(User $user){
        $user->load('profile','interests');
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user){
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'exclude_if:password,null|min:6',
        ]);
        $user->fill($input);
        $user->save();
        return back()->with('status','Usuário atualizado com sucesso');
    }

    public function updateProfile(Request $request, User $user){
        //dd($request->all());
        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable',
        ]);
        UserProfile::updateOrCreate(['user_id'=>$user->id],$input);
        return back()->with('users.index')->with('status','Perfil atualizado com sucesso');
    }

    public function updateInterest(Request $request, User $user){
        $input = $request->validate([
            'interests' => 'nullable|array',
        ]);
        $user->interests()->delete();
        if(!empty($input['interests'])){
            $user->interests()->createMany($input['interests']);
        }
        return back()->with('status','Interesses atualizados com sucesso');
    }

    public function updateRole(Request $request, User $user){
      //  dd($request->all());
        $input = $request->validate([
            'roles' => 'required|array',
        ]);
        $user->roles()->sync($input['roles']);
        return back()->with('status','Cargos atualizados com sucesso');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('status','Usuário deletado com sucesso');
    }
}
