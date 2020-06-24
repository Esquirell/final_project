<?php


namespace App\Service;


use App\Models\Record;
use App\Repository\RecordRepositoryInterface;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class RecordService implements RecordServiceInterface
{
    /**
     * @var RecordRepositoryInterface
     */
    private $recordRepository;

    /**
     * RecordService constructor.
     * @param RecordRepositoryInterface $recordRepository
     */
    public function __construct(RecordRepositoryInterface $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    /**
     * Получить все записи
     * @return LengthAwarePaginator|null
     */
    public function getAllRecords(): ?LengthAwarePaginator
    {
        return $this->recordRepository->findAllRecords();
    }

    /**
     * Получить записи для врача
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function getRecordsForDoctor(User $user): ?LengthAwarePaginator
    {
        return $this->recordRepository->findRecordsForDoctor($user);
    }

    /**
     * Показать запись
     * @param $url
     * @return Record|null
     */
    public function showRecord($url): ?Record
    {
        return $this->recordRepository->showRecord($url);
    }

    /**
     * Получить записи для юзера
     * @param User $user
     * @return LengthAwarePaginator|null
     */
    public function getRecordsForUser(User $user): ?LengthAwarePaginator
    {
        return $this->recordRepository->findRecordsForUser($user);
    }

    /**
     * Удалить запись
     * @param $id
     */
    public function deleteRecord($id): void
    {
        $this->recordRepository->deleteRecord($id);
    }


    /**
     * Добавить запись
     * @param Request $request
     */
    public function addRecord(Request $request): void
    {
        $this->recordRepository->addRecord($request);
    }

}
