<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
	
	protected $redirectPath = 'auth/handle-registration';
	protected $loginPath = 'fail';

//To validate username instead of email
	protected $username = 'username';

//Set redirect path after logout
	protected $redirectAfterLogout = 'auth/login';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		//$this->middleware('guest', ['except' => 'getLogout']);
	}

public function postLogin(Request $request)
	{
		$this->validate($request, [
			$this->loginUsername() => 'required', 'password' => 'required',
		]);

		$credentials = $this->getCredentials($request);

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->action('ToDoListController@show',[$this->loginUsername()]);
		}

		return redirect($this->loginPath())
					->withInput($request->only($this->loginUsername(), 'remember'))
					->withErrors([
						$this->loginUsername() => $this->getFailedLoginMessage(),
					]);
	}

public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'password');
    }

public function getLogout()
    {
        $this->auth->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}

