<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = [

            [
                'name' => 'Mr Kebab Turco',
                'description' => 'Ordina il tuo piatto preferito a casa tua da MR. Kebab Turco Istanbul grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Gandhi',
                'description' => 'Ordina il tuo piatto indiano preferito a casa tua da Gandhi 2 grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Il Caffè Dietro L\'Angolo',
                'description' => 'Ordina il tuo dolce preferito a casa tua da Il Caffè Dietro L\'Angolo grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Breakfast Rome',
                'description' => 'Ordina la tua colazione preferita a casa tua da Breakfast Rome grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Mammò - Street Food',
                'description' => 'Ordina il tuo panino preferito a casa tua da Mammò in Piazza Trilussa grazie alla consegna a domicilio di Deliveroo Roma.',
            ],
            [
                'name' => 'Flower Burger',
                'description' => 'Ordina il tuo hamburger preferito a casa tua da Flower burger in Turati grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Burrito\'s Way',
                'description' => 'Ordina il tuo piatto preferito a casa tua da Burritos Way grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'The Mexican',
                'description' => 'Ordina il tuo piatto preferito a casa tua da The Mexican grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Gelateria La Romana',
                'description' => 'Ordina il tuo gelato preferito a casa tua da Gelateria la Romana grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Dolci Desideri',
                'description' => 'Ordina il tuo piatto preferito a casa tua da Dolci Desideri grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'New Delhi - Roma',
                'description' => 'Ordina il tuo piatto preferito della cucina indiana a casa tua da New Delhi grazie alla consegna a domicilio di Deliveroo Roma.',
            ],
            [
                'name' => 'Alì Babà Indian Food',
                'description' => 'Ordina il tuo piatto preferito a casa tua da Alì Babà Indian Food grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Elleniko',
                'description' => 'Ordina il tuo piatto greco preferito a casa tua da Elleniko grazie alla consegna a domicilio di Deliveroo Roma.',
            ],
            [
                'name' => 'Sparta',
                'description' => 'Ordina il tuo piatto preferito della cucina greca a casa tua da Sparta grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Cody Pokè Sushi',
                'description' => '-',
            ],
            [
                'name' => 'Sushi Sensei',
                'description' => 'Ordina il tuo piatto preferito a casa tua da Sushi Sensei grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Piccola Hong Kong',
                'description' => 'Ordina il tuo piatto preferito della cucina cinese a casa tua da Piccola Hong Kong grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Dim Sum Fine Asian Cusine',
                'description' => 'Ordina il tuo piatto della cucina cinese preferito a casa tua da Dim Sum Fine Asian Cucine grazie alla consegna a domicilio di Deliveroo Roma.',
            ],
            [
                'name' => 'Mandaloun - Lebanese Food',
                'description' => 'Ordina il tuo piatto preferito della cucina libanese a casa tua da Mandaloun in Via Veneto grazie alla consegna a domicilio di Deliveroo Roma.',
            ],
            [
                'name' => 'Il Libanese',
                'description' => 'Ordina il tuo piatto preferito a casa tua dal libanese con Deliveroo.',
            ],
            [
                'name' => 'KFC',
                'description' => 'L\'irresistibile pollo fritto del Colonnello finalmente anche a casa tua, o dove vuoi tu!',
            ],
            [
                'name' => 'Hard Rock Cafe Roma',
                'description' => 'Ordina il tuo hamburger preferito a casa tua da Hard Rock Cafe Roma grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'All\'Antico Vinaio',
                'description' => 'Ordina la tua schiacciata preferita dall\'Antico Vinaio grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Panino Giusto',
                'description' => 'Ordina il tuo panino preferito a casa tua da Panino Giusto e grazie alla consegna a domicilio di Deliveroo Roma.',
            ],
            [
                'name' => 'Kung Fu Restaurant',
                'description' => 'Ordina il tuo piatto preferito a casa tua da Kung Fu Restaurant con Deliveroo.',
            ],
            [
                'name' => 'Odoroki',
                'description' => 'Ordina il tuo piatto preferito della cucina thailandese a casa tua grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Sushiko',
                'description' => 'Ordina il tuo piatto preferito a casa tua da Sushiko grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Sushi Snob',
                'description' => 'Ordina il tuo sushi preferito a casa tua da Sushi Snob Parioli grazie alla consegna a domicilio di Deliveroo.',
            ],
            [
                'name' => 'Voglia Di Pizza',
                'description' => 'Ordina i tuoi piatti preferiti anche con opzioni senza glutine, puoi trovare pizza, pasta, dolci e antipasti fatti in casa e Gluten Free',
            ],
            [
                'name' => 'PizzaRè',
                'description' => 'Ordina la tua pizza preferita a casa tua da PizzaRè grazie alla consegna a domicilio di Deliveroo.',
            ],


        ];

        // questa variabile lista tutti i caratteri unwanted cioé non voluti in questo caso nello slug e nella mail

        $unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', '\'' => '');

        // ***

        foreach($restaurants as $key => $restaurant){

            $newRestaurant = new Restaurant;
            $newRestaurant->user_id = $key + 1;
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->email = str_replace(' ','',strtolower(strtr( $restaurant['name'].'@gmail.com', $unwanted_array)));
            $newRestaurant->address = $faker->sentence(6);
            $newRestaurant->city = 'Roma';
            $newRestaurant->country = 'Italia';
            $newRestaurant->post_code = '00100';
            $newRestaurant->phone = '06'.rand(1000,9999).rand(1000,9999);
            $newRestaurant->slug = Str::of(strtr( $restaurant['name'].' '.$newRestaurant->address, $unwanted_array ))->slug('-');
            $newRestaurant->save();
            
        }

    }


}