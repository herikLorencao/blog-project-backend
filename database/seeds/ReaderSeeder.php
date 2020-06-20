<?php

use App\Reader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reader::create([
            'login' => 'readerTest',
            'email' => 'reader@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
