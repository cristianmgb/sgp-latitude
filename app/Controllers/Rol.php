<?php

namespace App\Controllers;

use App\Models\RolModel;

class Rol extends BaseController
{
	public $rol;

	public function __construct()
	{
		$this->rol = new RolModel();
	}

	public function index()
	{
		return view('rol/index');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$data = $this->request->getJSON(true);
        $this->rol->insert( $data );

        return ( $this->rol->insertID ) ? $this->successResponse( 'Rol creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el rol', 404, $this->rol );
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit( $id = null )
	{
		$data = ['rol' => $this->rol->where('id', $id)->first()];

		return view('rol/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id = null )
	{
		$data = $this->request->getJSON(true);
		$rol  = $this->rol->update($id, $data);

		return ( $rol ) ? $this->successResponse( 'Rol editado exitosamente', $data ) : $this->failResponse( 'No se pudo editar el rol', 404, $rol );
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id = null )
	{
		$rol = $this->rol->where('id', $id)->delete();

		return ( $rol ) ? $this->successResponse( 'Rol eliminado exitosamente', '' ) : $this->failResponse( 'No se pudo eliminar el rol', 404, '' );
	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all()
	{
		$roles = $this->rol->orderBy('id', 'asc')->findAll();

		return ( $roles ) ? $this->successResponse( 'Datos cargados exitosamente', $roles ) : $this->failResponse( 'Sin datos disponibles', 404, $roles );
	}

	/**
	 * [get_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id ( $id = null )
	{
		$rol = $this->rol->find($id);

		return ( $rol ) ? $this->successResponse( 'Rol encontrado', $rol ) : $this->failResponse( 'Rol no encontrado', 404, $rol );
	}

}

/* End of file Rol.php */
/* Location: ..app/Controllers/Rol.php */