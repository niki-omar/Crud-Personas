<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\UserFactory;
use App\Models\Persona;
class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $users -> each (function($user){
            \App\Models\Persona::factory() -> count(5) ->create([
                'telefonos' => $user -> id
            ]);
        });
        // factory(App\Models\Article::class, 30)->create();   before
        // \App\Models\Article::factory()->count(30)->create();   later
        // \App\Models\User::factory() -> count(10) -> create ();


    }
}
