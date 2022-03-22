<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $names = ['Giovanni','Marco','Giorgio','Roberto', 'Anais','Samuele','Lorenzo','Claudio','Jimmy','Anna','Alex','Leonardo','Gianluca','Daniele','Nicholas','Cristina'];

        $surnames = ['Argentiero','Cusenza','Monne','Di Ambrosio', 'Di Genoa','Madrigali','Torelli', 'Di Caprio','Hu','Bigatti','De Rosa', 'Selmini','Benassi','Di Elauterio','Romiti','Galfo'];

        $password = Hash::make('test1234!');



        for($i = 0; $i < 30; $i++){

            $newUser = new User;

            if ($i < (count($names) - 1)) {
                $newUser->name = $names[$i];
                $newUser->surname = $surnames[$i];
                $newUser->email = str_replace(' ', '',strtolower(($names[$i].$surnames[$i].'@gmail.com'))) ;
            } else {
                $newUser->name = $faker->word();
                $newUser->surname = $faker->word();
                $newUser->email = str_replace(' ', '',strtolower(($newUser->name.$newUser->surname.'@gmail.com'))) ;
            }
            
            $newUser->password = $password;
            $newUser->vat =strval(rand(10000, 99999).rand(100000, 999999));
            $newUser->save();
        };

    }
}
