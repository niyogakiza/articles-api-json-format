<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Article::class, 5)
           ->create()
           ->each(function ($u) {
               $u->comments()->save(factory(App\Comment::class)->create());
           });
       factory(App\People::class, 2)->create();

       factory(App\Article::class, 3)->create();
    }
}
