<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
// Importing the BotDetectCaptcha class
use LaravelCaptcha\Integration\BotDetectCaptcha;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}

	// get captcha instance to handle for the reset password page
	private function getResetPasswordCaptchaInstance() {
		// Captcha parameters:
		$captchaConfig = [
			'CaptchaId' => 'ResetPasswordCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/ResetPasswordCaptchaConfig.php', // path of the Captcha config file inside your Controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}


	public function getEmail()
	{
		// captcha instance of the reset password page
		$captcha = $this->getResetPasswordCaptchaInstance();

		// passing Captcha Html to reset password view
		return view('auth.password', ['captchaHtml' => $captcha->Html()]);
	}

	public function postEmail(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'CaptchaCode' => 'required',
		]);

		// captcha instance of the reset password page
		$captcha = $this->getResetPasswordCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = $request->input('CaptchaCode');
		$isHuman = $captcha->Validate($code);

		$errorMessages = [];

		if ($isHuman) 
		{
			$response = $this->passwords->sendResetLink($request->only('email'), function($m)
			{
				$m->subject($this->getEmailSubject());
			});

			switch ($response)
			{
				case PasswordBroker::RESET_LINK_SENT:
					return redirect()->back()->with('status', trans($response));

				case PasswordBroker::INVALID_USER:
					return redirect()->back()->withErrors(['email' => trans($response)]);
			}
		} 
			
		return redirect()
					->back()
					->withErrors(['CaptchaCode' => 'Wrong code. Try again please.']);
	}

}
