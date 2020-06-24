<?php


namespace App\Service;



use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface DoctorServiceInterface
{
    /**
     * Получить всех врачей
     * @return Collection|null
     */
    public function getAllDoctors(): ?Collection;

    /**
     * Добавить врача
     * @param User $user
     */
    public function addDoctor(User $user): void;

    /**
     * Получить врача по юзеру
     * @param User $user
     * @return Doctor|null
     */
    public function getDoctorByUser(User $user): ?Doctor;

    /**
     * Обновить инфу о докторе
     * @param Request $request
     */
    public function updateInfoAboutDoctor(Request $request): void;

    /**
     * Получить врачей с созданным расписанием
     * @return Collection|null
     */
    public function getDoctorsWithSchedule(): ?Collection;

    /**
     * Удалить доктора
     * @param User $user
     */
    public function deleteDoctor(User $user): void;

}
