<?php
use \Illuminate\Database\Seeder;
class TagTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Tag::class, 6)->create();
        $jeux = \App\Models\Jeu::all();
        foreach ($jeux as $jeu){
            $jeu->tags()->attach(rand(1,6));
        }
    }
}
