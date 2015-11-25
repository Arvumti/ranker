<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
// Importing the BotDetectCaptcha class
use LaravelCaptcha\Integration\BotDetectCaptcha;

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

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	// get captcha instance to handle for the register page
	private function getRegisterCaptchaInstance() {
		// Captcha parameters:
		$captchaConfig = [
			'CaptchaId' => 'RegisterCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/RegisterCaptchaConfig.php', // path of the Captcha config file inside your Controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}

	public function getRegister()
	{
		// captcha instance of the register page
		$captcha = $this->getRegisterCaptchaInstance();

		// passing Captcha Html to register view
		return view('auth.register', ['captchaHtml' => $captcha->Html()]);
	}

	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		// captcha instance of the register page
		$captcha = $this->getRegisterCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = $request->input('CaptchaCode');
		$isHuman = $captcha->Validate($code);

		if (!$isHuman || $validator->fails()) 
		{
			if (!$isHuman) 
			{
				$validator->errors()->add('CaptchaCode', 'Wrong code. Try again please.');
			}

			return redirect()
						->back()
						->withInput()
						->withErrors($validator->errors());
		}

		$this->auth->login($this->registrar->create($request->all()));

		return redirect($this->redirectPath());
	}

	// get captcha instance to handle for the login page
	private function getLoginCaptchaInstance() {
		// Captcha parameters:
		$captchaConfig = [
			'CaptchaId' => 'LoginCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/LoginCaptchaConfig.php', // path of the Captcha config file inside your Controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}

	public function getLogin()
	{
		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();

		// passing Captcha Html to login view
		return view('auth.login', ['captchaHtml' => $captcha->Html()]);
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 
			'password' => 'required',
			'CaptchaCode' => 'required'
		]);

		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = $request->input('CaptchaCode');
		$isHuman = $captcha->Validate($code);

		$errorMessages = [];

		if ($isHuman) 
		{
			$credentials = $request->only('email', 'password');
			if ($this->auth->attempt($credentials, $request->has('remember'))) 
			{
				return redirect()->intended($this->redirectPath());
			}
			else 
			{
				$errorMessages = ['email' => $this->getFailedLoginMesssage()];
			}
		} 
		else 
		{
			$errorMessages = ['CaptchaCode' => 'Wrong code. Try again please.'];
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors($errorMessages);
	}

}
