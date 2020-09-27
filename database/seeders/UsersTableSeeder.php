<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','author')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name' =>'Admin User',
            'email'=>'admin@mail.ru',
            'password'=>Hash::make('admin@mail.ru')
        ]);
        $author = User::create([
            'name' =>'Author User',
            'email'=>'author@mail.ru',
            'password'=>Hash::make('author@mail.ru')
        ]);
        $user = User::create([
            'name' =>'User User',
            'email'=>'user@mail.ru',
            'password'=>Hash::make('user@mail.ru')
        ]);


        $admin -> roles() -> attach($adminRole);
        $author -> roles() -> attach($authorRole);
        $user -> roles() -> attach($userRole);
    }
}
