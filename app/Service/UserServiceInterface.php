<?php


namespace App\Service;


use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;

interface UserServiceInterface
{
    /**
     * Найти юзера по почте
     * @param $email
     * @return User|null
     */
    public function getUserByEmail($email): ?User;

    /**
     * Проверка роли юзера
     * @param User $user
     * @return bool
     */
    public function isDoctor(User $user): bool;

    /**
     * Добавить роль доктора
     * @param User $user
     */
    public function addRoleDoctor(User $user): void;

    /**
     * Обновить инфу о юзере
     * @param Request $request
     */
    public function updateInfoABoutUser(Request $request): void;

    /**
     * Обновить аватар
     * @param Request $request
     */
    public function updateAvatar(Request $request);

    /**
     * Удалить роль доктора
     * @param User $user
     */
    public function deleteRoleDoctor(User $user): void;
}
