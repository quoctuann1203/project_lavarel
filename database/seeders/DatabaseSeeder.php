<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Order;
use App\Models\Phone;
use App\Models\Profile;
use App\Models\Provider;
use App\Models\Role;
use App\Models\Tag;
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
        //        User::factory(10)->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'viewer']);
        Role::create(['name' => 'editor']);
        Provider::factory(10)->create();
        Phone::factory(50)->create();
        User::factory(5)->create();
        Profile::factory(10)->create();
        Order::factory(10)->create()->each(function ($order) {
            $ids = range(1, 30);
            shuffle($ids); //trộn
            $sliced = array_slice($ids, 0, array_rand(range(0, 7), 1));
            foreach ($sliced as $id) {
                $item = Phone::find($id);
                $order->phones()->attach($item->id, ['price' => $item->price, 'quantity' => array_rand(array_flip(range(1, 2)), 1)]);
            }
        });
    }
}
