<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Course;
use App\Models\Series;
use App\Models\Topic;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $series = ['PHP', 'Javascript', 'Wordpress', 'Laravel'];
        $series = [
            [
                'name' => "PHP",
                'image' => 'https://www.shutterstock.com/image-photo/business-technology-internet-network-concept-260nw-2111313359.jpg',
            ],
            [
                'name' => "Javascript",
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fblog.bitsrc.io%2Ffeatures-of-javascript-you-probably-never-used-4c117ba3f025&psig=AOvVaw3blHlt_nbRG7xDW-5J_Hrr&ust=1671813947798000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCMDk2rXWjfwCFQAAAAAdAAAAABAJ',
            ],
            [
                'name' => "Wordpress",
                'image' => 'https://s.w.org/style/images/about/WordPress-logotype-alternative.png',
            ],
            [
                'name' => "Laravel",
                'image' => 'https://www.cloudways.com/blog/wp-content/uploads/Laravel-9.jpg',
            ],
        ];
        foreach($series as $item) {
            Series::create([
                'name'=> $item['name'],
                'image'=> $item['image'],
            ]);
        }

        $topics = ['Eloquent', 'Validation', 'Authentication', 'Testing'];
        foreach($topics as $item) {
            Topic::create([
                'name'=> $item,
            ]);
        }

        $platforms = ['Laracasts', 'Laravel Daily', 'Codecourse'];
        foreach($platforms as $item) {
            Platform::create([
                'name'=> $item,
            ]);
        }

        $authors = ['Shabir Hossian', 'Rasel Ahmed', 'Codecourse'];
        foreach($authors as $item) {
            Author::create([
                'name'=> $item,
            ]);
        }

        // creat 50 users
        User::factory(50)->create();

        // create 100 course
        Course::factory(100)->create();

        $courses = Course::all();
        foreach ($courses as $course) {
            // random topics array
            $topics = Topic::all()->random(rand(1, 4))->pluck('id')->toArray();
            $course->topics()->attach($topics);

            $authors = Author::all()->random(rand(1, 3))->pluck('id')->toArray();
            $course->authors()->attach($authors);

            $series = Series::all()->random(rand(1, 3))->pluck('id')->toArray();
            $course->series()->attach($series);
        }
    }
}
