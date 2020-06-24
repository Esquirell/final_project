<?php


namespace App\Repository;


use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorRepository implements DoctorRepositoryInterface
{
    /**
     * Находит всех врачей
     * @return Collection|null
     */
    public function findAllDoctors(): ?Collection
    {
        return DB::table('users')
            ->join('doctors', 'users.id', '=', 'doctors.user_id')->get();
    }

    /**
     * Назначить юзера врачом
     * @param User $user
     */
    public function addDoctor(User $user): void
    {
        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->description = 'Здравствуйте, меня зовут '.$user->name;
        $doctor->work_days = json_encode(['Sunday', 'Monday']);
        $doctor->work_time = json_encode(['10:00', '11:00']);
        $doctor->number_day_generate = 0;
        $doctor->save();
    }

    /**
     * Удалить доктора
     * @param User $user
     * @throws \Exception
     */
    public function deleteDoctor(User $user): void
    {
        $doctor = $user->doctor()->firstOrFail();
        $doctor->delete();
    }

    /**
     * Найти доктора по юзеру
     * @param User $user
     * @return Doctor|null
     */
    public function findDoctorByUser(User $user): ?Doctor
    {
        return $user->doctor()->first();
    }

    /**
     * Обновить данные о враче
     * @param Request $request
     */
    public function updateInfoAboutDoctor(Request $request): void
    {
        $date = date_create(date('H:i', strtotime($request['min_time'])));
        $min_time_value = explode(":", $request['min_time']);
        $max_time_value = explode(":", $request['max_time']);
        for ($i = 0; $i <= $max_time_value[0] - $min_time_value[0]; ++$i) {
            $work_time [] = date_format($date, 'H:i');
            date_modify($date, '1 hour');
        }
        $work_days = $request['days'];
        $description = $request['description'];
        $doctor = Auth::user()->doctor()->first();
        $doctor->work_time = json_encode($work_time);
        $doctor->work_days = json_encode($work_days);
        $doctor->description = $description;
        $doctor->save();
    }

    /**
     * Найти врачей с созданным расписанием
     * @return Collection|null
     */
    public function findDoctorsWithSchedule(): ?Collection
    {
        $doctors = Doctor::where('number_day_generate', '>', '0')->with('user')->get();
        return $doctors;
    }

}
