<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $user = App\User::create([
        	'name' => 'afaf',
        	'email' => 'afaf@gmail.com',
        	'password' => bcrypt('agc555553'),
        	'admin' => 1
        ]);

       App\Profile::create([
        'user_id' => $user->id,
        'youtuob' => 'https://laravel.com/docs/5.7/queues#synchronous-dispatching',
        'facebook'=> 'https://laravel.com/docs/5.7/queues#synchronous-dispatching',
        'about'   => 'laravel.com/docs/5.7/queues#synchronous-dispatching'
       ]);


       $category = App\category::create([
            'name' => 'category seeder',
        ]);

        App\Post::create([
            'title' => 'first post',
            'slug'  => 'slug',
            'user_id' => $user->id,
            'content'   => 'content',
            'category_id'=> $category->id,
            'image' => 'uploads/image/heart_53876-25531.jpg'
        ]);

    }
}
