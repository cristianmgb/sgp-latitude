<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	
	public function index()
	{
		return view('user/all');
	}

	/**
	 * [new description]
	 * @return [type] [description]
	 */
	public function new()
	{
		return view('user/new');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$request = \Config\Services::request();
		$data    = $request->getJSON(true);
		$user 	 = new UserModel();
        $user->insert( $data );

        return ( $user->insertID ) ? $this->successResponse( 'Usuario creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el usuario', 404, $user );

	}

	/**
	 * [show description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show( $id )
	{

	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit( $id )
	{

	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id )
	{

	}

	/**
	 * [remove description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function remove( $id )
	{

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	}public function delete( $id )
	{

	}

	/**
	 * [get_all_users description]
	 * @return [type] [description]
	 */
	public function get_all_users()
	{
		$userModel = new UserModel();
		$users     = $userModel->select('sgp_users.id as userId, sgp_users.first_name as first , sgp_users.last_name as last, sgp_users.email as email, sgp_users.phone as phone, sgp_users.state as userState, sgp_users.created_at as created, sgp_users.updated_at as updated, sgp_roles.id as rolId, sgp_roles.name as rolName, sgp_roles.state as rolState')
					->join('sgp_roles', 'sgp_roles.id = sgp_users.id_rol', 'left')
                   	->orderBy('sgp_users.id', 'asc')
                   	->findAll();

        return ( $users ) ? $this->successResponse( 'Usuarios encontrados', $users ) : $this->failResponse( 'Sin datos', 404, $users );
	}

	/**
	 * [get_user_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_user_by_id ( $id )
	{
		$userModel = new UserModel();
		$user 	   = $userModel->find($id);

		return ( $user ) ? $this->successResponse( 'Usuario encontrado', $user ) : $this->failResponse( 'Usuario no encontrado', 404, $user );
	}
}

/* End of file User.php */
/* Location: ..app/Controllers/User.php */