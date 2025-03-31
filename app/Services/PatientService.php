<?php

namespace App\Services;

use App\Models\Patient;

class PatientService
{
    public function getName(Patient $patient): string
    {
        return $patient->first_name . $patient->last_name;
    }

    public function getCacheName(Patient|string $patient): string
    {
        return 'patient.' . is_string($patient) ? $patient : $this->getName($patient);
    }

    public function setAgeAndType(Patient $patient): Patient
    {
        /*
         * Дни и прочее на английском для человекочитаемости в консоли тестов
         */
        $interval = date_diff(date_create($patient->birthdate),date_create());
        if($interval->y)
        {
            $patient->age = $interval->y;
            $patient->age_type = 'год';
        }elseif ($interval->m)
        {
            $patient->age = $interval->m;
            $patient->age_type = 'месяц';
        }elseif ($interval->d)
        {
            $patient->age = $interval->d;
            $patient->age_type = 'день';
        }
        return $patient;
    }
}
