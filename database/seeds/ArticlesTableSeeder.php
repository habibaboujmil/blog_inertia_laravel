<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30 ; $i++) { 
            DB::table('articles')->insert(
                ['title' => 'titel'.$i, 
                 'content' => 'The most important sentence in any article is the first one. If it doesn’t induce the reader to proceed to the second sentence, your article is dead. And if the second sentence doesn’t induce him to continue to the third sentence, it’s equally dead. Of such a progression of sentences, each tugging the reader forward until … safely hooked, a writer constructs that fateful unit: the lead.',
                 'img_url'=> 'https://cdn.vuetifyjs.com/images/cards/house.jpg',
                 'theme_id' => rand(1,3),
                 'author_id' => rand(1,2),
                 ]
            );
        }
    }
}
