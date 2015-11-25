<?php

// Importing the BotDetectCaptcha class
use LaravelCaptcha\Integration\BotDetectCaptcha;

class UsersController extends BaseController {

	protected $layout = 'layouts.master';

	// get a captcha instance to handle for the register page
	private function getRegisterCaptchaInstance() {
		// Captcha parameters
		$captchaConfig = [
			'CaptchaId' => 'RegisterCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/RegisterCaptchaConfig.php', // path of the Captcha config file inside your controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}

	public function getRegister() {
		// captcha instance of the register page
		$captcha = $this->getRegisterCaptchaInstance();

		// passsing Captcha Html to register view
		$this->layout->content = View::make('users.register', array('captchaHtml' => $captcha->Html()));
	}

	public function postRegister() {
		// captcha instance of the register page
		$captcha = $this->getRegisterCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = Input::get('CaptchaCode');
		$isHuman = $captcha->Validate($code);

	    $validator  = Validator::make(Input::all(), array(
		        'name' => array('required', 'alpha', 'min:5'),
		        'email'	=> array('required', 'email', 'unique:users'),
		        'password' => array('required', 'between:6,30', 'confirmed'),
		        'password_confirmation' => array('required', 'between:6,30')
		    )
	    );

	    if (!$isHuman || $validator->fails()) 
	    {
	    	if (!$isHuman)
	    	{
	    		 $validator->errors()->add('CaptchaCode', 'Wrong code. Try again please.');
	    	}

	    	return Redirect::to('users/register')
                            	->withInput()
                            	->withErrors($validator->errors());
	    }

	    // Captcha validation passed
	    // Save new user
    	$user = new User;
    	$user->name = Input::get('name');
    	$user->email = Input::get('email');
    	$user->password = Hash::make(Input::get('password'));
    	$user->save();
	    
	    return Redirect::to('users/register')
                        	->with('status', 'Thank you. You have successfully registerd.');
	}

	// get a captcha instance to handle for the login page
	private function getLoginCaptchaInstance() {
		// Captcha parameters
		$captchaConfig = [
			'CaptchaId' => 'LoginCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/LoginCaptchaConfig.php', // path of the Captcha config file inside your controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}

	public function getLogin() {
		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();

		// passing Captcha Html to login view
		$this->layout->content = View::make('users.login', array('captchaHtml' => $captcha->Html()));										
	}

	public function postLogin() {
		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = Input::get('CaptchaCode');
		$isHuman = $captcha->Validate($code);

		$rememberMe = (Input::get('remember_me') == 'on') ? true : false;
		$errorMessages = array();

		if ($isHuman) 
		{
			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), $rememberMe)) 
			{
				return Redirect::to('users/dashboard');
			}
			else
			{
				$errorMessages = array('email' => 'The email or password you entered is incorrect, please try again.');
			}
		}
		else
		{
			$errorMessages = ['CaptchaCode' => 'Wrong code. Try again please.'];
		}

		return Redirect::to('users/login')
						->withInput(Input::except('password'))
						->withErrors($errorMessages);
	}

	public function getDashboard() {
     	$this->layout->content = View::make('users.dashboard');
	}

	public function getLogout() {
	    Auth::logout();
	    return Redirect::to('users/login');
	}

	
}
