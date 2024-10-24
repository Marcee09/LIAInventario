<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

Artisan::command('fresh', function () {
    $this->call('migrate:refresh', ['--seed' => true]);
})->describe('Fresh database');

Artisan::command('user:list', function () {
    $users = User::all()->map(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->roles->pluck('name')->implode(', '),
        ];
    });
    $this->table(['id', 'name', 'email', 'roles'], $users);
})->purpose('Display users');

Artisan::command('user:remove {id}', function ($id) {
    User::findOrFail($id)->delete();
    $this->info('User removed');
})->purpose('Remove user by id');
