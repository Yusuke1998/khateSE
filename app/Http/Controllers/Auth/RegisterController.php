<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\People;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	use RegistersUsers;

	protected $redirectTo = '/home';

	public function __construct()
	{
		$this->middleware('guest');
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => ['required', 'string', 'max:191'],
			'last_name'  => ['required', 'string', 'max:191'],
			'email'      => ['required', 'string', 'email', 'max:191', 'unique:users'],
			'password'   => ['required', 'string', 'min:5', 'confirmed'],
			'type'		 => ['required', 'string']
		]);
	}

	protected function create(array $data)
	{
		$id = People::create([
			'first_name' => $data['first_name'],
			'last_name'  => $data['last_name'],
			'avatar'	 => 'user.png',
		]);

		return User::create([
			'email'      => $data['email'],
			'password'   => bcrypt($data['password']),
			'type'       => $data['type'],
			'people_id'  => $id->id
		]);
	}
}