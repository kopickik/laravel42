<?php namespace Acme\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Acme\Registration\Events\UserHasRegistered;
use Eloquent, Hash;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

	protected $fillable = array('username', 'email', 'password');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	* The path to a presenter (gravatar in this case) for the model
	*/
	protected $presenter = 'Acme\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/*
	* HASH THE INPUTTED PASSWORD, AFTER MAKING SURE IT MATCHES PASSWORD_CONFIRMATION
	*/

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	* A user has many statuses
	* @return mixed
	*/
	public function statuses()
	{
		return $this->hasMany('Acme\Statuses\Status')->latest();
	}

	public static function register($username, $email, $password) {
		$user = new static(compact('username','email','password'));

		// raise an event
		$user->raise(new UserHasRegistered($user));

		return $user;

	}

	/**
	* Determine if the given user is the same as the current one.
	*
	* @param $user
	* @return bool
	*/
	public function is($user)
	{
		if (is_null($user)) return false;
		return $this->username == $user->username;
	}

	public function comments()
	{
		return $this->hasMany('Acme\Statuses\Comment');
	}

}
