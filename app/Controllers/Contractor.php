<?php

namespace App\Controllers;

use App\Models\ContractorModel;

class Contractor extends BaseController
{
	public $contractor;

	public function __construct()
	{
		$this->contractor = new ContractorModel();
	}

	public function index()
	{
		return view('contractor/index');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		$data = $this->request->getJSON(true);
        $this->contractor->insert( $data );

        return ( $this->contractor->insertID ) ? $this->successResponse( 'Contratista creado exitosamente', $data ) : $this->failResponse( 'No se pudo crear el contratista', 404, $this->contractor );
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit( $id = null )
	{
		$data = ['contractor' => $this->contractor->where('id', $id)->first()];

		return view('contractor/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update( $id = null )
	{
		$data       = $this->request->getJSON(true);
		$contractor = $this->contractor->update($id, $data);

		return ( $contractor ) ? $this->successResponse( 'Contratista editado exitosamente', $data ) : $this->failResponse( 'No se pudo editar el contratista', 404, $contractor );
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete( $id = null )
	{
		$contractor = $this->contractor->where('id', $id)->delete();

		return ( $contractor ) ? $this->successResponse( 'Contratista eliminado exitosamente', '' ) : $this->failResponse( 'No se pudo eliminar el contratista', 404, '' );
	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all()
	{
		$contrators = $this->contractor->orderBy('id', 'asc')->findAll();

		return ( $contrators ) ? $this->successResponse( 'Datos encontrados', $contrators ) : $this->failResponse( 'Sin datos disponibles', 404, $contrators );
	}

	/**
	 * [get_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id ( $id = null )
	{
		$contrator = $this->contractor->find($id);

		return ( $contrator ) ? $this->successResponse( 'Contratista encontrado', $contrator ) : $this->failResponse( 'Contratista no econtrado', 404, $contrator );
	}
}

/* End of file Constractor.php */
/* Location: ..app/Controllers/Constractor.php */