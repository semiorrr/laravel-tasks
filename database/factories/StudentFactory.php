<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = ['Computer Science', 'Business Administration', 'Engineering', 'Psychology', 'Biology', 'Mathematics', 'Education', 'Nursing', 'Economics', 'Architecture'];
        $hobbies = ['Reading', 'Basketball', 'Coding', 'Music', 'Drawing', 'Swimming', 'Gaming', 'Traveling', 'Photography', 'Cooking'];
        $skills = ['Java', 'Python', 'Public Speaking', 'Leadership', 'Teamwork', 'C++', 'Photoshop', 'Excel', 'Writing', 'Research'];
        $photoUrls = [
            'https://randomuser.me/api/portraits/men/1.jpg',
            'https://randomuser.me/api/portraits/men/2.jpg',
            'https://randomuser.me/api/portraits/men/3.jpg',
            'https://randomuser.me/api/portraits/men/4.jpg',
            'https://randomuser.me/api/portraits/men/5.jpg',
            'https://randomuser.me/api/portraits/women/1.jpg',
            'https://randomuser.me/api/portraits/women/2.jpg',
            'https://randomuser.me/api/portraits/women/3.jpg',
            'https://randomuser.me/api/portraits/women/4.jpg',
            'https://randomuser.me/api/portraits/women/5.jpg',
        ];
        static $photoIndex = 1;
        $photo = 's' . $photoIndex . '.jpg';
        $photoIndex = $photoIndex < 20 ? $photoIndex + 1 : 1;
        $details = <<<EOT
Year: {$this->faker->numberBetween(1, 4)}
Bdate: {$this->faker->date('Y-m-d')}
Hobbies: {$this->faker->randomElement($hobbies)}
Skills: {$this->faker->randomElement($skills)}
EOT;
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'photo' => $photo,
            'course' => $this->faker->randomElement($courses),
            'student_id' => strtoupper($this->faker->bothify('S####')),
            'details' => $details,
        ];
    }
}
