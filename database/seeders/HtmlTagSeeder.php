<?php

namespace Database\Seeders;

use App\Models\HtmlTags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HtmlTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $htmlTags = [
            [
                'tag' => '<input type="text" class="" name="" id="" value="">
<input type="date" class="" name="" id="" value="">
<input type="checkbox" class="" name="" id="" value="">
<input type="radio" class="" name="" id="" value="">
<input type="number" class="" name="" id="" value="">',
                'label_id' => 1
            ],
            [
                'tag' => '<input type="checkbox" name="" class="" id="">',
                'label_id' => 2
            ],
            [
                'tag' => '<button class="" id="" name="">Button</button>',
                'label_id' => 3

            ]
        ];

        foreach($htmlTags as $tag){
            HtmlTags::create($tag);
        }
    }
}
