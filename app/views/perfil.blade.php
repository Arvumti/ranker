@extends('base')

@section('content')
	<section class="contenedor_perfiles ">	
		<div class="area_add">
			<!--a class="button" data-reveal-id="addPerfil"><i class="icon-agregar_us"></i>Perfil</a-->
			<a href="{{ URL::to('/crear_perfil') }}"  data-tooltip aria-haspopup="true" class="btnPro has-tip" title="{{Lang::get('messages.perfilesBtncreaTlt')}}"><div class="etiqueta"><h3 style="color:#ae3e34;margin-left:20px;"> {{Lang::get('messages.perfilesBtncrea')}}</h3></div>  <div class="suma" style="border-left:solid 2px #ae3e34;"><h3 style="color:#ae3e34;margin-left:20px;">+</h3></div></a>
		</div>
	</section>
	<section class="contenedor_perfiles">
		
									<!--div class="miniatura_img">
										@foreach($data['fotos'] as $evidencia)
											<a href="" data-reveal-id="sliderGaleria" class="open-modal">
												<img src="{{ URL::asset('img\\db_imgs\\publicas\\'.$evidencia->foto) }}"/>
											</a>
										@endforeach
									</div-->
		<div class="portada">
			<a data-reveal-id="sliderFotoPerfil"><img class="sombra_img" src="{{ URL::asset('img\\db_imgs\\'.$data['perfil']->foto) }}"/></a>
			<div class="cien"><!-- COLUMNA QUE TIENE LA CALIFICACION DEL PERFIL Y LOS PERFILES QUE SE HAYAN RELACIONADO-->
				<div class="cal_perfil">
					<p style="color:#18232b; font-family:sans-serif; font-weight:600;">{{ $data['perfil']->good }}</p><img data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltReputacionBuena')}}" src="../img/mn.png"/>
					<p style="color:#ae3e34; font-family:sans-serif; font-weight:600;">{{ $data['perfil']->bad }}</p><img data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltReputacionMala')}} " src="../img/mr.png"/>
					
				</div>
				
					<!--{{Lang::get('messages.perfInfLblClasificar')}}-->

					<span data-tooltip aria-haspopup="true" class="has-tip hidden" title="{{Lang::get('messages.perfPostTltVotarConsejo')}}"><a data-reveal-id="votosPerfilBox" class="votos_mostrar"><i class="icon-thumbs-up" style="color:#ae3e34; font-size: 28px;"></i></a></span>														
				
				
				<ul class="ul_relaciones"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltComplices')}} "><h3>{{Lang::get('messages.perfInfLblPerfiles')}} </h3></span>
					@foreach($data['relaciones'] as $relacion)
						<li><a href="{{ URL::to('perfil').'/'.$relacion->idPerfil }}"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltComplice')}}"><img src="{{ URL::asset('img\\db_imgs\\'.$relacion->foto) }}" style="border-radius:5px"/></span></a></li>
					@endforeach
				</ul> 
			</div>					
		</div>
		<article class="info_perfil_area">
			<h1 class="titulo_perfil">{{ $data['perfil']->perfil }}</h1>
			@foreach($data['apodos'] as $apodo)
				@if( strlen($apodo->apodo) > 0 )
					<div class="cien">
						<h4 style="text-transform: capitalize;"><!--{{Lang::get('messages.perfInfLblApodo')}}--> ( {{ $apodo->apodo }} )</h4>
					</div>
				@endif
			@endforeach
			<div class="cien">
						<!--li><i class="icon-usuario"></i><h5 style="text-transform: capitalize;"> {{ $data['perfil']->perfil }}</h5></li-->
				<h5>
					{{Lang::get('messages.perfInfLblLugar')}}: {{ $data['perfil']->pais }},   {{ $data['perfil']->municipio }} 
				</h5><br>
				<h5><b>ID:</b> {{ $data['perfil']->idPerfil }}</h5><br>
				@foreach($data['nombres'] as $nombre)
					<h5 style="text-transform: capitalize;">Extras: {{ $nombre->nombre }}</h5><br>
				@endforeach
				@foreach($data['mascaras'] as $mascara)
					@if( strlen($mascara->nombre) > 0 )
						<h5 style="text-transform: capitalize;"><!--{{Lang::get('messages.perfInfLblMascara')}}--> {{ $mascara->nombre }}</h5><br>
					@endif
				@endforeach
				@if(strlen($data['perfil']->facebook) > 0)
					<a href="{{ $data['perfil']->facebook }}"target="_blank">{{ substr($data['perfil']->facebook, 0, 25) }}...</a><br>
				@endif
				@if(strlen($data['perfil']->twitter) > 0)
					<a href="{{ $data['perfil']->twitter }}"target="_blank">{{ substr($data['perfil']->twitter, 0, 25) }}...</a><br>
				@endif
				@if(strlen($data['perfil']->instagram) > 0)
					<a href="{{ $data['perfil']->instagram }}"target="_blank">{{ substr($data['perfil']->instagram, 0, 25) }}...</a><br>
				@endif
				@foreach($data['redes'] as $red)
					<a href="{{ $red->nombre }}"target="_blank">{{ substr($red->nombre, 0, 25) }}...</a><br>
				@endforeach
				<div class="botones_odio">
							<!--div class="cien"><h5>{{Lang::get('messages.perfInfLblTitulo')}}</h5></div-->
					<div class="cien">
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltVotarOtraVez')}}">
							<a href="#" class="button btn-voto-amor" data-tipo="1" data-id="{{ $data['perfil']->idPerfil }}" style="background-color:#ae3e34; margin-right:20px;">{{Lang::get('messages.perfInfLblOdio')}} 
								<span class="amor-votes">({{ $data['perfil']->odio }})</span>
							</a>
						</span>
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltVotar')}}">
							<a href="#" class="button btn-voto-amor" data-tipo="2" data-id="{{ $data['perfil']->idPerfil }}" style="background-color:#18232b;">{{Lang::get('messages.perfInfLblAmor')}}
								<span class="amor-votes">({{ $data['perfil']->amor }})</span>
							</a>
						</span>
					</div>
				</div>
							<div class="cien"><a href="#" data-reveal-id="agregarPublico">Añadir Info</a></div>

			</div>
			
			
										<!--div class="row columns " >
											<div class="large-4" style="margin-left:10em;">
												<h5>{{Lang::get('messages.perfInfLblAgregarInformacion')}}</h5>
											</div>
											<div class=" margin_boton">
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltLigar')}}"><a id="mostrarApodos" class="iconos_form "style="width:60px"><small style="color:#013B76">{{Lang::get('messages.perfInfLblApodosExtras')}}</small></a></span>
												<a id="mostrarMasca"class="iconos_form " ><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltMascara')}}"><i class="icon-mask"></i></span><small style="color:#013B76">{{Lang::get('messages.perfInfLblMascara')}}</small></a>
												<a id="mostrarSocial" class="iconos_form "><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltSocial')}}"><i class="icon-link"></i></span><small style="color:#013B76">{{Lang::get('messages.perfInfLblSocial')}}</small></a>
												<a id="mostrarRela" class="iconos_form "><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltRelacionados')}}"><i class="icon-usuarios"></i></span><small style="color:#013B76">{{Lang::get('messages.perfInfLblRelacionar')}}</small></a>
												<a id="mostrarFotos" class="iconos_form "><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltFotos')}}"><i class="icon-fotos"></i></span><small style="color:#013B76">{{Lang::get('messages.perfInfLblFotos')}}</small></a>
											</div>
										</div-->
	
				<div id="agregarPublico" class="reveal-modal" data-reveal>
				
				<div class="row">
				@if(count($data['nombres']) < 3)
					<div id="nombresAdd"class="large-4 columns pnl-nombres-publicos" data-id="{{ $data['perfil']->idPerfil }}">
						<div class="large-10 columns">
							<label>
								<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltNombresExtras')}}">{{Lang::get('messages.perfInfLblNombresAdicionales')}}</span>
								<input type="text" class="podos-publica" name="nombre" />
							</label>
						</div>
						<div class="large-2 columns formulario_alinear">
							<label>
								<button type="button" class="button align-top tiny btn-nombre-publica "style="background-color:#ae3e34;">{{Lang::get('messages.perfInfLblAgregar')}}</button>
							</label>
						</div>
					</div>
				@endif

				@if(count($data['apodos']) < 3)
					<div id="apodosAdd"class="large-4 columns pnl-apodos-publicos  " data-id="{{ $data['perfil']->idPerfil }}">
						<div class="large-10 columns">
							<label>
								<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltApodosExtras')}}">{{Lang::get('messages.perfInfLblApodo')}}</span>
								<input type="text" class="podos-publica" name="apodo" />
							</label>
						</div>
						<div class="large-2 columns formulario_alinear">
							<label>
								<button type="button" class="button align-top tiny btn-apodo-publica "style="background-color:#ae3e34;">{{Lang::get('messages.perfInfLblAgregar')}}</button>
							</label>
						</div>
					</div>
				@endif
				@if(count($data['mascaras']) < 10)
					<div id="masca"class="large-4 columns pnl-mascaras-publicas  " data-id="{{ $data['perfil']->idPerfil }}">
						<div class="large-10 columns">
							<label>
								<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltMascarasExtras')}}">{{Lang::get('messages.perfInfLblMascara')}}</span>
								<input type="text" class="mascara-publica typeahead" name="mascara" />
							</label>
						</div>
						<div class="large-2 columns formulario_alinear">
							<label>
								<button type="button" class="button align-top tiny btn-mascara-publica "style="background-color:#ae3e34;">{{Lang::get('messages.perfInfLblAgregar')}}</button>
							</label>
						</div>
					</div>
				@endif
				@if(count($data['fotos']) < 5)
					<div class="large-12">
						<div id="fotosAdd"class="large-4 columns  ">
							<form action="{{ URL::to('fotos_publicas').'/'.$data['perfil']->idPerfil }}" method="post" id="frmEvidencia" enctype="multipart/form-data" class="multi-image" data-abide>
								<div class="large-10 columns">
									
									<label>
										<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltFotosExtras')}}">
											{{Lang::get('messages.perfInfLblImagenExtra')}}
										</span>
										<input type="file" id="fotos" name="fotos[]" multiple="multiple" accept="image/*" required/>
									</label>
									<small class="error">{{Lang::get('messages.perfInfLblObligatorio')}}</small>
								</div>
								<div class="large-2 columns formulario_alinear">
									<label>
										<button type="submit" class="button align-top tiny btn- "style="background-color:#ae3e34;">{{Lang::get('messages.perfInfLblAgregar')}}</button>
									</label>
								</div>
							</form>
						</div>
					</div>
				@endif
				
				<div class="large-12">	
					@if(count($data['redes']) < 10)
						<div id="social"class="large-4 columns pnl-redes-publicas " data-id="{{ $data['perfil']->idPerfil }}">
							<div class="large-10 columns">
								<label>
									<span data-tooltip  aria-haspopup="true" class="has-tip" title="">{{Lang::get('messages.perfInfLblSocialMedia')}}</span>
									<input type="text" class="mascara-publica" />
								</label>
							</div>
							<div class="large-2 columns formulario_alinear">
								<label>
									<button type="button" class="button align-top tiny btn-red-publica "style="background-color:#ae3e34;">{{Lang::get('messages.perfInfLblAgregar')}}</button>
								</label>
							</div>
						</div>
					@endif
				</div>
				<div class="large-12">
					@if(count($data['relaciones']) < 5)
						<div id="rela"class="large-4 columns pnl-perfiles-publicos " data-id="{{ $data['perfil']->idPerfil }}">
							<div class="large-10 columns">
								<label>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltCompliceExtra')}}">{{Lang::get('messages.perfInfLblIdPerfil')}}</span>
									<input type="text" class="perfil-publica" name="mascara" />
								</label>
							</div>
							<div class="large-2 columns formulario_alinear">
								<label>
									<button type="button" class="button align-top tiny btn-perfil-publico "style="background-color:#ae3e34;">{{Lang::get('messages.perfInfLblAgregar')}}</button>
								</label>
							</div>
						</div>
					@endif
				</div>
			</div>
					<!-- TERMINA SILDER DE IMAGENES MINIATURA -->
					<a class="close-reveal-modal">&#215;</a>
				</div>
				<a class="exit-off-canvas"></a>


		</article> <!-- TERMINA SECCION INFO PERFIL AREA-->
		<div class="borde_portada formulario_alinear"></div>
		<div class="diez">
				<span data-tooltip aria-haspopup="true" class="has-tip" title="Number of posts made on this profile:">
					<h6 style="text-align:center">{{ count($data['posts']) }} Post</h6>
				</span>
		</div>
					<!-- AQUI VAN LOS DATOS DEL PERFIL QUE AGREGÓ EL DUEÑO DEL PERFIL-->
		<article class="perfil">
			<div class="cien " style="margin-bottom:3em;">
				<h5 class="letras_n_perfil">{{Lang::get('messages.perfInfLblAgregarInformacion')}}:</h5>
				<form class=" postearEv Hidden" enctype="multipart/form-data" data-abide>
					<div id="conCampo" class="Hidden">
						<label>
							<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesion1')}}">{{Lang::get('messages.perfPorLblConfesion')}}: </span> 
								<textarea style="overflow:auto; min-height:90px"placeholder="" name="confesion" required></textarea>
						</label>
						<small class="error">{{Lang::get('messages.perfPorLblConfesionVal')}}</small><br>
						<small>{{Lang::get('messages.perfPorLblRequerido')}}:</small>
						<input type="text" placeholder="{{Lang::get('messages.perfPorLblSecretBox')}}" name="secret" required/>
						<small class="error">{{Lang::get('messages.perfPorLblSecretBoxReq')}}</small>
					</div>
					<div id="linkCampo" style="margin-top:5px;">
						<label>
							<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionRelacionado')}}">
							</span> 
							<input type="text"placeholder="{{Lang::get('messages.perfPorLblEnlace1')}}" name="link_evi" class="expand" pattern="url"/>
						</label>
						<small class="error">{{Lang::get('messages.perfPorLblEnlace1Example')}}</small>
					</div>
					<div id="videoCampo" class="Hidden">
						<label>
							{{Lang::get('messages.perfPorLblEvidenciaVideo')}}:
							<input  type="text" name="link" placeholder=""/>
						</label>
					</div>
					<div id="eviCampo" class="Hidden">
						<label>
							{{Lang::get('messages.perfPorLblEvidenciaFoto')}}:
							<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
						</label>
					</div>
					<div id="botCampo" class="Hidden">	
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionEvidencia')}}"><button type="button" class="button btn-postear" style=""> {{Lang::get('messages.perfPorLblPostear')}}</button></span>
						<h6 style="color:#a7a9ab;">{{Lang::get('messages.perfPostLblTitulo')}}</h6>
					</div>
				</form>	<!--     TERMINA FORMULARIO POSTEO       -->
			</div>
		
							
					<!--span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesion')}}">
									</span> 
									<p style="margin-left: 3px;color:#013B76">{{Lang::get('messages.perfPorLblConfesion')}}</p>
								
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionVideo')}}">
										<i class="icon-fotos"></i>
									</span>
									<p style="color:#013B76">{{Lang::get('messages.perfPorLblAgregrEle')}}</p>
								
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionSecretBox')}}">
									
									</span>
									<p style="color:#013B76">{{Lang::get('messages.perfPorLblSecretBox')}}</p>
								
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionEnlace')}}">
									
									</span>
									<p style="color:#013B76">{{Lang::get('messages.perfPorLblEnlace')}}</p-->
			
				
				<div class="noventa" >
					<div class="area_evidencia">
						<div class="cien" >
							<div class="post_evidencia "><!-- AQUI SE POSTEA CADA SECRET BOX CADA COMENTARIO FOTOS Y VIDEO-->
								@foreach($data['posts'] as $post)
									<div class="fondo_post">
										<h6 class="secret_box" style="margin-top: .5em;">{{$post->secret}}</h6>
										
										@if(strlen($post->link_evi) > 0)
											<div class="large-12" style="text-align:center; margin-bottom:9px;">
												<a style="font-size:25px; word-wrap: break-word;" href="{{$post->link_evi}}" target="_blank" >
													{{substr($post->link_evi, 0, 80)}}...
												</a>
											</div>
										@endif
								
																 <!-- CONTENEDOR DE EVIDENCIA PAL -->
										@if(strlen($post->link) > 0)
											<div class="large-12 columns" style="text-align:center;margin-bottom:9px;"> <!--VIDEO POST EVIDENCIA PAL-->
												<h3 style="text-align:center;">{{Lang::get('messages.perfPostLblVideo')}}</h3>
												<iframe width="50%" height="330" src="//www.youtube.com/embed/{{$post->link}}" frameborder="0" allowfullscreen></iframe>
												<div class="confiable isHidden" data-tipo="video_post" data-id="{{ $post->idPost }}">
													{{Lang::get('messages.perfPostLblConfiable')}}:
													<a href="#" data-conf="1"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionMala')}}"><i class="icon-checkmark"></i></span> [{{ $post->vid_siconf }}]</a>
													<a href="#" data-conf="0"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionMala')}}"><i class="icon-tacha"></i></span> [{{ $post->vid_noconf }}]</a>
												</div>
												<div class="com_likes isHidden">
													<a href="" data-reveal-id="comentBox">
														<i style="font-size: 25px;" class="icon-chat comm-post" data-tipo="2" data-id="{{$post->idPost}}"></i>
													</a>
													<a class="votos_mostrar"><i style=" font-size: 28px;"class="icon-thumbs-up"></i></a>											
													<div class="votosPost formulario_alinear votos-container Hidden" data-tipo="2" data-idpost="{{$post->idPost}}">
														<div class="goodPost formulario_alinear">
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="corazon">
																<img src="../img/emoticon/5.gif">
																<p class="num_rank">{{ $post->vid_corazon }}</p>
															</a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="estrella">
																<img src="../img/emoticon/4.gif">
																<p class="num_rank">{{ $post->vid_estrella }}</p>
															</a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="blike">
																<img src="../img/emoticon/3.gif">
																<p class="num_rank">{{ $post->vid_blike }}</p>
															</a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="carita">
																<img src="../img/emoticon/2.gif">
																<p class="num_rank">{{ $post->vid_carita }}</p>
															</a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="cake">
																<img src="../img/emoticon/1.gif">
																<p class="num_rank">{{ $post->vid_cake }}</p>
															</a>
														</div>
														<div class="badPost formulario_alinear">
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="caca"><img src="../img/emoticon/10.gif"><p class="num_rank">{{ $post->vid_caca }}</p></a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="craneo"><img src="../img/emoticon/9.gif"><p class="num_rank">{{ $post->vid_craneo }}</p></a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="bug"><img src="../img/emoticon/8.gif"><p class="num_rank">{{ $post->vid_bug }}</p></a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="gota"><img src="../img/emoticon/7.gif"><p class="num_rank">{{ $post->vid_gota }}</p></a>
															<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="enojo"><img src="../img/emoticon/6.gif"><p class="num_rank">{{ $post->vid_enojo }}</p></a>
														</div>
													</div>
												</div>
											</div>	
										@endif
									
										<div class="large-12 columns" style="margin-bottom:9px; "><!--VIDEO FOTO EVIDENCIA PAL-->
											@foreach($post->fotos as $foto)
												<div class="cuadro_foto">
													<a href="" data-reveal-id="slider_post_{{$post->idPost}}" data-id="{{$foto->idFotoPost}}" data-idpost="{{$post->idPost}}" class="open-modal foto-post">
														<img src="{{ URL::asset('img\\db_imgs\\posts\\'.$foto->foto) }}"/>
													</a>
												</div>
											@endforeach<!--FOTOS POST EVIDENCIA-->

											@if($data['perfil']->idAliasBase == $post->idAlias)
												<a id="fotosAddPost"><i class="icon-fotos" style="font-size:18px;"></i></a>
												<div id="campoFotosPost"class="large-12 Hidden">
													<form class="postear-post-evi" data-idpost="{{$post->idPost}}" enctype="multipart/form-data" data-abide>
														<div id="evi-post-campo">
															<label>
															{{Lang::get('messages.perfPostLblAgregarFoto')}}
																<input type="file" class="file-post-evi" name="files[]" multiple="multiple" accept="image/*" required />
															</label>
															<small class="error">{{Lang::get('messages.perfPorLblRequerido')}}</small>
														</div>
														<div>
															<button type="button" class="button btn-file-post-evi" style="background-color: #ae3e34;">{{Lang::get('messages.perfInfLblAgregar')}}</button>
														</div>
													</form>
												</div>
											@endif
												
											<div class="large-12" style="text-align:right">
												<!--h5>{{Lang::get('messages.perfPostLblConfiabilidadPost')}}:</h5-->
												<div class="confiable" data-tipo="post" data-id="{{ $post->idPost }}">
													{{Lang::get('messages.perfPostLblConfiable')}}:
													<a href="#" data-conf="1"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionMala')}}"><img src="{{ URL::asset('img\\red_1.png') }}"></span> [{{ $post->siconf }}]</a>
													<a href="#" data-conf="0"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionMala')}}"><img src="{{ URL::asset('img\\verde_1.png') }}"></span> [{{ $post->noconf }}]</a>
												</div>
												<div class="com_likes isHidden">
													<a class="votos_mostrar">
														<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionMalaDesc')}}">
															<i style=" font-size: 28px;"class="icon-thumbs-up"></i>
														</span>
													</a>										
													<div class="votosPost  formulario_alinear votos-container Hidden" data-tipo="1" data-idpost="{{$post->idPost}}">
														<div class="goodPost formulario_alinear">
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="corazon">
																	<img src="../img/emoticon/5.gif">
																	<p class="num_rank">{{ $post->corazon }}</p>
																</a>
															</span>
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="estrella">
																	<img src="../img/emoticon/4.gif">
																	<p class="num_rank">{{ $post->estrella }}</p>
																</a>
															</span>
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="blike">
																	<img src="../img/emoticon/3.gif">
																	<p class="num_rank">{{ $post->blike }}</p>
																</a>
															</span>
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="carita">
																	<img src="../img/emoticon/2.gif">
																	<p class="num_rank">{{ $post->carita }}</p>
																</a>
															</span>
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="cake">
																	<img src="../img/emoticon/1.gif">
																	<p class="num_rank">{{ $post->cake }}</p>
																</a>
															</span>
														</div>
														<div class="badPost formulario_alinear">
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="caca">
																	<img src="../img/emoticon/10.gif">
																	<p class="num_rank">{{ $post->caca }}</p>
																</a>
															</span>
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="craneo">
																	<img src="../img/emoticon/9.gif">
																	<p class="num_rank">{{ $post->craneo }}</p>
																</a>
															</span>
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="bug">
																	<img src="../img/emoticon/8.gif">
																	<p class="num_rank">{{ $post->bug }}</p>
																</a>
															</span>
																<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="gota">
																	<img src="../img/emoticon/7.gif">
																	<p class="num_rank">{{ $post->gota }}</p>
																</a>
															</span>
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}">
																<a href="#" data-id="{{ $post->idPost }}" class="vote-rank-post" data-tipo="enojo">
																	<img src="../img/emoticon/6.gif">
																	<p class="num_rank">{{ $post->enojo }}</p>
																</a>
															</span>
														</div>
													</div>	
												</div>
												<p style="float:left;" class="texto_justifica fuente_bold">
													{{Lang::get('messages.perfPostLblConfesion')}}<br>{{$post->confesion}}
												</p><br>
											</div>

										</div>
										
								
											<!-- SLIDER MODAL DE EVIDENCIAS FOTOGRAFICAS GALERIA PAL-->	
										<div id="slider_post_{{$post->idPost}}" class="reveal-modal fotos-modal" data-reveal>
											<div class="titulo_barra">
												<h2>{{Lang::get('messages.perfPostLblGaleria')}}</h2>
											</div>
											<div class="row">
												<div class="small-8 columns slider_cuadro">
													<div class="orbit-link isHidden">
														@foreach($post->fotos as $foto)
															<a data-orbit-link="foto-{{$post->idPost}}-{{$foto->idFotoPost}}" class="small button"></a>
														@endforeach
													</div>
												    <ul class="orbit" data-tipo="post" data-orbit data-options="circular:true;">
												        @foreach($post->fotos as $foto)
												            <li data-orbit-slide="foto-{{$post->idPost}}-{{$foto->idFotoPost}}">
												               <img data-id="{{$foto->idFotoPost}}" src="{{ URL::asset('img\\db_imgs\\posts\\'.$foto->foto) }} "/>
												            </li>
												            @endforeach        
												    </ul>
												</div>
												<div class="small-4 columns">
													<div class="row">
														<div class="foto-comment">
															<div class="confiable" data-tipo="imagen_post" data-id="">
																{{Lang::get('messages.perfPostLblConfiable')}}:
																<a href="#" data-conf="1">
																	<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}">
																		<img src="{{ URL::asset('img\\red_1.png') }}">
																	</span> 
																	[0]
																</a>
																<a href="#" data-conf="0">
																	<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}">
																		<img src="{{ URL::asset('img\\verde_1.png') }}">
																	 </span>[0]
																</a>
															</div>
														 	<div class="large-12 columns">
														 		<div class="com_likes isHidden" style="margin-bottom:5px;">
																	<a class="votos_mostrar"><i class="icon-thumbs-up" style="color:#ae3e34;  font-size: 28px;"></i></a>														
																	<div class="votosPost formulario_alinear votos-container Hidden">
																		<div class="goodPost formulario_alinear">
																			<a href="#" class="vote-foto-post" data-tipo="corazon"><img src="../img/emoticon/5.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="estrella"><img src="../img/emoticon/4.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="blike"><img src="../img/emoticon/3.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="carita"><img src="../img/emoticon/2.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="cake"><img src="../img/emoticon/1.gif"><p class="num_rank">0</p></a>
																		</div>
																		<div class="badPost formulario_alinear">
																			<a href="#" class="vote-foto-post" data-tipo="caca"><img src="../img/emoticon/10.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="craneo"><img src="../img/emoticon/9.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="bug"><img src="../img/emoticon/8.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="gota"><img src="../img/emoticon/7.gif"><p class="num_rank">0</p></a>
																			<a href="#" class="vote-foto-post" data-tipo="enojo"><img src="../img/emoticon/6.gif"><p class="num_rank">0</p></a>
																		</div>
																	</div>
																</div>
															</div>
														   	<div class="small-12 columns">
														   		<textarea placeholder=""></textarea>
														   	</div>
														   	<div class="small-12 columns">
														   		<button type="button" class="btn-comentar button tiny expand" data-mod="post" data-idpost="{{$post->idPost}}">Comment</button>
														   	</div>
														</div>
														<div class="large-12 columns gv-comentarios">
														   
														</div>
													</div>
												</div>			   	
												<!-- TERMINA SILDER DE IMAGENES MINIATURA -->
												<a class="close-reveal-modal">&#215;</a>
											</div>
										</div>
										<!-- TERMINA SLIDER MODAL DE EVIDENCIAS FOTOGRAFICAS GALERIA PAL-->	
										<div class="row  subpost_area" >
											<div class="seccion_sub_com">
												<div class="sub_coment_titulo">
													<h4 >COMMENTS</h4>
												</div>

											</div>
											<ul class="gv-subcomentarios"  style="margin-top:2em;">
												@foreach($post->subcomentarios as $subcomentario)
													
												
												<li class="cien">
													<div class="cien">
														<h3 style="font-size:18px; color:red;"> <strong style="text-transform: capitalize;">{{$subcomentario->usuario}}</strong></h3>
														<!--label>{{$subcomentario->created_at}}</label-->
													</div>
													@if(strlen($subcomentario->comentario) > 0)
														<div class="cien" style="margin-bottom:9px">
															<div class="cien">
																<p class="texto_justifica" style="color:black">{{$subcomentario->comentario}}</p>
															</div>
															<div class="large-12 columns" style="text-align:right;">
																<div class="confiable" data-tipo="com_subpost" data-id="{{ $subcomentario->idSubcomentario }}">
																	{{Lang::get('messages.perfPostLblConfiable')}}:
																	<a href="#" data-conf="1">
																		<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}">
																			<img src="{{ URL::asset('img\\red_1.png') }}">
																		</span>
																		[{{ $subcomentario->com_siconf }}]
																	</a>
																	<a href="#" data-conf="0">
																		<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}">
																			<img src="{{ URL::asset('img\\verde_1.png') }}">
																		</span>
																		[{{ $subcomentario->com_noconf }}]
																	</a>
																</div>
																<div class="com_likes isHidden" style="margin-bottom:5px;;">
																	<a class="votos_mostrar">
																		<i class="icon-thumbs-up" style="color:#ae3e34;  font-size: 28px;"></i>
																	</a>
																	<div class="votosPost formulario_alinear votos-container Hidden" data-tipo="1">											
																		<div class="goodPost formulario_alinear">													
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="corazon"><img src="../img/emoticon/5.gif"><p class="num_rank">{{ $subcomentario->com_corazon }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="estrella"><img src="../img/emoticon/4.gif"><p class="num_rank">{{ $subcomentario->com_estrella }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="blike"><img src="../img/emoticon/3.gif"><p class="num_rank">{{ $subcomentario->com_blike }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="carita"><img src="../img/emoticon/2.gif"><p class="num_rank">{{ $subcomentario->com_carita }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="cake"><img src="../img/emoticon/1.gif"><p class="num_rank">{{ $subcomentario->com_cake }}</p></a>
																		</div>
																		<div class="badPost formulario_alinear">
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="caca"><img src="../img/emoticon/10.gif"><p class="num_rank">{{ $subcomentario->com_caca }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="craneo"><img src="../img/emoticon/9.gif"><p class="num_rank">{{ $subcomentario->com_craneo }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="bug"><img src="../img/emoticon/8.gif"><p class="num_rank">{{ $subcomentario->com_bug }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="gota"><img src="../img/emoticon/7.gif"><p class="num_rank">{{ $subcomentario->com_gota }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="enojo"><img src="../img/emoticon/6.gif"><p class="num_rank">{{ $subcomentario->com_enojo }}</p></a>
																		</div>
																	</div>
																</div>
															</div>	
														</div>
													@endif
													@if(strlen($subcomentario->link_evi) > 0)
													<div class="cien " style="text-align:center; margin-bottom:9px;">
														<a style="font-size:25px; word-wrap: break-word; " href="{{$subcomentario->link_evi}}" target="_blank">
															{{substr($subcomentario->link_evi, 0, 80)}}...
														</a>
													</div>
													@endif
													<div class="cien">
														@if(strlen($subcomentario->video) > 0)
															<div class="large-12 columns" style="text-align:center; margin-bottom:9px;">
																<iframe width="50%" height="330" src="//www.youtube.com/embed/{{$subcomentario->video}}" frameborder="0" allowfullscreen></iframe>
																<div class="confiable isHidden" data-tipo="vid_subpost" data-id="{{ $subcomentario->idSubcomentario }}">
																	{{Lang::get('messages.perfPostLblConfiable')}}::
																	<a href="#" data-conf="1"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}"><img src="{{ URL::asset('img\\red_1.png') }}"></span> [{{ $subcomentario->com_siconf }}]</a>
																	<a href="#" data-conf="0"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}"><img src="{{ URL::asset('img\\verde_1.png') }}"></span> [{{ $subcomentario->com_noconf }}]</a>
																</div>
																<div class="com_likes isHidden" style="margin-bottom:5px;">
																	<a class="votos_mostrar"><i class="icon-thumbs-up" style="color:#ae3e34;  font-size: 28px;"></i></a>
																	<div class="votosPost formulario_alinear votos-container Hidden" data-tipo="2">
																		<div class="goodPost formulario_alinear">													
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="corazon"><img src="../img/emoticon/5.gif"><p class="num_rank">{{ $subcomentario->vid_corazon }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="estrella"><img src="../img/emoticon/4.gif"><p class="num_rank">{{ $subcomentario->vid_estrella }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="blike"><img src="../img/emoticon/3.gif"><p class="num_rank">{{ $subcomentario->vid_blike }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="carita"><img src="../img/emoticon/2.gif"><p class="num_rank">{{ $subcomentario->vid_carita }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="cake"><img src="../img/emoticon/1.gif"><p class="num_rank">{{ $subcomentario->vid_cake }}</p></a>
																		</div>
																		<div class="badPost formulario_alinear">
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="caca"><img src="../img/emoticon/10.gif"><p class="num_rank">{{ $subcomentario->vid_caca }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="craneo"><img src="../img/emoticon/9.gif"><p class="num_rank">{{ $subcomentario->vid_craneo }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="bug"><img src="../img/emoticon/8.gif"><p class="num_rank">{{ $subcomentario->vid_bug }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="gota"><img src="../img/emoticon/7.gif"><p class="num_rank">{{ $subcomentario->vid_gota }}</p></a>
																			<a href="#" data-id="{{ $subcomentario->idSubcomentario }}" class="vote-rank-subpost-video" data-tipo="enojo"><img src="../img/emoticon/6.gif"><p class="num_rank">{{ $subcomentario->vid_enojo }}</p></a>
																		</div>
																	</div>
																</div>
															</div>
														@endif
														<div class="large-12 columns" style="margin-bottom:9px; margin-top:9px;">
															@foreach($subcomentario->fotos as $fotos)
																<div class="cuadro_foto">
																	<a href="" data-reveal-id="slider_subcom_{{$subcomentario->idSubcomentario}}" data-id="{{$fotos->idSubcomentarioFoto}}" data-idpost="{{$post->idPost}}" class="open-modal foto-subcom">
																		<img src="{{ URL::asset('img\\db_imgs\\posts\\'.$fotos->imagen) }}"/>
																	</a>
																</div>
															@endforeach
														</div>
														<!--SLIDER-->
														<div id="slider_subcom_{{$subcomentario->idSubcomentario}}" class="reveal-modal fotos-modal" data-reveal>
															<div class="titulo_barra">
																<h2>{{Lang::get('messages.perfPostLblGaleriaComentarios')}}</h2>
															</div>
															<div class="row">
																<div class="small-8 columns slider_cuadro">
																	<div class="orbit-link isHidden">
																		@foreach($subcomentario->fotos as $fotos)
																			<a data-orbit-link="fotoSubcom-{{$fotos->idSubcomentarioFoto}}" class="small button"></a>
																		@endforeach
																	</div>
																	<ul data-orbit class="orbit" data-tipo="subcom" data-options="circular:true;">
																	@foreach($subcomentario->fotos as $fotos)
																		<li data-orbit-slide="fotoSubcom-{{$fotos->idSubcomentarioFoto}}">
																			<img data-id="{{$fotos->idSubcomentarioFoto}}" src="{{ URL::asset('img\\db_imgs\\posts\\'.$fotos->imagen) }}"/>
																		</li>
																	@endforeach
																	</ul>
																</div>
																<div class="small-4 columns foto-comment">
																	<div class="confiable" data-tipo="img_subpost" data-id="">
																		{{Lang::get('messages.perfPostLblConfiable')}}::
																		<a href="#" data-conf="1">
																			<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}">
																				<img src="{{ URL::asset('img\\red_1.png') }}">
																			</span> [0]
																		</a>
																		<a href="#" data-conf="0">
																			<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionBuena')}}">
																				<img src="{{ URL::asset('img\\verde_1.png') }}">
																			</span> [0]
																		</a>
																	</div>
																	<div class="row">
																		<div class="large-12 columns">
																 			<div class="com_likes isHidden" style="margin-bottom:5px;">
																				<a class="votos_mostrar">
																					<i class="icon-thumbs-up" style="color:#ae3e34;  font-size: 28px;"></i>
																				</a>														
																				<div class="votosPost formulario_alinear votos-container Hidden">
																					<div class="goodPost formulario_alinear">
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="corazon"><img src="../img/emoticon/5.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="estrella"><img src="../img/emoticon/4.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="blike"><img src="../img/emoticon/3.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="carita"><img src="../img/emoticon/2.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="cake"><img src="../img/emoticon/1.gif"><p class="num_rank">0</p></a></span>
																					</div>

																					<div class="badPost formulario_alinear">
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="caca"><img src="../img/emoticon/10.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="craneo"><img src="../img/emoticon/9.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="bug"><img src="../img/emoticon/8.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="gota"><img src="../img/emoticon/7.gif"><p class="num_rank">0</p></a></span>
																						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-subfoto" data-tipo="enojo"><img src="../img/emoticon/6.gif"><p class="num_rank">0</p></a></span>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="small-12 columns foto-comment">
																	   		<div class="small-12 columns">
																	   			<textarea placeholder=""></textarea>
																	   		</div>
																	   		<div class="small-12 columns">
																	   			<button type="button" class="btn-comentar button tiny expand" data-mod="subcom">{{Lang::get('messages.perfPostLblComentarios')}}</button>
																	   		</div>
																		</div>
																		<div class="small-12 columns gv-comentarios"></div>
																	</div>
																</div>
															</div>

															<a class="close-reveal-modal">&#215;</a>
														</div>
														<!-- TERMINA SLIDER-->
													</div>
												</li>
												@endforeach
											</ul>
										</div>
																			<!-- FOOTER POST MAS EVIDENCIA COMENTS REDES SOCIALES ETC-->	
										<div class="row" style="margin-top:1em">	
											<div class="alto">
												<div class=" subcomentarios-posts" data-id="{{$post->idPost}}">
													<div class="large-4 columns" style="float:right;padding-left:3em;">
														<div class="post_foot">
															<a class="confSec">
																<img data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaTexto')}}" src="{{ URL::asset('img\\coment2.png') }}">
															</a>
														</div>
														<div class="post_foot borde_img">
															<a class="fotoSec">
																<img data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaImagen')}}" src="{{ URL::asset('img\\img1.png') }}">
															</a>
														</div>
														<div class="post_foot borde_img">
															<a class="vidSec">
																<img data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaYoutube')}}" src="{{ URL::asset('img\\video1.png') }}">
															</a>
														</div>
														<div class="post_foot borde_img">
															<a class="linkSec">
																<img data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaEnlaces')}}" src="{{ URL::asset('img\\link1.png') }}">
															</a>
														</div>
																<!--div class="postear_box_2 ">
																<a class="confSec">
																	<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaTexto')}}">
																		<i class="icon-chat"></i>
																	</span>
																</a>
																<a class="fotoSec">
																	<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaImagen')}}">
																		<i class="icon-fotos"></i>
																	</span>
																</a>
																<a class="vidSec">
																	<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaYoutube')}}">
																		<i class="icon-camara"></i>	
																	</span>
																</a>
																<a class="linkSec">
																	<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaEnlaces')}}">
																		<i class="icon-link"></i>	
																	</span>
																</a>
															</div-->
													</div>
															<!--div class="large-4 columns">
																<div class="compartir_redes ">	
																	<div class="fb-share-button" style="margin-right:20px; vertical-align:top;"  data-layout="button_count"></div>
																		<a href="https://twitter.com/share" class="twitter-share-button">{{Lang::get('messages.perfPostLblTweet')}}</a>
																</div> 
															</div-->
												
																		<!--LIKE POST CONFIABLE GLOBAL-->
													<div class="large-2 columns">
														<a href="" data-reveal-id="comentBox">
															<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltEvidenciaPrivado')}}"><i class="icon-chat comm-post" data-tipo="1" data-id="{{$post->idPost}}" style="font-size:25px"></i></span>											
														</a>
														
													</div>
													<form class="small-12 columns form-subcomentario" enctype="multipart/form-data" data-abide>
														<div class="small-12 columns">
															<div  class="small-12 columns conSec Hidden ">
																<label>
																	<small></small>
																	<textarea style="overflow:auto; min-height:90px" name="comentario" placeholder="{{Lang::get('messages.perfPorLblConfesion')}} {{Lang::get('messages.perfPorLblRequerido')}}" required></textarea>
																</label>
																<small class="error">{{Lang::get('messages.perfPostLblConfesionVal')}}</small>
															</div>
														</div>
														<div class="small-12 columns">
															<div class="small-12 columns linkerSec Hidden">
																<label>
																	<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionRelacionado')}}"> </span> 
																	<input type="text" placeholder="{{Lang::get('messages.perfPorLblEnlace1')}}" name="link_evi" pattern="url"/>
																</label>
																<small class="error">{{Lang::get('messages.perfPorLblEnlace1Example')}}</small>
															</div>
														</div>
														<div class="small-12 columns">
															<div  class="small-12 columns viSec Hidden">
																<label>
																	
																	<input type="text" name="video" placeholder="{{Lang::get('messages.perfPorLblEvidenciaVideo')}} - {{Lang::get('messages.perfPostTltEvidenciaLinkYoutube')}}"/>
																</label>
															</div>
														</div>
														<div class="small-12 columns">
															<div  class="small-12 columns fotSec Hidden">
																<label>
																	{{Lang::get('messages.perfPorLblEvidenciaFoto')}}
																	<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
																</label>
															</div>
														</div>
														<div class="small-12 columns">
															<label>
																<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltInformacionGuardar')}}"><button type="button" class="button tiny btn-subcomentar btnSec Hidden"style="background-color: #ae3e34 ;">{{Lang::get('messages.perfPostLblSubir')}}</button></span>
															</label>
														</div>
													</form>
												</div>
											</div>
										</div><!-- TERMINA FOOTER POST MAS EVIDENCIA COMENTS REDES SOCIALES ETC-->
									</div>		
								@endforeach
							</div>				<!-- TEMINA POSt EVIDENCIA -->
						</div> 				<!-- TERMINA CIEN -->
					</div> 			<!-- TERMINA AREA DE EVIDENCIA -->
				</div> 					<!-- TERMINA NOVENTA-->
				<div class="posteo_nuevo">
					<div class="post_imagen"><a id="lapiz"><img src="{{ URL::asset('img\\coment.png') }}"></a></div>
					<div class="post_imagen "><a id="fotosP"><img src="{{ URL::asset('img\\img.png') }}"></a></div>
					<div class="post_imagen "><a id="secre"><img src="{{ URL::asset('img\\video.png') }}"></a></div>
					<div class="post_imagen "><a id="linkear"><img src="{{ URL::asset('img\\link.png') }}"></a></div>
				</div>
			

				<!-- SILDER DE IMAGENES MINIATURA -->
				<div id="sliderGaleria" class="reveal-modal" data-reveal>
					<div class="titulo_barra">
						<h2>{{Lang::get('messages.perfPostModFotoExtra')}}</h2>
					</div>
					
					<div class="slider_cuadro_fotos_perfil">				   
						<ul data-orbit style="">
						@foreach($data['fotos'] as $evidencia)
							<li>
								<img src="{{ URL::asset('img\\db_imgs\\publicas\\'.$evidencia->foto) }}"/>
							</li>
						@endforeach
							<li>
								<img  src="{{ URL::asset('img\\db_imgs\\'.$data['perfil']->foto) }}"/>
							</li>
						</ul>				
					</div>
					
								<!-- TERMINA SILDER DE IMAGENES MINIATURA -->
					<a class="close-reveal-modal">&#215;</a>
				</div>
				<a class="exit-off-canvas"></a>
								<!-- MODAL SLIDER EVIDENCIAS -->
				<div id="sliderFotoPerfil" class="reveal-modal" data-reveal>
					<div class="titulo_barra">
						<h2>{{Lang::get('messages.perfPosModFotoPrincipal')}}</h2>
					</div>
					
					<div class="slider_cuadro_fotos_perfil">				   
						<ul data-orbit style="">
							<li>
								<img src="{{ URL::asset('img\\db_imgs\\'.$data['perfil']->foto) }}"/>
							</li>
						</ul>				
					</div>
					
					<!-- TERMINA SILDER DE IMAGENES MINIATURA -->
					<a class="close-reveal-modal">&#215;</a>
				</div>
				<a class="exit-off-canvas"></a>
						<!-- MODAL SLIDER EVIDENCIAS -->

				<div id="sliderEvidencia" class="reveal-modal fotos-modal" data-reveal>
					<div class="titulo_barra">
						<h2>{{Lang::get('messages.perfPostModGaleriaEvidencia')}}</h2>
					</div>
				
					<div class="row">
						<div class="small-8 columns slider_cuadro">
							<div class="orbit-link isHidden">
								@foreach($data['evidencias'] as $evidencia)
								<a data-orbit-link="fotoEvi-{{$evidencia->idMedia}}" class="small button"></a>
								@endforeach
							</div>
							<ul data-orbit class="orbit" data-tipo="media" data-options="circular:true;">
							@foreach($data['evidencias'] as $evidencia)
								@if ($evidencia->tipo == 2)
								<li data-orbit-slide="fotoEvi-{{$evidencia->idMedia}}">
									<img data-id="{{$evidencia->idMedia}}" src="{{ URL::asset('img\\db_imgs\\evidencias\\'.$evidencia->foto) }}"/>
								</li>
								@endif
							@endforeach
							</ul>
						</div>

						<div class="small-4 columns">
							<div class="confiable" data-tipo="imagen_evi" data-id="">
							{{Lang::get('messages.perfPostLblConfiable')}}:
								<a href="#" data-conf="1"><img src="{{ URL::asset('img\\red_1.png') }}"> [0]</a>
								<a href="#" data-conf="0"><img src="{{ URL::asset('img\\verde_1.png') }}"> [0]</a>
							</div>
							<div class="row">
								<div class="large-12 columns">
						 			<div class="com_likes isHidden" style="margin-bottom:5px;">
										<a class="votos_mostrar"><i class="icon-thumbs-up" style="color:#ae3e34;  font-size: 28px;"></i></a>														
										<div class="votosPost formulario_alinear votos-container Hidden">
											<div class="goodPost formulario_alinear">
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="corazon"><img src="../img/emoticon/5.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="estrella"><img src="../img/emoticon/4.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="blike"><img src="../img/emoticon/3.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="carita"><img src="../img/emoticon/2.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="cake"><img src="../img/emoticon/1.gif"><p class="num_rank">0</p></a></span>
											</div>

											<div class="badPost formulario_alinear">
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="caca"><img src="../img/emoticon/10.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="craneo"><img src="../img/emoticon/9.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="bug"><img src="../img/emoticon/8.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="gota"><img src="../img/emoticon/7.gif"><p class="num_rank">0</p></a></span>
												<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-rank-media" data-tipo="enojo"><img src="../img/emoticon/6.gif"><p class="num_rank">0</p></a></span>
											</div>
										</div>
									</div>
								</div>
								<div class="small-12 columns foto-comment">
							   		<div class="small-12 columns">
							   			<textarea placeholder=""></textarea>
							   		</div>
							   		<div class="small-12 columns">
							   			<button type="button" class="btn-comentar button tiny expand" data-mod="media">Comment</button>
							   		</div>
								</div>
								<div class="small-12 columns gv-comentarios">
								</div>
							</div>
						</div>
					</div>
					<a class="close-reveal-modal">&#215;</a>
				</div>	<!-- TERMINA MODAL SLIDER EVIDENCIAS -->
				<a class="exit-off-canvas"></a>
						<!-- MODAL DE LOS VOTOS DEL PERFIL -->
				<div id="votosPerfilBox" class="reveal-modal" data-reveal>
					<div class="titulo_barra">
						<h2>{{Lang::get('messages.perfPostModClasificacion')}}</h2>
						<small>{{Lang::get('messages.perfPostModClasificacionConsejo')}}</small>
					</div>
					<div class="row" >
						<div class="com_likes isHidden" style="margin-bottom:0px; margin-left:10px;">
							<div class="votosPost formulario_alinear votos-container  ">
								{{Lang::get('messages.perfPostModClasificacionBuena')}}.-
								<div class="goodPost formulario_alinear">
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="corazon"><img src="../img/emoticon/5.gif"><p class="num_rank">{{$data['perfil']->per_corazon}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="estrella"><img src="../img/emoticon/4.gif"><p class="num_rank">{{$data['perfil']->per_estrella}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="blike"><img src="../img/emoticon/3.gif"><p class="num_rank">{{$data['perfil']->per_blike}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="carita"><img src="../img/emoticon/2.gif"><p class="num_rank">{{$data['perfil']->per_carita}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="cake"><img src="../img/emoticon/1.gif"><p class="num_rank">{{$data['perfil']->per_cake}}</p></a></span>
								</div>
								{{Lang::get('messages.perfPostModClasificacionMala')}}.-	
								<div class="badPost formulario_alinear">
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="caca"><img src="../img/emoticon/10.gif"><p class="num_rank">{{$data['perfil']->per_caca}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="craneo"><img src="../img/emoticon/9.gif"><p class="num_rank">{{$data['perfil']->per_craneo}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="bug"><img src="../img/emoticon/8.gif"><p class="num_rank">{{$data['perfil']->per_bug}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="gota"><img src="../img/emoticon/7.gif"><p class="num_rank">{{$data['perfil']->per_gota}}</p></a></span>
									<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfPostTltConfesionNeutra')}}"><a href="#" class="vote-perfil" data-id="{{$data['perfil']->idPerfil}}" data-tipo="enojo"><img src="../img/emoticon/6.gif"><p class="num_rank">{{$data['perfil']->per_enojo}}</p></a></span>
								</div>
							</div>
						</div>
						<div class="large-12 formulario_alinear cons">
							<p style="margin-left:11.5em;margin-right:22px;">5pts</p>
							<p class="margencito">4pts</p>
							<p class="margencito">3pts</p>
							<p class="margencito">2pts</p>
							<p style="margin-right:9em;">1pts</p>
						
							<p style="margin-left:12.7em;margin-right:22px;">5pts</p>
							<p class="margencito">4pts</p>
							<p class="margencito">3pts</p>
							<p class="margencito">2pts</p>
							<p class="margencito">1pts</p>
						</div>
					</div>

					<a class="close-reveal-modal">&#215;</a>
				</div><!-- TERMINA MODAL DE LOS VOTOD DE PERFIL -->
						<!-- MODAL DE LOS COMENTARIOS DE CADA POST EN EL PERFIL -->
				<div id="comentBox" class="reveal-modal" data-reveal>
					<div class="titulo_barra">
						<h2>{{Lang::get('messages.perfPostModComentarios')}}</h2>
					</div>
					<div class="row "><!-- cargar aqui los coments-->
					</div>
					<div class="row post-comment">
						<div class="small-12 columns">
							<textarea placeholder=""></textarea>
						</div>
						<div class="small-12 columns">
							<button type="button" class="btn-comentar button tiny expand">{{Lang::get('messages.perfPostModComentario')}}</button>
						</div>
					</div>
					
					<div class="row gv-comentarios-post">
					</div>

					<a class="close-reveal-modal">&#215;</a>
				</div><!-- TERMINA MODAL DE LOS COMENTARIOS -->
				<a class="exit-off-canvas"></a>

				<div class="loading isHidden">
					<span>Loading
						{{ HTML::image('img/load.gif', 'Loading') }}
					</span>
				</div>
		</article>
	</section>
	<style type="text/css">
			.loading {
				background-color: rgba(30, 30, 30, 0.5);
				width: 100%;
				position: fixed;
				left: 0;
				top: 0;
				right: 0;
				bottom: 0;
			}
			.loading img{
				width: 50px;
			}
			.loading span {
				display: inline-block;
				width: 200px;
				height: 200px;
				font-weight: 900;
				font-size: 20px;
				background-color:#EEE;
			}
	</style>
		<div id="fb-root"></div>
	<script>
		$(document).on('ready', inicio_per);

		function inicio_per () {
			$('.btn-file-post-evi').on('click', function(e){
				debugger
				var file = $(e.currentTarget);
				var form = file.parents('.postear-post-evi');
				var id = form.data('idpost');

				var formData = new FormData(form[0]);
	        
				$('.loading').removeClass('isHidden');
				var xhr = $.ajax({
		            url: url + 'evidencias/mas/' + id,  //Server script to process data
		            type: 'POST',
		            success: function (argument) {
		            	window.location.reload();
		            },
		            error: function(xhr){debugger},
		            data: formData,
		            dataType: "json",
		            cache: false,
		            contentType: false,
		            processData: false
		        });

		        xhr.always(function() {
		        	$('.loading').addClass('isHidden');
		        });
			});
			$('.btn-voto-amor').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				var id = $(e.currentTarget).data('id');

				$.post(url + 'vote_amor', {id:id, tipo:tipo}).done(function(data) {
					var elem = $(e.currentTarget).find('.amor-votes');
					var prevotos = elem.text().replace('(', '').replace(')', '');

					var votos = parseInt(prevotos, 10);
					if(votos === NaN)
						votos = 0;

					if(data == 1)
						elem.text('(' + (votos + 1) + ')');
				});
			});

			$('.btn-apodo-publica').on('click', function(e) {
				var elem = $(e.currentTarget);
				var parent = elem.parents('.pnl-apodos-publicos');

				var id = parent.data('id');
				var apodo = parent.find('input').val();
				if(apodo.length == 0)
					return;

				$.post(url + 'apodo_publico', {id:id, apodo:apodo}).done(function(data) {
					parent.find('input').val('');
					if(data == 1)
						window.location.reload();
				});
			});

			$('.btn-nombre-publica').on('click', function(e) {
				var elem = $(e.currentTarget);
				var parent = elem.parents('.pnl-nombres-publicos');

				var id = parent.data('id');
				var nombre = parent.find('input').val();
				if(nombre.length == 0)
					return;

				$.post(url + 'nombre_publico', {id:id, nombre:nombre}).done(function(data) {
					parent.find('input').val('');
					if(data == 1)
						window.location.reload();
				});
			});

			$('.btn-mascara-publica').on('click', function(e) {
				var elem = $(e.currentTarget);
				var parent = elem.parents('.pnl-mascaras-publicas');

				var id = parent.data('id');
				var mascara = parent.find('input.tt-input').val();
				if(mascara.length == 0)
					return;

				$.post(url + 'mascara_publica', {id:id, mascara:mascara}).done(function(data) {
					parent.find('input').val('');
					if(data == 1)
						window.location.reload();
				});
			});

			$('.btn-red-publica').on('click', function(e) {
				var elem = $(e.currentTarget);
				var parent = elem.parents('.pnl-redes-publicas');

				var id = parent.data('id');
				var mascara = parent.find('input').val();
				if(mascara.length == 0)
					return;

				$.post(url + 'red_publica', {id:id, mascara:mascara}).done(function(data) {
					parent.find('input').val('');
					if(data == 1)
						window.location.reload();
				});
			});

			$('.btn-perfil-publico').on('click', function(e) {
				var elem = $(e.currentTarget);
				var parent = elem.parents('.pnl-perfiles-publicos');

				var id = parent.data('id');
				var idR = parent.find('input').val();
				if(parseInt(idR, 10) > 0) {
					$.post(url + 'perfil_publico', {id:id, idR:idR}).done(function(data) {
						parent.find('input').val('');
						if(data == 1)
							window.location.reload();
					});
				}
			});

			var opcion = null;
			$(document).foundation();

			$('.form-subcomentario').on('valid', function (e) {
				e.preventDefault();
				SaveSubcom(e);
			}).on('submit', function (e) {
				e.preventDefault();
			});

			function SaveSubcom(e) {
				debugger
				var elem = $(e.currentTarget);
				var parent = elem.parents('.subcomentarios-posts');
				var txaComentario = parent.find('textarea');
				var form = parent.find('.form-subcomentario');

				var id = parent.data('id');
				/*var texto = txaComentario.val();*/

				var formData = new FormData(form[0]);
	        
				$('.loading').removeClass('isHidden');
				var xhr = $.ajax({
		            url: url + 'subcomentario/' + id,  //Server script to process data
		            type: 'POST',
		            success: function (argument) {
		            	window.location.reload();
		            },
		            error: function(xhr){debugger},
		            data: formData,
		            dataType: "json",
		            cache: false,
		            contentType: false,
		            processData: false
		        });

		        xhr.always(function() {
		        	$('.loading').addClass('isHidden');
		        });
			}

			$('.subcomentarios-posts .btn-subcomentar').on('click', function(e) {
				debugger
				var elem = $(e.currentTarget);
				var parent = elem.parents('.subcomentarios-posts');
				var txaComentario = parent.find('textarea');
				var form = parent.find('.form-subcomentario');

				form.submit();

				

				/*$.post(url + 'subcomentario', {id:id, texto:texto}).done(function(data) {
					var comm = ' \
					<li> \
						<label>' + data.usuario + '</label> \
						<p>' + texto + '</p> \
						<span>' + data.created_at.date + '</span> \
					</li>';

		   			parent.find('.gv-subcomentarios').prepend(comm);
					txaComentario.val('');
				});*/
			});

			$('.confiable a').on('click', function(e){
				e.preventDefault();
				debugger
				var elem = $(e.currentTarget);
				var id = elem.parent('div.confiable').data('id');
				var tipo = elem.parent('div.confiable').data('tipo');
				var conf = elem.data('conf');

				$.post(url + 'confiable', {id:id, tipo:tipo, conf:conf}).done(function(data) {
					debugger
					if(data == 1) {				

						var icon = '<i class="icon-tacha"></i> [';
						if(conf == 1)
							icon = '<i class="icon-checkmark"></i> [';

						var texto = elem.text().substr(2);
						texto = texto.substr(0, texto.length - 1);
						texto = (parseInt(texto, 0) + 1) || 0;

						elem.html(icon + texto + ']');
					}
				});
			});

			function loadComentarios(gvComentarios, gvVotos, gvConfiable, id, tipo) {
				gvComentarios.html('');

				var urlMod = '';
				switch(tipo) {
					case 'media':
						urlMod = 'comentariomedia/';
						break;
					case 'subcom':
						urlMod = 'comentariosub/';
						break;
					default:
						urlMod = 'comentariofoto/';
						break;
				}

				$.get(url + urlMod + id).done(function(data) {
					var comm = '';
					var comentarios = data.comentarios;
					var votos = data.votos;
					var confiable = data.confiable;

					for (var i = 0; i < comentarios.length; i++) {
						comm += '	<div class="small-12 columns" data-id="' + comentarios[i].idComentarioFoto + '"> \
										<div class="comentario"> \
							   				<label style="font-size:18px">' + comentarios[i].usuario + '</label> \
								   			<p>' + comentarios[i].comentario + '</p> \
								   			<span>' + comentarios[i].created_at + '</span> \
							   			</div> \
							   		</div>';
					}
					gvComentarios.html(comm);

					for (var key in votos) {
						var voto = parseInt(votos[key], 0) || 0;
						gvVotos.find('[data-tipo="' + key + '"] .num_rank').text(voto);
					}
					debugger
					if(confiable) {
						var siconf = parseInt(confiable.siconf, 0) || 0;
						var noconf = parseInt(confiable.noconf, 0) || 0;
						gvConfiable.find('[data-conf="1"]').html('<i class="icon-checkmark"></i> [' + siconf + ']');
						gvConfiable.find('[data-conf="0"]').html('<i class="icon-tacha"></i> [' + noconf + ']');
					}
				});
			}

			$(".fotos-modal .orbit, .evidencia-modal .orbit").on("before-slide-change.fndtn.orbit", function(e) {
				var orbit = $(e.currentTarget);

				var id = orbit.find('li.active img').data('id');
				var parent = orbit.parents('.fotos-modal');
				var gvComentarios = parent.find('.gv-comentarios');

				parent.find('.foto-comment .btn-comentar').data('id', id);
				gvComentarios.html('');
			});

			$(".fotos-modal .orbit, .evidencia-modal .orbit").on("after-slide-change.fndtn.orbit", function(e, orbit) {
				var orbit = $(e.currentTarget);

				var id = orbit.find('li.active img').data('id');
				var parent = orbit.parents('.fotos-modal');
				var tipo = orbit.data('tipo');
				var gvVotos = parent.find('.votosPost');
				var gvConfiable = parent.find('.confiable');
				var gvComentarios = parent.find('.gv-comentarios');

				//parent.find('.foto-comment .btn-comentar').data('id', id);
				parent.find('.btn-comentar').data('id', id);
				parent.find('.btn-comentar').data('tipo', tipo);

				parent.find('.confiable').data('id', id);
				loadComentarios(gvComentarios, gvVotos, gvConfiable, id, tipo);
			});

			$('.foto-post-gallery').on('click', function(e){
				debugger
				var id = $(e.currentTarget).data('id');
			});

			$('.foto-evidencia').on('click', function(e){
				var parent = $('#' + $(e.currentTarget).data('revealId'));
				/*var tipo = parent.find('.orbit').data('tipo');

				var id = $(e.currentTarget).data('id');
				parent.find('.btn-comentar').data('id', id);
				parent.find('.btn-comentar').data('tipo', tipo);

				var orbitLink = parent.find('.orbit-link [data-orbit-link="fotoEvi-' + id + '"]');
				orbitLink.click();*/


				var orbit = parent.find('.orbit');

				var id = orbit.find('li.active img').data('id');
				var parent = orbit.parents('.fotos-modal');
				var tipo = orbit.data('tipo');
				var gvVotos = parent.find('.votosPost');
				var gvConfiable = parent.find('.confiable');
				var gvComentarios = parent.find('.gv-comentarios');

				parent.find('.btn-comentar').data('id', id);
				parent.find('.btn-comentar').data('tipo', tipo);
				parent.find('.confiable').data('id', id);

				loadComentarios(gvComentarios, gvVotos, gvConfiable, id, tipo);
			});

			$('.foto-subcom').on('click', function(e){
				var parent = $('#' + $(e.currentTarget).data('revealId'));
				/*var tipo = parent.find('.orbit').data('tipo');

				var id = $(e.currentTarget).data('id');
				parent.find('.btn-comentar').data('id', id);
				parent.find('.btn-comentar').data('tipo', tipo);

				var orbitLink = parent.find('.orbit-link [data-orbit-link="fotoSubcom-' + id + '"]');
				orbitLink.click();*/

				var orbit = parent.find('.orbit');

				var id = orbit.find('li.active img').data('id');
				var parent = orbit.parents('.fotos-modal');
				var tipo = orbit.data('tipo');
				var gvVotos = parent.find('.votosPost');
				var gvConfiable = parent.find('.confiable');
				var gvComentarios = parent.find('.gv-comentarios');

				parent.find('.btn-comentar').data('id', id);
				parent.find('.btn-comentar').data('tipo', tipo);
				parent.find('.confiable').data('id', id);

				loadComentarios(gvComentarios, gvVotos, gvConfiable, id, tipo);

				var id = $(e.currentTarget).data('id');
				var orbitLink = parent.find('.orbit-link [data-orbit-link="fotoSubcom-' + id + '"]');
				orbitLink.click();
			});

			$('.foto-post').on('click', function(e){
				debugger
				var parent = $('#' + $(e.currentTarget).data('revealId'));

				var prev = $(e.currentTarget).parent('div').prev();
				//if(prev.length == 0) {
					var orbit = parent.find('.orbit');

					var id = orbit.find('li.active img').data('id');
					var parent = orbit.parents('.fotos-modal');
					var tipo = orbit.data('tipo');
					var gvVotos = parent.find('.votosPost');
					var gvConfiable = parent.find('.confiable');
					var gvComentarios = parent.find('.gv-comentarios');

					parent.find('.btn-comentar').data('id', id);
					parent.find('.btn-comentar').data('tipo', tipo);
					parent.find('.confiable').data('id', id);

					loadComentarios(gvComentarios, gvVotos, gvConfiable, id, tipo);

					var idFoto = $(e.currentTarget).data('id');
					var idPost = $(e.currentTarget).data('idpost');
					var orbitLink = $('.orbit-link [data-orbit-link="foto-' + idPost + '-' + idFoto + '"]');
					orbitLink.click();
				/*}
				else {
					var id = $(e.currentTarget).data('id');
					var tipo = parent.find('.orbit').data('tipo');

					parent.find('.btn-comentar').data('id', id);
					parent.find('.btn-comentar').data('tipo', tipo);
					
					var idFoto = $(e.currentTarget).data('id');
					var idPost = $(e.currentTarget).data('idpost');
					

					var orbitLink = $('.orbit-link [data-orbit-link="foto-' + idPost + '-' + idFoto + '"]');
					orbitLink.click();
				}		*/	
			});

			$('.foto-comment .btn-comentar').on('click', function(e) {
				debugger
				var elem = $(e.currentTarget),
					txaComentario = elem.parents('.foto-comment').find('textarea'),
					texto = txaComentario.val();

				if(texto.length == 0) {
					txaComentario.focus();
					return;
				}

				var mod = elem.data('mod');
				var id = elem.data('id');
				$.post(url + 'comentariofoto/' + id + '/' + mod, {texto:texto}).done(function(data) {
					debugger
					var comm = ' \
					<div class="small-12 columns"> \
						<div class="comentario"> \
			   				<label style="font-size:18px">' + data.usuario + '</label> \
				   			<p>' + texto + '</p> \
				   			<span>' + data.created_at.date + '</span> \
			   			</div> \
			   		</div>';

		   			elem.parents('.reveal-modal').find('.gv-comentarios').prepend(comm);
					txaComentario.val('');
				});
			});

			$('.comm-post').on('click', function(e) {
				var id = $(e.currentTarget).data('id');
				var tipo = $(e.currentTarget).data('tipo');
				debugger
				$('.post-comment .btn-comentar').data('id', id);
				$('.post-comment .btn-comentar').data('tipo', tipo);
				$('.gv-comentarios-post').html('');

				$.get(url + 'comentariopost/' + id + '/' + tipo).done(function(data) {
					debugger;
					var comm = '';
					for (var i = 0; i < data.length; i++) {
						comm += '	<div class="small-12 columns" data-id="' + data[i].idComentarioPost + '"> \
										<div class="comentario"> \
							   				<label style="font-size:18px">' + data[i].usuario + '</label> \
								   			<p>' + data[i].comentario + '</p> \
								   			<span>' + data[i].created_at + '</span> \
							   			</div> \
							   		</div>';
					}
					$('.gv-comentarios-post').html(comm);
				});
			})

			$('.post-comment .btn-comentar').on('click', function(e) {
				var elem = $(e.currentTarget),
					txaComentario = elem.parents('.post-comment').find('textarea'),
					texto = txaComentario.val();

				if(texto.length == 0) {
					txaComentario.focus();
					return;
				}

				var idPost = elem.data('id');
				var tipo = elem.data('tipo');
				$.post(url + 'comentariopost/' + idPost + '/' + tipo, {texto:texto}).done(function(data) {
					debugger
					var comm = ' \
					<div class="small-12 columns"> \
						<div class="comentario"> \
			   				<label style="font-size:18px">' + data.usuario + '</label> \
				   			<p>' + texto + '</p> \
				   			<span>' + data.created_at.date + '</span> \
			   			</div> \
			   		</div>';

		   			$('.gv-comentarios-post').prepend(comm);
					txaComentario.val('');
				});
			});

			$('.vote-perfil').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				
				add(e, 'perfil', tipo);
			});

			$('.vote-foto-post').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				var parent = $(e.currentTarget).parents('.fotos-modal');
				var elem = parent.find('li.active img');
				$(e.currentTarget).data('id', elem.data('id'));
				
				add(e, 'fotos', tipo);
			});

			$('.vote-rank-subfoto').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				var parent = $(e.currentTarget).parents('.fotos-modal');
				var elem = parent.find('li.active img');
				$(e.currentTarget).data('id', elem.data('id'));
				
				add(e, 'subfoto', tipo);
			});

			$('.vote-rank-subvideo').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				var parent = $(e.currentTarget).parents('.fotos-modal');
				var elem = parent.find('li.active img');
				$(e.currentTarget).data('id', elem.data('id'));
				
				add(e, 'subfoto', tipo);
			});

			$('.vote-rank-post').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				var ptipo = $(e.currentTarget).parents('.votos-container').data('tipo');
				add(e, 'post', tipo, ptipo);
			});

			$('.vote-rank-subpost-video').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				var ptipo = $(e.currentTarget).parents('.votos-container').data('tipo');
				add(e, 'subpost', tipo, ptipo);
			});

			$('.vote-rank-media').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');
				var ptipo = $(e.currentTarget).parents('.votos-container').data('tipo');

				var parent = $(e.currentTarget).parents('.fotos-modal');
				var elem = parent.find('li.active img');
				$(e.currentTarget).data('id', elem.data('id'));
				add(e, 'media', tipo, ptipo);
			});

			$('.vote-post').on('click', function(e) {
				e.preventDefault();
				var tipo = $(e.currentTarget).data('tipo');	
				var ptipo = $(e.currentTarget).parents('.votos-container').data('tipo');		
				add(e, 'rank', tipo, ptipo);
			});

			function add(e, mod, tipo, ptipo) {
				e.preventDefault();
				var elem = $(e.currentTarget);
				var id = elem.data('id');
				$.post(url + 'vote/' + mod + '/' + tipo + '/' + id + '/' + ptipo).done(function(data) {
					debugger
					var rank = elem.find('.num_rank');
					var votos = parseInt(rank.text(), 10);
					var suma = parseInt(data, 10);

					rank.text(votos + (suma == 0 ? 0 : 1));
				});
			}

			$('.postearEv').on('valid', function (e) {
				e.preventDefault();
				SavePost();
			}).on('submit', function (e) {
				e.preventDefault();
			});

			function SavePost() {
				var idPerfil = window.location.href.split('/').pop();

				var formData = new FormData($('.postearEv')[0]);
		        //formData.append("fdata", JSON.stringify({opcion:opcion}));
	        
		        $('.loading').removeClass('isHidden');
				var xhr = $.ajax({
		            url: url + 'post/' + idPerfil + '/' + opcion,  //Server script to process data
		            type: 'POST',
		            success: function (argument) {
		            	window.location.reload();
		            },
		            error: function(xhr){debugger},
		            data: formData,
		            dataType: "json",
		            cache: false,
		            contentType: false,
		            processData: false
		        });

		        xhr.always(function() {
		        	$('.loading').addClass('isHidden');
		        });
			}
			var jsonMa = {
				elem: $('input.typeahead[name="mascara"]'),
				dKey: 'nombre',
				modulo: 'mascaras',
			};
			typeahead(jsonMa);
			

			$('.btn-postear').on('click', function (e) {
				$('.postearEv').submit();			
			})
	            //MOSTRAR CAMPOS DE LLENADO DE SECRET BOX, CONFESION,LAS EVIDENCIAS Y CALIFICACION
			$('#lapiz').on('click',function(e){
				//e.preventDefault();
				$('.postearEv').removeClass("Hidden");
				$('#conCampo').removeClass("Hidden");
				$('#botCampo').removeClass("Hidden");
				$('#eviCampo').addClass("Hidden");
				$('#videoCampo').addClass("Hidden");
				$('#linkCampo').addClass("Hidden");

				opcion = 1;
			});
			$('#fotosP').on('click',function(){
				$('.postearEv').removeClass("Hidden");
				$('#eviCampo').removeClass("Hidden");
				$('#conCampo' ).addClass("Hidden");
				$('#videoCampo').addClass("Hidden");
				$('#botCampo').removeClass("Hidden");
				$('#linkCampo').addClass("Hidden");
				opcion = 2;
			});
			$('#secre').on('click',function(){
				$('.postearEv').removeClass("Hidden");
				$('#videoCampo').removeClass("Hidden");
				$('#conCampo' ).addClass("Hidden");
				$('#eviCampo').addClass("Hidden");
				$('#botCampo').removeClass("Hidden");
				$('#linkCampo').addClass("Hidden");
				opcion = 3;
			});
			$('#linkear').on('click',function(){
				$('.postearEv').removeClass("Hidden");
				$('#videoCampo').addClass("Hidden");
				$('#conCampo' ).addClass("Hidden");
				$('#eviCampo').addClass("Hidden");
				$('#linkCampo').removeClass("Hidden");
				$('#botCampo').removeClass("Hidden");
				opcion = 4;
			});
			// ABRIR FORMULARIO DE CONFESION FOTOS VIDEO SECUNDARIO
			$('.confSec').on('click',function(e){
				//e.preventDefault();
				
				$('.conSec').removeClass("Hidden");
				$('.btnSec').removeClass("Hidden");
				$('.viSec').addClass("Hidden");
				$('.fotSec').addClass("Hidden");
				$('.linkerSec').addClass("Hidden");
				opcion = 1;
			});
			$('.fotoSec').on('click',function(){
			
				$('.fotSec').removeClass("Hidden");
				$('.btnSec').removeClass("Hidden");
				$('.conSec').addClass("Hidden");
				$('.viSec').addClass("Hidden");
				$('.linkerSec').addClass("Hidden");
				opcion = 2;
			});
			$('.vidSec').on('click',function(){
				
				$('.viSec').removeClass("Hidden");
				$('.conSec' ).addClass("Hidden");
				$('.fotSec').addClass("Hidden");
				$('.linkerSec').addClass("Hidden");
				$('.btnSec').removeClass("Hidden");
				opcion = 3;
			});
			$('.linkSec').on('click',function(){
				
				$('.linkerSec').removeClass("Hidden");
				$('.conSec' ).addClass("Hidden");
				$('.fotSec').addClass("Hidden");
				$('.btnSec').removeClass("Hidden");
				$('.viSec').addClass("Hidden");
				opcion = 4;
			});

			$('#mostrarMasca').on('click',function(){
				$("#masca").toggleClass('Hidden');
				$('#social').addClass("Hidden");
				$('#rela').addClass("Hidden");
				$("#apodosAdd").addClass('Hidden');
				$('#nombresAdd').addClass("Hidden");
				$('#fotosAdd').addClass("Hidden");

					
			
			});
			$('#mostrarSocial').on('click',function(){
				$("#social").toggleClass('Hidden');
				$('#masca').addClass("Hidden");
				$('#rela').addClass("Hidden");
				$("#apodosAdd").addClass('Hidden');
				$('#nombresAdd').addClass("Hidden");
				$('#fotosAdd').addClass("Hidden");

					
			
			});
			$('#mostrarRela').on('click',function(){
				$("#rela").toggleClass('Hidden');
				$('#masca').addClass("Hidden");
				$('#social').addClass("Hidden");
				$("#apodosAdd").addClass('Hidden');
				$('#nombresAdd').addClass("Hidden");	
				$('#fotosAdd').addClass("Hidden");

			
			});
			$('#mostrarApodos').on('click',function(){
				$("#apodosAdd").toggleClass('Hidden');
				$('#nombresAdd').toggleClass("Hidden");
				$('#social').addClass("Hidden");	
				$("#rela").addClass('Hidden');
				$('#masca').addClass("Hidden");
				$('#fotosAdd').addClass("Hidden");
			
			});
			$('#mostrarFotos').on('click',function(){
				$("#fotosAdd").toggleClass('Hidden');
				$("#apodosAdd").addClass('Hidden');
				$('#nombresAdd').addClass("Hidden");
				$('#social').addClass("Hidden");	
				$("#rela").addClass('Hidden');
				$('#masca').addClass("Hidden");
			
			});
			$('#fotosAddPost').on('click',function(){
				$("#campoFotosPost").toggleClass('Hidden');
				
			});
			$('.votos_mostrar').on('click', function(e) {
				debugger
				$(this).siblings('.votosPost').toggleClass("Hidden");
			});

			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		}

	</script>

	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


@stop
