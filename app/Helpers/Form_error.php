<?php

/**
 * [display_error description]
 * @param  [type] $validation [description]
 * @param  [type] $field      [description]
 * @return [type]             [description]
 */
function display_error($validation, $field) {
	if ($validation->hasError($field)) {
		return $validation->getError($field);
	} else {
		return FALSE;
	}
}
