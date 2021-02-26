<?php

namespace App\Controllers;

use App\Models\Project;

class Projects extends BaseController {
	public $project;

	public function __construct() {
		$this->project = new Project();
	}

	public function index() {
		return view('project/index');
	}

	/**
	 * [new description]
	 * @return [type] [description]
	 */
	public function new () {
		return view('project/new');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create() {

	}

	/**
	 * [show description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id) {
		$project = $this->project->find($id);

		return ($project) ? $this->successResponse('Proyecto encontrado', $project) : $this->failResponse('Proyecto no encontrada', 404, $project);
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id) {

	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id) {

	}

	/**
	 * [remove description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function remove($id) {

		/**
		 * [delete description]
		 * @param  [type] $id [description]
		 * @return [type]     [description]
		 */
	}public function delete($id) {

	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all() {
		$projects = $this->project->orderBy('id', 'asc')->findAll();

		return ($projects) ? $this->successResponse('Datos encontrados', $projects) : $this->failResponse('Sin datos disponibles', 404, $projects);
	}
}

/* End of file Projects.php */
/* Location: ..app/Controllers/Projects.php */