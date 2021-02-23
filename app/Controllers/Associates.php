<?php

namespace App\Controllers;

use App\Models\Associate;

class Associates extends BaseController {

	public $associate;

	public function __construct() {
		$this->associate = new Associate();
	}

	public function index() {
		return view('associate/index');
	}

	/**
	 * [new description]
	 * @return [type] [description]
	 */
	public function new () {
		return view('associate/new');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create() {
		$data = $this->request->getJSON(true);
		$this->associate->insert($data);

		return ($this->associate->insertID) ? $this->successResponse('Asociado creado exitosamente', $data) : $this->failResponse('No se pudo crear el asociado', 404, $this->associate);
	}

	/**
	 * [show description]
	 * @return [type] [description]
	 */
	public function show($id = null) {
		$associate = $this->associate->find($id);

		return ($associate) ? $this->successResponse('Asociado encontrado', $associate) : $this->failResponse('Asociado no econtrado', 404, $associate);
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id = null) {
		$data = ['associate' => $this->associate->where('id', $id)->first()];

		return view('associate/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id = null) {
		$data = $this->request->getJSON(true);
		$associate = $this->associate->update($id, $data);

		return ($associate) ? $this->successResponse('Asociado editado exitosamente', $data) : $this->failResponse('No se pudo editar el asociado', 404, $associate);
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id = null) {
		$associate = $this->associate->where('id', $id)->delete();

		return ($associate) ? $this->successResponse('Asociado eliminado exitosamente', '') : $this->failResponse('No se pudo eliminar el asociado', 404, '');
	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all() {
		$associates = $this->associate->orderBy('id', 'asc')->findAll();

		return ($associates) ? $this->successResponse('Datos cargados exitosamente', $associates) : $this->failResponse('Sin datos disponibles', 404, $associates);
	}

	/**
	 * [get_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id($id = null) {
		$associate = $this->associate->find($id);

		return ($associate) ? $this->successResponse('Rol encontrado', $associate) : $this->failResponse('Rol no encontrado', 404, $associate);
	}
}

/* End of file Associates.php */
/* Location: ..app/Controllers/Associates.php */