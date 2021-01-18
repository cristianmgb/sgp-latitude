<?php

namespace App\Controllers;

use App\Models\AssociateModel;

class Associate extends BaseController
{

	public function index()
	{
		return view('associate/all');
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
		$request   = \Config\Services::request();
		$data      = $request->getJSON(true);
		$associate = new AssociateModel();
        $associate->insert( $data );

        return ( $associate->insertID ) ? $this->successResponse( 'Asociado creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el asociado', 404, $associate );
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