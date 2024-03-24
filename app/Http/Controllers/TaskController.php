<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;

class TaskController extends Controller
{
    public function index()
    {
        $faker = Faker::create();

        $tasks = [];
        for ($i = 1; $i <= 10; $i++) {
            $tasks[] = collect([
                'id' => $i,
                'title' => $faker->sentence,
                'category' => $faker->word,
                'sub_category' => $faker->word,
                'date_start' => $faker->dateTimeBetween('now', '+1 week'),
                'date_end' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
                'status' => $faker->randomElement(['Pending', 'In Progress', 'Completed']),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }

        return view('tasks.index', compact('tasks'));
    }

    public function show($task)
    {
        $faker = Faker::create();

        $task = collect([
            'id' => $task,
            'title' => $faker->sentence,
            'description' => $faker->text,
            'category' => $faker->word,
            'sub_category' => $faker->word,
            'evidence' => [
                'url' => $faker->url,
                'filename' => $faker->word . '.' . $faker->fileExtension,
            ],
            'date_start' => $faker->dateTimeBetween('now', '+1 week'),
            'date_end' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
            'status' => $faker->randomElement(['Pending', 'In Progress', 'Completed']),
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
        ]);

        $historyProgress = [];
        for ($i = 0; $i < 3; $i++) {
            $historyProgress[] = [
                'description' => $faker->sentence,
                'created_at' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
            ];
        }

        $historyApprovals = [];
        for ($i = 0; $i < 2; $i++) {
            $historyApprovals[] = [
                'status' => $faker->randomElement(['Approved', 'Rejected']),
                'created_at' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
            ];
        }

        // return compact('task', 'historyProgress', 'historyApprovals');

        return view('tasks.show', compact('task', 'historyProgress', 'historyApprovals'));
    }
}
