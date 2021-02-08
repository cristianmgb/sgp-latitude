<?php

namespace App\Controllers;

use App\Models\PolicyModel;

class Policies extends BaseController
{
	public $policy;

	public function __construct()
	{
		$this->policy = new PolicyModel();
	}

	public function index()
	{
		return view('policy/index');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$data = $this->request->getJSON(true);
        $this->policy->insert( $data );

        return ( $policy->insertID ) ? $this->successResponse( 'Póliza creada exitosamente', $data ) : $this->failResponse( 'No se pudo crear la póliza', 404, $policy );
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit( $id = null )
	{
		$data = ['policy' => $this->policy->where('id', $id)->first()];

		return view('policy/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id = null )
	{
		$data   = $this->request->getJSON(true);
		$policy = $this->policy->update($id, $data);

		return ( $policy ) ? $this->successResponse( 'Póliza editada exitosamente', $data ) : $this->failResponse( 'No se pudo editar la póliza', 404, $policy );
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id = null )
	{
		$policy = $this->policy->where('id', $id)->delete();

		return ( $policy ) ? $this->successResponse( 'Póliza eliminada exitosamente', '' ) : $this->failResponse( 'No se pudo eliminar la póliza', 404, '' );
	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all()
	{
		$policies = $this->policy->orderBy('id', 'asc')->findAll();

		return ( $policies ) ? $this->successResponse( 'Datos encontrados', $policies ) : $this->failResponse( 'Sin datos disponibles', 404, $policies );
	}

	/**
	 * [get_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id ( $id = null )
	{
		$policy = $this->policy->find($id);

		return ( $policy ) ? $this->successResponse( 'Póliza encontrada', $policy ) : $this->failResponse( 'Póliza no encontrada', 404, $policy );
	}
}

/* End of file Policies.php */
/* Location: ..app/Controllers/Policies.php */