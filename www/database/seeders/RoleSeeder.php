<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            Role::create([
                'id'   => Role::ROLE_ADMIN,
                'name' => 'Administrator',
                'slug' => 'admin'
            ]);

            Role::create([
                'id'   => Role::ROLE_PRACTICE,
                'name' => 'Practice',
                'slug' => 'practice'
            ]);

            Role::create([
                'id'   => Role::ROLE_PROVIDER,
                'name' => 'Provider',
                'slug' => 'provider'
            ]);

            Role::create([
                'id'   => Role::ROLE_BILLER,
                'name' => 'Fqhc Biller',
                'slug' => 'fqhc-biller'
            ]);
        } catch (\Exception $e) {
            $this->command->error($e->getMessage());
        }
    }
}
