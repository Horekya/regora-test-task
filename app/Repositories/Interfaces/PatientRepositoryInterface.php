<?php
namespace App\Repositories\Interfaces;
use \App\Models\Patient;
interface PatientRepositoryInterface
{
    public function getAll();
    public function store(Patient $patient);
}
