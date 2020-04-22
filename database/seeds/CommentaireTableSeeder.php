<?php

use Illuminate\Database\Seeder;

class CommentaireTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Commentaire::class, 20)->create();
    }
}
