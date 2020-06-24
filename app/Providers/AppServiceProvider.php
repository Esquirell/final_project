<?php

namespace App\Providers;

use App\Repository\DoctorRepository;
use App\Repository\DoctorRepositoryInterface;
use App\Repository\RecordRepository;
use App\Repository\RecordRepositoryInterface;
use App\Repository\ScheduleRepository;
use App\Repository\ScheduleRepositoryInterface;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;
use App\Service\DoctorService;
use App\Service\DoctorServiceInterface;
use App\Service\PDFService;
use App\Service\PDFServiceInterface;
use App\Service\RecordService;
use App\Service\RecordServiceInterface;
use App\Service\ScheduleService;
use App\Service\ScheduleServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DoctorServiceInterface::class, DoctorService::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RecordRepositoryInterface::class, RecordRepository::class);
        $this->app->bind(RecordServiceInterface::class, RecordService::class);
        $this->app->bind(ScheduleServiceInterface::class, ScheduleService::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(PDFServiceInterface::class, PDFService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function($expression) {
            return in_array($expression, json_decode(Auth::user()->role));
        });
    }
}
