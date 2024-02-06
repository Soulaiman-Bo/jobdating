<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'PHP',
            'JavaScript',
            'HTML',
            'CSS',
            'Communication',
            'Problem-solving',
            'Time management',
            'Leadership',
            'Teamwork',
            'Adaptability',
            'Creativity',
            'Critical thinking',
            'Organization',
            'Decision-making',
            'Attention to detail',
            'Interpersonal skills',
            'Negotiation',
            'Analytical skills',
            'Project management',
            'Technical skills',
            'Data analysis',
            'Research',
            'Writing',
            'Presentation skills',
            'Customer service',
            'Sales',
            'Marketing',
            'Financial management',
            'Programming',
            'Graphic design',
            'Foreign language proficiency',
            'Public speaking',
            'Networking',
            'Conflict resolution',
        ];

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill,
            ]);
        }
    }
}
