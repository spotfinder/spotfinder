<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
// Establish constants for user roles keep in the user table as role_id
	const ROLE_ADMIN = 1;
	const ROLE_STAND = 2;

	public static $ROLES = array(
		array('id' => 1, 'name' => 'Admin'),
		array('id' => 2, 'name' =>'Stand')
	);

// Validation rules
    public static $signin_rules = array(
    	'email'     => 'required|max:100',
    	'password'  =>  'required|max:200'		
	);

	public static $signup_rules = array(
    	'email'     => 'required|max:100',
    	'password'  =>  'required|min:6|max:200|confirmed',
    	'password_confirmation' => 'min:6',
    	'phone_number' => 'required|min:10'

	);

	public static $admin_user_rules = array(
		'role_id'   => 'required|max: 1',
    	'email'     => 'required|max:100',
    	'password'  => 'required|min:6|confirmed',
    	'password'  =>  'min:6',
    	'phone_number' => 'required|min:10',

	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Mutator sets email to lowercase
	 *
	 */
	public function setEmailAttribute($value) {
    	$this->attributes['email'] = strtolower($value);
	}

	/**
	 * Mutator to hash all passwords
	 *
	 */
	public function setPasswordAttribute($value) {
    	$this->attributes['password'] = Hash::make($value);
	}

	public function isAdmin()
	{
    	return $this->role_id == self::ROLE_ADMIN;

	}

	 public static function totalCount(){
        
        return $users = DB::table('users')->count();
    }

    public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

}