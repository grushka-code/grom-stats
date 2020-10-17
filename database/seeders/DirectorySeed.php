<?php

namespace Database\Seeders;

use App\Models\Directory;
use Illuminate\Database\Seeder;

class DirectorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseDirectories = [
            'Подолання бідності',
            'Подолання голоду',
            'Міцне здоров’я',
            'Якісна освіта',
            'Гендерна рівність',
            'Чиста вода та належні санітарні умови',
            'Відновлювана Енергія',
            'Гідна праця та економічне зростання ',
            'Інновації та інфраструктура',
            'Зменшення нерівності',
            'Сталий розвиток міст та спільнот',
            'Відповідальне споживання',
            'Боротьба зі зміною клімату',
            'Збереження морських екосистем',
            'Збереження екосистем суші',
            'Мир та справедливість',
            'Партнерство заради стійкого розвитку',

            ];
        foreach ($baseDirectories as $directory){
            $directory = new Directory(
                [
                    'title' => $directory,
                    'parent_id' => null,
                    'visible' => true
                ]
            );
            $directory->save();
        }
    }
}
