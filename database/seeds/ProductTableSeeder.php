<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
        	'title'       => 'Harry Potter',
        	'description' => 'Harry James Potter is the title character of J. K. Rowling\'s Harry Potter series. The majority of the books\' plot covers seven years in the life of the orphan Potter, who, on his eleventh birthday, learns he is a wizard.',
        	'price'       => '12',
        	'imagePath'   => 'http://www.ew.com/sites/default/files/styles/tout_image_612x380/public/1427465289/Sorcerers-stone.jpg?itok=zD1Q1qx8',
        ]);

        $product->save();

        $product = new Product([
        	'title'       => 'Flash',
        	'description' => 'The Flash is an American television series developed by Greg Berlanti, Andrew Kreisberg and Geoff Johns, airing on The CW. It is based on the DC Comics character Barry Allen / Flash, a costumed superhero crime-fighter with the power to move at superhuman speeds.',
        	'price'       => '15',
        	'imagePath'   => 'http://thatswhatkobisaid.files.wordpress.com/2011/10/the-flash.jpg',
        ]);

        $product->save();

        $product = new Product([
        	'title'       => 'Arrow',
        	'description' => 'The third season of Arrow premiered on October 8, 2014 on The CW and concluded on May 13, 2015. The season consisted of 23 episodes. It took place in conjunction with the first season of The Flash.',
        	'price'       => '12',
        	'imagePath'   => 'http://vignette1.wikia.nocookie.net/arrow/images/a/ac/Arrow_season_3_poster_-_saving_a_city_takes_a_toll.png/revision/latest?cb=20150910130551',
        ]);

        $product->save();

        $product = new Product([
        	'title'       => 'Dick Grayson',
        	'description' => 'As the first Robin, Dick Grayson was one of the most famous sidekicks in fiction. The boy became a man, and became the independent hero known as Nightwing. After Bruce died in Final Crisis, Dick took up the cowl as Batman. He returned to the role of Nightwing after Bruce\'s return, defending Old Gotham, and later Chicago. After his identity was revealed during Forever Evil, he became a spy with Spyral. Now after Rebirth, Dick Grayson has returned to his role as Nightwing to fight the Parliament of Owls.',
        	'price'       => '17',
        	'imagePath'   => 'http://www.ew.com/sites/default/files/styles/tout_image_612x380/public/1427465289/Sorcerers-stone.jpg?itok=zD1Q1qx8',
        ]);

        $product->save();

        $product = new Product([
        	'title'       => 'Batman',
        	'description' => 'Bruce Wayne, who witnessed the murder of his billionaire parents as a child, swore to avenge their deaths. He trained extensively to achieve mental and physical perfection, mastering martial arts, detective skills, and criminal psychology. Costumed as a bat to prey on criminals\' fears, and utilizing a high-tech arsenal, he became the legendary Batman.',
        	'price'       => '44',
        	'imagePath'   => 'http://static4.comicvine.com/uploads/scale_small/3/31666/5481227-asbm_1_dir_cut_57d89cbee0e113.09132512.jpg',
        ]);

        $product->save();

        $product = new Product([
        	'title'       => 'Darkseid',
        	'description' => 'Worshipped as the "God of Evil", Darkseid is one of the most powerful beings in existence and the supreme monarch of planet Apokolips. Considered one of Superman\'s greatest adversaries, the greatest enemy of New Genesis and one of the greatest threats to the DC Multiverse, he seeks to bend everything and everyone to his will and remake the cosmos in his image, while searching for the Anti-Life Equation.',
        	'price'       => '32',
        	'imagePath'   => 'http://static4.comicvine.com/uploads/scale_small/8/81965/2309871-justice_league.jpeg',
        ]);

        $product->save();

        $product = new Product([
        	'title'       => 'Guy Gardner',
        	'description' => 'Guy Gardner started out as the backup Green Lantern for Hal Jordan. He has since become one of the most prominent Green Lanterns of the Corps, despite possessing an egocentric personality. He has recently deserted his Green Power Ring in favor of the Red Ring of rage. Guy\'s will and rage are some of the most impressive in the entire Emotional Spectrum.',
        	'price'       => '25',
        	'imagePath'   => 'http://static4.comicvine.com/uploads/scale_small/5/57845/1720458-choose_your_fate.jpg',
        ]);

        $product->save();
    }
}

