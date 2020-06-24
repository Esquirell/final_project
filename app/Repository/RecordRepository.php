<?php

namespace App\Repository;

use App\Models\Schedule;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordRepository implements RecordRepositoryInterface
{
    /**
     * Найти все записи
     * @return LengthAwarePaginator
     */
    public function findAllRecords(): LengthAwarePaginator
    {
        return Record::with('doctor.user', 'user')->paginate(5);
    }

    /**
     * Найти записи для врача
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function findRecordsForDoctor(User $user): ?LengthAwarePaginator
    {
        return $user->doctor()->first()->records()->with('user')->paginate(5);
    }

    /**
     * Найти записи для юзера
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function findRecordsForUser(User $user): ?LengthAwarePaginator
    {
        return $user->records()->with('doctor.user', 'user')->paginate(5);
    }

    /**
     * Удалить запись
     * @param $id
     */
    public function deleteRecord($id): void
    {
        $record = Record::findOrFail($id);
        $record->delete();
    }

    /**
     * Показать запись
     * @param $url
     * @return Record|null
     */
    public function showRecord($url): ?Record
    {
        return Record::where('url', $url)->with('doctor.user', 'user')->firstOrFail();
    }

    /**
     * Добавить запись
     * @param Request $request
     */
    public function addRecord(Request $request): void
    {
        $schedule = Schedule::where([
            ['reception', 'like', $request['date'] . '%'],
            ['reception', 'like', '%' . $request['time'] . '%'],
            ['doctor_id', $request['doctor']]
        ])->first();
        $record = new Record();
        $record->user_id = Auth::user()->id;
        $record->doctor_id = $schedule->doctor_id;
        $record->reception = $schedule->reception;
        $record->url = md5(microtime());
        $record->save();
        $schedule->delete();
    }
}
