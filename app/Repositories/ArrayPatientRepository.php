<?php

namespace App\Repositories;

use App\Jobs\ProcessPacient;
use App\Models\Patient;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use App\Services\PatientService;
use Illuminate\Support\Facades\Cache;

class ArrayPatientRepository implements Interfaces\PatientRepositoryInterface
{
    public function __construct(private readonly PatientService $patientService)
    {
    }

    static array $storedData = [];
    public function getAll(): array
    {
        /*
         * Общий кеш закомменчен т.к. "задействовать кеш" можно трактовать по разному
         */
        //return Cache::remember('all_patients', 300, function () {
            $results = [];
            foreach (self::$storedData as $key => $patient) {
                $results[] = Cache::get($this->patientService->getCacheName($key),$patient);
            }
            return $results;
        //});
    }

    public function store(Patient $patient) : bool
    {
        self::$storedData[$this->patientService->getName($patient)] = $this->patientService->setAgeAndType($patient);
        Cache::add($this->patientService->getCacheName($patient), $patient, 300);
        ProcessPacient::dispatch($patient);
        return true;
    }
}
