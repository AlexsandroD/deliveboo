<?php

use Illuminate\Database\Seeder;



class CategoryRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 30; $i++){

            $restaurant = App\Restaurant::find($i);

            switch ($i) {
                case 1:
                case 2:
                    $restaurant->categories()->attach(1);
                    break;
                case 3:
                case 4:
                    $restaurant->categories()->attach(2);
                    break;
                case 5:
                case 6:
                    $restaurant->categories()->attach(3);
                    break;
                case 7:
                case 8:
                    $restaurant->categories()->attach(4);
                    break;
                case 9:
                case 10:
                    $restaurant->categories()->attach(5);
                    break;
                case 11:
                case 12:
                    $restaurant->categories()->attach(6);
                    break;
                case 13:
                case 14:
                    $restaurant->categories()->attach(7);
                    break;
                case 15:
                case 16:
                    $restaurant->categories()->attach(8);
                    break;
                case 17:
                case 18:
                    $restaurant->categories()->attach(9);
                    break;
                case 19:
                case 20:
                    $restaurant->categories()->attach(10);
                    break;
                case 21:
                case 22:
                    $restaurant->categories()->attach(11);
                    break;
                case 23:
                case 24:
                    $restaurant->categories()->attach(12);
                    break;
                case 25:
                case 26:
                    $restaurant->categories()->attach(13);
                    break;
                case 27:
                case 28:
                    $restaurant->categories()->attach(14);
                    break;
                case 29:
                case 30:
                    $restaurant->categories()->attach(15);
            }
        }
    }
}
