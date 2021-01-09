<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('gallerys')->insert([
            'image_name' => Str::random(20)
        ]);*/

        for($i=0; $i < 20; $i++)
        {
            DB::table('gallerys')->insert([
                'image_name' => Str::random(4),
            ]);
        }

    }
}
