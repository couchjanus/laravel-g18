<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::insert('insert into categories (id, name, votes, description) values (?, ?, ?, ?)', [1, 'test', 1, 'Test description']);
        $categories = [
            ['name'=>'artisan', 'description'=>'Artisan Categories', 'votes'=>4 ],
            ['name'=>'php', 'description'=>'PHP Categories', 'votes'=>2],
            ['name'=>'laravel', 'description'=>'Laravel Categories', 'votes'=>5],
        ];
        // Удаляем предыдущие данные
        // DB::delete('delete from categories');
        // DB::statement
        DB::statement('truncate table categories');
        foreach ($categories as $catedory) {
            DB::insert('insert into categories (name, votes, description) values (?, ?, ?)', [$catedory['name'], $catedory['votes'], $catedory['description']
            ]);
        }
    }
}