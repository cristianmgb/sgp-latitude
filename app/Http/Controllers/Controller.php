<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * [get_states description]
     * @return [type] [description]
     */
    public function get_states()
    {
    	return [
    		''  => 'Seleccionar',
    		'1' => 'Activo',
    		'2' => 'Inactivo'
    	];
    }
}