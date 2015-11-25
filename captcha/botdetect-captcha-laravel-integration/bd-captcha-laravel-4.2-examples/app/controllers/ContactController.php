<?php

// Importing the BotDetectCaptcha class
use LaravelCaptcha\Integration\BotDetectCaptcha;

class ContactController extends BaseController {

	// get a captcha instance to handle for the contact page
	private function getContactCaptchaInstance() {
		// Captcha parameters
		$captchaConfig = [
			'CaptchaId' => 'ContactCaptcha', // a unique Id for the Captcha instance
			'UserInputId' => 'CaptchaCode', // Id of the Captcha code input textbox
			'CaptchaConfigFilePath' => 'captcha_config/ContactCaptchaConfig.php', // path of the Captcha config file inside your controllers folder
		];
		$captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

		return $captcha;
	}

	public function getContact() {
		// captcha instance of the contact page
		$captcha = $this->getContactCaptchaInstance();

		// passing Captcha Html to contact view
		return View::make('contact', array('captchaHtml' => $captcha->Html()));
	}

	public function postContact() {
		// captcha instance of the contact page
		$captcha = $this->getContactCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = Input::get('CaptchaCode');
		$isHuman = $captcha->Validate($code);

	    $validator  = Validator::make(Input::all(), array(
		        'name' => 'required|min:5',
		        'email'	=> 'required|email',
		        'subject' => 'required|min:10',
		        'message' => 'required|min:20',
		    )
	    );

	    if (!$isHuman || $validator->fails()) 
	    {
	    	if (!$isHuman)
	        {
	          	$validator->errors()->add('CaptchaCode', 'Wrong code. Try again please.');
	        }

	        return Redirect::to('contact')
		                ->withInput()
		                ->withErrors($validator->errors());
	    }

	    // Captcha validation passed
	    // TODO: send email

	    return Redirect::to('contact')
              			->with('status', 'Your message was sent successfully.');
	}

}
