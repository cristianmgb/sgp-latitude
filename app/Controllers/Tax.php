<?php

namespace App\Controllers;

use App\Models\TaxModel;

class Tax extends BaseController
{

	public function index()
	{
		return view('tax');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$request = \Config\Services::request();
		$data    = $request->getJSON(true);
		$tax 	 = new TaxModel();
        $tax->insert( $data );

        return ( $tax->insertID ) ? $this->successResponse( 'Impuesto creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el impuesto', 404, $tax );
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
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id )
	{

	}

	/**
	 * [get_all_taxes description]
	 * @return [type] [description]
	 */
	public function get_all_taxes()
	{
		$taxModel = new TaxModel();
		$taxes 	  = $taxModel->orderBy('id', 'asc')->findAll();

		return ( $taxes ) ? $this->successResponse( '', $taxes ) : $this->failResponse( 'Sin datos', 404, $taxes );
	}

	/**
	 * [get_tax_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_tax_by_id ( $id )
	{
		$taxModel = new TaxModel();
		$tax 	  =  $taxModel->find($id);

		return ( $tax ) ? $this->successResponse( 'Impuesto encontrado', $tax ) : $this->failResponse( 'Impuesto no encontrado', 404, $tax );
	}
}

/* End of file Tax.php */
/* Location: ..app/Controllers/Tax.php */