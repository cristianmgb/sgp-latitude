<?php

namespace App\Controllers;

use App\Models\TaxModel;

class Tax extends BaseController
{
	public $tax;

	public function __construct()
	{
		$this->tax = new TaxModel();
	}

	public function index()
	{
		return view('tax/index');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$data = $this->request->getJSON(true);
        $this->tax->insert( $data );

        return ( $this->tax->insertID ) ? $this->successResponse( 'Impuesto creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el impuesto', 404, $this->tax );
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit( $id = null )
	{
		$data = ['tax' => $this->tax->where('id', $id)->first()];

		return view('tax/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id = null )
	{
		$data = $this->request->getJSON(true);
		$tax  = $this->tax->update($id, $data);

		return ( $tax ) ? $this->successResponse( 'Impuesto editado exitosamente', $data ) : $this->failResponse( 'No se pudo editar el impuesto', 404, $tax );
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id = null )
	{
		$tax = $this->tax->where('id', $id)->delete();

		return ( $tax ) ? $this->successResponse( 'Impuesto eliminado exitosamente', '' ) : $this->failResponse( 'No se pudo eliminar el impuesto', 404, '' );
	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all()
	{
		$taxes = $this->tax->orderBy('id', 'asc')->findAll();

		return ( $taxes ) ? $this->successResponse( 'Datos encontrados', $taxes ) : $this->failResponse( 'Sin datos disponibles', 404, $taxes );
	}

	/**
	 * [get_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id ( $id )
	{
		$tax = $this->tax->find($id);

		return ( $tax ) ? $this->successResponse( 'Impuesto encontrado', $tax ) : $this->failResponse( 'Impuesto no encontrado', 404, $tax );
	}
}

/* End of file Tax.php */
/* Location: ..app/Controllers/Tax.php */