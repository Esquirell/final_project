<?php


namespace App\Service;


use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface ScheduleServiceInterface
{
    /**
     * Создать раписание на 7 дней
     * @param Doctor $doctor
     */
    public function generateSchedule(Doctor $doctor): void;

    /**
     * Получить рабочие дни врача
     * @param Request $request
     * @return array|null
     */
    public function getAvailableDays(Request $request): ?array;

    /**
     * Получить рабочее время врача
     * @param Request $request
     * @return array|null
     */
    public function getAvailableTimes(Request $request): ?array;

    /**
     * Показать расписание
     * @param User $user
     * @return Collection|null
     */
    public function getSchedule(User $user): ?Collection;
}
