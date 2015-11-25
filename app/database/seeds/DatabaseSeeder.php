<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();

		$this->call('PaisesTableSeeder');
		$this->command->info('Paises table seeded!');

		$this->call('UbicacionesTableSeeder');
		$this->command->info('Ubicaciones table seeded!');

		$this->call('EstadoTableSeeder');
		$this->command->info('Estados table seeded!');

		$this->call('AliasTableSeeder');
		$this->command->info('Alias table seeded!');

		$this->call('PerfilesTableSeeder');
		$this->command->info('Perfiles table seeded!');

		$this->call('RanksTableSeeder');
		$this->command->info('Ranks table seeded!');

		$this->call('ComentariosTableSeeder');
		$this->command->info('Comentarios table seeded!');

		$this->call('MascarasTableSeeder');
		$this->command->info('Mascaras table seeded!');

		$this->call('MascarasPerfilesTableSeeder');
		$this->command->info('MascarasPerfiles table seeded!');

		$this->call('MediasTableSeeder');
		$this->command->info('Medias table seeded!');
	}
}

class PaisesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('paises')->delete();
		Pais::create(array('nombre' => 'Mexico'));
	}
}

class UbicacionesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('ubicaciones')->delete();
		Ubicacion::create(array('nombre' => 'Mexico', 'idPais' => 1, 'bandera' => 'bandera mexico'));
	}
}

class EstadoTableSeeder extends Seeder {
	public function run()
	{
		DB::table('estados')->delete();
		Estado::create(array('nombre' => 'Durango'));
	}
}

class AliasTableSeeder extends Seeder {
	public function run()
	{
		DB::table('alias')->delete();
		Alia::create(array('nombre' => 'Jax Destructor de Mundos', 'password' => '123', 'pais' => 'Mexico', 'estado' => 'DF', 'correo' => 'jaxddm@gmail.com'));
		Alia::create(array('nombre' => 'ok', 'password' => 'ok', 'pais' => 'Mexico', 'estado' => 'DF', 'correo' => 'ok'));
	}
}

class PerfilesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('perfiles')->delete();
		Perfil::create(array('nombre' => 'Jaxo', 'idAlias' => 1, 'pais' => 'Mexico', 'estado' => 'DF', 'mascaras' => 'ratero', 'confesion' => 'Me bannearon en el LOL por decir la verdad...', 'foto' => 'jaxo.jpg', 'facebook' => 'https://facebook.com/eljaxo', 'twitter' => 'https://twitter.com/eljaxo', 'instagram' => 'https://instagram.com/eljaxo', 'secret' => 'El jaxo paxo', 'secret_pub' => 'El jaxo'));
	}
}

class RanksTableSeeder extends Seeder {
	public function run()
	{
		DB::table('ranks')->delete();
		Rank::create(array('caca' => 1, 'corazon' => 0, 'idPerfil' => 1, 'idAlias' => 1));
		Rank::create(array('caca' => 0, 'corazon' => 1, 'idPerfil' => 1, 'idAlias' => 1));
	}
}

class ComentariosTableSeeder extends Seeder {
	public function run()
	{
		DB::table('comentarios')->delete();
		Comentario::create(array('comentario' => 'Te lo tenias merecido...', 'idPerfil' => 1, 'idAlias' => 1));
	}
}

class MascarasTableSeeder extends Seeder {
	public function run()
	{
		DB::table('mascaras')->delete();
		Mascara::create(array('nombre' => 'Ratero'));
		Mascara::create(array('nombre' => 'Corrupto'));
		Mascara::create(array('nombre' => 'Infiel'));
		Mascara::create(array('nombre' => 'Filantropo'));
	}
}

class MascarasPerfilesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('mascaras_perfiles')->delete();
		MascaraPerfil::create(array('idMascara' => 1, 'idPerfil' => 1));
	}
}

class MediasTableSeeder extends Seeder {
	public function run()
	{
		DB::table('Medias')->delete();
		Media::create(array('link' => '5_OA7D0JGS4', 'idPerfil' => 1, 'tipo' => 1));
	}
}