<?php

namespace App\Contracts;

use App\Employee;

interface IPersonalDataSheet
{

    public function getPersonalInformation(string $employeeID);
    public function updatePersonalInformation(array $data = [], $employeeID): Employee;

    public function updateChildren(array $children = [], string $employeeID);

    public function getFamilyBackground(string $employeeID);
    public function updateFamilyBackground(array $data = []): array;

    public function getEducationalBackground(string $employeeID);
    public function updateEducationalBackground(array $data = [], $employeeID): array;

    public function getCivilServiceEligibility(string $employeeID);
    public function updateCivilService(array $data = [], string $employeeID): array;

    public function getWorkExperience(string $employeeID);
    public function updateWorkExperience(array $data = [], $employeeID): array;

    public function getVoluntaryWork(string $employeeID);
    public function updateVoluntary(array $data = [], $employeeID): array;

    public function getLearningAndDevelopment(string $employeeID);
    public function updateLearningAndDevelopment(array $data = [], $employeeID): array;

    public function getOtherInformation(string $employeeID);
    public function updateOtherInformation(array $data = [], $employeeID): array;

    public function getRelevantQueries(string $employeeID);
    public function updateRelevantQuery(array $data = [], $employeeID): array;

    public function getReferences(string $employeeID);
    public function updateReferences(array $data = [], $employeeID): array;

    public function getGovernmentIssuedID(string $employeeID);
    public function updateGovernmentIssuedID(array $data = [], $employeeID): array;
}
