<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\User;

class Users extends BaseController {

	public $user;

	public function __construct() {
		$this->user = new User();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index() {
		return view('user/index');
	}

	/**
	 * [new description]
	 * @return [type] [description]
	 */
	public function new () {
		return view('user/new');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create() {
		$data = [
			'first_name' => $this->request->getJSON()->first_name,
			'last_name' => $this->request->getJSON()->last_name,
			'email' => $this->request->getJSON()->email,
			'password' => Hash::make($this->request->getJSON()->password),
			'phone' => $this->request->getJSON()->phone,
			'state' => $this->request->getJSON()->state,
		];

		$this->user->insert($data);

		return ($this->user->insertID) ? $this->successResponse('Usuario creado exitosamente', $data) : $this->failResponse('No se pudo crear el usuario', 404, $this->user);
	}

	/**
	 * [show description]
	 * @return [type] [description]
	 */
	public function show($id = null) {
		$user = $this->user->find($id);

		return ($user) ? $this->successResponse('Usuario encontrado', $user) : $this->failResponse('Usuario no encontrado', 404, $user);
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id = null) {
		$data = ['user' => $this->user->where('id', $id)->first()];

		return view('user/edit', $data);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id = null) {
		$data = $this->request->getJSON(true);
		$user = $this->user->update($id, $data);

		return ($user) ? $this->successResponse('Usuario editado exitosamente', $data) : $this->failResponse('No se pudo editar el Usuario', 404, $user);
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id = null) {
		$user = $this->user->where('id', $id)->delete();

		return ($user) ? $this->successResponse('Usuario eliminado exitosamente', '') : $this->failResponse('No se pudo eliminar el usuario', 404, '');
	}
}

/* End of file Users.php */
/* Location: ..app/Controllers/Users.php */