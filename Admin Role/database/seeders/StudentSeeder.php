<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'student_name' => 'Vito Gunshop',
            'student_nim' => '233140700111039',
            'student_specialization' => 'Network Engineering',
            'student_class' => 'TI-4B',
            'student_major' => 'Information Technology',
            'student_email' => 'vito@example.com',
            'student_phone' => '081234567890',
            'student_photo' => null,
            'student_password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
