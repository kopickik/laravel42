<?php namespace Acme\Users;

trait FollowableTrait {
	
	/**
	* Get the list of users that the current user follows.
	* @return mixed
	*/
	public function followedUsers()
	{
		return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
	}

	public function followers()
	{
		return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
	}

	/**
	* Determine if the current user follows another.
	*
	* @param User $user
	* @return bool
	*/
	public function isFollowedBy(User $otherUser)
	{
		$idWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');
		return in_array($this->id, $idWhoOtherUserFollows);
	}
}
