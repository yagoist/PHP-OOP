<?php

namespace App\Repositories;

trait UsersRepository
{

    public static function getUsers(): array
    {
        return [
            [
                'name' => 'Великий',
                'email' => 'test@test.ru',
                'password' => 'test',
                'isAdmin' => true
            ],
            [
                'name' => 'Князь',
                'email' => 'admin@admin.ru',
                'password' => 'admin',
                'isAdmin' => true
            ],
            [
                'name' => 'Челядь',
                'email' => 'test2@test.ru',
                'password' => 'test2',
                'isAdmin' => false
            ]
        ];
    }
}
