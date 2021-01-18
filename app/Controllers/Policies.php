<?php

namespace App\Controllers;

use App\Models\PolicyModel;

class Policies extends BaseController
{
	public function index()
	{
		return view('policies');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$request = \Config\Services::request();
		$data    = $request->getJSON(true);
		$policy 	 = new TaxModel();
        $policy->insert( $data );

        return ( $policy->insertID ) ? $this->successResponse( 'Póliza creada exitosamente', $data ) : $this->failResponse( 'No se pudo crear la póliza', 404, $policy );
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
	 * [get_all_policies description]
	 * @return [type] [description]
	 */
	public function get_all_policies()
	{
		$policyModel = new PolicyModel();
		$policies 	  = $policyModel->orderBy('id', 'asc')->findAll();

		return ( $policies ) ? $this->successResponse( '', $policies ) : $this->failResponse( 'Sin datos', 404, $policies );
	}

	/**
	 * [get_policy_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_policy_by_id ( $id )
	{
		$policyModel = new PolicyModel();
		$policy 	  =  $policyModel->find($id);

		return ( $policy ) ? $this->successResponse( 'Póliza encontrada', $policy ) : $this->failResponse( 'Póliza no encontrada', 404, $policy );
	}
}

/* End of file Policies.php */
/* Location: ..app/Controllers/Policies.php */