<?php

//"caffeinated/shinobi": "^3.2",


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// $this->call(ProductsTableSeeder::class);

		// factory(App\People::class, 2)->create();
		// factory(App\Category::class, 5)->create();
		// factory(App\Product::class, 9)->create();
		// factory(App\User::class, 1)->create();


		DB::table('people')->insert([
			[
				'pin' => '258888888',
				'first_name' => 'Pepito',
				'last_name'	 => 'Fuentes',
				'phone'		 => '04244444444',
				'avatar'     => 'user.png',
				'created_at' => now('America/Caracas')
			],
			[
				'pin' => '140000000',
				'first_name' => 'Jose Fernando',
				'last_name'	 => 'Lopez',
				'phone'		 => '04140001010',
				'avatar'     => 'user.png',
				'created_at' => now('America/Caracas')
			],
		]);

		DB::table('users')->insert([
			[
				'email' 	 => 'pepito@fuentes.com',
				'password'   => bcrypt('pepito123'),
				'type'		 => 'Profesor',
				'people_id'	 => 1,
				'created_at' => now('America/Caracas')
			],
			[
				'email' 	 => 'jose@lopez.com',
				'password'   => bcrypt('jose123'),
				'type'		 => 'Estudiante',
				'people_id'	 => 2,
				'created_at' => now('America/Caracas')
			]
		]);

		DB::table('topics')->insert([
			['topic' => 'Evaluaciones', 'created_at' => now('America/Caracas')],
			['topic' => 'Tema Uno', 'created_at'     => now('America/Caracas')]
		]);

		DB::table('posts')->insert([
			[
				'post' 	     => 'HOla esto es un post',
				'file'       => 'file.pdf',
				'topic_id'	 => 1,
				'people_id'  => 1,
				'created_at' => now('America/Caracas')
			],
			[
				'post' 	     => 'Probando el post desde los seeders',
				'file'       => '',
				'topic_id'	 => 2,
				'people_id'  => 1,
				'created_at' => now('America/Caracas')
			]
		]);

		DB::table('comments')->insert([
			'comment'    => 'HOla esto es un comentario bla a sdasd',
			'people_id'  => 2,
			'post_id'    => 1,
			'created_at' => now('America/Caracas')
		]);


		DB::table('tests')->insert([
			'link' 	     => 'http://forms.enlaceaprueba.com',
			'topic_id'   => 1,
			'created_at' => now('America/Caracas')
		]);

		// DB::table('notes')->insert([
		// 	'note' 	     => '80',
		// 	'test_id'    => 1,
		// 	'user_id' 	 => 2,
		// 	'created_at' => now('America/Caracas')
		// ]);

		// DB::table('certificates')->insert([
		// 	'note_id' => 1,
		// 	'created_at' => now('America/Caracas')
		// ]);
	}
}
