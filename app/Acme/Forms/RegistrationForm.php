<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {
	protected $rules = array(
		'username' => 'required|unique:users',
		'email' => 'required|unique:users',
		'password' => 'required|confirmed'
		);
}
