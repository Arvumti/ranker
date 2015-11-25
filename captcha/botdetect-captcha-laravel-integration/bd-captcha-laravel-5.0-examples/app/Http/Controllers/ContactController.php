<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Validator;
// Importing the BotDetectCaptcha class
use LaravelCaptcha\Integration\BotDetectCaptcha;

class ContactController extends Controller {

	// get a captcha instance to handle for the contact page
	private function getContactCaptchaInstance() {
		// Captcha parameters
		$captchaConfig = [
			'CaptchaId' => 'ContactCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/ContactCaptchaConfig.php',  // path of the Captcha config file inside your Controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}

	public function getContact() 
	{
		// get contact captcha instance
		$captcha = $this->getContactCaptchaInstance();

		// passing Captcha Html to contact view
		return view('contact', ['captchaHtml' => $captcha->Html()]);
	}

	public function postContact()
	{
		// get contact captcha instance
		$captcha = $this->getContactCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = Request::input('CaptchaCode');
		$isHuman = $captcha->Validate($code);

	    $validator  = Validator::make(Request::all(), [
	        'name' => 'required|min:5',
	        'email'	=> 'required|email',
	        'subject' => 'required|min:10',
	        'message' => 'required|min:20',
	    ]);

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

	    // Captcha validation passed
	    // TODO: send email
	    
	    return redirect()
	    			->back()
              		->with('status', 'Your message was sent successfully.');
	}

}
