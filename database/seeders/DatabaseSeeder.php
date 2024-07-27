<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Product::create([
                'name' => 'NeckLaces - ' . $i + 1,
                'category_id' => 2,
                'designer_id' => 1,
                'description' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
                'price' => 2500,
                'weight' => 10,
                'material' => 'gold',
                'image' => 'uploads/…-66a495c204536.jpeg',

            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Product::create([
                'name' => 'Earrings - ' . $i + 1,
                'category_id' => 3,
                'designer_id' => 1,
                'description' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
                'price' => 2500,
                'weight' => 10,
                'material' => 'gold',
                'image' => 'uploads/5888493621760609323_121.jpg',

            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Product::create([
                'name' => 'Ring - ' . $i + 1,
                'category_id' => 4,
                'designer_id' => 1,
                'description' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
                'price' => 2500,
                'weight' => 10,
                'material' => 'gold',
                'image' => 'uploads/97db78f1-c1f4-4c40-88cd-444cb826683c.jpeg',

            ]);
        }
    }
}
