<?php

use App\Skills;

Route::get('/', function () {
    $hiscores = [
        'skills' => [
                'mining' => Skills::where('mining_experience', '>', 5)
                    ->with('user:id,username')
                    ->get()
                    ->sortByDesc('mining_experience')
                    ->take(10),
            ],
        ];

    return view('welcome', compact('hiscores'));
})->name('welcome');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
