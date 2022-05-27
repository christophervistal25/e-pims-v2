<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Repositories\PersonalDataSheetRepository;
use Illuminate\Database\Eloquent\Collection;

use App\Http\Requests\{ // <FormRequests>
    C1\PersonalInformationRequest,
    C1\EducationalBackgroundRequest,
    C1\FamilyBackgroundRequest,
    C2\WorkExperienceRequest,
    C2\CivilServiceRequest,
    C3\LearningRequest,
    C3\VoluntaryWorkRequest,
    C4\ReferenceRequest,
    C4\RelevantQueriesRequest,
    C4\GovernmentIssuedIDRequest,
};
use App\{ // <Models>
    Employee,
    EmployeeIssuedID,
    EmployeeReference,
    EmployeeCivilService,
    EmployeeRelevantQuery,
    EmployeeVoluntaryWork,
    EmployeeWorkExperience,
    EmployeeFamilyBackground,
    EmployeeOtherInformation,
    EmployeeTrainingAttained,
    EmployeeEducationalBackground,
};

class PersonalDataSheetController extends Controller
{
    public function __construct(public PersonalDataSheetRepository $personalDataSheetRepository)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $idNumber)
    {
        [$idNumber] = (new Hashids())->decode($idNumber);
        return view('employee.personal-data-sheet.edit')->with('employeeID', $idNumber);
    }

    public function getPersonalInformation(string $employeeID): Employee|array|null
    {
        return $this->personalDataSheetRepository->getPersonalInformation($employeeID);
    }
    /**
     * Store person information in storage.
     */
    public function updatePersonalInformation(PersonalInformationRequest $request, $employeeID)
    {
        return $this->personalDataSheetRepository->updatePersonalInformation($request->all(), $employeeID);
    }

    public function getFamilyBackground(string $employeeID): EmployeeFamilyBackground|array|null
    {
        return $this->personalDataSheetRepository->getFamilyBackground($employeeID);
    }

    public function updateFamilyBackground(FamilyBackgroundRequest $request)
    {
        return $this->personalDataSheetRepository
            ->updateChildren($request->spouse, $request->employee_id)
            ->updateFamilyBackground($request->all());
    }

    public function getEducationalBackground(string $employeeID): EmployeeEducationalBackground|array|string
    {
        return $this->personalDataSheetRepository->getEducationalBackground($employeeID);
    }

    public function updateEducationalBackground(EducationalBackgroundRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateEducationalBackground($request->all(), $employeeID);
    }

    public function getCivilServiceEligibility(string $idNumber): Collection|array
    {
        return $this->personalDataSheetRepository->getCivilServiceEligibility($idNumber);
    }

    public function updateCivilServiceEligibility(CivilServiceRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateCivilService($request->all(), $idNumber);
    }

    public function getWorkExperience(string $idNumber)
    {
        return $this->personalDataSheetRepository->getWorkExperience($idNumber);
    }

    public function updateWorkExperience(WorkExperienceRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateWorkExperience($request->all(), $idNumber);
    }

    public function getVoluntaryWork(string $idNumber)
    {
        return $this->personalDataSheetRepository->getVoluntaryWork($idNumber);
    }

    public function updateVoluntaryWork(VoluntaryWorkRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateVoluntary($request->all(), $idNumber);
    }

    public function getLearningAndDevelopment(string $idNumber)
    {
        return $this->personalDataSheetRepository->getLearningAndDevelopment($idNumber);
    }

    public function updateLearningAndDevelopment(LearningRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateLearningAndDevelopment($request->all(), $idNumber);
    }

    public function getOtherInformation(string $idNumber)
    {
        return $this->personalDataSheetRepository->getOtherInformation($idNumber);
    }

    public function updateOtherInformation(Request $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateOtherInformation($request->all(), $idNumber);
    }

    public function getRelevantQueries(string $employeeID)
    {
        return $this->personalDataSheetRepository->getRelevantQueries($employeeID);
    }

    public function updateRelevantQueries(RelevantQueriesRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateRelevantQuery($request->all(), $employeeID);
    }

    public function getReferences(string $employeeID)
    {
        return $this->personalDataSheetRepository->getReferences($employeeID);
    }

    public function updateReferences(ReferenceRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateReferences($request->all(), $employeeID);
    }

    public function getGovernmentIssuedID(string $employeeID)
    {
        return $this->personalDataSheetRepository->getGovernmentIssuedID($employeeID);
    }

    public function updateGovernmentIssuedID(GovernmentIssuedIDRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateGovernmentIssuedID($request->all(), $employeeID);
    }
}
