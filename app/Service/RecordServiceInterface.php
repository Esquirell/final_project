<?php


namespace App\Service;


use App\Models\Record;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface RecordServiceInterface
{
    /**
     * Получить все записи
     * @return LengthAwarePaginator|null
     */
    public function getAllRecords(): ?LengthAwarePaginator;

    /**
     * Получить записи для доктора
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function getRecordsForDoctor(User $user): ?LengthAwarePaginator;

    /**
     * Получить записи для юзера
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function getRecordsForUser(User $user): ?LengthAwarePaginator;

    /**
     * Удалить запись
     * @param $id
     */
    public function deleteRecord($id): void;

    /**
     * Показать запись
     * @param $url
     * @return Record|null
     */
    public function showRecord($url): ?Record;

    /**
     * Добавить запись
     * @param Request $request
     */
    public function addRecord(Request $request): void;
}
