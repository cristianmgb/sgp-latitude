<?php

namespace App\Controllers;

class Auth extends BaseController
{
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function login()
	{
		return view('auth/login');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function logout()
	{
		return view('auth/login');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function forget()
	{
		return view('auth/forget');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function add()
	{
		//
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function change_password()
	{
		//
	}

}

/* End of file Auth.php */
/* Location: ./app/Controllers/Auth/Auth.php */