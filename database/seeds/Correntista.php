<?php

use Illuminate\Database\Seeder;

class Correntista extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        /*
        DB::table('users')->insert([
            'nome' => Str::random(10),
            'senha' => Hash::make('220132'),
            ''
        ]);*/
        /*
        factory(App\Correntista::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\ContaCorrente::class)->make());
        });*/
    }
}
