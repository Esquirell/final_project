<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Service\DoctorServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * @var DoctorServiceInterface
     */
    private $doctorService;

    /**
     * MainController constructor.
     * @param DoctorServiceInterface $doctorService
     */
    public function __construct(DoctorServiceInterface $doctorService)
    {
        $this->doctorService = $doctorService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $doctors = $this->doctorService->getAllDoctors();
        return view('main', compact('doctors'));
    }
}
