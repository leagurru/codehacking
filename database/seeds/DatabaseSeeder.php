<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // no chequea
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // truncado
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();
        DB::table('photos')->truncate();
        DB::table('comments')->truncate();
        DB::table('comment_replies')->truncate();

        // relación user y posts
        factory(App\User::class, 10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });

        $this->call(RolesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        factory(App\Photo::class, 1)->create();

        // relación comment con commentreply
        factory(App\Comment::class, 10)->create()->each(function($c){
            $c->replies()->save(factory(App\CommentReply::class)->make());
        });


    }
}
