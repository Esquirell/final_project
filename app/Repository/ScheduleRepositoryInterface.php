<?php


namespace App\Repository;


use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface ScheduleRepositoryInterface
{
    /**
     * Создать расписание врача на 7 дней
     * @param Doctor $doctor
     */
    public function generateSchedule(Doctor $doctor): void;

    /**
     * Найти рабочие дни врача
     * @param Request $request
     * @return array|null
     */
    public function findAvailableDays(Request $request): ?array;

    /**
     * Найти рабочее время врача
     * @param Request $request
     * @return array|null
     */
    public function findAvailableTimes(Request $request): ?array;

    /**
     * Найти расписание
     * @param User $user
     * @return Collection|null
     */
    public function findSchedule(User $user): ?Collection;
}

