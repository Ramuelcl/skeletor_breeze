<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // usando Storage::
        $folder ='avatars';
        // dd(Storage::assertExists('images'));
        Storage::deleteDirectory("public\\images\\$folder");
        Storage::makeDirectory("public\\images\\$folder");
        $folder ='posts';
        // Storage::deleteDirectory("public/images/$folder");
        // Storage::makeDirectory("public/images/$folder");
        //
        // usando File::
        // $folder ='public/storage/images/posts';
        // if (!File::exists($folder)) {
        //     File::makeDirectory($folder, 0755, true, true);
        // } else {
        //     File::deleteDirectory($folder);
        //     File::makeDirectory($folder, 0755, true, true);
        // }
        // //
        // dd([public_path('images'),storage_path('images')]);
        // \App\Models\User::factory(10)->create();
        $this->call([
            // $permissions = PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            // CommentSeeder::class,

        ]);
        // $categories=Category::factory(15)->create();
        // dd($categories);
        Post::factory(200)->create();

        User::factory(49)->create();
        // User::factory(49)->create()->each(
        //     function ($user) use ($categories) {
        //         Post::factory(rand(1, 15))->create([
        //             'user_id'=>$user->id,
        //             'category_id'=>($categories->random(1)->first())->id
        //         ]);
        //     }
        // );
    }
}
