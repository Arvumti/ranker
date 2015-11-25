<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use Underscore\Types\Arrays;

function GetNameImage($prefix) {
	$milliseconds = round(microtime(true) * 1000);
	$img_noticia = $prefix.date('ymdHis').$milliseconds.'.jpg';
	return $img_noticia;
}

Route::get('/idioma/{idioma}', function($idioma){
	Session::put('locale', $idioma);;
	return Redirect::to('/');
});

Route::get('/', 'CaptchaController@getLogin');
Route::post('/login', 'CaptchaController@postLogin');

Route::get('/crear_cuenta', 'CaptchaController@getCrearCuenta');
Route::post('/crear_cuenta', 'CaptchaController@postCrearCuenta');

Route::get('/crear_perfil', 'CaptchaController@getCrearPerfil');
Route::post('/crear_perfil', 'CaptchaController@postCrearPerfil');

Route::get('/crear_perfil/{id}', function($id) {
	$idAlias = Session::get('usuario')->idAlias;

	$data = Array();
	$data['ubicaciones'] = Ubicacion::all();
	$data['mascaras'] = Mascara::all();
	$data['perfil'] = Perfil::where('idPerfil', $id)->where('idAlias', $idAlias)->first();

	if(isset($data['perfil'])) {
		$mascaras = DB::select(DB::raw("
										SELECT GROUP_CONCAT(nombre) mascaras
										FROM mascaras_publicas
										WHERE idPerfil = {$id}
									"))[0];

		$apodos = DB::select(DB::raw("
										SELECT GROUP_CONCAT(apodo) apodos
										FROM apodos_publicos
										WHERE idPerfil = {$id}
									"))[0];

		$data['perfil']->masks = explode(",", $mascaras->mascaras);
		$data['perfil']->apods = explode(",", $apodos->apodos);

		$data['perfil']->mascaras = $mascaras->mascaras;
		$data['perfil']->apodos = $apodos->apodos;

		return View::make('update_perfil')->with('data', $data);
	}
	else {
		return Redirect::to('/perfiles');
	}
});

Route::post('/crear_perfil/{id}', function($id) {
	$data = Input::all();
	$idAlias = Session::get('usuario')->idAlias;

	DB::table('perfiles')
            ->where('idPerfil', $id)
            ->where('idAlias', $idAlias)
            ->update(array(
				'nombre' => Input::get("nombre"),
				'apaterno' => Input::get("apaterno"),
				'amaterno' => Input::get("amaterno"),
				'confesion' => Input::get("confesion"),
				'facebook' => Input::get("facebook"),
				'twitter' => Input::get("twitter"),
				'instagram' => Input::get("instagram"),
				'secret' => Input::get("secret"),
				'secret_pub' => Input::get("secret"),
				'pais' => Input::get("pais"),
				'estado' => Input::get("estado"),
				'municipio' => Input::get("municipio"),
				'ciudad' => Input::get("ciudad"),
				'colonia' => Input::get("colonia"),
				'mascaras' => Input::get("mascaras"),
            ));

    DB::table('mascaras_publicas')->where('idPerfil', $id)->delete();
    DB::table('apodos_publicos')->where('idPerfil', $id)->delete();

    $mascaras = explode(",", Input::get("mascaras"));
	for ($i=0; $i < count($mascaras); $i++) { 

		$mascaraPublica = new MascaraPublica;
		$mascaraPublica->idPerfil = $id;
		$mascaraPublica->idAlias = Session::get('usuario')->idAlias;
		$mascaraPublica->nombre = $mascaras[$i];
		$mascaraPublica->save();
	}

	$apodos = explode(",", Input::get("apodos"));
	for ($i=0; $i < count($apodos); $i++) { 

		$apodoPublica = new ApodoPublico;
		$apodoPublica->idPerfil = $id;
		$apodoPublica->idAlias = Session::get('usuario')->idAlias;
		$apodoPublica->apodo = $apodos[$i];
		$apodoPublica->save();
	}

    if(Input::hasFile('foto')) {
		$image = GetNameImage('p_');
		Input::file('foto')->move(public_path().'/img/db_imgs/', $image);

		DB::table('perfiles')
            ->where('idPerfil', $id)
            ->where('idAlias', $idAlias)
            ->update(array(
				'foto' => $image,
            ));
    }

	return Redirect::to('/perfiles');
});


Route::get('/unmask',function(){
	return View::make('unmask');
});



Route::get('/prueba', function() {

	return $route;
});

Route::get('/cuenta', function() {
	$idAlias = Session::get('usuario')->idAlias;
	$alias = Alia::where('idAlias', '=', $idAlias)->select('nombre', 'correo', 'idAlias')->first();

	return View::make('cuenta')->with('alias', $alias);
});

Route::get('/comentario/{id}', function($id) {
	$comentarios = DB::select(DB::raw("
										SELECT 	a.idComentario, a.idPerfil, a.idAlias, b.nombre, 
												a.comentario, a.created_at
										FROM comentarios a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										WHERE a.idPerfil = {$id}
										ORDER BY a.created_at DESC
									"));
	return $comentarios;
});

Route::post('/update_pass', function() {
	$data = Input::all();

	$idAlias = Session::get('usuario')->idAlias;
	$count = DB::table('alias')
		->where('idAlias', $idAlias)
        ->where('password', $data['contrasenia_act'])
        ->count();

    if($count == 1) {
		DB::table('alias')
	        ->where('idAlias', $idAlias)
	        ->update(array('password' => $data['contrasenia']));

	    return Redirect::back()->withInput()->withErrors(Array('error' => "{{Lang::get('messages.rouSccUpd_pass')}} "));
    }
	else
		return Redirect::back()->withInput()->withErrors(Array('error' => "{{Lang::get('messages.rouErrUpd_pass')}}"));
});

/*
	1.- Evidencia video 	:: video_evi	:: Medias
	2.- Evidencia foto 		:: imagen_evi	:: Medias
	3.- Post 		 		:: post			:: Posts
	4.- Video post 	 		:: video_post	:: Posts
	5.- Imagen post	 		:: imagen_post	:: FotosPosts
	6.- Comentario Subpost	:: com_subpost	:: Subcomentarios
	7.- Comentario Subpost	:: vid_subpost	:: Subcomentarios
	8.- Imagen Subpost		:: img_subpost	:: SubcomentariosFotos
*/
Route::post('/confiable', function() {
	$tipo = 0;
	switch (Input::get('tipo')) {
		case 'video_evi':
			$tipo = 1;
			break;
		case 'imagen_evi':
			$tipo = 2;
			break;
		case 'post':
			$tipo = 3;
			break;
		case 'video_post':
			$tipo = 4;
			break;
		case 'imagen_post':
			$tipo = 5;
			break;
		case 'com_subpost':
			$tipo = 6;
			break;
		case 'vid_subpost':
			$tipo = 7;
			break;
		case 'img_subpost':
			$tipo = 8;
			break;
		default:
			$tipo = 0;
			break;
	}

	$idAlias = Session::get('usuario')->idAlias;
	$count = DB::table('confiables')->where('idAlias', '=', $idAlias)
									->where('idRel', '=', Input::get('id'))
									->where('tipo', '=', $tipo)
									->count();

	if($count > 0)
		return 0;

	$confiable = new Confiable;
	$confiable->idAlias = $idAlias;
	$confiable->idRel = Input::get('id');
	$confiable->tipo = $tipo;
	$confiable->confiable = Input::get('conf');

	if($confiable->save())
		return 1;
	return 0;
});

Route::post('/subcomentario/{id}', function($id) {
	$data = Input::all();

	$idAlias = Session::get('usuario')->idAlias;
	$idPost = $id;

	$subcomentario = new Subcomentario;
	$subcomentario->idPost = $idPost;
	$subcomentario->idAlias = $idAlias;
	$subcomentario->link_evi = Input::get('link_evi');
	
	if(strlen($data['comentario']) > 0) {
		$subcomentario->comentario = $data['comentario'];
	}

	if(isset($data['video']) && strlen($data['video']) > 0) {
		if(strrpos($data['video'], 'youtube') == false)
			$video = $data['video'];
		else
			$video = explode ('v=', $data['video'])[1];

		$subcomentario->video = $video;
	}

	$subcomentario->save();

	for ($i=0; $i < count($data['files']); $i++) { 
		$file = $data['files'][$i];
		if($data['files'][$i] === null)
			continue;
		$image = GetNameImage('e_');

		$subcomentariofoto = new SubcomentarioFoto;
		$subcomentariofoto->idSubcomentario = $subcomentario->id;
		$subcomentariofoto->imagen = $image;

		if ($subcomentariofoto->save())
			$file->move(public_path().'/img/db_imgs/posts/', $image);
	}
	/*$subcomentario = new Subcomentario;
	$subcomentario->idPost = Input::get('id');
	$subcomentario->idAlias = Session::get('usuario')->idAlias;
	$subcomentario->texto = Input::get('texto');
	$subcomentario->tipo = Input::get('texto');

	if($subcomentario->save())
		return Array('usuario' => Session::get('usuario')->nombre, 'created_at' => $subcomentario->created_at);*/
	return 1;
});

Route::post('/comentario/{id}', function($id) {
	$comentario = new Comentario;
	$comentario->idPerfil = $id;
	$comentario->idAlias = Session::get('usuario')->idAlias;
	$comentario->comentario = Input::get('texto');

	if($comentario->save())
		return 1;
	return 0;
});

Route::get('/comentariopost/{id}/{tipo}', function($id, $tipo) {
	$comm_posts = DB::select(DB::raw("
										SELECT a.idComentarioPost, a.comentario, b.nombre usuario, a.created_at 
										FROM comentarios_posts a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										WHERE a.idPost = {$id}
										AND a.tipo = {$tipo}
										ORDER BY a.created_at DESC
									"));
	return $comm_posts;
});

Route::post('/comentariopost/{id}/{tipo}', function($id, $tipo) {
	$comentariopost = new ComentarioPost;
	$comentariopost->idAlias = Session::get('usuario')->idAlias;
	$comentariopost->idPost = $id;
	$comentariopost->comentario = Input::get('texto');
	$comentariopost->tipo = $tipo;

	if($comentariopost->save())
		return Array('usuario' => Session::get('usuario')->nombre, 'created_at' => $comentariopost->created_at);
	return 0;
});

Route::get('/comentariofoto/{id}', function($id) {
	$data = Array();

	$data['comentarios'] = DB::select(DB::raw("
										SELECT a.idComentarioFoto, a.comentario, b.nombre usuario, a.created_at 
										FROM comentarios_fotos a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										WHERE a.idFotoPost = {$id}
										ORDER BY a.created_at DESC
									"));
	$data['votos'] = DB::select(DB::raw("
										SELECT 	ROUND(SUM(COALESCE(corazon, 0))/5) corazon, ROUND(SUM(COALESCE(estrella, 0))/4) estrella, 
												ROUND(SUM(COALESCE(blike, 0))/3) blike, ROUND(SUM(COALESCE(carita, 0))/2) carita, ROUND(SUM(COALESCE(cake, 0))/1) cake,
												ROUND(SUM(COALESCE(caca, 0))/5) caca, ROUND(SUM(COALESCE(craneo, 0))/4) craneo, ROUND(SUM(COALESCE(bug, 0))/3) bug, 
												ROUND(SUM(COALESCE(gota, 0))/2) gota, ROUND(SUM(COALESCE(enojo, 0))/1) enojo
										FROM ranks_fotos
										WHERE idFotoPost = {$id}
									"))[0];

	$data['confiable'] = DB::select(DB::raw("
										SELECT 	SUM(CASE confiable WHEN 1 THEN 1 ELSE 0 END) siconf,
												SUM(CASE confiable WHEN 0 THEN 1 ELSE 0 END) noconf
										FROM confiables
										WHERE tipo = 5
										AND idRel = {$id}
									"))[0];

	return $data;
});

Route::get('/comentariomedia/{id}', function($id) {
	$data = Array();

	$data['comentarios'] = DB::select(DB::raw("
										SELECT a.idComentarioMedia, a.comentario, b.nombre usuario, a.created_at 
										FROM comentarios_medias a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										WHERE a.idMedia = {$id}
										ORDER BY a.created_at DESC
									"));
	$data['votos'] = DB::select(DB::raw("
										SELECT 	ROUND(SUM(COALESCE(corazon, 0))/5) corazon, ROUND(SUM(COALESCE(estrella, 0))/4) estrella, 
												ROUND(SUM(COALESCE(blike, 0))/3) blike, ROUND(SUM(COALESCE(carita, 0))/2) carita, ROUND(SUM(COALESCE(cake, 0))/1) cake,
												ROUND(SUM(COALESCE(caca, 0))/5) caca, ROUND(SUM(COALESCE(craneo, 0))/4) craneo, ROUND(SUM(COALESCE(bug, 0))/3) bug, 
												ROUND(SUM(COALESCE(gota, 0))/2) gota, ROUND(SUM(COALESCE(enojo, 0))/1) enojo
										FROM ranks_medias
										WHERE idMedia = {$id}
									"))[0];

	$data['confiable'] = DB::select(DB::raw("
										SELECT 	SUM(CASE confiable WHEN 1 THEN 1 ELSE 0 END) siconf,
												SUM(CASE confiable WHEN 0 THEN 1 ELSE 0 END) noconf
										FROM confiables
										WHERE tipo = 2
										AND idRel = {$id}
									"))[0];

	return $data;
});

Route::get('/comentariosub/{id}', function($id) {
	$data = Array();

	$data['comentarios'] = DB::select(DB::raw("
										SELECT a.idSubcomentarioFoto, a.comentario, b.nombre usuario, a.created_at 
										FROM comentarios_subfotos a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										WHERE a.idSubcomentarioFoto = {$id}
										ORDER BY a.created_at DESC
									"));
	$data['votos'] = DB::select(DB::raw("
										SELECT 	ROUND(SUM(COALESCE(corazon, 0))/5) corazon, ROUND(SUM(COALESCE(estrella, 0))/4) estrella, 
												ROUND(SUM(COALESCE(blike, 0))/3) blike, ROUND(SUM(COALESCE(carita, 0))/2) carita, ROUND(SUM(COALESCE(cake, 0))/1) cake,
												ROUND(SUM(COALESCE(caca, 0))/5) caca, ROUND(SUM(COALESCE(craneo, 0))/4) craneo, ROUND(SUM(COALESCE(bug, 0))/3) bug, 
												ROUND(SUM(COALESCE(gota, 0))/2) gota, ROUND(SUM(COALESCE(enojo, 0))/1) enojo
										FROM ranks_subfotos
										WHERE idSubcomentarioFoto = {$id}
									"))[0];

	$data['confiable'] = DB::select(DB::raw("
										SELECT 	SUM(CASE confiable WHEN 1 THEN 1 ELSE 0 END) siconf,
												SUM(CASE confiable WHEN 0 THEN 1 ELSE 0 END) noconf
										FROM confiables
										WHERE tipo = 8
										AND idRel = {$id}
									"))[0];

	return $data;
});

Route::post('/comentariofoto/{id}/{mod}', function($id, $mod) {
	$comm;

	switch ($mod) {
		case 'media':
			$comm = new ComentarioMedia;
			$comm->idMedia = $id;
			break;
		case 'post':
			$comm = new ComentarioFoto;
			$comm->idFotoPost = $id;
			break;
		case 'subcom':
			$comm = new ComentarioSubfoto;
			$comm->idSubcomentarioFoto = $id;
			break;
		default:
			return 0;
			break;
	}

	$comm->idAlias = Session::get('usuario')->idAlias;
	$comm->comentario = Input::get('texto');

	if($comm->save())
		return Array('usuario' => Session::get('usuario')->nombre, 'created_at' => $comm->created_at);
	return 0;
});

//Route:: get('/amparo')

Route::post('/fotos_publicas/{id}', function($id) {
	$data = Input::all();
	$idAlias = Session::get('usuario')->idAlias;

	for ($i=0; $i < count($data['fotos']); $i++) { 
		$count = DB::table('fotos_publicas')->where('idPerfil', '=', $id)->count();
		if($count >= 5)
			break;

		$file = $data['fotos'][$i];
		if($data['fotos'][$i] === null)
			continue;
		$image = GetNameImage('f_');

		$fotoPublica = new FotoPublica;
		$fotoPublica->idAlias = Session::get('usuario')->idAlias;
		$fotoPublica->foto = $image;
		$fotoPublica->idPerfil = $id;

		if ($fotoPublica->save())
			$file->move(public_path().'/img/db_imgs/publicas/', $image);
	}
	

	return Redirect::to('perfil/'.$id);
});

Route::post('/nombre_publico', function() {
	$data = Input::all();
	$idAlias = Session::get('usuario')->idAlias;

	$count1 = DB::table('nombres_publicos')->where('idPerfil', '=', Input::get("id"))->count();
	$count2 = DB::table('nombres_publicos')->where('idPerfil', '=', Input::get("id"))
											->where('nombre', '=', Input::get("nombre"))
											->count();

	if($count1 < 3 && $count2 == 0) {
		$nombrePublico = new NombrePublico;
		$nombrePublico->idPerfil = Input::get("id");
		$nombrePublico->idAlias = $idAlias;
		$nombrePublico->nombre = Input::get("nombre");

		$nombrePublico->save();
		return 1;
	}

	return 0;
});

Route::post('/apodo_publico', function() {
	$data = Input::all();
	$idAlias = Session::get('usuario')->idAlias;

	$count1 = DB::table('apodos_publicos')->where('idPerfil', '=', Input::get("id"))->count();
	$count2 = DB::table('apodos_publicos')->where('idPerfil', '=', Input::get("id"))
											->where('apodo', '=', Input::get("apodo"))
											->count();

	if($count1 < 3 && $count2 == 0) {
		$apodoPublico = new ApodoPublico;
		$apodoPublico->idPerfil = Input::get("id");
		$apodoPublico->idAlias = $idAlias;
		$apodoPublico->apodo = Input::get("apodo");

		$apodoPublico->save();
		return 1;
	}

	return 0;
});

Route::post('/mascara_publica', function() {
	$data = Input::all();
	$idAlias = Session::get('usuario')->idAlias;

	$count1 = DB::table('mascaras_publicas')->where('idPerfil', '=', Input::get("id"))->count();
	$count2 = DB::table('mascaras_publicas')->where('idPerfil', '=', Input::get("id"))
											->where('nombre', '=', Input::get("mascara"))
											->count();

	if($count1 < 10 && $count2 == 0) {
		$mascaraPublica = new MascaraPublica;
		$mascaraPublica->idPerfil = Input::get("id");
		$mascaraPublica->idAlias = $idAlias;
		$mascaraPublica->nombre = Input::get("mascara");

		$mascaraPublica->save();
		return 1;
	}

	return 0;
});

Route::post('/red_publica', function() {
	$data = Input::all();
	$idAlias = Session::get('usuario')->idAlias;

	$count1 = DB::table('redes_publicas')->where('idPerfil', '=', Input::get("id"))->count();
	$count2 = DB::table('redes_publicas')->where('idPerfil', '=', Input::get("id"))
											->where('nombre', '=', Input::get("mascara"))
											->count();

	if($count1 < 10 && $count2 == 0) {
		$redPublica = new RedPublica;
		$redPublica->idPerfil = Input::get("id");
		$redPublica->idAlias = $idAlias;
		$redPublica->nombre = Input::get("mascara");

		$redPublica->save();
		return 1;
	}

	return 0;
});

Route::post('/perfil_publico', function() {
	$data = Input::all();
	$idAlias = Session::get('usuario')->idAlias;

	$count1 = DB::table('perfiles_publicos')->where('idPerfilBase', '=', Input::get("id"))->count();

	if($count1 < 5) {
		$perfilPublico = new PerfilPublico;
		$perfilPublico->idPerfilBase = Input::get("id");
		$perfilPublico->idAlias = $idAlias;
		$perfilPublico->idPerfilRelacion = Input::get("idR");
		$perfilPublico->save();

		$perfilPublico = new PerfilPublico;
		$perfilPublico->idPerfilBase = Input::get("idR");
		$perfilPublico->idAlias = $idAlias;
		$perfilPublico->idPerfilRelacion = Input::get("id");
		$perfilPublico->save();

		return 1;
	}

	return 0;
});

Route::get('/perfiles', function() {
	$idAlias = Session::get('usuario')->idAlias;
	$perfiles = DB::select(DB::raw("
										SELECT	a.idPerfil, GROUP_CONCAT(d.nombre SEPARATOR ', ') mascara, GROUP_CONCAT(e.nombre SEPARATOR ', ') mascaras, 
												a.pais, a.estado, CONCAT(COALESCE(a.nombre, ' '), ' ', COALESCE(a.apaterno, ' '), ' ', COALESCE(a.amaterno, ' ')) perfil, a.confesion, a.facebook, a.twitter,
												a.instagram, a.secret_pub, a.foto
										FROM perfiles a
										LEFT JOIN mascaras_perfiles c
										ON a.idPerfil = c.idPerfil
										LEFT JOIN mascaras d
										ON c.idMascara = d.idMascara
										LEFT JOIN 	mascaras_publicas e
										ON a.idPerfil = e.idPerfil
										WHERE a.idAlias = {$idAlias}
										GROUP BY 	a.idPerfil, a.pais, a.estado, a.nombre, a.confesion, a.facebook, 
													a.twitter, a.instagram, a.secret_pub, a.foto
									"));

	return View::make('perfiles')->with('perfiles', $perfiles);
});

Route::get('/perfil/{id}', function($id) {
	$data = Array();
	$idAlias = Session::get('usuario')->idAlias;
	$data['perfil'] = DB::select(DB::raw("
										SELECT	a.idPerfil, {$idAlias} idAliasBase, GROUP_CONCAT(d.nombre SEPARATOR ', ') mascara, a.mascaras, a.pais, a.estado, a.municipio, a.ciudad,
												CONCAT(COALESCE(a.nombre, ' '), ' ', COALESCE(a.apaterno, ' '), ' ', COALESCE(a.amaterno, ' ')) perfil, a.confesion, a.facebook, a.twitter,
												a.instagram, a.secret, a.foto, COALESCE(e.bad, 0) bad, COALESCE(e.good, 0) good,
												ROUND(SUM(COALESCE(f.corazon, 0))/5) corazon, ROUND(SUM(COALESCE(f.estrella, 0))/4) estrella, 
												ROUND(SUM(COALESCE(f.blike, 0))/3) blike, ROUND(SUM(COALESCE(f.carita, 0))/2) carita, ROUND(SUM(COALESCE(f.cake, 0))/1) cake,
												ROUND(SUM(COALESCE(f.caca, 0))/5) caca, ROUND(SUM(COALESCE(f.craneo, 0))/4) craneo, ROUND(SUM(COALESCE(f.bug, 0))/3) bug, 
												ROUND(SUM(COALESCE(f.gota, 0))/2) gota, ROUND(SUM(COALESCE(f.enojo, 0))/1) enojo,

												ROUND(SUM(COALESCE(g.corazon, 0))/5) per_corazon, ROUND(SUM(COALESCE(g.estrella, 0))/4) per_estrella, 
												ROUND(SUM(COALESCE(g.blike, 0))/3) per_blike, ROUND(SUM(COALESCE(g.carita, 0))/2) per_carita, ROUND(SUM(COALESCE(g.cake, 0))/1) per_cake,
												ROUND(SUM(COALESCE(g.caca, 0))/5) per_caca, ROUND(SUM(COALESCE(g.craneo, 0))/4) per_craneo, ROUND(SUM(COALESCE(g.bug, 0))/3) per_bug, 
												ROUND(SUM(COALESCE(g.gota, 0))/2) per_gota, ROUND(SUM(COALESCE(g.enojo, 0))/1) per_enojo,

												COALESCE(h.odio, 0) odio, COALESCE(h.amor, 0) amor
										FROM perfiles a
										LEFT JOIN mascaras_perfiles c
										ON a.idPerfil = c.idPerfil
										LEFT JOIN mascaras d
										ON c.idMascara = d.idMascara
										LEFT JOIN	(
														SELECT idPerfil, SUM(bad) bad, SUM(good) good
														FROM	(
																	SELECT 	idPerfil,
																			COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																			COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																	FROM ranks_posts a
																	INNER JOIN posts b
																	ON a.idPost = b.idPost
																	WHERE idPerfil = {$id}
																	GROUP BY idPerfil
																	UNION ALL
																	SELECT 	idPerfil,
																			COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																			COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																	FROM ranks
																	WHERE idPerfil = {$id}
																	GROUP BY idPerfil
																	UNION ALL
																	SELECT 	idPerfil,
																			COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																			COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																	FROM ranks_medias a
																	INNER JOIN medias b
																	ON a.idMedia = b.idMedia
																	WHERE idPerfil = {$id}
																	GROUP BY idPerfil
																	UNION ALL
																	SELECT 	idPerfil,
																			COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																			COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																	FROM ranks_fotos a
																	INNER JOIN fotos_posts b
																	ON a.idFotoPost = b.idFotoPost
																	INNER JOIN posts c
																	ON b.idPost = c.idPost 
																	WHERE idPerfil = {$id}
																	GROUP BY idPerfil
																	UNION ALL
																	SELECT 	idPerfil,
																			COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																			COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																	FROM ranks_perfiles 
																	WHERE idPerfil = {$id}
																	GROUP BY idPerfil
																	UNION ALL
																	SELECT 	idPerfil,
																			COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																			COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																	FROM posts a
																	INNER JOIN subcomentarios b
																	ON a.idPost = b.idPost
																	INNER JOIN ranks_subcomentarios c
																	ON b.idSubcomentario = c.idSubcomentario
																	WHERE a.idPerfil = {$id}
																	GROUP BY a.idPerfil
																	UNION ALL
																	SELECT 	idPerfil,
																			COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																			COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																	FROM posts a
																	INNER JOIN subcomentarios b
																	ON a.idPost = b.idPost
																	INNER JOIN subcomentarios_fotos c
																	ON b.idSubcomentario = c.idSubcomentario
																	INNER JOIN ranks_subfotos d
																	ON c.idSubcomentarioFoto = d.idSubcomentarioFoto
																	WHERE a.idPerfil = {$id}
																	GROUP BY a.idPerfil
																) a
														GROUP BY idPerfil
													) e
										ON a.idPerfil = e.idPerfil
										LEFT JOIN ranks f
										ON a.idPerfil = f.idPerfil
										LEFT JOIN ranks_perfiles g
										ON a.idPerfil = g.idPerfil
										LEFT JOIN   (
														SELECT 	idPerfil, 
																SUM(CASE tipo WHEN 1 THEN 1 ELSE 0 END) odio,
																SUM(CASE tipo WHEN 2 THEN 1 ELSE 0 END) amor
														FROM amores
														WHERE idPerfil = {$id}
													) h
										ON a.idPerfil = h.idPerfil
										WHERE a.idPerfil = {$id}
										GROUP BY a.idPerfil, a.nombre, a.pais, a.estado, a.municipio, a.ciudad, a.confesion, a.facebook, a.twitter,
												a.instagram, a.secret, a.foto
									"))[0];
	$data['evidencias'] = DB::select(DB::raw("
										SELECT 	a.idMedia, a.idPerfil, a.foto, a.link, a.tipo, a.created_at,
												ROUND(SUM(COALESCE(corazon, 0))/5) evi_corazon, ROUND(SUM(COALESCE(estrella, 0))/4) evi_estrella, 
												ROUND(SUM(COALESCE(blike, 0))/3) evi_blike, ROUND(SUM(COALESCE(carita, 0))/2) evi_carita, ROUND(SUM(COALESCE(cake, 0))/1) evi_cake,
												ROUND(SUM(COALESCE(caca, 0))/5) evi_caca, ROUND(SUM(COALESCE(craneo, 0))/4) evi_craneo, ROUND(SUM(COALESCE(bug, 0))/3) evi_bug, 
												ROUND(SUM(COALESCE(gota, 0))/2) evi_gota, ROUND(SUM(COALESCE(enojo, 0))/1) evi_enojo, 
												COALESCE(c.siconf, 0) siconf, COALESCE(c.noconf, 0) noconf
										FROM medias a
										LEFT JOIN ranks_medias b
										ON a.idMedia = b.idMedia
										LEFT JOIN (
																SELECT 	SUM(CASE confiable WHEN 1 THEN 1 ELSE 0 END) siconf,
																		SUM(CASE confiable WHEN 0 THEN 1 ELSE 0 END) noconf,
																		tipo, idRel
																FROM confiables
																WHERE tipo IN (1, 2)
																GROUP BY tipo, idRel
															) c
										ON a.idMedia = c.idRel
										WHERE a.idPerfil = {$id}
										GROuP BY a.idMedia, a.idPerfil, a.foto, a.link, a.tipo, a.created_at
										ORDER BY a.tipo
									"));
	$data['posts'] = DB::select(DB::raw("
										SELECT 	a.idPost, a.idAlias, a.idPerfil, a.link_evi, a.confesion, a.foto, a.link, a.secret, b.nombre, a.created_at,
												ROUND(SUM(COALESCE(c.corazon, 0))/5) corazon, ROUND(SUM(COALESCE(c.estrella, 0))/4) estrella, 
												ROUND(SUM(COALESCE(c.blike, 0))/3) blike, ROUND(SUM(COALESCE(c.carita, 0))/2) carita, ROUND(SUM(COALESCE(c.cake, 0))/1) cake,
												ROUND(SUM(COALESCE(c.caca, 0))/5) caca, ROUND(SUM(COALESCE(c.craneo, 0))/4) craneo, ROUND(SUM(COALESCE(c.bug, 0))/3) bug, 
												ROUND(SUM(COALESCE(c.gota, 0))/2) gota, ROUND(SUM(COALESCE(c.enojo, 0))/1) enojo, a.tipo,

												ROUND(COALESCE(vid_corazon, 0)/5) vid_corazon, ROUND(COALESCE(vid_estrella, 0)/4) vid_estrella, 
												ROUND(COALESCE(vid_blike, 0)/3) vid_blike, ROUND(COALESCE(vid_carita, 0)/2) vid_carita, ROUND(COALESCE(vid_cake, 0)/1) vid_cake,
												ROUND(COALESCE(vid_caca, 0)/5) vid_caca, ROUND(COALESCE(vid_craneo, 0)/4) vid_craneo, ROUND(COALESCE(vid_bug, 0)/3) vid_bug, 
												ROUND(COALESCE(vid_gota, 0)/2) vid_gota, ROUND(COALESCE(vid_enojo, 0)/1) vid_enojo
										FROM posts a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										LEFT JOIN ranks_posts c
										ON a.idPost = c.idPost
										AND c.tipo = 1
										LEFT JOIN (
																SELECT 	idPost,
																		SUM(COALESCE(corazon, 0)) vid_corazon, SUM(COALESCE(estrella, 0)) vid_estrella, 
																		SUM(COALESCE(blike, 0)) vid_blike, SUM(COALESCE(carita, 0)) vid_carita, SUM(COALESCE(cake, 0)) vid_cake,
																		SUM(COALESCE(caca, 0)) vid_caca, SUM(COALESCE(craneo, 0)) vid_craneo, SUM(COALESCE(bug, 0)) vid_bug, 
																		SUM(COALESCE(gota, 0)) vid_gota, SUM(COALESCE(enojo, 0)) vid_enojo
																FROM ranks_posts
																WHERE tipo = 2
																GROUP BY idPost
															) d
										ON a.idPost = d.idPost
										WHERE a.idPerfil = {$id}
										GROUP BY a.idPost, a.link_evi, a.confesion, a.foto, a.link, b.nombre, a.created_at, a.tipo
										ORDER BY a.created_at DESC;
									"));
	$data['relaciones'] = DB::select(DB::raw("
										SELECT b.idPerfil, b.foto
										FROM perfiles_publicos a
										INNER JOIN perfiles b
										ON a.idPerfilRelacion = b.idPerfil
										WHERE a.idPerfilBase = {$id}
									"));
	$data['redes'] = DB::select(DB::raw("
										SELECT nombre
										FROM redes_publicas
										WHERE idPerfil = {$id}
									"));

	$data['mascaras'] = DB::select(DB::raw("
										SELECT nombre
										FROM mascaras_publicas
										WHERE idPerfil = {$id}
									"));
	$data['apodos'] = DB::select(DB::raw("
										SELECT apodo
										FROM apodos_publicos
										WHERE idPerfil = {$id}
									"));
	$data['nombres'] = DB::select(DB::raw("
										SELECT nombre
										FROM nombres_publicos
										WHERE idPerfil = {$id}
									"));
	$data['fotos'] = DB::select(DB::raw("
										SELECT foto
										FROM fotos_publicas
										WHERE idPerfil = {$id}
									"));

	for ($i=0; $i < count($data['posts']); $i++) { 
		$idPost = $data['posts'][$i]->idPost;

		$confiable = DB::select(DB::raw("
										SELECT 	COALESCE(SUM(CASE confiable WHEN 1 THEN 1 ELSE 0 END), 0) siconf,
												COALESCE(SUM(CASE confiable WHEN 0 THEN 1 ELSE 0 END), 0) noconf
										FROM confiables
										WHERE tipo = 4
										AND idRel = {$idPost}
									"))[0];
		$data['posts'][$i]->vid_siconf = $confiable->siconf;
		$data['posts'][$i]->vid_noconf = $confiable->noconf;

		$confiable = DB::select(DB::raw("
										SELECT 	COALESCE(SUM(CASE confiable WHEN 1 THEN 1 ELSE 0 END), 0) siconf,
												COALESCE(SUM(CASE confiable WHEN 0 THEN 1 ELSE 0 END), 0) noconf
										FROM confiables
										WHERE tipo = 3
										AND idRel = {$idPost}
									"))[0];
		$data['posts'][$i]->siconf = $confiable->siconf;
		$data['posts'][$i]->noconf = $confiable->noconf;

		$fotos_posts = DB::select(DB::raw("
										SELECT idFotoPost, idPost, foto, created_at
										FROM fotos_posts
										WHERE idPost = {$idPost}
									"));
		$data['posts'][$i]->fotos = $fotos_posts;

		$comm_posts = DB::select(DB::raw("
										SELECT a.idComentarioPost, a.comentario, b.nombre usuario, a.created_at 
										FROM comentarios_posts a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										WHERE a.idPost = {$idPost}
										ORDER BY a.created_at DESC
									"));
		$data['posts'][$i]->comentarios = $comm_posts;

		$subcomm_posts = DB::select(DB::raw("
										SELECT 	a.idSubcomentario, a.link_evi, a.comentario, a.video, b.nombre usuario,
												COALESCE(c.siconf, 0) com_siconf, COALESCE(c.noconf, 0) com_noconf, a.created_at,

												ROUND(COALESCE(vid_corazon, 0)/5) vid_corazon, ROUND(COALESCE(vid_estrella, 0)/4) vid_estrella, 
												ROUND(COALESCE(vid_blike, 0)/3) vid_blike, ROUND(COALESCE(vid_carita, 0)/2) vid_carita, ROUND(COALESCE(vid_cake, 0)/1) vid_cake,
												ROUND(COALESCE(vid_caca, 0)/5) vid_caca, ROUND(COALESCE(vid_craneo, 0)/4) vid_craneo, ROUND(COALESCE(vid_bug, 0)/3) vid_bug, 
												ROUND(COALESCE(vid_gota, 0)/2) vid_gota, ROUND(COALESCE(vid_enojo, 0)/1) vid_enojo,

												ROUND(COALESCE(com_corazon, 0)/5) com_corazon, ROUND(COALESCE(com_estrella, 0)/4) com_estrella, 
												ROUND(COALESCE(com_blike, 0)/3) com_blike, ROUND(COALESCE(com_carita, 0)/2) com_carita, ROUND(COALESCE(com_cake, 0)/1) com_cake,
												ROUND(COALESCE(com_caca, 0)/5) com_caca, ROUND(COALESCE(com_craneo, 0)/4) com_craneo, ROUND(COALESCE(com_bug, 0)/3) com_bug, 
												ROUND(COALESCE(com_gota, 0)/2) com_gota, ROUND(COALESCE(com_enojo, 0)/1) com_enojo
										FROM subcomentarios a
										INNER JOIN alias b
										ON a.idAlias = b.idAlias
										LEFT JOIN 	(
														SELECT 	SUM(CASE confiable WHEN 1 THEN 1 ELSE 0 END) siconf,
																SUM(CASE confiable WHEN 0 THEN 1 ELSE 0 END) noconf,
																tipo, idRel
														FROM confiables
														WHERE tipo IN (6, 7)
														GROUP BY tipo, idRel
													) c
										ON a.idSubcomentario = c.idRel
										LEFT JOIN 	(
														SELECT 	idSubcomentario,
																SUM(COALESCE(corazon, 0)) vid_corazon, SUM(COALESCE(estrella, 0)) vid_estrella, 
																SUM(COALESCE(blike, 0)) vid_blike, SUM(COALESCE(carita, 0)) vid_carita, SUM(COALESCE(cake, 0)) vid_cake,
																SUM(COALESCE(caca, 0)) vid_caca, SUM(COALESCE(craneo, 0)) vid_craneo, SUM(COALESCE(bug, 0)) vid_bug, 
																SUM(COALESCE(gota, 0)) vid_gota, SUM(COALESCE(enojo, 0)) vid_enojo
														FROM ranks_subcomentarios
														WHERE tipo = 2
														GROUP BY idSubcomentario
													) d
										ON a.idSubcomentario = d.idSubcomentario
										LEFT JOIN 	(
														SELECT 	idSubcomentario,
																SUM(COALESCE(corazon, 0)) com_corazon, SUM(COALESCE(estrella, 0)) com_estrella, 
																SUM(COALESCE(blike, 0)) com_blike, SUM(COALESCE(carita, 0)) com_carita, SUM(COALESCE(cake, 0)) com_cake,
																SUM(COALESCE(caca, 0)) com_caca, SUM(COALESCE(craneo, 0)) com_craneo, SUM(COALESCE(bug, 0)) com_bug, 
																SUM(COALESCE(gota, 0)) com_gota, SUM(COALESCE(enojo, 0)) com_enojo
														FROM ranks_subcomentarios
														WHERE tipo = 1
														GROUP BY idSubcomentario
													) e
										ON a.idSubcomentario = e.idSubcomentario
										WHERE a.idPost = {$idPost}
										ORDER BY a.created_at DESC
									"));
		$data['posts'][$i]->subcomentarios = $subcomm_posts;

		for ($j=0; $j < count($data['posts'][$i]->subcomentarios); $j++) {
			$idSubcomentario = $data['posts'][$i]->subcomentarios[$j]->idSubcomentario;

			$data['posts'][$i]->subcomentarios[$j]->fotos = DB::select(DB::raw("
										SELECT idSubcomentarioFoto, idSubcomentario, imagen, created_at 
										FROM subcomentarios_fotos
										WHERE idSubcomentario = {$idSubcomentario}
										ORDER BY created_at DESC
									"));
		}
	}

	return View::make('perfil')->with('data', $data);;
});

Route::get('/eliminar_perfil/{id}', function() {
	$idAlias = Session::get('usuario')->idAlias;
	Alia::where('idAlias', '=', $idAlias)->delete();

	return Redirect::to('/logout');
});

Route::post('/vote/{mod}/{tipo}/{id}/{ptipo}', function($mod, $tipo, $id, $ptipo) {
	if(Session::has('usuario')) {
		$idAlias = Session::get('usuario')->idAlias;
		$voto = 0;

		if($mod == 'rank') {
			$count = DB::table('ranks')->where('idAlias', '=', $idAlias)
									->where('idPerfil', '=', $id)
									//->where($tipo, '=', 1)
									->count();
			$rank = new Rank;
			$rank->idPerfil = $id;

			if($count > 0)
				return 0;
		}
		elseif ($mod == 'fotos') {
			$count = DB::table('ranks_fotos')->where('idAlias', '=', $idAlias)
									->where('idFotoPost', '=', $id)
									//->where($tipo, '=', 1)
									->count();
			$rank = new RankFoto;
			$rank->idFotoPost = $id;

			if($count > 0)
				return 0;
		}
		elseif ($mod == 'media') {
			$count = DB::table('ranks_medias')->where('idAlias', '=', $idAlias)
									->where('idMedia', '=', $id)
									//->where($tipo, '=', 1)
									->count();
			$rank = new RankMedia;
			$rank->idMedia = $id;

			if($count > 0)
				return 0;
		}
		elseif ($mod == 'subfoto') {
			$count = DB::table('ranks_subfotos')->where('idAlias', '=', $idAlias)
									->where('idSubcomentarioFoto', '=', $id)
									//->where($tipo, '=', 1)
									->count();
			$rank = new RankSubfoto;
			$rank->idSubcomentarioFoto = $id;

			if($count > 0)
				return 0;
		}
		elseif ($mod == 'subpost') {
			$count = DB::table('ranks_subcomentarios')->where('idAlias', '=', $idAlias)
									->where('idSubcomentario', '=', $id)
									->where('tipo', '=', $ptipo)
									//->where($tipo, '=', 1)
									->count();
			$rank = new RankSubcomentario;
			$rank->idSubcomentario = $id;
			$rank->tipo = $ptipo;

			if($count > 0)
				return 0;
		}
		elseif ($mod == 'perfil') {
			$count = DB::table('ranks_perfiles')->where('idAlias', '=', $idAlias)
									->where('idPerfil', '=', $id)
									->count();
			$rank = new RankPerfil;
			$rank->idPerfil = $id;

			if($count > 0)
				return 0;
		}
		else {
			$count = DB::table('ranks_posts')->where('idAlias', '=', $idAlias)
									->where('idPost', '=', $id)
									->where('tipo', '=', $ptipo)
									//->where($tipo, '=', 1)
									->count();
			$rank = new RankPost;
			$rank->idPost = $id;
			$rank->tipo = $ptipo;

			if($count > 0)
				return 0;
		}
		$rank->idAlias = $idAlias;	

		$rank->corazon = 0;
		$rank->estrella = 0;
		$rank->blike = 0;
		$rank->carita = 0;
		$rank->cake = 0;

		$rank->caca = 0;
		$rank->craneo = 0;
		$rank->bug = 0;
		$rank->gota = 0;
		$rank->enojo = 0;

		switch ($tipo) {
			case 'corazon':
				$voto = $rank->corazon = 5;
				break;
			case 'estrella':
				$voto = $rank->estrella = 4;
				break;
			case 'blike':
				$voto = $rank->blike = 3;
				break;
			case 'carita':
				$voto = $rank->carita = 2;
				break;
			case 'cake':
				$voto = $rank->cake = 1;
				break;
				
			case 'caca':
				$voto = $rank->caca = 5;
				break;
			case 'craneo':
				$voto = $rank->craneo = 4;
				break;
			case 'bug':
				$voto = $rank->bug = 3;
				break;
			case 'gota':
				$voto = $rank->gota = 2;
				break;
			case 'enojo':
				$voto = $rank->enojo = 1;
				break;
		}

		try
		{
			$rank->save();
			return $voto;
		}
		catch(Exception $ex)
		{
			return 0;
		}
	}
	else
		return 0;
});

Route::post('/vote_amor', function() {
	$id = Input::get('id');
	$tipo = Input::get('tipo');

	if(Session::has('usuario')) {
		$idAlias = Session::get('usuario')->idAlias;

		$count = DB::table('amores')->where('idAlias', '=', $idAlias)
								->where('idPerfil', '=', $id)
								//->where($tipo, '=', 1)
								->count();
		$amor = new Amor;
		$amor->idPerfil = $id;
		$amor->idAlias = $idAlias;
		$amor->tipo = $tipo;

		if($count > 0)
			return 0;

		try
		{
			$amor->save();
			return 1;
		}
		catch(Exception $ex)
		{
			return 0;
		}
	}
	else
		return 0;
});

Route::post('/relaciones/{id}', function($id) {
	$data = Input::all();

	$count = DB::table('perfiles')->where('idPerfil', '=', $data['id'])
							->count();
	if($count == 1) {
		$relacion = new Relacion;
		if($id > 0 && $data['id'] > 0 && $data['id'] != $id) {
			$relacion->idPerfilBase = $id;
			$relacion->idPerfilRelacion = $data['id'];
			$res = $relacion->save();
		}

		//return Response::json(Array('ok' => $res, 'errors' => $relacion->getErrors()));
		return Redirect::to('perfil/'.$id);
	}
	else
		return Redirect::to('/perfiles');
});

Route::post('/post/{id}/{opcion}', function($id, $opcion) {
	$data = Input::all();

	$video = '';
	if(strlen(Input::get("link")) > 0)
		$video = explode ('v=', $data['link'])[1];

	$post = new Post;
	$post->idAlias = Session::get('usuario')->idAlias;
	$post->idPerfil = $id;
	$post->tipo = 4;
	$post->confesion = Input::get("confesion");
	$post->link = $video;
	$post->secret = $data['secret'];
	$post->link_evi = $data['link_evi'];
	
	if(strlen($data['secret']) > 0)
		DB::table('perfiles')
	            ->where('idPerfil', $id)
	            ->update(array('secret_pub' => $data['secret'], 'updated_at' => DB::raw('NOW()')));

	if($post->save()) {
		for ($i=0; $i < count($data['files']); $i++) { 
			$file = $data['files'][$i];
			if($data['files'][$i] === null)
				continue;
			$image = GetNameImage('e_');

			$foto_post = new FotoPost;
			$foto_post->foto = $image;
			$foto_post->idPost = $post->id;

			if ($foto_post->save())
				$file->move(public_path().'/img/db_imgs/posts/', $image);
		}
	}

	/*if($opcion == 3) {
		$post->secret = $data['secret'];
		$post->tipo = 3;
		$post->save();

		DB::table('perfiles')
            ->where('idPerfil', $id)
            ->update(array('secret_pub' => $data['secret']));
	}
	else if($opcion == 1) {
		$post->confesion = Input::get("confesion");
		$post->tipo = 1;
		$post->save();
	}
	else if($opcion == 2) {
		$post->link = Input::get("link");
		$post->tipo = 2;

		if($post->save()) {
			for ($i=0; $i < count($data['files']); $i++) { 
				$file = $data['files'][$i];
				if($data['files'][$i] === null)
					continue;
				$image = GetNameImage('e_');

				$foto_post = new FotoPost;
				$foto_post->foto = $image;
				$foto_post->idPost = $post->id;

				if ($foto_post->save())
					$file->move(public_path().'/img/db_imgs/posts/', $image);
			}
		}
	}*/

	return Response::json(Array('ok' => 1));
});

Route::post('/evidencias/{id}', function($id) {
	$data = Input::all();

	for ($i=0; $i < count($data['files']); $i++) { 
		$file = $data['files'][$i];
		if($data['files'][$i] === null)
			continue;
		$image = GetNameImage('e_');

		$media = new Media;
		$media->foto = $image;
		$media->idPerfil = $id;
		$media->tipo = 2;

		if ($media->save())
			$file->move(public_path().'/img/db_imgs/evidencias/', $image);
	}

	for ($i=0; $i < count($data['fotos']); $i++) { 
		$file = $data['fotos'][$i];
		if($data['fotos'][$i] === null)
			continue;
		$image = GetNameImage('f_');

		$media = new Media;
		$media->foto = $image;
		$media->idPerfil = $id;
		$media->tipo = 3;

		if ($media->save())
			$file->move(public_path().'/img/db_imgs/evidencias/', $image);
	}

	if(isset($data['video']) && strlen($data['video']) && strrpos($data['video'], 'youtube') !== false) {
		$video = explode ('v=', $data['video']);

		$media = new Media;
		$media->link = $video[1];
		$media->idPerfil = $id;
		$media->tipo = 1;

		$media->save();
	}
	

	return Redirect::to('perfiles');
});

Route::post('/evidencias/mas/{id}', function($id) {
	$data = Input::all();

	for ($i=0; $i < count($data['files']); $i++) { 
		$file = $data['files'][$i];
		if($data['files'][$i] === null)
			continue;
		$image = GetNameImage('e_');

		$foto_post = new FotoPost;
		$foto_post->foto = $image;
		$foto_post->idPost = $id;

		if ($foto_post->save())
			$file->move(public_path().'/img/db_imgs/posts/', $image);
	}	

	return Response::json(Array('ok' => 1));
});

Route::get('/principal/custom/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT	GROUP_CONCAT(e.nombre SEPARATOR ', ') mascara, GROUP_CONCAT(f.nombre SEPARATOR ', ') mascaras, a.pais, a.estado, 
											a.idPerfil, CONCAT(COALESCE(a.nombre, ' '), ' ', COALESCE(a.apaterno, ' '), ' ', COALESCE(a.amaterno, ' ')) perfil, a.confesion, a.facebook, a.foto, 
											CONCAT(SUBSTR(a.confesion, 1, 100), '...') confesion_corta, a.secret_pub, 
											COALESCE(d.caca, 0) caca, COALESCE(d.corazon, 0) corazon,
											COALESCE(e.numcomm, 0) numcomm
									FROM perfiles a
									LEFT JOIN mascaras_perfiles c
									ON a.idPerfil = c.idPerfil
									LEFT JOIN mascaras e
									ON c.idMascara = e.idMascara
									LEFT JOIN	(
													SELECT idPerfil, SUM(caca) caca, SUM(corazon) corazon
													FROM ranks
													GROUP BY idPerfil
												) d
									ON a.idPerfil = d.idPerfil
									LEFT JOIN	(
													SELECT COUNT(idPerfil) numcomm, idPerfil 
													FROM comentarios
													GROUP BY idPerfil
												) e
									ON a.idPerfil = e.idPerfil
									LEFT JOIN mascaras_publicas f
									ON a.idPerfil = f.idPerfil
									WHERE UPPER(a.nombre) LIKE UPPER('%{$criteria}%')
									OR UPPER(e.nombre) LIKE UPPER('%{$criteria}%')
									OR UPPER(a.mascaras) LIKE UPPER('%{$criteria}%')
									OR UPPER(a.pais) LIKE UPPER('%{$criteria}%')
									OR UPPER(a.estado) LIKE UPPER('%{$criteria}%')
									OR UPPER(a.municipio) LIKE UPPER('%{$criteria}%')
									OR UPPER(a.ciudad) LIKE UPPER('%{$criteria}%')
									GROUP BY a.secret_pub, a.idPerfil, a.pais, a.estado, a.nombre, a.confesion, a.facebook, a.foto
									ORDER BY a.updated_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});

Route::post('/principal/avanzada', function() {
	$datas = Input::all();

	$busqueda = '';
	$arr = Array();
	if(isset($datas['buav_id']) && strlen($datas['buav_id'])) {
		$busqueda1 = ' a.idPerfil = '.$datas['buav_id'];
		array_push($arr, $busqueda1);
	}
	if(isset( $datas['buav_nom']) && strlen( $datas['buav_nom'])) {
		$busqueda2 = " UPPER(a.nombre) LIKE UPPER('%".$datas['buav_nom']."%') ";
		array_push($arr, $busqueda2);
	}
	if(isset( $datas['buav_apa']) && strlen( $datas['buav_apa'])) {
		$busqueda3 = " UPPER(a.apaterno) LIKE UPPER('%".$datas['buav_apa']."%') ";
		array_push($arr, $busqueda3);
	}
	if(isset( $datas['buav_ama']) && strlen( $datas['buav_ama'])) {
		$busqueda4 = " UPPER(a.amaterno) LIKE UPPER('%".$datas['buav_ama']."%') ";
		array_push($arr, $busqueda4);
	}
	if(isset( $datas['buav_pai']) && strlen( $datas['buav_pai'])) {
		$busqueda5 = " UPPER(a.pais) LIKE UPPER('%".$datas['buav_pai']."%') ";
		array_push($arr, $busqueda5);
	}
	if(isset( $datas['buav_cid']) && strlen( $datas['buav_cid'])) {
		$busqueda6 = " UPPER(a.ciudad) LIKE UPPER('%".$datas['buav_cid']."%') ";
		array_push($arr, $busqueda6);
	}

	$where = join(" OR ", $arr);

	$data = DB::select(DB::raw("
									SELECT	GROUP_CONCAT(e.nombre SEPARATOR ', ') mascara, GROUP_CONCAT(f.nombre SEPARATOR ', ') mascaras, a.pais, a.estado, 
											a.idPerfil, CONCAT(COALESCE(a.nombre, ' '), ' ', COALESCE(a.apaterno, ' '), ' ', COALESCE(a.amaterno, ' ')) perfil, a.confesion, a.facebook, a.foto, 
											CONCAT(SUBSTR(a.confesion, 1, 100), '...') confesion_corta, a.secret_pub, 
											COALESCE(d.caca, 0) caca, COALESCE(d.corazon, 0) corazon,
											COALESCE(e.numcomm, 0) numcomm
									FROM perfiles a
									LEFT JOIN mascaras_perfiles c
									ON a.idPerfil = c.idPerfil
									LEFT JOIN mascaras e
									ON c.idMascara = e.idMascara
									LEFT JOIN	(
													SELECT idPerfil, SUM(caca) caca, SUM(corazon) corazon
													FROM ranks
													GROUP BY idPerfil
												) d
									ON a.idPerfil = d.idPerfil
									LEFT JOIN	(
													SELECT COUNT(idPerfil) numcomm, idPerfil 
													FROM comentarios
													GROUP BY idPerfil
												) e
									ON a.idPerfil = e.idPerfil
									LEFT JOIN mascaras_publicas f
									ON a.idPerfil = f.idPerfil
									WHERE 1 = 1
									AND ( {$where} )
									GROUP BY a.secret_pub, a.idPerfil, a.pais, a.estado, a.nombre, a.confesion, a.facebook, a.foto
									ORDER BY a.updated_at DESC
								"));

	
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});

Route::get('/principal', function() {
	$pais = Session::get('usuario')->pais;
	$estado = Session::get('usuario')->estado;
	$data = DB::select(DB::raw("
									SELECT	GROUP_CONCAT(e.nombre SEPARATOR ', ') mascara, GROUP_CONCAT(f.nombre SEPARATOR ', ') mascaras, a.pais, a.estado, 
											a.idPerfil, CONCAT(COALESCE(a.nombre, ' '), ' ', COALESCE(a.apaterno, ' '), ' ', COALESCE(a.amaterno, ' ')) perfil, a.confesion, a.facebook, a.foto, COALESCE(g.numpost, 0) numpost, 
											CONCAT(SUBSTR(a.confesion, 1, 100), '...') confesion_corta, a.secret_pub,
											d.bad, d.good,
											COALESCE(e.numcomm, 0) numcomm
									FROM perfiles a
									LEFT JOIN mascaras_perfiles c
									ON a.idPerfil = c.idPerfil
									LEFT JOIN mascaras e
									ON c.idMascara = e.idMascara
									LEFT JOIN	(
													SELECT idPerfil, SUM(bad) bad, SUM(good) good
													FROM	(
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_posts a
																INNER JOIN posts b
																ON a.idPost = b.idPost
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_medias a
																INNER JOIN medias b
																ON a.idMedia = b.idMedia
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_fotos a
																INNER JOIN fotos_posts b
																ON a.idFotoPost = b.idFotoPost
																INNER JOIN posts c
																ON b.idPost = c.idPost 
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_perfiles 
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM posts a
																INNER JOIN subcomentarios b
																ON a.idPost = b.idPost
																INNER JOIN ranks_subcomentarios c
																ON b.idSubcomentario = c.idSubcomentario
																GROUP BY a.idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM posts a
																INNER JOIN subcomentarios b
																ON a.idPost = b.idPost
																INNER JOIN subcomentarios_fotos c
																ON b.idSubcomentario = c.idSubcomentario
																INNER JOIN ranks_subfotos d
																ON c.idSubcomentarioFoto = d.idSubcomentarioFoto
																GROUP BY a.idPerfil
															) a
													GROUP BY idPerfil
												) d
									ON a.idPerfil = d.idPerfil
									LEFT JOIN	(
													SELECT COUNT(idPerfil) numcomm, idPerfil 
													FROM comentarios
													GROUP BY idPerfil
												) e
									ON a.idPerfil = e.idPerfil
									LEFT JOIN mascaras_publicas f
									ON a.idPerfil = f.idPerfil
									LEFT JOIN	(
													SELECT COUNT(idPerfil) numpost, idPerfil 
													FROM posts
													GROUP BY idPerfil
												) g
									ON a.idPerfil = g.idPerfil
									WHERE LENGTH(a.secret_pub) > 0 
									/*AND UPPER(a.estado) = UPPER('{$estado}') 
									AND UPPER(a.pais) = UPPER('{$pais}') */
									GROUP BY a.secret_pub, a.idPerfil, a.pais, a.estado, a.nombre, a.confesion, a.facebook, a.foto
									ORDER BY a.updated_at DESC
								"));

	//var_dump($sql);
	return View::make('principal')->with('perfiles', $data);
});

Route::get('/rank', function() {
	$data = DB::select(DB::raw('
									SELECT	GROUP_CONCAT(e.nombre SEPARATOR ", ") mascara, GROUP_CONCAT(f.nombre SEPARATOR ", ") mascaras, a.pais, a.estado, 
											a.idPerfil, a.nombre perfil, a.confesion, a.facebook, a.foto,  
											CONCAT(SUBSTR(a.confesion, 1, 100), "...") confesion_corta, a.secret_pub,
											d.bad, d.good,
											COALESCE(e.numcomm, 0) numcomm
									FROM perfiles a
									LEFT JOIN mascaras_perfiles c
									ON a.idPerfil = c.idPerfil
									LEFT JOIN mascaras e
									ON c.idMascara = e.idMascara
									LEFT JOIN	(
													SELECT idPerfil, SUM(bad) bad, SUM(good) good
													FROM	(
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_posts a
																INNER JOIN posts b
																ON a.idPost = b.idPost
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_medias a
																INNER JOIN medias b
																ON a.idMedia = b.idMedia
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_fotos a
																INNER JOIN fotos_posts b
																ON a.idFotoPost = b.idFotoPost
																INNER JOIN posts c
																ON b.idPost = c.idPost 
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_perfiles 
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM posts a
																INNER JOIN subcomentarios b
																ON a.idPost = b.idPost
																INNER JOIN ranks_subcomentarios c
																ON b.idSubcomentario = c.idSubcomentario
																GROUP BY a.idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM posts a
																INNER JOIN subcomentarios b
																ON a.idPost = b.idPost
																INNER JOIN subcomentarios_fotos c
																ON b.idSubcomentario = c.idSubcomentario
																INNER JOIN ranks_subfotos d
																ON c.idSubcomentarioFoto = d.idSubcomentarioFoto
																GROUP BY a.idPerfil
															) a
													GROUP BY idPerfil
												) d
									ON a.idPerfil = d.idPerfil
									LEFT JOIN	(
													SELECT COUNT(idPerfil) numcomm, idPerfil 
													FROM comentarios
													GROUP BY idPerfil
												) e
									ON a.idPerfil = e.idPerfil
									LEFT JOIN mascaras_publicas f
									ON a.idPerfil = f.idPerfil
									WHERE a.idPerfil IN	(
															SELECT idPerfil
															FROM	(
																			SELECT 	idPerfil
																			FROM  posts a
																			LEFT JOIN ranks_posts b
																			ON a.idPost = b.idPost
																			GROUP BY idPerfil
																			ORDER BY COALESCE(SUM(caca+craneo+bug+gota+enojo), 0)
																			LIMIT 20
																		) a
															UNION
															SELECT idPerfil
															FROM	(
																			SELECT 	idPerfil
																			FROM  posts a
																			LEFT JOIN ranks_posts b
																			ON a.idPost = b.idPost
																			GROUP BY idPerfil
																			ORDER BY COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) DESC
																			LIMIT 20
																		) b
														)
									GROUP BY a.secret_pub, a.idPerfil, a.pais, a.estado, a.nombre, a.confesion, a.facebook, a.foto
									ORDER BY a.created_at DESC
								'));

	//var_dump($sql);
	return View::make('rank')->with('toprank', $data);
});

Route::get('/rank/{tipo}', function($tipo) {
	$data = DB::select(DB::raw("
									SELECT	GROUP_CONCAT(e.nombre SEPARATOR ', ') mascara, GROUP_CONCAT(f.nombre SEPARATOR ', ') mascaras, a.pais, a.estado, 
											a.idPerfil, a.nombre perfil, a.confesion, a.facebook, a.foto,  
											CONCAT(SUBSTR(a.confesion, 1, 100), '...') confesion_corta, a.secret_pub,
											d.bad, d.good,
											COALESCE(e.numcomm, 0) numcomm
									FROM perfiles a
									LEFT JOIN mascaras_perfiles c
									ON a.idPerfil = c.idPerfil
									LEFT JOIN mascaras e
									ON c.idMascara = e.idMascara
									LEFT JOIN	(
													SELECT idPerfil, SUM(bad) bad, SUM(good) good
													FROM	(
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_posts a
																INNER JOIN posts b
																ON a.idPost = b.idPost
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_medias a
																INNER JOIN medias b
																ON a.idMedia = b.idMedia
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_fotos a
																INNER JOIN fotos_posts b
																ON a.idFotoPost = b.idFotoPost
																INNER JOIN posts c
																ON b.idPost = c.idPost 
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM ranks_perfiles 
																GROUP BY idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM posts a
																INNER JOIN subcomentarios b
																ON a.idPost = b.idPost
																INNER JOIN ranks_subcomentarios c
																ON b.idSubcomentario = c.idSubcomentario
																GROUP BY a.idPerfil
																UNION ALL
																SELECT 	idPerfil,
																		COALESCE(SUM(caca+craneo+bug+gota+enojo), 0) bad, 
																		COALESCE(SUM(cake+carita+blike+estrella+corazon), 0) good
																FROM posts a
																INNER JOIN subcomentarios b
																ON a.idPost = b.idPost
																INNER JOIN subcomentarios_fotos c
																ON b.idSubcomentario = c.idSubcomentario
																INNER JOIN ranks_subfotos d
																ON c.idSubcomentarioFoto = d.idSubcomentarioFoto
																GROUP BY a.idPerfil
															) a
													GROUP BY idPerfil
												) d
									ON a.idPerfil = d.idPerfil
									LEFT JOIN	(
													SELECT COUNT(idPerfil) numcomm, idPerfil 
													FROM comentarios
													GROUP BY idPerfil
												) e
									ON a.idPerfil = e.idPerfil
									LEFT JOIN mascaras_publicas f
									ON a.idPerfil = f.idPerfil
									WHERE UPPER(f.nombre) LIKE UPPER('%{$tipo}%')
									GROUP BY a.secret_pub, a.idPerfil, a.pais, a.estado, a.nombre, a.confesion, a.facebook, a.foto
									ORDER BY bad DESC, good DESC
									LIMIT 20
								"));

	//var_dump($sql);
	return View::make('rank_filter')->with('toprank', $data);
});

Route::get('/logout', function() {
	Session::forget('usuario');
	return Redirect::to('/');
});

Route::get('/mascaras/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT idMascara, nombre, created_at 
									FROM mascaras 
									WHERE UPPER(nombre) LIKE UPPER('%{$criteria}%')
									ORDER BY created_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});

Route::get('/paises/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT idPais, nombre, created_at 
									FROM paises 
									WHERE UPPER(nombre) LIKE UPPER('%{$criteria}%')
									ORDER BY created_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});

Route::get('/estadoz/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT estado nombre, created_at 
									FROM alias
									WHERE UPPER(estado) LIKE UPPER('%{$criteria}%')
									GROUP BY estado
									ORDER BY created_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});
Route::get('/estados/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT estado nombre, created_at 
									FROM perfiles
									WHERE UPPER(estado) LIKE UPPER('%{$criteria}%')
									GROUP BY estado
									ORDER BY created_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});
Route::get('/municipios/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT municipio nombre, created_at 
									FROM perfiles
									WHERE UPPER(municipio) LIKE UPPER('%{$criteria}%')
									GROUP BY municipio
									ORDER BY created_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});
Route::get('/ciudades/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT ciudad nombre, created_at 
									FROM perfiles
									WHERE UPPER(ciudad) LIKE UPPER('%{$criteria}%')
									GROUP BY ciudad
									ORDER BY created_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});
Route::get('/colonias/{criteria}', function($criteria) {

	$data = DB::select(DB::raw("
									SELECT colonia nombre, created_at 
									FROM perfiles
									WHERE UPPER(colonia) LIKE UPPER('%{$criteria}%')
									GROUP BY municipio
									ORDER BY created_at DESC
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});

Route::get('/madison', 'CaptchaController@getCrearPerfilMadison');
Route::post('/crear_perfil_madison', 'CaptchaController@postCrearPerfilMadison');
/*Route::post('/madison', function() {
	$data = Input::all();

	$madi = DB::table('tpeople')
		->where('PEOPLE_ID', $idpeople)
        ->madi();
});*/
/*Route::get('/madison', function() {
	$data = DB::select(DB::raw("
								SELECT * FROM tpeople 
								"));
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	//return Response::json($data);
	return View::make('madison')->with('data', $data);
});*/
Route::get('/madison/data', function() {
	$getData = Input::all();
	$query = $getData['query'];

	$data = DB::select(DB::raw("
								SELECT 	a.PEOPLE_ID, a.NICKNAME, a.FIRST_NAME, a.LAST_NAME, a.STREET, a.CITY, a.ZIP, a.COUNTRY, 
										a.PHONE, a.WORK_PHONE, a.MOBILE_PHONE, a.GENDER, a.BIRTHDAY, a.PROFILE_CAPTION, a.EMAIL,

										b.NAME COUNTRY_NAME, c.NAME GENDER_NAME
								FROM tpeople a
								INNER JOIN tcountry b
								ON a.COUNTRY = b.COUNTRY_ID
								INNER JOIN tgender c
								ON a.GENDER = c.GENDER_ID
								WHERE 
								( 	a.FIRST_NAME = '{$query}'
									AND a.LAST_NAME = '{$query}'
								)
								OR ( a.EMAIL = '{$query}' )

								"));
	//WHERE a.FIRST_NAME LIKE '%{$query}%'
	//var_dump($sql);
	//return View::make('principal')->with('data', $data);
	return Response::json($data);
});
