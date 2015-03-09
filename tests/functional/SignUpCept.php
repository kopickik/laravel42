<?php 

$I = new FunctionalTester($scenario);

$I->wantTo('sign up for a larabook account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'JohnDoe3');
$I->fillField('Email:', 'JohnDoe3@example.com');
$I->fillField('Password:', 'secret2');
$I->fillField('Password Confirmation:', 'secret2');
$I->click('Register');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook.');

$I->seeRecord('users', [
	'username' => 'JohnDoe3',
	'email' => 'JohnDoe3@example.com'
	]);

$I->assertTrue(Auth::check());
