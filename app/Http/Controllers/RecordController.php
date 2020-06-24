<?php

namespace App\Http\Controllers;


use App\Service\DoctorServiceInterface;
use App\Service\RecordServiceInterface;
use App\Service\ScheduleServiceInterface;
use Illuminate\Http\Request;


class RecordController extends Controller
{

    /**
     * @var DoctorServiceInterface
     */
    private $doctorService;
    /**
     * @var ScheduleServiceInterface
     */
    private $scheduleService;
    /**
     * @var RecordServiceInterface
     */
    private $recordService;

    /**
     * RecordController constructor.
     * @param DoctorServiceInterface $doctorService
     * @param ScheduleServiceInterface $scheduleService
     * @param RecordServiceInterface $recordService
     */
    public function __construct(DoctorServiceInterface $doctorService, ScheduleServiceInterface $scheduleService, RecordServiceInterface $recordService)
    {
        $this->doctorService = $doctorService;
        $this->scheduleService = $scheduleService;
        $this->recordService = $recordService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $doctors = $this->doctorService->getDoctorsWithSchedule();
        return view('record.index', compact('doctors'));
    }

    /**
     * Запрос на получение рабочих дней
     * @param Request $request
     * @return array|null
     */
    public function queryDays(Request $request)
    {
        return $this->scheduleService->getAvailableDays($request);
    }

    /**
     * Запрос на получение рабочего времени
     * @param Request $request
     * @return array|null
     */
    public function queryTime(Request $request)
    {
        return $this->scheduleService->getAvailableTimes($request);
    }

    /**
     * Добавить запись
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request)
    {
        $this->recordService->addRecord($request);
        \Session::flash('flash_message', 'Вы успешно записались к врачу!');
        return redirect(route('record'));
    }
}
