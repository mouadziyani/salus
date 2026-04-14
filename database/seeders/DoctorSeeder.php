<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            [
                "name" => "Dr. Mouad Ziyani",
                "specialty" => "Généraliste",
                "city" => "Oujda",
                "years_of_experience" => 23,
                "consultation_price" => 300,
                "available_days" => ["Monday", "Wednesday"],
            ],
            [
                "name" => "Dr. Wassim Rifi",
                "specialty" => "Cardiologue",
                "city" => "Taounate",
                "years_of_experience" => 7,
                "consultation_price" => 250,
                "available_days" => ["Tuesday", "Thursday"],
            ],
            [
                "name" => "Dr. Ahmed Boudallaa",
                "specialty" => "Dermatologue",
                "city" => "Oujda",
                "years_of_experience" => 5,
                "consultation_price" => 200,
                "available_days" => ["Monday", "Friday"],
            ],
            [
                "name" => "Dr. Abdelhakim Allouani",
                "specialty" => "Orthopédiste",
                "city" => "Errachidia",
                "years_of_experience" => 10,
                "consultation_price" => 300,
                "available_days" => ["Wednesday", "Saturday"],
            ],
            [
                "name" => "Dr. Hatim Ibourki",
                "specialty" => "Pédiatre",
                "city" => "Mohammedia",
                "years_of_experience" => 6,
                "consultation_price" => 180,
                "available_days" => ["Tuesday", "Friday"],
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}