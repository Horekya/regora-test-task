<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PatientController extends Controller
{
    public function __construct(private PatientRepositoryInterface $patientRepository)
    {
    }

    public function create(Request $request)
    {
        $newPatient = new Patient();
        $newPatient->fill($request->all());
        $this->patientRepository->store($newPatient);
        return view('success');
    }

    public function index(Request $request ): AnonymousResourceCollection
    {
        return PatientResource::collection($this->patientRepository->getAll());
    }
}
