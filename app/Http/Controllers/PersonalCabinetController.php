<?php

namespace App\Http\Controllers;

use App\Service\DoctorServiceInterface;
use App\Service\PDFServiceInterface;
use App\Service\RecordServiceInterface;
use App\Service\ScheduleServiceInterface;
use App\Service\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalCabinetController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    private $userService;
    /**
     * @var DoctorServiceInterface
     */
    private $doctorService;
    /**
     * @var RecordServiceInterface
     */
    private $recordService;
    /**
     * @var ScheduleServiceInterface
     */
    private $scheduleService;
    /**
     * @var PDFServiceInterface
     */
    private $PDFService;
    /**
     * PersonalCabinetController constructor.
     * @param UserServiceInterface $userService
     * @param DoctorServiceInterface $doctorService
     * @param RecordServiceInterface $recordService
     * @param ScheduleServiceInterface $scheduleService
     */
    public function __construct(UserServiceInterface $userService, DoctorServiceInterface $doctorService, RecordServiceInterface $recordService, ScheduleServiceInterface $scheduleService, PDFServiceInterface $PDFService)
    {
        $this->userService = $userService;
        $this->doctorService = $doctorService;
        $this->recordService = $recordService;
        $this->scheduleService = $scheduleService;
        $this->PDFService = $PDFService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (!$this->userService->isDoctor(Auth::user())) {
            $user = Auth::user();
            return view('personal-cabinet.index-user', compact('user'));
        }
        $doctor = Auth::user()->doctor()->first();
        $user = Auth::user();
        $doctorDays = json_decode($doctor->work_days);
        $doctorMinTime = min(json_decode($doctor->work_time));
        $doctorMaxTime = max(json_decode($doctor->work_time));
        $doctorDescription = $doctor->description;
        return view('personal-cabinet.index-doctor', compact('user', 'doctorDays', 'doctorMinTime', 'doctorMaxTime', 'doctorDescription'));
    }

    /**
     * Создать расписание
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function generateSchedule()
    {
        $user = Auth::user();
        $doctor = $this->doctorService->getDoctorByUser($user);
        $this->scheduleService->generateSchedule($doctor);
        \Session::flash('flash_message', 'Расписание создано!');
        return redirect(route('personal-cabinet'));
    }

    /**
     * Обновить инфу о докторе
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateInfoAboutDoctor(Request $request)
    {
        $this->userService->updateInfoABoutUser($request);
        $this->doctorService->updateInfoAboutDoctor($request);
        \Session::flash('flash_message', 'Изменения сохранены!');
        return redirect(route('personal-cabinet'));
    }

    /**
     * Обновить инфу о юзере
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateInfoAboutUser(Request $request)
    {
        $this->userService->updateInfoABoutUser($request);
        \Session::flash('flash_message', 'Изменения сохранены!');
        return redirect(route('personal-cabinet'));
    }

    /**
     * Показать записи
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexRecords()
    {
        $records = $this->giveRecordsForRole();
        return view('personal-cabinet.records', compact('records'));
    }


    public function indexSchedule()
    {
        $user = Auth::user();
        $schedules = $this->scheduleService->getSchedule($user);
        return view('personal-cabinet.schedule', compact('schedules'));
    }

    /**
     * Показать запись
     * Проверка доступа юзера к записи
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRecord($url)
    {
        $record = $this->recordService->showRecord($url);
        if (Auth::user()->id !== $record->user_id AND Auth::user()->id !== $record->doctor()->first()->user()->first()->id) {
            return abort(403);
        }
        return view('personal-cabinet.show-record', compact('record'));
    }

    /**
     * Обновить аватар
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAvatar(Request $request)
    {
        $this->userService->updateAvatar($request);
        \Session::flash('flash_message', 'Аватар изменен!');
        return redirect(route('personal-cabinet'));
    }


    public function pdf($id)
    {
        $this->PDFService->makePDF($id);
    }

    /**
     * Проверка роли и получение записей
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    private function giveRecordsForRole()
    {
        $user = Auth::user();
        if (in_array('doctor', json_decode($user->role))) {
            return $this->recordService->getRecordsForDoctor($user);

        }
        elseif (in_array('user', json_decode($user->role))) {
            return $this->recordService->getRecordsForUser($user);
        }
    }


}
