<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $dishes = [  
            // Mr Kebab Turco
            [
                'name' => 'Menù kebab',
                'price' => '10.85',
                'description' => 'Piadina o panino, patatine fritte o supplì e bevanda in lattina a scelta',
            ],
            [
                'name' => 'Menù falafel',
                'price' => '8.40',
                'description' => 'Piadina o panino e bevanda in lattina a scelta',
            ],
            // Gandhi
            [
                'name' => 'Aloo chaat',
                'price' => '5',
                'description' => 'Insalata di patate e ceci con sapori orientali',
            ],
            [
                'name' => 'Samosa Chaat',
                'price' => '6',
                'description' => 'Insalata Di Samosa e Ceci Ripiene di Patate Speziate',
            ],
            // Il Caffè Dietro L'Angolo
            [
                'name' => 'Grancroissant nocciola e cacao',
                'price' => '1.60',
                'description' => 'La golosità della crema nocciola e cacao unita ad un soffice impasto, per un croissant dal sapore unico, con decorazioni di zucchero',
            ],
            [
                'name' => 'Grancroissant crema',
                'price' => '1.60',
                'description' => 'Un soffice impasto custodisce un cuore di dolce crema, con decorazioni di zucchero',
            ],
            // Breakfast Rome
            [
                'name' => 'Splendid Green',
                'price' => '3.50',
                'description' => 'croissant ripieno al pistacchio',
            ],
            [
                'name' => 'Dark Jam',
                'price' => '2.90',
                'description' => 'croissant ripieno di marmellata alle visciole',
            ],
            //Mammò - Street Food
            [
                'name' => 'Avocado, pomodoro, feta, hummus',
                'price' => '8',
                'description' => 'Avocado, pomodoro, feta, hummus',
            ],
            [
                'name' => 'Insalata Scala',
                'price' => '9',
                'description' => 'Mozzarelline, pomodori ciliegini, julienne di carote, mais e olive',
            ],
            // Flower Burger
            [
                'name' => 'Funky cecio meal',
                'price' => '10.50',
                'description' => 'Funky cecio, side e drink',
            ],
            [
                'name' => 'Cheesy cecio meal',
                'price' => '12',
                'description' => 'Cheesy Cecio, side e drink',
            ],
            // Burrito's Way
            [
                'name' => 'Combo burrito\'s way',
                'price' => '17.90',
                'description' => 'Un burrito a scelta, un contorno a scelta e una bevanda a scelta',
            ],
            [
                'name' => 'Combo taco\'s way',
                'price' => '16.90',
                'description' => 'Un taco a scelta, un contorno a scelta e una bevanda a scelta',
            ],
            // The Mexican
            [
                'name' => 'Menù single & chips chicken burger',
                'price' => '24.90',
                'description' => 'Chicken burger, potato dippers con salse e 1 bibita o acqua a scelta',
            ],
            [
                'name' => 'Menù quesadillas',
                'price' => '21.80',
                'description' => 'Quesadilla a scelta, fritto a scelta e bibita a scelta',
            ],
            // Gelateria La Romana
            [
                'name' => 'Gelateria La Romana',
                'price' => '12',
                'description' => 'Fino a 2 gusti a scelta',
            ],
            [
                'name' => 'Vaschetta da 1 kg',
                'price' => '26',
                'description' => 'Fino a 5 gusti a scelta',
            ],
            // Dolci Desideri
            [
                'name' => 'Fragolina - grande',
                'price' => '22',
                'description' => 'Base di pasta frolla con crema chantilly e fragoline di bosco 700gr',
            ],
            [
                'name' => 'Sacher - grande',
                'price' => '20',
                'description' => 'Pan di spagna al cioccolato ripieno di marmellata di albicocche e ricoperta di cioccolato fondente 600gr',
            ],
            // New Delhi - Roma
            [
                'name' => 'Aloo bonda - Patate Bonda',
                'price' => '5',
                'description' => 'Fritto in olio con patate, farina di ceci e spezie indiane',
            ],
            [
                'name' => 'Paneer pakoda',
                'price' => '8',
                'description' => 'Farina grham, formaggio, spinaci e spezie indiane',
            ], 
            // Alì Babà Indian Food
            [
                'name' => 'White rise e qeema',
                'price' => '5.50',
                'description' => 'Riso bianco e carne macinato',
            ],
            [
                'name' => 'Alu e mattar',
                'price' => '5',
                'description' => 'Patate e piselli, pomodoro, curry e spezie indiane - vegetarian',
            ],
            // Elleniko
            [
                'name' => 'Insalata greca',
                'price' => '7.90',
                'description' => 'Pomodori, cetrioli, feta, olive kalamata, olio evo greco, peperoni e lattuga',
            ],
            [
                'name' => 'Piatto souvlaki pollo',
                'price' => '9.90',
                'description' => '2 souvlaki - spiedini -di pollo con pita, tzatziki, lattuga, pomodori, cipolla e patatine fritte',
            ],
            // Sparta
            [
                'name' => 'Pita BBQ',
                'price' => '6.90',
                'description' => 'Hamburger di manzo 100gr, bacon grigliato, cipolla croccante fritti, insalata, pomodori e salsa BBQ',
            ],
            [
                'name' => 'Grigliata spartana(anche per due persone)',
                'price' => '27.90',
                'description' => '1 salsiccia rustica greca da 100gr, 2 souvlaki di pollo da 50gr, 2 souvlaki di suino da 50gr, 1 hamburger di manzo 100gr, 4 fette di bacon grigliato, gyros di pollo da 100gr, 2 pite a spicchi, 2 salsa tzatziki, servito con patatine rustiche',
            ],
            // Cody Pokè Sushi
            [
                'name' => 'Hawaiian Normal',
                'price' => '10.90',
                'description' => 'Riso, salmone, edamame, ananas, mais tostato, tobikko orange, avocado',
            ],
            [
                'name' => 'Chucky Normal',
                'price' => '11.80',
                'description' => 'Riso, gambero in tempura, salmone (SOLO nella versione NORMAL), avocado, mandorle, cetriolo, teryaki, mango',
            ],
            // Sushi Sensei
            [
                'name' => 'Sushi Roll Combo',
                'price' => '17',
                'description' => '12 Roll - 6 Salmone, 6 Tonno e Avocado con Edamame di Contorno.',
            ],
            [
                'name' => 'Roll Rainbow',
                'price' => '10',
                'description' => 'Rainbow roll con tonno, spigola, salmone, gamberetti e avocado.',
            ],
            // Piccola Hong Kong
            [
                'name' => 'Ciao fan Hong Kong',
                'price' => '4.80',
                'description' => '-',
            ],
            [
                'name' => 'Pollo con mandorle',
                'price' => '5',
                'description' => '-',
            ],
            // Dim Sum Fine Asian Cusine
            [
                'name' => 'Anatra al forno',
                'price' => '5.40',
                'description' => '-',
            ],
            [
                'name' => 'Salmon rolls',
                'price' => '4.50',
                'description' => 'Involtino di pasta filo ripieno di salmone, philadelphia e salsa teriyaki',
            ],
            // Mandaloun - Lebanese Food
            [
                'name' => 'Kebbe meklieh',
                'price' => '8',
                'description' => 'Crocchette di carne di manzo e grano macinato con ripieno di carne tritata, cipolla e pinoli - 4 pezzi',
            ],
            [
                'name' => 'Makanek',
                'price' => '7.50',
                'description' => 'Salsiccette di carne sauté al limone (7 pezzi)',
            ],
            // Il Libanese
            [
                'name' => 'Rkakat belgebne',
                'price' => '8.50',
                'description' => 'Involtini ripieni di formaggio vaccino, mozzarella ed erbe aromatiche',
            ],
            [
                'name' => 'Sfiha baalbechese',
                'price' => '7.50',
                'description' => 'Pizzette artigianali ripiene di carne di manzo tritata, verdure e concentrato di melograno',
            ],
            // KFC
            [
                'name' => 'Menu Bucket Hot Wings',
                'price' => '22',
                'description' => 'Menu per due persone con contorni a scelta, bibite e un Bucket di 16 alette piccanti, per i veri fan dei sapori hot!',
            ],
            [
                'name' => 'Box Meal Colonel\'s Burger',
                'price' => '11',
                'description' => 'Così buono che il Colonnello ci ha messo la firma. Il Box Meal contiene un Colonel\'s Burger, una porzione di Pop Corn Chicken, un contorno speciale, patatine e bibita a scelta.',
            ],
            // Hard Rock Cafe Roma
            [
                'name' => 'Legendary® Combo offer per due con Coca-Cola',
                'price' => '30',
                'description' => 'Un Original Legendary Burger, un Barbecue Bacon Cheeseburger, patatine fritte formato famiglia e due Coca-Cola',
            ],
            [
                'name' => 'Bangkok Spicy Shrimp',
                'price' => '12.25',
                'description' => 'Croccanti gamberi glassati con una cremosa salsa piccante, guarniti con cipolle verdi, serviti su un letto di coleslaw.',
            ],
            // All'Antico Vinaio
            [
                'name' => 'La numero 1',
                'price' => '8',
                'description' => 'Porchetta, crema di patate arrosto e crema di cipolla',
            ],
            [
                'name' => 'La tricolore',
                'price' => '9',
                'description' => 'Carpaccio di manzo, stracciatella, crema di pistacchio, granella di nocciole',
            ],
            // Panino Giusto
            [
                'name' => 'Italoburger',
                'price' => '13',
                'description' => 'Hamburger di manzo, melanzane grigliate, stracciatella, pomodorini confit, pesto al basilico',
            ],
            [
                'name' => 'Stelvio',
                'price' => '7.50',
                'description' => 'Carne salada qualità Trentino, grue di cacao, crema di carciofi, uvetta sultanina, pepe, olio extravergine di oliva',
            ],
            // Kung Fu Restaurant
            [
                'name' => 'Hawaii tonno',
                'price' => '10.90',
                'description' => 'tonno, edamame, wagame, avocado, sesamo, cipolla fritto, （teriyaki, yuzu mayo, spicy mayo）',
            ],
            [
                'name' => '7 Ravioli di verdure',
                'price' => '3',
                'description' => 'Farina e verdure',
            ],
            // Odoroki
            [
                'name' => 'Ebi dumplings',
                'price' => '5.60',
                'description' => 'ravioli al vapore di gamberi, piastrati e serviti con ginger soy dressing. 4 pezzi',
            ],
            [
                'name' => 'Green Pad Thai',
                'price' => '11',
                'description' => 'Tagliolini di riso con funghi shiitake, pak choi, basilico thai, piselli, cipollotto , granella di arachidi e fiocchi di cipolla fritta.',
            ],
            // Sushiko
            [
                'name' => 'Gamberetti con bambù e funghi',
                'price' => '4.50',
                'description' => 'Gamberetti, bambu e funghi',
            ],
            [
                'name' => 'Temaki shake',
                'price' => '4.50',
                'description' => 'Salmone, cetriolo, maionese, sesamo',
            ],
            // Sushi Snob
            [
                'name' => 'The $upreme $nob - 16 pezzi',
                'price' => '40',
                'description' => '16 Sushi roll e 4 pezzi di nigiri serviti con edamame, salsa di soia, zenzero, e wasabi. 4 Pezzi spicy tonno cetriolo, 4 pezzi salmone avocado, 4x surimi avocado cetriolo, 4x salmone Philadelphia, 1 pezzo nigiri tonno, salmone, pesce bianco, gambero',
            ],
            [
                'name' => 'Roll spicy tonno - 8 pezzi',
                'price' => '14',
                'description' => 'Tonno fresco con maionese piccante e cetriolo',
            ],
            // Voglia Di Pizza
            [
                'name' => 'Margherita, prosciutto e bufala',
                'price' => '12.50',
                'description' => 'Pomodoro, mozzarella, prosciutto, bufala, olio evo',
            ],
            [
                'name' => 'Capricciosa',
                'price' => '12.50',
                'description' => 'Pomodoro, mozzarella, carciofi, olive, prosciutto, uovo, funghi, salsiccia, olio evo',
            ],
            // PizzaRè
            [
                'name' => 'Prosciutto cotto',
                'price' => '10',
                'description' => 'Pomodoro San Marzano DOP, fior d’Agerola, prosciutto cotto Ferrarini',
            ],
            [
                'name' => 'Ovolina',
                'price' => '10',
                'description' => 'Pomodoro San Marzano DOP, bocconcini di bufala a crudo, parmigiano, basilico',
            ],

        ];

        foreach ($dishes as $key => $dish) {
            $newDish = new Dish;

            switch ($key + 1) {
                case 1:
                case 2:
                    $newDish -> restaurant_id = 1;
                    break;
                case 3:
                case 4:
                    $newDish -> restaurant_id = 2;
                    break;
                case 5:
                case 6:
                    $newDish -> restaurant_id = 3;
                    break;
                case 7:
                case 8:
                    $newDish -> restaurant_id = 4;
                    break;
                case 9:
                case 10:
                    $newDish -> restaurant_id = 5;
                    break;
                case 11:
                case 12:
                    $newDish -> restaurant_id = 6;
                    break;
                case 13:
                case 14:
                    $newDish -> restaurant_id = 7;
                    break;
                case 15:
                case 16:
                    $newDish -> restaurant_id = 8;
                    break;
                case 17:
                case 18:
                    $newDish -> restaurant_id = 9;
                    break;
                case 19:
                case 20:
                    $newDish -> restaurant_id = 10;
                    break;
                case 21:
                case 22:
                    $newDish -> restaurant_id = 11;
                    break;
                case 23:
                case 24:
                    $newDish -> restaurant_id = 12;
                    break;
                case 25:
                case 26:
                    $newDish -> restaurant_id = 13;
                    break;
                case 27:
                case 28:
                    $newDish -> restaurant_id = 14;
                    break;
                case 29:
                case 30:
                    $newDish -> restaurant_id = 15;
                    break;
                case 31:
                case 32:
                    $newDish -> restaurant_id = 16;
                    break;
                case 33:
                case 34:
                    $newDish -> restaurant_id = 17;
                    break;
                case 35:
                case 36:
                    $newDish -> restaurant_id = 18;
                    break;
                case 37:
                case 38:
                    $newDish -> restaurant_id = 19;
                    break;
                case 39:
                case 40:
                    $newDish -> restaurant_id = 20;
                    break;
                case 41:
                case 42:
                    $newDish -> restaurant_id = 21;
                    break;
                case 43:
                case 44:
                    $newDish -> restaurant_id = 22;
                    break;
                case 45:
                case 46:
                    $newDish -> restaurant_id = 23;
                    break;
                case 47:
                case 48:
                    $newDish -> restaurant_id = 24;
                    break;
                case 49:
                case 50:
                    $newDish -> restaurant_id = 25;
                    break;
                case 51:
                case 52:
                    $newDish -> restaurant_id = 26;
                    break;
                case 53:
                case 54:
                    $newDish -> restaurant_id = 27;
                    break;
                case 55:
                case 56:
                    $newDish -> restaurant_id = 28;
                    break;
                case 57:
                case 58:
                    $newDish -> restaurant_id = 29;
                    break;
                case 59:
                case 60:
                    $newDish -> restaurant_id = 30;
                    break;
                
            }

            $newDish -> name = $dish['name'];
            $newDish -> description = $dish['description'];
            $newDish -> price = $dish['price'];
            $newDish -> save();
        }

    }
}
