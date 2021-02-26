<?php

namespace App\Libraries;

/**
 * summary
 */
class Hash {

	/**
	 * [make description]
	 * @param  String $password [description]
	 * @return [type]           [description]
	 */
	public static function make(String $password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	/**
	 * [check_password description]
	 * @param  String $password    [description]
	 * @param  String $db_password [description]
	 * @return [type]              [description]
	 */
	public static function check_password(String $password, String $db_password) {
		if (password_verify($password, $db_password)) {
			return TRUE;
		}

		return FALSE;
	}
}