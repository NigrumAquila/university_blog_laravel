<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacultiesTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(MarksTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(LecturersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);

        $this->call(GroupSubjectsTableSeeder::class);
        $this->call(ExamMarksTableSeeder::class);
    }
}
