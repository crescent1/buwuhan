<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Administrator';
        $user->email = 'admin@buwuhan';
        $user->password = 'bismillah';

        /**
         * Tipe user merupakan data yg sifatnya constant
         * Gunakan Enum untuk data constant, tujuannya adalah
         * untuk mendokumentasikan data constant tsb
         */
        $user->type = UserType::Administrator;
        $user->status = 1;
        $user->save();
    }
}
