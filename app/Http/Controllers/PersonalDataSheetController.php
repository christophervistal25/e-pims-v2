<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeEducationalBackground;
use App\EmployeeFamilyBackground;
use App\Http\Repositories\PersonalDataSheetRepository;
use App\Http\Requests\C1\EducationalBackgroundRequest;
use App\Http\Requests\C1\FamilyBackgroundRequest;
use App\Http\Requests\C1\PersonalInformationRequest;
use App\Http\Requests\C2\CivilServiceRequest;
use App\Http\Requests\C2\WorkExperienceRequest;
use App\Http\Requests\C3\LearningRequest;
use App\Http\Requests\C3\VoluntaryWorkRequest;
use App\Http\Requests\C4\GovernmentIssuedIDRequest;
use App\Http\Requests\C4\ReferenceRequest;
use App\Http\Requests\C4\RelevantQueriesRequest;
use Hashids\Hashids;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PersonalDataSheetController extends Controller
{
    public function __construct(public PersonalDataSheetRepository $personalDataSheetRepository)
    {
    }

    /**
     * It takes a string as a parameter, decodes it, and returns a view with the decoded string as a
     * parameter
     *
     * @param string idNumber the id of the employee
     */
    public function edit(string $idNumber)
    {
        [$idNumber] = (new Hashids())->decode($idNumber);

        return view('employee.personal-data-sheet.edit')->with('employeeID', $idNumber);
    }

    /**
     * It returns an Employee object, an array, or null
     *
     * @param string employeeID The employee ID of the employee whose personal information you want to
     * get.
     * @return Employee|array|null An Employee object or an array or null.
     */
    public function getPersonalInformation(string $employeeID): Employee|array|null
    {
        return $this->personalDataSheetRepository->getPersonalInformation($employeeID);
    }

    /**
     * It updates the personal information of an employee
     *
     * @param PersonalInformationRequest request the request object
     * @param employeeID the id of the employee
     */
    public function updatePersonalInformation(PersonalInformationRequest $request, $employeeID)
    {
        return $this->personalDataSheetRepository->updatePersonalInformation($request->all(), $employeeID);
    }

    /**
     * It returns an array of EmployeeFamilyBackground objects or an empty array if the employee has no
     * family background
     *
     * @param string employeeID
     * @return EmployeeFamilyBackground|array|null an array of EmployeeFamilyBackground objects.
     */
    public function getFamilyBackground(string $employeeID): EmployeeFamilyBackground|array|null
    {
        return $this->personalDataSheetRepository->getFamilyBackground($employeeID) ?? [];
    }

    /**
     * It updates the spouse's children and then updates the family background
     *
     * @param FamilyBackgroundRequest request the request object
     */
    public function updateFamilyBackground(FamilyBackgroundRequest $request)
    {
        return $this->personalDataSheetRepository
            ->updateChildren($request->spouse, $request->employee_id)
            ->updateFamilyBackground($request->all());
    }

    /**
     * It returns an object of type EmployeeEducationalBackground or an array or a string
     *
     * @param string employeeID The employee ID of the employee whose educational background you want to
     * get.
     */
    public function getEducationalBackground(string $employeeID): EmployeeEducationalBackground|array|string
    {
        return $this->personalDataSheetRepository->getEducationalBackground($employeeID);
    }

    /**
     * It updates the educational background of an employee
     *
     * @param EducationalBackgroundRequest request the request object
     * @param string employeeID the employee's ID
     *
     * PersonalDataSheetRepository class.
     */
    public function updateEducationalBackground(EducationalBackgroundRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateEducationalBackground($request->all(), $employeeID);
    }

    /**
     * It returns a collection of civil service eligibility data from the database
     *
     * @param string idNumber The ID number of the employee
     * @return Collection|array A collection of data from the database.
     */
    public function getCivilServiceEligibility(string $idNumber): Collection|array
    {
        return $this->personalDataSheetRepository->getCivilServiceEligibility($idNumber);
    }

    /**
     * It updates the civil service eligibility of a user
     *
     * @param CivilServiceRequest request the request object
     * @param string idNumber the id number of the user
     */
    public function updateCivilServiceEligibility(CivilServiceRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateCivilService($request->all(), $idNumber);
    }

    /**
     * It gets the work experience of a person
     *
     * @param string idNumber The id number of the employee
     */
    public function getWorkExperience(string $idNumber)
    {
        return $this->personalDataSheetRepository->getWorkExperience($idNumber);
    }

    /**
     * It updates the work experience of a user
     *
     * @param WorkExperienceRequest request the request object
     * @param string idNumber the id number of the user
     */
    public function updateWorkExperience(WorkExperienceRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateWorkExperience($request->all(), $idNumber);
    }

    /**
     * It gets the voluntary work of a person
     *
     * @param string idNumber The id number of the user
     */
    public function getVoluntaryWork(string $idNumber)
    {
        return $this->personalDataSheetRepository->getVoluntaryWork($idNumber);
    }

    /**
     * It updates the voluntary work of a user
     *
     * @param VoluntaryWorkRequest request the request object
     * @param string idNumber the id number of the user
     */
    public function updateVoluntaryWork(VoluntaryWorkRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateVoluntary($request->all(), $idNumber);
    }

    /**
     * It gets the learning and development of a specific employee
     *
     * @param string idNumber The id number of the employee
     */
    public function getLearningAndDevelopment(string $idNumber)
    {
        return $this->personalDataSheetRepository->getLearningAndDevelopment($idNumber);
    }

    /**
     * It updates the learning and development of the employee
     *
     * @param LearningRequest request the request object
     * @param string idNumber the id number of the employee
     */
    public function updateLearningAndDevelopment(LearningRequest $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateLearningAndDevelopment($request->all(), $idNumber);
    }

    /**
     * It gets the other information of a person
     *
     * @param string idNumber The id number of the employee
     */
    public function getOtherInformation(string $idNumber)
    {
        return $this->personalDataSheetRepository->getOtherInformation($idNumber);
    }

    /**
     * It updates the other information of the employee
     *
     * @param Request request The request object
     * @param string idNumber The id number of the user
     */
    public function updateOtherInformation(Request $request, string $idNumber)
    {
        return $this->personalDataSheetRepository->updateOtherInformation($request->all(), $idNumber);
    }

    /**
     * It returns the relevant queries of an employee
     *
     * @param string employeeID The employee's ID
     */
    public function getRelevantQueries(string $employeeID)
    {
        return $this->personalDataSheetRepository->getRelevantQueries($employeeID);
    }

    /**
     * It updates the relevant queries of an employee
     *
     * @param RelevantQueriesRequest request
     * @param string employeeID The employee's ID
     */
    public function updateRelevantQueries(RelevantQueriesRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateRelevantQuery($request->all(), $employeeID);
    }

    /**
     * It gets the references of an employee
     *
     * @param string employeeID The employee's ID
     */
    public function getReferences(string $employeeID)
    {
        return $this->personalDataSheetRepository->getReferences($employeeID);
    }

    /**
     * It updates the references of an employee
     *
     * @param ReferenceRequest request This is the request object that contains the data that you want
     * to update.
     * @param string employeeID the employee's ID
     */
    public function updateReferences(ReferenceRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateReferences($request->all(), $employeeID);
    }

    /**
     * It returns the government issued ID of an employee
     *
     * @param string employeeID The employee ID of the employee whose government issued ID you want to
     * get.
     */
    public function getGovernmentIssuedID(string $employeeID)
    {
        return $this->personalDataSheetRepository->getGovernmentIssuedID($employeeID);
    }

    /**
     * It updates the government issued ID of an employee
     *
     * @param GovernmentIssuedIDRequest request The request object
     * @param string employeeID the employee's ID
     */
    public function updateGovernmentIssuedID(GovernmentIssuedIDRequest $request, string $employeeID)
    {
        return $this->personalDataSheetRepository->updateGovernmentIssuedID($request->all(), $employeeID);
    }
}
