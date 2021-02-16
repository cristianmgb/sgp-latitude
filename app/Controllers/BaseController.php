<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;

class BaseController extends Controller
{
	use ResponseTrait;

	/**
	 * @var string[]
	 */
	public $supportedResponseFormats = [
		'application/json'
	];


	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['security', 'url', 'form', 'html'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
	}

	/**
	 * [successResponse description]
	 * @param  [type] $message [description]
	 * @param  [type] $data    [description]
	 * @return [type]          [description]
	 */
	public function successResponse ( $message, $data ){

		$options = [
		    'status' 	 => 'OK',
			'statusCode' => 200,
			'message'    => $message,
			'data'       => $data
		];

		return $this->response->setJSON($options);
	}

	/**
	 * [failResponse description]
	 * @param  [type] $cod     [description]
	 * @param  [type] $message [description]
	 * @param  [type] $data    [description]
	 * @return [type]          [description]
	 */
	public function failResponse ( $cod, $message, $data ){

		$options = [
		    'status' 	 => 'ERROR',
			'statusCode' => $cod,
			'message'    => $message,
			'data'       => $data
		];

		return $this->response->setJSON($options);
	}
}