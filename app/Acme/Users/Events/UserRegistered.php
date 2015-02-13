<?php namespace Acme\Users\Events;

use Acme\Users\User;

class UserRegistered {
	public $user;

	public function __construct(User $user) {
		$this->user = $user;
	}


}
