<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = new Category();
        $cat1->name = "Crazy Guys";
        $cat1->save();

        $cat2 = new Category();
        $cat2->name = "Crazy Monsters";
        $cat2->save();

        $cat3 = new Category();
        $cat3->name = "Crazy Aliens";
        $cat3->save();

        $movie1 = new Movie();
        $movie1->title = "Friday the 13th";
        $movie1->director = "A Name";
        $movie1->synopsis = "A Synopsis";
        $movie1->release_date = new DateTime();
        $movie1->save();
        $movie1->categories()->attach($cat2);

        $movie2 = new Movie();
        $movie2->title = "Friday the 13th";
        $movie2->director = "A Name";
        $movie2->synopsis = "A Synopsis";
        $movie2->release_date = new DateTime();
        $movie2->save();
        $movie2->categories()->attach($cat3);
    }
}
