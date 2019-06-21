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
		DB::table('people')->insert([
			[
				'first_name' => 'Adrienne',
				'last_name'	 => 'Rangel',
				'avatar'     => 'user.png',
				'created_at' => now('America/Caracas')
			],
			[
				'first_name' => 'Katherin',
				'last_name'	 => 'Gamez',
				'avatar'     => 'kathe.jpg',
				'created_at' => now('America/Caracas')
			],
			[
				'first_name' => 'jhonny jose',
				'last_name'	 => 'perez martinez',
				'avatar'     => 'user.png',
				'created_at' => now('America/Caracas')
			],
			[
				'first_name' => 'Kamila',
				'last_name'	 => 'Zerpa',
				'avatar'     => 'user.png',
				'created_at' => now('America/Caracas')
			]
		]);

		DB::table('users')->insert([
			[
				'email' 	 => 'adrienne@rangel.com',
				'password'   => bcrypt('rangel123'),
				'type'		 => 'teacher',
				'people_id'	 => 1,
				'created_at' => now('America/Caracas')
			],
			[
				'email' 	 => 'kathe@gamez.com',
				'password'   => bcrypt('kathe123'),
				'type'		 => 'student',
				'people_id'	 => 2,
				'created_at' => now('America/Caracas')
			],
			[
				'email' 	 => 'admin@admin.com',
				'password'   => bcrypt('admin'),
				'type'		 => 'teacher',
				'people_id'	 => 3,
				'created_at' => now('America/Caracas')
			],
			[
				'email' 	 => 'kamila@zerpa.com',
				'password'   => bcrypt('kamila123'),
				'type'		 => 'student',
				'people_id'	 => 4,
				'created_at' => now('America/Caracas')
			]
		]);

		DB::table('topics')->insert([
			['topic' => 'tema_uno', 'image' => 'image2.jpg', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, consequuntur officiis nobis ex nihil impedit.', 'created_at' => now('America/Caracas')],
			['topic' => 'Cables', 'image' => 'image3.jpg', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit.', 'created_at' => now('America/Caracas')],
		]);

		DB::table('sections')->insert([
			[
			'section'	=> 'K1'
			],
			[
			'section'	=> 'K2'
			],
			[
			'section'	=> 'K3'
			],
			[
			'section'	=> 'K4'
			],
			[
			'section'	=> 'K5'
			],
		]);

		DB::table('contents')->insert([
			[
				'name'		 => 'Cable Par trenzado cat 5e',
				'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis iure, distinctio necessitatibus, perferendis deserunt quasi explicabo dolorem suscipit laborum dicta voluptas inventore quis sit voluptatem aut voluptatum delectus, sequi repellat.',
				'file'       => 'image3.jpg',
				'topic_id'	 => 2,
				'people_id'  => 1,
				'created_at' => now('America/Caracas'),
				'section_id' =>	rand(1,5)
			],
			[
				'name'		 => 'Topologia de red x',
				'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque officiis vel placeat sed excepturi rem, quidem ad, consequatur aliquam veritatis aliquid voluptates inventore quo, odio sint debitis molestiae impedit blanditiis.',
				'file'       => 'image.jpg',
				'topic_id'	 => 1,
				'people_id'  => 1,
				'created_at' => now('America/Caracas'),
				'section_id' =>	rand(1,5)
			],
			[
				'name'		 => 'MEdio de transmision radial',
				'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque officiis vel placeat sed excepturi rem, quidem ad, consequatur aliquam veritatis aliquid voluptates inventore quo, odio sint debitis molestiae impedit blanditiis.',
				'file'       => 'image2.jpg',
				'topic_id'	 => 1,
				'people_id'  => 1,
				'created_at' => now('America/Caracas'),
				'section_id' =>	rand(1,5)
			]
		]);

		// DB::table('comments')->insert([
		// 	'comment'    => 'HOla esto es un comentario bla a sdasd',
		// 	'people_id'  => 1,
		// 	'content_id' => 2,
		// 	'created_at' => now('America/Caracas')
		// ]);


		// DB::table('tests')->insert([
		// 	'link' 	     => 'http://forms.enlaceaprueba.com',
		// 	'topic_id'   => 1,
		// 	'created_at' => now('America/Caracas')
		// ]);

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
