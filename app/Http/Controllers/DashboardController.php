<?php

namespace App\Http\Controllers;

use App\Employee;
use App\PlantillaSchedule;
use Illuminate\Support\Facades\Cache;
use App\Http\Repositories\BirthdayRepository;

class DashboardController extends Controller
{
    public function __construct(BirthdayRepository $birthdayRepository)
    {
        $this->birthdayRepository = $birthdayRepository;
    }
    public function index()
    {
        $today = $this->birthdayRepository->birthdaysToday();
        $tomorrow = $this->birthdayRepository->birthdaysTomorrow();
        $oneWeekBeforeBirthdays = $this->birthdayRepository->weekBeforeBirthdays();        
        
        $no_of_regular = Employee::whereHas('status', function ($query) {
            $query->whereIn('stat_code', ['0001','0008']);
        })->count();

        $no_of_jobOrder = Employee::whereHas('status', function ($query) {
            $query->whereIn('stat_code', ['0002','0003','0004','0005','0006','0007','0009','0010']);
        })->count();

        $no_of_promoted = Employee::whereHas('step', function ($query) {
            $query->whereYear('date_step_increment', date("Y"));
        })->count();

        $no_of_promoted_prev = Employee::whereHas('step', function ($query) {
            $query->whereYear('date_step_increment', date("Y")-1);
        })->count();

        $no_of_active = Employee::where('active_status', 'active')->count();

        $no_of_inactive = Employee::where('active_status', 'in-active')->count();

        $on_going_leave = Employee::whereHas('leave_files', function ($query) {
            $query->where('approved_status', 'on-going');
        })->count();

        // $plantillas = Employee::whereHas('plantilla', function ($query) {
        //     $query->where('year', date("Y"));
        // })->count();


        $plantillas = Cache::rememberForever('employees_dashboard', function () {
            return Employee::whereHas('plantilla', function ($query) {
                $query->where('year', date("Y"));
            })->count();
        });


        $eligible = Employee::whereHas('civil_service')->count(); 

        $allEmployees = Employee::count();

        $yearlyJobOrder = PlantillaSchedule::whereHas('employee', function ($query) {
            $query->whereIn('status', ['2','3','4','5','6','7','8','10']);
        })->get()->sortByDesc('year')->groupBy('year');

        $yearlyRegular = PlantillaSchedule::whereHas('employee', function ($query) {
            $query->whereIn('status', ['1','8']);
        })->get()->sortByDesc('year')->groupBy('year');

        $yearlyJo = [];
        $yearlyReg = [];
        
        foreach($yearlyJobOrder as $jyear => $jrecords){
            foreach($yearlyRegular as $ryear => $rrecords){
                $yearlyJo[$jyear] = $jrecords->count();
                $yearlyReg[$ryear] = $rrecords->count();                
            }
        }
        
        // dd(array_keys($yearlyJo), array_values($yearlyJo), array_values($yearly_reg));

        return view('blank-page', compact(  'today', 'tomorrow', 
                                            'oneWeekBeforeBirthdays', 'no_of_regular', 
                                            'no_of_jobOrder', 'allEmployees', 
                                            'no_of_promoted', 'no_of_promoted_prev', 
                                            'no_of_active', 'no_of_inactive',
                                            'on_going_leave', 'plantillas', 'eligible', 'yearlyJo', 'yearlyReg'
                                        ));   
    }
    

}
