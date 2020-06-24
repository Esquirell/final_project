<?php

namespace App\Http\Controllers;

use App\Service\DoctorServiceInterface;
use App\Service\RecordServiceInterface;
use App\Service\UserServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * AdminController constructor.
     * @param UserServiceInterface $userService
     * @param DoctorServiceInterface $doctorService
     * @param RecordServiceInterface $recordService
     */
    public function __construct(UserServiceInterface $userService, DoctorServiceInterface $doctorService, RecordServiceInterface $recordService)
    {
        $this->userService = $userService;
        $this->doctorService = $doctorService;
        $this->recordService = $recordService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Добавить доктора
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addDoctor(Request $request)
    {
        $user = $this->userService->getUserByEmail($request['user_email']);
        if ($this->userService->isDoctor($user)) {
            \Session::flash('flash_message', 'Данный пользователь уже врач!');
            return redirect(route('admin-panel'));
        }
        $this->userService->addRoleDoctor($user);
        $this->doctorService->addDoctor($user);
        \Session::flash('flash_message', 'Врач успешно добавлен!');
        return redirect(route('admin-panel'));
    }


    /**
     * Удалить доктора
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteDoctor(Request $request)
    {
        $user = $this->userService->getUserByEmail($request['user_email']);
        if (!$this->userService->isDoctor($user)) {
            \Session::flash('flash_message', 'Данный пользователь не врач!');
            return redirect(route('admin-panel'));
        }
        $this->userService->deleteRoleDoctor($user);
        $this->doctorService->deleteDoctor($user);
        \Session::flash('flash_message', 'Врач успешно удален!');
        return redirect(route('admin-panel'));
    }

    /**
     * Показать записи
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexRecords()
    {
        $records = $this->recordService->getAllRecords();
        return view('admin.records', compact('records'));
    }

    /**
     * Удалить запись
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteRecord($id)
    {
        $this->recordService->deleteRecord($id);
        \Session::flash('flash_message', 'Запись успешно удалена!');
        return redirect(route('admin-panel.indexRecords'));
    }

}
