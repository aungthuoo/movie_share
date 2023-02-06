<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
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
        $account = Account::create(['name' => 'ATO Code Testing']);

        User::create([
            'account_id' => $account->id,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '123456',
            'owner' => true,
        ]);

    }
}
