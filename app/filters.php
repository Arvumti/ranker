<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request) {
	if(!Session::has('locale'))
		Session::put('locale', 'en');

	//var_dump(Session::get('locale'));
	App::setLocale(Session::get('locale'));

	/*$url = explode('.', $request->server('HTTP_HOST'));
    $langcode = $url[0];
 
	$languages = ['en','es'];
 
    if ( in_array($langcode, $languages) ){
        App::setLocale($langcode);
    }*/

    if( (Request::is('login') && Request::isMethod('post')) || 
		(strrpos(Request::path(), 'unmask') !== false && Request::isMethod('get')) ||
		(strrpos(Request::path(), 'idioma/') !== false && Request::isMethod('get')) ||
		(strrpos(Request::path(), 'captcha_resource/get/') !== false && Request::isMethod('get')) ||
		(strrpos(Request::path(), 'captcha_handler/') !== false && Request::isMethod('get')) ||
		(strrpos(Request::path(), 'paises/') !== false && Request::isMethod('get')) ||
		(strrpos(Request::path(), 'mascaras/') !== false && Request::isMethod('get')) ||
		(strrpos(Request::path(), 'estados/') !== false && Request::isMethod('get')) ||
		(strrpos(Request::path(), 'estadoz/') !== false && Request::isMethod('get')) ||
		(Request::is('crear_cuenta') && Request::isMethod('get')) ||
		(Request::is('crear_cuenta') && Request::isMethod('post')) ) {}
	else
		if(Request::path() != '/')
			if(Session::has('usuario') == false)
				return Redirect::to('/');
});


App::after(function($request, $response) {
	error_log('Some message here.');
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
