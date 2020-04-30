<?php
use App\user;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','vs4110690@gmail.com')->first();
        if(!$user){
            User::create([
                'name'=>'vikram singh',
                'email'=>'vs4110690@gmail.com',
                'role'=>'admin',
                'password'=>Hash::make('Rathoer12@')
            ]);
        }
    }
}
