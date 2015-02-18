<?php namespace Acme\Registration\Events;

use Acme\Users\User;

class UserRegistered 
{
	public $user;

	function __construct(User $user) {
		$this->user = $user;
	}
}
