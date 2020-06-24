<?php


namespace App\Service;




use App\Models\Doctor;
use App\Repository\DoctorRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class DoctorService implements DoctorServiceInterface
{
    /**
     * @var DoctorRepositoryInterface
     */
    private $doctorRepository;

    /**
     * DoctorService constructor.
     * @param DoctorRepositoryInterface $doctorRepository
     */
    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * Получить всех врачей
     * @return Collection|null
     */
    public function getAllDoctors(): ?Collection
    {
        return $this->doctorRepository->findAllDoctors();
    }

    /**
     * Назначить юзера врачом
     * @param User $user
     */
    public function addDoctor(User $user): void
    {
        $this->doctorRepository->addDoctor($user);
    }

    /**
     * Получить доктора по юзеру
     * @param User $user
     * @return Doctor|null
     */
    public function getDoctorByUser(User $user): ?Doctor
    {
        return $this->doctorRepository->findDoctorByUser($user);
    }

    /**
     * Обновить инфу о докторе
     * @param Request $request
     */
    public function updateInfoAboutDoctor(Request $request): void
    {
        $this->doctorRepository->updateInfoAboutDoctor($request);
    }

    /**
     * Получить врачей с созданным расписанием
     * @return Collection|null
     */
    public function getDoctorsWithSchedule(): ?Collection
    {
        return $this->doctorRepository->findDoctorsWithSchedule();
    }
    /**
     * Удалить доктора
     * @param User $user
     */
    public function deleteDoctor(User $user): void
    {
        $this->doctorRepository->deleteDoctor($user);
    }
}
