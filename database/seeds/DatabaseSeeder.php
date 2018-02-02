<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,20)->create();
       // factory(App\StatasPost::class,10)->create();
       // factory(App\role::class,2)->create();
       // factory(App\role_admin::class,2)->create();
       // factory(App\Admin::class,2)->create();
        // $this->call(UsersTableSeeder::class);
        //php artisan db:seed
    }
}
