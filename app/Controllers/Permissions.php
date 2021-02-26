<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Permission;

class Permissions extends BaseController {
	public $permission;

	public function __construct() {
		$this->permission = new Permission();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index() {
		return view('permission/index');
	}

	/**
	 * [new description]
	 * @return [type] [description]
	 */
	public function new () {
		return view('permission/new');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create() {
		$data = $this->request->getJSON(true);
		$this->permission->insert($data);

		return ($this->permission->insertID) ? $this->successResponse('Permiso creado exitosamente', $data) : $this->failResponse('No se pudo crear el Permiso', 404, $this->permission);
	}

	/**
	 * [show description]
	 * @return [type] [description]
	 */
	public function show($id = null) {
		$permission = $this->permission->find($id);

		return ($permission) ? $this->successResponse('Permiso encontrado', $permission) : $this->failResponse('Permiso no encontrado', 404, $permission);
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id = null) {
		$data = ['permission' => $this->permission->where('id', $id)->first()];

		return view('permission/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id = null) {
		$data = $this->request->getJSON(true);
		$permission = $this->permission->update($id, $data);

		return ($permission) ? $this->successResponse('Permiso editado exitosamente', $data) : $this->failResponse('No se pudo editar el Permiso', 404, $permission);
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id = null) {
		$permission = $this->permission->where('id', $id)->delete();

		return ($permission) ? $this->successResponse('Permiso eliminado exitosamente', '') : $this->failResponse('No se pudo eliminar el Permiso', 404, '');
	}
}

/* End of file Permissions.php */
/* Location: ..app/Controllers/Permissions.php */