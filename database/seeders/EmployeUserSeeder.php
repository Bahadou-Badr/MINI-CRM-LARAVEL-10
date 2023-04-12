<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(7)->create();

        User::create([
            'name' => 'Yassine EMP',
            'email' => 'employe@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'address' => '300 Bridgeton Pike New Mexico',
            'phone' => '088888888899',
            'birth_date' => '1992-01-02',
            'is_admin' => false,
            'company_id' => 2,
        ]);
    }
}
