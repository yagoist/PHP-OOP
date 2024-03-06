<?php

namespace App;

use App\Exceptions\AuthException;
use App\Models\User;
use App\Repositories\UsersRepository;
use Symfony\Component\HttpFoundation\Session\Session;

class Auth
{
    use UsersRepository;
    public function __construct(private readonly Session $storage)
    {
    }

    /**
     * @throws AuthException
     */
    public function attempt(string $email, string $password): User
    {
        $users = self::getUsers();
        foreach ($users as $user) {
            if ($email === $user['email'] && $password === $user['password']) {
                return new User([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'isAdmin' => $user['isAdmin']
                    ]);
            }
        }
        throw new AuthException();
    }

    public function login(User $user): void
    {
        $this->storage->set('user', $user);
        $this->isAdmin();
    }

    public function logout(): void
    {
        $this->storage->remove('user');
    }

    public function isAuthorized(): bool
    {
        return $this->storage->has('user');
    }

    public function isAdmin(): bool
    {
        return $this->storage->get('user')['isAdmin'];
    }

    public function user(): ?User
    {
        return $this->storage->get('user');
    }
}
