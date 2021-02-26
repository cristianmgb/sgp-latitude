<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\User;

class Auth extends BaseController {

	public $user;

	public function __construct() {
		$this->user = new User();
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function index() {
		return view('auth/login');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function home() {
		return view('home');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function login() {

		$validation = $this->validate([
			'email' => [
				'label' => 'Correo electrónico',
				'rules' => 'required|valid_email|is_not_unique[users.email]',
			],
			'password' => [
				'label' => 'Contraseña',
				'rules' => 'required|min_length[5]',
			],
		]);

		if (!$validation) {
			return view('auth/login', ['validation' => $this->validator]);
		} else {

			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$user = $this->user->where('email', $email)->first();

			if (!Hash::check_password($password, $user['password'])) {
				session()->setFlashdata('fail', 'Clave incorrecta !!');
				return redirect()->to('auth/login')->withInput();
			} else {
				$data = [
					'first_name' => $user['first_name'],
					'last_name' => $user['last_name'],
					'email' => $user['email'],
					'phone' => $user['phone'],
					'state' => $user['state'],
					'logged_in' => TRUE,
				];

				session()->setFlashdata($data);
				return redirect()->to('/home')->with('success', 'Te has logeado exitosamente ' . $data['first_name'] . '!!');
			}

		}
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function logout() {
		var_dump(session()->getFlashdata());
		var_dump(session()->getFlashdata('logged_in'));
		die();
		// if (session()->has('logged_in')) {
		// 	session()->destroy();
		// 	return redirect()->to('/')->with('success', 'Has cerrado sesión correctamente');
		// }
	}

}

/* End of file Auth.php */
/* Location: ./app/Controllers/Auth/Auth.php */