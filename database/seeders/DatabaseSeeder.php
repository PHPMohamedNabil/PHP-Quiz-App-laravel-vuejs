<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     
       $admin = new User;

       $admin->name="admin";
       $admin->email="admin@admin.com";
       $admin->password=bcrypt("admin");
       $admin->visible_password="admin";
       $admin->email_verified_at=NOW();
       $admin->occupation="CEO";
       $admin->address="Egypt";
       $admin->phone='01111809770';
       $admin->is_admin=1;

       $admin->save();
    }
}
