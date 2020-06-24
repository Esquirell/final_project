<?php


namespace App\Repository;


use App\Models\Doctor;
use App\Models\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ScheduleRepository implements ScheduleRepositoryInterface
{

    /**
     * Создать расписание врача на 7 дней
     * @param Doctor $doctor
     */
    public function generateSchedule(Doctor $doctor): void
    {
        $days = json_decode($doctor->work_days);
        $times = json_decode($doctor->work_time);
        foreach ($days as $day) {
            $date = date_create(date('Y-m-d', strtotime($day)));
            date_modify($date, $doctor->number_day_generate . ' days');
            foreach ($times as $time) {
                $schedule = new Schedule();
                $schedule->reception = date_modify($date, $time);
                $schedule->doctor_id = $doctor->id;
                $schedule->save();
            }
        }
        $doctor->number_day_generate += 7;
        $doctor->save();
    }

    /**
     * Найти рабочие дни врача
     * @param Request $request
     * @return array|null
     */
    public function findAvailableDays(Request $request): ?array
    {
        $dates = Schedule::where([
            ['reception', '>', date('Y-m-d')],
            ['doctor_id', $request['doctor']]
        ])->get()->pluck('reception');
        $daysForAjax = [];
        for ($i = 0; $i < count($dates); ++$i) {
            $daysForAjax[$i][0] = idate('j', strtotime($dates[$i]));
            $daysForAjax[$i][1] = idate('n', strtotime($dates[$i]));
            $daysForAjax[$i][2] = idate('Y', strtotime($dates[$i]));
        }
        return $daysForAjax;
    }

    /**
     * Найти рабочее время врача
     * @param Request $request
     * @return array|null
     */
    public function findAvailableTimes(Request $request): ?array
    {
        $times = Schedule::where([
            ['reception', 'like', $request['date'] . '%'],
            ['doctor_id', $request['doctor']]
        ])->get();
        $timeForAjax = [];
        foreach ($times as $time) {
            $timeForAjax [] = date('H:i', strtotime($time->reception));
        }
        return $data = [
            'work_time' => $timeForAjax
        ];
    }

    /**
     * Найти расписание
     * @param User $user
     * @return Collection|null
     */
    public function findSchedule(User $user): ?Collection
    {
        return $user->doctor()->first()->schedules()->get();
    }


}
