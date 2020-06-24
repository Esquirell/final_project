<?php


namespace App\Repository;


use App\Models\Record;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface RecordRepositoryInterface
{
    /**
     * Найти все записи
     * @return LengthAwarePaginator|null
     */
    public function findAllRecords(): ?LengthAwarePaginator;

    /**
     * Найти записи для врача
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function findRecordsForDoctor(User $user): ?LengthAwarePaginator;

    /**
     * Найти записи для юзера
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function findRecordsForUser(User $user): ?LengthAwarePaginator;

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
