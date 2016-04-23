<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name'=>'Directory',
            'children'=> [
                ['name'=>'Blogging / Forums',
                    'children'=>[
                        [
                            'name'=>'Android',
                            'children'=>[
                                [
                                    'name'=>'Android',
                                ],
                                [
                                    'name'=>'Blackberry',
                                    'children'=>[
                                        [
                                            'name'=>'Android',
                                        ],
                                        [
                                            'name'=>'Blackberry',
                                        ],
                                        [
                                            'name'=>'iPhones',
                                        ],
                                        [
                                            'name'=>'Others',
                                        ],
                                        [
                                            'name'=>'Software',
                                        ],
                                        [
                                            'name'=>'Symbian',
                                        ]
                                    ]
                                ],
                                [
                                    'name'=>'iPhones',
                                ],
                                [
                                    'name'=>'Others',
                                ],
                                [
                                    'name'=>'Software',
                                ],
                                [
                                    'name'=>'Symbian',
                                ]
                            ]
                        ],
                        [
                            'name'=>'Blackberry',
                        ],
                        [
                            'name'=>'iPhones',
                        ],
                        [
                            'name'=>'Others',
                        ],
                        [
                            'name'=>'Software',
                        ],
                        [
                            'name'=>'Symbian',
                        ]
                    ]
                ],
                ['name'=>'Email'],
                ['name'=>'Internet'],
                ['name'=>'Multimedia'],
                ['name'=>'Networking'],
                ['name'=>'RSS / Link Popularity'],
                ['name'=>'Search Engine Optimization'],
                ['name'=>'Site Security'],
                ['name'=>'Spam'],
                ['name'=>'Technology'],
                ['name'=>'Web Hosting'],
            ]
        ]);
        /*\App\Category::create([
            'name'=>'Cell Phones',
            'children'=>[
                [
                    'name'=>'Android',
                ],
                [
                    'name'=>'Blackberry',
                ],
                [
                    'name'=>'iPhones',
                ],
                [
                    'name'=>'Others',
                ],
                [
                    'name'=>'Software',
                ],
                [
                    'name'=>'Symbian',
                ]
            ]
        ]);
        \App\Category::create([
            'name'=>'Computers',
            'children'=>[
                [
                    'name'=>'Apple',
                ],
                [
                    'name'=>'Laptops',
                ],
                [
                    'name'=>'Desktop',
                ],
                [
                    'name'=>'Networking',
                ],
                [
                    'name'=>'Monitors',
                ],
                [
                    'name'=>'Others',
                ]
            ]
        ]);
        \App\Category::create([
            'name'=>'Gadgets',

        ]);
        \App\Category::create([
            'name'=>'Hardsware',

        ]);
        \App\Category::create([
            'name'=>'Photo',

        ]);*/
    }
}
