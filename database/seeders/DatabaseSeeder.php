<?php

namespace Database\Seeders;

use App\Models\Airline;
use App\Models\Airplane;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Card;
use App\Models\Fare;
use App\Models\Flight;
use App\Models\Seat;
use App\Models\User;
use App\Models\Schedule;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(2)->create();

       // User::factory()->create([
         //   'name' => 'Test User',
           // 'email' => 'test@example.com',
        //]);
        Airport::factory(10)->create();
        Airplane::factory(30)->create();
        Airline::factory(5)->create();
        Card::factory(2)->create();
        Schedule::factory(40)->create();
        Flight::factory(10)->create();
        Seat::factory(200)->create();
        Fare::factory(10)->create();
        Booking::factory(10)->create();
    }
}
