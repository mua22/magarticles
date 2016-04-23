<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++){
            \App\Tag::create([
                'name' => "tag: $i",
                //'body' => "Article Body: ".str_random(400),
                //'published_at' => \Carbon\Carbon::now(),
                //'user_id' => 1,
            ]);
        }
        $articles = array();
        for($i=0;$i<5;$i++){
            $input["title"] = "Dummy Article: ".($i+1);
            $input["body"] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam dolores eligendi eum eveniet excepturi fugit inventore iusto magnam maiores minus mollitia nostrum perferendis quaerat recusandae reiciendis sed, velit voluptatibus";
            $input['published_at'] = \Carbon\Carbon::now();
            $input['category_id'] = rand(1,7);
            $articles[$i] = new \App\Article($input);
            /*$articles[$i] = new \App\Article();
            \App\Article::create([
                'title' => "Article: ".str_random(10),
                'body' => "Article Body: ".str_random(400),
                'published_at' => \Carbon\Carbon::now(),
                'user_id' => 1,
            ]);*/
        }
        foreach($articles as $article){
            $user = \App\User::first();
            $art = $user->articles()->save($article);
            $art->tags()->attach([1,2,3,4,5]);
        }
        foreach($articles as $article){
            $randComments = rand(2,3);
            for($i=0;$i<=$randComments;$i++)
            \App\Comment::create([
            'title' => "Dummy Comment: ".str_random(10),
            'article_id'=>$article->id,
            'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            'user_id' => 1,
        ]);
        }
        /*DB::table('articles')->insert([
            'title' => "Article: ".str_random(10),
            'body' => "Article Body: ".str_random(400),
            'published_at' => \Carbon\Carbon::now(),
            'user_id' => 1,
        ]);*/

    }
}
