<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	public $user;

	public function __construct()
	{
		$this->user = new UserModel();
	}

	public function index()
	{
		return view('user/index');
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
		$data = $this->request->getJSON(true);
        $this->user->insert( $data );

        return ( $this->user->insertID ) ? $this->successResponse( 'Usuario creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el usuario', 404, $this->user );
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit( $id = null )
	{
		$data = ['user' => $this->user->where('id', $id)->first()];

		return view('user/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id = null )
	{
		$data = $this->request->getJSON(true);
		$user = $this->user->update($id, $data);

		return ( $user ) ? $this->successResponse( 'Usuario editado exitosamente', $data ) : $this->failResponse( 'No se pudo editar el rol', 404, $user );
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id = null )
	{
		$user = $this->user->where('id', $id)->delete();

		return ( $user ) ? $this->successResponse( 'Usuario eliminado exitosamente', '' ) : $this->failResponse( 'No se pudo eliminar el usuario', 404, '' );
	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all()
	{
		$users = $this->user->select('sgp_users.id as userId, sgp_users.first_name as first , sgp_users.last_name as last, sgp_users.email as email, sgp_users.phone as phone, sgp_users.state as userState, sgp_users.created_at as created, sgp_users.updated_at as updated, sgp_roles.id as rolId, sgp_roles.name as rolName, sgp_roles.state as rolState')
					->join('sgp_roles', 'sgp_roles.id = sgp_users.id_rol', 'left')
                   	->orderBy('sgp_users.id', 'asc')
                   	->findAll();

        return ( $users ) ? $this->successResponse( 'Usuarios encontrados', $users ) : $this->failResponse( 'Sin datos disponibles', 404, $users );
	}

	/**
	 * [get_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id ( $id = null )
	{
		$user = $this->user->find($id);

		return ( $user ) ? $this->successResponse( 'Usuario encontrado', $user ) : $this->failResponse( 'Usuario no encontrado', 404, $user );
	}
}

/* End of file User.php */
/* Location: ..app/Controllers/User.php */