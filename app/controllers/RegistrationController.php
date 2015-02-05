<?php

use Acme\Forms\RegistrationForm;
use Acme\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;

class RegistrationController extends \BaseController {

	/*
	* @var RegistrationForm
	*
	*/
	private $registrationForm;

	/*
	* @var CommandBus
	*
	*/
	private $commandBus;

	function __construct(CommandBus $commandBus, RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
		$this->commandBus = $commandBus;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	public function store()
	{
		// First time through: something like this would work.
		//$this->registrationForm->validate(Input::all());
		//$user = User::create(
		//	Input::only('username', 'email', 'password')
		//	);
		//Auth::login($user, $remember = false);

		// Or extract it out to commands being sent
		$this->registrationForm->validate(Input::all());
		extract(Input::only('username', 'email', 'password'));

		$user = $this->commandBus->execute(
			new RegisterUserCommand($username, $email, $password)
		);

		Auth::login($user, $remember = false);

		return Redirect::home();
	}



}
