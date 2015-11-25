<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
// Importing the BotDetectCaptcha class
use LaravelCaptcha\Integration\BotDetectCaptcha;

class ExampleController extends Controller {

	// get a captcha instance to handle for the example page
	private function getExampleCaptchaInstance() {
		// Captcha parameters
		$captchaConfig = [
			'CaptchaId' => 'ExampleCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/ExampleCaptchaConfig.php', // path of the Captcha config file inside your Controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}

	public function getExample() 
	{
		// captcha instance of the example page
		$captcha = $this->getExampleCaptchaInstance();
		
		// passing Captcha Html to example view
		return view('example', ['captchaHtml' => $captcha->Html()]);
	}

	public function postExample() 
	{
		// captcha instance of the example page
		$captcha = $this->getExampleCaptchaInstance();
		
		// validate the user-entered Captcha code when the form is submitted
		$code = Request::input('CaptchaCode');
		$isHuman = $captcha->Validate($code);

		if ($isHuman) 
		{
			// Captcha validation passed
			// TODO: continue with form processing, knowing the submission was made by a human
			return redirect()
						->back()
						->with('status', 'CAPTCHA validation passed, human visitor confirmed!');	
		}
		
		// Captcha validation failed, return an error message
		return redirect()
					->back()
					->withErrors(['CaptchaCode' => 'CAPTCHA validation failed, please try again.']);
	}
}
