<?php

use Illuminate\Database\Seeder;

use App\Section;
class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::firstOrCreate([
            'semester' => 'semester1',
            'section' => 'A',
            'identifier' => 'semester1_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester1',
            'section' => 'B',
            'identifier' => 'semester1_B',
        ]);

        Section::firstOrCreate([
            'semester' => 'semester2',
            'section' => 'A',
            'identifier' => 'semester2_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester2',
            'section' => 'B',
            'identifier' => 'semester2_B',
        ]);

        Section::firstOrCreate([
            'semester' => 'semester3',
            'section' => 'A',
            'identifier' => 'semester3_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester3',
            'section' => 'B',
            'identifier' => 'semester3_B',
        ]);

        Section::firstOrCreate([
            'semester' => 'semester4',
            'section' => 'A',
            'identifier' => 'semester4_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester4',
            'section' => 'B',
            'identifier' => 'semester4_B',
        ]);

        Section::firstOrCreate([
            'semester' => 'semester5',
            'section' => 'A',
            'identifier' => 'semester5_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester5',
            'section' => 'B',
            'identifier' => 'semester5_B',
        ]);

        Section::firstOrCreate([
            'semester' => 'semester6',
            'section' => 'A',
            'identifier' => 'semester6_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester6',
            'section' => 'B',
            'identifier' => 'semester6_B',
        ]);

        Section::firstOrCreate([
            'semester' => 'semester7',
            'section' => 'A',
            'identifier' => 'semester7_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester7',
            'section' => 'B',
            'identifier' => 'semester7_B',
        ]);

        Section::firstOrCreate([
            'semester' => 'semester8',
            'section' => 'A',
            'identifier' => 'semester8_A',
        ]);
        Section::firstOrCreate([
            'semester' => 'semester8',
            'section' => 'B',
            'identifier' => 'semester8_B',
        ]);


    }

}
