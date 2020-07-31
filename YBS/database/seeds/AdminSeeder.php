<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin as Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        //'name', 'email','profile_image', 'password',
        $email = "ybs@applix.info";
        $admin = Admin::where('email','=',$email)->first();
        if($admin){
            //old
            echo "Already Existed.";
        }
        else{
            //new
            $admin = new Admin();
            $admin->name = "Administrator";
            $admin->email = $email;
            $admin->password = Hash::make('!@#ybs123');
            $admin->save();
            echo "Added new Admin";
        }

    }
}
