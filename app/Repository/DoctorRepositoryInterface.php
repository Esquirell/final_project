<?php


namespace App\Repository;


use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface DoctorRepositoryInterface
{
    /**
     * Находит всех врачей
     * @return Collection|null
     */
    public function findAllDoctors(): ?Collection;

    /**
     * Назначить юзера врачом
     * @param User $user
     */
    public function addDoctor(User $user): void;

    /**
     * Удалить доктора
     * @param User $user
     */
    public function deleteDoctor(User $user): void;

    /**
     * Найти доктора по юзеру
     * @param User $user
     * @return Doctor|null
     */
    public function findDoctorByUser(User $user): ?Doctor;

    /**
     * Обновить данные о враче
     * @param Request $request
     */
    public function updateInfoAboutDoctor(Request $request): void;

    /**
     * Найти врачей с созданным расписанием
     * @return Collection|null
     */
    public function findDoctorsWithSchedule(): ?Collection;
}
