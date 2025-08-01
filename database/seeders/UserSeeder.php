<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;
// use App\Models\User;
// use Illuminate\Support\Facades\DB;

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserLicense;
use DB;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        //   // 80 users biasa
        // User::factory()->count(80)->create();

        // // 10 Admins dengan nama Admin1..Admin10 dan user info
        // for ($i = 1; $i <= 10; $i++) {
        //     $admin = User::factory()->admin()->create([
        //         'name' => "Admin{$i}",
        //         'email' => "admin{$i}@example.com",
        //     ]);

        //     $admin->info()->create(
        //         \Database\Factories\UserInfoFactory::new()->make()->toArray()
        //     );
        // }

        // // 10 Drivers dengan nama Driver1..Driver10 dan user license
        // for ($i = 1; $i <= 10; $i++) {
        //     $driver = User::factory()->driver()->create([
        //         'name' => "Driver{$i}",
        //         'email' => "driver{$i}@example.com",
        //     ]);

        //     $driver->license()->create(
        //         \Database\Factories\UserLicenseFactory::new()->make()->toArray()
        //     );
        // }


        // 80 user biasa (role 1) dengan info
        User::factory()
            ->count(80)
            ->create(['role' => 1])
            ->each(function ($user) {
                $user->info()->create(
                    \Database\Factories\UserInfoFactory::new()->make()->toArray()
                );
            });

        // 10 Admins (role 2) dengan nama Admin1..Admin10
        for ($i = 1; $i <= 10; $i++) {
            User::factory()->admin()->create([
                'name' => "Admin{$i}",
                'email' => "admins{$i}@example.com",
            ]);
        }

        // 10 Drivers (role 3) dengan nama Driver1..Driver10 dan license
        for ($i = 1; $i <= 10; $i++) {
            $driver = User::factory()->driver()->create([
                'name' => "driver{$i}",
                'email' => "drivers{$i}@example.com",
            ]);

            $driver->license()->create(
                \Database\Factories\UserLicenseFactory::new()->make()->toArray()
            );
        }

        DB::table('users')->insert([
            [
                // 'user_id'   => 1,
                'name'      => 'John Doe',
                'NIK'       => '3578263788989991',
                'email'     => '/',
                'phone_num' => '081234567890',
                'password'  => Hash::make('password123'),
                'profile_pic' => '',
                'status'    => false,
                'role'      => 1,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                // 'user_id'   => 2,
                'name'      => 'Jane Smith',
                'NIK'       => '3578263788989992',
                'email'     => 'jane@example.com',
                'phone_num' => '089876543210',
                'password'  => Hash::make('password1'),
                'profile_pic' => '',
                'status'    => false,
                'role'      => 1,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                // 'user_id'   => 3,
                'name'      => 'Admin1',
                'NIK'       => '3578263788989993',
                'email'     => 'admin1@example.com',
                'phone_num' => '089876543213',
                'password'  => Hash::make('password2'),
                'profile_pic' => '',
                'status'    => false,
                'role'      => 2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                // 'user_id'   => 4,
                'name'      => 'Admin2',
                'NIK'       => '3578263788989994',
                'email'     => 'admin2@example.com',
                'phone_num' => '089876543214',
                'password'  => Hash::make('password3'),
                'profile_pic' => '',
                'status'    => false,
                'role'      => 2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                // 'user_id'   => 5,
                'name'      => 'Driver1',
                'NIK'       => '3578263788989995',
                'email'     => 'driver1@example.com',
                'phone_num' => '089876543216',
                'password'  => Hash::make('password5'),
                'profile_pic' => '',
                'status'    => false,
                'role'      => 3,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                // 'user_id'   => 6,
                'name'      => 'Driver2',
                'NIK'       => '3578263788989996',
                'email'     => 'driver2@example.com',
                'phone_num' => '089876543219',
                'password'  => Hash::make('password6'),
                'profile_pic' => '',
                'status'    => false,
                'role'      => 3,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                // 'user_id'   => 7,
                'name'      => 'Kreasi',
                'NIK'       => '3578263788989881',
                'email'     => 'kreasipxk1@gmail.com',
                'phone_num' => '081234567823',
                'password'  => Hash::make('Kreasiaja!'),
                'profile_pic' => '',
                'status'    => false,
                'role'      => 1,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
        DB::table('users_license')->insert([
            [
                'user_id'       => 5,
                'license_plate' => 'B1234XYZ',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'user_id'       => 6,
                'license_plate' => 'D9876LMN',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}

