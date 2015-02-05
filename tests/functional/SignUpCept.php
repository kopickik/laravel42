<?php 

$I = new FunctionalTester($scenario);

$I->wantTo('sign up for a larabook account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'JohnDoe');
$I->fillField('Email:', 'JohnDoe@example.com');
$I->fillField('Password:', 'secret');
$I->fillField('Password Confirmation:', 'secret');
$I->click('Register');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook.');

$I->seeRecord('users', [
	'username' => 'JohnDoe',
	'email' => 'JohnDoe@example.com'
	]);

$I->assertTrue(Auth::check());
