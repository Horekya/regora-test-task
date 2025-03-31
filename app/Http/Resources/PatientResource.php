<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->first_name . ' ' . $this->last_name,
            'birthdate' => date('d.m.Y',strtotime($this->birthdate)),
            'age' => $this->age . ' ' . $this->age_type
        ];
    }
    public function jsonOptions()
    {
        return JSON_UNESCAPED_UNICODE;
    }
}
