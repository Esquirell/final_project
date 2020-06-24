<?php


namespace App\Repository;


use App\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    /**
     * Найти юзера по почте
     * @param $email
     * @return User|null
     */
    public function findUserByEmail($email): ?User;

    /**
     * Добавить роль доктора юзеру
     * @param User $user
     */
    public function addRoleDoctor(User $user): void;

    /**
     * Удалить роль доктора
     * @param User $user
     */
    public function deleteRoleDoctor(User $user): void;

    /**
     * Обновить информацию о юзере
     * @param Request $request
     */
    public function updateInfoABoutUser(Request $request): void;

    /**
     * Обновить аватарку
     * @param Request $request
     */
    public function updateAvatar(Request $request);
}
