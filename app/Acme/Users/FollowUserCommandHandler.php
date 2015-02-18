<?php namespace Acme\Users;

use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler
{
	/**
	* @var userRepository
	*/
	protected $userRepo;

	/**
	* @param UserRepository $userRepo
	*/

	function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	/**
	* Handle the command
	*
	* @param $command
	* @return mixed
	*/

	public function handle($command)
	{
		$user = $this->userRepo->findById($command->userId);

		$this->userRepo->follow($command->userIdToFollow, $user);

		return $user;
	}
}
