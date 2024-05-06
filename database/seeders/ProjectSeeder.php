<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Momentaneamente il Seeder è puramente inutile, perchè stiamo mano a mano integrando la creazione solamente da DashBoard arrivando sempre
        //più vicini al reale e corretto utilizzo del Portfolio.
        Project::create([
            'title' => 'Boolzapp',
            'description' => 'WebApp di messaggistica',
            'image' => 'https://store-images.s-microsoft.com/image/apps.8453.13518859748920827.4d7dd838-9f34-4ad2-9cd7-b861c6398fc1.11cbb3d4-ffd9-42c1-82bd-e3f305d562b1',
        ]);

        Project::create([
            'title' => 'Boolflix',
            'description' => 'WebApp di streaming',
            'image' => 'https://yt3.googleusercontent.com/i0PPodnHGyWQ9m2XSQ2pjzxhKfSwoK2eI2DlcFjFdsmLqE3jMhBkkh-Hihato9qMcZf9t1ekFQ=s900-c-k-c0x00ffffff-no-rj',
        ]);
    }
}
