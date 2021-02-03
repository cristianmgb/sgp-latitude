<?php

namespace App\Controllers;

use App\Models\AssociateModel;

class Associate extends BaseController
{
	public $associate;

	public function __construct()
	{
		$this->associate = new AssociateModel();
	}

	public function index()
	{
		return view('associate/index');
	}

	/**
	 * [new description]
	 * @return [type] [description]
	 */
	public function new()
	{
		return view('associate/new');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$request = \Config\Services::request();
		$data    = $request->getJSON(true);

        $this->associate->insert( $data );

        return ( $this->associate->insertID ) ? $this->successResponse( 'Asociado creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el asociado', 404, $this->associate );
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit( $id )
	{
		$associate = $this->associate->where('id', $id)->first();
		$data      = ['associate' => $associate];

		return view('associate/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id )
	{
		$request   = \Config\Services::request();
		$data      = $request->getJSON(true);
		$associate = $this->associate->update($id, $data);

		return ( $associate ) ? $this->successResponse( 'Asociado editado exitosamente', $data ) : $this->failResponse( 'No se pudo editar el asociado', 404, $associate );
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id )
	{
		$associate = $this->associate->where('id', $id)->delete();

		return ( $associate ) ? $this->successResponse( 'Asociado eliminado exitosamente', '' ) : $this->failResponse( 'No se pudo eliminar el asociado', 404, '' );
	}

	/**
	 * [get_all_associates description]
	 * @return [type] [description]
	 */
	public function get_all_associates()
	{
		$associateModel = new AssociateModel();
		$associates 	= $associateModel->orderBy('id', 'asc')->findAll();

		return ( $associates ) ? $this->successResponse( '', $associates ) : $this->failResponse( 'Sin datos', 404, $associates );
	}

	/**
	 * [get_associate_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_associate_by_id ( $id )
	{
		$associateModel = new AssociateModel();
		$associate 	     =  $associateModel->find($id);

		return ( $associate ) ? $this->successResponse( 'Asociado encontrado', $associate ) : $this->failResponse( 'Asociado no econtrado', 404, $associate );
	}
}

/* End of file Associate.php */
/* Location: ..app/Controllers/Associate.php */