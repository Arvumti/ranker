<?php

// Importing the BotDetectCaptcha class
use LaravelCaptcha\Integration\BotDetectCaptcha;

class CaptchaController extends BaseController {

	//protected $layout = 'layouts.master';

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
		if (Session::has('usuario') == true)
			return Redirect::to('/principal');
		$captcha = $this->getLoginCaptchaInstance();

		// passsing Captcha Html to register view

		return View::make('index', array('captchaHtml' => $captcha->Html()));									
	}

	public function postLogin() {
		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = Input::get('CaptchaCode');
		$isHuman = $captcha->Validate($code);
		if ($isHuman) 
		{
			$mail = Input::get('username');
			$pass = Input::get('password');

			$usuarios = DB::select(DB::raw("
											SELECT idAlias, password, nombre, correo, pais, estado
											FROM alias
											WHERE nombre = '{$mail}'
											AND password = '{$pass}'
										"));

			if(count($usuarios) == 1 && $usuarios[0]->correo == $mail && $usuarios[0]->password == $pass) {
				$usuario = $usuarios[0];
				$usuario->front = Array('nombre' => $usuario->nombre, 'correo' => $usuario->correo, 'estado' => $usuario->estado, 'pais' => $usuario->pais);
				Session::put('usuario', $usuario);
				return Response::json(Array('usuario' => $usuario->front));
			}
			else
				return Response::json(Array('captchaHtml' => $captcha->Html(), 'errmsg' => "El usuario y/o contraseña no son correctos"));
		}
		else
			return Response::json(Array('captchaHtml' => $captcha->Html(), 'errmsg' => "Codigo incorrecto. Intente de nuevo."));		
	}

	public function getCrearCuenta() {
		$captcha = $this->getLoginCaptchaInstance();

		// passsing Captcha Html to register view

		$data = Array();
		$data['paises'] = Pais::all();
		$data['ubicaciones'] = Ubicacion::all();
		$data['captchaHtml'] = $captcha->Html();

		return View::make('/index')->with('data', $data);									
	}

	public function postCrearCuenta() {
		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();

		// validate the user-entered Captcha code when the form is submitted
		$code = Input::get('CaptchaCode');
		$isHuman = $captcha->Validate($code);
		if ($isHuman) {
			if(Input::get("politicas") == false)
				return Redirect::back()->withInput(Input::except('password'))->withErrors(Array('politicas' => 'Se deben aceptar las politicas de uso'));
			
			if(Input::get("password") != Input::get("password_rep") && strlen(Input::get("password")) > 0 && strlen(Input::get("password_rep")) > 0)
				return Redirect::back()->withInput(Input::except('password'))->withErrors(Array('pass' => 'Las contraseñas no coinciden'));

			$alia = new Alia;
			$alia->nombre = Input::get("alias");
			$alia->correo = Input::get("alias");
			$alia->password = Input::get("password");
			$alia->pais = Input::get("pais");
			$alia->estado = Input::get("estado");

			if ($alia->save()){
				$usuarios = DB::select(DB::raw(	"
													SELECT idAlias, password, nombre, correo, pais, estado
													FROM alias
													WHERE correo = '{$alia->correo}'
													AND password = '{$alia->password}'
												"));

				$usuario = $usuarios[0];
				//$usuario->ubicacion
				$usuario->front = Array('nombre' => $usuario->nombre, 'correo' => $usuario->correo, 'pais' => $usuario->pais, 'estado' => $usuario->estado);
				Session::put('usuario', $usuario);
				return Response::json(Array('ok' => 1));//;Redirect::to('/principal');
			}

			return Redirect::back()->withInput(Input::except('password'))->withErrors($alia->getErrors());
		}
		else
			return Redirect::back()->withInput(Input::except('password'))->withErrors("Codigo incorrecto. Intente de nuevo.");
	}

	public function getCrearPerfil() {
		$captcha = $this->getLoginCaptchaInstance();

		$data = Array();
		$data['ubicaciones'] = Ubicacion::all();
		$data['mascaras'] = Mascara::all();
		$data['perfil'] = new Perfil;
		$data['perfil']->masks = Array();
		$data['captchaHtml'] = $captcha->Html();

		return View::make('crear_perfil')->with('data', $data);
	}

	public function postCrearPerfil() {
		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();
		$data = Input::except('password');
		if(isset($data->mascaras))
			$data->masks = explode(",", $data->mascaras);

		// validate the user-entered Captcha code when the form is submitted
		$code = Input::get('CaptchaCode');
		$isHuman = $captcha->Validate($code);
		if ($isHuman) 
		{
			$data = Input::all();
			$image = null;
			if(Input::hasFile('foto'))
				$image = GetNameImage('p_');
			
			$perfil = new Perfil;
			$perfil->nombre = Input::get("nombre");
			$perfil->apaterno = Input::get("apaterno");
			$perfil->amaterno = Input::get("amaterno");
			$perfil->confesion = '';//Input::get("confesion");
			$perfil->facebook = Input::get("facebook");
			$perfil->twitter = Input::get("twitter");
			$perfil->instagram = Input::get("instagram");
			$perfil->secret = "";//Input::get("secret");
			$perfil->secret_pub = "";//Input::get("secret");
			$perfil->pais = Input::get("pais");
			$perfil->estado = Input::get("estado");
			$perfil->municipio = Input::get("municipio");
			$perfil->ciudad = Input::get("ciudad");
			$perfil->colonia = Input::get("colonia");
			$perfil->mascaras = Input::get("mascaras");
			$perfil->idAlias = Session::get('usuario')->idAlias;
			$perfil->foto = $image;

			if ($perfil->save()) {
				$mascaras = explode(",", Input::get("mascaras"));
				for ($i=0; $i < count($mascaras); $i++) { 

					$mascaraPublica = new MascaraPublica;
					$mascaraPublica->idPerfil = $perfil->id;
					$mascaraPublica->idAlias = Session::get('usuario')->idAlias;
					$mascaraPublica->nombre = $mascaras[$i];
					$mascaraPublica->save();
				}

				$apodos = explode(",", Input::get("apodos"));
				for ($i=0; $i < count($apodos); $i++) { 

					$apodoPublica = new ApodoPublico;
					$apodoPublica->idPerfil = $perfil->id;
					$apodoPublica->idAlias = Session::get('usuario')->idAlias;
					$apodoPublica->apodo = $apodos[$i];
					$apodoPublica->save();
				}
				/*$mascaras = Array(Input::get("mascara1"), Input::get("mascara2"), Input::get("mascara3"));
				for ($i=0; $i < count($mascaras); $i++) { 
					if($mascaras[$i] == 0)
						continue;
					$mascaraPerfil = new MascaraPerfil;
					$mascaraPerfil->idPerfil = $perfil->id;
					$mascaraPerfil->idMascara = $mascaras[$i];
					$mascaraPerfil->save();
				}*/

				if(Input::hasFile('foto'))
					Input::file('foto')->move(public_path().'/img/db_imgs/', $image);
				return Redirect::to('/perfiles');
			}

			return Redirect::back()->withInput(Input::except('password'))->withErrors($perfil->getErrors());
		}
		else
			return Redirect::back()->withInput(Input::except('password'))->withErrors("Codigo incorrecto. Intente de nuevo.");
	}

	public function getCrearPerfilMadison() {
		$captcha = $this->getLoginCaptchaInstance();

		$data = Array();
		$data['ubicaciones'] = Ubicacion::all();
		$data['mascaras'] = Mascara::all();
		$data['perfil'] = new Perfil;
		$data['perfil']->masks = Array();
		$data['captchaHtml'] = $captcha->Html();

		return View::make('madison')->with('data', $data);
	}

	public function postCrearPerfilMadison() {
		// captcha instance of the login page
		$captcha = $this->getLoginCaptchaInstance();
		$data = Input::except('password');
		if(isset($data->mascaras))
			$data->masks = explode(",", $data->mascaras);

		// validate the user-entered Captcha code when the form is submitted
		$code = Input::get('CaptchaCode');
		$isHuman = true;//$captcha->Validate($code);
		if ($isHuman) 
		{
			$data = Input::all();
			$image = null;
			if(Input::hasFile('foto'))
				$image = GetNameImage('p_');
			
			$perfil = new Perfil;
			$perfil->nombre = Input::get("nombre");
			$perfil->apaterno = Input::get("apaterno");
			$perfil->amaterno = Input::get("amaterno");
			$perfil->confesion = '';//Input::get("confesion");
			$perfil->facebook = Input::get("facebook");
			$perfil->twitter = Input::get("twitter");
			$perfil->instagram = Input::get("instagram");
			$perfil->secret = "";//Input::get("secret");
			$perfil->secret_pub = "";//Input::get("secret");
			$perfil->pais = Input::get("pais");
			$perfil->estado = Input::get("estado");
			$perfil->municipio = Input::get("municipio");
			$perfil->ciudad = Input::get("ciudad");
			$perfil->colonia = Input::get("colonia");
			$perfil->mascaras = Input::get("mascaras");
			$perfil->idAlias = Session::get('usuario')->idAlias;
			$perfil->foto = $image;

			if ($perfil->save()) {
				$mascaras = explode(",", Input::get("mascaras"));
				for ($i=0; $i < count($mascaras); $i++) { 

					$mascaraPublica = new MascaraPublica;
					$mascaraPublica->idPerfil = $perfil->id;
					$mascaraPublica->idAlias = Session::get('usuario')->idAlias;
					$mascaraPublica->nombre = $mascaras[$i];
					$mascaraPublica->save();
				}

				$apodos = explode(",", Input::get("apodos"));
				for ($i=0; $i < count($apodos); $i++) { 

					$apodoPublica = new ApodoPublico;
					$apodoPublica->idPerfil = $perfil->id;
					$apodoPublica->idAlias = Session::get('usuario')->idAlias;
					$apodoPublica->apodo = $apodos[$i];
					$apodoPublica->save();
				}
				/*$mascaras = Array(Input::get("mascara1"), Input::get("mascara2"), Input::get("mascara3"));
				for ($i=0; $i < count($mascaras); $i++) { 
					if($mascaras[$i] == 0)
						continue;
					$mascaraPerfil = new MascaraPerfil;
					$mascaraPerfil->idPerfil = $perfil->id;
					$mascaraPerfil->idMascara = $mascaras[$i];
					$mascaraPerfil->save();
				}*/

				if(Input::hasFile('foto'))
					Input::file('foto')->move(public_path().'/img/db_imgs/', $image);
				return Redirect::to('/perfiles');
			}

			return Redirect::back()->withInput(Input::except('password'))->withErrors($perfil->getErrors());
		}
		else
			return Redirect::back()->withInput(Input::except('password'))->withErrors("Codigo incorrecto. Intente de nuevo.");
	}
}
