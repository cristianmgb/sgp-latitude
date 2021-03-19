<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Meta;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Associate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::withTrashed()->Paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')
                ->with('roles', Role::all())
                ->with('associates', Associate::all())
                ->with('states', $this->get_states());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->status       = $request->status;
        $user->associate_id = $request->associate_id;
        $user->save();

        $lastUser = User::all();
        $lastUser->last()->assignRole($request->rol);

        return redirect('users/create')->with('message', 'Usuario creado satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show')->with('user', User::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user     = User::findOrFail($id);
        $user_rol = $user->getRoleNames();

        return view('users.edit')
                ->with('user', $user)
                ->with('user_rol', $user_rol)
                ->with('roles', Role::all())
                ->with('associates', Associate::all())
                ->with('states', $this->get_states());
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
        $user = User::findOrFail($id);
        $rol  = $user->getRoleNames();
        $role = Role::findByName($rol[0]);

        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->email        = $request->email;
        $user->status       = $request->status;
        $user->associate_id = $request->associate_id;

        // Removemos el rol actual
        $user->removeRole($role);
        // Actualizamos el rol
        $user->assignRole($request->rol);
        $user->update();

        return redirect()->route('users.edit' , $user)
                ->with('message', 'Usuario editado satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('message', 'Usuario suspendido satisfactoriamente !');
    }
}