<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);
        Menu::firstOrCreate(['title' => 'Technology','sub_title'=>'technology']);
        Setting::firstOrCreate(['title'=>'CMS']);

        User::factory()->create([
            'name' => 'Sokkhen',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1,
            'is_supperadmin' => 1,
        ]);
    }
}
