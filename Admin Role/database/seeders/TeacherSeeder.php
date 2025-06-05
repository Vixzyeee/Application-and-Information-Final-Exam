<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'teacher_name' => 'Dr. Agus Santoso',
                'teacher_nik' => 'TCH12345601',
                'teacher_specialization' => 'Artificial Intelligence',
                'teacher_position' => 'Associate Professor',
                'teacher_email' => 'agus.santoso@example.com',
                'teacher_phone' => '081234567890',
                'teacher_photo' => null,
                'teacher_password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'teacher_name' => 'Prof. Rina Widodo',
                'teacher_nik' => 'TCH12345602',
                'teacher_specialization' => 'Cyber Security',
                'teacher_position' => 'Professor',
                'teacher_email' => 'rina.widodo@example.com',
                'teacher_phone' => '081234567891',
                'teacher_photo' => null,
                'teacher_password' => Hash::make('securepass'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'teacher_name' => 'Dr. Budi Prakoso',
                'teacher_nik' => 'TCH12345603',
                'teacher_specialization' => 'Data Science',
                'teacher_position' => 'Senior Lecturer',
                'teacher_email' => 'budi.prakoso@example.com',
                'teacher_phone' => '081234567892',
                'teacher_photo' => null,
                'teacher_password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'teacher_name' => 'Dr. Siti Rahayu',
                'teacher_nik' => 'TCH12345604',
                'teacher_specialization' => 'Software Engineering',
                'teacher_position' => 'Associate Professor',
                'teacher_email' => 'siti.rahayu@example.com',
                'teacher_phone' => '081234567893',
                'teacher_photo' => null,
                'teacher_password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'teacher_name' => 'Prof. Ahmad Hidayat',
                'teacher_nik' => 'TCH12345605',
                'teacher_specialization' => 'Network Security',
                'teacher_position' => 'Professor',
                'teacher_email' => 'ahmad.hidayat@example.com',
                'teacher_phone' => '081234567894',
                'teacher_photo' => null,
                'teacher_password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('teachers')->insert($teachers);
    }
}
