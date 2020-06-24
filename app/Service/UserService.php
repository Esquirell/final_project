<?php


namespace App\Service;


use App\Models\Doctor;
use App\Repository\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Найти юзера по почте
     * @param $email
     * @return User|null
     */
    public function getUserByEmail($email): ?User
    {
        return $this->userRepository->findUserByEmail($email);
    }

    /**
     * Проверка роли юзера
     * @param User $user
     * @return bool
     */
    public function isDoctor(User $user): bool
    {
        return $user->doctor()->get()->isNotEmpty();
    }

    /**
     * Добавить роль доктора юзеру
     * @param User $user
     */
    public function addRoleDoctor(User $user): void
    {
        $this->userRepository->addRoleDoctor($user);
    }

    /**
     * Обновить инфу о юзере
     * @param Request $request
     */
    public function updateInfoABoutUser(Request $request): void
    {
        $this->userRepository->updateInfoABoutUser($request);
    }

    /**
     * Обновить аватар
     * @param Request $request
     */
    public function updateAvatar(Request $request)
    {
        $this->userRepository->updateAvatar($request);
    }

    /**
     * Удалить роль доктора
     * @param User $user
     */
    public function deleteRoleDoctor(User $user): void
    {
        $this->userRepository->deleteRoleDoctor($user);
    }

}
