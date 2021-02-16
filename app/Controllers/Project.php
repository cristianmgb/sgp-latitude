<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Project extends BaseController
{
	public $project;

	public function __construct()
	{
		$this->project = new ProjectModel();
	}
	
	public function index()
	{
		return view('project/all');
	}

	/**
	 * [new description]
	 * @return [type] [description]
	 */
	public function new()
	{
		return view('project/new');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{

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

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	}public function delete( $id )
	{

	}

	/**
	 * [get_all description]
	 * @return [type] [description]
	 */
	public function get_all()
	{
		$projects = $this->project->orderBy('id', 'asc')->findAll();

		return ( $projects ) ? $this->successResponse( 'Datos encontrados', $projects ) : $this->failResponse( 'Sin datos disponibles', 404, $projects );
	}

	/**
	 * [get_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id ( $id = null )
	{
		$project = $this->project->find($id);

		return ( $project ) ? $this->successResponse( 'Proyecto encontrado', $project ) : $this->failResponse( 'Proyecto no encontrada', 404, $project );
	}
}

/* End of file Project.php */
/* Location: ..app/Controllers/Project.php */