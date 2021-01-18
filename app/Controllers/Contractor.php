<?php

namespace App\Controllers;

use App\Models\ContractorModel;

class Contractor extends BaseController
{
	public function index()
	{
		return view('contractor');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$request    = \Config\Services::request();
		$data       = $request->getJSON(true);
		$contractor = new ContractorModel();
        $contractor->insert( $data );

        return ( $contractor->insertID ) ? $this->successResponse( 'Póliza creada exitosamente', $data ) : $this->failResponse( 'No se pudo crear la póliza', 404, $contractor );
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

	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id )
	{

	}

	/**
	 * [get_all_contractors description]
	 * @return [type] [description]
	 */
	public function get_all_contractors()
	{
		$contractorModel = new ContractorModel();
		$contrators 	 = $contractorModel->orderBy('id', 'asc')->findAll();

		return ( $contrators ) ? $this->successResponse( '', $contrators ) : $this->failResponse( 'Sin datos', 404, $contrators );
	}

	/**
	 * [get_contractor_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_contractor_by_id ( $id )
	{
		$contractorModel = new ContractorModel();
		$contrator 	     =  $contractorModel->find($id);

		return ( $contrator ) ? $this->successResponse( 'Contratista encontrado', $contrator ) : $this->failResponse( 'Contratista no econtrado', 404, $contrator );
	}
}

/* End of file Constractor.php */
/* Location: ..app/Controllers/Constractor.php */