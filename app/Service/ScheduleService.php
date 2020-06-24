<?php


namespace App\Service;


use App\Models\Doctor;
use App\Repository\ScheduleRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ScheduleService implements ScheduleServiceInterface
{
    /**
     * @var ScheduleRepositoryInterface
     */
    private $scheduleRepository;

    /**
     * ScheduleService constructor.
     * @param ScheduleRepositoryInterface $scheduleRepository
     */
    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Получить рабочие дни врача
     * @param Request $request
     * @return array
     */
    public function getAvailableDays(Request $request): ?array
    {
        return $this->scheduleRepository->findAvailableDays($request);
    }

    /**
     * Создать раписание на 7 дней
     * @param Doctor $doctor
     */
    public function generateSchedule(Doctor $doctor): void
    {
        $this->scheduleRepository->generateSchedule($doctor);
    }

    /**
     * Получить рабочее время
     * @param Request $request
     * @return array|null
     */
    public function getAvailableTimes(Request $request): ?array
    {
        return $this->scheduleRepository->findAvailableTimes($request);
    }

    /**
     * Показать расписание
     * @param User $user
     * @return Collection|null
     */
    public function getSchedule(User $user): ?Collection
    {
        return $this->scheduleRepository->findSchedule($user);
    }

}
