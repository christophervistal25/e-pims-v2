<?php

namespace App\Traits;

trait PersonalDataSheetCellPrint
{
    public static function personalInformationCells(): array
    {
        return [
            'D10' => 'lastname',
            'D11' => 'firstname',
            'D12' => 'middlename',
            'L11' => 'extension',
            'D13' => 'date_birth',
            'J13' => 'citizenship',
            'D15' => 'place_birth',
            'D17' => 'civil_satus',
            'D16' => 'sex',
            'D22' => 'height',
            'D24' => 'weight',
            'D25' => 'blood_type',
            'D27' => 'gsis_id_no',
            'D29' => 'pag_ibig_no',
            'D31' => 'philhealth_no',
            'D32' => 'sss_no',
            'D33' => 'tin_no',
            'D34' => 'agency_employee_no',
            'I32' => 'telephone_no',
            'I33' => 'mobile_no',
            'I34' => 'email_address',
            'I17' => 'residential_house_no',
            'L17' => 'residential_street',
            'I19' => 'residential_village',
            'L19' => 'residential_barangay_text',
            'I22' => 'residential_city_text',
            'L22' => 'residential_province_text',
            'I24' => 'residential_zip_code',
            'I25' => 'permanent_house_no',
            'L25' => 'permanent_street',
            'I27' => 'permanent_village',
            'L27' => 'permanent_barangay_text',
            'I29' => 'permanent_city_text',
            'L29' => 'permanent_province_text',
            'I31' => 'permanent_zip_code',
        ];
    }

    public static function familyBackgroundCells(): array
    {
        return [
            'relation_type' => 'one_to_one',
            'relation' => 'family_background',
            'cells' => [
                'D36' => 'spouse_lastname',
                'D37' => 'spouse_firstname',
                'D38' => 'spouse_middlename',
                'D39' => 'spouse_occupation',
                'D40' => 'spouse_employer_business_name',
                'D41' => 'spouse_business_address',
                'D42' => 'spouse_telephone_number',
                'D43' => 'father_lastname',
                'D44' => 'father_firstname',
                'D45' => 'father_middlename',
                'D46' => 'mother_maidenname',
                'D47' => 'mother_lastname',
                'D48' => 'mother_firstname',
                'D49' => 'mother_middlename',
                'G44' => 'father_extension',
                'G37' => 'spouse_extension',
            ],
        ];
    }

    public static function spouseChildsCells(): array
    {
        return [
            'relation_type' => 'one_to_many',
            'relation' => 'spouse_child',
            'options' => [
                'max_row' => 2,
                'max_column' => 11,
            ],
            'cells' => [
                'letters' => ['I', 'M'],
                'from' => 37,
                'to' => 48,
                'columns' => [
                    'name',
                    'date_of_birth',
                ],
            ],
        ];
    }

    public static function educationalBackground(): array
    {
        return [
            'relation_type' => 'one_to_one',
            'relation' => 'educational_background',
            'cells' => [
                'D54' => 'elementary_name',
                'G54' => 'elementary_education',
                'J54' => 'elementary_period_from',
                'K54' => 'elementary_period_to',
                'L54' => 'elementary_highest_level_units_earned',
                'M54' => 'elementary_year_graduated',
                'N54' => 'elementary_scholarship',

                'D55' => 'secondary_name',
                'G55' => 'secondary_education',
                'J55' => 'secondary_period_from',
                'K55' => 'secondary_period_to',
                'L55' => 'secondary_highest_level_units_earned',
                'M55' => 'secondary_year_graduated',
                'N55' => 'secondary_scholarship',

                'D56' => 'vocational_trade_course_name',
                'G56' => 'vocational_education',
                'J56' => 'vocational_trade_course_period_from',
                'K56' => 'vocational_trade_course_period_to',
                'L56' => 'vocational_trade_course_highest_level_units_earned',
                'M56' => 'vocational_trade_course_year_graduated',
                'N56' => 'vocational_trade_course_scholarship',

                'D57' => 'college_name',
                'G57' => 'college_education',
                'J57' => 'college_period_from',
                'K57' => 'college_period_to',
                'L57' => 'college_highest_level_units_earned',
                'M57' => 'college_year_graduated',
                'N57' => 'college_scholarship',

                'D58' => 'graduate_studies_name',
                'G58' => 'graduate_studies_education',
                'J58' => 'graduate_studies_period_from',
                'K58' => 'graduate_studies_period_to',
                'L58' => 'graduate_studies_highest_level_units_earned',
                'M58' => 'graduate_studies_year_graduated',
                'N58' => 'graduate_studies_scholarship',
            ],
        ];
    }

