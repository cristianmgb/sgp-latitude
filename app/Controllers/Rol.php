<?php

namespace App\Controllers;

use App\Models\RolModel;

class Rol extends BaseController
{
	public function index()
	{
		return view('rol');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$request = \Config\Services::request();
		$data    = $request->getJSON(true);
		$rol 	 = new RolModel();
        $rol->insert( $data );

        return ( $rol->insertID ) ? $this->successResponse( 'Rol creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el rol', 404, $rol );
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id )
	{
		$request  = \Config\Services::request();
		$data     = $request->getJSON(true);
		$rolModel = new RolModel();
		$rol      = $rolModel->find( $id );

		if ( $rol ) {
			$rol->update( $id, $data);
			return $this->successResponse( 'Rol editado exitosamente', $rol );
		} else {
			return $this->failResponse( 'No se pudo editar el rol', 404, 'Rol no encontrado' );
		}
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id )
	{
		$rol = new RolModel();
		$rol->where('id', $id)->delete();

		return $this->successResponse( 'Rol eliminado exitosamente', $rol );
	}

	/**
	 * [get_all_roles description]
	 * @return [type] [description]
	 */
	public function get_all_roles()
	{
		$rolModel = new RolModel();
		$roles 	  = $rolModel->orderBy('id', 'asc')->findAll();

		return ( $roles ) ? $this->successResponse( 'Datos cargados exitosamente', $roles ) : $this->failResponse( 'Sin datos', 404, $roles );
	}

	/**
	 * [get_rol_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_rol_by_id ( $id )
	{
		$rolModel = new RolModel();
		$rol 	  =  $rolModel->find($id);

		return ( $rol ) ? $this->successResponse( 'Rol encontrado', $rol ) : $this->failResponse( 'Rol no encontrado', 404, $rol );
	}

}

/* End of file Rol.php */
/* Location: ..app/Controllers/Rol.php */