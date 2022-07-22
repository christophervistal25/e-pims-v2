<?php

namespace App\Http\Repositories;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class BirthdayRepository
{
    private $currentDate;

    private $tomorrowDate;

    private $currentDatePlusOneWeek;

    public function __construct()
    {
        $this->currentDate = Carbon::now();
        $this->tomorrowDate = ($this->currentDate->copy())->addDay(1);
        $this->currentDatePlusOneWeek = ($this->currentDate->copy())->addDay(7);
    }

    public function birthdaysToday(): Collection
    {
        return Employee::where('birthdate', 'like', '%'.$this->currentDate->format('m-d').'%')
                        ->get(['employee_id', 'firstname', 'middlename', 'lastname', 'suffix', 'Birthdate']);
    }

    public function birthdaysTomorrow(): Collection
    {
        return Employee::where('birthdate', 'like', '%'.$this->tomorrowDate->format('m-d').'%')
                            ->get(['employee_id', 'firstname', 'middlename', 'lastname', 'Suffix', 'birthdate']);
    }

    public function weekBeforeBirthdays(string $from = null, string $to = null): Collection
    {
        $from = is_null($from) ? $this->currentDate : Carbon::parse($from);
        $to = is_null($to) ? $this->currentDatePlusOneWeek : Carbon::parse($to);

        return $this->getByRange($from, $to);
    }

    private function getByRange(Carbon $from, Carbon $to): Collection
    {
    }
}