    public static function civilServiceEgibility(): array
    {
        return [
            'relation_type' => 'one_to_many',
            'relation' => 'civil_service',
            'options' => [
                'max_row' => 6,
                'max_column' => 7,
            ],
            'cells' => [
                'letters' => ['A', 'F', 'G', 'I', 'L', 'M'],
                'from' => 5,
                'to' => 11,
                'columns' => [
                    'career_service',
                    'rating',
                    'date_of_examination',
                    'place_of_examination',
                    'license_number',
                    'date_of_validitiy',
                ],
            ],
        ];
    }

    public static function workExperience(): array
    {
        return [
            'relation_type' => 'one_to_many',
            'relation' => 'work_experience',
            'options' => [
                'max_row' => 8,
                'max_column' => 28,
            ],
            'cells' => [
                'letters' => ['A', 'C', 'D', 'G', 'J', 'K', 'L', 'M'],
                'from' => 18,
                'to' => 45,
                'columns' => [
                    'from',
                    'to',
                    'position_title',
                    'office',
                    'monthly_salary',
                    'salary_job_pay_grade',
                    'status_of_appointment',
                    'government_service',
                ],
            ],
        ];
    }

    public static function voluntaryWork(): array
    {
        return [
            'relation_type' => 'one_to_many',
            'relation' => 'voluntary_work',
            'options' => [
                'max_row' => 5,
                'max_column' => 6,
            ],
            'cells' => [
                'letters' => ['A', 'E', 'F', 'G', 'H'],
                'from' => 6,
                'to' => 12,
                'columns' => [
                    'name_and_address',
                    'inclusive_date_from',
                    'inclusive_date_to',
                    'no_of_hours',
                    'position',
                ],
            ],
        ];
    }

    public static function learningAndDevelopment(): array
    {
        return [
            'relation_type' => 'one_to_many',
            'relation' => 'program_attained',
            'options' => [
                'max_row' => 6,
                'max_column' => 17,
            ],
            'cells' => [
                'letters' => ['A', 'E', 'F', 'G', 'H', 'I'],
                'from' => 19,
                'to' => 35,
                'columns' => [
                    'title',
                    'date_of_attendance_from',
                    'date_of_attendance_to',
                    'number_of_hours',
                    'type_of_id',
                    'sponsored_by',
                ],
            ],
        ];
    }

    public static function otherInformation(): array
    {
        return [
            'relation_type' => 'one_to_many',
            'relation' => 'other_information',
            'options' => [
                'max_row' => 3,
                'max_column' => 7,
            ],
            'cells' => [
                'letters' => ['A', 'C', 'I'],
                'from' => 39,
                'to' => 45,
                'columns' => [
                    'special_skill',
                    'non_academic',
                    'organization',
                ],
            ],
        ];
    }

    public static function references(): array
    {
        return [
            'relation_type' => 'one_to_many',
            'relation' => 'references',
            'cells' => [
                'letters' => ['A', 'F', 'G'],
                'from' => 52,
                'to' => 54,
                'columns' => [
                    'name',
                    'address',
                    'telephone_number',
                ],
            ],
        ];
    }

    public static function issuedID(): array
    {
        return [
            'relation_type' => 'one_to_one',
            'relation' => 'issued_id',
            'cells' => [
                'D61' => 'id_type',
                'D62' => 'id_no',
                'D64' => 'date',
            ],
        ];
    }
}
