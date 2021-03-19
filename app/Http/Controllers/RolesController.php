<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Models\Role;
use App\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index')->with('roles', Role::withTrashed()->Paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create')->with('permissions', Permission::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RolesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        Role::create(['name'=> $request->name]);
        $roles       = Role::all();
        $permissions = $request['permissions'];

        foreach ($permissions as $permission) {
            $new_permission = Permission::where('name', '=', $permission)->firstOrFail();
            $roles->last()->givePermissionTo($new_permission);
        }

        return redirect('roles/create')->with('message','Rol creado satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Role::findOrFail($id);

        return view('roles.show')
             ->with('rol', $rol)
             ->with('permissions', $rol->getAllPermissions());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('roles.edit')
                ->with('rol', Role::findOrFail($id))
                ->with('permissions', Permission::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required|alpha_dash',
            'permissions' => 'required',
        ]);

        $rol = Role::findOrFail($id);
        $rol->name = $request->name;
        $currents_permissions = $request['permissions'];

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $rol->revokePermissionTo($permission);
        }

        foreach ($currents_permissions as $permission) {
            $new_permission = Permission::where('name', '=', $permission)->firstOrFail();
            $rol->givePermissionTo($new_permission);
        }

        $rol->update();

        return redirect()->route('roles.edit', $rol->id )->with('message', 'Rol editado satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->destroy($id);

        return redirect()->route('roles.index')->with('message', 'Rol suspendido satisfactoriamente !');
    }
}