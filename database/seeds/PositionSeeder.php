<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
            "PosCode"      => "30213",
            "PositionName" => "Clerk IV",
            "SalaryGrade"  => "8",
            "ShortName"    => "CL IV"
            ],
            [
            "PosCode"      => "30214",
            "PositionName" => "College Administrator",
            "SalaryGrade"  => "25",
            "ShortName"    => "CA"
            ],
            [
            "PosCode"      => "30215",
            "PositionName" => "College Department Head",
            "SalaryGrade"  => "20",
            "ShortName"    => "CDH"
            ],
            [
            "PosCode"      => "30216",
            "PositionName" => "College Librarian I",
            "SalaryGrade"  => "13",
            "ShortName"    => "COL I"
            ],
            [
            "PosCode"      => "30217",
            "PositionName" => "College Librarian II",
            "SalaryGrade"  => "15",
            "ShortName"    => "COL II"
            ],
            [
            "PosCode"      => "30218",
            "PositionName" => "College Librarian III",
            "SalaryGrade"  => "18",
            "ShortName"    => "COL III"
            ],
            [
            "PosCode"      => "30219",
            "PositionName" => "College Librarian IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "COL IV"
            ],
            [
            "PosCode"      => "30220",
            "PositionName" => "College Librarian V",
            "SalaryGrade"  => "24",
            "ShortName"    => "COL V"
            ],
            [
            "PosCode"      => "30221",
            "PositionName" => "Communications Equipment Inspector I",
            "SalaryGrade"  => "8",
            "ShortName"    => "CEI I"
            ],
            [
            "PosCode"      => "30222",
            "PositionName" => "Communications Equipment Inspector II",
            "SalaryGrade"  => "11",
            "ShortName"    => "CEI II"
            ],
            [
            "PosCode"      => "30223",
            "PositionName" => "Communications Equipment Operator I",
            "SalaryGrade"  => "4",
            "ShortName"    => "CEO I"
            ],
            [
            "PosCode"      => "30224",
            "PositionName" => "Communications Equipment Operator II",
            "SalaryGrade"  => "6",
            "ShortName"    => "CEO II"
            ],
            [
            "PosCode"      => "30225",
            "PositionName" => "Communications Equipment Operator III",
            "SalaryGrade"  => "9",
            "ShortName"    => "CEO III"
            ],
            [
            "PosCode"      => "30226",
            "PositionName" => "Communications Equipment Operator IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "CEO IV"
            ],
            [
            "PosCode"      => "30227",
            "PositionName" => "Communications Equipment Operator V",
            "SalaryGrade"  => "13",
            "ShortName"    => "CEO V"
            ],
            [
            "PosCode"      => "30228",
            "PositionName" => "Community Affairs Assistant I",
            "SalaryGrade"  => "5",
            "ShortName"    => "CAA I"
            ],
            [
            "PosCode"      => "30229",
            "PositionName" => "Community Affairs Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "CAA II"
            ],
            [
            "PosCode"      => "30230",
            "PositionName" => "Community Affairs Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "CAO I"
            ],
            [
            "PosCode"      => "30231",
            "PositionName" => "Community Affairs Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "CAO II"
            ],
            [
            "PosCode"      => "30232",
            "PositionName" => "Community Affairs Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "CAO III"
            ],
            [
            "PosCode"      => "30233",
            "PositionName" => "Community Affairs Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "CAO IV"
            ],
            [
            "PosCode"      => "30234",
            "PositionName" => "Community Affairs Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "CAO V"
            ],
            [
            "PosCode"      => "30235",
            "PositionName" => "Community Affairs Worker",
            "SalaryGrade"  => "6",
            "ShortName"    => "CAW"
            ],
            [
            "PosCode"      => "30236",
            "PositionName" => "Community Development Assistant I",
            "SalaryGrade"  => "7",
            "ShortName"    => "CDA I"
            ],
            [
            "PosCode"      => "30237",
            "PositionName" => "Community Development Assistant II",
            "SalaryGrade"  => "9",
            "ShortName"    => "CDA II"
            ],
            [
            "PosCode"      => "30238",
            "PositionName" => "Community Development Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "CDO II"
            ],
            [
            "PosCode"      => "30239",
            "PositionName" => "Community Development Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "CDS I"
            ],
            [
            "PosCode"      => "30240",
            "PositionName" => "Computer File Librarian I",
            "SalaryGrade"  => "8",
            "ShortName"    => "CFL I"
            ],
            [
            "PosCode"      => "30241",
            "PositionName" => "Computer File Librarian II",
            "SalaryGrade"  => "10",
            "ShortName"    => "CFLII"
            ],
            [
            "PosCode"      => "30242",
            "PositionName" => "Computer File Librarian III",
            "SalaryGrade"  => "12",
            "ShortName"    => "CFL III"
            ],
            [
            "PosCode"      => "30243",
            "PositionName" => "Computer Maintenance Technologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "CMT I"
            ],
            [
            "PosCode"      => "30244",
            "PositionName" => "Computer Maintenance Technologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "CMT II"
            ],
            [
            "PosCode"      => "30245",
            "PositionName" => "Computer Maintenance Technologist III",
            "SalaryGrade"  => "17",
            "ShortName"    => "CMT III"
            ],
            [
            "PosCode"      => "30246",
            "PositionName" => "Computer Operator I",
            "SalaryGrade"  => "7",
            "ShortName"    => "CO I"
            ],
            [
            "PosCode"      => "30247",
            "PositionName" => "Computer Operator II",
            "SalaryGrade"  => "9",
            "ShortName"    => "CO II"
            ],
            [
            "PosCode"      => "30248",
            "PositionName" => "Computer Operator III",
            "SalaryGrade"  => "12",
            "ShortName"    => "CO III"
            ],
            [
            "PosCode"      => "30249",
            "PositionName" => "Computer Operator IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "CO IV"
            ],
            [
            "PosCode"      => "30250",
            "PositionName" => "Computer Programmer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "CP I"
            ],
            [
            "PosCode"      => "30251",
            "PositionName" => "Computer Programmer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "CP II"
            ],
            [
            "PosCode"      => "30252",
            "PositionName" => "Computer Programmer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "CP III"
            ],
            [
            "PosCode"      => "30253",
            "PositionName" => "Construction And Maintenance Man",
            "SalaryGrade"  => "2",
            "ShortName"    => "CMM"
            ],
            [
            "PosCode"      => "30254",
            "PositionName" => "Const. And Maintenance Capataz",
            "SalaryGrade"  => "5",
            "ShortName"    => "CMC"
            ],
            [
            "PosCode"      => "30255",
            "PositionName" => "Const. And Maintenance Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "CMF"
            ],
            [
            "PosCode"      => "30256",
            "PositionName" => "Const. And Maint. General Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "CMGF"
            ],
            [
            "PosCode"      => "30257",
            "PositionName" => "Consultant",
            "SalaryGrade"  => "1",
            "ShortName"    => "CON"
            ],
            [
            "PosCode"      => "30258",
            "PositionName" => "Cook I",
            "SalaryGrade"  => "3",
            "ShortName"    => "CK I"
            ],
            [
            "PosCode"      => "30259",
            "PositionName" => "Cook II",
            "SalaryGrade"  => "5",
            "ShortName"    => "CK II"
            ],
            [
            "PosCode"      => "30260",
            "PositionName" => "Cook III",
            "SalaryGrade"  => "7",
            "ShortName"    => "CK III"
            ],
            [
            "PosCode"      => "30261",
            "PositionName" => "Cooperative Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "CO IV"
            ],
            [
            "PosCode"      => "30262",
            "PositionName" => "Cooperatives Development Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "CDS I"
            ],
            [
            "PosCode"      => "30263",
            "PositionName" => "Cooperatives Development Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "CDS II"
            ],
            [
            "PosCode"      => "30264",
            "PositionName" => "Credit Officer I",
            "SalaryGrade"  => "9",
            "ShortName"    => "CRO I"
            ],
            [
            "PosCode"      => "30265",
            "PositionName" => "Credit Officer II",
            "SalaryGrade"  => "11",
            "ShortName"    => "CRO II"
            ],
            [
            "PosCode"      => "30266",
            "PositionName" => "Credit Officer III",
            "SalaryGrade"  => "15",
            "ShortName"    => "CRO II"
            ],
            [
            "PosCode"      => "30267",
            "PositionName" => "Credit Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "CRO IV"
            ],
            [
            "PosCode"      => "30268",
            "PositionName" => "Data Controller I",
            "SalaryGrade"  => "6",
            "ShortName"    => "DC I"
            ],
            [
            "PosCode"      => "30269",
            "PositionName" => "Data Controller II",
            "SalaryGrade"  => "8",
            "ShortName"    => "DC II"
            ],
            [
            "PosCode"      => "30270",
            "PositionName" => "Data Controller III",
            "SalaryGrade"  => "11",
            "ShortName"    => "DC III"
            ],
            [
            "PosCode"      => "30271",
            "PositionName" => "Data Controller IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "DC IV"
            ],
            [
            "PosCode"      => "30272",
            "PositionName" => "Data Entry Machine Operator I",
            "SalaryGrade"  => "6",
            "ShortName"    => "DEMO I"
            ],
            [
            "PosCode"      => "30273",
            "PositionName" => "Data Entry Machine Operator II",
            "SalaryGrade"  => "8",
            "ShortName"    => "DEMO II"
            ],
            [
            "PosCode"      => "30274",
            "PositionName" => "Data Entry Machine Operator III",
            "SalaryGrade"  => "11",
            "ShortName"    => "DEMO III"
            ],
            [
            "PosCode"      => "30275",
            "PositionName" => "Data Entry Machine Operator IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "DEMO IV"
            ],
            [
            "PosCode"      => "30276",
            "PositionName" => "Day Care Worker I",
            "SalaryGrade"  => "6",
            "ShortName"    => "DCW I"
            ],
            [
            "PosCode"      => "30277",
            "PositionName" => "Day Care Worker II",
            "SalaryGrade"  => "8",
            "ShortName"    => "DCW II"
            ],
            [
            "PosCode"      => "30278",
            "PositionName" => "Dental Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "DA"
            ],
            [
            "PosCode"      => "30279",
            "PositionName" => "Dental Hygienist",
            "SalaryGrade"  => "10",
            "ShortName"    => "DH"
            ],
            [
            "PosCode"      => "30280",
            "PositionName" => "Dentist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "D I"
            ],
            [
            "PosCode"      => "30281",
            "PositionName" => "Dentist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "D II"
            ],
            [
            "PosCode"      => "30282",
            "PositionName" => "Dentist III",
            "SalaryGrade"  => "19",
            "ShortName"    => "D III"
            ],
            [
            "PosCode"      => "30283",
            "PositionName" => "Dentist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "D IV"
            ],
            [
            "PosCode"      => "30284",
            "PositionName" => "Dentist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "D V"
            ],
            [
            "PosCode"      => "30285",
            "PositionName" => "Development Management Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "DMO I"
            ],
            [
            "PosCode"      => "30286",
            "PositionName" => "Development Management Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "DMO II"
            ],
            [
            "PosCode"      => "30287",
            "PositionName" => "Development Management Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "DMO III"
            ],
            [
            "PosCode"      => "30288",
            "PositionName" => "Development Management Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "DMO IV"
            ],
            [
            "PosCode"      => "30289",
            "PositionName" => "Development Management Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "DMO V"
            ],
            [
            "PosCode"      => "30290",
            "PositionName" => "Disbursing Officer I",
            "SalaryGrade"  => "6",
            "ShortName"    => "DO I"
            ],
            [
            "PosCode"      => "30291",
            "PositionName" => "Disbursing Officer II",
            "SalaryGrade"  => "8",
            "ShortName"    => "DO II"
            ],
            [
            "PosCode"      => "30292",
            "PositionName" => "Draftsman I",
            "SalaryGrade"  => "6",
            "ShortName"    => "DRAFT I"
            ],
            [
            "PosCode"      => "30293",
            "PositionName" => "Draftsman II",
            "SalaryGrade"  => "8",
            "ShortName"    => "DRAFT II"
            ],
            [
            "PosCode"      => "30294",
            "PositionName" => "Draftsman III",
            "SalaryGrade"  => "11",
            "ShortName"    => "DRAFT III"
            ],
            [
            "PosCode"      => "30295",
            "PositionName" => "Driver I",
            "SalaryGrade"  => "3",
            "ShortName"    => "DR I"
            ],
            [
            "PosCode"      => "30296",
            "PositionName" => "Driver II",
            "SalaryGrade"  => "4",
            "ShortName"    => "DR II"
            ],
            [
            "PosCode"      => "30297",
            "PositionName" => "Economic Mngt. Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "EMS"
            ],
            [
            "PosCode"      => "30298",
            "PositionName" => "Economic Researcher",
            "SalaryGrade"  => "9",
            "ShortName"    => "ER"
            ],
            [
            "PosCode"      => "30299",
            "PositionName" => "Economist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "ECO I"
            ],
            [
            "PosCode"      => "30300",
            "PositionName" => "Economist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "ECO II"
            ],
            [
            "PosCode"      => "30301",
            "PositionName" => "Economist III",
            "SalaryGrade"  => "18",
            "ShortName"    => "ECO III"
            ],
            [
            "PosCode"      => "30302",
            "PositionName" => "Economist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "ECO IV"
            ],
            [
            "PosCode"      => "30303",
            "PositionName" => "Economist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "ECO V"
            ],
            [
            "PosCode"      => "30304",
            "PositionName" => "Education Research Assistant I",
            "SalaryGrade"  => "9",
            "ShortName"    => "ERA I"
            ],
            [
            "PosCode"      => "30305",
            "PositionName" => "Education Research Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "ERA II"
            ],
            [
            "PosCode"      => "30306",
            "PositionName" => "Electrical Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "EF"
            ],
            [
            "PosCode"      => "30307",
            "PositionName" => "Electrical Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "EI I"
            ],
            [
            "PosCode"      => "30308",
            "PositionName" => "Electrical Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "EI II"
            ],
            [
            "PosCode"      => "30309",
            "PositionName" => "Electrician Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "EF"
            ],
            [
            "PosCode"      => "30310",
            "PositionName" => "Electrician General Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "EGF"
            ],
            [
            "PosCode"      => "30311",
            "PositionName" => "Electrician I",
            "SalaryGrade"  => "4",
            "ShortName"    => "E I"
            ],
            [
            "PosCode"      => "30312",
            "PositionName" => "Electrician II",
            "SalaryGrade"  => "6",
            "ShortName"    => "E II"
            ],
            [
            "PosCode"      => "30313",
            "PositionName" => "Electronics And Comm. Equipment Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "ECET I"
            ],
            [
            "PosCode"      => "30314",
            "PositionName" => "Electronics And Comm. Equipment Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "ECET II"
            ],
            [
            "PosCode"      => "30315",
            "PositionName" => "Electronics And Comm. Equipment Technician III",
            "SalaryGrade"  => "11",
            "ShortName"    => "ECET III"
            ],
            [
            "PosCode"      => "30316",
            "PositionName" => "Engineer I",
            "SalaryGrade"  => "12",
            "ShortName"    => "ENG I"
            ],
            [
            "PosCode"      => "30317",
            "PositionName" => "Engineer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "ENG II"
            ],
            [
            "PosCode"      => "30318",
            "PositionName" => "Engineer III",
            "SalaryGrade"  => "19",
            "ShortName"    => "ENG III"
            ],
            [
            "PosCode"      => "30319",
            "PositionName" => "Engineer III (Sanitary)",
            "SalaryGrade"  => "19",
            "ShortName"    => "ENG III"
            ],
            [
            "PosCode"      => "30320",
            "PositionName" => "Engineer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "ENG IV"
            ],
            [
            "PosCode"      => "30321",
            "PositionName" => "Engineer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "ENG V"
            ],
            [
            "PosCode"      => "30322",
            "PositionName" => "Engineering Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "EA"
            ],
            [
            "PosCode"      => "30323",
            "PositionName" => "Engineering Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "EA"
            ],
            [
            "PosCode"      => "30324",
            "PositionName" => "Environmental Management Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "EMS"
            ],
            [
            "PosCode"      => "30325",
            "PositionName" => "Environmental Management Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "EMS II"
            ],
            [
            "PosCode"      => "30326",
            "PositionName" => "Executive Assistant",
            "SalaryGrade"  => "14",
            "ShortName"    => "EXA"
            ],
            [
            "PosCode"      => "30327",
            "PositionName" => "Executive Assistant I",
            "SalaryGrade"  => "14",
            "ShortName"    => "EXA I"
            ],
            [
            "PosCode"      => "30328",
            "PositionName" => "Executive Assistant II",
            "SalaryGrade"  => "17",
            "ShortName"    => "EXA II"
            ],
            [
            "PosCode"      => "30329",
            "PositionName" => "Executive Assistant III",
            "SalaryGrade"  => "20",
            "ShortName"    => "EXA III"
            ],
            [
            "PosCode"      => "30330",
            "PositionName" => "Executive Assistant IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "EXA IV"
            ],
            [
            "PosCode"      => "30331",
            "PositionName" => "Executive Assistant V",
            "SalaryGrade"  => "24",
            "ShortName"    => "EXA V"
            ],
            [
            "PosCode"      => "30332",
            "PositionName" => "Farm Foreman",
            "SalaryGrade"  => "6",
            "ShortName"    => "FF"
            ],
            [
            "PosCode"      => "30333",
            "PositionName" => "Farm Superintendent I",
            "SalaryGrade"  => "11",
            "ShortName"    => "FS I"
            ],
            [
            "PosCode"      => "30334",
            "PositionName" => "Farm Superintendent II",
            "SalaryGrade"  => "15",
            "ShortName"    => "FS II"
            ],
            [
            "PosCode"      => "30335",
            "PositionName" => "Farm Superintendent III",
            "SalaryGrade"  => "18",
            "ShortName"    => "FS III"
            ],
            [
            "PosCode"      => "30336",
            "PositionName" => "Farm Supervisor",
            "SalaryGrade"  => "8",
            "ShortName"    => "FS"
            ],
            [
            "PosCode"      => "30337",
            "PositionName" => "Farm Worker  I",
            "SalaryGrade"  => "2",
            "ShortName"    => "FW I"
            ],
            [
            "PosCode"      => "30338",
            "PositionName" => "Farm Worker II",
            "SalaryGrade"  => "4",
            "ShortName"    => "FW II"
            ],
            [
            "PosCode"      => "30339",
            "PositionName" => "Field Worker",
            "SalaryGrade"  => "6",
            "ShortName"    => "FW"
            ],
            [
            "PosCode"      => "30340",
            "PositionName" => "Firefighter I",
            "SalaryGrade"  => "6",
            "ShortName"    => "FF I"
            ],
            [
            "PosCode"      => "30341",
            "PositionName" => "Firefighter II",
            "SalaryGrade"  => "8",
            "ShortName"    => "FF II"
            ],
            [
            "PosCode"      => "30342",
            "PositionName" => "Firefighter III",
            "SalaryGrade"  => "10",
            "ShortName"    => "FF III"
            ],
            [
            "PosCode"      => "30343",
            "PositionName" => "Firetruck Operator",
            "SalaryGrade"  => "6",
            "ShortName"    => "FO"
            ],
            [
            "PosCode"      => "30344",
            "PositionName" => "Fiscal Clerk I",
            "SalaryGrade"  => "4",
            "ShortName"    => "FC I"
            ],
            [
            "PosCode"      => "30345",
            "PositionName" => "Fiscal Clerk II",
            "SalaryGrade"  => "6",
            "ShortName"    => "FC II"
            ],
            [
            "PosCode"      => "30346",
            "PositionName" => "Fiscal Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "FE I"
            ],
            [
            "PosCode"      => "30347",
            "PositionName" => "Fiscal Examiner II",
            "SalaryGrade"  => "15",
            "ShortName"    => "FE II"
            ],
            [
            "PosCode"      => "30348",
            "PositionName" => "Fiscal Examiner III",
            "SalaryGrade"  => "18",
            "ShortName"    => "FE II"
            ],
            [
            "PosCode"      => "30349",
            "PositionName" => "Food Drug Inspector",
            "SalaryGrade"  => "8",
            "ShortName"    => "FDI"
            ],
            [
            "PosCode"      => "30350",
            "PositionName" => "Food Service Helper",
            "SalaryGrade"  => "1",
            "ShortName"    => "FSH"
            ],
            [
            "PosCode"      => "30351",
            "PositionName" => "Food Service Supervisor I",
            "SalaryGrade"  => "9",
            "ShortName"    => "FSS I"
            ],
            [
            "PosCode"      => "30352",
            "PositionName" => "Food Service Supervisor II",
            "SalaryGrade"  => "11",
            "ShortName"    => "FSS II"
            ],
            [
            "PosCode"      => "30353",
            "PositionName" => "Food Service Supervisor III",
            "SalaryGrade"  => "15",
            "ShortName"    => "FSS III"
            ],
            [
            "PosCode"      => "30354",
            "PositionName" => "Forensic Chemist",
            "SalaryGrade"  => "1",
            "ShortName"    => "FCH"
            ],
            [
            "PosCode"      => "30355",
            "PositionName" => "Forest Ranger",
            "SalaryGrade"  => "4",
            "ShortName"    => "FR"
            ],
            [
            "PosCode"      => "30356",
            "PositionName" => "Fumigator",
            "SalaryGrade"  => "4",
            "ShortName"    => "FG"
            ],
            [
            "PosCode"      => "30357",
            "PositionName" => "Geologist III",
            "SalaryGrade"  => "18",
            "ShortName"    => "GEO III"
            ],
            [
            "PosCode"      => "30358",
            "PositionName" => "Guidance Councelor I",
            "SalaryGrade"  => "10",
            "ShortName"    => "GC I"
            ],
            [
            "PosCode"      => "30359",
            "PositionName" => "Guidance Councelor II",
            "SalaryGrade"  => "11",
            "ShortName"    => "GC II"
            ],
            [
            "PosCode"      => "30360",
            "PositionName" => "Guidance Councelor III",
            "SalaryGrade"  => "12",
            "ShortName"    => "GC III"
            ],
            [
            "PosCode"      => "30361",
            "PositionName" => "Handicraft Worker II",
            "SalaryGrade"  => "5",
            "ShortName"    => "HW II"
            ],
            [
            "PosCode"      => "30362",
            "PositionName" => "Handicraft Worker III",
            "SalaryGrade"  => "8",
            "ShortName"    => "HW III"
            ],
            [
            "PosCode"      => "30363",
            "PositionName" => "Harbor Operations Assistant",
            "SalaryGrade"  => "10",
            "ShortName"    => "HOA"
            ],
            [
            "PosCode"      => "30364",
            "PositionName" => "Health  Education And Promotion Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "HEPO V"
            ],
            [
            "PosCode"      => "30365",
            "PositionName" => "Health Education And Promotion Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "HEPO I"
            ],
            [
            "PosCode"      => "30366",
            "PositionName" => "Health Education And Promotion Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "HEPO II"
            ],
            [
            "PosCode"      => "30367",
            "PositionName" => "Health Education And Promotion Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "HEPO III"
            ],
            [
            "PosCode"      => "30368",
            "PositionName" => "Health Education And Promotion Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "HEPO IV"
            ],
            [
            "PosCode"      => "30369",
            "PositionName" => "Health Management Consultant",
            "SalaryGrade"  => "1",
            "ShortName"    => "HMC"
            ],
            [
            "PosCode"      => "30370",
            "PositionName" => "Heavy Equipment Operator I",
            "SalaryGrade"  => "4",
            "ShortName"    => "HEO I"
            ],
            [
            "PosCode"      => "30371",
            "PositionName" => "Heavy Equipment Operator II",
            "SalaryGrade"  => "6",
            "ShortName"    => "HEO II"
            ],
            [
            "PosCode"      => "30372",
            "PositionName" => "Home Management Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "HMS I"
            ],
            [
            "PosCode"      => "30373",
            "PositionName" => "Home Management Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "HMS II"
            ],
            [
            "PosCode"      => "30374",
            "PositionName" => "Home Management Technologist",
            "SalaryGrade"  => "10",
            "ShortName"    => "HMT"
            ],
            [
            "PosCode"      => "30375",
            "PositionName" => "Hospital Housekeeper",
            "SalaryGrade"  => "8",
            "ShortName"    => "HH"
            ],
            [
            "PosCode"      => "30376",
            "PositionName" => "Housing And Homesite Regulation Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "HHRA"
            ],
            [
            "PosCode"      => "30377",
            "PositionName" => "Housing And Homesite Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "HHRO I"
            ],
            [
            "PosCode"      => "30378",
            "PositionName" => "Housing And Homesite Regulation Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "HHRO II"
            ],
            [
            "PosCode"      => "30379",
            "PositionName" => "Housing And Homesite Regulation Officer III",
            "SalaryGrade"  => "16",
            "ShortName"    => "HHRO III"
            ],
            [
            "PosCode"      => "30380",
            "PositionName" => "Housing And Homesite Regulation Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "HHRO IV"
            ],
            [
            "PosCode"      => "30381",
            "PositionName" => "Housing And Homesite Regulation Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "HHRO V"
            ],
            [
            "PosCode"      => "30382",
            "PositionName" => "Housing And Homesite Regulation Officer Vi",
            "SalaryGrade"  => "24",
            "ShortName"    => "HHRO Vi"
            ],
            [
            "PosCode"      => "30383",
            "PositionName" => "Human Resource Management Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "HRMA"
            ],
            [
            "PosCode"      => "30384",
            "PositionName" => "Human Resource Management Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "HRMA"
            ],
            [
            "PosCode"      => "30385",
            "PositionName" => "Human Resource Management Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "HRMO I"
            ],
            [
            "PosCode"      => "30386",
            "PositionName" => "Human Resource Management Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "HRMO II"
            ],
            [
            "PosCode"      => "30387",
            "PositionName" => "Human Resource Management Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "HRMO III"
            ],
            [
            "PosCode"      => "30388",
            "PositionName" => "Human Resource Management Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "HRMO IV"
            ],
            [
            "PosCode"      => "30389",
            "PositionName" => "Human Resource Management Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "HRMO V"
            ],
            [
            "PosCode"      => "30390",
            "PositionName" => "Illustrator II",
            "SalaryGrade"  => "5",
            "ShortName"    => "ILL II"
            ],
            [
            "PosCode"      => "30391",
            "PositionName" => "Information Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "IA"
            ],
            [
            "PosCode"      => "30392",
            "PositionName" => "Information Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "IO I"
            ],
            [
            "PosCode"      => "30393",
            "PositionName" => "Information Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "IO II"
            ],
            [
            "PosCode"      => "30394",
            "PositionName" => "Information Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "IO III"
            ],
            [
            "PosCode"      => "30395",
            "PositionName" => "Information Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "IO IV"
            ],
            [
            "PosCode"      => "30396",
            "PositionName" => "Information Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "IO V"
            ],
            [
            "PosCode"      => "30397",
            "PositionName" => "Information Systems Analyst I",
            "SalaryGrade"  => "12",
            "ShortName"    => "ISA I"
            ],
            [
            "PosCode"      => "30398",
            "PositionName" => "Information Systems Analyst II",
            "SalaryGrade"  => "16",
            "ShortName"    => "ISA II"
            ],
            [
            "PosCode"      => "30399",
            "PositionName" => "Information Systems Analyst III",
            "SalaryGrade"  => "19",
            "ShortName"    => "ISA III"
            ],
            [
            "PosCode"      => "30400",
            "PositionName" => "Information Systems Researcher I",
            "SalaryGrade"  => "10",
            "ShortName"    => "ISR I"
            ],
            [
            "PosCode"      => "30401",
            "PositionName" => "Information Technology Officer I",
            "SalaryGrade"  => "19",
            "ShortName"    => "ITO I"
            ],
            [
            "PosCode"      => "30402",
            "PositionName" => "Information Technology Officer II",
            "SalaryGrade"  => "22",
            "ShortName"    => "ITO II"
            ],
            [
            "PosCode"      => "30403",
            "PositionName" => "Information Technology Officer III",
            "SalaryGrade"  => "24",
            "ShortName"    => "ITO III"
            ],
            [
            "PosCode"      => "30404",
            "PositionName" => "Instructor I",
            "SalaryGrade"  => "12",
            "ShortName"    => "INS I"
            ],
            [
            "PosCode"      => "30405",
            "PositionName" => "Instructor II",
            "SalaryGrade"  => "13",
            "ShortName"    => "INS II"
            ],
            [
            "PosCode"      => "30406",
            "PositionName" => "Instructor III",
            "SalaryGrade"  => "14",
            "ShortName"    => "INS III"
            ],
            [
            "PosCode"      => "30407",
            "PositionName" => "Instructor IV",
            "SalaryGrade"  => "15",
            "ShortName"    => "INS IV"
            ],
            [
            "PosCode"      => "30408",
            "PositionName" => "Instructor V",
            "SalaryGrade"  => "16",
            "ShortName"    => "INS V"
            ],
            [
            "PosCode"      => "30409",
            "PositionName" => "Instrumentman",
            "SalaryGrade"  => "5",
            "ShortName"    => "IM"
            ],
            [
            "PosCode"      => "30410",
            "PositionName" => "Internal Affairs Officer",
            "SalaryGrade"  => "1",
            "ShortName"    => "IAO"
            ],
            [
            "PosCode"      => "30411",
            "PositionName" => "Labor And Employment Officer",
            "SalaryGrade"  => "1",
            "ShortName"    => "LEO"
            ],
            [
            "PosCode"      => "30412",
            "PositionName" => "Labor And Employment Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "LEA"
            ],
            [
            "PosCode"      => "30413",
            "PositionName" => "Labor And Employment Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "LEO I"
            ],
            [
            "PosCode"      => "30414",
            "PositionName" => "Labor And Employment Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "LEO II"
            ],
            [
            "PosCode"      => "30415",
            "PositionName" => "Labor And Employment Officer III",
            "SalaryGrade"  => "16",
            "ShortName"    => "LEO III"
            ],
            [
            "PosCode"      => "30416",
            "PositionName" => "Labor Foreman",
            "SalaryGrade"  => "6",
            "ShortName"    => "LF"
            ],
            [
            "PosCode"      => "30417",
            "PositionName" => "Labor General Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "LGF"
            ],
            [
            "PosCode"      => "30418",
            "PositionName" => "Laboratory Aide  I",
            "SalaryGrade"  => "2",
            "ShortName"    => "LA I"
            ],
            [
            "PosCode"      => "30419",
            "PositionName" => "Laboratory Aide II",
            "SalaryGrade"  => "4",
            "ShortName"    => "LA II"
            ],
            [
            "PosCode"      => "30420",
            "PositionName" => "Laboratory Inspector I",
            "SalaryGrade"  => "8",
            "ShortName"    => "LI I"
            ],
            [
            "PosCode"      => "30421",
            "PositionName" => "Laboratory Inspector II",
            "SalaryGrade"  => "10",
            "ShortName"    => "LI II"
            ],
            [
            "PosCode"      => "30422",
            "PositionName" => "Laboratory Inspector III",
            "SalaryGrade"  => "14",
            "ShortName"    => "LI III"
            ],
            [
            "PosCode"      => "30423",
            "PositionName" => "Laboratory Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "LT I"
            ],
            [
            "PosCode"      => "30424",
            "PositionName" => "Laboratory Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "LT II"
            ],
            [
            "PosCode"      => "30425",
            "PositionName" => "Laborer",
            "SalaryGrade"  => "1",
            "ShortName"    => "LA"
            ],
            [
            "PosCode"      => "30426",
            "PositionName" => "Laborer II",
            "SalaryGrade"  => "3",
            "ShortName"    => "LA II"
            ],
            [
            "PosCode"      => "30427",
            "PositionName" => "Landscaping Supervisor",
            "SalaryGrade"  => "12",
            "ShortName"    => "LS"
            ],
            [
            "PosCode"      => "30428",
            "PositionName" => "Launch Patron",
            "SalaryGrade"  => "7",
            "ShortName"    => "LP"
            ],
            [
            "PosCode"      => "30429",
            "PositionName" => "Launch Service Supervisor",
            "SalaryGrade"  => "12",
            "ShortName"    => "LSS"
            ],
            [
            "PosCode"      => "30430",
            "PositionName" => "Laundry Worker  III",
            "SalaryGrade"  => "6",
            "ShortName"    => "LW III"
            ],
            [
            "PosCode"      => "30431",
            "PositionName" => "Laundry Worker I",
            "SalaryGrade"  => "1",
            "ShortName"    => "LW I"
            ],
            [
            "PosCode"      => "30432",
            "PositionName" => "Laundry Worker II",
            "SalaryGrade"  => "3",
            "ShortName"    => "LW II"
            ],
            [
            "PosCode"      => "30433",
            "PositionName" => "Legal Aide",
            "SalaryGrade"  => "5",
            "ShortName"    => "LAI"
            ],
            [
            "PosCode"      => "30434",
            "PositionName" => "Legal Assistant",
            "SalaryGrade"  => "5",
            "ShortName"    => "LAS"
            ],
            [
            "PosCode"      => "30435",
            "PositionName" => "Legal Assistant I",
            "SalaryGrade"  => "10",
            "ShortName"    => "LAS I"
            ],
            [
            "PosCode"      => "30436",
            "PositionName" => "Legal Assistant II",
            "SalaryGrade"  => "12",
            "ShortName"    => "LAS II"
            ],
            [
            "PosCode"      => "30437",
            "PositionName" => "Legal Officer I",
            "SalaryGrade"  => "14",
            "ShortName"    => "LO I"
            ],
            [
            "PosCode"      => "30438",
            "PositionName" => "Legal Officer II",
            "SalaryGrade"  => "17",
            "ShortName"    => "LO II"
            ],
            [
            "PosCode"      => "30439",
            "PositionName" => "Legal Officer III",
            "SalaryGrade"  => "20",
            "ShortName"    => "LO III"
            ],
            [
            "PosCode"      => "30440",
            "PositionName" => "Legal Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "LO IV"
            ],
            [
            "PosCode"      => "30441",
            "PositionName" => "Legal Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "LO V"
            ],
            [
            "PosCode"      => "30442",
            "PositionName" => "Librarian I",
            "SalaryGrade"  => "10",
            "ShortName"    => "LIB I"
            ],
            [
            "PosCode"      => "30443",
            "PositionName" => "Librarian II",
            "SalaryGrade"  => "14",
            "ShortName"    => "LIB II"
            ],
            [
            "PosCode"      => "30444",
            "PositionName" => "Librarian III",
            "SalaryGrade"  => "18",
            "ShortName"    => "LIB III"
            ],
            [
            "PosCode"      => "30445",
            "PositionName" => "Librarian IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "LIB IV"
            ],
            [
            "PosCode"      => "30446",
            "PositionName" => "Librarian V",
            "SalaryGrade"  => "24",
            "ShortName"    => "LIB V"
            ],
            [
            "PosCode"      => "30447",
            "PositionName" => "License Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "LI I"
            ],
            [
            "PosCode"      => "30448",
            "PositionName" => "License Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "LI II"
            ],
            [
            "PosCode"      => "30449",
            "PositionName" => "Licensing Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "LO I"
            ],
            [
            "PosCode"      => "30450",
            "PositionName" => "Licensing Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "LO II"
            ],
            [
            "PosCode"      => "30451",
            "PositionName" => "Licensing Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "LO III"
            ],
            [
            "PosCode"      => "30452",
            "PositionName" => "Licensing Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "LO IV"
            ],
            [
            "PosCode"      => "30453",
            "PositionName" => "Licensing Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "LO V"
            ],
            [
            "PosCode"      => "30454",
            "PositionName" => "Lifeguard",
            "SalaryGrade"  => "3",
            "ShortName"    => "LG"
            ],
            [
            "PosCode"      => "30455",
            "PositionName" => "Lineman I",
            "SalaryGrade"  => "3",
            "ShortName"    => "LM I"
            ],
            [
            "PosCode"      => "30456",
            "PositionName" => "Lineman II",
            "SalaryGrade"  => "5",
            "ShortName"    => "LM II"
            ],
            [
            "PosCode"      => "30457",
            "PositionName" => "Lineman III",
            "SalaryGrade"  => "8",
            "ShortName"    => "LM III"
            ],
            [
            "PosCode"      => "30458",
            "PositionName" => "Lineman IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "LM IV"
            ],
            [
            "PosCode"      => "30459",
            "PositionName" => "Livestock Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "LV I"
            ],
            [
            "PosCode"      => "30460",
            "PositionName" => "Livestock Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "LV II"
            ],
            [
            "PosCode"      => "30461",
            "PositionName" => "Local Assessment Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "LAOO I"
            ],
            [
            "PosCode"      => "30462",
            "PositionName" => "Local Assessment Operations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "LAOO II"
            ],
            [
            "PosCode"      => "30463",
            "PositionName" => "Local Assessment Operations Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "LAOO III"
            ],
            [
            "PosCode"      => "30464",
            "PositionName" => "Local Assessment Operations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "LAOO IV"
            ],
            [
            "PosCode"      => "30465",
            "PositionName" => "Local Assessment Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "LAOO V"
            ],
            [
            "PosCode"      => "30466",
            "PositionName" => "Local Legislative Staff Assistant I",
            "SalaryGrade"  => "6",
            "ShortName"    => "LLSA I"
            ],
            [
            "PosCode"      => "30467",
            "PositionName" => "Local Legislative Staff Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "LLSA II"
            ],
            [
            "PosCode"      => "30468",
            "PositionName" => "Local Legislative Staff Assistant III",
            "SalaryGrade"  => "10",
            "ShortName"    => "LLSA III"
            ],
            [
            "PosCode"      => "30469",
            "PositionName" => "Local Legislative Staff Employee  I",
            "SalaryGrade"  => "2",
            "ShortName"    => "LLSE I"
            ],
            [
            "PosCode"      => "30470",
            "PositionName" => "Local Legislative Staff Employee  II",
            "SalaryGrade"  => "4",
            "ShortName"    => "LLSE II"
            ],
            [
            "PosCode"      => "30471",
            "PositionName" => "Local Legislative Staff Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "LLSO I"
            ],
            [
            "PosCode"      => "30472",
            "PositionName" => "Local Legislative Staff Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "LLSO II"
            ],
            [
            "PosCode"      => "30473",
            "PositionName" => "Local Legislative Staff Officer III",
            "SalaryGrade"  => "16",
            "ShortName"    => "LLSO III"
            ],
            [
            "PosCode"      => "30474",
            "PositionName" => "Local Legislative Staff Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "LLSO IV"
            ],
            [
            "PosCode"      => "30475",
            "PositionName" => "Local Legislative Staff Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "LLSO V"
            ],
            [
            "PosCode"      => "30476",
            "PositionName" => "Local Legislative Staff Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "LLSO VI"
            ],
            [
            "PosCode"      => "30477",
            "PositionName" => "Local Revenue Collection Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "LRCO I"
            ],
            [
            "PosCode"      => "30478",
            "PositionName" => "Local Revenue Collection Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "LRCO II"
            ],
            [
            "PosCode"      => "30479",
            "PositionName" => "Local Revenue Collection Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "LRCO III"
            ],
            [
            "PosCode"      => "30480",
            "PositionName" => "Local Revenue Collection Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "LRCO IV"
            ],
            [
            "PosCode"      => "30481",
            "PositionName" => "Local Revenue Collection Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "LRCO V"
            ],
            [
            "PosCode"      => "30482",
            "PositionName" => "Local Treasury Operations Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "LTOA"
            ],
            [
            "PosCode"      => "30483",
            "PositionName" => "Local Treasury Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "LTOO I"
            ],
            [
            "PosCode"      => "30484",
            "PositionName" => "Local Treasury Operations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "LTOO II"
            ],
            [
            "PosCode"      => "30485",
            "PositionName" => "Local Treasury Operations Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "LTOO III"
            ],
            [
            "PosCode"      => "30486",
            "PositionName" => "Local Treasury Operations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "LTOO IV"
            ],
            [
            "PosCode"      => "30487",
            "PositionName" => "Local Treasury Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "LTOO V"
            ],
            [
            "PosCode"      => "30488",
            "PositionName" => "Machine Shop Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "MSF"
            ],
            [
            "PosCode"      => "30489",
            "PositionName" => "Machinist I",
            "SalaryGrade"  => "4",
            "ShortName"    => "MA I"
            ],
            [
            "PosCode"      => "30490",
            "PositionName" => "Machinist II",
            "SalaryGrade"  => "6",
            "ShortName"    => "MA II"
            ],
            [
            "PosCode"      => "30491",
            "PositionName" => "Machinist III",
            "SalaryGrade"  => "9",
            "ShortName"    => "MA III"
            ],
            [
            "PosCode"      => "30492",
            "PositionName" => "Management And Audit Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "MAAA I"
            ],
            [
            "PosCode"      => "30493",
            "PositionName" => "Management And Audit Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "MAAA II"
            ],
            [
            "PosCode"      => "30494",
            "PositionName" => "Management And Audit Analyst III",
            "SalaryGrade"  => "18",
            "ShortName"    => "MAAA III"
            ],
            [
            "PosCode"      => "30495",
            "PositionName" => "Management And Audit Analyst IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "MAAA IV"
            ],
            [
            "PosCode"      => "30496",
            "PositionName" => "Management And Audit Analyst V",
            "SalaryGrade"  => "24",
            "ShortName"    => "MAAA V"
            ],
            [
            "PosCode"      => "30497",
            "PositionName" => "Management And Audit Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "MAAA"
            ],
            [
            "PosCode"      => "30498",
            "PositionName" => "Manpower Development Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "MDA"
            ],
            [
            "PosCode"      => "30499",
            "PositionName" => "Manpower Development Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "MDO I"
            ],
            [
            "PosCode"      => "30500",
            "PositionName" => "Manpower Development Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "MDO II"
            ],
            [
            "PosCode"      => "30501",
            "PositionName" => "Marine Engineman I",
            "SalaryGrade"  => "4",
            "ShortName"    => "ME I"
            ],
            [
            "PosCode"      => "30502",
            "PositionName" => "Marine Engineman II",
            "SalaryGrade"  => "6",
            "ShortName"    => "ME II"
            ],
            [
            "PosCode"      => "30503",
            "PositionName" => "Market Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "MI I"
            ],
            [
            "PosCode"      => "30504",
            "PositionName" => "Market Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "MI II"
            ],
            [
            "PosCode"      => "30505",
            "PositionName" => "Market Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "MSP I"
            ],
            [
            "PosCode"      => "30506",
            "PositionName" => "Market Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "MSP II"
            ],
            [
            "PosCode"      => "30507",
            "PositionName" => "Market Specialist III",
            "SalaryGrade"  => "18",
            "ShortName"    => "MSP III"
            ],
            [
            "PosCode"      => "30508",
            "PositionName" => "Market Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "MSP IV"
            ],
            [
            "PosCode"      => "30509",
            "PositionName" => "Market Supervisor I",
            "SalaryGrade"  => "10",
            "ShortName"    => "MS I"
            ],
            [
            "PosCode"      => "30510",
            "PositionName" => "Market Supervisor II",
            "SalaryGrade"  => "14",
            "ShortName"    => "MSII"
            ],
            [
            "PosCode"      => "30511",
            "PositionName" => "Market Supervisor III",
            "SalaryGrade"  => "18",
            "ShortName"    => "MS III"
            ],
            [
            "PosCode"      => "30512",
            "PositionName" => "Market Supervisor IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "MS IV"
            ],
            [
            "PosCode"      => "30513",
            "PositionName" => "Market Supervisor V",
            "SalaryGrade"  => "24",
            "ShortName"    => "MS V"
            ],
            [
            "PosCode"      => "30514",
            "PositionName" => "Mason Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "MF"
            ],
            [
            "PosCode"      => "30515",
            "PositionName" => "Mason I",
            "SalaryGrade"  => "3",
            "ShortName"    => "M I"
            ],
            [
            "PosCode"      => "30516",
            "PositionName" => "Mason II",
            "SalaryGrade"  => "5",
            "ShortName"    => "M II"
            ],
            [
            "PosCode"      => "30517",
            "PositionName" => "Meat Control Officer I",
            "SalaryGrade"  => "13",
            "ShortName"    => "MCO I"
            ],
            [
            "PosCode"      => "30518",
            "PositionName" => "Meat Control Officer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "MCO II"
            ],
            [
            "PosCode"      => "30519",
            "PositionName" => "Meat Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "MI I"
            ],
            [
            "PosCode"      => "30520",
            "PositionName" => "Meat Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "MI II"
            ],
            [
            "PosCode"      => "30521",
            "PositionName" => "Meat Inspector III",
            "SalaryGrade"  => "11",
            "ShortName"    => "MI III"
            ],
            [
            "PosCode"      => "30522",
            "PositionName" => "Mechanic I",
            "SalaryGrade"  => "4",
            "ShortName"    => "ME I"
            ],
            [
            "PosCode"      => "30523",
            "PositionName" => "Mechanic II",
            "SalaryGrade"  => "6",
            "ShortName"    => "ME II"
            ],
            [
            "PosCode"      => "30524",
            "PositionName" => "Mechanic III",
            "SalaryGrade"  => "9",
            "ShortName"    => "ME III"
            ],
            [
            "PosCode"      => "30525",
            "PositionName" => "Mechanical Plant Operator I",
            "SalaryGrade"  => "4",
            "ShortName"    => "MPO I"
            ],
            [
            "PosCode"      => "30526",
            "PositionName" => "Mechanical Plant Operator II",
            "SalaryGrade"  => "6",
            "ShortName"    => "MPO II"
            ],
            [
            "PosCode"      => "30527",
            "PositionName" => "Mechanical Plant Operator III",
            "SalaryGrade"  => "9",
            "ShortName"    => "MPO III"
            ],
            [
            "PosCode"      => "30528",
            "PositionName" => "Mechanical Shop Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "MSF"
            ],
            [
            "PosCode"      => "30529",
            "PositionName" => "Mechanical Shop General Foreman",
            "SalaryGrade"  => "13",
            "ShortName"    => "MSGF"
            ],
            [
            "PosCode"      => "30530",
            "PositionName" => "Medical  Specialist I",
            "SalaryGrade"  => "21",
            "ShortName"    => "MS I"
            ],
            [
            "PosCode"      => "30531",
            "PositionName" => "Medical  Specialist II",
            "SalaryGrade"  => "22",
            "ShortName"    => "MS II"
            ],
            [
            "PosCode"      => "30532",
            "PositionName" => "Medical  Specialist III",
            "SalaryGrade"  => "23",
            "ShortName"    => "MS III"
            ],
            [
            "PosCode"      => "30533",
            "PositionName" => "Medical  Specialist IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "MS IV"
            ],
            [
            "PosCode"      => "30534",
            "PositionName" => "Medical  Technologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "MT I"
            ],
            [
            "PosCode"      => "30535",
            "PositionName" => "Medical  Technologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "MT II"
            ],
            [
            "PosCode"      => "30536",
            "PositionName" => "Medical  Technologist III",
            "SalaryGrade"  => "18",
            "ShortName"    => "MT II"
            ],
            [
            "PosCode"      => "30537",
            "PositionName" => "Medical Equipment Technician  I",
            "SalaryGrade"  => "6",
            "ShortName"    => "MET I"
            ],
            [
            "PosCode"      => "30538",
            "PositionName" => "Medical Equipment Technician  II",
            "SalaryGrade"  => "8",
            "ShortName"    => "MET II"
            ],
            [
            "PosCode"      => "30539",
            "PositionName" => "Medical Equipment Technician  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "MET III"
            ],
            [
            "PosCode"      => "30540",
            "PositionName" => "Medical Laboratory Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "MLT I"
            ],
            [
            "PosCode"      => "30541",
            "PositionName" => "Medical Laboratory Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "MLT II"
            ],
            [
            "PosCode"      => "30542",
            "PositionName" => "Medical Laboratory Technician III",
            "SalaryGrade"  => "10",
            "ShortName"    => "MLT III"
            ],
            [
            "PosCode"      => "30543",
            "PositionName" => "Medical Officer  I",
            "SalaryGrade"  => "14",
            "ShortName"    => "MO I"
            ],
            [
            "PosCode"      => "30544",
            "PositionName" => "Medical Officer  II",
            "SalaryGrade"  => "16",
            "ShortName"    => "MO II"
            ],
            [
            "PosCode"      => "30545",
            "PositionName" => "Medical Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "MO III"
            ],
            [
            "PosCode"      => "30546",
            "PositionName" => "Medical Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "MO IV"
            ],
            [
            "PosCode"      => "30547",
            "PositionName" => "Medical Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "MO V"
            ],
            [
            "PosCode"      => "30548",
            "PositionName" => "Medical Officer Vl",
            "SalaryGrade"  => "24",
            "ShortName"    => "MO VI"
            ],
            [
            "PosCode"      => "30549",
            "PositionName" => "Medical Specialist II (PT)",
            "SalaryGrade"  => "22",
            "ShortName"    => "MS II"
            ],
            [
            "PosCode"      => "30550",
            "PositionName" => "Medical Specialist III (PT) ",
            "SalaryGrade"  => "23",
            "ShortName"    => "MS III"
            ],
            [
            "PosCode"      => "30551",
            "PositionName" => "Medico-legal Officer  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "MLO III"
            ],
            [
            "PosCode"      => "30552",
            "PositionName" => "Messenger",
            "SalaryGrade"  => "2",
            "ShortName"    => "MES"
            ],
            [
            "PosCode"      => "30553",
            "PositionName" => "Metal Worker Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "MWF"
            ],
            [
            "PosCode"      => "30554",
            "PositionName" => "Metal Worker I",
            "SalaryGrade"  => "4",
            "ShortName"    => "MW I"
            ],
            [
            "PosCode"      => "30555",
            "PositionName" => "Metal Worker II",
            "SalaryGrade"  => "6",
            "ShortName"    => "MW II"
            ],
            [
            "PosCode"      => "30556",
            "PositionName" => "Meter Reader I",
            "SalaryGrade"  => "4",
            "ShortName"    => "MR I"
            ],
            [
            "PosCode"      => "30557",
            "PositionName" => "Meter Reader II",
            "SalaryGrade"  => "6",
            "ShortName"    => "MR II"
            ],
            [
            "PosCode"      => "30558",
            "PositionName" => "Meter Reader III",
            "SalaryGrade"  => "9",
            "ShortName"    => "MR III"
            ],
            [
            "PosCode"      => "30559",
            "PositionName" => "Metro Aide II",
            "SalaryGrade"  => "4",
            "ShortName"    => "META II"
            ],
            [
            "PosCode"      => "30560",
            "PositionName" => "Midwife I",
            "SalaryGrade"  => "6",
            "ShortName"    => "MID I"
            ],
            [
            "PosCode"      => "30561",
            "PositionName" => "Midwife II",
            "SalaryGrade"  => "8",
            "ShortName"    => "MID II"
            ],
            [
            "PosCode"      => "30562",
            "PositionName" => "Midwife II (FP)",
            "SalaryGrade"  => "8",
            "ShortName"    => "MID II"
            ],
            [
            "PosCode"      => "30563",
            "PositionName" => "Midwife III",
            "SalaryGrade"  => "11",
            "ShortName"    => "MID III"
            ],
            [
            "PosCode"      => "30564",
            "PositionName" => "Midwife IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "MID IV"
            ],
            [
            "PosCode"      => "30565",
            "PositionName" => "Midwife V",
            "SalaryGrade"  => "15",
            "ShortName"    => "MID V"
            ],
            [
            "PosCode"      => "30566",
            "PositionName" => "Midwife Vi",
            "SalaryGrade"  => "18",
            "ShortName"    => "MID Vi"
            ],
            [
            "PosCode"      => "30567",
            "PositionName" => "Mining Consultant",
            "SalaryGrade"  => "1",
            "ShortName"    => "MC"
            ],
            [
            "PosCode"      => "30568",
            "PositionName" => "Motor Pool Dispatcher",
            "SalaryGrade"  => "6",
            "ShortName"    => "MPD"
            ],
            [
            "PosCode"      => "30569",
            "PositionName" => "Motor Pool Supervisor I",
            "SalaryGrade"  => "7",
            "ShortName"    => "MPS I"
            ],
            [
            "PosCode"      => "30570",
            "PositionName" => "Motor Pool Supervisor II",
            "SalaryGrade"  => "9",
            "ShortName"    => "MPS II"
            ],
            [
            "PosCode"      => "30571",
            "PositionName" => "Municipal Accountant I",
            "SalaryGrade"  => "25",
            "ShortName"    => "MA I"
            ],
            [
            "PosCode"      => "30572",
            "PositionName" => "Municipal Administrator I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MADM I"
            ],
            [
            "PosCode"      => "30573",
            "PositionName" => "Municipal Administrator II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MADM II"
            ],
            [
            "PosCode"      => "30574",
            "PositionName" => "Municipal Agrarian Reform Program Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "MARPO"
            ],
            [
            "PosCode"      => "30575",
            "PositionName" => "Municipal Agricultural Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "MAO"
            ],
            [
            "PosCode"      => "30576",
            "PositionName" => "Municipal Agriculturist I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MUA I"
            ],
            [
            "PosCode"      => "30577",
            "PositionName" => "Municipal Agriculturist II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MUA II"
            ],
            [
            "PosCode"      => "30578",
            "PositionName" => "Municipal Architect",
            "SalaryGrade"  => "24",
            "ShortName"    => "MARCH"
            ],
            [
            "PosCode"      => "30579",
            "PositionName" => "Municipal Assessor I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MAS I"
            ],
            [
            "PosCode"      => "30580",
            "PositionName" => "Municipal Assessor II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MAS II"
            ],
            [
            "PosCode"      => "30581",
            "PositionName" => "Municipal Budget Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MBO I"
            ],
            [
            "PosCode"      => "30582",
            "PositionName" => "Municipal Budget Officer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MBO II"
            ],
            [
            "PosCode"      => "30583",
            "PositionName" => "Municipal Civil Registrar I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MCR I"
            ],
            [
            "PosCode"      => "30584",
            "PositionName" => "Municipal Civil Registrar II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MCR II"
            ],
            [
            "PosCode"      => "30585",
            "PositionName" => "Municipal Engineer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MENG I"
            ],
            [
            "PosCode"      => "30586",
            "PositionName" => "Municipal Engineer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MENG II"
            ],
            [
            "PosCode"      => "30587",
            "PositionName" => "Municipal Environment And Natural Resources Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MENRO I"
            ],
            [
            "PosCode"      => "30588",
            "PositionName" => "Municipal Environment And Natural Resources Officer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MENRO II"
            ],
            [
            "PosCode"      => "30589",
            "PositionName" => "Municipal Government  Department Head II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MGDH II"
            ],
            [
            "PosCode"      => "30590",
            "PositionName" => "Municipal Government Assistant Department Head I",
            "SalaryGrade"  => "22",
            "ShortName"    => "MGADH I"
            ],
            [
            "PosCode"      => "30591",
            "PositionName" => "Municipal Government Assistant Department Head II",
            "SalaryGrade"  => "23",
            "ShortName"    => "MGADH II"
            ],
            [
            "PosCode"      => "30592",
            "PositionName" => "Municipal Government Department Head I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MGDH I"
            ],
            [
            "PosCode"      => "30593",
            "PositionName" => "Municipal Health Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MHO I"
            ],
            [
            "PosCode"      => "30594",
            "PositionName" => "Municipal Health Officer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MHO II"
            ],
            [
            "PosCode"      => "30595",
            "PositionName" => "Municipal Information Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MIO I"
            ],
            [
            "PosCode"      => "30596",
            "PositionName" => "Municipal Information Officer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MIIO II"
            ],
            [
            "PosCode"      => "30597",
            "PositionName" => "Municipal Legal Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MLO I"
            ],
            [
            "PosCode"      => "30598",
            "PositionName" => "Municipal Legal Officer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MLO II"
            ],
            [
            "PosCode"      => "30599",
            "PositionName" => "Municipal Mayor",
            "SalaryGrade"  => "27",
            "ShortName"    => "MM"
            ],
            [
            "PosCode"      => "30600",
            "PositionName" => "Municipal Mayor I",
            "SalaryGrade"  => "27",
            "ShortName"    => "MM I"
            ],
            [
            "PosCode"      => "30601",
            "PositionName" => "Municipal Planning And Development Coordinator I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MPDC I"
            ],
            [
            "PosCode"      => "30602",
            "PositionName" => "Municipal Planning And Development Coordinator II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MPDC II"
            ],
            [
            "PosCode"      => "30603",
            "PositionName" => "Municipal Social Welfare And Development Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MSWDO I"
            ],
            [
            "PosCode"      => "30604",
            "PositionName" => "Municipal Social Welfare And Development Officer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MSWDO II"
            ],
            [
            "PosCode"      => "30605",
            "PositionName" => "Municipal Treasurer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MT I"
            ],
            [
            "PosCode"      => "30606",
            "PositionName" => "Municipal Treasurer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MT II"
            ],
            [
            "PosCode"      => "30607",
            "PositionName" => "Municipal Trial Court Judge",
            "SalaryGrade"  => "26",
            "ShortName"    => "MTCJ"
            ],
            [
            "PosCode"      => "30608",
            "PositionName" => "Municipal Veterenarian I",
            "SalaryGrade"  => "24",
            "ShortName"    => "MV I"
            ],
            [
            "PosCode"      => "30609",
            "PositionName" => "Municipal Veterenarian II",
            "SalaryGrade"  => "25",
            "ShortName"    => "MV II"
            ],
            [
            "PosCode"      => "30610",
            "PositionName" => "Municipal Vice-mayor",
            "SalaryGrade"  => "25",
            "ShortName"    => "MVM"
            ],
            [
            "PosCode"      => "30611",
            "PositionName" => "Municipal Vice-mayor I",
            "SalaryGrade"  => "25",
            "ShortName"    => "MVM I"
            ],
            [
            "PosCode"      => "30612",
            "PositionName" => "Municipal Vice-mayor II",
            "SalaryGrade"  => "26",
            "ShortName"    => "MVM II"
            ],
            [
            "PosCode"      => "30613",
            "PositionName" => "Munitions Production Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "MPT I"
            ],
            [
            "PosCode"      => "30614",
            "PositionName" => "Munitions Production Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "MPT II"
            ],
            [
            "PosCode"      => "30615",
            "PositionName" => "Museum Curator",
            "SalaryGrade"  => "22",
            "ShortName"    => "MC"
            ],
            [
            "PosCode"      => "30616",
            "PositionName" => "Museum Curator I",
            "SalaryGrade"  => "22",
            "ShortName"    => "MC I"
            ],
            [
            "PosCode"      => "30617",
            "PositionName" => "Museum Researcher I",
            "SalaryGrade"  => "10",
            "ShortName"    => "MR I"
            ],
            [
            "PosCode"      => "30618",
            "PositionName" => "Museum Researcher II",
            "SalaryGrade"  => "14",
            "ShortName"    => "MR II"
            ],
            [
            "PosCode"      => "30619",
            "PositionName" => "Museum Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "MTECH I"
            ],
            [
            "PosCode"      => "30620",
            "PositionName" => "Museum Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "MUT II"
            ],
            [
            "PosCode"      => "30621",
            "PositionName" => "Music Director",
            "SalaryGrade"  => "11",
            "ShortName"    => "MD"
            ],
            [
            "PosCode"      => "30622",
            "PositionName" => "Musician I",
            "SalaryGrade"  => "5",
            "ShortName"    => "MU"
            ],
            [
            "PosCode"      => "30623",
            "PositionName" => "Nurse",
            "SalaryGrade"  => "1",
            "ShortName"    => "NUR"
            ],
            [
            "PosCode"      => "30624",
            "PositionName" => "Nurse *",
            "SalaryGrade"  => "10",
            "ShortName"    => "NUR*"
            ],
            [
            "PosCode"      => "30625",
            "PositionName" => "Nurse I",
            "SalaryGrade"  => "11",
            "ShortName"    => "NUR I"
            ],
            [
            "PosCode"      => "30626",
            "PositionName" => "Nurse I (ER)",
            "SalaryGrade"  => "10",
            "ShortName"    => "NUR I(ER)"
            ],
            [
            "PosCode"      => "30627",
            "PositionName" => "Nurse I (ICU) ",
            "SalaryGrade"  => "10",
            "ShortName"    => "NUR I(ICU)"
            ],
            [
            "PosCode"      => "30001",
            "PositionName" => "Accountant I",
            "SalaryGrade"  => "11",
            "ShortName"    => "AC I"
            ],
            [
            "PosCode"      => "30002",
            "PositionName" => "Accountant II",
            "SalaryGrade"  => "16",
            "ShortName"    => "AC II"
            ],
            [
            "PosCode"      => "30003",
            "PositionName" => "Accountant III",
            "SalaryGrade"  => "19",
            "ShortName"    => "AC III"
            ],
            [
            "PosCode"      => "30004",
            "PositionName" => "Accountant IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "C IV"
            ],
            [
            "PosCode"      => "30005",
            "PositionName" => "Accounting Clerk I",
            "SalaryGrade"  => "4",
            "ShortName"    => "ACL I"
            ],
            [
            "PosCode"      => "30006",
            "PositionName" => "Accounting Clerk II",
            "SalaryGrade"  => "6",
            "ShortName"    => "ACL II"
            ],
            [
            "PosCode"      => "30007",
            "PositionName" => "Accounting Clerk III",
            "SalaryGrade"  => "8",
            "ShortName"    => "ACL III"
            ],
            [
            "PosCode"      => "30008",
            "PositionName" => "Acting Assistant Provincial Treasurer",
            "SalaryGrade"  => "22",
            "ShortName"    => "AAPT"
            ],
            [
            "PosCode"      => "30009",
            "PositionName" => "Acupressure Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "AT"
            ],
            [
            "PosCode"      => "30010",
            "PositionName" => "Administrative Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "ADMA"
            ],
            [
            "PosCode"      => "30011",
            "PositionName" => "Administrative Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "ADM I"
            ],
            [
            "PosCode"      => "30012",
            "PositionName" => "Administrative Officer II",
            "SalaryGrade"  => "11",
            "ShortName"    => "ADM II"
            ],
            [
            "PosCode"      => "30013",
            "PositionName" => "Administrative Officer III",
            "SalaryGrade"  => "14",
            "ShortName"    => "ADM III"
            ],
            [
            "PosCode"      => "30014",
            "PositionName" => "Administrative Officer IV",
            "SalaryGrade"  => "15",
            "ShortName"    => "ADM IV"
            ],
            [
            "PosCode"      => "30015",
            "PositionName" => "Administrative Officer V",
            "SalaryGrade"  => "18",
            "ShortName"    => "ADM V"
            ],
            [
            "PosCode"      => "30016",
            "PositionName" => "Agri-business Consultant",
            "SalaryGrade"  => "1",
            "ShortName"    => "ABC"
            ],
            [
            "PosCode"      => "30017",
            "PositionName" => "Agricultural Center Chief I",
            "SalaryGrade"  => "18",
            "ShortName"    => "ACC I"
            ],
            [
            "PosCode"      => "30018",
            "PositionName" => "Agricultural Center Chief II",
            "SalaryGrade"  => "20",
            "ShortName"    => "ACC II"
            ],
            [
            "PosCode"      => "30019",
            "PositionName" => "Agricultural Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "AT I"
            ],
            [
            "PosCode"      => "30020",
            "PositionName" => "Agricultural Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "AT II"
            ],
            [
            "PosCode"      => "30021",
            "PositionName" => "Agricultural Technologist",
            "SalaryGrade"  => "10",
            "ShortName"    => "AT"
            ],
            [
            "PosCode"      => "30022",
            "PositionName" => "Agriculturist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "AG I"
            ],
            [
            "PosCode"      => "30023",
            "PositionName" => "Agriculturist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "AG II"
            ],
            [
            "PosCode"      => "30024",
            "PositionName" => "Animal Keeper I",
            "SalaryGrade"  => "4",
            "ShortName"    => "AK I"
            ],
            [
            "PosCode"      => "30025",
            "PositionName" => "Animal Keeper II",
            "SalaryGrade"  => "6",
            "ShortName"    => "AK II"
            ],
            [
            "PosCode"      => "30026",
            "PositionName" => "Animal Keeper III",
            "SalaryGrade"  => "9",
            "ShortName"    => "AK III"
            ],
            [
            "PosCode"      => "30027",
            "PositionName" => "Aquacultural Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "AT I"
            ],
            [
            "PosCode"      => "30028",
            "PositionName" => "Aquacultural Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "AT II"
            ],
            [
            "PosCode"      => "30029",
            "PositionName" => "Aquacultural Technologist",
            "SalaryGrade"  => "10",
            "ShortName"    => "AQT"
            ],
            [
            "PosCode"      => "30030",
            "PositionName" => "Aquaculturist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "AQ I"
            ],
            [
            "PosCode"      => "30031",
            "PositionName" => "Aquaculturist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "AQ II"
            ],
            [
            "PosCode"      => "30032",
            "PositionName" => "Architect I",
            "SalaryGrade"  => "12",
            "ShortName"    => "ARCH I"
            ],
            [
            "PosCode"      => "30033",
            "PositionName" => "Architect II",
            "SalaryGrade"  => "16",
            "ShortName"    => "ARCH II"
            ],
            [
            "PosCode"      => "30034",
            "PositionName" => "Architect III",
            "SalaryGrade"  => "19",
            "ShortName"    => "ARCH III"
            ],
            [
            "PosCode"      => "30035",
            "PositionName" => "Architect IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "ARCH IV"
            ],
            [
            "PosCode"      => "30036",
            "PositionName" => "Architect V",
            "SalaryGrade"  => "24",
            "ShortName"    => "ARCH V"
            ],
            [
            "PosCode"      => "30037",
            "PositionName" => "Artist-illustrator I",
            "SalaryGrade"  => "6",
            "ShortName"    => "AI I"
            ],
            [
            "PosCode"      => "30038",
            "PositionName" => "Artist-illustrator Ii(B)",
            "SalaryGrade"  => "8",
            "ShortName"    => "AI II"
            ],
            [
            "PosCode"      => "30039",
            "PositionName" => "Artist-illustrator III(A)",
            "SalaryGrade"  => "11",
            "ShortName"    => "AI III"
            ],
            [
            "PosCode"      => "30040",
            "PositionName" => "Assessment Clerk I",
            "SalaryGrade"  => "4",
            "ShortName"    => "AC I"
            ],
            [
            "PosCode"      => "30041",
            "PositionName" => "Assessment Clerk II",
            "SalaryGrade"  => "6",
            "ShortName"    => "AC II"
            ],
            [
            "PosCode"      => "30042",
            "PositionName" => "Assessment Clerk III",
            "SalaryGrade"  => "9",
            "ShortName"    => "AC III"
            ],
            [
            "PosCode"      => "30043",
            "PositionName" => "Assistant College Department Head",
            "SalaryGrade"  => "17",
            "ShortName"    => "ACDH"
            ],
            [
            "PosCode"      => "30044",
            "PositionName" => "Assistant Information Officer",
            "SalaryGrade"  => "8",
            "ShortName"    => "AIO"
            ],
            [
            "PosCode"      => "30045",
            "PositionName" => "Assistant Nutritionist-dietitian",
            "SalaryGrade"  => "7",
            "ShortName"    => "AND"
            ],
            [
            "PosCode"      => "30046",
            "PositionName" => "Assistant Professor I",
            "SalaryGrade"  => "15",
            "ShortName"    => "AP I"
            ],
            [
            "PosCode"      => "30047",
            "PositionName" => "Assistant Professor II",
            "SalaryGrade"  => "16",
            "ShortName"    => "AP II"
            ],
            [
            "PosCode"      => "30048",
            "PositionName" => "Assistant Professor III",
            "SalaryGrade"  => "17",
            "ShortName"    => "AP III"
            ],
            [
            "PosCode"      => "30049",
            "PositionName" => "Assistant Professor IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "AP IV"
            ],
            [
            "PosCode"      => "30050",
            "PositionName" => "Assistant Provincial Accountant",
            "SalaryGrade"  => "24",
            "ShortName"    => "APA"
            ],
            [
            "PosCode"      => "30051",
            "PositionName" => "Assistant Provincial Administrator",
            "SalaryGrade"  => "24",
            "ShortName"    => "APA"
            ],
            [
            "PosCode"      => "30052",
            "PositionName" => "Assistant Provincial Agri Engineer",
            "SalaryGrade"  => "24",
            "ShortName"    => "APAE"
            ],
            [
            "PosCode"      => "30053",
            "PositionName" => "Assistant Provincial Agriculturist",
            "SalaryGrade"  => "24",
            "ShortName"    => "APA"
            ],
            [
            "PosCode"      => "30054",
            "PositionName" => "Assistant Provincial Assessor",
            "SalaryGrade"  => "24",
            "ShortName"    => "APA"
            ],
            [
            "PosCode"      => "30055",
            "PositionName" => "Assistant Provincial Budget Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "APBO"
            ],
            [
            "PosCode"      => "30056",
            "PositionName" => "Assistant Provincial Engineer",
            "SalaryGrade"  => "24",
            "ShortName"    => "APE"
            ],
            [
            "PosCode"      => "30057",
            "PositionName" => "Assistant Provl.Planning And Devt. Coor.",
            "SalaryGrade"  => "24",
            "ShortName"    => "APPDC"
            ],
            [
            "PosCode"      => "30058",
            "PositionName" => "Assistant Provincial Secretary SP",
            "SalaryGrade"  => "24",
            "ShortName"    => "APS"
            ],
            [
            "PosCode"      => "30059",
            "PositionName" => "Assistant Provincial Treasurer",
            "SalaryGrade"  => "24",
            "ShortName"    => "APT"
            ],
            [
            "PosCode"      => "30060",
            "PositionName" => "Assistant Provincial Warden",
            "SalaryGrade"  => "18",
            "ShortName"    => "APW"
            ],
            [
            "PosCode"      => "30061",
            "PositionName" => "Assistant Regional Cabinet Secretary",
            "SalaryGrade"  => "27",
            "ShortName"    => "ARCS"
            ],
            [
            "PosCode"      => "30062",
            "PositionName" => "Assistant Registration Officer",
            "SalaryGrade"  => "8",
            "ShortName"    => "ARC"
            ],
            [
            "PosCode"      => "30063",
            "PositionName" => "Assistant Statistician",
            "SalaryGrade"  => "9",
            "ShortName"    => "AS"
            ],
            [
            "PosCode"      => "30064",
            "PositionName" => "Assistant Traffic Operations Officer",
            "SalaryGrade"  => "8",
            "ShortName"    => "ATOO"
            ],
            [
            "PosCode"      => "30065",
            "PositionName" => "Associate Professor I",
            "SalaryGrade"  => "19",
            "ShortName"    => "AP I"
            ],
            [
            "PosCode"      => "30066",
            "PositionName" => "Associate Professor II",
            "SalaryGrade"  => "20",
            "ShortName"    => "AP II"
            ],
            [
            "PosCode"      => "30067",
            "PositionName" => "Associate Professor III",
            "SalaryGrade"  => "21",
            "ShortName"    => "AP III"
            ],
            [
            "PosCode"      => "30068",
            "PositionName" => "Associate Professor IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "AP IV"
            ],
            [
            "PosCode"      => "30069",
            "PositionName" => "Associate Professor V",
            "SalaryGrade"  => "23",
            "ShortName"    => "AP V"
            ],
            [
            "PosCode"      => "30070",
            "PositionName" => "Attorney I",
            "SalaryGrade"  => "16",
            "ShortName"    => "ATTY I"
            ],
            [
            "PosCode"      => "30071",
            "PositionName" => "Attorney II",
            "SalaryGrade"  => "18",
            "ShortName"    => "ATTY II"
            ],
            [
            "PosCode"      => "30072",
            "PositionName" => "Attorney III",
            "SalaryGrade"  => "21",
            "ShortName"    => "ATTY III"
            ],
            [
            "PosCode"      => "30073",
            "PositionName" => "Attorney IV",
            "SalaryGrade"  => "23",
            "ShortName"    => "ATTY IV"
            ],
            [
            "PosCode"      => "30074",
            "PositionName" => "Audio-visual Aids Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "AVAT I"
            ],
            [
            "PosCode"      => "30075",
            "PositionName" => "Audio-visual Aids Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "AVAT II"
            ],
            [
            "PosCode"      => "30076",
            "PositionName" => "Audio-visual Equipment Operator I",
            "SalaryGrade"  => "3",
            "ShortName"    => "AVEO I"
            ],
            [
            "PosCode"      => "30077",
            "PositionName" => "Audio-visual Equipment Operator II",
            "SalaryGrade"  => "5",
            "ShortName"    => "AVEO II"
            ],
            [
            "PosCode"      => "30078",
            "PositionName" => "Audio-visual Equipment Operator III",
            "SalaryGrade"  => "7",
            "ShortName"    => "AVEO III"
            ],
            [
            "PosCode"      => "30079",
            "PositionName" => "Automotive Equipment Inspector I",
            "SalaryGrade"  => "8",
            "ShortName"    => "AEO I"
            ],
            [
            "PosCode"      => "30080",
            "PositionName" => "Automotive Equipment Inspector II",
            "SalaryGrade"  => "11",
            "ShortName"    => "AEO II"
            ],
            [
            "PosCode"      => "30081",
            "PositionName" => "Bandmaster",
            "SalaryGrade"  => "9",
            "ShortName"    => "BM"
            ],
            [
            "PosCode"      => "30082",
            "PositionName" => "Barangay Health Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "BHA"
            ],
            [
            "PosCode"      => "30083",
            "PositionName" => "Bill Collector",
            "SalaryGrade"  => "5",
            "ShortName"    => "BC"
            ],
            [
            "PosCode"      => "30084",
            "PositionName" => "Blacksmith I(b)",
            "SalaryGrade"  => "4",
            "ShortName"    => "BS"
            ],
            [
            "PosCode"      => "30085",
            "PositionName" => "Blacksmith Ii(a)",
            "SalaryGrade"  => "6",
            "ShortName"    => "BS II"
            ],
            [
            "PosCode"      => "30086",
            "PositionName" => "Board Secretary I",
            "SalaryGrade"  => "14",
            "ShortName"    => "BS I"
            ],
            [
            "PosCode"      => "30087",
            "PositionName" => "Board Secretary II",
            "SalaryGrade"  => "17",
            "ShortName"    => "BS II"
            ],
            [
            "PosCode"      => "30088",
            "PositionName" => "Board Secretary III",
            "SalaryGrade"  => "20",
            "ShortName"    => "BS III"
            ],
            [
            "PosCode"      => "30089",
            "PositionName" => "Board Secretary IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "BS IV"
            ],
            [
            "PosCode"      => "30090",
            "PositionName" => "Board Secretary V",
            "SalaryGrade"  => "24",
            "ShortName"    => "BS V"
            ],
            [
            "PosCode"      => "30091",
            "PositionName" => "Boatswain",
            "SalaryGrade"  => "4",
            "ShortName"    => "BS"
            ],
            [
            "PosCode"      => "30092",
            "PositionName" => "Bookbinder I",
            "SalaryGrade"  => "2",
            "ShortName"    => "BB I"
            ],
            [
            "PosCode"      => "30093",
            "PositionName" => "Bookbinder II",
            "SalaryGrade"  => "4",
            "ShortName"    => "BB II"
            ],
            [
            "PosCode"      => "30094",
            "PositionName" => "Bookbinder III",
            "SalaryGrade"  => "7",
            "ShortName"    => "BB III"
            ],
            [
            "PosCode"      => "30095",
            "PositionName" => "Bookbinder IV",
            "SalaryGrade"  => "10",
            "ShortName"    => "BB IV"
            ],
            [
            "PosCode"      => "30096",
            "PositionName" => "Bookkeeper I",
            "SalaryGrade"  => "8",
            "ShortName"    => "BK I"
            ],
            [
            "PosCode"      => "30097",
            "PositionName" => "Broadcast Program Producer-announcer I",
            "SalaryGrade"  => "12",
            "ShortName"    => "BPPA I"
            ],
            [
            "PosCode"      => "30098",
            "PositionName" => "Broadcast Program Producer-announcer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "BPPA II"
            ],
            [
            "PosCode"      => "30099",
            "PositionName" => "Broadcast Program Traffic Officer",
            "SalaryGrade"  => "9",
            "ShortName"    => "BPTO"
            ],
            [
            "PosCode"      => "30100",
            "PositionName" => "Broadcast Station Manager",
            "SalaryGrade"  => "22",
            "ShortName"    => "BSM"
            ],
            [
            "PosCode"      => "30101",
            "PositionName" => "Budget Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "BO I"
            ],
            [
            "PosCode"      => "30102",
            "PositionName" => "Budget Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "BO II"
            ],
            [
            "PosCode"      => "30103",
            "PositionName" => "Budget Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "BO III"
            ],
            [
            "PosCode"      => "30104",
            "PositionName" => "Budget Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "BO IV"
            ],
            [
            "PosCode"      => "30105",
            "PositionName" => "Budget Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "BO V"
            ],
            [
            "PosCode"      => "30106",
            "PositionName" => "Budgeting Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "BA"
            ],
            [
            "PosCode"      => "30107",
            "PositionName" => "Budgeting Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "BA"
            ],
            [
            "PosCode"      => "30108",
            "PositionName" => "Buyer I",
            "SalaryGrade"  => "4",
            "ShortName"    => "B I"
            ],
            [
            "PosCode"      => "30109",
            "PositionName" => "Buyer II",
            "SalaryGrade"  => "6",
            "ShortName"    => "B II"
            ],
            [
            "PosCode"      => "30110",
            "PositionName" => "Buyer III",
            "SalaryGrade"  => "9",
            "ShortName"    => "B III"
            ],
            [
            "PosCode"      => "30111",
            "PositionName" => "Buyer IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "B IV"
            ],
            [
            "PosCode"      => "30112",
            "PositionName" => "Buyer V",
            "SalaryGrade"  => "13",
            "ShortName"    => "B V"
            ],
            [
            "PosCode"      => "30113",
            "PositionName" => "Carpenter",
            "SalaryGrade"  => "4",
            "ShortName"    => "CAR"
            ],
            [
            "PosCode"      => "30114",
            "PositionName" => "Carpenter Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "CF"
            ],
            [
            "PosCode"      => "30115",
            "PositionName" => "Carpenter General Foreman",
            "SalaryGrade"  => "10",
            "ShortName"    => "CGF"
            ],
            [
            "PosCode"      => "30116",
            "PositionName" => "Carpenter I",
            "SalaryGrade"  => "3",
            "ShortName"    => "CAR I"
            ],
            [
            "PosCode"      => "30117",
            "PositionName" => "Carpenter II",
            "SalaryGrade"  => "5",
            "ShortName"    => "CAR II"
            ],
            [
            "PosCode"      => "30118",
            "PositionName" => "Cartographer III",
            "SalaryGrade"  => "11",
            "ShortName"    => "CART III"
            ],
            [
            "PosCode"      => "30119",
            "PositionName" => "Cash Clerk I",
            "SalaryGrade"  => "4",
            "ShortName"    => "CC I"
            ],
            [
            "PosCode"      => "30120",
            "PositionName" => "Cash Clerk II",
            "SalaryGrade"  => "6",
            "ShortName"    => "CC II"
            ],
            [
            "PosCode"      => "30121",
            "PositionName" => "Cash Clerk III",
            "SalaryGrade"  => "8",
            "ShortName"    => "CC III"
            ],
            [
            "PosCode"      => "30122",
            "PositionName" => "Cashier I",
            "SalaryGrade"  => "10",
            "ShortName"    => "C I"
            ],
            [
            "PosCode"      => "30123",
            "PositionName" => "Cashier II",
            "SalaryGrade"  => "14",
            "ShortName"    => "C II"
            ],
            [
            "PosCode"      => "30124",
            "PositionName" => "Cashier III",
            "SalaryGrade"  => "18",
            "ShortName"    => "C III"
            ],
            [
            "PosCode"      => "30125",
            "PositionName" => "Cashier IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "C IV"
            ],
            [
            "PosCode"      => "30126",
            "PositionName" => "Cashier V",
            "SalaryGrade"  => "24",
            "ShortName"    => "C V"
            ],
            [
            "PosCode"      => "30127",
            "PositionName" => "Chaplain",
            "SalaryGrade"  => "16",
            "ShortName"    => "CH"
            ],
            [
            "PosCode"      => "30128",
            "PositionName" => "Chief Accountant",
            "SalaryGrade"  => "24",
            "ShortName"    => "CHA"
            ],
            [
            "PosCode"      => "30129",
            "PositionName" => "Chief Cooperatives Development Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "CCDS"
            ],
            [
            "PosCode"      => "30130",
            "PositionName" => "Chief Home Management Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "CHMS"
            ],
            [
            "PosCode"      => "30131",
            "PositionName" => "Chief Labor And Employment Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "CLEO"
            ],
            [
            "PosCode"      => "30132",
            "PositionName" => "Chief Manpower Development Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "CMDO"
            ],
            [
            "PosCode"      => "30133",
            "PositionName" => "Chief Of Hospital I",
            "SalaryGrade"  => "24",
            "ShortName"    => "CH I"
            ],
            [
            "PosCode"      => "30134",
            "PositionName" => "Chief Of Hospital II",
            "SalaryGrade"  => "25",
            "ShortName"    => "CH II"
            ],
            [
            "PosCode"      => "30135",
            "PositionName" => "Chief Public Utilities Regulation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "CPURO"
            ],
            [
            "PosCode"      => "30136",
            "PositionName" => "Chief Tourism Operations Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "CTOO"
            ],
            [
            "PosCode"      => "30137",
            "PositionName" => "Chief Transportation Regulation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "CTRO"
            ],
            [
            "PosCode"      => "30138",
            "PositionName" => "Choreographer",
            "SalaryGrade"  => "1",
            "ShortName"    => "CHO"
            ],
            [
            "PosCode"      => "30139",
            "PositionName" => "City Accountant I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CA I"
            ],
            [
            "PosCode"      => "30140",
            "PositionName" => "City Accountant II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CA II"
            ],
            [
            "PosCode"      => "30141",
            "PositionName" => "City Accountant III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CA III"
            ],
            [
            "PosCode"      => "30142",
            "PositionName" => "City Administrator I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CADM I"
            ],
            [
            "PosCode"      => "30143",
            "PositionName" => "City Administrator III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CADM III"
            ],
            [
            "PosCode"      => "30144",
            "PositionName" => "City Adminitrator II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CADM II"
            ],
            [
            "PosCode"      => "30145",
            "PositionName" => "City Agriculturist I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CAG I"
            ],
            [
            "PosCode"      => "30146",
            "PositionName" => "City Agriculturist II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CAG II"
            ],
            [
            "PosCode"      => "30147",
            "PositionName" => "City Agriculturist III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CAG III"
            ],
            [
            "PosCode"      => "30148",
            "PositionName" => "City Assessor I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CAS I"
            ],
            [
            "PosCode"      => "30149",
            "PositionName" => "City Assessor II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CAS II"
            ],
            [
            "PosCode"      => "30150",
            "PositionName" => "City Assessor III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CAS III"
            ],
            [
            "PosCode"      => "30151",
            "PositionName" => "City Budget Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CBO I"
            ],
            [
            "PosCode"      => "30152",
            "PositionName" => "City Budget Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CBO II"
            ],
            [
            "PosCode"      => "30153",
            "PositionName" => "City Budget Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CBO III"
            ],
            [
            "PosCode"      => "30154",
            "PositionName" => "City Civil Registrar I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CCR I"
            ],
            [
            "PosCode"      => "30155",
            "PositionName" => "City Civil Registrar II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CCR II"
            ],
            [
            "PosCode"      => "30156",
            "PositionName" => "City Civil Registrar III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CCR III"
            ],
            [
            "PosCode"      => "30157",
            "PositionName" => "City Cooperatives Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CCO I"
            ],
            [
            "PosCode"      => "30158",
            "PositionName" => "City Cooperatives Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CCO II"
            ],
            [
            "PosCode"      => "30159",
            "PositionName" => "City Cooperatives Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CCO III"
            ],
            [
            "PosCode"      => "30160",
            "PositionName" => "City Engineer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CE I"
            ],
            [
            "PosCode"      => "30161",
            "PositionName" => "City Engineer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CE II"
            ],
            [
            "PosCode"      => "30162",
            "PositionName" => "City Engineer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CE III"
            ],
            [
            "PosCode"      => "30163",
            "PositionName" => "City Environment And Natural Resources Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CENRO I"
            ],
            [
            "PosCode"      => "30164",
            "PositionName" => "City Environment And Natural Resources Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CENRO II"
            ],
            [
            "PosCode"      => "30165",
            "PositionName" => "City Environment And Natural Resources Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CENRO III"
            ],
            [
            "PosCode"      => "30166",
            "PositionName" => "City General Service Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CGSO I"
            ],
            [
            "PosCode"      => "30167",
            "PositionName" => "City General Service Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CGSO II"
            ],
            [
            "PosCode"      => "30168",
            "PositionName" => "City General Service Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CGSO III"
            ],
            [
            "PosCode"      => "30169",
            "PositionName" => "City Government Assistant Department Head I",
            "SalaryGrade"  => "23",
            "ShortName"    => "CGADH I"
            ],
            [
            "PosCode"      => "30170",
            "PositionName" => "City Government Assistant Department Head II",
            "SalaryGrade"  => "24",
            "ShortName"    => "CGADH II"
            ],
            [
            "PosCode"      => "30171",
            "PositionName" => "City Government Assistant Department Head III",
            "SalaryGrade"  => "25",
            "ShortName"    => "CGADH III"
            ],
            [
            "PosCode"      => "30172",
            "PositionName" => "City Government Department Head I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CGDH I"
            ],
            [
            "PosCode"      => "30173",
            "PositionName" => "City Government Department Head II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CGDH II"
            ],
            [
            "PosCode"      => "30174",
            "PositionName" => "City Government Department Head III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CGDH III"
            ],
            [
            "PosCode"      => "30175",
            "PositionName" => "City Government Office Head",
            "SalaryGrade"  => "26",
            "ShortName"    => "CGOH"
            ],
            [
            "PosCode"      => "30176",
            "PositionName" => "City Health Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "CHO I"
            ],
            [
            "PosCode"      => "30177",
            "PositionName" => "City Health Officer II",
            "SalaryGrade"  => "25",
            "ShortName"    => "CHO II"
            ],
            [
            "PosCode"      => "30178",
            "PositionName" => "City Health Officer III",
            "SalaryGrade"  => "26",
            "ShortName"    => "CHO III"
            ],
            [
            "PosCode"      => "30179",
            "PositionName" => "City Information Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CIO I"
            ],
            [
            "PosCode"      => "30180",
            "PositionName" => "City Information Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CIO II"
            ],
            [
            "PosCode"      => "30181",
            "PositionName" => "City Information Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CIO III"
            ],
            [
            "PosCode"      => "30182",
            "PositionName" => "City Legal Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CLC I"
            ],
            [
            "PosCode"      => "30183",
            "PositionName" => "City Legal Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CLC II"
            ],
            [
            "PosCode"      => "30184",
            "PositionName" => "City Legal Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CLC III"
            ],
            [
            "PosCode"      => "30185",
            "PositionName" => "City Planning And Development",
            "SalaryGrade"  => "27",
            "ShortName"    => "CPAD"
            ],
            [
            "PosCode"      => "30186",
            "PositionName" => "City Planning And Development Coordinator I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CPADC I"
            ],
            [
            "PosCode"      => "30187",
            "PositionName" => "City Planning And Development Coordinator II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CPADC II"
            ],
            [
            "PosCode"      => "30188",
            "PositionName" => "City Population Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CPC I"
            ],
            [
            "PosCode"      => "30189",
            "PositionName" => "City Population Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CPC II"
            ],
            [
            "PosCode"      => "30190",
            "PositionName" => "City Population Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CPC III"
            ],
            [
            "PosCode"      => "30191",
            "PositionName" => "City Social Welfare And Development Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CSWDO I"
            ],
            [
            "PosCode"      => "30192",
            "PositionName" => "City Social Welfare And Development Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CSWDO II"
            ],
            [
            "PosCode"      => "30193",
            "PositionName" => "City Social Welfare And Development Officer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CSWDO III"
            ],
            [
            "PosCode"      => "30194",
            "PositionName" => "City Treasurer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CT I"
            ],
            [
            "PosCode"      => "30195",
            "PositionName" => "City Treasurer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CT II"
            ],
            [
            "PosCode"      => "30196",
            "PositionName" => "City Treasurer III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CT III"
            ],
            [
            "PosCode"      => "30197",
            "PositionName" => "City Veterinarian I",
            "SalaryGrade"  => "25",
            "ShortName"    => "CV I"
            ],
            [
            "PosCode"      => "30198",
            "PositionName" => "City Veterinarian II",
            "SalaryGrade"  => "26",
            "ShortName"    => "CV II"
            ],
            [
            "PosCode"      => "30199",
            "PositionName" => "City Veterinarian III",
            "SalaryGrade"  => "27",
            "ShortName"    => "CV III"
            ],
            [
            "PosCode"      => "30200",
            "PositionName" => "City Vice Mayor I",
            "SalaryGrade"  => "26",
            "ShortName"    => "CVM I"
            ],
            [
            "PosCode"      => "30201",
            "PositionName" => "Civil Defense Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "CDA"
            ],
            [
            "PosCode"      => "30202",
            "PositionName" => "Clerk",
            "SalaryGrade"  => "1",
            "ShortName"    => "CL"
            ],
            [
            "PosCode"      => "30203",
            "PositionName" => "Clerk *",
            "SalaryGrade"  => "8",
            "ShortName"    => "CL*"
            ],
            [
            "PosCode"      => "30204",
            "PositionName" => "Clerk I",
            "SalaryGrade"  => "3",
            "ShortName"    => "CL I"
            ],
            [
            "PosCode"      => "30205",
            "PositionName" => "Clerk I  (Admin)",
            "SalaryGrade"  => "3",
            "ShortName"    => "CLADM"
            ],
            [
            "PosCode"      => "30206",
            "PositionName" => "Clerk I (Collection)",
            "SalaryGrade"  => "3",
            "ShortName"    => "CLC"
            ],
            [
            "PosCode"      => "30207",
            "PositionName" => "Clerk I (OPD)",
            "SalaryGrade"  => "3",
            "ShortName"    => "CL I"
            ],
            [
            "PosCode"      => "30208",
            "PositionName" => "Clerk I *",
            "SalaryGrade"  => "7",
            "ShortName"    => "CL I *"
            ],
            [
            "PosCode"      => "30209",
            "PositionName" => "Clerk I **",
            "SalaryGrade"  => "4",
            "ShortName"    => "CL I **"
            ],
            [
            "PosCode"      => "30210",
            "PositionName" => "Clerk II",
            "SalaryGrade"  => "4",
            "ShortName"    => "CL II"
            ],
            [
            "PosCode"      => "30211",
            "PositionName" => "Clerk II (Billing)",
            "SalaryGrade"  => "4",
            "ShortName"    => "CL II"
            ],
            [
            "PosCode"      => "30212",
            "PositionName" => "Clerk III",
            "SalaryGrade"  => "6",
            "ShortName"    => "CL III"
            ],
            [
            "PosCode"      => "30628",
            "PositionName" => "Nurse I (NICU)",
            "SalaryGrade"  => "10",
            "ShortName"    => "NUR I(NICU)"
            ],
            [
            "PosCode"      => "30629",
            "PositionName" => "Nurse I (Ward)",
            "SalaryGrade"  => "10",
            "ShortName"    => "NUR I(W)"
            ],
            [
            "PosCode"      => "30630",
            "PositionName" => "Nurse II",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II"
            ],
            [
            "PosCode"      => "30631",
            "PositionName" => "Nurse II (DR)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(DR)"
            ],
            [
            "PosCode"      => "30632",
            "PositionName" => "Nurse II (ER)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(ER)"
            ],
            [
            "PosCode"      => "30633",
            "PositionName" => "Nurse II (FP)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(FP)"
            ],
            [
            "PosCode"      => "30634",
            "PositionName" => "Nurse II (ICU)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II (ICU)"
            ],
            [
            "PosCode"      => "30635",
            "PositionName" => "Nurse II (NICU)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(NICU)"
            ],
            [
            "PosCode"      => "30636",
            "PositionName" => "Nurse II (OB)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(OB)"
            ],
            [
            "PosCode"      => "30637",
            "PositionName" => "Nurse II (OPD)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(OPD)"
            ],
            [
            "PosCode"      => "30638",
            "PositionName" => "Nurse II (Surgery)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(SUR)"
            ],
            [
            "PosCode"      => "30639",
            "PositionName" => "Nurse II (UFC)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(UFC)"
            ],
            [
            "PosCode"      => "30640",
            "PositionName" => "Nurse II (Ward)",
            "SalaryGrade"  => "14",
            "ShortName"    => "NUR II(W)"
            ],
            [
            "PosCode"      => "30641",
            "PositionName" => "Nurse III",
            "SalaryGrade"  => "16",
            "ShortName"    => "NUR III"
            ],
            [
            "PosCode"      => "30642",
            "PositionName" => "Nurse IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "NUR IV"
            ],
            [
            "PosCode"      => "30643",
            "PositionName" => "Nurse V",
            "SalaryGrade"  => "20",
            "ShortName"    => "NUR V"
            ],
            [
            "PosCode"      => "30644",
            "PositionName" => "Nurse VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "NUR VI"
            ],
            [
            "PosCode"      => "30645",
            "PositionName" => "Nurse VII",
            "SalaryGrade"  => "24",
            "ShortName"    => "NUR VII"
            ],
            [
            "PosCode"      => "30646",
            "PositionName" => "Nursing Attendant I",
            "SalaryGrade"  => "4",
            "ShortName"    => "NA I"
            ],
            [
            "PosCode"      => "30647",
            "PositionName" => "Nursing Attendant I (CSR)",
            "SalaryGrade"  => "4",
            "ShortName"    => "NA I(CSR)"
            ],
            [
            "PosCode"      => "30648",
            "PositionName" => "Nursing Attendant I (ER)",
            "SalaryGrade"  => "4",
            "ShortName"    => "NA I(ER)"
            ],
            [
            "PosCode"      => "30649",
            "PositionName" => "Nursing Attendant I (ICU)",
            "SalaryGrade"  => "4",
            "ShortName"    => "NA I(ICU)"
            ],
            [
            "PosCode"      => "30650",
            "PositionName" => "Nursing Attendant I (OPD)",
            "SalaryGrade"  => "4",
            "ShortName"    => "NA I(OPD)"
            ],
            [
            "PosCode"      => "30651",
            "PositionName" => "Nursing Attendant I (UFC)",
            "SalaryGrade"  => "4",
            "ShortName"    => "NA I(UFC)"
            ],
            [
            "PosCode"      => "30652",
            "PositionName" => "Nursing Attendant I (Ward)",
            "SalaryGrade"  => "4",
            "ShortName"    => "NA I(W)"
            ],
            [
            "PosCode"      => "30653",
            "PositionName" => "Nursing Attendant II",
            "SalaryGrade"  => "6",
            "ShortName"    => "NA II"
            ],
            [
            "PosCode"      => "30654",
            "PositionName" => "Nursing Attendant II (DR)",
            "SalaryGrade"  => "6",
            "ShortName"    => "NA II(DR)"
            ],
            [
            "PosCode"      => "30655",
            "PositionName" => "Nursing Attendant II (OB)",
            "SalaryGrade"  => "6",
            "ShortName"    => "NA II(OB)"
            ],
            [
            "PosCode"      => "30656",
            "PositionName" => "Nursing Attendant II (Surgery)",
            "SalaryGrade"  => "6",
            "ShortName"    => "NA II9SUR)"
            ],
            [
            "PosCode"      => "30657",
            "PositionName" => "Nutrition Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "NO I"
            ],
            [
            "PosCode"      => "30658",
            "PositionName" => "Nutrition Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "NO II"
            ],
            [
            "PosCode"      => "30659",
            "PositionName" => "Nutrition Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "NO III"
            ],
            [
            "PosCode"      => "30660",
            "PositionName" => "Nutrition Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "NO IV"
            ],
            [
            "PosCode"      => "30661",
            "PositionName" => "Nutrition Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "NO V"
            ],
            [
            "PosCode"      => "30662",
            "PositionName" => "Nutritionist-Dietitian I",
            "SalaryGrade"  => "10",
            "ShortName"    => "ND I"
            ],
            [
            "PosCode"      => "30663",
            "PositionName" => "Nutritionist-Dietitian II",
            "SalaryGrade"  => "14",
            "ShortName"    => "ND II"
            ],
            [
            "PosCode"      => "30664",
            "PositionName" => "Nutritionist-Dietitian III",
            "SalaryGrade"  => "18",
            "ShortName"    => "Nutritionist-Dietitian III"
            ],
            [
            "PosCode"      => "30665",
            "PositionName" => "Oic, Provincial Accountants Office",
            "SalaryGrade"  => "22",
            "ShortName"    => "PAO"
            ],
            [
            "PosCode"      => "30666",
            "PositionName" => "Oic, Provincial Assessors Office",
            "SalaryGrade"  => "26",
            "ShortName"    => "PASO"
            ],
            [
            "PosCode"      => "30667",
            "PositionName" => "Oic, Provincial Engineers Office",
            "SalaryGrade"  => "26",
            "ShortName"    => "PEO"
            ],
            [
            "PosCode"      => "30668",
            "PositionName" => "Oic, Provincial General Services Office",
            "SalaryGrade"  => "24",
            "ShortName"    => "PGSO"
            ],
            [
            "PosCode"      => "30669",
            "PositionName" => "Oic, Real Property Tax Administration",
            "SalaryGrade"  => "26",
            "ShortName"    => "RPTA"
            ],
            [
            "PosCode"      => "30670",
            "PositionName" => "Painter Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "PF"
            ],
            [
            "PosCode"      => "30671",
            "PositionName" => "Painter General Foreman",
            "SalaryGrade"  => "10",
            "ShortName"    => "PGF"
            ],
            [
            "PosCode"      => "30672",
            "PositionName" => "Painter I",
            "SalaryGrade"  => "1",
            "ShortName"    => "PA I"
            ],
            [
            "PosCode"      => "30673",
            "PositionName" => "Painter II",
            "SalaryGrade"  => "5",
            "ShortName"    => "PA II"
            ],
            [
            "PosCode"      => "30674",
            "PositionName" => "Park Attendant II",
            "SalaryGrade"  => "4",
            "ShortName"    => "PAT II"
            ],
            [
            "PosCode"      => "30675",
            "PositionName" => "Park Attendant III",
            "SalaryGrade"  => "6",
            "ShortName"    => "PAT III"
            ],
            [
            "PosCode"      => "30676",
            "PositionName" => "Park Maintenance Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "PMF"
            ],
            [
            "PosCode"      => "30677",
            "PositionName" => "Park Maintenance General Foreman",
            "SalaryGrade"  => "10",
            "ShortName"    => "PMGF"
            ],
            [
            "PosCode"      => "30678",
            "PositionName" => "Park Operations Superintendent I",
            "SalaryGrade"  => "16",
            "ShortName"    => "POS I"
            ],
            [
            "PosCode"      => "30679",
            "PositionName" => "Park Operations Superintendent II",
            "SalaryGrade"  => "18",
            "ShortName"    => "POS II"
            ],
            [
            "PosCode"      => "30680",
            "PositionName" => "Parking Aide II",
            "SalaryGrade"  => "4",
            "ShortName"    => "PRA II"
            ],
            [
            "PosCode"      => "30681",
            "PositionName" => "Parking Aide III",
            "SalaryGrade"  => "6",
            "ShortName"    => "PRA III"
            ],
            [
            "PosCode"      => "30682",
            "PositionName" => "Parking Aide IV",
            "SalaryGrade"  => "7",
            "ShortName"    => "PRA IV"
            ],
            [
            "PosCode"      => "30683",
            "PositionName" => "Pest Control Technician",
            "SalaryGrade"  => "7",
            "ShortName"    => "PCT"
            ],
            [
            "PosCode"      => "30684",
            "PositionName" => "Pest Control Worker I",
            "SalaryGrade"  => "4",
            "ShortName"    => "PCW"
            ],
            [
            "PosCode"      => "30685",
            "PositionName" => "Pest Control Worker II",
            "SalaryGrade"  => "6",
            "ShortName"    => "PCW II"
            ],
            [
            "PosCode"      => "30686",
            "PositionName" => "Pharmacist I",
            "SalaryGrade"  => "10",
            "ShortName"    => "PH I"
            ],
            [
            "PosCode"      => "30687",
            "PositionName" => "Pharmacist II",
            "SalaryGrade"  => "12",
            "ShortName"    => "PH II"
            ],
            [
            "PosCode"      => "30688",
            "PositionName" => "Pharmacist III",
            "SalaryGrade"  => "14",
            "ShortName"    => "PH III"
            ],
            [
            "PosCode"      => "30689",
            "PositionName" => "Pharmacist IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "PH IV"
            ],
            [
            "PosCode"      => "30690",
            "PositionName" => "Pharmacist V",
            "SalaryGrade"  => "20",
            "ShortName"    => "PH V"
            ],
            [
            "PosCode"      => "30691",
            "PositionName" => "Pharmacist Vi",
            "SalaryGrade"  => "22",
            "ShortName"    => "PH Vi"
            ],
            [
            "PosCode"      => "30692",
            "PositionName" => "Photographer I",
            "SalaryGrade"  => "5",
            "ShortName"    => "PHOTO I"
            ],
            [
            "PosCode"      => "30693",
            "PositionName" => "Photographer II",
            "SalaryGrade"  => "7",
            "ShortName"    => "PHOTO II"
            ],
            [
            "PosCode"      => "30694",
            "PositionName" => "Photographer III",
            "SalaryGrade"  => "10",
            "ShortName"    => "PHOTO III"
            ],
            [
            "PosCode"      => "30695",
            "PositionName" => "Physiatrist",
            "SalaryGrade"  => "1",
            "ShortName"    => "PHY"
            ],
            [
            "PosCode"      => "30696",
            "PositionName" => "Physical Therapist",
            "SalaryGrade"  => "10",
            "ShortName"    => "PT"
            ],
            [
            "PosCode"      => "30697",
            "PositionName" => "Pipefilter Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "PF"
            ],
            [
            "PosCode"      => "30698",
            "PositionName" => "Pipefitter I",
            "SalaryGrade"  => "3",
            "ShortName"    => "PI I"
            ],
            [
            "PosCode"      => "30699",
            "PositionName" => "Pipefitter II",
            "SalaryGrade"  => "5",
            "ShortName"    => "PI II"
            ],
            [
            "PosCode"      => "30700",
            "PositionName" => "Planning Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "PLA"
            ],
            [
            "PosCode"      => "30701",
            "PositionName" => "Planning Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PLO I"
            ],
            [
            "PosCode"      => "30702",
            "PositionName" => "Planning Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PLO II"
            ],
            [
            "PosCode"      => "30703",
            "PositionName" => "Planning Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "PLO III"
            ],
            [
            "PosCode"      => "30704",
            "PositionName" => "Planning Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "PLO IV"
            ],
            [
            "PosCode"      => "30705",
            "PositionName" => "Planning Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "PLO V"
            ],
            [
            "PosCode"      => "30706",
            "PositionName" => "Plumber  I",
            "SalaryGrade"  => "3",
            "ShortName"    => "PL I"
            ],
            [
            "PosCode"      => "30707",
            "PositionName" => "Plumber Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "PLF"
            ],
            [
            "PosCode"      => "30708",
            "PositionName" => "Plumber II",
            "SalaryGrade"  => "5",
            "ShortName"    => "PL II"
            ],
            [
            "PosCode"      => "30709",
            "PositionName" => "Plumbing And Tinning Inspector I",
            "SalaryGrade"  => "8",
            "ShortName"    => "PTI I"
            ],
            [
            "PosCode"      => "30710",
            "PositionName" => "Plumbing And Tinning Inspector II",
            "SalaryGrade"  => "10",
            "ShortName"    => "PTI II"
            ],
            [
            "PosCode"      => "30711",
            "PositionName" => "Population Program Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PPO I"
            ],
            [
            "PosCode"      => "30712",
            "PositionName" => "Population Program Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PPO II"
            ],
            [
            "PosCode"      => "30713",
            "PositionName" => "Population Program Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "PPO III"
            ],
            [
            "PosCode"      => "30714",
            "PositionName" => "Population Program Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "PPO IV"
            ],
            [
            "PosCode"      => "30715",
            "PositionName" => "Population Program Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "PPO V"
            ],
            [
            "PosCode"      => "30716",
            "PositionName" => "Population Program Worker I",
            "SalaryGrade"  => "5",
            "ShortName"    => "PPW I"
            ],
            [
            "PosCode"      => "30717",
            "PositionName" => "Population Program Worker II",
            "SalaryGrade"  => "7",
            "ShortName"    => "PPW II"
            ],
            [
            "PosCode"      => "30718",
            "PositionName" => "Poundkeeper II",
            "SalaryGrade"  => "6",
            "ShortName"    => "PK II"
            ],
            [
            "PosCode"      => "30719",
            "PositionName" => "Prison Guard I",
            "SalaryGrade"  => "5",
            "ShortName"    => "PG I"
            ],
            [
            "PosCode"      => "30720",
            "PositionName" => "Prison Guard II",
            "SalaryGrade"  => "7",
            "ShortName"    => "PG II"
            ],
            [
            "PosCode"      => "30721",
            "PositionName" => "Prison Guard III",
            "SalaryGrade"  => "10",
            "ShortName"    => "PG III"
            ],
            [
            "PosCode"      => "30722",
            "PositionName" => "Private Secretary",
            "SalaryGrade"  => "7",
            "ShortName"    => "PS"
            ],
            [
            "PosCode"      => "30723",
            "PositionName" => "Private Secretary I",
            "SalaryGrade"  => "7",
            "ShortName"    => "PS I"
            ],
            [
            "PosCode"      => "30724",
            "PositionName" => "Private Secretary II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PS II"
            ],
            [
            "PosCode"      => "30725",
            "PositionName" => "Process Server",
            "SalaryGrade"  => "5",
            "ShortName"    => "PRS"
            ],
            [
            "PosCode"      => "30726",
            "PositionName" => "Professor I",
            "SalaryGrade"  => "24",
            "ShortName"    => "PROF I"
            ],
            [
            "PosCode"      => "30727",
            "PositionName" => "Professor II",
            "SalaryGrade"  => "25",
            "ShortName"    => "PROF II"
            ],
            [
            "PosCode"      => "30728",
            "PositionName" => "Professor III",
            "SalaryGrade"  => "26",
            "ShortName"    => "PROF III"
            ],
            [
            "PosCode"      => "30729",
            "PositionName" => "Project Coordinator",
            "SalaryGrade"  => "1",
            "ShortName"    => "PC"
            ],
            [
            "PosCode"      => "30730",
            "PositionName" => "Project Development Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "PDA"
            ],
            [
            "PosCode"      => "30731",
            "PositionName" => "Project Development Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PDO I"
            ],
            [
            "PosCode"      => "30732",
            "PositionName" => "Project Development Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PDO II"
            ],
            [
            "PosCode"      => "30733",
            "PositionName" => "Project Development Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "PDO III"
            ],
            [
            "PosCode"      => "30734",
            "PositionName" => "Project Development Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "PDO IV"
            ],
            [
            "PosCode"      => "30735",
            "PositionName" => "Project Development Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "PDO V"
            ],
            [
            "PosCode"      => "30736",
            "PositionName" => "Project Evaluation Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "PEA"
            ],
            [
            "PosCode"      => "30737",
            "PositionName" => "Project Evaluation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PEO I"
            ],
            [
            "PosCode"      => "30738",
            "PositionName" => "Project Evaluation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PEO II"
            ],
            [
            "PosCode"      => "30739",
            "PositionName" => "Project Evaluation Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "PEO III"
            ],
            [
            "PosCode"      => "30740",
            "PositionName" => "Project Evaluation Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "PEO IV"
            ],
            [
            "PosCode"      => "30741",
            "PositionName" => "Project Evaluation Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "PEO V"
            ],
            [
            "PosCode"      => "30742",
            "PositionName" => "Provincial Accountant",
            "SalaryGrade"  => "26",
            "ShortName"    => "PA"
            ],
            [
            "PosCode"      => "30743",
            "PositionName" => "Provincial Administrator",
            "SalaryGrade"  => "26",
            "ShortName"    => "PADM"
            ],
            [
            "PosCode"      => "30744",
            "PositionName" => "Provincial Agriculturist",
            "SalaryGrade"  => "26",
            "ShortName"    => "PAGRI"
            ],
            [
            "PosCode"      => "30745",
            "PositionName" => "Provincial Assessor",
            "SalaryGrade"  => "26",
            "ShortName"    => "PAS"
            ],
            [
            "PosCode"      => "30746",
            "PositionName" => "Provincial Budget Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PBO"
            ],
            [
            "PosCode"      => "30747",
            "PositionName" => "Provincial Civil Registrar",
            "SalaryGrade"  => "26",
            "ShortName"    => "PCR"
            ],
            [
            "PosCode"      => "30748",
            "PositionName" => "Provincial Cooperatives Officer I",
            "SalaryGrade"  => "26",
            "ShortName"    => "PCO I"
            ],
            [
            "PosCode"      => "30749",
            "PositionName" => "Provincial Engineer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PENG"
            ],
            [
            "PosCode"      => "30750",
            "PositionName" => "Provincial ENR Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PENRO"
            ],
            [
            "PosCode"      => "30751",
            "PositionName" => "Provincial Equipment Engineer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PEE"
            ],
            [
            "PosCode"      => "30752",
            "PositionName" => "Provincial General Services Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PGSO"
            ],
            [
            "PosCode"      => "30753",
            "PositionName" => "Provincial Government Assistant Department Head",
            "SalaryGrade"  => "24",
            "ShortName"    => "PGADH"
            ],
            [
            "PosCode"      => "30754",
            "PositionName" => "Provincial Government Department Head",
            "SalaryGrade"  => "26",
            "ShortName"    => "PGDH"
            ],
            [
            "PosCode"      => "30755",
            "PositionName" => "Provincial Governor",
            "SalaryGrade"  => "30",
            "ShortName"    => "PG"
            ],
            [
            "PosCode"      => "30756",
            "PositionName" => "Provincial Health Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "PHO I"
            ],
            [
            "PosCode"      => "30757",
            "PositionName" => "Provincial Health Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "PHO II"
            ],
            [
            "PosCode"      => "30758",
            "PositionName" => "Provincial Information Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PIO"
            ],
            [
            "PosCode"      => "30759",
            "PositionName" => "Provincial Legal Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PLO"
            ],
            [
            "PosCode"      => "30760",
            "PositionName" => "Provl. Planning And Development Coordinator",
            "SalaryGrade"  => "26",
            "ShortName"    => "PPDC"
            ],
            [
            "PosCode"      => "30761",
            "PositionName" => "Provincial Population Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PPO"
            ],
            [
            "PosCode"      => "30762",
            "PositionName" => "Provincial Social Welfare And Development Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PSWDO"
            ],
            [
            "PosCode"      => "30763",
            "PositionName" => "Provincial Treasurer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PRT"
            ],
            [
            "PosCode"      => "30764",
            "PositionName" => "Provincial Veterinarian",
            "SalaryGrade"  => "26",
            "ShortName"    => "PV"
            ],
            [
            "PosCode"      => "30765",
            "PositionName" => "Provincial Warden",
            "SalaryGrade"  => "22",
            "ShortName"    => "PW"
            ],
            [
            "PosCode"      => "30766",
            "PositionName" => "Psychologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PSY I"
            ],
            [
            "PosCode"      => "30767",
            "PositionName" => "Public Health Nurse I",
            "SalaryGrade"  => "12",
            "ShortName"    => "PHN I"
            ],
            [
            "PosCode"      => "30768",
            "PositionName" => "Public Health Nurse II",
            "SalaryGrade"  => "16",
            "ShortName"    => "PHN II"
            ],
            [
            "PosCode"      => "30769",
            "PositionName" => "Public Health Nurse III",
            "SalaryGrade"  => "19",
            "ShortName"    => "PHN III"
            ],
            [
            "PosCode"      => "30770",
            "PositionName" => "Public Relations Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "PRA"
            ],
            [
            "PosCode"      => "30771",
            "PositionName" => "Public Relations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PRO I"
            ],
            [
            "PosCode"      => "30772",
            "PositionName" => "Public Relations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PRO II"
            ],
            [
            "PosCode"      => "30773",
            "PositionName" => "Public Relations Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "PRO III"
            ],
            [
            "PosCode"      => "30774",
            "PositionName" => "Public Relations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "PRO IV"
            ],
            [
            "PosCode"      => "30775",
            "PositionName" => "Public Relations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "PRO V"
            ],
            [
            "PosCode"      => "30776",
            "PositionName" => "Public Services Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "PSA"
            ],
            [
            "PosCode"      => "30777",
            "PositionName" => "Public Services Foreman",
            "SalaryGrade"  => "6",
            "ShortName"    => "PSF"
            ],
            [
            "PosCode"      => "30778",
            "PositionName" => "Public Services Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "PSI I"
            ],
            [
            "PosCode"      => "30779",
            "PositionName" => "Public Services Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PSO I"
            ],
            [
            "PosCode"      => "30780",
            "PositionName" => "Public Services Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PSO II"
            ],
            [
            "PosCode"      => "30781",
            "PositionName" => "Public Services Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "PSO III"
            ],
            [
            "PosCode"      => "30782",
            "PositionName" => "Public Services Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "PSO IV"
            ],
            [
            "PosCode"      => "30783",
            "PositionName" => "Public Services Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "PSO V"
            ],
            [
            "PosCode"      => "30784",
            "PositionName" => "Public Utilities Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "PURO I"
            ],
            [
            "PosCode"      => "30785",
            "PositionName" => "Public Utilities Regulation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "PURO II"
            ],
            [
            "PosCode"      => "30786",
            "PositionName" => "Radiologic  Technologist I",
            "SalaryGrade"  => "8",
            "ShortName"    => "RT I"
            ],
            [
            "PosCode"      => "30787",
            "PositionName" => "Radiologic  Technologist II",
            "SalaryGrade"  => "10",
            "ShortName"    => "RT II"
            ],
            [
            "PosCode"      => "30788",
            "PositionName" => "Radiologic  Technologist III",
            "SalaryGrade"  => "13",
            "ShortName"    => "RT III"
            ],
            [
            "PosCode"      => "30789",
            "PositionName" => "Radiologic  Technologist IV",
            "SalaryGrade"  => "16",
            "ShortName"    => "RT IV"
            ],
            [
            "PosCode"      => "30790",
            "PositionName" => "Records Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "RO I"
            ],
            [
            "PosCode"      => "30791",
            "PositionName" => "Records Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "RO II"
            ],
            [
            "PosCode"      => "30792",
            "PositionName" => "Records Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "RO III"
            ],
            [
            "PosCode"      => "30793",
            "PositionName" => "Records Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "RO IV"
            ],
            [
            "PosCode"      => "30794",
            "PositionName" => "Records Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "RO V"
            ],
            [
            "PosCode"      => "30795",
            "PositionName" => "Recreation And Welfare Services Assistant",
            "SalaryGrade"  => "7",
            "ShortName"    => "RWSA"
            ],
            [
            "PosCode"      => "30796",
            "PositionName" => "Recreation And Welfare Services Officer I",
            "SalaryGrade"  => "9",
            "ShortName"    => "RWSO I"
            ],
            [
            "PosCode"      => "30797",
            "PositionName" => "Recreation And Welfare Services Officer II",
            "SalaryGrade"  => "11",
            "ShortName"    => "RWSO II"
            ],
            [
            "PosCode"      => "30798",
            "PositionName" => "Recreation And Welfare Services Officer III",
            "SalaryGrade"  => "15",
            "ShortName"    => "RWSO III"
            ],
            [
            "PosCode"      => "30799",
            "PositionName" => "Recreation And Welfare Services Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "RWSO IV"
            ],
            [
            "PosCode"      => "30800",
            "PositionName" => "Recreation And Welfare Services Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "RWSO V"
            ],
            [
            "PosCode"      => "30801",
            "PositionName" => "Recreation And Welfare Services Officer Vi",
            "SalaryGrade"  => "24",
            "ShortName"    => "RWSO Vi"
            ],
            [
            "PosCode"      => "30802",
            "PositionName" => "Registrar I",
            "SalaryGrade"  => "11",
            "ShortName"    => "RE I"
            ],
            [
            "PosCode"      => "30803",
            "PositionName" => "Registrar II",
            "SalaryGrade"  => "15",
            "ShortName"    => "RE II"
            ],
            [
            "PosCode"      => "30804",
            "PositionName" => "Registrar III",
            "SalaryGrade"  => "18",
            "ShortName"    => "RE III"
            ],
            [
            "PosCode"      => "30805",
            "PositionName" => "Registration Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "REO I"
            ],
            [
            "PosCode"      => "30806",
            "PositionName" => "Registration Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "REO II"
            ],
            [
            "PosCode"      => "30807",
            "PositionName" => "Registration Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "REO III"
            ],
            [
            "PosCode"      => "30808",
            "PositionName" => "Registration Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "REO IV"
            ],
            [
            "PosCode"      => "30809",
            "PositionName" => "Registration Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "REO V"
            ],
            [
            "PosCode"      => "30810",
            "PositionName" => "Reproduction  Machine Operator II",
            "SalaryGrade"  => "4",
            "ShortName"    => "RMO II"
            ],
            [
            "PosCode"      => "30811",
            "PositionName" => "Reproduction  Machine Operator III",
            "SalaryGrade"  => "7",
            "ShortName"    => "RMO III"
            ],
            [
            "PosCode"      => "30812",
            "PositionName" => "Reproduction Machine Operator  I",
            "SalaryGrade"  => "2",
            "ShortName"    => "RMO I"
            ],
            [
            "PosCode"      => "30813",
            "PositionName" => "Revenue Collection Clerk I",
            "SalaryGrade"  => "5",
            "ShortName"    => "RCC I"
            ],
            [
            "PosCode"      => "30814",
            "PositionName" => "Revenue Collection Clerk II",
            "SalaryGrade"  => "7",
            "ShortName"    => "RCC II"
            ],
            [
            "PosCode"      => "30815",
            "PositionName" => "Revenue Collection Clerk III",
            "SalaryGrade"  => "9",
            "ShortName"    => "RCC III"
            ],
            [
            "PosCode"      => "30816",
            "PositionName" => "Rural Health Physician",
            "SalaryGrade"  => "24",
            "ShortName"    => "RHP"
            ],
            [
            "PosCode"      => "30817",
            "PositionName" => "Sales And Promotion Supervisor I",
            "SalaryGrade"  => "10",
            "ShortName"    => "SPS I"
            ],
            [
            "PosCode"      => "30818",
            "PositionName" => "Sales And Promotion Supervisor II",
            "SalaryGrade"  => "14",
            "ShortName"    => "SPS II"
            ],
            [
            "PosCode"      => "30819",
            "PositionName" => "Sales Representative",
            "SalaryGrade"  => "6",
            "ShortName"    => "SR"
            ],
            [
            "PosCode"      => "30820",
            "PositionName" => "Sangguniang Bayan Member 1",
            "SalaryGrade"  => "24",
            "ShortName"    => "SBM I"
            ],
            [
            "PosCode"      => "30821",
            "PositionName" => "Sangguniang Bayan Member 1i",
            "SalaryGrade"  => "25",
            "ShortName"    => "SBM Ii"
            ],
            [
            "PosCode"      => "30822",
            "PositionName" => "Sangguniang Panlalawigan Member",
            "SalaryGrade"  => "27",
            "ShortName"    => "SPM"
            ],
            [
            "PosCode"      => "30823",
            "PositionName" => "Sangguniang Panlunsod Member I",
            "SalaryGrade"  => "25",
            "ShortName"    => "SPM I"
            ],
            [
            "PosCode"      => "30824",
            "PositionName" => "Sangguniang Panlunsod Member II",
            "SalaryGrade"  => "27",
            "ShortName"    => "SPM II"
            ],
            [
            "PosCode"      => "30825",
            "PositionName" => "Sanguniang Panlalawigan Counterpart",
            "SalaryGrade"  => "3",
            "ShortName"    => "SPC"
            ],
            [
            "PosCode"      => "30826",
            "PositionName" => "Sanitation Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "SI I"
            ],
            [
            "PosCode"      => "30827",
            "PositionName" => "Sanitation Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "SI II"
            ],
            [
            "PosCode"      => "30828",
            "PositionName" => "Sanitation Inspector III",
            "SalaryGrade"  => "11",
            "ShortName"    => "SI III"
            ],
            [
            "PosCode"      => "30829",
            "PositionName" => "Sanitation Inspector IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "SI IV"
            ],
            [
            "PosCode"      => "30830",
            "PositionName" => "Sanitation Inspector V",
            "SalaryGrade"  => "15",
            "ShortName"    => "SI V"
            ],
            [
            "PosCode"      => "30831",
            "PositionName" => "Sanitation Inspector Vi",
            "SalaryGrade"  => "18",
            "ShortName"    => "SI Vi"
            ],
            [
            "PosCode"      => "30832",
            "PositionName" => "School Credits Evaluator",
            "SalaryGrade"  => "11",
            "ShortName"    => "SCE"
            ],
            [
            "PosCode"      => "30833",
            "PositionName" => "Seamstress",
            "SalaryGrade"  => "2",
            "ShortName"    => "SEAM"
            ],
            [
            "PosCode"      => "30834",
            "PositionName" => "Secretary I (b)",
            "SalaryGrade"  => "7",
            "ShortName"    => "SEC I(b)"
            ],
            [
            "PosCode"      => "30835",
            "PositionName" => "Secretary Ii (a)",
            "SalaryGrade"  => "9",
            "ShortName"    => "SEC Ii(a)"
            ],
            [
            "PosCode"      => "30836",
            "PositionName" => "Secretary To The Sangguniang Bayan I",
            "SalaryGrade"  => "24",
            "ShortName"    => "SSB"
            ],
            [
            "PosCode"      => "30837",
            "PositionName" => "Secretary To The Sangguniang Bayan II",
            "SalaryGrade"  => "25",
            "ShortName"    => "SSB II"
            ],
            [
            "PosCode"      => "30838",
            "PositionName" => "Secretary To The Sangguniang Panlalawigan",
            "SalaryGrade"  => "26",
            "ShortName"    => "SSP"
            ],
            [
            "PosCode"      => "30839",
            "PositionName" => "Secretary To The Sangguniang Panlunsod I",
            "SalaryGrade"  => "25",
            "ShortName"    => "SSP I"
            ],
            [
            "PosCode"      => "30840",
            "PositionName" => "Secretary To The Sangguniang Panlunsod II",
            "SalaryGrade"  => "26",
            "ShortName"    => "SSP II"
            ],
            [
            "PosCode"      => "30841",
            "PositionName" => "Secretary To The Sangguniang Panlunsod III",
            "SalaryGrade"  => "27",
            "ShortName"    => "SSP III"
            ],
            [
            "PosCode"      => "30842",
            "PositionName" => "Security Adviser",
            "SalaryGrade"  => "1",
            "ShortName"    => "SA"
            ],
            [
            "PosCode"      => "30843",
            "PositionName" => "Security Agent I",
            "SalaryGrade"  => "8",
            "ShortName"    => "SA I"
            ],
            [
            "PosCode"      => "30844",
            "PositionName" => "Security Agent II",
            "SalaryGrade"  => "10",
            "ShortName"    => "SA II"
            ],
            [
            "PosCode"      => "30845",
            "PositionName" => "Security Guard",
            "SalaryGrade"  => "1",
            "ShortName"    => "SG"
            ],
            [
            "PosCode"      => "30846",
            "PositionName" => "Security Guard I",
            "SalaryGrade"  => "3",
            "ShortName"    => "SG I"
            ],
            [
            "PosCode"      => "30847",
            "PositionName" => "Security Guard II",
            "SalaryGrade"  => "5",
            "ShortName"    => "SG II"
            ],
            [
            "PosCode"      => "30848",
            "PositionName" => "Security Guard III",
            "SalaryGrade"  => "8",
            "ShortName"    => "SG III"
            ],
            [
            "PosCode"      => "30849",
            "PositionName" => "Security Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "SO I"
            ],
            [
            "PosCode"      => "30850",
            "PositionName" => "Security Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "SO II"
            ],
            [
            "PosCode"      => "30851",
            "PositionName" => "Security Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "SO III"
            ],
            [
            "PosCode"      => "30852",
            "PositionName" => "Security Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "SO IV"
            ],
            [
            "PosCode"      => "30853",
            "PositionName" => "Security Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "SO V"
            ],
            [
            "PosCode"      => "30854",
            "PositionName" => "Senior Agriculturist",
            "SalaryGrade"  => "18",
            "ShortName"    => "SAGRI"
            ],
            [
            "PosCode"      => "30855",
            "PositionName" => "Senior Aquaculturist",
            "SalaryGrade"  => "18",
            "ShortName"    => "SAQUA"
            ],
            [
            "PosCode"      => "30856",
            "PositionName" => "Senior Bookkeeper",
            "SalaryGrade"  => "9",
            "ShortName"    => "SBK"
            ],
            [
            "PosCode"      => "30857",
            "PositionName" => "Senior Coorperatives Development Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "SCDS"
            ],
            [
            "PosCode"      => "30858",
            "PositionName" => "Senior Environmental Management Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "SEMS"
            ],
            [
            "PosCode"      => "30859",
            "PositionName" => "Senior Home Management Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "SHMS"
            ],
            [
            "PosCode"      => "30860",
            "PositionName" => "Senior Labor Employment Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "SLEO"
            ],
            [
            "PosCode"      => "30861",
            "PositionName" => "Senior Manpower Development Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "SMDO"
            ],
            [
            "PosCode"      => "30862",
            "PositionName" => "Senior Public Utilities Regulation Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "SPURO"
            ],
            [
            "PosCode"      => "30863",
            "PositionName" => "Senior Tourism Operations Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "STOO"
            ],
            [
            "PosCode"      => "30864",
            "PositionName" => "Senior Transportation Regulation Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "STRO"
            ],
            [
            "PosCode"      => "30865",
            "PositionName" => "Slaughterhouse Master I",
            "SalaryGrade"  => "10",
            "ShortName"    => "SM I"
            ],
            [
            "PosCode"      => "30866",
            "PositionName" => "Slaughterhouse Master II",
            "SalaryGrade"  => "14",
            "ShortName"    => "SM II"
            ],
            [
            "PosCode"      => "30867",
            "PositionName" => "Slaughterhouse Master III",
            "SalaryGrade"  => "18",
            "ShortName"    => "SM III"
            ],
            [
            "PosCode"      => "30868",
            "PositionName" => "Slaughterhouse Master IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "SM IV"
            ],
            [
            "PosCode"      => "30869",
            "PositionName" => "Social Welfare Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "SWA"
            ],
            [
            "PosCode"      => "30870",
            "PositionName" => "Social Welfare Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "SWAS"
            ],
            [
            "PosCode"      => "30871",
            "PositionName" => "Social Welfare Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "SWO I"
            ],
            [
            "PosCode"      => "30872",
            "PositionName" => "Social Welfare Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "SWO II"
            ],
            [
            "PosCode"      => "30873",
            "PositionName" => "Social Welfare Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "SWO III"
            ],
            [
            "PosCode"      => "30874",
            "PositionName" => "Social Welfare Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "SWO IV"
            ],
            [
            "PosCode"      => "30875",
            "PositionName" => "Social Welfare Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "SWO IV"
            ],
            [
            "PosCode"      => "30876",
            "PositionName" => "Sociologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "SOCIO"
            ],
            [
            "PosCode"      => "30877",
            "PositionName" => "Special Agent I",
            "SalaryGrade"  => "8",
            "ShortName"    => "SPA I"
            ],
            [
            "PosCode"      => "30878",
            "PositionName" => "Special Agent II",
            "SalaryGrade"  => "10",
            "ShortName"    => "SPA II"
            ],
            [
            "PosCode"      => "30879",
            "PositionName" => "Special Investigator I",
            "SalaryGrade"  => "11",
            "ShortName"    => "SPI I"
            ],
            [
            "PosCode"      => "30880",
            "PositionName" => "Special Operations Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "SOO I"
            ],
            [
            "PosCode"      => "30881",
            "PositionName" => "Special Operations Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "SOO II"
            ],
            [
            "PosCode"      => "30882",
            "PositionName" => "Special Operations Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "SOO III"
            ],
            [
            "PosCode"      => "30883",
            "PositionName" => "Special Operations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "SOO IV"
            ],
            [
            "PosCode"      => "30884",
            "PositionName" => "Special Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "SOO V"
            ],
            [
            "PosCode"      => "30885",
            "PositionName" => "Sports And Games Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "SGI I"
            ],
            [
            "PosCode"      => "30886",
            "PositionName" => "Sports And Games Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "SGI II"
            ],
            [
            "PosCode"      => "30887",
            "PositionName" => "Sports And Games Regulation Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "SGRO I"
            ],
            [
            "PosCode"      => "30888",
            "PositionName" => "Sports And Games Regulation Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "SGRO II"
            ],
            [
            "PosCode"      => "30889",
            "PositionName" => "Sports Development Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "SDO I"
            ],
            [
            "PosCode"      => "30890",
            "PositionName" => "Sports Development Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "SDO II"
            ],
            [
            "PosCode"      => "30891",
            "PositionName" => "Sports Development Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "SDO III"
            ],
            [
            "PosCode"      => "30892",
            "PositionName" => "Sports Development Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "SDO IV"
            ],
            [
            "PosCode"      => "30893",
            "PositionName" => "Sports Development Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "SDO IV"
            ],
            [
            "PosCode"      => "30894",
            "PositionName" => "Statistician Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "SA"
            ],
            [
            "PosCode"      => "30895",
            "PositionName" => "Statistician I",
            "SalaryGrade"  => "11",
            "ShortName"    => "STA I"
            ],
            [
            "PosCode"      => "30896",
            "PositionName" => "Statistician II",
            "SalaryGrade"  => "15",
            "ShortName"    => "STA II"
            ],
            [
            "PosCode"      => "30897",
            "PositionName" => "Statistician III",
            "SalaryGrade"  => "18",
            "ShortName"    => "SAT III"
            ],
            [
            "PosCode"      => "30898",
            "PositionName" => "Statistician IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "STA IV"
            ],
            [
            "PosCode"      => "30899",
            "PositionName" => "Statistician V",
            "SalaryGrade"  => "24",
            "ShortName"    => "STA V"
            ],
            [
            "PosCode"      => "30900",
            "PositionName" => "Stenographer I",
            "SalaryGrade"  => "4",
            "ShortName"    => "STE I"
            ],
            [
            "PosCode"      => "30901",
            "PositionName" => "Stenographer II",
            "SalaryGrade"  => "6",
            "ShortName"    => "STE II"
            ],
            [
            "PosCode"      => "30902",
            "PositionName" => "Stenographer III",
            "SalaryGrade"  => "9",
            "ShortName"    => "STE III"
            ],
            [
            "PosCode"      => "30903",
            "PositionName" => "Stenographic Reporter I",
            "SalaryGrade"  => "7",
            "ShortName"    => "STERE I"
            ],
            [
            "PosCode"      => "30904",
            "PositionName" => "Stenographic Reporter II",
            "SalaryGrade"  => "8",
            "ShortName"    => "STERE II"
            ],
            [
            "PosCode"      => "30905",
            "PositionName" => "Stenographic Reporter III",
            "SalaryGrade"  => "11",
            "ShortName"    => "STERE III"
            ],
            [
            "PosCode"      => "30906",
            "PositionName" => "Stenographic Reporter IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "STERE IV"
            ],
            [
            "PosCode"      => "30907",
            "PositionName" => "Storekeeper",
            "SalaryGrade"  => "3",
            "ShortName"    => "STO"
            ],
            [
            "PosCode"      => "30908",
            "PositionName" => "Storekeeper I",
            "SalaryGrade"  => "4",
            "ShortName"    => "STO I"
            ],
            [
            "PosCode"      => "30909",
            "PositionName" => "Storekeeper II",
            "SalaryGrade"  => "6",
            "ShortName"    => "STO II"
            ],
            [
            "PosCode"      => "30910",
            "PositionName" => "Storekeeper III",
            "SalaryGrade"  => "9",
            "ShortName"    => "STO III"
            ],
            [
            "PosCode"      => "30911",
            "PositionName" => "Storekeeper Iv(a)",
            "SalaryGrade"  => "11",
            "ShortName"    => "STO IV(A)"
            ],
            [
            "PosCode"      => "30912",
            "PositionName" => "Supervising Agriculturist",
            "SalaryGrade"  => "22",
            "ShortName"    => "SPAGRI"
            ],
            [
            "PosCode"      => "30913",
            "PositionName" => "Supervising Aquaculturist",
            "SalaryGrade"  => "22",
            "ShortName"    => "SPAQUA"
            ],
            [
            "PosCode"      => "30914",
            "PositionName" => "Supervising Cooperatives Development Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "SCDS"
            ],
            [
            "PosCode"      => "30915",
            "PositionName" => "Supervising Environmental Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "SEMS"
            ],
            [
            "PosCode"      => "30916",
            "PositionName" => "Supervising Home Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "SHMS"
            ],
            [
            "PosCode"      => "30917",
            "PositionName" => "Supervising Labor And Employment Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "SLEO"
            ],
            [
            "PosCode"      => "30918",
            "PositionName" => "Supervising Manpower Development Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "SMDO"
            ],
            [
            "PosCode"      => "30919",
            "PositionName" => "Supervising Public Utilities Regulation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "SPURO"
            ],
            [
            "PosCode"      => "30920",
            "PositionName" => "Supervising Tourism Operations Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "STOO"
            ],
            [
            "PosCode"      => "30921",
            "PositionName" => "Supervising Tranportation Regulation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "STRO"
            ],
            [
            "PosCode"      => "30922",
            "PositionName" => "Supply Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "SO I"
            ],
            [
            "PosCode"      => "30923",
            "PositionName" => "Supply Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "SO II"
            ],
            [
            "PosCode"      => "30924",
            "PositionName" => "Supply Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "SO III"
            ],
            [
            "PosCode"      => "30925",
            "PositionName" => "Supply Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "SO IV"
            ],
            [
            "PosCode"      => "30926",
            "PositionName" => "Supply Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "SO V"
            ],
            [
            "PosCode"      => "30927",
            "PositionName" => "Tax Mapper I",
            "SalaryGrade"  => "11",
            "ShortName"    => "TM I"
            ],
            [
            "PosCode"      => "30928",
            "PositionName" => "Tax Mapper II",
            "SalaryGrade"  => "15",
            "ShortName"    => "TM II"
            ],
            [
            "PosCode"      => "30929",
            "PositionName" => "Tax Mapper III",
            "SalaryGrade"  => "18",
            "ShortName"    => "TM III"
            ],
            [
            "PosCode"      => "30930",
            "PositionName" => "Tax Mapper IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "TM IV"
            ],
            [
            "PosCode"      => "30931",
            "PositionName" => "Tax Mapper V",
            "SalaryGrade"  => "24",
            "ShortName"    => "TM V"
            ],
            [
            "PosCode"      => "30932",
            "PositionName" => "Tax Mapping Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "TMA"
            ],
            [
            "PosCode"      => "30933",
            "PositionName" => "Teacher I (elementary Grades)",
            "SalaryGrade"  => "11",
            "ShortName"    => "TEA I(ELEM)"
            ],
            [
            "PosCode"      => "30934",
            "PositionName" => "Teacher I (pre-school)",
            "SalaryGrade"  => "10",
            "ShortName"    => "TEA I(PRE)"
            ],
            [
            "PosCode"      => "30935",
            "PositionName" => "Teacher I (secondary Grades)",
            "SalaryGrade"  => "11",
            "ShortName"    => "TEA I(SEC)"
            ],
            [
            "PosCode"      => "30936",
            "PositionName" => "Teacher I (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "10",
            "ShortName"    => "TEA I(VOC)"
            ],
            [
            "PosCode"      => "30937",
            "PositionName" => "Teacher Ii (elementary Grades)",
            "SalaryGrade"  => "11",
            "ShortName"    => "TEA II(ELEM)"
            ],
            [
            "PosCode"      => "30938",
            "PositionName" => "Teacher Ii (pre-school)",
            "SalaryGrade"  => "11",
            "ShortName"    => "TEA II(PRE)"
            ],
            [
            "PosCode"      => "30939",
            "PositionName" => "Teacher Ii (secondary Grades)",
            "SalaryGrade"  => "11",
            "ShortName"    => "TEA II(SEC)"
            ],
            [
            "PosCode"      => "30940",
            "PositionName" => "Teacher Ii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "11",
            "ShortName"    => "TEA II(V0C)"
            ],
            [
            "PosCode"      => "30941",
            "PositionName" => "Teacher Iii (elementary Grades)",
            "SalaryGrade"  => "12",
            "ShortName"    => "TEA III(ELEM)"
            ],
            [
            "PosCode"      => "30942",
            "PositionName" => "Teacher Iii (pre-school)",
            "SalaryGrade"  => "12",
            "ShortName"    => "TEA III(PRE)"
            ],
            [
            "PosCode"      => "30943",
            "PositionName" => "Teacher Iii (secondary Grades)",
            "SalaryGrade"  => "12",
            "ShortName"    => "TEA III(SEC)"
            ],
            [
            "PosCode"      => "30944",
            "PositionName" => "Teacher Iii (vocational And Two Years Technical Course",
            "SalaryGrade"  => "12",
            "ShortName"    => "TEA III(VOC)"
            ],
            [
            "PosCode"      => "30945",
            "PositionName" => "Technical Assistant",
            "SalaryGrade"  => "1",
            "ShortName"    => "TA"
            ],
            [
            "PosCode"      => "30946",
            "PositionName" => "Ticket Checker",
            "SalaryGrade"  => "3",
            "ShortName"    => "TC"
            ],
            [
            "PosCode"      => "30947",
            "PositionName" => "Tourism Operations Assistant",
            "SalaryGrade"  => "7",
            "ShortName"    => "TOA"
            ],
            [
            "PosCode"      => "30948",
            "PositionName" => "Tourism Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "TOO I"
            ],
            [
            "PosCode"      => "30949",
            "PositionName" => "Tourism Operations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "TOO II"
            ],
            [
            "PosCode"      => "30950",
            "PositionName" => "Tourist Receptionist I",
            "SalaryGrade"  => "8",
            "ShortName"    => "TR I"
            ],
            [
            "PosCode"      => "30951",
            "PositionName" => "Tourist Receptionist II",
            "SalaryGrade"  => "10",
            "ShortName"    => "TR II"
            ],
            [
            "PosCode"      => "30952",
            "PositionName" => "Traffic Aide II",
            "SalaryGrade"  => "5",
            "ShortName"    => "TA II"
            ],
            [
            "PosCode"      => "30953",
            "PositionName" => "Traffic Aide III",
            "SalaryGrade"  => "7",
            "ShortName"    => "TA III"
            ],
            [
            "PosCode"      => "30954",
            "PositionName" => "Traffic Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "TROO I"
            ],
            [
            "PosCode"      => "30955",
            "PositionName" => "Traffic Operations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "TROO II"
            ],
            [
            "PosCode"      => "30956",
            "PositionName" => "Traffic Operations Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "TROO III"
            ],
            [
            "PosCode"      => "30957",
            "PositionName" => "Traffic Operations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "TROO IV"
            ],
            [
            "PosCode"      => "30958",
            "PositionName" => "Traffic Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "TROO V"
            ],
            [
            "PosCode"      => "30959",
            "PositionName" => "Translator I",
            "SalaryGrade"  => "8",
            "ShortName"    => "TR I"
            ],
            [
            "PosCode"      => "30960",
            "PositionName" => "Translator II",
            "SalaryGrade"  => "11",
            "ShortName"    => "TR II"
            ],
            [
            "PosCode"      => "30961",
            "PositionName" => "Transportation Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "TRO I"
            ],
            [
            "PosCode"      => "30962",
            "PositionName" => "Transportation Regulation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "TRO II"
            ],
            [
            "PosCode"      => "30963",
            "PositionName" => "University Research Associate I",
            "SalaryGrade"  => "12",
            "ShortName"    => "URA I"
            ],
            [
            "PosCode"      => "30964",
            "PositionName" => "University Research Associate II",
            "SalaryGrade"  => "14",
            "ShortName"    => "URA II"
            ],
            [
            "PosCode"      => "30965",
            "PositionName" => "University Researcher I",
            "SalaryGrade"  => "16",
            "ShortName"    => "UR I"
            ],
            [
            "PosCode"      => "30966",
            "PositionName" => "University Researcher II",
            "SalaryGrade"  => "18",
            "ShortName"    => "UR II"
            ],
            [
            "PosCode"      => "30967",
            "PositionName" => "University Researcher III",
            "SalaryGrade"  => "20",
            "ShortName"    => "UR III"
            ],
            [
            "PosCode"      => "30968",
            "PositionName" => "University Researcher IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "UR IV"
            ],
            [
            "PosCode"      => "30969",
            "PositionName" => "University Researcher V",
            "SalaryGrade"  => "24",
            "ShortName"    => "UR V"
            ],
            [
            "PosCode"      => "30970",
            "PositionName" => "Utility Foreman",
            "SalaryGrade"  => "6",
            "ShortName"    => "UF"
            ],
            [
            "PosCode"      => "30971",
            "PositionName" => "Utility Worker I",
            "SalaryGrade"  => "1",
            "ShortName"    => "UW I"
            ],
            [
            "PosCode"      => "30972",
            "PositionName" => "Utility Worker I *",
            "SalaryGrade"  => "2",
            "ShortName"    => "UW I*"
            ],
            [
            "PosCode"      => "30973",
            "PositionName" => "Utility Worker I **",
            "SalaryGrade"  => "3",
            "ShortName"    => "UW I**"
            ],
            [
            "PosCode"      => "30974",
            "PositionName" => "Utility Worker I ***",
            "SalaryGrade"  => "5",
            "ShortName"    => "UW I***"
            ],
            [
            "PosCode"      => "30975",
            "PositionName" => "Utility Worker II",
            "SalaryGrade"  => "3",
            "ShortName"    => "UW II"
            ],
            [
            "PosCode"      => "30976",
            "PositionName" => "Utility Worker II*",
            "SalaryGrade"  => "5",
            "ShortName"    => "UW II*"
            ],
            [
            "PosCode"      => "30977",
            "PositionName" => "Utility Worker II**                            ",
            "SalaryGrade"  => "4",
            "ShortName"    => "UW II **"
            ],
            [
            "PosCode"      => "30978",
            "PositionName" => "Veterinarian I",
            "SalaryGrade"  => "13",
            "ShortName"    => "VET I"
            ],
            [
            "PosCode"      => "30979",
            "PositionName" => "Veterinarian II",
            "SalaryGrade"  => "16",
            "ShortName"    => "VET II"
            ],
            [
            "PosCode"      => "30980",
            "PositionName" => "Veterinarian III",
            "SalaryGrade"  => "19",
            "ShortName"    => "VET III"
            ],
            [
            "PosCode"      => "30981",
            "PositionName" => "Veterinarian IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "VET IV"
            ],
            [
            "PosCode"      => "30982",
            "PositionName" => "Veterinarian V",
            "SalaryGrade"  => "24",
            "ShortName"    => "VET V"
            ],
            [
            "PosCode"      => "30983",
            "PositionName" => "Vice- Governor",
            "SalaryGrade"  => "28",
            "ShortName"    => "VG"
            ],
            [
            "PosCode"      => "30984",
            "PositionName" => "Vocational School Administrator I",
            "SalaryGrade"  => "22",
            "ShortName"    => "VSA I"
            ],
            [
            "PosCode"      => "30985",
            "PositionName" => "Vocational School Administrator II",
            "SalaryGrade"  => "23",
            "ShortName"    => "VSA II"
            ],
            [
            "PosCode"      => "30986",
            "PositionName" => "Vocational School Administrator III",
            "SalaryGrade"  => "24",
            "ShortName"    => "VSA III"
            ],
            [
            "PosCode"      => "30987",
            "PositionName" => "Waiter I",
            "SalaryGrade"  => "2",
            "ShortName"    => "WAI I"
            ],
            [
            "PosCode"      => "30988",
            "PositionName" => "Waiter II",
            "SalaryGrade"  => "4",
            "ShortName"    => "WAI II"
            ],
            [
            "PosCode"      => "30989",
            "PositionName" => "Warehouseman I",
            "SalaryGrade"  => "6",
            "ShortName"    => "WH I"
            ],
            [
            "PosCode"      => "30990",
            "PositionName" => "Warehouseman II",
            "SalaryGrade"  => "8",
            "ShortName"    => "WH II"
            ],
            [
            "PosCode"      => "30991",
            "PositionName" => "Warehouseman III",
            "SalaryGrade"  => "11",
            "ShortName"    => "WH III"
            ],
            [
            "PosCode"      => "30992",
            "PositionName" => "Warehouseman IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "WH IV"
            ],
            [
            "PosCode"      => "30993",
            "PositionName" => "Watchman  I",
            "SalaryGrade"  => "2",
            "ShortName"    => "WA I"
            ],
            [
            "PosCode"      => "30994",
            "PositionName" => "Watchman II",
            "SalaryGrade"  => "4",
            "ShortName"    => "WA II"
            ],
            [
            "PosCode"      => "30995",
            "PositionName" => "Watchman III",
            "SalaryGrade"  => "7",
            "ShortName"    => "WA III"
            ],
            [
            "PosCode"      => "30996",
            "PositionName" => "Water Pump Operator",
            "SalaryGrade"  => "4",
            "ShortName"    => "WPO"
            ],
            [
            "PosCode"      => "30997",
            "PositionName" => "Waterworks Superintendent I",
            "SalaryGrade"  => "18",
            "ShortName"    => "WS I"
            ],
            [
            "PosCode"      => "30998",
            "PositionName" => "Waterworks Superintendent II",
            "SalaryGrade"  => "22",
            "ShortName"    => "WS II"
            ],
            [
            "PosCode"      => "30999",
            "PositionName" => "Waterworks Supervisor",
            "SalaryGrade"  => "14",
            "ShortName"    => "WS"
            ],
            [
            "PosCode"      => "31000",
            "PositionName" => "Waterworks Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "WT"
            ],
            [
            "PosCode"      => "31001",
            "PositionName" => "Welder Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "WF"
            ],
            [
            "PosCode"      => "31002",
            "PositionName" => "Welder I",
            "SalaryGrade"  => "4",
            "ShortName"    => "WE I"
            ],
            [
            "PosCode"      => "31003",
            "PositionName" => "Welder II",
            "SalaryGrade"  => "6",
            "ShortName"    => "WE II"
            ],
            [
            "PosCode"      => "31004",
            "PositionName" => "Well Driller  I",
            "SalaryGrade"  => "3",
            "ShortName"    => "WD I"
            ],
            [
            "PosCode"      => "31005",
            "PositionName" => "Well Driller II",
            "SalaryGrade"  => "5",
            "ShortName"    => "WD II"
            ],
            [
            "PosCode"      => "31006",
            "PositionName" => "Youth Development Assistant I",
            "SalaryGrade"  => "4",
            "ShortName"    => "YDA I"
            ],
            [
            "PosCode"      => "31007",
            "PositionName" => "Youth Development Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "YDA II"
            ],
            [
            "PosCode"      => "31008",
            "PositionName" => "Youth Development Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "YDO I"
            ],
            [
            "PosCode"      => "31009",
            "PositionName" => "Youth Development Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "YDO II"
            ],
            [
            "PosCode"      => "31010",
            "PositionName" => "Youth Development Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "YDO III"
            ],
            [
            "PosCode"      => "31011",
            "PositionName" => "Youth Development Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "YDO IV"
            ],
            [
            "PosCode"      => "31012",
            "PositionName" => "Youth Development Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "YDO V"
            ],
            [
            "PosCode"      => "31013",
            "PositionName" => "Zoning Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "ZI I"
            ],
            [
            "PosCode"      => "31014",
            "PositionName" => "Zoning Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "ZI II"
            ],
            [
            "PosCode"      => "31015",
            "PositionName" => "Zoning Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "ZO I"
            ],
            [
            "PosCode"      => "31016",
            "PositionName" => "Zoning Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "ZO II"
            ],
            [
            "PosCode"      => "31017",
            "PositionName" => "Zoning Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "ZO III"
            ],
            [
            "PosCode"      => "31018",
            "PositionName" => "Zoning Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "ZO IV"
            ],
            [
            "PosCode"      => "31019",
            "PositionName" => "Zoologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "ZOO I"
            ],
            [
            "PosCode"      => "31020",
            "PositionName" => "Zoologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "ZOO II"
            ],
            [
            "PosCode"      => "31021",
            "PositionName" => "Zoologist III",
            "SalaryGrade"  => "18",
            "ShortName"    => "ZOO III"
            ],
            [
            "PosCode"      => "31022",
            "PositionName" => "Zoologist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "ZOO IV"
            ],
            [
            "PosCode"      => "31023",
            "PositionName" => "Zoologist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "ZOO V"
            ],
            [
            "PosCode"      => "31024",
            "PositionName" => "Provincial Secretary",
            "SalaryGrade"  => "26",
            "ShortName"    => "PS"
            ],
            [
            "PosCode"      => "31025",
            "PositionName" => "Crafts And Trade Helper",
            "SalaryGrade"  => "1",
            "ShortName"    => "CTH"
            ],
            [
            "PosCode"      => "31026",
            "PositionName" => "Provincial Fisheries And Aquatic Resources Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "PFARO"
            ],
            [
            "PosCode"      => "31027",
            "PositionName" => "Assistant Provincial ENR Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "APENRO"
            ],
            [
            "PosCode"      => "31028",
            "PositionName" => "Asst. Provincial General Services Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "APGSO"
            ],
            [
            "PosCode"      => "31029",
            "PositionName" => "IT - CONSULTANT",
            "SalaryGrade"  => "11",
            "ShortName"    => "ITC"
            ],
            [
            "PosCode"      => "31030",
            "PositionName" => "Executive Consultant",
            "SalaryGrade"  => "12",
            "ShortName"    => "EXCON"
            ],
            [
            "PosCode"      => "31031",
            "PositionName" => "Sangguniang Panlalawigan Member - PCL",
            "SalaryGrade"  => "31",
            "ShortName"    => "SPM-TCL"
            ],
            [
            "PosCode"      => "31032",
            "PositionName" => "LABORER I",
            "SalaryGrade"  => "1",
            "ShortName"    => "LA 1"
            ],
            [
            "PosCode"      => "31033",
            "PositionName" => "Exec. Consultant on Local and Foriegn Employment",
            "SalaryGrade"  => "22",
            "ShortName"    => "ECLFE"
            ],
            [
            "PosCode"      => "31034",
            "PositionName" => "Accountant V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31035",
            "PositionName" => "Accounting Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31038",
            "PositionName" => "Accounting Machine Operator III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31036",
            "PositionName" => "Accounting Machine Operator I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31037",
            "PositionName" => "Accounting Machine Operator II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31039",
            "PositionName" => "Accounting Processor A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31040",
            "PositionName" => "Accounting Processor B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31041",
            "PositionName" => "Accounting Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31042",
            "PositionName" => "Accounting Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31045",
            "PositionName" => "Accounts Examiner III",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31043",
            "PositionName" => "Accounts Examiner I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31044",
            "PositionName" => "Accounts Examiner II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31046",
            "PositionName" => "Accounts Management Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31047",
            "PositionName" => "Accounts Management Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31048",
            "PositionName" => "Accounts Management Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31049",
            "PositionName" => "Accounts Management Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31050",
            "PositionName" => "Accounts Management Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31051",
            "PositionName" => "Accounts Manager",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31052",
            "PositionName" => "Accounts Officer",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31053",
            "PositionName" => "Acquired Assets Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31054",
            "PositionName" => "Acquired Assets Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31057",
            "PositionName" => "Acquired Assets Officer III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31055",
            "PositionName" => "Acquired Assets Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31056",
            "PositionName" => "Acquired Assets Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31058",
            "PositionName" => "Acquired Assets Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31059",
            "PositionName" => "Acquired Assets Officer V",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31060",
            "PositionName" => "Acquired Assets Officer VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31061",
            "PositionName" => "Actuarial Analyst I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31062",
            "PositionName" => "Actuarial Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31063",
            "PositionName" => "Actuarial Associate",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31064",
            "PositionName" => "Actuarial Researcher",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31065",
            "PositionName" => "Actuarial Researcher I",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31066",
            "PositionName" => "Actuarial Researcher II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31067",
            "PositionName" => "Actuary",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31070",
            "PositionName" => "Administration",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31071",
            "PositionName" => "Administration Services Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31072",
            "PositionName" => "Administration Services Assistant A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31073",
            "PositionName" => "Administration Services Assistant B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31074",
            "PositionName" => "Administration Services Assistant C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31076",
            "PositionName" => "Administrative Aide III",
            "SalaryGrade"  => "3",
            "ShortName"    => "ADM. AIDE III"
            ],
            [
            "PosCode"      => "31075",
            "PositionName" => "Administrative Aide I",
            "SalaryGrade"  => "1",
            "ShortName"    => "ADM. AIDE I"
            ],
            [
            "PosCode"      => "31077",
            "PositionName" => "Administrative Aide IV",
            "SalaryGrade"  => "4",
            "ShortName"    => "ADM. AIDE IV"
            ],
            [
            "PosCode"      => "31078",
            "PositionName" => "Administrative Aide V",
            "SalaryGrade"  => "5",
            "ShortName"    => "ADM. AIDE V"
            ],
            [
            "PosCode"      => "31079",
            "PositionName" => "Administrative Aide VI",
            "SalaryGrade"  => "6",
            "ShortName"    => "ADM. AIDE VI"
            ],
            [
            "PosCode"      => "31082",
            "PositionName" => "Administrative Assistant III",
            "SalaryGrade"  => "9",
            "ShortName"    => "ADMA III"
            ],
            [
            "PosCode"      => "31080",
            "PositionName" => "Administrative Assistant I",
            "SalaryGrade"  => "7",
            "ShortName"    => "ADMA I"
            ],
            [
            "PosCode"      => "31081",
            "PositionName" => "Administrative Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "ADMA II"
            ],
            [
            "PosCode"      => "31083",
            "PositionName" => "Administrative Assistant V",
            "SalaryGrade"  => "11",
            "ShortName"    => "ADMA V"
            ],
            [
            "PosCode"      => "31084",
            "PositionName" => "Administrative General Services Chief A",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31085",
            "PositionName" => "Administrative General Services Chief B",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31086",
            "PositionName" => "Administrative General Services Chief C",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31087",
            "PositionName" => "Administrative General Services Officer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31088",
            "PositionName" => "Administrative General Services Officer B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31089",
            "PositionName" => "Administrative Services Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31090",
            "PositionName" => "Administrative Services Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31092",
            "PositionName" => "Administrative Services Officer III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31091",
            "PositionName" => "Administrative Services Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31093",
            "PositionName" => "Administrative Services Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31094",
            "PositionName" => "Administrative Services Officer V",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31095",
            "PositionName" => "Administrative Services Officer VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31096",
            "PositionName" => "Administrator",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31099",
            "PositionName" => "Administrator III",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31097",
            "PositionName" => "Administrator I",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31098",
            "PositionName" => "Administrator II",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31100",
            "PositionName" => "Adminstrative Services Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31101",
            "PositionName" => "Advertizing Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31102",
            "PositionName" => "Advertizing Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31103",
            "PositionName" => "Advertizing Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31104",
            "PositionName" => "Aerial Photo Analyst I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31105",
            "PositionName" => "Aerial Photo Analyst II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31106",
            "PositionName" => "Agenda Minutes Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31107",
            "PositionName" => "Agenda Minutes Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31110",
            "PositionName" => "Agenda Minutes Officer III",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31108",
            "PositionName" => "Agenda Minutes Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31109",
            "PositionName" => "Agenda Minutes Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31111",
            "PositionName" => "Agenda Minutes Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31112",
            "PositionName" => "Agrarian Affairs Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31113",
            "PositionName" => "Agrarian Affairs Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31114",
            "PositionName" => "Agrarian Affairs Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31115",
            "PositionName" => "Agrarian Affairs Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31116",
            "PositionName" => "Agrarian Affairs Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31117",
            "PositionName" => "Agrarian Reform Program Technologist",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31118",
            "PositionName" => "Agrarian Reform Programs Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31119",
            "PositionName" => "Agrarian Reform Programs Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31120",
            "PositionName" => "Agricultural Center Chief I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31121",
            "PositionName" => "Agricultural Center Chief IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31123",
            "PositionName" => "Agricultural Center Chieft III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31122",
            "PositionName" => "Agricultural Center Chieft II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31124",
            "PositionName" => "Agricultural Product Inspector III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31125",
            "PositionName" => "Agricultural Products Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31126",
            "PositionName" => "Agricultural Products Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31127",
            "PositionName" => "Agricultural Program Coordinating Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31128",
            "PositionName" => "Agricultural Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31129",
            "PositionName" => "Agriculturist A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31130",
            "PositionName" => "Agriculturist B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31131",
            "PositionName" => "Agronomist A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31132",
            "PositionName" => "Agronomist B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31133",
            "PositionName" => "Air Conditioning Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31134",
            "PositionName" => "Air Conditioning Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31135",
            "PositionName" => "Air Navigation Services Supervisor",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31136",
            "PositionName" => "Air Navigation System Specialist I",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31137",
            "PositionName" => "Air Navigation System Specialist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31138",
            "PositionName" => "Air Terminal Supervisor",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31139",
            "PositionName" => "Air Traffic Controller I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31140",
            "PositionName" => "Air Traffic Controller II",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31143",
            "PositionName" => "Aircraft Mechanic III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31141",
            "PositionName" => "Aircraft Mechanic I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31142",
            "PositionName" => "Aircraft Mechanic II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31144",
            "PositionName" => "Aircraft Mechanic IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31145",
            "PositionName" => "Aircraft Production/maintenance Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31146",
            "PositionName" => "Aircraft Production/maintenance Assistant B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31147",
            "PositionName" => "Aircraft Production/maintenance Assistant C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31148",
            "PositionName" => "Aircraft Production/maintenance Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31149",
            "PositionName" => "Aircraft Production/maintenance Specialist A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31150",
            "PositionName" => "Aircraft Production/maintenance Specialist B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31151",
            "PositionName" => "Aircraft Production/maintenance Specialist C",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31152",
            "PositionName" => "Aircraft Production/maintenance Supervisor",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31153",
            "PositionName" => "Aircraft/avionics Maintenance Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31156",
            "PositionName" => "Airfield Power Technician III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31154",
            "PositionName" => "Airfield Power Technician I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31155",
            "PositionName" => "Airfield Power Technician II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31157",
            "PositionName" => "Airfield Power Technician IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31158",
            "PositionName" => "Airfield Power Technician V",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31159",
            "PositionName" => "Airmail Distribution Center Manager",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31162",
            "PositionName" => "Airport Manager III",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31160",
            "PositionName" => "Airport Manager I",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31161",
            "PositionName" => "Airport Manager II",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31163",
            "PositionName" => "Airport Manager IV",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31164",
            "PositionName" => "Airport Project Supervisor",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31165",
            "PositionName" => "Airway:communication Services Supervisor",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31166",
            "PositionName" => "Airways Communicator I",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31167",
            "PositionName" => "Airways Communicator II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31168",
            "PositionName" => "Ammunition Worker I",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31169",
            "PositionName" => "Ammunition Worker II",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31170",
            "PositionName" => "Animal Feed Control Officer",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31171",
            "PositionName" => "Architect B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31172",
            "PositionName" => "Archivist I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31173",
            "PositionName" => "Archivist II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31174",
            "PositionName" => "Armorer II",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31177",
            "PositionName" => "Artificial Limb & Brace Maker III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31175",
            "PositionName" => "Artificial Limb & Brace Maker I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31176",
            "PositionName" => "Artificial Limb & Brace Maker II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31178",
            "PositionName" => "Artist-illustritor I(C)",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31179",
            "PositionName" => "Assistant Administrator",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31180",
            "PositionName" => "Assistant Cabinet Secretary",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31181",
            "PositionName" => "Assistant Chief Air Navigation System",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31182",
            "PositionName" => "Assistant Chief Air Traffic Controller",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31183",
            "PositionName" => "Assistant Chief Airways Communicator",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31184",
            "PositionName" => "Assistant Chief Bookbinder",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31185",
            "PositionName" => "Assistant Chief Electrotyper",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31186",
            "PositionName" => "Assistant Chief Legal Counsel",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31187",
            "PositionName" => "Assistant Chief Of Staff (ovp)",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31188",
            "PositionName" => "Assistant Chief Photoengraver",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31189",
            "PositionName" => "Assistant Chief Pressman",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31190",
            "PositionName" => "Assistant Chief State Counsel",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31191",
            "PositionName" => "Assistant Chief State Prosecutor",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31192",
            "PositionName" => "Assistant Chief Typesetter",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31193",
            "PositionName" => "Assistant Claims Processor I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31194",
            "PositionName" => "Assistant Claims Processor II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31195",
            "PositionName" => "Assistant Commissioner",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31196",
            "PositionName" => "Assistant Commissioner, Constitutional Commission",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31197",
            "PositionName" => "Assistant Commissioner, Internal Revenue",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31198",
            "PositionName" => "Assistant Concertmaster",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31199",
            "PositionName" => "Assistant Customs Operations Officer",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31200",
            "PositionName" => "Assistant Department Manager A",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31201",
            "PositionName" => "Assistant Department Manager I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31202",
            "PositionName" => "Assistant Department Manager II",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31203",
            "PositionName" => "Assistant Director",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31204",
            "PositionName" => "Assistant Director General",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31205",
            "PositionName" => "Assistant Executive Secretary",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31206",
            "PositionName" => "Assistant Financial Claims Examiner",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31207",
            "PositionName" => "Assistant Fire Marshall",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31210",
            "PositionName" => "Assistant General Manager",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31211",
            "PositionName" => "Assistant Government Coorporate Counsel",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31212",
            "PositionName" => "Assistant Industrial Zone Manager",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31214",
            "PositionName" => "Assistant Insurance Processor I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31215",
            "PositionName" => "Assistant Insurance Processor II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31216",
            "PositionName" => "Assistant Land Registration Examiner",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31217",
            "PositionName" => "Assistant Launch Service Supervisor",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31218",
            "PositionName" => "Assistant Mining Claims Examiner",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31219",
            "PositionName" => "Assistant National Cashier",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31220",
            "PositionName" => "Assistant National Treasurer",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31221",
            "PositionName" => "Assistant Ombudsman",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31222",
            "PositionName" => "Assistant Park Administrator",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31223",
            "PositionName" => "Assistant Parole Officer",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31224",
            "PositionName" => "Assistant Press Secretary",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31225",
            "PositionName" => "Assistant Principal Orchestra Member",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31226",
            "PositionName" => "Assistant Revenue Officer",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31227",
            "PositionName" => "Assistant Schools Division Superintendent (Secondary Grade)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31228",
            "PositionName" => "Assistant Schools Division Superintendent (Elementary Grade)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31229",
            "PositionName" => "Assistant Schools Division Superintendent (Vocational And Technical Two Year Course)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31230",
            "PositionName" => "Assistant Secondary School Principal I",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31232",
            "PositionName" => "Assistant Secondary Schools Principal III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31231",
            "PositionName" => "Assistant Secondary Schools Principal II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31233",
            "PositionName" => "Assistant Secretary General",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31234",
            "PositionName" => "Assistant Secretary,social Security Commission",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31236",
            "PositionName" => "Assistant Solicitor General",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31237",
            "PositionName" => "Assistant Special School Principal (elementary Grade)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31238",
            "PositionName" => "Assistant Special School Principal (vocational And Technical Two Year Course)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31239",
            "PositionName" => "Assistant Special School Principal(secondary Grade)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31240",
            "PositionName" => "Assistant Statistical Coordinating Officer",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31241",
            "PositionName" => "Assistant Statistician I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31242",
            "PositionName" => "Assistant Statistician II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31243",
            "PositionName" => "Assistant Superintendent Of Printing",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31244",
            "PositionName" => "Assistant Supervisor Of Student Teacher (secondary Grade)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31245",
            "PositionName" => "Assistant Supervisor Of Student Teacher (vocational And Technical Two Year Course)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31246",
            "PositionName" => "Assistant Supervisor Of Student Teaching (elementary Grade)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31247",
            "PositionName" => "Assistant Teacher's Camp Superintendent",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31248",
            "PositionName" => "Assistant To The Editor",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31249",
            "PositionName" => "Assistant Tourism Coordinator",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31254",
            "PositionName" => "Assistant Vice President",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31255",
            "PositionName" => "Assistant Weather Services Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31256",
            "PositionName" => "Associate Actuary",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31257",
            "PositionName" => "Associate Architect",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31258",
            "PositionName" => "Associate Commissioner",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31259",
            "PositionName" => "Associate Concertmaster",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31260",
            "PositionName" => "Associate Director",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31261",
            "PositionName" => "Associate Government Corporate Attorney I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31262",
            "PositionName" => "Associate Government Corporate Attorney II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31263",
            "PositionName" => "Associate Graft  Investigation Officer I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31265",
            "PositionName" => "Associate Graft Investigation Officer III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31264",
            "PositionName" => "Associate Graft Investigation Officer II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31266",
            "PositionName" => "Associate Judge, Court Of Tax Appeals",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31267",
            "PositionName" => "Associate Justice, Sandiganbayan",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31270",
            "PositionName" => "Associate Project Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31268",
            "PositionName" => "Associate Project Officer I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31269",
            "PositionName" => "Associate Project Officer II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31271",
            "PositionName" => "Associate Project Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31272",
            "PositionName" => "Associate Prosecution Attorney I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31273",
            "PositionName" => "Associate Prosecution Attorney II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31274",
            "PositionName" => "Associate Public Attorney",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31275",
            "PositionName" => "Associate Public Attorney II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31276",
            "PositionName" => "Associate Resident Conductor",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31279",
            "PositionName" => "Associate Solicitor III",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31277",
            "PositionName" => "Associate Solicitor I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31278",
            "PositionName" => "Associate Solicitor II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31280",
            "PositionName" => "Associate Special Prosecution Officer I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31281",
            "PositionName" => "Associate Special Prosecutor Officer II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31282",
            "PositionName" => "Associate State Corporate Attorney I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31283",
            "PositionName" => "Associate State Corporate Attorney II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31284",
            "PositionName" => "Associate State Counsel I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31285",
            "PositionName" => "Associate State Counsel II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31286",
            "PositionName" => "Assosiate Justice,court Of Appeals",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31287",
            "PositionName" => "Attache I",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31288",
            "PositionName" => "Attache II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31289",
            "PositionName" => "Attorney V",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31290",
            "PositionName" => "Attorney VI",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31291",
            "PositionName" => "Audio Visual Aids Technician  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31292",
            "PositionName" => "Audio Visual Assistant",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31293",
            "PositionName" => "Audio Visual Equipment Operator IV",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31294",
            "PositionName" => "Audio Visual Equipment Operator V",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31295",
            "PositionName" => "Audio Visual System Head",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31296",
            "PositionName" => "Audio Visual Systems Technician A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31297",
            "PositionName" => "Audio Visual Systems Technicians B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31298",
            "PositionName" => "Auditing Systems Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31299",
            "PositionName" => "Auditing Systems Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31300",
            "PositionName" => "Authenticator",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31301",
            "PositionName" => "Auto Electrical Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31302",
            "PositionName" => "Automotive Electrician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31304",
            "PositionName" => "Automotive Equipment Inspector I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31307",
            "PositionName" => "Automotive Mechanic  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31305",
            "PositionName" => "Automotive Mechanic I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31306",
            "PositionName" => "Automotive Mechanic II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31308",
            "PositionName" => "Automotive Repair Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31310",
            "PositionName" => "Automotive Repair General Foreman",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31311",
            "PositionName" => "Automotive/train Mechanic A",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31312",
            "PositionName" => "Automotive/train Mechanic B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31313",
            "PositionName" => "Automotive/train Mechanic C",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31314",
            "PositionName" => "Auxiliary Machine Operator",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31316",
            "PositionName" => "Auxiliary Machine Operator  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31315",
            "PositionName" => "Auxiliary Machine Operator II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31317",
            "PositionName" => "Auxiliary Machine Operator IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31318",
            "PositionName" => "Aviation Safety Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31319",
            "PositionName" => "Aviation Safety Regulation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31322",
            "PositionName" => "Bacteriologist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31320",
            "PositionName" => "Bacteriologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31321",
            "PositionName" => "Bacteriologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31323",
            "PositionName" => "Bacteriologist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31326",
            "PositionName" => "Bailiff  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31324",
            "PositionName" => "Bailiff I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31325",
            "PositionName" => "Bailiff II",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31329",
            "PositionName" => "Ballistician III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31327",
            "PositionName" => "Ballistician I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31328",
            "PositionName" => "Ballistician II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31330",
            "PositionName" => "Ballistician IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31331",
            "PositionName" => "Ballistician V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31335",
            "PositionName" => "Bank Attorney  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31333",
            "PositionName" => "Bank Attorney I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31334",
            "PositionName" => "Bank Attorney II",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31336",
            "PositionName" => "Bank Attorney IV",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31339",
            "PositionName" => "Bank Dentist III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31337",
            "PositionName" => "Bank Dentist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31338",
            "PositionName" => "Bank Dentist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31340",
            "PositionName" => "Bank Dentist IV",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31341",
            "PositionName" => "Bank Examiner/examiner",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31344",
            "PositionName" => "Bank Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31347",
            "PositionName" => "Bank Officer  VII",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31342",
            "PositionName" => "Bank Officer I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31343",
            "PositionName" => "Bank Officer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31345",
            "PositionName" => "Bank Officer IV",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31346",
            "PositionName" => "Bank Officer VI",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31348",
            "PositionName" => "Bank Pilot",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31350",
            "PositionName" => "Bank Teller III",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31349",
            "PositionName" => "Bank Teller II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31351",
            "PositionName" => "Bank Teller IV",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31352",
            "PositionName" => "Barangay Community (brigade)",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31353",
            "PositionName" => "Barangay Lupon Tagapamayapa",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31354",
            "PositionName" => "Barangay Secretary (mandatory)",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31355",
            "PositionName" => "Barangay Treasurer (mandatory)",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31356",
            "PositionName" => "Barber",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31357",
            "PositionName" => "Billing/cable Assistant",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31358",
            "PositionName" => "Biological And Feed Products Inspector",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31361",
            "PositionName" => "Biologist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31359",
            "PositionName" => "Biologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31360",
            "PositionName" => "Biologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31362",
            "PositionName" => "Blacksmith Foreman",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31363",
            "PositionName" => "Blacksmith Shop Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31364",
            "PositionName" => "Blueprint Machine Operator",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31367",
            "PositionName" => "Board Chairman III",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31365",
            "PositionName" => "Board Chairman I",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31366",
            "PositionName" => "Board Chairman II",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31368",
            "PositionName" => "Board Chairman IV",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31369",
            "PositionName" => "Board Governor",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31372",
            "PositionName" => "Board Member III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31370",
            "PositionName" => "Board Member I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31371",
            "PositionName" => "Board Member II",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31373",
            "PositionName" => "Board Member IV",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31374",
            "PositionName" => "Board Secretary VI",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31375",
            "PositionName" => "Bookeeper",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31377",
            "PositionName" => "Bookeeper III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31376",
            "PositionName" => "Bookeeper II",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31378",
            "PositionName" => "Botanist",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31379",
            "PositionName" => "Broadcast Operations Chief",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31380",
            "PositionName" => "Broadcast Operations Supervisor",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31383",
            "PositionName" => "Broadcast Operations Technician III",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31381",
            "PositionName" => "Broadcast Operations Technician I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31382",
            "PositionName" => "Broadcast Operations Technician II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31384",
            "PositionName" => "Broadcast Operator I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31385",
            "PositionName" => "Broadcast Operator II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31386",
            "PositionName" => "Broadcast Production Supervisor",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31389",
            "PositionName" => "Broadcast Program Producer Announcer III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31387",
            "PositionName" => "Broadcast Program Producer Announcer I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31388",
            "PositionName" => "Broadcast Program Producer Announcer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31392",
            "PositionName" => "Budget Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31394",
            "PositionName" => "Budget Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31395",
            "PositionName" => "Budget Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31396",
            "PositionName" => "Budgeting Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31397",
            "PositionName" => "Budgeting Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31398",
            "PositionName" => "Building And Ground Maintenance Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31399",
            "PositionName" => "Building And Ground Maintenance Head A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31400",
            "PositionName" => "Building And Ground Maintenance Head B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31401",
            "PositionName" => "Building Electrician A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31402",
            "PositionName" => "Building Electrician B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31403",
            "PositionName" => "Building Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31404",
            "PositionName" => "Building Helper",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31405",
            "PositionName" => "Building Inspector",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31406",
            "PositionName" => "Building Official",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31407",
            "PositionName" => "Building Post Control Officer",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31408",
            "PositionName" => "Building Regulations Coordinator",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31409",
            "PositionName" => "Building/grounds Maintenance Supervisor",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31410",
            "PositionName" => "Business Development/marketing Analyst B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31411",
            "PositionName" => "Business Development/marketing Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31412",
            "PositionName" => "Business Development/marketing Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31413",
            "PositionName" => "Business Development/marketing Chief A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31414",
            "PositionName" => "Business Development/marketing Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31415",
            "PositionName" => "Business Development/marketing Officer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31416",
            "PositionName" => "Business Development/marketing Officer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31417",
            "PositionName" => "Business Development/marketing Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31418",
            "PositionName" => "Business Devepment/marketing Analyst A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31420",
            "PositionName" => "Buyer III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31419",
            "PositionName" => "Buyer II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31422",
            "PositionName" => "Buyer V",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31423",
            "PositionName" => "Cabin Crew Examiner I",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31424",
            "PositionName" => "Cabin Crew Examiner II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31425",
            "PositionName" => "Cabinet Secretary",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31426",
            "PositionName" => "Cabinet Under Secretary",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31427",
            "PositionName" => "Cable Operations Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31428",
            "PositionName" => "Carpenter I (b)",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31429",
            "PositionName" => "Carpenter II (a)",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31430",
            "PositionName" => "Cartographer I(b)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31431",
            "PositionName" => "Cartographer II (a)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31432",
            "PositionName" => "Cartographer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31433",
            "PositionName" => "Cartographer V",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31434",
            "PositionName" => "Cash Clerk IV",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31435",
            "PositionName" => "Cashier A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31436",
            "PositionName" => "Cashier B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31437",
            "PositionName" => "Cashier C",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31438",
            "PositionName" => "Cashier D",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31439",
            "PositionName" => "Cashier IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31441",
            "PositionName" => "Chairman Commision On Election #",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31442",
            "PositionName" => "Chairman,commission On Human Rights #",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31443",
            "PositionName" => "Chairman,police Regional Appellate Board",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31446",
            "PositionName" => "Chancellor III",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31444",
            "PositionName" => "Chancellor I",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31445",
            "PositionName" => "Chancellor II",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31449",
            "PositionName" => "Chauffeur III",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31447",
            "PositionName" => "Chauffeur I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31448",
            "PositionName" => "Chauffeur II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31450",
            "PositionName" => "Chauffeur IV",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31451",
            "PositionName" => "Cheif Chemist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31455",
            "PositionName" => "Chemist III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31452",
            "PositionName" => "Chemist B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31453",
            "PositionName" => "Chemist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31454",
            "PositionName" => "Chemist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31456",
            "PositionName" => "Chemist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31457",
            "PositionName" => "Chemist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31458",
            "PositionName" => "Chief  Currency/securities Operations Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31459",
            "PositionName" => "Chief  Ecosystem Management Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31460",
            "PositionName" => "Chief  Of Mission Class I",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31461",
            "PositionName" => "Chief  Of Sanitaruim I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31462",
            "PositionName" => "Chief  Public Attorney",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31463",
            "PositionName" => "Chief  Remittance Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31464",
            "PositionName" => "Chief  Trade Industry  Development Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31465",
            "PositionName" => "Chief  Water Resources Development Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31467",
            "PositionName" => "Chief Accounting Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31468",
            "PositionName" => "Chief Accounts Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31469",
            "PositionName" => "Chief Agrarian Affairs Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31470",
            "PositionName" => "Chief Agrarian Reform Program Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31471",
            "PositionName" => "Chief Agriculturist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31473",
            "PositionName" => "Chief Air Traffic Controller",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31474",
            "PositionName" => "Chief Aircraft Maintenance Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31475",
            "PositionName" => "Chief Airways Communicator",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31476",
            "PositionName" => "Chief Aquaculturist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31477",
            "PositionName" => "Chief Architech",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31478",
            "PositionName" => "Chief Archivist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31479",
            "PositionName" => "Chief Auditing System Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31480",
            "PositionName" => "Chief Aviation Safely Regulation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31481",
            "PositionName" => "Chief Bank Examiner/chief Examiner",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31482",
            "PositionName" => "Chief Boookbinder",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31484",
            "PositionName" => "Chief Budget Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31485",
            "PositionName" => "Chief Bull Technologist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31486",
            "PositionName" => "Chief Cable Operations Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31487",
            "PositionName" => "Chief Civil Security Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31488",
            "PositionName" => "Chief Civil Security Officer B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31489",
            "PositionName" => "Chief Clearing Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31490",
            "PositionName" => "Chief Communications Development Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31491",
            "PositionName" => "Chief Compensation And Classification Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31492",
            "PositionName" => "Chief Cooperatives Development Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31493",
            "PositionName" => "Chief Corporate Accountant A",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31494",
            "PositionName" => "Chief Corporate Accountant B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31495",
            "PositionName" => "Chief Corporate Attorney",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31496",
            "PositionName" => "Chief Corporate Budget Officer A",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31497",
            "PositionName" => "Chief Corporate Budget Officer B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31498",
            "PositionName" => "Chief Credit Investigation",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31499",
            "PositionName" => "Chief Credit/collection Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31500",
            "PositionName" => "Chief Culture And Arts Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31501",
            "PositionName" => "Chief Currency Operations Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31502",
            "PositionName" => "Chief Currency Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31503",
            "PositionName" => "Chief Customs Operations Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31504",
            "PositionName" => "Chief Debt Service Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31505",
            "PositionName" => "Chief Defense Research Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31506",
            "PositionName" => "Chief Development Management Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31507",
            "PositionName" => "Chief Document/securities Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31508",
            "PositionName" => "Chief Drafting Services",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31509",
            "PositionName" => "Chief Ec Examiner/dev't/organizational Management/system Member Services",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31511",
            "PositionName" => "Chief Economic Development Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31512",
            "PositionName" => "Chief Economist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31513",
            "PositionName" => "Chief Education Program Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31514",
            "PositionName" => "Chief Education Supervisor",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31515",
            "PositionName" => "Chief Electrotyper",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31516",
            "PositionName" => "Chief Emigrant Services Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31517",
            "PositionName" => "Chief Energy Regulation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31518",
            "PositionName" => "Chief Environment Management Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31519",
            "PositionName" => "Chief Executive Officer",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31520",
            "PositionName" => "Chief Executive Officer  III",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31521",
            "PositionName" => "Chief Executive Officer IV",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31522",
            "PositionName" => "Chief Executive Staff",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31523",
            "PositionName" => "Chief Export Credit Guarantee Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31524",
            "PositionName" => "Chief Export Credit Insurance Underwriting Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31525",
            "PositionName" => "Chief External Debt Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31526",
            "PositionName" => "Chief Fiber Development Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31527",
            "PositionName" => "Chief Fidelity Bond Examiner",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31528",
            "PositionName" => "Chief Field Operations Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31529",
            "PositionName" => "Chief Financial Accounts Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31530",
            "PositionName" => "Chief Financial Management Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31531",
            "PositionName" => "Chief Fire Officer",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31532",
            "PositionName" => "Chief Firefighting Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31533",
            "PositionName" => "Chief Foreign Affairs Research Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31534",
            "PositionName" => "Chief Foreign Exchange Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31535",
            "PositionName" => "Chief Forest Management Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31536",
            "PositionName" => "Chief General Insurance Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31537",
            "PositionName" => "Chief General Insurance Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31538",
            "PositionName" => "Chief Geologist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31539",
            "PositionName" => "Chief Health Program Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31540",
            "PositionName" => "Chief History Researcher",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31541",
            "PositionName" => "Chief Immigrant Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31542",
            "PositionName" => "Chief Industrial Design Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31543",
            "PositionName" => "Chief Inspector (fire)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31544",
            "PositionName" => "Chief Inspector (jail)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31545",
            "PositionName" => "Chief Inspector (pnp)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31546",
            "PositionName" => "Chief Insurance Adjuster",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31547",
            "PositionName" => "Chief Insurance Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31548",
            "PositionName" => "Chief Insurance Underwriter",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31549",
            "PositionName" => "Chief Insurance/risk Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31550",
            "PositionName" => "Chief Internal Control Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31551",
            "PositionName" => "Chief Investments Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31552",
            "PositionName" => "Chief Investments Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31553",
            "PositionName" => "Chief Judicial Staff Officer",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31554",
            "PositionName" => "Chief Justice Of The Supreme Court #",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31555",
            "PositionName" => "Chief Justice Staff Head",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31557",
            "PositionName" => "Chief Language Researcher",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31558",
            "PositionName" => "Chief Legal Counsel",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31559",
            "PositionName" => "Chief Legislative Staff Officer",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31560",
            "PositionName" => "Chief Loans And Credit Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31561",
            "PositionName" => "Chief Loans And Cridet Evaluator",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31562",
            "PositionName" => "Chief Local Treasury Examiner",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31564",
            "PositionName" => "Chief Management Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31565",
            "PositionName" => "Chief Maritime Industry Development Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31566",
            "PositionName" => "Chief Marketing Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31567",
            "PositionName" => "Chief Meat Control Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31568",
            "PositionName" => "Chief Mechanic/technician",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31569",
            "PositionName" => "Chief Medical Technologist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31570",
            "PositionName" => "Chief Members Service Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31571",
            "PositionName" => "Chief Merchant Banking Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31572",
            "PositionName" => "Chief Money Counter",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31573",
            "PositionName" => "Chief Money Position Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31574",
            "PositionName" => "Chief Mortgage Accounts Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31575",
            "PositionName" => "Chief Mortgage Documents Review Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31576",
            "PositionName" => "Chief Mortgage Loan Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31578",
            "PositionName" => "Chief Of Hospital III",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31577",
            "PositionName" => "Chief Of Hospital I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31579",
            "PositionName" => "Chief Of Medical Professional Staff I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31580",
            "PositionName" => "Chief Of Medical Professional Staff II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31581",
            "PositionName" => "Chief Of Mission Class II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31582",
            "PositionName" => "Chief Of Public Utilities Regulation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31584",
            "PositionName" => "Chief Of Sanitarium III",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31583",
            "PositionName" => "Chief Of Sanitarium II",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31585",
            "PositionName" => "Chief Of Staff",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31586",
            "PositionName" => "Chief Of Staff (jail)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31587",
            "PositionName" => "Chief Of Staff (ovp)",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31588",
            "PositionName" => "Chief Overseas Operations Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31589",
            "PositionName" => "Chief Parole Officer",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31590",
            "PositionName" => "Chief Patent And Trademark Executive Examiner",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31591",
            "PositionName" => "Chief Patent Principal Examiner",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31592",
            "PositionName" => "Chief Penal Institute Program Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31593",
            "PositionName" => "Chief Personnel Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31594",
            "PositionName" => "Chief Photoengraver",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31595",
            "PositionName" => "Chief Planning  Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31596",
            "PositionName" => "Chief Political  Affairs  Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31597",
            "PositionName" => "Chief Postal Inspector",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31598",
            "PositionName" => "Chief Pressman",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31599",
            "PositionName" => "Chief Probation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31600",
            "PositionName" => "Chief Professional Regulation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31601",
            "PositionName" => "Chief Prosecutor",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31602",
            "PositionName" => "Chief Reconcilement Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31603",
            "PositionName" => "Chief Records Management Analyst",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31604",
            "PositionName" => "Chief Remote Sensing Technologist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31605",
            "PositionName" => "Chief Research Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31606",
            "PositionName" => "Chief Researcher-analyst",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31607",
            "PositionName" => "Chief Revenue  Officer IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31610",
            "PositionName" => "Chief Revenue Officer III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31608",
            "PositionName" => "Chief Revenue Officer I",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31609",
            "PositionName" => "Chief Revenue Officer II",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31611",
            "PositionName" => "Chief Safety Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31612",
            "PositionName" => "Chief Scholarship Affairs Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31613",
            "PositionName" => "Chief Science Research Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31614",
            "PositionName" => "Chief Securities And Exchange Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31615",
            "PositionName" => "Chief Securities Materials Control Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31616",
            "PositionName" => "Chief Securities Servicing Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31617",
            "PositionName" => "Chief Service Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31618",
            "PositionName" => "Chief Shipbuilding Speciallist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31619",
            "PositionName" => "Chief Shipping Operation Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31620",
            "PositionName" => "Chief Shrine Curator",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31621",
            "PositionName" => "Chief Social Insurance Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31622",
            "PositionName" => "Chief Social Insurance Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31623",
            "PositionName" => "Chief Sports And Games Regulation Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31624",
            "PositionName" => "Chief State Counsel",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31625",
            "PositionName" => "Chief State Prosecutor",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31626",
            "PositionName" => "Chief Stock Transfer Administrator",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31627",
            "PositionName" => "Chief Superintendent (fire)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31628",
            "PositionName" => "Chief Superintendent (jail)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31629",
            "PositionName" => "Chief Superintendent (pnp)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31630",
            "PositionName" => "Chief Tariff Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31631",
            "PositionName" => "Chief Tax Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31632",
            "PositionName" => "Chief Technical Audit Specialist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31633",
            "PositionName" => "Chief Telegrapher Transfer Service Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31635",
            "PositionName" => "Chief Trade Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31636",
            "PositionName" => "Chief Trademark Principal  Examiner",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31637",
            "PositionName" => "Chief Trading Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31638",
            "PositionName" => "Chief Transportation Development Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31640",
            "PositionName" => "Chief Treasury Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31641",
            "PositionName" => "Chief Typesetter",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31642",
            "PositionName" => "Chief Veterans  Assistence Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31643",
            "PositionName" => "Chief Volunteer Service Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31644",
            "PositionName" => "Chiefmetallurgist",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31645",
            "PositionName" => "Cinematograhper I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31647",
            "PositionName" => "Cinematographer III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31646",
            "PositionName" => "Cinematographer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31648",
            "PositionName" => "Cinematographer IV",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31649",
            "PositionName" => "City Veterinarian Ii (huc/mmc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31650",
            "PositionName" => "City Accountant I  @ (mandatory)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31651",
            "PositionName" => "City Accountant Ii (hug/mmc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31652",
            "PositionName" => "City Accountant Iii (sc) @ (mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31653",
            "PositionName" => "City Administrator I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31654",
            "PositionName" => "City Administrator Ii (huc/mmc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31655",
            "PositionName" => "City Administrator Iii (sc) @ ( Mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31656",
            "PositionName" => "City Agriculturist I @ (optional)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31657",
            "PositionName" => "City Agriculturist Ii @ (huc/mmc) @ (optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31658",
            "PositionName" => "City Agriculturist Iii (sc) @ (optional)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31659",
            "PositionName" => "City Assessor  Iii (sc) @ (mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31660",
            "PositionName" => "City Assessor I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31661",
            "PositionName" => "City Assessor Ii (huc/mmc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31662",
            "PositionName" => "City Budget Officer I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31663",
            "PositionName" => "City Budget Officer Ii (huc/mmc)  @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31664",
            "PositionName" => "City Budget Officer Iii (sc) @ (mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31665",
            "PositionName" => "City Civil Registrar I @ Mandatory",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31666",
            "PositionName" => "City Civil Registrar Ii (huc/mmc) @ Mandatory",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31667",
            "PositionName" => "City Civil Registrar Iii (sc) @ (mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31668",
            "PositionName" => "City Cooperatives  Officers Ii (huc/mmc) @ (optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31669",
            "PositionName" => "City Cooperatives Officer I @ (optional)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31670",
            "PositionName" => "City Cooperatives Officer Iii (sc) @ (optional)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31671",
            "PositionName" => "City Engineer  I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31672",
            "PositionName" => "City Engineer Ii (huc/mmc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31673",
            "PositionName" => "City Engineer Iii (sc) @(mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31674",
            "PositionName" => "City Environment And National Resources Officer Iii(sc) @(optional)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31675",
            "PositionName" => "City Environmental And National Resources Officer Ii (huc/mmc)@(optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31676",
            "PositionName" => "City Environmet And National Resources Officer I @(optional)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31677",
            "PositionName" => "City General Services Office Ii (huc/mmc)@(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31678",
            "PositionName" => "City General Services Officer I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31679",
            "PositionName" => "City General Services Officer Iii (sc) @(mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31680",
            "PositionName" => "City Government Office Head",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31681",
            "PositionName" => "City Head Officer I @ (mandatory)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31682",
            "PositionName" => "City Head Officer Ii @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31683",
            "PositionName" => "City Head Officer Iii @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31684",
            "PositionName" => "City Information Officer I @(optional)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31685",
            "PositionName" => "City Information Officer Ii (huc/mmc) @ (optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31686",
            "PositionName" => "City Information Officer Iii (csc) @ (optional)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31687",
            "PositionName" => "City Legal Officer Ii @ (huc/mmc) @ (mandatory",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31688",
            "PositionName" => "City Legal Oficer I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31689",
            "PositionName" => "City Mayor",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31690",
            "PositionName" => "City Planning And Development Coordinator Ii @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31691",
            "PositionName" => "City Planning And Development Coordinator Iii @ (mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31692",
            "PositionName" => "City Planning And Development Coordinators I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31693",
            "PositionName" => "City Population  Officer I @ (optional)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31694",
            "PositionName" => "City Population Iii (sc) @ (optional)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31695",
            "PositionName" => "City Population Officer Ii (huc/mmc) @ (optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31696",
            "PositionName" => "City Probation Officer",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31697",
            "PositionName" => "City Social  Welfare And Development Officer Iii (sc) @ (mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31698",
            "PositionName" => "City Social Welfare And  Development Officer Ii (huc/mmc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31699",
            "PositionName" => "City Social Welfare And Development Officer @ ( Mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31700",
            "PositionName" => "City Treasurer I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31701",
            "PositionName" => "City Treasurer Ii (huc/mmc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31702",
            "PositionName" => "City Treasurer Iii (sc) @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31703",
            "PositionName" => "City Trial Court  Judge #",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31704",
            "PositionName" => "City Veterinarian I @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31705",
            "PositionName" => "City Veterinarian Iii (sc) @ (mandatory)",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31706",
            "PositionName" => "City Vice Mayor  Ii #",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31707",
            "PositionName" => "City Vice Mayor I #",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31708",
            "PositionName" => "Civil Defense  Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31709",
            "PositionName" => "Civil Defense  Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31711",
            "PositionName" => "Civil Defense Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31710",
            "PositionName" => "Civil Defense Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31712",
            "PositionName" => "Civil Defense Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31713",
            "PositionName" => "Civil Defense Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31714",
            "PositionName" => "Civil Security  Officer A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31715",
            "PositionName" => "Civil Security Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31716",
            "PositionName" => "Civil Security Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31717",
            "PositionName" => "Civil Security Officer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31718",
            "PositionName" => "Civil Security Officer C",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31719",
            "PositionName" => "Civil Security Officer D",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31720",
            "PositionName" => "Claims Processor I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31721",
            "PositionName" => "Claims Processor II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31722",
            "PositionName" => "Clearing Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31723",
            "PositionName" => "Clearing Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31724",
            "PositionName" => "Clearing Officer",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31727",
            "PositionName" => "Clearing Officer III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31725",
            "PositionName" => "Clearing Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31726",
            "PositionName" => "Clearing Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31728",
            "PositionName" => "Clearing Officer IV",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31729",
            "PositionName" => "Clearing Officer V",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31730",
            "PositionName" => "Clearing Officer VI",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31731",
            "PositionName" => "Clerk Designer",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31734",
            "PositionName" => "Clerk Of Court III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31738",
            "PositionName" => "Clerk Of Court VII",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31732",
            "PositionName" => "Clerk Of Court I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31733",
            "PositionName" => "Clerk Of Court II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31735",
            "PositionName" => "Clerk Of Court IV",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31736",
            "PositionName" => "Clerk Of Court V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31737",
            "PositionName" => "Clerk Of Court VI",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31739",
            "PositionName" => "Clerk Of The Tribunal",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31740",
            "PositionName" => "Clerk Processor A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31741",
            "PositionName" => "Clerk Processor B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31742",
            "PositionName" => "Clerk Processor C",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31743",
            "PositionName" => "Clerk Processor D",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31744",
            "PositionName" => "Collection Representative A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31745",
            "PositionName" => "Collection Representative B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31746",
            "PositionName" => "Collection Representative I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31747",
            "PositionName" => "Collection Representative II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31750",
            "PositionName" => "Collector Of Customs III",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31748",
            "PositionName" => "Collector Of Customs I",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31749",
            "PositionName" => "Collector Of Customs II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31751",
            "PositionName" => "Collector Of Customs IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31752",
            "PositionName" => "Collector Of Customs V",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31753",
            "PositionName" => "Collector Of Customs VI",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31754",
            "PositionName" => "College  Librarian III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31757",
            "PositionName" => "College Business Manager III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31755",
            "PositionName" => "College Business Manager I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31756",
            "PositionName" => "College Business Manager II",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31758",
            "PositionName" => "College Business Manager IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31760",
            "PositionName" => "College Librarian I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31761",
            "PositionName" => "College Librarian II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31762",
            "PositionName" => "College Librarian IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31764",
            "PositionName" => "College Pressman",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31765",
            "PositionName" => "College Pressman Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31766",
            "PositionName" => "College Pressman Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31769",
            "PositionName" => "Commission Chairman III",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31767",
            "PositionName" => "Commission Chairman I",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31768",
            "PositionName" => "Commission Chairman II",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31770",
            "PositionName" => "Commission Chairman IV",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31773",
            "PositionName" => "Commission Member III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31771",
            "PositionName" => "Commission Member I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31772",
            "PositionName" => "Commission Member II",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31774",
            "PositionName" => "Commission Member IV",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31777",
            "PositionName" => "Commissioner III",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31775",
            "PositionName" => "Commissioner I",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31776",
            "PositionName" => "Commissioner II",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31778",
            "PositionName" => "Commissioner Of Customs",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31779",
            "PositionName" => "Commissioner Of Internal Revenue",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31780",
            "PositionName" => "Commissioner, Civil Service Commission #",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31781",
            "PositionName" => "Commissioner,commission Elections #",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31782",
            "PositionName" => "Commissioner,commission On Audit #",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31783",
            "PositionName" => "Commissioner,philippine National Police",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31784",
            "PositionName" => "Communications Development Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31785",
            "PositionName" => "Communications Development Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31786",
            "PositionName" => "Communications Planning Analyst",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31787",
            "PositionName" => "Community  Relations  Officer A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31789",
            "PositionName" => "Community Development Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31788",
            "PositionName" => "Community Development Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31790",
            "PositionName" => "Community Development Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31791",
            "PositionName" => "Community Development Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31792",
            "PositionName" => "Community Environment And Natural Resources Staff",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31793",
            "PositionName" => "Community Relations  Specialists",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31794",
            "PositionName" => "Community Relations Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31795",
            "PositionName" => "Community Relations Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31796",
            "PositionName" => "Community Relations Chief A",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31797",
            "PositionName" => "Community Relations Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31798",
            "PositionName" => "Community Relations Officer B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31799",
            "PositionName" => "Compensations  And  Classifications Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31800",
            "PositionName" => "Compensations  And Classifications  Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31801",
            "PositionName" => "Compensations  And Classifications Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31802",
            "PositionName" => "Complaints /action Officer B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31803",
            "PositionName" => "Complaints/ Action Chief",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31804",
            "PositionName" => "Complaints/actions  Officers A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31807",
            "PositionName" => "Compositor",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31808",
            "PositionName" => "Computer Operator",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            // [
            // "PosCode"      => "31809",
            // "PositionName" => "Computer Programmer III",
            // "SalaryGrade"  => "18",
            // "ShortName"    => "tempx"
            // ],
            [
            "PosCode"      => "31810",
            "PositionName" => "Computer Services  Chief A",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31811",
            "PositionName" => "Computer Services Chief",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31812",
            "PositionName" => "Computer Services Chief B",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31813",
            "PositionName" => "Computer Services Programmer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31814",
            "PositionName" => "Computer Services Programmer B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31815",
            "PositionName" => "Concertmaster",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31816",
            "PositionName" => "Conciliator",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31817",
            "PositionName" => "Conciliator-mediator",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31818",
            "PositionName" => "Confested Ballot Box Custodian I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31819",
            "PositionName" => "Confested Ballot Box Custodian II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31820",
            "PositionName" => "Confidential  Assistant I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31822",
            "PositionName" => "Confidential Assistant III",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31821",
            "PositionName" => "Confidential Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31823",
            "PositionName" => "Confidential Secretary B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31824",
            "PositionName" => "Confidential Secretary C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31825",
            "PositionName" => "Construction Equipment Operator",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31826",
            "PositionName" => "Construction Foreman A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31827",
            "PositionName" => "Construction Foreman B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31828",
            "PositionName" => "Cook A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31829",
            "PositionName" => "Cook B",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31830",
            "PositionName" => "Cook II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31831",
            "PositionName" => "Cooperative Extension Office Director",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31832",
            "PositionName" => "Cooperatives Development Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31834",
            "PositionName" => "Copy Reader",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31835",
            "PositionName" => "Copyright Examiner",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31836",
            "PositionName" => "Core Driller I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31837",
            "PositionName" => "Core Driller II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31838",
            "PositionName" => "Corporate Accountant",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31839",
            "PositionName" => "Corporate Accountant Analyst",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31840",
            "PositionName" => "Corporate Attorney A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31841",
            "PositionName" => "Corporate Attorney B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31842",
            "PositionName" => "Corporate Board Secretary A (v)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31843",
            "PositionName" => "Corporate Board Secretary B",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31844",
            "PositionName" => "Corporate Board Secretary C(iii)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31845",
            "PositionName" => "Corporate Board Secretary IV",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31846",
            "PositionName" => "Corporate Budget Analyst A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31847",
            "PositionName" => "Corporate Budget Analyst B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31848",
            "PositionName" => "Corporate Budget Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31849",
            "PositionName" => "Corporate Budget Examiner",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31850",
            "PositionName" => "Corporate Budget Officer A",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31851",
            "PositionName" => "Corporate Budget Officer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31852",
            "PositionName" => "Corporate Budget Officer C",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31853",
            "PositionName" => "Corporate Budget Specialist A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31854",
            "PositionName" => "Corporate Budget Specialist B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31857",
            "PositionName" => "Corporate Executive Officer  III",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31855",
            "PositionName" => "Corporate Executive Officer I",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31856",
            "PositionName" => "Corporate Executive Officer II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31858",
            "PositionName" => "Corporate Executive Officer IV",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31859",
            "PositionName" => "Corporate Executive Officer V",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31860",
            "PositionName" => "Corporate Finance Service Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31861",
            "PositionName" => "Corporate Legal Counsel",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31862",
            "PositionName" => "Corporate Planning Analyst A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31863",
            "PositionName" => "Corporate Planning Analyst B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31865",
            "PositionName" => "Corporate Planning Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31866",
            "PositionName" => "Corporate Planning Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31867",
            "PositionName" => "Corporate Planning Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31868",
            "PositionName" => "Corporate Planning Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31869",
            "PositionName" => "Corporate Secretary",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31870",
            "PositionName" => "Corporate/bank Executive III",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31871",
            "PositionName" => "Corporate/bank Executive IV",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31872",
            "PositionName" => "Corporate/bank Executive Officer I",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31873",
            "PositionName" => "Corporate/bank Executive Officer II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31874",
            "PositionName" => "Corporate/bank Executive Officer V",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31877",
            "PositionName" => "Counsel Chairman III",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31875",
            "PositionName" => "Counsel Chairman I",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31876",
            "PositionName" => "Counsel Chairman II",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31878",
            "PositionName" => "Counsel Chairman IV",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31881",
            "PositionName" => "Counsel Member III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31879",
            "PositionName" => "Counsel Member I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31880",
            "PositionName" => "Counsel Member II",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31882",
            "PositionName" => "Counsel Member IV",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31883",
            "PositionName" => "Counsellor",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31885",
            "PositionName" => "Courier",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31886",
            "PositionName" => "Court Administrator Of The Supreme Court",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31887",
            "PositionName" => "Court And Trades Helper",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31890",
            "PositionName" => "Court Attorney III",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31888",
            "PositionName" => "Court Attorney I",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31889",
            "PositionName" => "Court Attorney II",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31891",
            "PositionName" => "Court Attorney IV",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31892",
            "PositionName" => "Court Attorney V",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31893",
            "PositionName" => "Court Education Demonstrator I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31896",
            "PositionName" => "Court Legal Researcher III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31894",
            "PositionName" => "Court Legal Researcher I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31895",
            "PositionName" => "Court Legal Researcher II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31897",
            "PositionName" => "Court Of Appeals Reporter I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31898",
            "PositionName" => "Court Of Appeals Reporter II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31899",
            "PositionName" => "Court Secretary I",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31900",
            "PositionName" => "Court Secretary II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31903",
            "PositionName" => "Court Stenographer III",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31901",
            "PositionName" => "Court Stenographer I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31902",
            "PositionName" => "Court Stenographer II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31904",
            "PositionName" => "Court Stenographer IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31905",
            "PositionName" => "Courtwain",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31908",
            "PositionName" => "Creative Arts Specialist III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31906",
            "PositionName" => "Creative Arts Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31907",
            "PositionName" => "Creative Arts Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31909",
            "PositionName" => "Creative Arts Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31910",
            "PositionName" => "Creative Arts Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31911",
            "PositionName" => "Credit Collection Assistant",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31912",
            "PositionName" => "Credit Collection Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31913",
            "PositionName" => "Credit Collection Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31916",
            "PositionName" => "Credit Investigator III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31914",
            "PositionName" => "Credit Investigator I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31915",
            "PositionName" => "Credit Investigator II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31918",
            "PositionName" => "Culture And Arts Officer III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31917",
            "PositionName" => "Culture And Arts Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31919",
            "PositionName" => "Currency /securities Operation  Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31920",
            "PositionName" => "Currency /securities Operations Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31921",
            "PositionName" => "Currency Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31922",
            "PositionName" => "Currency Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31923",
            "PositionName" => "Currency Assistant I (bsp)",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31924",
            "PositionName" => "Currency Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31925",
            "PositionName" => "Currency Operation Officer",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31926",
            "PositionName" => "Currency Specialists",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31927",
            "PositionName" => "Currency/ Securities Operations Assistant I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31929",
            "PositionName" => "Currency/securities Operation  Officer III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31928",
            "PositionName" => "Currency/securities Operation  Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31930",
            "PositionName" => "Custom  Service Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31931",
            "PositionName" => "Custom  Service Assistant B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31932",
            "PositionName" => "Custom Gatekeeper",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31935",
            "PositionName" => "Custom Operations Officer III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31933",
            "PositionName" => "Custom Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31934",
            "PositionName" => "Custom Operations Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31936",
            "PositionName" => "Custom Operations Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31937",
            "PositionName" => "Custom Operations Officer V",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31938",
            "PositionName" => "Dangerous Drug Regulation Officer III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31939",
            "PositionName" => "Dangerous Drug Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31940",
            "PositionName" => "Dangerous Drug Regulation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31941",
            "PositionName" => "Dangerous Drug Regulation Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31942",
            "PositionName" => "Dangerous Drug Regulation Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31943",
            "PositionName" => "Data Analyst  II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31944",
            "PositionName" => "Data Analyst Controller",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31945",
            "PositionName" => "Data Analyst I",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31946",
            "PositionName" => "Data Controller",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31947",
            "PositionName" => "Data Encoder",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31951",
            "PositionName" => "Data Encoder III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31948",
            "PositionName" => "Data Encoder Controller",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31949",
            "PositionName" => "Data Encoder I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31950",
            "PositionName" => "Data Encoder II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31952",
            "PositionName" => "Data Encoder IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31955",
            "PositionName" => "Data Entry Machine Operator III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31953",
            "PositionName" => "Data Entry Machine Operator I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31956",
            "PositionName" => "Data Entry Machine Operator IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31957",
            "PositionName" => "Data Management Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31958",
            "PositionName" => "Data Management Chief  A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31959",
            "PositionName" => "Data Management Chief  B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31960",
            "PositionName" => "Day Care Worker I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31962",
            "PositionName" => "Debt Service Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31963",
            "PositionName" => "Debt Service Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31964",
            "PositionName" => "Debt Service Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31965",
            "PositionName" => "Debt Service Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31966",
            "PositionName" => "Debt Service Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31967",
            "PositionName" => "Dentist  IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31972",
            "PositionName" => "Dentist  VII",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31968",
            "PositionName" => "Dentist Iii (a)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31969",
            "PositionName" => "Dentist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31971",
            "PositionName" => "Dentist VI",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31973",
            "PositionName" => "Department Assistant Secretary",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31974",
            "PositionName" => "Department Legislative Liaison Officer",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31975",
            "PositionName" => "Department Legislative Liaison Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31976",
            "PositionName" => "Department Manager",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31983",
            "PositionName" => "Department Manager III",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31977",
            "PositionName" => "Department Manager A",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31978",
            "PositionName" => "Department Manager B",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31979",
            "PositionName" => "Department Manager C",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31980",
            "PositionName" => "Department Manager I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31981",
            "PositionName" => "Department Manager I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31982",
            "PositionName" => "Department Manager II",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31984",
            "PositionName" => "Department Secretary",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31985",
            "PositionName" => "Department Undersecretary",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31986",
            "PositionName" => "Deputy Administrator",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31988",
            "PositionName" => "Deputy Administrator",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31987",
            "PositionName" => "Deputy Administrator",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31991",
            "PositionName" => "Deputy Administrator  III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31989",
            "PositionName" => "Deputy Administrator I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31990",
            "PositionName" => "Deputy Administrator II",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31993",
            "PositionName" => "Deputy Chief  Executive  Officer",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31992",
            "PositionName" => "Deputy Chief  Executive  Officer",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31994",
            "PositionName" => "Deputy Chief Public Attorney",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31995",
            "PositionName" => "Deputy Clerk Of The Tribunal",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31998",
            "PositionName" => "Deputy Commissioner  III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31996",
            "PositionName" => "Deputy Commissioner I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31997",
            "PositionName" => "Deputy Commissioner II",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "31999",
            "PositionName" => "Deputy Commissioner Of Internal Revenue",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32000",
            "PositionName" => "Deputy Court Administrator Of The Supreme Court",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32001",
            "PositionName" => "Deputy Executive Secretary",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32002",
            "PositionName" => "Deputy General Manager",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32003",
            "PositionName" => "Deputy Government Corporate Counsel",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32004",
            "PositionName" => "Deputy Governor",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32005",
            "PositionName" => "Deputy Insurance Commissioner",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32006",
            "PositionName" => "Deputy Of Commissioners Of Customs",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32007",
            "PositionName" => "Deputy Of Commissioners Of Customs",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32008",
            "PositionName" => "Deputy Ombudsman #",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32009",
            "PositionName" => "Deputy Press Secretary",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32010",
            "PositionName" => "Deputy Register Of Deeds I",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32011",
            "PositionName" => "Deputy Register Of Deeds II",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32012",
            "PositionName" => "Derdging Supervisor",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32013",
            "PositionName" => "Development Management Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32014",
            "PositionName" => "Development Management Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32015",
            "PositionName" => "Dietary Adviser",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32016",
            "PositionName" => "Dietician",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32017",
            "PositionName" => "Director",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32018",
            "PositionName" => "Director (fire)",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32019",
            "PositionName" => "Director (jail)",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32020",
            "PositionName" => "Director (pnp)",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32021",
            "PositionName" => "Director General (pnp)",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32022",
            "PositionName" => "Director I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32023",
            "PositionName" => "Director II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32026",
            "PositionName" => "Division Chief  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32024",
            "PositionName" => "Division Chief I",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32025",
            "PositionName" => "Division Chief II",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32027",
            "PositionName" => "Division Chief IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32028",
            "PositionName" => "Division Manager",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32029",
            "PositionName" => "Division Manager  A",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32030",
            "PositionName" => "Division Manager B",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32031",
            "PositionName" => "Division Manager C",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32032",
            "PositionName" => "Docking And Rigging Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32033",
            "PositionName" => "Dockman - Rigger I",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32034",
            "PositionName" => "Dockman-diver I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32035",
            "PositionName" => "Dockman-diver II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32036",
            "PositionName" => "Dockman-rigger II",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32037",
            "PositionName" => "Document  Examiner  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32038",
            "PositionName" => "Document  Examiner IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32039",
            "PositionName" => "Document  Examiner IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32040",
            "PositionName" => "Document  Examiner V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32043",
            "PositionName" => "Document /securities Analyst  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32041",
            "PositionName" => "Document /securities Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32042",
            "PositionName" => "Document /securities Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32044",
            "PositionName" => "Document Binder",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32045",
            "PositionName" => "Document Examiner I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32046",
            "PositionName" => "Document Examiner II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32047",
            "PositionName" => "Document Examiner V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32048",
            "PositionName" => "Document/ Securities Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32049",
            "PositionName" => "Document/ Securities Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32050",
            "PositionName" => "Document/securities Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32051",
            "PositionName" => "Dormitory Attendant",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32054",
            "PositionName" => "Dormitory Manager  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32052",
            "PositionName" => "Dormitory Manager I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32053",
            "PositionName" => "Dormitory Manager II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32055",
            "PositionName" => "Dormitory Manager IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32058",
            "PositionName" => "Draftsman  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32056",
            "PositionName" => "Draftsman I(b)",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32057",
            "PositionName" => "Draftsman Ii (a)",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32059",
            "PositionName" => "Draftsman IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32064",
            "PositionName" => "Dredge Master  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32060",
            "PositionName" => "Dredge Master A",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32061",
            "PositionName" => "Dredge Master B",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32062",
            "PositionName" => "Dredge Master I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32063",
            "PositionName" => "Dredge Master II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32065",
            "PositionName" => "Dredge Master IV",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32066",
            "PositionName" => "Dredgeman Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32067",
            "PositionName" => "Dredgeman I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32068",
            "PositionName" => "Dredgeman II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32069",
            "PositionName" => "Driver",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32075",
            "PositionName" => "Driver  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32072",
            "PositionName" => "Driver Courier  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32070",
            "PositionName" => "Driver Courier I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32071",
            "PositionName" => "Driver Courier II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32073",
            "PositionName" => "Driver I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32074",
            "PositionName" => "Driver II",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32076",
            "PositionName" => "Driver IV",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32077",
            "PositionName" => "Driver Mechanic A",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32078",
            "PositionName" => "Driver Mechanic B",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32079",
            "PositionName" => "Driving Skills Rater",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32080",
            "PositionName" => "Economic Development Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32081",
            "PositionName" => "Economic Development Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32082",
            "PositionName" => "Economic Development Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32083",
            "PositionName" => "Economist A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32084",
            "PositionName" => "Economist B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32085",
            "PositionName" => "Economist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32086",
            "PositionName" => "Economist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32087",
            "PositionName" => "Ecosystem Management Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32088",
            "PositionName" => "Ecosystems Management Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32089",
            "PositionName" => "Editor",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32090",
            "PositionName" => "Education Program Specialist I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32091",
            "PositionName" => "Education Program Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32092",
            "PositionName" => "Education Supervisor I (elementary School)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32093",
            "PositionName" => "Education Supervisor I (secondary School)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32094",
            "PositionName" => "Education Supervisor I (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32095",
            "PositionName" => "Education Supervisor Ii (elementary School)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32096",
            "PositionName" => "Education Supervisor Ii (secondary School)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32097",
            "PositionName" => "Education Supervisor Ii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32098",
            "PositionName" => "Education Supervisor Iii (elementary School)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32099",
            "PositionName" => "Education Supervisor Iii (secondary School)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32100",
            "PositionName" => "Education Supervisor Iii (vacotional And Two Years Technical Course)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32101",
            "PositionName" => "Elctrical Control Operator B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32102",
            "PositionName" => "Elctronics Communication Systems Operator A",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32103",
            "PositionName" => "Election Assistant I",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32104",
            "PositionName" => "Election Assistant II",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32105",
            "PositionName" => "Election Field Officer",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32107",
            "PositionName" => "Election Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32106",
            "PositionName" => "Election Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32108",
            "PositionName" => "Election Officer IV",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32109",
            "PositionName" => "Election Precincts Analyst I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32110",
            "PositionName" => "Electric Cooperative Development Officer B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32111",
            "PositionName" => "Electric Cooperative Examiner A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32112",
            "PositionName" => "Electric Cooperative Examiner B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32113",
            "PositionName" => "Electric Cooperative Management Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32114",
            "PositionName" => "Electric Cooperative Management Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32115",
            "PositionName" => "Electrical Control Operator A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32116",
            "PositionName" => "Electrical Control Operator C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32117",
            "PositionName" => "Electrical Control Operator D",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32118",
            "PositionName" => "Electrical Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32119",
            "PositionName" => "Electrical Helper",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32120",
            "PositionName" => "Electron Microscopist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32121",
            "PositionName" => "Electronics And Communications Equipment Technician IV",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32122",
            "PositionName" => "Electronics Communication Services Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32123",
            "PositionName" => "Electronics Communication System Operator B",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32124",
            "PositionName" => "Electronics Communication Systems Technician B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32125",
            "PositionName" => "Electronics Communications Planning Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32126",
            "PositionName" => "Electrotyper II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32127",
            "PositionName" => "Electrotyper IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32130",
            "PositionName" => "Elementary School Principal  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32128",
            "PositionName" => "Elementary School Principal I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32129",
            "PositionName" => "Elementary School Principal II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32131",
            "PositionName" => "Elementary School Principal IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32132",
            "PositionName" => "Eletric Cooperative Development Officer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32133",
            "PositionName" => "Eletronics Communication Systems Technician A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32134",
            "PositionName" => "Eletronics Communications Systems Operator B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32136",
            "PositionName" => "Eletrotyper  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32135",
            "PositionName" => "Eletrotyper I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32137",
            "PositionName" => "Emigrant Services Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32138",
            "PositionName" => "Emigrant Services Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32139",
            "PositionName" => "Energy Regulation Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32140",
            "PositionName" => "Energy Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32141",
            "PositionName" => "Energy Regulation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32142",
            "PositionName" => "Engineer A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32143",
            "PositionName" => "Engineer B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32144",
            "PositionName" => "Engineer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32145",
            "PositionName" => "Engineer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32146",
            "PositionName" => "Engineering Aide B",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32147",
            "PositionName" => "Engineering Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32148",
            "PositionName" => "Engineering Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32149",
            "PositionName" => "Engineering Services Chief",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32152",
            "PositionName" => "Entomologist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32150",
            "PositionName" => "Entomologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32151",
            "PositionName" => "Entomologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32153",
            "PositionName" => "Environmental Analyst",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32154",
            "PositionName" => "Environmental Management Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32155",
            "PositionName" => "Environmental Management Researcher",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32156",
            "PositionName" => "Environmental Specialist A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32157",
            "PositionName" => "Environmental Specialist B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32158",
            "PositionName" => "Equine Evaluator",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32159",
            "PositionName" => "Estate Management Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32160",
            "PositionName" => "Estate Management Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32161",
            "PositionName" => "Estate Management Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32162",
            "PositionName" => "Estate Management Supervisor C",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32163",
            "PositionName" => "Estate Supervisor C",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32164",
            "PositionName" => "Estemate Management Officer",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32165",
            "PositionName" => "Estemate Management Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32166",
            "PositionName" => "Estemate Management Supervisor A",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32167",
            "PositionName" => "Estemate Management Supervisor B",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32170",
            "PositionName" => "Executive Assistant  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32168",
            "PositionName" => "Executive Assistant I (c)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32169",
            "PositionName" => "Executive Assistant Ii (b)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32171",
            "PositionName" => "Executive Assistant Iii (a)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32172",
            "PositionName" => "Executive Assistant IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32173",
            "PositionName" => "Executive Assistant IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32174",
            "PositionName" => "Executive Assistant V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32175",
            "PositionName" => "Executive Assistant V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32176",
            "PositionName" => "Executive Assistant VI",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32178",
            "PositionName" => "Executive Clerk Of Court  III",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32177",
            "PositionName" => "Executive Clerk Of Court I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32179",
            "PositionName" => "Executive Clerk Of Court IV",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32180",
            "PositionName" => "Executive Clerk Of Court V",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32181",
            "PositionName" => "Executive Conciliator-mediator",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32182",
            "PositionName" => "Executive Director",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32185",
            "PositionName" => "Executive Director  III",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32183",
            "PositionName" => "Executive Director I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32184",
            "PositionName" => "Executive Director II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32186",
            "PositionName" => "Executive Director IV",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32187",
            "PositionName" => "Executive News Editor",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32188",
            "PositionName" => "Executive Of Clerk Of Court II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32189",
            "PositionName" => "Executive Secretary",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32190",
            "PositionName" => "Executive Secretary B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32191",
            "PositionName" => "Executive Secretary C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32192",
            "PositionName" => "Executive Vice President",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32194",
            "PositionName" => "Executive Vice President",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32193",
            "PositionName" => "Executive Vice President",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32195",
            "PositionName" => "Export Credit Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32196",
            "PositionName" => "Export Credit Guarantee Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32197",
            "PositionName" => "Export Credit Guarantee Assistant I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32198",
            "PositionName" => "Export Credit Guarantee Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32199",
            "PositionName" => "Export Credit Guarantee Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32200",
            "PositionName" => "Export Credit Insurance Underwriting Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32201",
            "PositionName" => "Export Credit Insurance Underwriting Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32202",
            "PositionName" => "Export Credit Insurance Underwriting Officer I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32203",
            "PositionName" => "Export Credit Insurance Underwriting Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32204",
            "PositionName" => "Export/import Document Analyst I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32205",
            "PositionName" => "Export/import Document Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32206",
            "PositionName" => "Export/import Document Examiner",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32207",
            "PositionName" => "Export/import Negotiation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32208",
            "PositionName" => "Export/import/letters Of Credit Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32209",
            "PositionName" => "Export/import/letters Of Credit Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32210",
            "PositionName" => "Export/import/letters Of Credit Specialist I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32211",
            "PositionName" => "Export/import/letters Of Credit Specialist II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32212",
            "PositionName" => "Expres Mail Center Manager",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32213",
            "PositionName" => "External Debt Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32214",
            "PositionName" => "External Debt Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32215",
            "PositionName" => "External Debt Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32216",
            "PositionName" => "External Debt Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32217",
            "PositionName" => "External Debt Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32218",
            "PositionName" => "Fabric Worker I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32219",
            "PositionName" => "Facilities Foreman",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32220",
            "PositionName" => "Fellow I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32221",
            "PositionName" => "Fellow II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32222",
            "PositionName" => "Fiber Development Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32223",
            "PositionName" => "Fiber Development Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32224",
            "PositionName" => "Fiber Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32225",
            "PositionName" => "Fidelity Bond Examiner I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32226",
            "PositionName" => "Fidelity Bond Examiner II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32227",
            "PositionName" => "Field Custodian I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32228",
            "PositionName" => "Field Operations Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32229",
            "PositionName" => "Field Operations Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32230",
            "PositionName" => "Field Operations Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32231",
            "PositionName" => "Field Operations Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32232",
            "PositionName" => "Field Operations Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32233",
            "PositionName" => "Film Custodian I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32234",
            "PositionName" => "Film Custodian II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32235",
            "PositionName" => "Film Editor I",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32236",
            "PositionName" => "Film Editor II",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32237",
            "PositionName" => "Film Preview Assistant I",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32238",
            "PositionName" => "Film Preview Assistant II",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32239",
            "PositionName" => "Finacial Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32240",
            "PositionName" => "Finance Officer  B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32241",
            "PositionName" => "Finance Officer A",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32242",
            "PositionName" => "Finance Officer C",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32243",
            "PositionName" => "Finance Officer D",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32245",
            "PositionName" => "Financial Analyst  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32244",
            "PositionName" => "Financial Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32246",
            "PositionName" => "Financial Analyst IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32247",
            "PositionName" => "Financial Analyst V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32250",
            "PositionName" => "Financial Claims Examiner  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32248",
            "PositionName" => "Financial Claims Examiner I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32249",
            "PositionName" => "Financial Claims Examiner II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32251",
            "PositionName" => "Financial Management Officer I",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32252",
            "PositionName" => "Financial Management Officer II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32253",
            "PositionName" => "Financial Planning Analyst",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32254",
            "PositionName" => "Financial Planning Analyst A",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32255",
            "PositionName" => "Financial Planning Analyst B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32256",
            "PositionName" => "Financial Planning Analyst C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32257",
            "PositionName" => "Financial Planning Specialist A",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32258",
            "PositionName" => "Financial Planning Specialist B",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32259",
            "PositionName" => "Financial/accounts Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32260",
            "PositionName" => "Fire Marshall II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32261",
            "PositionName" => "Fire Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32262",
            "PositionName" => "Fire Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32263",
            "PositionName" => "Fire Officer I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32264",
            "PositionName" => "Fire Officer II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32265",
            "PositionName" => "Firearms And Explosive Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32266",
            "PositionName" => "Firearms And Explosives Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32269",
            "PositionName" => "Firearms And Explosives Processor  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32267",
            "PositionName" => "Firearms And Explosives Processor I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32268",
            "PositionName" => "Firearms And Explosives Processor II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32271",
            "PositionName" => "Firearms And Explosives Processor IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32270",
            "PositionName" => "Firearms And Explosives Processor IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32272",
            "PositionName" => "Firearms And Explosives Production Coodinator",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32273",
            "PositionName" => "Firefighter",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32274",
            "PositionName" => "Firefighter   III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32275",
            "PositionName" => "Firefighter I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32276",
            "PositionName" => "Firefighter II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32277",
            "PositionName" => "Firefighter IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32278",
            "PositionName" => "Firefighting Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32279",
            "PositionName" => "Firefighting Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32280",
            "PositionName" => "First Mate",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32283",
            "PositionName" => "Fiscal Clerk  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32281",
            "PositionName" => "Fiscal Clerk I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32282",
            "PositionName" => "Fiscal Clerk II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32285",
            "PositionName" => "Fiscal Controller   III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32284",
            "PositionName" => "Fiscal Controller  II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32287",
            "PositionName" => "Fiscal Controller I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32288",
            "PositionName" => "Fiscal Controller IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32286",
            "PositionName" => "Fiscal Controller V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32293",
            "PositionName" => "Fiscal Examiner  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32289",
            "PositionName" => "Fiscal Examiner A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32290",
            "PositionName" => "Fiscal Examiner B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32291",
            "PositionName" => "Fiscal Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32292",
            "PositionName" => "Fiscal Examiner II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32294",
            "PositionName" => "Fiscal Examiner IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32295",
            "PositionName" => "Fiscal Examiner V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32296",
            "PositionName" => "Fiscal Services Chief A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32297",
            "PositionName" => "Fiscal Services Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32298",
            "PositionName" => "Fisherman",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32299",
            "PositionName" => "Fishing Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32300",
            "PositionName" => "Fishing Regulations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32301",
            "PositionName" => "Floating Crane Master",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32302",
            "PositionName" => "Food And Beverage Manager",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32303",
            "PositionName" => "Food Drug Inspector",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32306",
            "PositionName" => "Food Drug Regulation Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32304",
            "PositionName" => "Food Drug Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32305",
            "PositionName" => "Food Drug Regulation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32307",
            "PositionName" => "Food Drug Regulation Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32308",
            "PositionName" => "Food Drug Regulation Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32309",
            "PositionName" => "Food Server",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32310",
            "PositionName" => "Food Service Manager",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32311",
            "PositionName" => "Food Service Supervisor",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32312",
            "PositionName" => "Food Service Supervisor IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32315",
            "PositionName" => "Food Technologist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32313",
            "PositionName" => "Food Technologist I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32314",
            "PositionName" => "Food Technologist II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32318",
            "PositionName" => "Foreign  Exchange Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32316",
            "PositionName" => "Foreign  Exchange Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32317",
            "PositionName" => "Foreign  Exchange Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32319",
            "PositionName" => "Foreign Affairs Adviser",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32320",
            "PositionName" => "Foreign Affairs Research Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32321",
            "PositionName" => "Foreign Affairs Research Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32323",
            "PositionName" => "Foreign Exchange Assistant  II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32322",
            "PositionName" => "Foreign Exchange Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32324",
            "PositionName" => "Foreign Exchange Examiner",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32325",
            "PositionName" => "Foreign Exchange Examiner",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32328",
            "PositionName" => "Foreign Service  Officer Class  III",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32326",
            "PositionName" => "Foreign Service  Officer Class I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32327",
            "PositionName" => "Foreign Service  Officer Class II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32329",
            "PositionName" => "Foreign Service  Officer Class IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32330",
            "PositionName" => "Foreign Service Staff  Officer I",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32331",
            "PositionName" => "Foreign Service Staff Emlpoyee Iii (utility,worker,messenger)",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32332",
            "PositionName" => "Foreign Service Staff Employee I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32333",
            "PositionName" => "Foreign Service Staff Employee II",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32334",
            "PositionName" => "Foreign Service Staff Officer II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32335",
            "PositionName" => "Foreign Trade Service Officer Class I(eo No. 540,s 1979)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32336",
            "PositionName" => "Foreign Trade Service Officer Class Ii (eo No. 540,s 1979)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32337",
            "PositionName" => "Foreign Trade Service Officer Class Iii (eo No. 540,s 1979)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32338",
            "PositionName" => "Foreign Trade Service Officer Class Iv (eo No. 540,s 1979)",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32339",
            "PositionName" => "Foreign Trade Service Staff Officer",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32340",
            "PositionName" => "Foreman A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32341",
            "PositionName" => "Foreman B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32342",
            "PositionName" => "Foreman C",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32343",
            "PositionName" => "Forest Management Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32344",
            "PositionName" => "Forest Management Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32345",
            "PositionName" => "Forest Ranger",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32346",
            "PositionName" => "Forest Technician I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32347",
            "PositionName" => "Forest Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32350",
            "PositionName" => "Forester  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32348",
            "PositionName" => "Forester I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32349",
            "PositionName" => "Forester II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32351",
            "PositionName" => "Forester IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32352",
            "PositionName" => "Forester V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32353",
            "PositionName" => "Forestrry Worker I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32354",
            "PositionName" => "Forestry Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32355",
            "PositionName" => "Forestry Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32356",
            "PositionName" => "Forestry Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32357",
            "PositionName" => "Forestry General Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32358",
            "PositionName" => "Forestry Specialist",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32359",
            "PositionName" => "Forestry Worker II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32360",
            "PositionName" => "Foriegn Service Staff  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32361",
            "PositionName" => "Foriegn Service Staff IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32362",
            "PositionName" => "Form Designer",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32363",
            "PositionName" => "Foundry Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32364",
            "PositionName" => "Foundryman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32365",
            "PositionName" => "Freight Service Foreman",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32366",
            "PositionName" => "Freight Service Supervisor I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32367",
            "PositionName" => "Freight Service Supervisor II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32368",
            "PositionName" => "Front Office Supervisor",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32369",
            "PositionName" => "Fuel Distribution Foreman",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32370",
            "PositionName" => "Fuel/gas Attendant",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32371",
            "PositionName" => "Fumigation Assistant Supervisor",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32372",
            "PositionName" => "Fumigation Supervisor",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32373",
            "PositionName" => "Fumigator",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32374",
            "PositionName" => "Fumigator Foreman",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32375",
            "PositionName" => "Fx Cable Operator",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32377",
            "PositionName" => "Gate/crossing Keeper",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32376",
            "PositionName" => "Gate/crossing Keeper",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32378",
            "PositionName" => "General Councel",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32379",
            "PositionName" => "General Counsel",
            "SalaryGrade"  => "0",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32380",
            "PositionName" => "General Insurance  Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32382",
            "PositionName" => "General Insurance Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32381",
            "PositionName" => "General Insurance Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32383",
            "PositionName" => "General Insurance Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32384",
            "PositionName" => "General Insurance Analyst II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32386",
            "PositionName" => "General Insurance Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32385",
            "PositionName" => "General Insurance Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32387",
            "PositionName" => "General Insurance Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32388",
            "PositionName" => "General Insurance Assitant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32394",
            "PositionName" => "General Insurance Officer  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32393",
            "PositionName" => "General Insurance Officer  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32390",
            "PositionName" => "General Insurance Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32389",
            "PositionName" => "General Insurance Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32391",
            "PositionName" => "General Insurance Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32392",
            "PositionName" => "General Insurance Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32395",
            "PositionName" => "General Insurance Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32396",
            "PositionName" => "General Manager",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32398",
            "PositionName" => "General Manager",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32397",
            "PositionName" => "General Manager",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32399",
            "PositionName" => "General Manager A",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32400",
            "PositionName" => "General Manager B",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32401",
            "PositionName" => "General Manager C",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32402",
            "PositionName" => "General Manager D",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32403",
            "PositionName" => "General Manager E",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32404",
            "PositionName" => "General Manager F",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32405",
            "PositionName" => "Geologic Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32406",
            "PositionName" => "Geologist A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32407",
            "PositionName" => "Geologist B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32408",
            "PositionName" => "Geologist C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32409",
            "PositionName" => "Geologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32410",
            "PositionName" => "Geologist II",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32416",
            "PositionName" => "Geophysicist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32411",
            "PositionName" => "Geophysicist A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32412",
            "PositionName" => "Geophysicist B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32413",
            "PositionName" => "Geophysicist C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32414",
            "PositionName" => "Geophysicist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32415",
            "PositionName" => "Geophysicist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32417",
            "PositionName" => "Geophysicist IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32418",
            "PositionName" => "Geophysicist V",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32421",
            "PositionName" => "Government Corporate Attorney  III",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32419",
            "PositionName" => "Government Corporate Attorney I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32420",
            "PositionName" => "Government Corporate Attorney II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32422",
            "PositionName" => "Government Corporate Attorney IV",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32423",
            "PositionName" => "Government Corporate Counsel",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32426",
            "PositionName" => "Graft Investigation Officer  III",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32424",
            "PositionName" => "Graft Investigation Officer I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32425",
            "PositionName" => "Graft Investigation Officer II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32429",
            "PositionName" => "Graft Prevention And Control Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32427",
            "PositionName" => "Graft Prevention And Control Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32428",
            "PositionName" => "Graft Prevention And Control Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32430",
            "PositionName" => "Graft Prevention And Control Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32431",
            "PositionName" => "Graft Prevention And Control Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32432",
            "PositionName" => "Group Manager",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32433",
            "PositionName" => "Group Manager",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32434",
            "PositionName" => "Group Vice President",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32435",
            "PositionName" => "Guesthouse Caretaker",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32436",
            "PositionName" => "Guesthouse Supervisor",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32439",
            "PositionName" => "Guidance Coordinator  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32437",
            "PositionName" => "Guidance Coordinator I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32438",
            "PositionName" => "Guidance Coordinator II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32442",
            "PositionName" => "Guidance Counselor  III",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32440",
            "PositionName" => "Guidance Counselor I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32441",
            "PositionName" => "Guidance Counselor II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32443",
            "PositionName" => "Guidance Services Associate I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32444",
            "PositionName" => "Guidance Services Associate II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32445",
            "PositionName" => "Guidance Services Specialis II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32447",
            "PositionName" => "Guidance Services Specialist  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32446",
            "PositionName" => "Guidance Services Specialist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32448",
            "PositionName" => "Guidance Services Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32449",
            "PositionName" => "Guidance Services Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32450",
            "PositionName" => "Harbor Master",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32451",
            "PositionName" => "Harbor Operations Officer",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32452",
            "PositionName" => "Head (pms)",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32453",
            "PositionName" => "Head Carpenter",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32454",
            "PositionName" => "Head Cashier",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32455",
            "PositionName" => "Head Civil Service Field Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32457",
            "PositionName" => "Head Executive Assistant",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32456",
            "PositionName" => "Head Executive Assistant",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32458",
            "PositionName" => "Head Executive Staff",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32459",
            "PositionName" => "Head Metal Worker",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32460",
            "PositionName" => "Head Painter",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32461",
            "PositionName" => "Head Photographer",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32462",
            "PositionName" => "Head Pressman",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32463",
            "PositionName" => "Head Teacher I (elementary Grades)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32464",
            "PositionName" => "Head Teacher I (pre-school)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32465",
            "PositionName" => "Head Teacher I (secondary Grades)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32466",
            "PositionName" => "Head Teacher I (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32467",
            "PositionName" => "Head Teacher Ii (elementary Grade)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32468",
            "PositionName" => "Head Teacher Ii (pre-school)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32469",
            "PositionName" => "Head Teacher Ii (secondary Grade)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32470",
            "PositionName" => "Head Teacher Ii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32471",
            "PositionName" => "Head Teacher Iii (elementary Grades)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32472",
            "PositionName" => "Head Teacher Iii (pre-school)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32473",
            "PositionName" => "Head Teacher Iii (secondary Grades)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32474",
            "PositionName" => "Head Teacher Iii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32475",
            "PositionName" => "Head Teacher Iv (elementary Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32476",
            "PositionName" => "Head Teacher Iv (pre-school)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32477",
            "PositionName" => "Head Teacher Iv (secondary Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32478",
            "PositionName" => "Head Teacher Iv (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32479",
            "PositionName" => "Head Teacher V (elementary Grades)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32480",
            "PositionName" => "Head Teacher V (pre-school)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32481",
            "PositionName" => "Head Teacher V (secondary Grades)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32482",
            "PositionName" => "Head Teacher V (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32483",
            "PositionName" => "Head Teacher Vi (elementary Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32484",
            "PositionName" => "Head Teacher Vi (pre-school)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32485",
            "PositionName" => "Head Teacher Vi (secondary Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32486",
            "PositionName" => "Head Teacher Vi (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32487",
            "PositionName" => "Head Technical Assistant",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32488",
            "PositionName" => "Health Education And Promotion Adviser",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32489",
            "PositionName" => "Health Education And Promotion Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32490",
            "PositionName" => "Health Education And Promotion Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32493",
            "PositionName" => "Health Physicist  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32491",
            "PositionName" => "Health Physicist I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32492",
            "PositionName" => "Health Physicist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32494",
            "PositionName" => "Health Physicist IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32495",
            "PositionName" => "Health Physicist Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32496",
            "PositionName" => "Health Program Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32497",
            "PositionName" => "Health Program Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32498",
            "PositionName" => "Health Program Research Assistant",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32499",
            "PositionName" => "Health Program Researcher",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32500",
            "PositionName" => "Heavy Equipment Operator",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32501",
            "PositionName" => "Heavy Equipment Operator  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32502",
            "PositionName" => "Historic Sites Development Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32503",
            "PositionName" => "Historic Sites Development Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32504",
            "PositionName" => "History Researcher I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32505",
            "PositionName" => "History Researcher II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32506",
            "PositionName" => "Hospital Administrator Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32507",
            "PositionName" => "Hotel/resort Maintenance Supervisor",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32508",
            "PositionName" => "Hotel/resort Operations Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32509",
            "PositionName" => "Hotel/resort Operations Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32510",
            "PositionName" => "Hotel/resort Operations Officer C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32511",
            "PositionName" => "Hotel/resort Operations Specialist",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32514",
            "PositionName" => "Household Attendant  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32512",
            "PositionName" => "Household Attendant I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32513",
            "PositionName" => "Household Attendant II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32515",
            "PositionName" => "Household Manager",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32516",
            "PositionName" => "Housekeeping Services Assistant",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32517",
            "PositionName" => "Housekeeping Services Headman A",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32518",
            "PositionName" => "Housekeeping Services Headman B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32521",
            "PositionName" => "Houseparent  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32519",
            "PositionName" => "Houseparent I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32520",
            "PositionName" => "Houseparent II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32522",
            "PositionName" => "Houseparent IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32523",
            "PositionName" => "Human Resource Development Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32524",
            "PositionName" => "Human Resource Management Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32525",
            "PositionName" => "Human Resource Management Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32526",
            "PositionName" => "Human Resource Management Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32527",
            "PositionName" => "Hydro-geologist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32528",
            "PositionName" => "Hydrographer",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32529",
            "PositionName" => "Hydrologist",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32530",
            "PositionName" => "Hydrology Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32531",
            "PositionName" => "Identification Officer I",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32532",
            "PositionName" => "Identification Officer II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32533",
            "PositionName" => "Illustrator I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32534",
            "PositionName" => "Immigration Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32537",
            "PositionName" => "Immigration Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32535",
            "PositionName" => "Immigration Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32536",
            "PositionName" => "Immigration Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32538",
            "PositionName" => "Industrial Design Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32539",
            "PositionName" => "Industrial Design Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32540",
            "PositionName" => "Industrial Nurse",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32541",
            "PositionName" => "Industrial Project Training Supervisor",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32542",
            "PositionName" => "Industrial Relations Development Chief",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32543",
            "PositionName" => "Industrial Relations Development Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32544",
            "PositionName" => "Industrial Relations Development Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32545",
            "PositionName" => "Industrial Relations Development Officer C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32546",
            "PositionName" => "Industrial Relations Development/management Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32547",
            "PositionName" => "Industrial Relations Development/management Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32548",
            "PositionName" => "Industrial Relations Development/management Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32549",
            "PositionName" => "Industrial Relations Management Chief",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32550",
            "PositionName" => "Industrial Relations Management Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32551",
            "PositionName" => "Industrial Relations Management Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32552",
            "PositionName" => "Industrial Relations Management Officer C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32553",
            "PositionName" => "Industrial Security Guard A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32554",
            "PositionName" => "Industrial Security Guard B",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32555",
            "PositionName" => "Industrial Security Guard C",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32556",
            "PositionName" => "Industrial Security Officer",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32557",
            "PositionName" => "Industrial Zone Manager",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32558",
            "PositionName" => "Information Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32559",
            "PositionName" => "Information Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32560",
            "PositionName" => "Information Chief A",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32561",
            "PositionName" => "Information Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32562",
            "PositionName" => "Information Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32563",
            "PositionName" => "Information Officer C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32564",
            "PositionName" => "Information Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32565",
            "PositionName" => "Information Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32566",
            "PositionName" => "Information System Analyst I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32567",
            "PositionName" => "Information System Development Chief A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32568",
            "PositionName" => "Information Systems Design Specialist A",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32569",
            "PositionName" => "Information Systems Design Specialist B",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32570",
            "PositionName" => "Information Systems Researcher",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32572",
            "PositionName" => "Information Systems Researcher  III",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32571",
            "PositionName" => "Information Systems Researcher II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32573",
            "PositionName" => "Inmate Guidance Chief",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32574",
            "PositionName" => "Inmate Guidance Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32575",
            "PositionName" => "Inmate Guidance Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32576",
            "PositionName" => "Inspector (fire)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32577",
            "PositionName" => "Inspector (jail)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32578",
            "PositionName" => "Inspector (pnp)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32581",
            "PositionName" => "Instructor  III",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32579",
            "PositionName" => "Instructor I",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32580",
            "PositionName" => "Instructor II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32582",
            "PositionName" => "Instrument Technician A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32583",
            "PositionName" => "Instrument Technician B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32584",
            "PositionName" => "Insulationman I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32587",
            "PositionName" => "Insurance Adjuster  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32585",
            "PositionName" => "Insurance Adjuster I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32586",
            "PositionName" => "Insurance Adjuster II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32588",
            "PositionName" => "Insurance Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32589",
            "PositionName" => "Insurance Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32590",
            "PositionName" => "Insurance Commissioner",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32591",
            "PositionName" => "Insurance Processor I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32592",
            "PositionName" => "Insurance Processor II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32593",
            "PositionName" => "Insurance Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32594",
            "PositionName" => "Insurance Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32597",
            "PositionName" => "Insurance Underwriter  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32595",
            "PositionName" => "Insurance Underwriter I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32596",
            "PositionName" => "Insurance Underwriter II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32598",
            "PositionName" => "Insurance/risk Analyst A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32599",
            "PositionName" => "Insurance/risk Analyst B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32600",
            "PositionName" => "Intelligence Agent Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32601",
            "PositionName" => "Intelligence Agent I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32602",
            "PositionName" => "Intelligence Agent II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32605",
            "PositionName" => "Intelligence Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32603",
            "PositionName" => "Intelligence Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32604",
            "PositionName" => "Intelligence Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32606",
            "PositionName" => "Intelligence Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32607",
            "PositionName" => "Intelligence Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32608",
            "PositionName" => "Internal Civil Aviation Coordinator",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32609",
            "PositionName" => "Internal Control Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32610",
            "PositionName" => "Internal Control Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32611",
            "PositionName" => "Internal Control Officer A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32612",
            "PositionName" => "Internal Control Officer B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32615",
            "PositionName" => "Internal Science Relations Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32613",
            "PositionName" => "Internal Science Relations Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32614",
            "PositionName" => "Internal Science Relations Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32616",
            "PositionName" => "Internal Science Relations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32617",
            "PositionName" => "Internal Science Relations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32620",
            "PositionName" => "International Trade Officer  III",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32618",
            "PositionName" => "International Trade Officer I",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32619",
            "PositionName" => "International Trade Officer II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32623",
            "PositionName" => "Interpreter  III",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32621",
            "PositionName" => "Interpreter I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32622",
            "PositionName" => "Interpreter II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32626",
            "PositionName" => "Investigation Agent  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32624",
            "PositionName" => "Investigation Agent I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32625",
            "PositionName" => "Investigation Agent II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32627",
            "PositionName" => "Investigation Agent IV",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32628",
            "PositionName" => "Investigation Agent V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32629",
            "PositionName" => "Investigation Agent VI",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32630",
            "PositionName" => "Investment Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32631",
            "PositionName" => "Investment Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32632",
            "PositionName" => "Investment Assistant I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32633",
            "PositionName" => "Investment Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32634",
            "PositionName" => "Investments Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32635",
            "PositionName" => "Investments Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32636",
            "PositionName" => "Irrigator's Development Chief A",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32637",
            "PositionName" => "Irrigator's Development Chief B",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32638",
            "PositionName" => "Irrigator's Development Officer A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32639",
            "PositionName" => "Irrigator's Development Officer B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32642",
            "PositionName" => "Jail Officer  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32640",
            "PositionName" => "Jail Officer I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32641",
            "PositionName" => "Jail Officer II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32644",
            "PositionName" => "Judicial Staff Assistant  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32643",
            "PositionName" => "Judicial Staff Assistant II",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32645",
            "PositionName" => "Judicial Staff Employee Ii (utility Worker, Messenger)",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32646",
            "PositionName" => "Judicial Staff Head",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32647",
            "PositionName" => "Judicial Staff Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32648",
            "PositionName" => "Judicial Staff Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32649",
            "PositionName" => "Judicial Staff Officer V",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32650",
            "PositionName" => "Judicial Staff Officer VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32651",
            "PositionName" => "Junior Process Server",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32652",
            "PositionName" => "Junior Scholarship Affairs Officer",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32653",
            "PositionName" => "Labor Arbiter",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32654",
            "PositionName" => "Labor Arbitration Associate",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32655",
            "PositionName" => "Laboratory Aide  I(b)",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32656",
            "PositionName" => "Laboratory Aide Ii(a)",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32657",
            "PositionName" => "Laboratory Technician I(c)",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32658",
            "PositionName" => "Laboratory Technician Ii(b)",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32659",
            "PositionName" => "Laboratory Technician Iii(a)",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32660",
            "PositionName" => "Land Management Examiner",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32661",
            "PositionName" => "Land Management Inspector",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32664",
            "PositionName" => "Land Management Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32662",
            "PositionName" => "Land Management Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32663",
            "PositionName" => "Land Management Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32665",
            "PositionName" => "Land Management Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32666",
            "PositionName" => "Land Management Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32667",
            "PositionName" => "Land Registration Examiner I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32668",
            "PositionName" => "Land Registration Examiner II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32669",
            "PositionName" => "Language Researcher I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32670",
            "PositionName" => "Language Researcher II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32671",
            "PositionName" => "Launch Master",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32674",
            "PositionName" => "Law Education Specialist  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32672",
            "PositionName" => "Law Education Specialist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32673",
            "PositionName" => "Law Education Specialist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32675",
            "PositionName" => "Law Education Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32676",
            "PositionName" => "Law Education Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32677",
            "PositionName" => "Law Enforcement Evaluation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32678",
            "PositionName" => "Law Enforcement Evaluation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32679",
            "PositionName" => "Legal Researcher",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32680",
            "PositionName" => "Legal Researcher  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32681",
            "PositionName" => "Legislative Committee Researcher",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32682",
            "PositionName" => "Legislative Committee Secretary",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32685",
            "PositionName" => "Legislative Staff Assistant  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32683",
            "PositionName" => "Legislative Staff Assistant I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32684",
            "PositionName" => "Legislative Staff Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32686",
            "PositionName" => "Legislative Staff Employee I (utility Worker, Messenger)",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32687",
            "PositionName" => "Legislative Staff Employee Ii (utility Worker, Messenger)",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32688",
            "PositionName" => "Legislative Staff Head",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32691",
            "PositionName" => "Legislative Staff Officer  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32689",
            "PositionName" => "Legislative Staff Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32690",
            "PositionName" => "Legislative Staff Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32692",
            "PositionName" => "Legislative Staff Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32693",
            "PositionName" => "Legislative Staff Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32694",
            "PositionName" => "Legislative Staff Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32695",
            "PositionName" => "Letter Carrier",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32696",
            "PositionName" => "Letter Of Credit Analyst I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32697",
            "PositionName" => "Letter Of Credit Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32698",
            "PositionName" => "Liaison Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32699",
            "PositionName" => "Liaison Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32700",
            "PositionName" => "Liaison Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32701",
            "PositionName" => "Liaison Officer A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32702",
            "PositionName" => "Liaison Officer B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32703",
            "PositionName" => "Liaison Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32704",
            "PositionName" => "Liaison Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32705",
            "PositionName" => "Librarian A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32706",
            "PositionName" => "Librarian Aide",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32707",
            "PositionName" => "Librarian B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32708",
            "PositionName" => "Light Equipment Operator",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32709",
            "PositionName" => "Light Equipment Operator",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32710",
            "PositionName" => "Lighthouse Inspector",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32711",
            "PositionName" => "Lighthouse Keeper I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32712",
            "PositionName" => "Lighthouse Keeper II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32713",
            "PositionName" => "Lighthouse Service Supervisor",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32714",
            "PositionName" => "Linguistic Specialist",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32715",
            "PositionName" => "Linotypist",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32716",
            "PositionName" => "Livelihood Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32717",
            "PositionName" => "Livelihood Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32718",
            "PositionName" => "Livelihood Chief A",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32719",
            "PositionName" => "Livelihood Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32720",
            "PositionName" => "Livelihood Chief C",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32721",
            "PositionName" => "Livelihood Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32722",
            "PositionName" => "Livelihood Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32723",
            "PositionName" => "Livestock Inspector  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32724",
            "PositionName" => "Loan Analyst  II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32725",
            "PositionName" => "Loan Analyst B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32726",
            "PositionName" => "Loan Analyst I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32727",
            "PositionName" => "Loan And Credit  Analyst  I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32728",
            "PositionName" => "Loan And Credit  Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32731",
            "PositionName" => "Loan And Credit Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32729",
            "PositionName" => "Loan And Credit Officer I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32730",
            "PositionName" => "Loan And Credit Officer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32732",
            "PositionName" => "Loan Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32733",
            "PositionName" => "Loan Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32734",
            "PositionName" => "Loan Credit Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32735",
            "PositionName" => "Loan Credit Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32738",
            "PositionName" => "Loan Examiner  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32736",
            "PositionName" => "Loan Examiner  IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32737",
            "PositionName" => "Loan Examiner I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32739",
            "PositionName" => "Loans Analyst A",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32742",
            "PositionName" => "Loans And Credit Evaluator  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32740",
            "PositionName" => "Loans And Credit Evaluator I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32741",
            "PositionName" => "Loans And Credit Evaluator II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32745",
            "PositionName" => "Loans And Discount Officer  III",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32743",
            "PositionName" => "Loans And Discount Officer I",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32744",
            "PositionName" => "Loans And Discount Officer II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32746",
            "PositionName" => "Loans Document Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32747",
            "PositionName" => "Loans Document Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32748",
            "PositionName" => "Loans Examiner  II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32749",
            "PositionName" => "Loans Management  Chief A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32750",
            "PositionName" => "Loans Management  Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32751",
            "PositionName" => "Loans Management Officer",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32752",
            "PositionName" => "Loans Management Specialist",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32753",
            "PositionName" => "Loans Specialist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32754",
            "PositionName" => "Loans Specialist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32755",
            "PositionName" => "Local Assessment Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32756",
            "PositionName" => "Local Assessment Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32757",
            "PositionName" => "Local Government Operations Officer   III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32763",
            "PositionName" => "Local Government Operations Officer  VII",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32758",
            "PositionName" => "Local Government Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32759",
            "PositionName" => "Local Government Operations Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32760",
            "PositionName" => "Local Government Operations Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32761",
            "PositionName" => "Local Government Operations Officer V",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32764",
            "PositionName" => "Local Government Operations Officer V III",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32762",
            "PositionName" => "Local Government Operations Officer VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32767",
            "PositionName" => "Local Legislative Staff Assistant  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32765",
            "PositionName" => "Local Legislative Staff Assistant I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32766",
            "PositionName" => "Local Legislative Staff Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32768",
            "PositionName" => "Local Legislative Staff Employee I (utility Worker, Messenger)",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32769",
            "PositionName" => "Local Legislative Staff Employee Ii (utility Worker, Messenger)",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32772",
            "PositionName" => "Local Legislative Staff Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32770",
            "PositionName" => "Local Legislative Staff Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32771",
            "PositionName" => "Local Legislative Staff Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32773",
            "PositionName" => "Local Legislative Staff Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32774",
            "PositionName" => "Local Legislative Staff Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32775",
            "PositionName" => "Local Legislative Staff Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32778",
            "PositionName" => "Local Management Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32776",
            "PositionName" => "Local Management Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32777",
            "PositionName" => "Local Management Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32779",
            "PositionName" => "Local Management Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32780",
            "PositionName" => "Local Management Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32783",
            "PositionName" => "Local Revenue Collection Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32781",
            "PositionName" => "Local Revenue Collection Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32782",
            "PositionName" => "Local Revenue Collection Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32784",
            "PositionName" => "Local Revenue Collection Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32785",
            "PositionName" => "Local Revenue Collection Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32786",
            "PositionName" => "Local Treasury Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32787",
            "PositionName" => "Local Treasury Examiner II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32788",
            "PositionName" => "Local Treasury Operations Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32790",
            "PositionName" => "Local Treasury Operations Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32789",
            "PositionName" => "Local Treasury Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32791",
            "PositionName" => "Local Treasury Operations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32792",
            "PositionName" => "Local Treasury Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32795",
            "PositionName" => "Logistics Management Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32793",
            "PositionName" => "Logistics Management Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32794",
            "PositionName" => "Logistics Management Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32796",
            "PositionName" => "Logistics Management Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32797",
            "PositionName" => "Logistics Management Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32798",
            "PositionName" => "Lumber Grader",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32799",
            "PositionName" => "Lupon Chairman (pambayan I)#",
            "SalaryGrade"  => "0",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32800",
            "PositionName" => "Lupon Chairman (pambayan Ii)#",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32801",
            "PositionName" => "Lupon Chairman (pambayan Iii)#",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32802",
            "PositionName" => "Lupon Chairman (panlalawigan)#",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32803",
            "PositionName" => "Lupon Chairman (panlunsod I#)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32804",
            "PositionName" => "Lupon Chairman (panlunsod Ii)#",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32805",
            "PositionName" => "Lupon Chairman (panlunsod Iii)#",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32806",
            "PositionName" => "Machine Shop Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32807",
            "PositionName" => "Machine Shop Foreman (a)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32808",
            "PositionName" => "Machine Shop Foreman (b)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32809",
            "PositionName" => "Machine Shop General Foreman",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32810",
            "PositionName" => "Machinist",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32811",
            "PositionName" => "Macologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32812",
            "PositionName" => "Macologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32815",
            "PositionName" => "Magnetic Recorder Operator  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32813",
            "PositionName" => "Magnetic Recorder Operator I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32814",
            "PositionName" => "Magnetic Recorder Operator II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32816",
            "PositionName" => "Mail Sorter",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32817",
            "PositionName" => "Maintenance General Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32818",
            "PositionName" => "Make-up Artist",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32819",
            "PositionName" => "Malaria Control Foreman",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32820",
            "PositionName" => "Management Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32821",
            "PositionName" => "Management Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32822",
            "PositionName" => "Management And Audit Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32823",
            "PositionName" => "Management And Audit Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32824",
            "PositionName" => "Management And Audit Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32827",
            "PositionName" => "Management And Audit Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32825",
            "PositionName" => "Management And Audit Officer I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32826",
            "PositionName" => "Management And Audit Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32828",
            "PositionName" => "Management And Audit Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32829",
            "PositionName" => "Management And Audit Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32830",
            "PositionName" => "Management Information Analyst",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32831",
            "PositionName" => "Management Information Specialist A",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32832",
            "PositionName" => "Management Information Specialist B",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32833",
            "PositionName" => "Management Information Systems Design Specialist A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32834",
            "PositionName" => "Management Information Systems Design Specialist B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32835",
            "PositionName" => "Management Information Systems Researcher",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32836",
            "PositionName" => "Management Information Systems/development Chief A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32837",
            "PositionName" => "Management Information Systems/development Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32838",
            "PositionName" => "Management Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32839",
            "PositionName" => "Management Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32840",
            "PositionName" => "Management Systems Analyst",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32841",
            "PositionName" => "Management Systems Design Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32842",
            "PositionName" => "Management Systems Developement Chief A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32843",
            "PositionName" => "Management Systems Developement Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32844",
            "PositionName" => "Management Systems Development Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32845",
            "PositionName" => "Management Systems Researcher",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32846",
            "PositionName" => "Manager",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32849",
            "PositionName" => "Manager  III",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32847",
            "PositionName" => "Manager I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32848",
            "PositionName" => "Manager II",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32850",
            "PositionName" => "Managing Director",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32851",
            "PositionName" => "Managing News Editor",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32852",
            "PositionName" => "Manpower Development Regional Coordinator",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32853",
            "PositionName" => "Marine Engineer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32854",
            "PositionName" => "Marine Engineer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32855",
            "PositionName" => "Maritime Industry Development Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32856",
            "PositionName" => "Maritime Industry Development Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32857",
            "PositionName" => "Maritime Industry Development Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32858",
            "PositionName" => "Market Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32859",
            "PositionName" => "Marketing Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32860",
            "PositionName" => "Marketing Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32861",
            "PositionName" => "Mason I(b)",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32862",
            "PositionName" => "Mason Ii(a)",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32863",
            "PositionName" => "Master Fisherman I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32864",
            "PositionName" => "Master Fisherman II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32865",
            "PositionName" => "Master Plumber",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32866",
            "PositionName" => "Master Tailor I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32867",
            "PositionName" => "Master Tailor II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32868",
            "PositionName" => "Master Teacher I (elementary Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32869",
            "PositionName" => "Master Teacher I (pre-school)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32870",
            "PositionName" => "Master Teacher I (secondary Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32871",
            "PositionName" => "Master Teacher I (vocational And Two Years Tecnical Course)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32872",
            "PositionName" => "Master Teacher Ii (elementary Grades)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32873",
            "PositionName" => "Master Teacher Ii (pre-school)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32874",
            "PositionName" => "Master Teacher Ii (secondary Grades)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32875",
            "PositionName" => "Master Teacher Ii (vocationa And Two Years Technical Course)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32876",
            "PositionName" => "Master Teacher Iii (elementary Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32877",
            "PositionName" => "Master Teacher Iii (pre-school)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32878",
            "PositionName" => "Master Teacher Iii (secondary Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32879",
            "PositionName" => "Master Teacher Iii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32880",
            "PositionName" => "Master Teacher Iv (elementary Grades)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32881",
            "PositionName" => "Master Teacher Iv (pre-school)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32882",
            "PositionName" => "Master Teacher Iv (secondary Grades)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32883",
            "PositionName" => "Master Teacher Iv (vocational And Two Years Tsechnical Course)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32884",
            "PositionName" => "Material Planning Services Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32885",
            "PositionName" => "Material Procurement Services Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32886",
            "PositionName" => "Materials Planning Officer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32887",
            "PositionName" => "Materials Planning Officer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32888",
            "PositionName" => "Materials Procurement Officer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32889",
            "PositionName" => "Materials Procurement Officer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32890",
            "PositionName" => "Materials/supplies Inspector",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32891",
            "PositionName" => "Mathematician Aide I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32892",
            "PositionName" => "Mathematician Aide II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32893",
            "PositionName" => "Mathematician I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32894",
            "PositionName" => "Mathematician II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32895",
            "PositionName" => "Mechanic A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32896",
            "PositionName" => "Mechanic B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32897",
            "PositionName" => "Mechanic C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32900",
            "PositionName" => "Mechanic/technician  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32898",
            "PositionName" => "Mechanic/technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32899",
            "PositionName" => "Mechanic/technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32901",
            "PositionName" => "Mechanic/technician IV",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32902",
            "PositionName" => "Mechanical Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32903",
            "PositionName" => "Mechanical Helper",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32904",
            "PositionName" => "Mechanical Plant Supervisor I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32905",
            "PositionName" => "Mechanical Plant Supervisor II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32908",
            "PositionName" => "Mechanical/electrical Equipment Operator  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32906",
            "PositionName" => "Mechanical/electrical Equipment Operator I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32907",
            "PositionName" => "Mechanical/electrical Equipment Operator II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32911",
            "PositionName" => "Media Accreditation And Relations Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32909",
            "PositionName" => "Media Accreditation And Relations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32910",
            "PositionName" => "Media Accreditation And Relations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32912",
            "PositionName" => "Media Accreditation And Relations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32913",
            "PositionName" => "Media Accreditation And Relations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32914",
            "PositionName" => "Media Productiion Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32915",
            "PositionName" => "Media Production Aide",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32916",
            "PositionName" => "Media Production Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32917",
            "PositionName" => "Mediator-arbiter",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32918",
            "PositionName" => "Medical Center Chief I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32919",
            "PositionName" => "Medical Center Chief II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32920",
            "PositionName" => "Medical Claims Processor",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32921",
            "PositionName" => "Medical Equipment Technician  I(d)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32922",
            "PositionName" => "Medical Equipment Technician  Ii(c)",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32923",
            "PositionName" => "Medical Equipment Technician  Iii(b)",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32924",
            "PositionName" => "Medical Equipment Technician Iv(a)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32925",
            "PositionName" => "Medical Officer  I(c)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32926",
            "PositionName" => "Medical Officer  Ii(b)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32929",
            "PositionName" => "Medical Officer  VII",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32927",
            "PositionName" => "Medical Officer Iii(a)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32928",
            "PositionName" => "Medical Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32930",
            "PositionName" => "Medical Services Aide A",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32931",
            "PositionName" => "Medical Services Aide B",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32932",
            "PositionName" => "Medical Services Assistant",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32933",
            "PositionName" => "Medical Services Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32934",
            "PositionName" => "Medical Specialist",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32937",
            "PositionName" => "Medical Specialist  III",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32941",
            "PositionName" => "Medical Specialist  VII",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32935",
            "PositionName" => "Medical Specialist I",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32936",
            "PositionName" => "Medical Specialist II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32938",
            "PositionName" => "Medical Specialist IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32939",
            "PositionName" => "Medical Specialist V",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32940",
            "PositionName" => "Medical Specialist VI",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32942",
            "PositionName" => "Medical Technologist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32943",
            "PositionName" => "Medical Technologist IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32944",
            "PositionName" => "Medical Technologist V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32947",
            "PositionName" => "Medico-legal Officer  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32945",
            "PositionName" => "Medico-legal Officer I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32946",
            "PositionName" => "Medico-legal Officer II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32948",
            "PositionName" => "Medico-legal Officer IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32949",
            "PositionName" => "Medico-legal Officer V",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32950",
            "PositionName" => "Member, Constitutional Commission",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32951",
            "PositionName" => "Member, Of The House Of Representatives #",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32952",
            "PositionName" => "Member, Regional Assembly",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32954",
            "PositionName" => "Members Of The Commission On Human Rights #",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32953",
            "PositionName" => "Members Of The Commission On Human Rights #",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32955",
            "PositionName" => "Members Services Assistant I",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32956",
            "PositionName" => "Members Services Assistant II",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32960",
            "PositionName" => "Members Services Officer  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32957",
            "PositionName" => "Members Services Officer I",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32959",
            "PositionName" => "Members Services Officer II",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32958",
            "PositionName" => "Members Services Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32961",
            "PositionName" => "Members Services Officer IV",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32962",
            "PositionName" => "Merchandiser  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32963",
            "PositionName" => "Merchant Banking Specialist",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32964",
            "PositionName" => "Mess Boy",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32965",
            "PositionName" => "Message Writer",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32966",
            "PositionName" => "Metal Worker",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32967",
            "PositionName" => "Metal Worker Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32968",
            "PositionName" => "Metal Worker General Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32969",
            "PositionName" => "Metal Worker I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32970",
            "PositionName" => "Metal Worker II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32971",
            "PositionName" => "Metallurgist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32972",
            "PositionName" => "Metallurgist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32975",
            "PositionName" => "Metals Technologist  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32973",
            "PositionName" => "Metals Technologist I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32974",
            "PositionName" => "Metals Technologist II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32976",
            "PositionName" => "Metals Technologist IV",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32977",
            "PositionName" => "Metals Technologist V",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32980",
            "PositionName" => "Meter Reader  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32978",
            "PositionName" => "Meter Reader I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32979",
            "PositionName" => "Meter Reader II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32981",
            "PositionName" => "National Cashier",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32982",
            "PositionName" => "National Intelligence Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32983",
            "PositionName" => "National Intelligence Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32986",
            "PositionName" => "National Intelligence Specialist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32984",
            "PositionName" => "National Intelligence Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32985",
            "PositionName" => "National Intelligence Specialist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32987",
            "PositionName" => "National Intelligence Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32992",
            "PositionName" => "National Security Specialist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32993",
            "PositionName" => "National Security Specialist  III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32988",
            "PositionName" => "National Security Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32989",
            "PositionName" => "National Security Specialist I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32990",
            "PositionName" => "National Security Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32991",
            "PositionName" => "National Security Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32995",
            "PositionName" => "National Security Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32994",
            "PositionName" => "National Security Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32996",
            "PositionName" => "National Security Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32997",
            "PositionName" => "National Security Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32998",
            "PositionName" => "Nautical Writer I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "32999",
            "PositionName" => "Nautical Writer II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33000",
            "PositionName" => "Network Controller I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33001",
            "PositionName" => "Network Controller II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33004",
            "PositionName" => "News Analyst  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33002",
            "PositionName" => "News Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33003",
            "PositionName" => "News Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33005",
            "PositionName" => "News Analyst IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33006",
            "PositionName" => "News Editor I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33007",
            "PositionName" => "News Editor II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33008",
            "PositionName" => "News Reporter I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33009",
            "PositionName" => "News Reporter II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33010",
            "PositionName" => "Newscaster I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33011",
            "PositionName" => "Newscaster II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33012",
            "PositionName" => "Nurse  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33014",
            "PositionName" => "Nurse Maid  II",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33013",
            "PositionName" => "Nurse Maid I",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33015",
            "PositionName" => "Nursing Adviser",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33016",
            "PositionName" => "Nursing Attendant II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33019",
            "PositionName" => "Nursing School Principal  III",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33017",
            "PositionName" => "Nursing School Principal I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33018",
            "PositionName" => "Nursing School Principal II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33020",
            "PositionName" => "Nutrition Program Coordinator",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33021",
            "PositionName" => "Nutritionist",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33024",
            "PositionName" => "Nutritionist Dietitian  III",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33022",
            "PositionName" => "Nutritionist Dietitian I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33023",
            "PositionName" => "Nutritionist Dietitian II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33025",
            "PositionName" => "Nutritionist Dietitian IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33026",
            "PositionName" => "Nutritionist Dietitian V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33027",
            "PositionName" => "Nutritionist Dietitian VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33028",
            "PositionName" => "Oans And Discount Officer  IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33031",
            "PositionName" => "Occanographer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33029",
            "PositionName" => "Occanographer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33030",
            "PositionName" => "Occanographer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33032",
            "PositionName" => "Occanographer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33033",
            "PositionName" => "Occanographer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33034",
            "PositionName" => "Occupational  Therapist I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33036",
            "PositionName" => "Occupational Therapist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33035",
            "PositionName" => "Occupational Therapist II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33037",
            "PositionName" => "Occupational Therapist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33038",
            "PositionName" => "Occupational Therapist Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33039",
            "PositionName" => "Occupational Therapist Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33040",
            "PositionName" => "Office Equipment Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33041",
            "PositionName" => "Office Equipment Helper",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33042",
            "PositionName" => "Office Equipment Technician A",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33043",
            "PositionName" => "Office Equipment Technician B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33044",
            "PositionName" => "Offset Camera Operator I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33045",
            "PositionName" => "Offset Camera Operator II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33046",
            "PositionName" => "Offset Machine Operator",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33047",
            "PositionName" => "Oiler",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33048",
            "PositionName" => "Ombudsman",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33049",
            "PositionName" => "Operation Maintenance Superintendent A",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33050",
            "PositionName" => "Operation Maintenance Superintendent B",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33051",
            "PositionName" => "Operation Maintenance Superintendent C",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33052",
            "PositionName" => "Operation Manager",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33053",
            "PositionName" => "Optometrist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33054",
            "PositionName" => "Optometrist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33055",
            "PositionName" => "Orchestra Doctor",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33056",
            "PositionName" => "Orchestra Manager",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33059",
            "PositionName" => "Orchestra Member  III",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33057",
            "PositionName" => "Orchestra Member I",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33058",
            "PositionName" => "Orchestra Member II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33060",
            "PositionName" => "Orchestra Member IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33061",
            "PositionName" => "Orchestra Member V",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33064",
            "PositionName" => "Ordnance Technician  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33062",
            "PositionName" => "Ordnance Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33063",
            "PositionName" => "Ordnance Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33065",
            "PositionName" => "Ourt Education Demonstrator II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33066",
            "PositionName" => "Overall Deputy Ombudsman",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33067",
            "PositionName" => "Overseas Employment Ajudicator",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33068",
            "PositionName" => "Overseas Operations Officer I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33069",
            "PositionName" => "Overseas Operations Officer II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33070",
            "PositionName" => "Overseas Worker Welfare Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33073",
            "PositionName" => "Overseas Worker Welfare Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33071",
            "PositionName" => "Overseas Worker Welfare Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33072",
            "PositionName" => "Overseas Worker Welfare Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33074",
            "PositionName" => "Overseas Worker Welfare Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33075",
            "PositionName" => "Overseas Worker Welfare Officer V",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33076",
            "PositionName" => "Overseas Worker Welfare Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33077",
            "PositionName" => "Painter I (b)",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33078",
            "PositionName" => "Painter Ii (a)",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33079",
            "PositionName" => "Paper Cutting  Machine  Operation",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33082",
            "PositionName" => "Paper Cutting  Machine  Operation  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33080",
            "PositionName" => "Paper Cutting  Machine  Operation I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33081",
            "PositionName" => "Paper Cutting  Machine  Operation II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33083",
            "PositionName" => "Park Administrator",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33084",
            "PositionName" => "Park Attendant I",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33085",
            "PositionName" => "Park Maintenance  Supervisor",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33088",
            "PositionName" => "Park Operations Superintendent  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33086",
            "PositionName" => "Park Operations Superintendent I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33087",
            "PositionName" => "Park Operations Superintendent II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33089",
            "PositionName" => "Park Operations Superintendent IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33090",
            "PositionName" => "Park Operations Superintendent V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33091",
            "PositionName" => "Park Operations Superintendent VI",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33092",
            "PositionName" => "Parking Aide I",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33093",
            "PositionName" => "Patent And Trademark Executive Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33094",
            "PositionName" => "Patent And Trademark Executive Examiner II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33095",
            "PositionName" => "Patent Principal Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33096",
            "PositionName" => "Patent Principal Examiner II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33097",
            "PositionName" => "Pattern Marker  II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33099",
            "PositionName" => "Peace Program  Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33098",
            "PositionName" => "Peace Program  Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33100",
            "PositionName" => "Peace Program  Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33101",
            "PositionName" => "Peace Program  Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33102",
            "PositionName" => "Penal Institution  Program Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33103",
            "PositionName" => "Penal Institution  Program Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33106",
            "PositionName" => "Penal Institution Superintendent  III",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33104",
            "PositionName" => "Penal Institution Superintendent I",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33105",
            "PositionName" => "Penal Institution Superintendent II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33107",
            "PositionName" => "Penal Institution Supervisor",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33108",
            "PositionName" => "Permits And Licensing  Officer",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33109",
            "PositionName" => "Personnel Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33110",
            "PositionName" => "Personnel Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33111",
            "PositionName" => "Petrologist",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33115",
            "PositionName" => "Pharmacist  VII",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33112",
            "PositionName" => "Pharmacist I  (c)",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33113",
            "PositionName" => "Pharmacist Ii (ii)",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33114",
            "PositionName" => "Pharmacist Iii (a)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33116",
            "PositionName" => "Pharmacy Adviser",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33117",
            "PositionName" => "Pharmacy Program  Supervisor",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33118",
            "PositionName" => "Philatelic Artist I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33119",
            "PositionName" => "Philatelic Artist II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33120",
            "PositionName" => "Photo Editor I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33121",
            "PositionName" => "Photo Editor II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33122",
            "PositionName" => "Photo Journalist I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33123",
            "PositionName" => "Photo Journalist II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33124",
            "PositionName" => "Photo Laboratory  Technician",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33125",
            "PositionName" => "Photo Lethographic  Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33126",
            "PositionName" => "Photo Lethographic  Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33129",
            "PositionName" => "Photoengraver   III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33128",
            "PositionName" => "Photoengraver  II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33127",
            "PositionName" => "Photoengraver I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33130",
            "PositionName" => "Photoengraver IV",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33131",
            "PositionName" => "Photoengraver V",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33132",
            "PositionName" => "Photographer",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33138",
            "PositionName" => "Photographer  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33133",
            "PositionName" => "Photographer  IV",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33135",
            "PositionName" => "Photographer  VI",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33136",
            "PositionName" => "Photographer I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33137",
            "PositionName" => "Photographer II",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33134",
            "PositionName" => "Photographer V",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33141",
            "PositionName" => "Photographic Color Processor  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33139",
            "PositionName" => "Photographic Color Processor I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33140",
            "PositionName" => "Photographic Color Processor II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33144",
            "PositionName" => "Physical Therapist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33142",
            "PositionName" => "Physical Therapist I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33143",
            "PositionName" => "Physical Therapist II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33145",
            "PositionName" => "Physical Therapist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33146",
            "PositionName" => "Physical Therapy Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33147",
            "PositionName" => "Physical Therapy Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33150",
            "PositionName" => "Physician  III",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33148",
            "PositionName" => "Physician I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33149",
            "PositionName" => "Physician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33151",
            "PositionName" => "Physician IV",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33152",
            "PositionName" => "Physicist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33153",
            "PositionName" => "Physicist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33154",
            "PositionName" => "Pilot A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33155",
            "PositionName" => "Pilot B",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33156",
            "PositionName" => "Pilot I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33157",
            "PositionName" => "Pilot II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33158",
            "PositionName" => "Pipefitter A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33159",
            "PositionName" => "Pipefitter B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33160",
            "PositionName" => "Pipefitter C",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33161",
            "PositionName" => "Pipefitter D",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33162",
            "PositionName" => "Pipefitter Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33163",
            "PositionName" => "Pipefitter I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33164",
            "PositionName" => "Pipefitter II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33165",
            "PositionName" => "Planning 0fficer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33166",
            "PositionName" => "Planning Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33167",
            "PositionName" => "Planning Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33168",
            "PositionName" => "Planning Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33169",
            "PositionName" => "Planning Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33170",
            "PositionName" => "Planning Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33171",
            "PositionName" => "Planning Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33172",
            "PositionName" => "Planning Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33173",
            "PositionName" => "Planning Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33174",
            "PositionName" => "Planning Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33175",
            "PositionName" => "Plant Electrical Foreman",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33176",
            "PositionName" => "Plant Eletrical Maintenance Foreman",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33178",
            "PositionName" => "Plant Eletrician A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33177",
            "PositionName" => "Plant Eletrician A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33179",
            "PositionName" => "Plant Eletrician B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33180",
            "PositionName" => "Plant Eletrician B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33181",
            "PositionName" => "Plant Eletrician C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33182",
            "PositionName" => "Plant Eletrician C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33183",
            "PositionName" => "Plant Equipment Operator A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33184",
            "PositionName" => "Plant Equipment Operator B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33185",
            "PositionName" => "Plant Equipment Operator C",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33186",
            "PositionName" => "Plant Equipment Operator D",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33187",
            "PositionName" => "Plant Equipment Operator E",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33188",
            "PositionName" => "Plant Mechanic A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33189",
            "PositionName" => "Plant Mechanic A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33190",
            "PositionName" => "Plant Mechanic B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33191",
            "PositionName" => "Plant Mechanic B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33192",
            "PositionName" => "Plant Mechanic C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33193",
            "PositionName" => "Plant Mechanic C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33194",
            "PositionName" => "Plant Mechanical Maintenance Foreman",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33195",
            "PositionName" => "Plant Mechanical Maintenance Foreman",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33196",
            "PositionName" => "Plant/substation Helper A",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33197",
            "PositionName" => "Plant/substation Helper B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33198",
            "PositionName" => "Plant/substation Helper C",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33199",
            "PositionName" => "Plumber A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33200",
            "PositionName" => "Plumber B",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33201",
            "PositionName" => "Plumber C",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33202",
            "PositionName" => "Plumber Foreman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33203",
            "PositionName" => "Plumber I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33204",
            "PositionName" => "Plumber II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33207",
            "PositionName" => "Police Inspector  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33205",
            "PositionName" => "Police Inspector I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33206",
            "PositionName" => "Police Inspector II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33208",
            "PositionName" => "Police Inspector IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33209",
            "PositionName" => "Police Inspector V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33210",
            "PositionName" => "Police Officer I (pnp)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33211",
            "PositionName" => "Police Officer Ii (pnp)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33212",
            "PositionName" => "Police Officer Iii (pnp)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33215",
            "PositionName" => "Political  Affairs Assistant  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33213",
            "PositionName" => "Political  Affairs Assistant I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33214",
            "PositionName" => "Political  Affairs Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33217",
            "PositionName" => "Political Affairs Officer  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33216",
            "PositionName" => "Political Affairs Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33218",
            "PositionName" => "Political Affairs Officer IV",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33221",
            "PositionName" => "Polygraph Examiner  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33219",
            "PositionName" => "Polygraph Examiner I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33220",
            "PositionName" => "Polygraph Examiner II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33222",
            "PositionName" => "Polygraph Examiner IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33223",
            "PositionName" => "Polygraph Examiner V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33224",
            "PositionName" => "Population Program Coordinator",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33225",
            "PositionName" => "Population Program Worker  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33226",
            "PositionName" => "Port District Manager",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33227",
            "PositionName" => "Port Manager A",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33228",
            "PositionName" => "Port Manager B",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33229",
            "PositionName" => "Port Manager C",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33230",
            "PositionName" => "Port Operations  Analyst A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33231",
            "PositionName" => "Port Operations  Analyst B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33232",
            "PositionName" => "Port Operations  Chief",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33233",
            "PositionName" => "Port Operations Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33234",
            "PositionName" => "Porter",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33235",
            "PositionName" => "Porter Leadman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33236",
            "PositionName" => "Postage Stamps Custodian  II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33238",
            "PositionName" => "Postage Stamps Custodian  III",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33237",
            "PositionName" => "Postage Stamps Custodian I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33239",
            "PositionName" => "Postal Service Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33240",
            "PositionName" => "Postal Service Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33241",
            "PositionName" => "Postal Service Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33242",
            "PositionName" => "Postal Service Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33245",
            "PositionName" => "Postal Teller  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33243",
            "PositionName" => "Postal Teller I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33244",
            "PositionName" => "Postal Teller II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33248",
            "PositionName" => "Postman  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33246",
            "PositionName" => "Postman I (utility, Messenger)",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33247",
            "PositionName" => "Postman II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33249",
            "PositionName" => "Postman IV",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33250",
            "PositionName" => "Postmaster  General",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33253",
            "PositionName" => "Postmaster  III",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33257",
            "PositionName" => "Postmaster  VII",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33251",
            "PositionName" => "Postmaster I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33252",
            "PositionName" => "Postmaster II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33254",
            "PositionName" => "Postmaster IV",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33255",
            "PositionName" => "Postmaster V",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33256",
            "PositionName" => "Postmaster VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33258",
            "PositionName" => "Poundkeeper I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33259",
            "PositionName" => "Precision Instrument Repair And Maintenace Services Chief",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33262",
            "PositionName" => "Precision Instrument Technician  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33260",
            "PositionName" => "Precision Instrument Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33261",
            "PositionName" => "Precision Instrument Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33264",
            "PositionName" => "President",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33266",
            "PositionName" => "President",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33265",
            "PositionName" => "President",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33263",
            "PositionName" => "President",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33267",
            "PositionName" => "President Of The Republic Of The Philippines #",
            "SalaryGrade"  => "32",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33268",
            "PositionName" => "President Of The Senate #",
            "SalaryGrade"  => "32",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33269",
            "PositionName" => "President/general/manager/administrator",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33270",
            "PositionName" => "Presidential  Spokesman",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33273",
            "PositionName" => "Presidential  Staff Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33271",
            "PositionName" => "Presidential  Staff Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33272",
            "PositionName" => "Presidential  Staff Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33274",
            "PositionName" => "Presidential  Staff Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33275",
            "PositionName" => "Presidential  Staff Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33276",
            "PositionName" => "Presidential  Staff Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33277",
            "PositionName" => "Presidential Adviser",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33278",
            "PositionName" => "Presidential Assistant I",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33279",
            "PositionName" => "Presidential Assistant II",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33280",
            "PositionName" => "Presidential Legislative  Adviser",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33283",
            "PositionName" => "Presidential Legislative  Liaison Officer  III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33281",
            "PositionName" => "Presidential Legislative  Liaison Officer I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33282",
            "PositionName" => "Presidential Legislative  Liaison Officer II",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33284",
            "PositionName" => "Presidential Protocol  Officers",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33285",
            "PositionName" => "Presidential Staff  Assistant",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33286",
            "PositionName" => "Presidential Staff Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33287",
            "PositionName" => "Presiding Judge, Court Of Tax Appeals #",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33288",
            "PositionName" => "Presiding Justice, Sandiganbayan #",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33289",
            "PositionName" => "Presiding Justice,court Of Appeals #",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33290",
            "PositionName" => "Press Roller Maker I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33291",
            "PositionName" => "Press Roller Maker II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33292",
            "PositionName" => "Press Secretary",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33293",
            "PositionName" => "Press-proof Revisor",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33294",
            "PositionName" => "Principal Architect A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33295",
            "PositionName" => "Principal Architect B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33296",
            "PositionName" => "Principal Chemist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33297",
            "PositionName" => "Principal Draftsman  B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33298",
            "PositionName" => "Principal Draftsman A",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33299",
            "PositionName" => "Principal Engineer A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33300",
            "PositionName" => "Principal Engineer B",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33301",
            "PositionName" => "Principal Engineer C",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33302",
            "PositionName" => "Principal Engineer D",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33303",
            "PositionName" => "Principal Geologist A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33304",
            "PositionName" => "Principal Geologist B",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33305",
            "PositionName" => "Principal Geologist C",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33306",
            "PositionName" => "Principal Geophysicist A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33307",
            "PositionName" => "Principal Geophysicist B",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33308",
            "PositionName" => "Principal Geophysicist C",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33309",
            "PositionName" => "Principal Hydro-geologist  B",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33310",
            "PositionName" => "Principal Hydro-geologist A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33311",
            "PositionName" => "Principal Hydro-geologist C",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33312",
            "PositionName" => "Principal Hydrologist A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33313",
            "PositionName" => "Principal Hydrologist B",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33314",
            "PositionName" => "Principal Hydrologist C",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33315",
            "PositionName" => "Principal Orchestra Member",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33318",
            "PositionName" => "Printing  Order Writer  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33316",
            "PositionName" => "Printing  Order Writer I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33317",
            "PositionName" => "Printing  Order Writer II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33319",
            "PositionName" => "Printing & Reproduction Cost Estimator",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33320",
            "PositionName" => "Printing Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33322",
            "PositionName" => "Printing Machine Operator  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33321",
            "PositionName" => "Printing Machine Operator I  '",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33323",
            "PositionName" => "Printing Machine Operator IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33324",
            "PositionName" => "Printing Operation  Chief",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33325",
            "PositionName" => "Printing Operation Assistant Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33326",
            "PositionName" => "Printing Plant  Maintenance Assistant  Chief",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33327",
            "PositionName" => "Printing Plant  Maintenance Chief",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33328",
            "PositionName" => "Printing Press  Operator A",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33329",
            "PositionName" => "Printing Press  Operator B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33330",
            "PositionName" => "Printing Press Supervisor",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33331",
            "PositionName" => "Printing Production /quality Control Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33332",
            "PositionName" => "Printing Production/quality Control Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33335",
            "PositionName" => "Printing Quality  Inspector  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33333",
            "PositionName" => "Printing Quality  Inspector I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33334",
            "PositionName" => "Printing Quality  Inspector II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33336",
            "PositionName" => "Printing Quality Control Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33337",
            "PositionName" => "Printing Quality Control Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33338",
            "PositionName" => "Printing Scheduler",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33339",
            "PositionName" => "Printing/reproduction  Supervisor A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33340",
            "PositionName" => "Printing/reproduction  Supervisor B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33341",
            "PositionName" => "Printing/reproduction Services  Chief",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33346",
            "PositionName" => "Private Secretary  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33342",
            "PositionName" => "Private Secretary B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33343",
            "PositionName" => "Private Secretary C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33344",
            "PositionName" => "Private Secretary I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33345",
            "PositionName" => "Private Secretary II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33347",
            "PositionName" => "Probation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33348",
            "PositionName" => "Probation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33349",
            "PositionName" => "Process Server",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33350",
            "PositionName" => "Process Server II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33351",
            "PositionName" => "Procurement Analyst  B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33352",
            "PositionName" => "Procurement Analyst A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33353",
            "PositionName" => "Procurement Assistant A",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33354",
            "PositionName" => "Procurement Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33357",
            "PositionName" => "Production Cost Estimator  III",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33355",
            "PositionName" => "Production Cost Estimator I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33356",
            "PositionName" => "Production Cost Estimator II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33360",
            "PositionName" => "Production Planning And Control Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33358",
            "PositionName" => "Production Planning And Control Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33359",
            "PositionName" => "Production Planning And Control Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33361",
            "PositionName" => "Production Planning And Control Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33362",
            "PositionName" => "Production Planning And Control Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33363",
            "PositionName" => "Production Planning Control Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33364",
            "PositionName" => "Professional Regulation Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33365",
            "PositionName" => "Professional Regulation Officer  II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33367",
            "PositionName" => "Professional Regulation Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33366",
            "PositionName" => "Professional Regulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33368",
            "PositionName" => "Professor IV",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33369",
            "PositionName" => "Professor V",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33370",
            "PositionName" => "Professor VI",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33373",
            "PositionName" => "Programmer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33371",
            "PositionName" => "Programmer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33372",
            "PositionName" => "Programmer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33376",
            "PositionName" => "Project Assistant  III",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33374",
            "PositionName" => "Project Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33375",
            "PositionName" => "Project Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33377",
            "PositionName" => "Project Assistant IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33381",
            "PositionName" => "Project Development Assistant  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33379",
            "PositionName" => "Project Development Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33378",
            "PositionName" => "Project Development Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33380",
            "PositionName" => "Project Development Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33382",
            "PositionName" => "Project Development Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33383",
            "PositionName" => "Project Development Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33385",
            "PositionName" => "Project Evaluation  Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33384",
            "PositionName" => "Project Evaluation  Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33386",
            "PositionName" => "Project Evaluation  Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33387",
            "PositionName" => "Project Evaluation Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33389",
            "PositionName" => "Project Evaluation Assistant  II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33388",
            "PositionName" => "Project Evaluation Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33392",
            "PositionName" => "Project Evaluation Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33391",
            "PositionName" => "Project Evaluation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33390",
            "PositionName" => "Project Evaluation Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33393",
            "PositionName" => "Project Evaluation Officers I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33394",
            "PositionName" => "Project Management  Officer A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33395",
            "PositionName" => "Project Management Officer B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33396",
            "PositionName" => "Project Manager",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33403",
            "PositionName" => "Project Manager  III",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33397",
            "PositionName" => "Project Manager A",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33398",
            "PositionName" => "Project Manager A",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33399",
            "PositionName" => "Project Manager B",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33400",
            "PositionName" => "Project Manager C",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33401",
            "PositionName" => "Project Manager I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33402",
            "PositionName" => "Project Manager II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33404",
            "PositionName" => "Project Manager IV",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33405",
            "PositionName" => "Project Manager V",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33408",
            "PositionName" => "Project Officer  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33406",
            "PositionName" => "Project Officer I",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33407",
            "PositionName" => "Project Officer II",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33409",
            "PositionName" => "Project Officer IV",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33410",
            "PositionName" => "Project Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33411",
            "PositionName" => "Project Planning And Development Assistant  B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33412",
            "PositionName" => "Project Planning And Development Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33413",
            "PositionName" => "Project Planning And Development Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33414",
            "PositionName" => "Project Planning And Development Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33415",
            "PositionName" => "Project Planning And Development Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33416",
            "PositionName" => "Project Planning And Development Officer C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33417",
            "PositionName" => "Proofreader I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33418",
            "PositionName" => "Proofreader II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33421",
            "PositionName" => "Property Appraiser  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33419",
            "PositionName" => "Property Appraiser I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33420",
            "PositionName" => "Property Appraiser II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33423",
            "PositionName" => "Property Appraiser IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33422",
            "PositionName" => "Property Appraiser IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33424",
            "PositionName" => "Property Appraiser V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33425",
            "PositionName" => "Property Appraiser V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33426",
            "PositionName" => "Property Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33427",
            "PositionName" => "Property Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33428",
            "PositionName" => "Property Custodian",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33431",
            "PositionName" => "Property Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33429",
            "PositionName" => "Property Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33430",
            "PositionName" => "Property Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33432",
            "PositionName" => "Property Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33433",
            "PositionName" => "Property Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33434",
            "PositionName" => "Property Supply Assistant A",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33435",
            "PositionName" => "Property Supply Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33436",
            "PositionName" => "Property/supply Management Services Chief",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33437",
            "PositionName" => "Property/supply Officer A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33438",
            "PositionName" => "Property/supply Officer B",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33439",
            "PositionName" => "Property/supply Officer C",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33440",
            "PositionName" => "Prosecution Attorney  II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33441",
            "PositionName" => "Prosecution Attorney I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33444",
            "PositionName" => "Prosecutor  III",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33442",
            "PositionName" => "Prosecutor I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33443",
            "PositionName" => "Prosecutor II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33445",
            "PositionName" => "Prosecutor IV",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33446",
            "PositionName" => "Provincial Accountant @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33447",
            "PositionName" => "Provincial Administrator @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33448",
            "PositionName" => "Provincial Agrarian Reform Ajudicator",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33449",
            "PositionName" => "Provincial Agrarian Reform Program Officer I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33450",
            "PositionName" => "Provincial Agrarian Reform Program Officer II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33451",
            "PositionName" => "Provincial Agriculturist @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33452",
            "PositionName" => "Provincial Agriculturist Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33453",
            "PositionName" => "Provincial Assessor @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33454",
            "PositionName" => "Provincial Budget Officer @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33455",
            "PositionName" => "Provincial Civil Registrar @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33456",
            "PositionName" => "Provincial Cooperatives Officer I @ (optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33459",
            "PositionName" => "Provincial Election Supervisor  III",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33457",
            "PositionName" => "Provincial Election Supervisor I",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33458",
            "PositionName" => "Provincial Election Supervisor II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33460",
            "PositionName" => "Provincial Election Supervisor IV",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33461",
            "PositionName" => "Provincial Engineer @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33462",
            "PositionName" => "Provincial Environment And Natural Resources Officer @(optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33463",
            "PositionName" => "Provincial General Service Officer @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33464",
            "PositionName" => "Provincial Government Assistant Department Head - A",
            "SalaryGrade"  => "25",
            "ShortName"    => "PGADH"
            ],
            [
            "PosCode"      => "33465",
            "PositionName" => "Provincial Government Department Head",
            "SalaryGrade"  => "26",
            "ShortName"    => "PGDH"
            ],
            [
            "PosCode"      => "33466",
            "PositionName" => "Provincial Government Department Head",
            "SalaryGrade"  => "26",
            "ShortName"    => "PGDH"
            ],
            [
            "PosCode"      => "33467",
            "PositionName" => "Provincial Governor",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33468",
            "PositionName" => "Provincial Health Officer I @(mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33469",
            "PositionName" => "Provincial Health Officer Ii @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33470",
            "PositionName" => "Provincial Information Officer @(optional)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33471",
            "PositionName" => "Provincial Legal Officer @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33472",
            "PositionName" => "Provincial Population Officer @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33473",
            "PositionName" => "Provincial Probation Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33474",
            "PositionName" => "Provincial Trade And Industry Officer",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33475",
            "PositionName" => "Provincial Vice Governor",
            "SalaryGrade"  => "28",
            "ShortName"    => "PVC"
            ],
            [
            "PosCode"      => "33476",
            "PositionName" => "Provl. Planning And Development Coordinator @(mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33478",
            "PositionName" => "Psychologist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33477",
            "PositionName" => "Psychologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33481",
            "PositionName" => "Public Attorney  III",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33479",
            "PositionName" => "Public Attorney I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33480",
            "PositionName" => "Public Attorney II",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33482",
            "PositionName" => "Public Attorney IV",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33483",
            "PositionName" => "Public Attorney V",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33484",
            "PositionName" => "Public Relation Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33485",
            "PositionName" => "Public Relations Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33486",
            "PositionName" => "Public Relations Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33487",
            "PositionName" => "Public Relations Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33488",
            "PositionName" => "Public Relations Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33494",
            "PositionName" => "Public Relations Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33489",
            "PositionName" => "Public Relations Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33490",
            "PositionName" => "Public Relations Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33491",
            "PositionName" => "Public Relations Officer C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33492",
            "PositionName" => "Public Relations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33493",
            "PositionName" => "Public Relations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33496",
            "PositionName" => "Public Relations Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33495",
            "PositionName" => "Public Relations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33497",
            "PositionName" => "Public Relations Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33498",
            "PositionName" => "Public Relations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33499",
            "PositionName" => "Public Schools District Supervisor (elementary Grades)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33500",
            "PositionName" => "Public Schools District Supervisor (secondary Grades)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33501",
            "PositionName" => "Public Schools District Supervisor (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33502",
            "PositionName" => "Public Services Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33503",
            "PositionName" => "Public Utility Vehicle Driver",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33504",
            "PositionName" => "Publication Circulation Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33507",
            "PositionName" => "Publication Circulation Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33505",
            "PositionName" => "Publication Circulation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33506",
            "PositionName" => "Publication Circulation Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33508",
            "PositionName" => "Publication Production Chief",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33509",
            "PositionName" => "Publication Production Supervisor",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33510",
            "PositionName" => "Quality Control/assurance Chief (non-padc)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33511",
            "PositionName" => "Quality Control/assurance Chief (padc)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33512",
            "PositionName" => "Quality Control/assurance Inspector (non-padc)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33513",
            "PositionName" => "Quality Control/assurance Officer (non-padco)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33514",
            "PositionName" => "Quality Control/assurance Officer (padc)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33515",
            "PositionName" => "Quarter Master",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33516",
            "PositionName" => "Quartermaster",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33517",
            "PositionName" => "Radio Photo Equipment Operator",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33520",
            "PositionName" => "Radio Therapeutic Nurse  III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33518",
            "PositionName" => "Radio Therapeutic Nurse I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33519",
            "PositionName" => "Radio Therapeutic Nurse II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33521",
            "PositionName" => "Radiologic  Technologist V",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33522",
            "PositionName" => "Railways Maintenance General Foreman",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33523",
            "PositionName" => "Railways Maintenance General Forman",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33524",
            "PositionName" => "Railways Operation Officer C",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33525",
            "PositionName" => "Railways Operation/maintenance Foreman A",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33526",
            "PositionName" => "Railways Operation/maintenance Foreman B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33527",
            "PositionName" => "Railways Operation/maintenance Leadman A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33528",
            "PositionName" => "Railways Operation/maintenance Leadman B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33529",
            "PositionName" => "Railways Operation/maintenance Towerman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33530",
            "PositionName" => "Railways Operation/maintenance Worker A",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33532",
            "PositionName" => "Railways Operations Inspector",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33531",
            "PositionName" => "Railways Operations Inspector",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33533",
            "PositionName" => "Railways Operations Officer A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33534",
            "PositionName" => "Railways Operations Officer B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33535",
            "PositionName" => "Railways Operations Officer C",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33536",
            "PositionName" => "Railways Operations/maintenance Foreman A",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33537",
            "PositionName" => "Railways Operations/maintenance Foreman B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33538",
            "PositionName" => "Railways Operations/maintenance Leadman A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33539",
            "PositionName" => "Railways Operations/maintenance Leadman B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33540",
            "PositionName" => "Railways Operations/maintenance Towerman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33541",
            "PositionName" => "Railways Operations/maintenance Work A",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33542",
            "PositionName" => "Railways Operations/maintenance Work B",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33543",
            "PositionName" => "Reconcilement  Assistant",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33544",
            "PositionName" => "Reconcilement Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33545",
            "PositionName" => "Reconcilement Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33546",
            "PositionName" => "Reconcilement Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33547",
            "PositionName" => "Records Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33548",
            "PositionName" => "Records Management Analyst I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33549",
            "PositionName" => "Records Management Analyst II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33550",
            "PositionName" => "Records Management Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33551",
            "PositionName" => "Records Officer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33552",
            "PositionName" => "Records Officer B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33553",
            "PositionName" => "Records Officer C",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33554",
            "PositionName" => "Records Officer D",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33555",
            "PositionName" => "Records Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33556",
            "PositionName" => "Records Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33557",
            "PositionName" => "Records Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33558",
            "PositionName" => "Records Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33561",
            "PositionName" => "Recreation And Welfare Service Officer  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33559",
            "PositionName" => "Recreation And Welfare Service Officer I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33560",
            "PositionName" => "Recreation And Welfare Service Officer II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33562",
            "PositionName" => "Recreation And Welfare Service Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33563",
            "PositionName" => "Recreation And Welfare Service Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33564",
            "PositionName" => "Recreation And Welfare Service Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33565",
            "PositionName" => "Recreation Facilities Attendant/aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33566",
            "PositionName" => "Recreational And Development Officer  B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33567",
            "PositionName" => "Recreational And Development Officer A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33568",
            "PositionName" => "Recreational And Sports Development Chief",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33569",
            "PositionName" => "Recreational And Welfare Service Assistant",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33570",
            "PositionName" => "Refinery/assay Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33571",
            "PositionName" => "Refinery/assay Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33574",
            "PositionName" => "Refinery/assay Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33572",
            "PositionName" => "Refinery/assay Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33573",
            "PositionName" => "Refinery/assay Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33575",
            "PositionName" => "Refinery/assay Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33576",
            "PositionName" => "Refinery/assay Officer V",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33577",
            "PositionName" => "Refinery/assay Officer VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33578",
            "PositionName" => "Regional Agrarian Reform Ajudicator",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33579",
            "PositionName" => "Regional Cabinet Secretary",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33580",
            "PositionName" => "Regional Chief Of Staff",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33581",
            "PositionName" => "Regional Director",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33582",
            "PositionName" => "Regional Equipment Engineer",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33583",
            "PositionName" => "Regional Executive Director",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33584",
            "PositionName" => "Regional Executive Secretary",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33585",
            "PositionName" => "Regional Governor",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33586",
            "PositionName" => "Regional Legislative Secretary",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33587",
            "PositionName" => "Regional Manager",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33588",
            "PositionName" => "Regional Manager (a)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33589",
            "PositionName" => "Regional Manager/administration I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33590",
            "PositionName" => "Regional Manager/administration II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33591",
            "PositionName" => "Regional Operations Manager",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33592",
            "PositionName" => "Regional Probation Officer",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33593",
            "PositionName" => "Regional Programs Coordinator",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33594",
            "PositionName" => "Regional Public Attorney",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33595",
            "PositionName" => "Regional State Prosecutor",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33596",
            "PositionName" => "Regional Technical Director",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33597",
            "PositionName" => "Regional Treasurer",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33598",
            "PositionName" => "Regional Trial Court Judge",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33599",
            "PositionName" => "Regional Vice Governor",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33602",
            "PositionName" => "Register Of Deeds  III",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33600",
            "PositionName" => "Register Of Deeds I",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33601",
            "PositionName" => "Register Of Deeds II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33603",
            "PositionName" => "Register Of Deeds IV",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33604",
            "PositionName" => "Registrar IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33605",
            "PositionName" => "Registrar V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33606",
            "PositionName" => "Religious Guidance Adviser",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33607",
            "PositionName" => "Religious Sister",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33608",
            "PositionName" => "Religious Worker",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33609",
            "PositionName" => "Remittance Analyst I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33610",
            "PositionName" => "Remittance Examiner I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33611",
            "PositionName" => "Remittance Examiner II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33612",
            "PositionName" => "Remittance Specialist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33613",
            "PositionName" => "Remittance Specialist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33614",
            "PositionName" => "Remote Sensing Technologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33615",
            "PositionName" => "Remote Sensing Technologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33616",
            "PositionName" => "Research Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33617",
            "PositionName" => "Research Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33618",
            "PositionName" => "Research Assistant I (b)",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33619",
            "PositionName" => "Research Assistant Ii (a)",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33620",
            "PositionName" => "Research Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33621",
            "PositionName" => "Research-analyst A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33622",
            "PositionName" => "Research-analyst B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33623",
            "PositionName" => "Resettlement And Development Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33624",
            "PositionName" => "Resettlement And Development Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33625",
            "PositionName" => "Resettlement And Development Chief",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33626",
            "PositionName" => "Resettlement And Development Officer A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33627",
            "PositionName" => "Resettlement And Development Officer B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33628",
            "PositionName" => "Resident Conductor",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33629",
            "PositionName" => "Resident Manager A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33630",
            "PositionName" => "Resident Manager B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33631",
            "PositionName" => "Resident Manager C",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33632",
            "PositionName" => "Respiratory Therapist",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33635",
            "PositionName" => "Respiratory Therapist  III",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33633",
            "PositionName" => "Respiratory Therapist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33634",
            "PositionName" => "Respiratory Therapist II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33638",
            "PositionName" => "Revenue Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33636",
            "PositionName" => "Revenue Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33637",
            "PositionName" => "Revenue Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33639",
            "PositionName" => "Revenue Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33640",
            "PositionName" => "Right-of-way Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33641",
            "PositionName" => "Right-of-way Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33642",
            "PositionName" => "Right-of-way Officer",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33643",
            "PositionName" => "Rolent Zone-inspector",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33644",
            "PositionName" => "Safety Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33645",
            "PositionName" => "Sales And Promotion Supervisor  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33646",
            "PositionName" => "Sales And Promotion Supervisor IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33647",
            "PositionName" => "Sales And Promotion Supervisor V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33650",
            "PositionName" => "Sales Representative  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33648",
            "PositionName" => "Sales Representative I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33649",
            "PositionName" => "Sales Representative II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33651",
            "PositionName" => "Sales Representative IV",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33652",
            "PositionName" => "Sangguniang Panlungsod Member I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33653",
            "PositionName" => "Scaler",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33654",
            "PositionName" => "Scholarship Affairs Officer I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33655",
            "PositionName" => "Scholarship Affairs Officer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33656",
            "PositionName" => "School Division  And Technical  Vocational Two Years Course",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33657",
            "PositionName" => "School Division Superintendent Elementary Grade",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33658",
            "PositionName" => "School Farm Demonstrator",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33659",
            "PositionName" => "School Farm Demonstrator I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33660",
            "PositionName" => "School Farm Demonstrator II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33661",
            "PositionName" => "School Farming Coordinator  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33664",
            "PositionName" => "School Librarian  III",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33662",
            "PositionName" => "School Librarian I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33663",
            "PositionName" => "School Librarian II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33665",
            "PositionName" => "Schools Division Superintendent Secondary Grade",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33666",
            "PositionName" => "Science  Research Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33667",
            "PositionName" => "Science  Research Assistant",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33669",
            "PositionName" => "Science Aide",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33668",
            "PositionName" => "Science Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33670",
            "PositionName" => "Science Education Associate I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33671",
            "PositionName" => "Science Education Associate II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33674",
            "PositionName" => "Science Education Specialist  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33672",
            "PositionName" => "Science Education Specialist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33673",
            "PositionName" => "Science Education Specialist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33675",
            "PositionName" => "Science Education Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33676",
            "PositionName" => "Science Education Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33677",
            "PositionName" => "Science Research Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33678",
            "PositionName" => "Science Research Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33681",
            "PositionName" => "Science Research Technician  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33679",
            "PositionName" => "Science Research Technician I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33680",
            "PositionName" => "Science Research Technician II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33682",
            "PositionName" => "Science Research Technician IV",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33685",
            "PositionName" => "Scientific Documentation Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33683",
            "PositionName" => "Scientific Documentation Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33684",
            "PositionName" => "Scientific Documentation Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33686",
            "PositionName" => "Scientific Documentation Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33687",
            "PositionName" => "Scientific Documentation Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33690",
            "PositionName" => "Scientist  III",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33688",
            "PositionName" => "Scientist I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33689",
            "PositionName" => "Scientist II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33691",
            "PositionName" => "Scientist IV",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33692",
            "PositionName" => "Scientist V",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33693",
            "PositionName" => "Scriptwriter I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33694",
            "PositionName" => "Scriptwriter II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33695",
            "PositionName" => "Sea Patrol Supervisor",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33696",
            "PositionName" => "Seaman",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33697",
            "PositionName" => "Second Mate",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33700",
            "PositionName" => "Secondary School Principal  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33698",
            "PositionName" => "Secondary School Principal I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33699",
            "PositionName" => "Secondary School Principal II",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33701",
            "PositionName" => "Secondary School Principal IV",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33706",
            "PositionName" => "Secretary  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33702",
            "PositionName" => "Secretary  Of The Commission On Appointments",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33703",
            "PositionName" => "Secretary General",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33704",
            "PositionName" => "Secretary I (a)",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33705",
            "PositionName" => "Secretary I (b)",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33707",
            "PositionName" => "Secretary Of The  Senate  Electronal  Tribunal",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33708",
            "PositionName" => "Secretary Of The House Electroral  Tribunal",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33709",
            "PositionName" => "Secretary Of The Regional  Commission On Appointments",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33710",
            "PositionName" => "Secretary Of The Senate",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33711",
            "PositionName" => "Secretary To The Sangguniang Bayan I  @ (mandatory)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33712",
            "PositionName" => "Secretary To The Sangguniang Bayan Ii (mmcm) @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33713",
            "PositionName" => "Secretary To The Sangguniang Panlalawigan    @ (mandatory)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33714",
            "PositionName" => "Secretary To The Sangguniang Panlungsod I     @ (mandatory)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33715",
            "PositionName" => "Secretary,monetary Board",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33716",
            "PositionName" => "Secretary,social Security Commission",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33717",
            "PositionName" => "Secretary-general Of The House Of Representatives",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33718",
            "PositionName" => "Sector Manager",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33719",
            "PositionName" => "Securities And Exchange  Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33720",
            "PositionName" => "Securities And Exchange  Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33721",
            "PositionName" => "Securities And Exchange Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33722",
            "PositionName" => "Securities Custodian I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33723",
            "PositionName" => "Securities Custodian II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33724",
            "PositionName" => "Securities Materials Control Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33725",
            "PositionName" => "Securities Materials Control Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33728",
            "PositionName" => "Securities Production Specialist  III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33726",
            "PositionName" => "Securities Production Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33727",
            "PositionName" => "Securities Production Specialist II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33729",
            "PositionName" => "Securities Production Specialist IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33730",
            "PositionName" => "Securities Production Specialist V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33731",
            "PositionName" => "Securities Servicing Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33732",
            "PositionName" => "Securities Servicing Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33733",
            "PositionName" => "Securities Servicing Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33734",
            "PositionName" => "Securities Servicing Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33735",
            "PositionName" => "Securities Servicing Specialists",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33738",
            "PositionName" => "Security Materials Control Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33736",
            "PositionName" => "Security Materials Control Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33737",
            "PositionName" => "Security Materials Control Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33739",
            "PositionName" => "Security Officer I (bsp)",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33740",
            "PositionName" => "Security Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33741",
            "PositionName" => "Security Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33742",
            "PositionName" => "Senator #",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33743",
            "PositionName" => "Senior  Export Credit  Insurance  Underwriting Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33744",
            "PositionName" => "Senior  Financial  Planning  Analyst",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33745",
            "PositionName" => "Senior  Financial  Planning  Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33746",
            "PositionName" => "Senior  Financial/accounts Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33747",
            "PositionName" => "Senior  Mortgage Loan Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33748",
            "PositionName" => "Senior  Mortgage Loan Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33749",
            "PositionName" => "Senior Accounting Management Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33750",
            "PositionName" => "Senior Accounting Processor A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33751",
            "PositionName" => "Senior Accounting Processor B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33752",
            "PositionName" => "Senior Accounting Specialists",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33753",
            "PositionName" => "Senior Administrative Assistant I",
            "SalaryGrade"  => "13",
            "ShortName"    => "SR. ADMA I"
            ],
            [
            "PosCode"      => "33754",
            "PositionName" => "Senior Administrative Assistant II",
            "SalaryGrade"  => "14",
            "ShortName"    => "SR. ADMA II"
            ],
            [
            "PosCode"      => "33755",
            "PositionName" => "Senior Administrative Assistant  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33756",
            "PositionName" => "Senior Agrarian Affairs Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33757",
            "PositionName" => "Senior Agrarian Reform Program Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33758",
            "PositionName" => "Senior Agrarian Reform Program Technologist",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33759",
            "PositionName" => "Senior Agronomist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33760",
            "PositionName" => "Senior Air Navigation System Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33761",
            "PositionName" => "Senior Air Traffic Controller",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33762",
            "PositionName" => "Senior Aircraft Mechanic",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33763",
            "PositionName" => "Senior Airways Communicator",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33764",
            "PositionName" => "Senior Architect",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33765",
            "PositionName" => "Senior Archivist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33766",
            "PositionName" => "Senior Artist-illustration",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33767",
            "PositionName" => "Senior Assistant General Manager",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33768",
            "PositionName" => "Senior Audio-visual System Technician",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33769",
            "PositionName" => "Senior Auditing  System Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33770",
            "PositionName" => "Senior Automotive Electrician",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33771",
            "PositionName" => "Senior Automotive Mechanic",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33772",
            "PositionName" => "Senior Automotive/train Mechanic",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33773",
            "PositionName" => "Senior Aviation Safety Regulation Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33774",
            "PositionName" => "Senior Bank Examines/senior Examiner",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33775",
            "PositionName" => "Senior Blacksmith",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33776",
            "PositionName" => "Senior Blueprint Machine Operator",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33777",
            "PositionName" => "Senior Budget Specialist",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33778",
            "PositionName" => "Senior Building Electrician A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33779",
            "PositionName" => "Senior Building Electrician B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33780",
            "PositionName" => "Senior Cable Operations Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33781",
            "PositionName" => "Senior Carpenter",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33782",
            "PositionName" => "Senior Cartographer A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33783",
            "PositionName" => "Senior Cartographer B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33784",
            "PositionName" => "Senior Cashier",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33785",
            "PositionName" => "Senior Chemist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33786",
            "PositionName" => "Senior Collection Officer",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33787",
            "PositionName" => "Senior Collection Representative",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33788",
            "PositionName" => "Senior Community Relations Officer",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33789",
            "PositionName" => "Senior Compensation And Classification Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33790",
            "PositionName" => "Senior Computer Operator",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33793",
            "PositionName" => "Senior Computer Operator  III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33791",
            "PositionName" => "Senior Computer Operator I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33792",
            "PositionName" => "Senior Computer Operator II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33794",
            "PositionName" => "Senior Computer Services Programmer",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33795",
            "PositionName" => "Senior Control Operator A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33796",
            "PositionName" => "Senior Control Operator B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33797",
            "PositionName" => "Senior Corporate Accountant A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33798",
            "PositionName" => "Senior Corporate Accountant B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33799",
            "PositionName" => "Senior Corporate Accountant C",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33800",
            "PositionName" => "Senior Corporate Accounts Analyst",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33801",
            "PositionName" => "Senior Corporate Attorney",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33802",
            "PositionName" => "Senior Corporate Budget Analyst",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33803",
            "PositionName" => "Senior Corporate Budget Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33804",
            "PositionName" => "Senior Corporate Planning Analyst",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33805",
            "PositionName" => "Senior Corporate Planning Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33806",
            "PositionName" => "Senior Credit Invistigator",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33807",
            "PositionName" => "Senior Credit/collection Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33809",
            "PositionName" => "Senior Credit/collector Officer",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33808",
            "PositionName" => "Senior Credit/collector Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33810",
            "PositionName" => "Senior Culture And Arts Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33811",
            "PositionName" => "Senior Currency Operations Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33812",
            "PositionName" => "Senior Currency Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33813",
            "PositionName" => "Senior Currency/securities Operations Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33814",
            "PositionName" => "Senior Data Encoder",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33815",
            "PositionName" => "Senior Data Encoder Controller",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33816",
            "PositionName" => "Senior Debt Service Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33817",
            "PositionName" => "Senior Defense Research Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33818",
            "PositionName" => "Senior Deputy Administrator",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33819",
            "PositionName" => "Senior Deputy Governor",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33820",
            "PositionName" => "Senior Development Management Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33821",
            "PositionName" => "Senior Document Binder",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33822",
            "PositionName" => "Senior Document/securities Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33823",
            "PositionName" => "Senior Draftsman",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33824",
            "PositionName" => "Senior Economic Development Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33825",
            "PositionName" => "Senior Economist A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33826",
            "PositionName" => "Senior Economist B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33827",
            "PositionName" => "Senior Ecosystems Management Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33828",
            "PositionName" => "Senior Education Programs Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33829",
            "PositionName" => "Senior Electric Cooperative Development Officer A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33830",
            "PositionName" => "Senior Electric Cooperative Development Officer B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33831",
            "PositionName" => "Senior Electronics Communications Systems Technician",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33832",
            "PositionName" => "Senior Emigrant Services Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33833",
            "PositionName" => "Senior Energy Regulation Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33834",
            "PositionName" => "Senior Engineer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33835",
            "PositionName" => "Senior Engineer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33836",
            "PositionName" => "Senior Environmental Analyst",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33837",
            "PositionName" => "Senior Executive Assistant",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33838",
            "PositionName" => "Senior Export Credit Guarantee Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33839",
            "PositionName" => "Senior External  Development Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33840",
            "PositionName" => "Senior Fiber Development  Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33841",
            "PositionName" => "Senior Fidelity  Bond Examiner",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33842",
            "PositionName" => "Senior Field Operations",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33845",
            "PositionName" => "Senior Fire Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33843",
            "PositionName" => "Senior Fire Officer I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33844",
            "PositionName" => "Senior Fire Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33846",
            "PositionName" => "Senior Fire Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33847",
            "PositionName" => "Senior Firefighter",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33848",
            "PositionName" => "Senior Fiscal Examiner",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33849",
            "PositionName" => "Senior Fishing Regulations Officers",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33850",
            "PositionName" => "Senior Foreign Affairs Adviser",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33851",
            "PositionName" => "Senior Foreign Affairs Research Specialists",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33852",
            "PositionName" => "Senior Foreign Exchange Examiner",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33853",
            "PositionName" => "Senior Foreign Exchange Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33854",
            "PositionName" => "Senior Forest Management Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33855",
            "PositionName" => "Senior Foundryman",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33856",
            "PositionName" => "Senior General Insurance Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33857",
            "PositionName" => "Senior General Insurance Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33858",
            "PositionName" => "Senior Geologist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33859",
            "PositionName" => "Senior Geologist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33860",
            "PositionName" => "Senior Geophysicist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33861",
            "PositionName" => "Senior Health Program Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33862",
            "PositionName" => "Senior Historic Sites Development Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33863",
            "PositionName" => "Senior History Researcher",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33864",
            "PositionName" => "Senior Home Management Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33865",
            "PositionName" => "Senior Hydro-geologist",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33866",
            "PositionName" => "Senior Hydrologist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33867",
            "PositionName" => "Senior Immigration Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33868",
            "PositionName" => "Senior Industrial Design Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33869",
            "PositionName" => "Senior Industrial Nurse",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33870",
            "PositionName" => "Senior Industrial Relations Development Officer A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33871",
            "PositionName" => "Senior Industrial Relations Development Officer B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33872",
            "PositionName" => "Senior Industrial Relations Management Officer A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33873",
            "PositionName" => "Senior Industrial Relations Management Officer B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33874",
            "PositionName" => "Senior Industrial Security Guard",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33875",
            "PositionName" => "Senior Industrial Security Inspector",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33876",
            "PositionName" => "Senior Information Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33877",
            "PositionName" => "Senior Inspector (fire)",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33878",
            "PositionName" => "Senior Inspector (jail)",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33879",
            "PositionName" => "Senior Instrument Technician",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33880",
            "PositionName" => "Senior Insurance Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33881",
            "PositionName" => "Senior Insurance/risk Analyst",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33882",
            "PositionName" => "Senior Internal Control Officer A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33883",
            "PositionName" => "Senior Internal Control Officer B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33884",
            "PositionName" => "Senior Investment Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33885",
            "PositionName" => "Senior Irrigators Officer",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33888",
            "PositionName" => "Senior Jail Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33886",
            "PositionName" => "Senior Jail Officer I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33887",
            "PositionName" => "Senior Jail Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33889",
            "PositionName" => "Senior Jail Officer IV",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33890",
            "PositionName" => "Senior Labor And Employment Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33891",
            "PositionName" => "Senior Laboratory Technician",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33892",
            "PositionName" => "Senior Language Researcher",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33893",
            "PositionName" => "Senior Letter Carrier",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33894",
            "PositionName" => "Senior Liaison Officer",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33895",
            "PositionName" => "Senior Librarian",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33896",
            "PositionName" => "Senior Lifeguard",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33897",
            "PositionName" => "Senior Livelihood Officer",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33898",
            "PositionName" => "Senior Loans Analyst A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33899",
            "PositionName" => "Senior Loans Analyst B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33900",
            "PositionName" => "Senior Loans And Credit Evaluator",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33901",
            "PositionName" => "Senior Loans And Credit Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33902",
            "PositionName" => "Senior Loans Management Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33903",
            "PositionName" => "Senior Local Treasury Examiner",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33904",
            "PositionName" => "Senior Machinist",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33905",
            "PositionName" => "Senior Mail Sorter",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33906",
            "PositionName" => "Senior Management  Information  System Analyst I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33907",
            "PositionName" => "Senior Management  Information  System Reseacher",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33908",
            "PositionName" => "Senior Management  Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33909",
            "PositionName" => "Senior Management System Analyst",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33910",
            "PositionName" => "Senior Management Systems Development Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33911",
            "PositionName" => "Senior Manpower Development Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33912",
            "PositionName" => "Senior Maritime  Industry Development Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33913",
            "PositionName" => "Senior Metal Worker",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33914",
            "PositionName" => "Senior Metallurgist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33915",
            "PositionName" => "Senior Money Counter",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33916",
            "PositionName" => "Senior Money Market Trader",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33917",
            "PositionName" => "Senior Money Position Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33918",
            "PositionName" => "Senior Mortgage Accounts Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33919",
            "PositionName" => "Senior Mortgage Documents Review Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33920",
            "PositionName" => "Senior Museum Researcher",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33921",
            "PositionName" => "Senior News Editor",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33922",
            "PositionName" => "Senior Office Equipment  Technician  B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33923",
            "PositionName" => "Senior Office Equipment  Technician A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33924",
            "PositionName" => "Senior Officer Machine Operator",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33925",
            "PositionName" => "Senior Painter",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33926",
            "PositionName" => "Senior Parole Officer",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33927",
            "PositionName" => "Senior Patent  Principal Examiner",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33928",
            "PositionName" => "Senior Patent Trademark Executive Examiner",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33929",
            "PositionName" => "Senior Penal Institution Program Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33930",
            "PositionName" => "Senior Personnel Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33931",
            "PositionName" => "Senior Photographer",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33932",
            "PositionName" => "Senior Planning Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33933",
            "PositionName" => "Senior Plant Electrician",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33934",
            "PositionName" => "Senior Plant Mechanic",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33935",
            "PositionName" => "Senior Police Officer I (pnp)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33936",
            "PositionName" => "Senior Police Officer Ii (pnp)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33937",
            "PositionName" => "Senior Police Officer Iii (pnp)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33938",
            "PositionName" => "Senior Police Officer Iv (pnp)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33939",
            "PositionName" => "Senior Postal Service Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33940",
            "PositionName" => "Senior Probation Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33941",
            "PositionName" => "Senior Professional Regulations Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33942",
            "PositionName" => "Senior Project Planning And Development Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33943",
            "PositionName" => "Senior Property/supply Officer",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33944",
            "PositionName" => "Senior Public Relations Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33945",
            "PositionName" => "Senior Public Utilities Regulation Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33946",
            "PositionName" => "Senior Quality Control/assurance Inspectors (non-padc)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33947",
            "PositionName" => "Senior Quality Control/assurance Inspectors (padc)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33948",
            "PositionName" => "Senior Reconcilement Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33949",
            "PositionName" => "Senior Records Management Analyst",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33950",
            "PositionName" => "Senior Recreation And Sports Development Officer",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33951",
            "PositionName" => "Senior Remote Sensing Technologist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33952",
            "PositionName" => "Senior Reproduction Machine Operator",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33953",
            "PositionName" => "Senior Research Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33954",
            "PositionName" => "Senior Researcher Analyst A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33955",
            "PositionName" => "Senior Researcher Analyst B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33956",
            "PositionName" => "Senior Resettlement And Development Officer A",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33957",
            "PositionName" => "Senior Resettlement And Development Officer B",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33958",
            "PositionName" => "Senior Right-of-way Officer",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33959",
            "PositionName" => "Senior Safety Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33960",
            "PositionName" => "Senior Scholarship Affairs Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33961",
            "PositionName" => "Senior Science Research Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33962",
            "PositionName" => "Senior Securities And Exchange Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33963",
            "PositionName" => "Senior Securities Custodian",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33964",
            "PositionName" => "Senior Securities Servicing Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33965",
            "PositionName" => "Senior Security Materials Control Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33966",
            "PositionName" => "Senior Shipbuilding Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33967",
            "PositionName" => "Senior Shipping Operations Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33968",
            "PositionName" => "Senior Shrine Curator",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33969",
            "PositionName" => "Senior Social Insurance Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33970",
            "PositionName" => "Senior Social Insurance Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33971",
            "PositionName" => "Senior Sports And Games Regulation Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33972",
            "PositionName" => "Senior Statistic",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33973",
            "PositionName" => "Senior Stenographer To The President",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33974",
            "PositionName" => "Senior Stenographer To The Regional Governor",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33975",
            "PositionName" => "Senior Stock Transfer Administrator",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33976",
            "PositionName" => "Senior Superintendent (fire)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33977",
            "PositionName" => "Senior Superintendent (jail)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33978",
            "PositionName" => "Senior Superintendent (pnp)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33979",
            "PositionName" => "Senior Tariff Analyst",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33980",
            "PositionName" => "Senior Tariff Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33981",
            "PositionName" => "Senior Tax Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33982",
            "PositionName" => "Senior Telegraphic Transfer Service Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33983",
            "PositionName" => "Senior Terminal Operations Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33984",
            "PositionName" => "Senior Trade Industry Development Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33985",
            "PositionName" => "Senior Trade Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33986",
            "PositionName" => "Senior Trademark Principal Examiner",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33987",
            "PositionName" => "Senior Trader",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33988",
            "PositionName" => "Senior Trading Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33989",
            "PositionName" => "Senior Train Conductor",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33990",
            "PositionName" => "Senior Train Mechanic",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33991",
            "PositionName" => "Senior Transmission Lineman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33992",
            "PositionName" => "Senior Transport Conductor/conductress",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33993",
            "PositionName" => "Senior Transport Electrician",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33994",
            "PositionName" => "Senior Transportation Development Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33995",
            "PositionName" => "Senior Travel Tax Officer A",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33996",
            "PositionName" => "Senior Travel Tax Officer B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33997",
            "PositionName" => "Senior Treasury Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33998",
            "PositionName" => "Senior Upholsterer",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "33999",
            "PositionName" => "Senior Utilities/customer Services Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34000",
            "PositionName" => "Senior Veterans Assistance Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34001",
            "PositionName" => "Senior Vice President",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34002",
            "PositionName" => "Senior Vice President",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34003",
            "PositionName" => "Senior Vice President",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34004",
            "PositionName" => "Senior Vice President (i)",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34005",
            "PositionName" => "Senior Volunter Service Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34006",
            "PositionName" => "Senior Warehouse/shipping Officer",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34007",
            "PositionName" => "Senior Water Resource Development Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34008",
            "PositionName" => "Senior Water Resources Facilities  Technician",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34009",
            "PositionName" => "Senior Water Resources Facilities Operator A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34010",
            "PositionName" => "Senior Water Resources Facilities Operator B",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34011",
            "PositionName" => "Senior Water Utilities Management/development Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34012",
            "PositionName" => "Senior Water/severage Maintainance Man A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34013",
            "PositionName" => "Senior Water/severage Maintainance Man B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34014",
            "PositionName" => "Senior Weather Specialist",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34015",
            "PositionName" => "Senior Welder",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34018",
            "PositionName" => "Sergeant-at-arms  III",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34016",
            "PositionName" => "Sergeant-at-arms I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34017",
            "PositionName" => "Sergeant-at-arms II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34019",
            "PositionName" => "Sergeant-at-arms IV",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34020",
            "PositionName" => "Service Chief",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34021",
            "PositionName" => "Service Chief",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34022",
            "PositionName" => "Service Manager",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34023",
            "PositionName" => "Shari'a Circuit Court Judge",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34026",
            "PositionName" => "Sheriff  III",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34024",
            "PositionName" => "Sheriff I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34025",
            "PositionName" => "Sheriff II",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34027",
            "PositionName" => "Sheriff IV",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34028",
            "PositionName" => "Ship Master",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34029",
            "PositionName" => "Shipbuilding Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34030",
            "PositionName" => "Shipbuilding Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34031",
            "PositionName" => "Shipping Aide",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34032",
            "PositionName" => "Shipping Operations Inspector",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34033",
            "PositionName" => "Shipping Operations Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34034",
            "PositionName" => "Shipping Operations Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34035",
            "PositionName" => "Shoemaker",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34036",
            "PositionName" => "Shrine Curator I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34037",
            "PositionName" => "Shrine Curator II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34038",
            "PositionName" => "Shrine Guide",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34039",
            "PositionName" => "Signalman",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34040",
            "PositionName" => "Signature Verifier",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34041",
            "PositionName" => "Slaughterhouse Superintendent",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34042",
            "PositionName" => "Social Insurance Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34043",
            "PositionName" => "Social Insurance Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34044",
            "PositionName" => "Social Insurance Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34045",
            "PositionName" => "Social Insurance Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34048",
            "PositionName" => "Social Insurance Officer  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34046",
            "PositionName" => "Social Insurance Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34047",
            "PositionName" => "Social Insurance Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34049",
            "PositionName" => "Social Insurance Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34050",
            "PositionName" => "Social Security Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34051",
            "PositionName" => "Social Security Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34052",
            "PositionName" => "Social Security Deputy Clerk Of Court I",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34053",
            "PositionName" => "Social Security Deputy Clerk Of Court II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34054",
            "PositionName" => "Social Security Deputy Sheriff",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34055",
            "PositionName" => "Social Security Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34056",
            "PositionName" => "Social Security Examiner II",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34059",
            "PositionName" => "Social Security Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34057",
            "PositionName" => "Social Security Officer I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34058",
            "PositionName" => "Social Security Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34060",
            "PositionName" => "Social Security Officer IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34061",
            "PositionName" => "Social Security Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34062",
            "PositionName" => "Social Work Consultant (doj)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34063",
            "PositionName" => "Sociologist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34064",
            "PositionName" => "Soil Technologist A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34065",
            "PositionName" => "Soil Technologist B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34066",
            "PositionName" => "Soil Technologist C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34070",
            "PositionName" => "Solicitor  III",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34067",
            "PositionName" => "Solicitor General",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34068",
            "PositionName" => "Solicitor I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34069",
            "PositionName" => "Solicitor II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34071",
            "PositionName" => "Speaker Of The House Of Representatives",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34072",
            "PositionName" => "Speaker Regional Assembly",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34073",
            "PositionName" => "Special  Education  Tearcher I (elementary  Grades)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34074",
            "PositionName" => "Special  Police Area Supervisor",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34075",
            "PositionName" => "Special  Science Teacher  Iii  (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34076",
            "PositionName" => "Special  Science Teacher  Iii (elem Grades)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34077",
            "PositionName" => "Special  Science Teacher  Iii (secondary Grades)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34078",
            "PositionName" => "Special  Science Teacher  V (elem Grades)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34079",
            "PositionName" => "Special  Science Teacher  V (secondary Grades)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34080",
            "PositionName" => "Special  Science Teacher  V (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34081",
            "PositionName" => "Special  Science Teacher I (elem Grades)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34082",
            "PositionName" => "Special  Science Teacher I (secondary Grades)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34083",
            "PositionName" => "Special  Science Teacher I (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34084",
            "PositionName" => "Special  Science Teacher Ii (elem Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34085",
            "PositionName" => "Special  Science Teacher Ii (secondary Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34086",
            "PositionName" => "Special  Science Teacher Ii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34087",
            "PositionName" => "Special Agent I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34088",
            "PositionName" => "Special Agent II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34091",
            "PositionName" => "Special Assistant To Corporate Head  III",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34089",
            "PositionName" => "Special Assistant To Corporate Head I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34090",
            "PositionName" => "Special Assistant To Corporate Head II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34092",
            "PositionName" => "Special Assistant To The Governor",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34093",
            "PositionName" => "Special Education  Teacher I (pre- School)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34094",
            "PositionName" => "Special Education  Teacher I (secondary Grades)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34095",
            "PositionName" => "Special Education  Teacher I (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34096",
            "PositionName" => "Special Education  Teacher Ii (elementary Grades)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34097",
            "PositionName" => "Special Education  Teacher Ii (pre- School)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34098",
            "PositionName" => "Special Education  Teacher Ii (secondary Grades)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34099",
            "PositionName" => "Special Education  Teacher Ii (vocational  And Two Years Technical Course)",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34100",
            "PositionName" => "Special Education  Teacher Iii (elem Grades)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34101",
            "PositionName" => "Special Education  Teacher Iii (pre-school)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34102",
            "PositionName" => "Special Education  Teacher Iii (secondary Grades)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34103",
            "PositionName" => "Special Education  Teacher Iii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34104",
            "PositionName" => "Special Education  Teacher Iv (elem Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34105",
            "PositionName" => "Special Education  Teacher Iv (pre-school)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34106",
            "PositionName" => "Special Education  Teacher Iv (secondary Grades)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34107",
            "PositionName" => "Special Education  Teacher Iv (vocational And Two Years  Technical Course)",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34108",
            "PositionName" => "Special Education Teacher V (elem Grades)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34109",
            "PositionName" => "Special Education Teacher V (pre - School)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34110",
            "PositionName" => "Special Education Teacher V (secondary Grades)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34111",
            "PositionName" => "Special Education Teacher V (vocational And Two Years  Technical Course)",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34115",
            "PositionName" => "Special Investigator  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34112",
            "PositionName" => "Special Investigator I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34113",
            "PositionName" => "Special Investigator I (bsp)",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34114",
            "PositionName" => "Special Investigator II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34116",
            "PositionName" => "Special Investigator IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34117",
            "PositionName" => "Special Investigator IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34118",
            "PositionName" => "Special Investigator V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34119",
            "PositionName" => "Special Investigator V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34122",
            "PositionName" => "Special Operations Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34120",
            "PositionName" => "Special Operations Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34121",
            "PositionName" => "Special Operations Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34123",
            "PositionName" => "Special Operations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34124",
            "PositionName" => "Special Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34125",
            "PositionName" => "Special Police  Lieutenant",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34126",
            "PositionName" => "Special Police  Major",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34127",
            "PositionName" => "Special Police Assistant  Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34128",
            "PositionName" => "Special Police Captain",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34129",
            "PositionName" => "Special Police Chief",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34130",
            "PositionName" => "Special Police Corporal",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34131",
            "PositionName" => "Special Police Sergeant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34132",
            "PositionName" => "Special Policeman",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34133",
            "PositionName" => "Special Presidential Representative",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34134",
            "PositionName" => "Special Prosecution",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34137",
            "PositionName" => "Special Prosecution Officer  III",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34135",
            "PositionName" => "Special Prosecution Officer I",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34136",
            "PositionName" => "Special Prosecution Officer II",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34138",
            "PositionName" => "Special School  Principal I (elementary  Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34139",
            "PositionName" => "Special School  Principal I (secondary Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34140",
            "PositionName" => "Special School  Principal I (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34141",
            "PositionName" => "Special School Principal Ii  (vocational And Two Years Technnical  Course)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34142",
            "PositionName" => "Special School Principal Ii ( Elementary Grade)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34143",
            "PositionName" => "Special School Principal Ii ( Secondary Grade)",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34144",
            "PositionName" => "Special Science  Teacher  Iv (secondary Grades)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34145",
            "PositionName" => "Special Science Teacher  V (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34146",
            "PositionName" => "Special Science Teacher Iv (elem Grades)",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34147",
            "PositionName" => "Special Trade Reperesentative (fo540)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34148",
            "PositionName" => "Speech Laboratory Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34149",
            "PositionName" => "Speech Therapist I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34150",
            "PositionName" => "Speech Therapist II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34151",
            "PositionName" => "Speech Transcribe",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34152",
            "PositionName" => "Speechwriter",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34155",
            "PositionName" => "Sports  Development Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34153",
            "PositionName" => "Sports  Development Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34154",
            "PositionName" => "Sports  Development Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34156",
            "PositionName" => "Sports  Development Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34157",
            "PositionName" => "Sports  Development Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34158",
            "PositionName" => "Sports And Games  Regulation  Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34159",
            "PositionName" => "Sports And Games  Regulation  Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34160",
            "PositionName" => "Sports And Games Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34161",
            "PositionName" => "Sports And Games Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34162",
            "PositionName" => "Sports Complex  Administrator",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34163",
            "PositionName" => "Staff  Writer",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34164",
            "PositionName" => "Staff Director",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34165",
            "PositionName" => "Staff Director",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34166",
            "PositionName" => "State Auditing  Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34167",
            "PositionName" => "State Auditing Examiner II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34170",
            "PositionName" => "State Auditor  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34168",
            "PositionName" => "State Auditor I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34169",
            "PositionName" => "State Auditor II",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34171",
            "PositionName" => "State Auditor IV",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34172",
            "PositionName" => "State Auditor V",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34175",
            "PositionName" => "State Corporate Attorney  III",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34173",
            "PositionName" => "State Corporate Attorney I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34174",
            "PositionName" => "State Corporate Attorney II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34176",
            "PositionName" => "State Corporate Attorney IV",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34179",
            "PositionName" => "State Councel   III",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34178",
            "PositionName" => "State Councel  II",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34177",
            "PositionName" => "State Councel I",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34180",
            "PositionName" => "State Councel IV",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34181",
            "PositionName" => "State Councel V",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34182",
            "PositionName" => "Statistical  Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34183",
            "PositionName" => "Statistical  Assistant B",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34186",
            "PositionName" => "Statistical  Coordination Officer  III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34184",
            "PositionName" => "Statistical  Coordination Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34185",
            "PositionName" => "Statistical  Coordination Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34187",
            "PositionName" => "Statistical  Coordination Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34188",
            "PositionName" => "Statistical  Coordination Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34189",
            "PositionName" => "Statistical  Coordination Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34190",
            "PositionName" => "Statistical A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34192",
            "PositionName" => "Statistical Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34191",
            "PositionName" => "Statistical Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34196",
            "PositionName" => "Statistician  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34193",
            "PositionName" => "Statistician B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34194",
            "PositionName" => "Statistician I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34195",
            "PositionName" => "Statistician II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34197",
            "PositionName" => "Statistician IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34198",
            "PositionName" => "Statistician IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34199",
            "PositionName" => "Statistician V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34200",
            "PositionName" => "Statistician V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34201",
            "PositionName" => "Stenographer I (c)",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34202",
            "PositionName" => "Stenographer Ii (b)",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34203",
            "PositionName" => "Stenographer Iii (a)",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34204",
            "PositionName" => "Stenographer To The President",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34205",
            "PositionName" => "Stenographic Reporter I",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34206",
            "PositionName" => "Stenographic Reporter II",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34207",
            "PositionName" => "Stevedor",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34208",
            "PositionName" => "Stevedore Leadman",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34209",
            "PositionName" => "Steward",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34212",
            "PositionName" => "Stitcher  III",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34210",
            "PositionName" => "Stitcher I",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34211",
            "PositionName" => "Stitcher II",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34213",
            "PositionName" => "Stock Transfer Administration",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34214",
            "PositionName" => "Stock Transfer Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34215",
            "PositionName" => "Stock Transfer Assistant II",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34216",
            "PositionName" => "Storekeeper I (d)",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34217",
            "PositionName" => "Storekeeper Ii (c)",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34218",
            "PositionName" => "Storekeeper Iii (b)",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34221",
            "PositionName" => "Student Records Evaluator  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34219",
            "PositionName" => "Student Records Evaluator I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34220",
            "PositionName" => "Student Records Evaluator II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34222",
            "PositionName" => "Student Records Evaluator IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34223",
            "PositionName" => "Suc Executive Vice-president",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34226",
            "PositionName" => "Suc President  III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34224",
            "PositionName" => "Suc President I",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34225",
            "PositionName" => "Suc President II",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34227",
            "PositionName" => "Suc President IV",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34230",
            "PositionName" => "Suc Vice-president  III",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34228",
            "PositionName" => "Suc Vice-president I",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34229",
            "PositionName" => "Suc Vice-president II",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34231",
            "PositionName" => "Suc Vice-president IV",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34232",
            "PositionName" => "Superintendent (fire)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34233",
            "PositionName" => "Superintendent (jail)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34234",
            "PositionName" => "Superintendent (pnp)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34235",
            "PositionName" => "Superintendent Of Printing",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34236",
            "PositionName" => "Supervising Accounting Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34237",
            "PositionName" => "Supervising Accounts Management Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34238",
            "PositionName" => "Supervising Administrative Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "SUPVG. ADM. OFFCR"
            ],
            [
            "PosCode"      => "34239",
            "PositionName" => "Supervising Agrarian Affairs Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34240",
            "PositionName" => "Supervising Agrarian Reform Program Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34242",
            "PositionName" => "Supervising Agriculturist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34241",
            "PositionName" => "Supervising Agriculturist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34243",
            "PositionName" => "Supervising Air Navigation System Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34244",
            "PositionName" => "Supervising Air Traffic Controller",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34245",
            "PositionName" => "Supervising Airways Communicator",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34246",
            "PositionName" => "Supervising Aquaculturist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34247",
            "PositionName" => "Supervising Architect",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34248",
            "PositionName" => "Supervising Archivist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34249",
            "PositionName" => "Supervising Artist-illustrator",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34250",
            "PositionName" => "Supervising Audio-visual Systems Technician",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34251",
            "PositionName" => "Supervising Auditing Systems Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34252",
            "PositionName" => "Supervising Auto Train Mechanic",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34253",
            "PositionName" => "Supervising Automotive Mechanic",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34254",
            "PositionName" => "Supervising Automotive Shop Mechanic",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34255",
            "PositionName" => "Supervising Avaition Safety Regulation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34256",
            "PositionName" => "Supervising Bank Examiner/supervising Examiner",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34257",
            "PositionName" => "Supervising Bank Teller",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34258",
            "PositionName" => "Supervising Blacksmith",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34259",
            "PositionName" => "Supervising Blueprint Machine Operator",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34260",
            "PositionName" => "Supervising Bookbinder",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34261",
            "PositionName" => "Supervising Budget Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34262",
            "PositionName" => "Supervising Budget Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34263",
            "PositionName" => "Supervising Carpenters",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34264",
            "PositionName" => "Supervising Cashier",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34265",
            "PositionName" => "Supervising Chemist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34266",
            "PositionName" => "Supervising Clearing Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34267",
            "PositionName" => "Supervising Collection Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34268",
            "PositionName" => "Supervising Communication Development Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34269",
            "PositionName" => "Supervising Compensation And Classification Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34270",
            "PositionName" => "Supervising Computer Operator",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34271",
            "PositionName" => "Supervising Computer Operator I",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34272",
            "PositionName" => "Supervising Computer Operator II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34273",
            "PositionName" => "Supervising Credit Investigator",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34274",
            "PositionName" => "Supervising Credit Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34275",
            "PositionName" => "Supervising Credit/collection Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34276",
            "PositionName" => "Supervising Culture And Arts Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34277",
            "PositionName" => "Supervising Currency Operations Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34278",
            "PositionName" => "Supervising Currency Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34279",
            "PositionName" => "Supervising Currency/securities Operations Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34280",
            "PositionName" => "Supervising Customs Operations Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34281",
            "PositionName" => "Supervising Data Analyst-controller",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34282",
            "PositionName" => "Supervising Data Controller",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34283",
            "PositionName" => "Supervising Data Encoder-controller",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34284",
            "PositionName" => "Supervising Debt Service Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34285",
            "PositionName" => "Supervising Defense Research Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34286",
            "PositionName" => "Supervising Development Management Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34287",
            "PositionName" => "Supervising Document Binder",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34288",
            "PositionName" => "Supervising Document/securities Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34289",
            "PositionName" => "Supervising Draftsman",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34290",
            "PositionName" => "Supervising Economic Development Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34291",
            "PositionName" => "Supervising Economic Development Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34292",
            "PositionName" => "Supervising Economist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34293",
            "PositionName" => "Supervising Ecosystems Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34294",
            "PositionName" => "Supervising Education Program Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34295",
            "PositionName" => "Supervising Electric Cooperative Development Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34296",
            "PositionName" => "Supervising Electronics Communication System Operator",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34297",
            "PositionName" => "Supervising Electronics Communication System Tecnician",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34298",
            "PositionName" => "Supervising Electrotyper",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34299",
            "PositionName" => "Supervising Emigrant Services Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34300",
            "PositionName" => "Supervising Energy Regulation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34301",
            "PositionName" => "Supervising Engineering A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34302",
            "PositionName" => "Supervising Environmental Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34303",
            "PositionName" => "Supervising Estate Management Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34304",
            "PositionName" => "Supervising Export Credit Guarantee Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34305",
            "PositionName" => "Supervising Export Credit Insurance Underwiting Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34306",
            "PositionName" => "Supervising External Debt Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34307",
            "PositionName" => "Supervising Fedility Bond Examiner",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34308",
            "PositionName" => "Supervising Fiber Development Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34309",
            "PositionName" => "Supervising Field Operation Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34310",
            "PositionName" => "Supervising Financial Management Spescialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34311",
            "PositionName" => "Supervising Financial/acount Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34312",
            "PositionName" => "Supervising Fiscal Examiner",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34313",
            "PositionName" => "Supervising Fishing Regulation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34314",
            "PositionName" => "Supervising Foreign Affairs Researh Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34315",
            "PositionName" => "Supervising Foreign Exchange Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34316",
            "PositionName" => "Supervising Forest Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34317",
            "PositionName" => "Supervising Foundryman",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34318",
            "PositionName" => "Supervising General Insurance Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34319",
            "PositionName" => "Supervising General Insurance Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34320",
            "PositionName" => "Supervising Geophysicist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34321",
            "PositionName" => "Supervising Goelogist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34322",
            "PositionName" => "Supervising Goelogist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34323",
            "PositionName" => "Supervising Governor",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34324",
            "PositionName" => "Supervising Health Program Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34325",
            "PositionName" => "Supervising Historic Sites Development Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34326",
            "PositionName" => "Supervising History Researcher",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34327",
            "PositionName" => "Supervising Home Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34328",
            "PositionName" => "Supervising Hydro-geologist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34329",
            "PositionName" => "Supervising Hydrologist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34330",
            "PositionName" => "Supervising Immigration Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34331",
            "PositionName" => "Supervising In Engineering B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34332",
            "PositionName" => "Supervising Industrial Design Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34333",
            "PositionName" => "Supervising Industrial Nurse",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34334",
            "PositionName" => "Supervising Industrial Relations Development Officer A",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34335",
            "PositionName" => "Supervising Industrial Relations Development Officer B",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34336",
            "PositionName" => "Supervising Industrial Relations Management Officer A",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34337",
            "PositionName" => "Supervising Industrial Relations Management Officer B",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34338",
            "PositionName" => "Supervising Instrument Technician",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34339",
            "PositionName" => "Supervising Insurance Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34340",
            "PositionName" => "Supervising Insurance/risk Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34341",
            "PositionName" => "Supervising Internal Control Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34342",
            "PositionName" => "Supervising Investment Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34343",
            "PositionName" => "Supervising Investment Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34344",
            "PositionName" => "Supervising Irrigators Development Officer",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34345",
            "PositionName" => "Supervising Judicial Staff Officer",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34346",
            "PositionName" => "Supervising Language Research",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34347",
            "PositionName" => "Supervising Legislative Staff Officer I",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34348",
            "PositionName" => "Supervising Legislative Staff Officer II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34349",
            "PositionName" => "Supervising Librarian",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34350",
            "PositionName" => "Supervising Livelihood Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34351",
            "PositionName" => "Supervising Loans And Credit Evaluator",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34352",
            "PositionName" => "Supervising Loans And Credit Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34353",
            "PositionName" => "Supervising Local Treasury Examiner",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34354",
            "PositionName" => "Supervising Machinist",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34355",
            "PositionName" => "Supervising Management Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34356",
            "PositionName" => "Supervising Management Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34357",
            "PositionName" => "Supervising Manpower Development Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34358",
            "PositionName" => "Supervising Maritime Industry Development Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34359",
            "PositionName" => "Supervising Marketing Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34360",
            "PositionName" => "Supervising Materials Plannning Officer",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34361",
            "PositionName" => "Supervising Meat Control Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34362",
            "PositionName" => "Supervising Mechanic/technician",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34363",
            "PositionName" => "Supervising Memebers Services Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34364",
            "PositionName" => "Supervising Merchandiser",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34365",
            "PositionName" => "Supervising Merchant Banking Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34366",
            "PositionName" => "Supervising Metal Worker",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34367",
            "PositionName" => "Supervising Metallurgist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34368",
            "PositionName" => "Supervising Money Counter",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34369",
            "PositionName" => "Supervising Money Market Trader",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34370",
            "PositionName" => "Supervising Money Position Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34371",
            "PositionName" => "Supervising Mortgage Accounts Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34372",
            "PositionName" => "Supervising Mortgage Documents Review Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34373",
            "PositionName" => "Supervising Mortgage Loan Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34374",
            "PositionName" => "Supervising News Editor",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34375",
            "PositionName" => "Supervising Painter",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34376",
            "PositionName" => "Supervising Parole Officer",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34377",
            "PositionName" => "Supervising Patent And Trademark Executive Examiner",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34378",
            "PositionName" => "Supervising Patent Principal Examiner",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34379",
            "PositionName" => "Supervising Penal Institution Program Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34380",
            "PositionName" => "Supervising Personnel Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34381",
            "PositionName" => "Supervising Photoengraver",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34382",
            "PositionName" => "Supervising Planning Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34383",
            "PositionName" => "Supervising Political Affairs Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34384",
            "PositionName" => "Supervising Postal Clerk",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34385",
            "PositionName" => "Supervising Postal Service Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34386",
            "PositionName" => "Supervising Pressman",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34387",
            "PositionName" => "Supervising Probation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34388",
            "PositionName" => "Supervising Procurement Officer",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34389",
            "PositionName" => "Supervising Professional Regulation Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34390",
            "PositionName" => "Supervising Reconcilement Specialist",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34391",
            "PositionName" => "Supervising Records Management Analyst",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34392",
            "PositionName" => "Supervising Records Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34393",
            "PositionName" => "Supervising Remote Sensing Technologist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34394",
            "PositionName" => "Supervising Reprodution Machine Operator",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34395",
            "PositionName" => "Supervising Research Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34396",
            "PositionName" => "Supervising Researcher Analyst",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34397",
            "PositionName" => "Supervising Resetllement And Development Officers",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34398",
            "PositionName" => "Supervising Scholarship Affairs Officers",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34399",
            "PositionName" => "Supervising Science Research Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34400",
            "PositionName" => "Supervising Securities And Exchange Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34401",
            "PositionName" => "Supervising Securities Materials Control Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34402",
            "PositionName" => "Supervising Securities Servicing Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34403",
            "PositionName" => "Supervising Shipbuilding Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34404",
            "PositionName" => "Supervising Shipping Operations Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34405",
            "PositionName" => "Supervising State Auditor",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34406",
            "PositionName" => "Supervising Statistician",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34407",
            "PositionName" => "Supervising Stock Transfer Administrator",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34408",
            "PositionName" => "Supervising Supply Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34409",
            "PositionName" => "Supervising Tariff Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34410",
            "PositionName" => "Supervising Tax Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34411",
            "PositionName" => "Supervising Technical Audit Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34412",
            "PositionName" => "Supervising Telegraphic Transfer Service Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34413",
            "PositionName" => "Supervising Teller",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34414",
            "PositionName" => "Supervising Tourism Operator Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34415",
            "PositionName" => "Supervising Trade Industry Development Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34416",
            "PositionName" => "Supervising Trade Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34417",
            "PositionName" => "Supervising Trademark Principal Examiner",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34418",
            "PositionName" => "Supervising Trader",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34419",
            "PositionName" => "Supervising Trading Specialist",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34420",
            "PositionName" => "Supervising Transportation Development Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34421",
            "PositionName" => "Supervising Treasury Specialist",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34422",
            "PositionName" => "Supervising Typesetter",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34423",
            "PositionName" => "Supervising Utilities Customer Services",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34424",
            "PositionName" => "Supervising Veterans Assistance Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34425",
            "PositionName" => "Supervising Volunteer Service Officer",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34426",
            "PositionName" => "Supervising Warehouse/shipping Officer",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34427",
            "PositionName" => "Supervising Water Resources Development Offier",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34428",
            "PositionName" => "Supervising Water Utilities Management/development Officer",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34429",
            "PositionName" => "Supervising Weather Facilities Specialist",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34430",
            "PositionName" => "Supervising Weather Specialist",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34431",
            "PositionName" => "Supervision And Examination Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34432",
            "PositionName" => "Supervision And Examination Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34433",
            "PositionName" => "Supervision And Examination Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34436",
            "PositionName" => "Supervision And Examination Specialist  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34434",
            "PositionName" => "Supervision And Examination Specialist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34435",
            "PositionName" => "Supervision And Examination Specialist II",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34437",
            "PositionName" => "Supervision And Examination Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34438",
            "PositionName" => "Supervision And Examinaton Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34439",
            "PositionName" => "Supervisor Of Student Teaching ( Vocational And Two Years Technical Course)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34440",
            "PositionName" => "Supervisor Of Student Teaching (elementary Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34441",
            "PositionName" => "Supervisor Of Student Teaching (secondary Grades)",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34442",
            "PositionName" => "Supplies Checker",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34443",
            "PositionName" => "Supplies Custodian",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34444",
            "PositionName" => "Supply Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34445",
            "PositionName" => "Supply Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34446",
            "PositionName" => "Supply Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34447",
            "PositionName" => "Supply Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34448",
            "PositionName" => "Survey Aide A",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34449",
            "PositionName" => "Survey Aide B",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34450",
            "PositionName" => "Surveyman",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34451",
            "PositionName" => "System Design Specialist A",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34452",
            "PositionName" => "System Design Specialist B",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34453",
            "PositionName" => "Tailor",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34454",
            "PositionName" => "Tariff / Taxation Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34455",
            "PositionName" => "Tariff Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34456",
            "PositionName" => "Tariff Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34457",
            "PositionName" => "Tariff Specialist",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34458",
            "PositionName" => "Tariff Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34459",
            "PositionName" => "Tariff Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34460",
            "PositionName" => "Tax Mapping Examiner",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34461",
            "PositionName" => "Tax Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34462",
            "PositionName" => "Tax Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34463",
            "PositionName" => "Taxation Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34464",
            "PositionName" => "Taxation Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34465",
            "PositionName" => "Taxation Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34468",
            "PositionName" => "Teacher Credentials Evaluator  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34466",
            "PositionName" => "Teacher Credentials Evaluator I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34467",
            "PositionName" => "Teacher Credentials Evaluator II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34469",
            "PositionName" => "Teacher I (pre-school)",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34470",
            "PositionName" => "Teacher I (secondary Grades)",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34471",
            "PositionName" => "Teacher I (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34472",
            "PositionName" => "Teacher Ii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34473",
            "PositionName" => "Teacher Ii(elem Grades)",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34474",
            "PositionName" => "Teacher Ii(pre-school)",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34475",
            "PositionName" => "Teacher Ii(secondary Grades)",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34476",
            "PositionName" => "Teacher Iii (vocational And Two Years Technical Course)",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34477",
            "PositionName" => "Teachers Camp Superintendent",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34478",
            "PositionName" => "Teaching-aids Specialist",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34479",
            "PositionName" => "Technical Assistant A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34480",
            "PositionName" => "Technical Assistant B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34481",
            "PositionName" => "Technical Audit Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34482",
            "PositionName" => "Technical Audit Spcialist B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34483",
            "PositionName" => "Technical Audit Specialist I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34485",
            "PositionName" => "Technician Education Specialist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34484",
            "PositionName" => "Technician Education Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34486",
            "PositionName" => "Technician Education Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34487",
            "PositionName" => "Technician Education Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34488",
            "PositionName" => "Telecommunication District Officer",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34489",
            "PositionName" => "Telecommunication Traffic Supervisor",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34490",
            "PositionName" => "Telegram Carrier",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34491",
            "PositionName" => "Telegraphic Transfer Service Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34492",
            "PositionName" => "Telegraphic Transfer Service Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34493",
            "PositionName" => "Telegraphic Transfer Service Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34494",
            "PositionName" => "Teller",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34495",
            "PositionName" => "Teller I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34496",
            "PositionName" => "Terminal Operation Assistant A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34497",
            "PositionName" => "Terminal Operation Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34498",
            "PositionName" => "Terminal Operations Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34499",
            "PositionName" => "Terminal Operations Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34500",
            "PositionName" => "Terminal Supervisor A",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34501",
            "PositionName" => "Terminal Supervisor B",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34502",
            "PositionName" => "Terminal Supervisor C",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34504",
            "PositionName" => "Test Specialist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34503",
            "PositionName" => "Test Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34505",
            "PositionName" => "Test Technician I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34506",
            "PositionName" => "Test Technician II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34507",
            "PositionName" => "Textbook Editor",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34508",
            "PositionName" => "Third Mate",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34509",
            "PositionName" => "Ticket Checker",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34510",
            "PositionName" => "Toolkeeper",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34511",
            "PositionName" => "Toolmaker Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34512",
            "PositionName" => "Toolmaker General Foreman",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34513",
            "PositionName" => "Toolmaker I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34514",
            "PositionName" => "Toolmaker II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34515",
            "PositionName" => "Tourism Coordinator A",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34516",
            "PositionName" => "Tourism Coordinator B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34517",
            "PositionName" => "Tourism Operation Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34518",
            "PositionName" => "Tourism Operator Assistant",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34521",
            "PositionName" => "Tourist Receptionist  III",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34519",
            "PositionName" => "Tourist Receptionist I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34520",
            "PositionName" => "Tourist Receptionist II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34524",
            "PositionName" => "Toxicologist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34522",
            "PositionName" => "Toxicologist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34523",
            "PositionName" => "Toxicologist II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34525",
            "PositionName" => "Tracer",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34534",
            "PositionName" => "Trade  III",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34526",
            "PositionName" => "Trade Analyst I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34527",
            "PositionName" => "Trade Analyst II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34528",
            "PositionName" => "Trade Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34529",
            "PositionName" => "Trade Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34530",
            "PositionName" => "Trade Commissioner",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34533",
            "PositionName" => "Trade Control Examiner  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34531",
            "PositionName" => "Trade Control Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34532",
            "PositionName" => "Trade Control Examiner II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34535",
            "PositionName" => "Trade Industry Development Analyst",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34536",
            "PositionName" => "Trade Industry Development Specialist",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34537",
            "PositionName" => "Trade Principal Examiner I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34538",
            "PositionName" => "Trade Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34539",
            "PositionName" => "Trademark Principal Examiner II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34540",
            "PositionName" => "Trading  Analyst I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34541",
            "PositionName" => "Trading Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34542",
            "PositionName" => "Trading Assistant",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34543",
            "PositionName" => "Trading Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34546",
            "PositionName" => "Traffic Aide  III",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34544",
            "PositionName" => "Traffic Aide I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34545",
            "PositionName" => "Traffic Aide II",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34547",
            "PositionName" => "Traffic Operations Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34550",
            "PositionName" => "Traffic Opreations Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34548",
            "PositionName" => "Traffic Opreations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34549",
            "PositionName" => "Traffic Opreations Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34551",
            "PositionName" => "Traffic Opreations Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34552",
            "PositionName" => "Train Conductor",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34553",
            "PositionName" => "Train Driver A",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34554",
            "PositionName" => "Train Driver B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34555",
            "PositionName" => "Train Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34556",
            "PositionName" => "Training Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34557",
            "PositionName" => "Training Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34558",
            "PositionName" => "Training Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34559",
            "PositionName" => "Training Center Superintendent I",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34560",
            "PositionName" => "Training Center Superintendent II",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34563",
            "PositionName" => "Training Specialist  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34561",
            "PositionName" => "Training Specialist I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34562",
            "PositionName" => "Training Specialist II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34564",
            "PositionName" => "Training Specialist IV",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34565",
            "PositionName" => "Training Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34570",
            "PositionName" => "Transmission Line Foreman",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34571",
            "PositionName" => "Transmission Lineman A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34573",
            "PositionName" => "Transmission Lineman C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34578",
            "PositionName" => "Transport Dispatcher B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34579",
            "PositionName" => "Transport Electrician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34582",
            "PositionName" => "Transport Maintenance Supervisor",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34584",
            "PositionName" => "Transport Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34587",
            "PositionName" => "Transport Operations  Services Chief A",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34588",
            "PositionName" => "Transport Operations  Services Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34589",
            "PositionName" => "Travel Tax Officer A",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34590",
            "PositionName" => "Travel Tax Officer B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34591",
            "PositionName" => "Travel Tax Officer C",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34594",
            "PositionName" => "Treasure Analyst I",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34599",
            "PositionName" => "Treasury Claims Process I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34603",
            "PositionName" => "Treasury Operations Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34610",
            "PositionName" => "Treasury Planning/management Analyst B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34566",
            "PositionName" => "Training Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34569",
            "PositionName" => "Translator II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34575",
            "PositionName" => "Transport Development Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34576",
            "PositionName" => "Transport Development Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34581",
            "PositionName" => "Transport Maintenance  General Foreman",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34592",
            "PositionName" => "Travel Tax Processor",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34595",
            "PositionName" => "Treasure Analyst II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34600",
            "PositionName" => "Treasury Claims Processor II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34611",
            "PositionName" => "Treasury Planning/management Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34612",
            "PositionName" => "Treasury Planning/management Chief A",
            "SalaryGrade"  => "21",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34614",
            "PositionName" => "Treasury Planning/management Specialist  B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34615",
            "PositionName" => "Treasury Planning/management Specialist A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34620",
            "PositionName" => "Trust Administrator  III",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34629",
            "PositionName" => "Typesetter  III",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34633",
            "PositionName" => "University Extension Specialist I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34650",
            "PositionName" => "Utilities/customer Services Assistant D",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34660",
            "PositionName" => "Veterinarian VI",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34666",
            "PositionName" => "Vice President",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34669",
            "PositionName" => "Vice President  Staff Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34671",
            "PositionName" => "Vice President Staff Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34627",
            "PositionName" => "Typesetter I",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34630",
            "PositionName" => "Typesetter IV",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34638",
            "PositionName" => "University Professor",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34654",
            "PositionName" => "Utility Foreman",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34679",
            "PositionName" => "Vocational Placement Coordinator I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34701",
            "PositionName" => "Warehouse/ Shipping Officer A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34703",
            "PositionName" => "Warehouse/shipping Assistant  A",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34643",
            "PositionName" => "Up Executive Vice President",
            "SalaryGrade"  => "30",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34670",
            "PositionName" => "Vice President Staff Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34674",
            "PositionName" => "Virologist",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34728",
            "PositionName" => "Water/sewerage Maintenance Man C",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34628",
            "PositionName" => "Typesetter II",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34676",
            "PositionName" => "Vocational  School Superintendent I (elementary Grade)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34737",
            "PositionName" => "Weather Facilities Specialist    III",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34742",
            "PositionName" => "Weather Observation Aide",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34723",
            "PositionName" => "Water/ Sewerage Maintenance General Foreman",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34745",
            "PositionName" => "Weather Observer  III",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34596",
            "PositionName" => "Treasure Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34601",
            "PositionName" => "Treasury Operations Assistant I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34607",
            "PositionName" => "Treasury Operations Officer V",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34619",
            "PositionName" => "Trust Administrator II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34639",
            "PositionName" => "University Secretary I",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34644",
            "PositionName" => "Up President",
            "SalaryGrade"  => "31",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34658",
            "PositionName" => "Veterans Assistant Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34661",
            "PositionName" => "Veterinarian  VII",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34636",
            "PositionName" => "University Extension Specialist IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34673",
            "PositionName" => "Vice President Staff Officer VI",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34700",
            "PositionName" => "Warehouse Inspector",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34708",
            "PositionName" => "Water Resources  Facilities Operator B",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34727",
            "PositionName" => "Water/sewerage Maintenance Man B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34748",
            "PositionName" => "Weather Specialist I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34776",
            "PositionName" => "MEDICAL OFFICER V*",
            "SalaryGrade"  => "23",
            "ShortName"    => "MO V"
            ],
            [
            "PosCode"      => "34781",
            "PositionName" => "PHARMACIST III*",
            "SalaryGrade"  => "15",
            "ShortName"    => "PH III"
            ],
            [
            "PosCode"      => "34702",
            "PositionName" => "Warehouse/ Shipping Officer B",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34688",
            "PositionName" => "Vocational School Superintendent I (secondary Grade)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34668",
            "PositionName" => "Vice President  Staff Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34675",
            "PositionName" => "Vocational  Instruction  Supervisors I",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34740",
            "PositionName" => "Weather Facilities Technician  I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34731",
            "PositionName" => "Watershed Management Officer",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34760",
            "PositionName" => "Youth Development Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34765",
            "PositionName" => "Zoning Inspector II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34766",
            "PositionName" => "Zoning Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34768",
            "PositionName" => "Administrative Assistant VI",
            "SalaryGrade"  => "12",
            "ShortName"    => "ADMA  VI"
            ],
            [
            "PosCode"      => "34712",
            "PositionName" => "Water Resources Facilities Operator Foreman",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34733",
            "PositionName" => "Waterworks  Superintendent I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34753",
            "PositionName" => "Welder Foreman",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34743",
            "PositionName" => "Weather Observer I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34617",
            "PositionName" => "Tree Marker",
            "SalaryGrade"  => "2",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34618",
            "PositionName" => "Trust Administratopr I",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34567",
            "PositionName" => "Training Specialist V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34577",
            "PositionName" => "Transport Dispatcher A",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34729",
            "PositionName" => "Watershed Forester",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34692",
            "PositionName" => "Vocational School Superintendent Ii (vocational  And Technical Two Years Course)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34749",
            "PositionName" => "Weather Specialist II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34645",
            "PositionName" => "Up Vice President",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34793",
            "PositionName" => "Midwife II^",
            "SalaryGrade"  => "9",
            "ShortName"    => "Midwife II^"
            ],
            [
            "PosCode"      => "34604",
            "PositionName" => "Treasury Operations Officer II",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34653",
            "PositionName" => "Utilities/customer Services Officer B",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34678",
            "PositionName" => "Vocational Instrution  Supervisor II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34641",
            "PositionName" => "University/college President  III",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34649",
            "PositionName" => "Utilities/customer Services Assistant C",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34792",
            "PositionName" => "Midwife ",
            "SalaryGrade"  => "9",
            "ShortName"    => "Midwife II**"
            ],
            [
            "PosCode"      => "34667",
            "PositionName" => "Vice President  Of The Republlic Of The Philippines",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34782",
            "PositionName" => "RADIOLOGIC TECHNOLOGIST II*",
            "SalaryGrade"  => "15",
            "ShortName"    => "RT II"
            ],
            [
            "PosCode"      => "34744",
            "PositionName" => "Weather Observer II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34574",
            "PositionName" => "Transport Conductor/condutress",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34651",
            "PositionName" => "Utilities/customer Services Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34631",
            "PositionName" => "University Extension Associate I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34663",
            "PositionName" => "Vice President",
            "SalaryGrade"  => "27",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34763",
            "PositionName" => "Youth Development Officer V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34613",
            "PositionName" => "Treasury Planning/management Chief B",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34657",
            "PositionName" => "Venom Extractor",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34585",
            "PositionName" => "Transport Operation Supervisor A",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34730",
            "PositionName" => "Watershed Management Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34605",
            "PositionName" => "Treasury Operations Officer  III",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34608",
            "PositionName" => "Treasury Operations Officer VI",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34756",
            "PositionName" => "Work Order Tracer",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34704",
            "PositionName" => "Warehouse/shipping Assistant B",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34642",
            "PositionName" => "University/college Vice President IV",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34724",
            "PositionName" => "Water/sewerage Maintenance Foreman",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34784",
            "PositionName" => "NUTRITIONIST-DIETITIAN I*",
            "SalaryGrade"  => "11",
            "ShortName"    => "ND I"
            ],
            [
            "PosCode"      => "34640",
            "PositionName" => "University Secretary II",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34705",
            "PositionName" => "Warehouse/shipping Services Chief",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34637",
            "PositionName" => "University Extension Specialist V",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34778",
            "PositionName" => "MIDWIFE III*",
            "SalaryGrade"  => "13",
            "ShortName"    => "MID III"
            ],
            [
            "PosCode"      => "34635",
            "PositionName" => "University Extension Specialist  III",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34735",
            "PositionName" => "Waterworks Supervisor",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34789",
            "PositionName" => "SANGUNIANG PANLALAWIGAN COUNTERPART-A",
            "SalaryGrade"  => "31",
            "ShortName"    => "SPC-A"
            ],
            [
            "PosCode"      => "34655",
            "PositionName" => "Utility Worker I(a)",
            "SalaryGrade"  => "3",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34713",
            "PositionName" => "Water Resources Facilities Technician",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34682",
            "PositionName" => "Vocational School Administrator II",
            "SalaryGrade"  => "23",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34681",
            "PositionName" => "Vocational Placement Coordinator  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34741",
            "PositionName" => "Weather Facilities Technician   II",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34725",
            "PositionName" => "Water/sewerage Maintenance Head",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34791",
            "PositionName" => "DENTIST III*",
            "SalaryGrade"  => "20",
            "ShortName"    => "D III*"
            ],
            [
            "PosCode"      => "34714",
            "PositionName" => "Water Resources Facilities Tender A",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34764",
            "PositionName" => "Zoning Inspector I",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34736",
            "PositionName" => "Weather Facilities Specialist   II",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34677",
            "PositionName" => "Vocational Instruction Supervisor  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34709",
            "PositionName" => "Water Resources Development Officer I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34710",
            "PositionName" => "Water Resources Development Officer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34697",
            "PositionName" => "Ward Assistant",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34720",
            "PositionName" => "Water Utilities Management/development Chief",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34717",
            "PositionName" => "Water System Development Officer I",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34634",
            "PositionName" => "University Extension Specialist II",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34648",
            "PositionName" => "Utilities/customer Services Assistant B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34790",
            "PositionName" => "Dentist II*",
            "SalaryGrade"  => "17",
            "ShortName"    => "D II*"
            ],
            [
            "PosCode"      => "34715",
            "PositionName" => "Water Resources Facilities Tender B",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34586",
            "PositionName" => "Transport Operation Supervisor B",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34751",
            "PositionName" => "Welder B",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34597",
            "PositionName" => "Treasure Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34580",
            "PositionName" => "Transport Inspector",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34738",
            "PositionName" => "Weather Facilities Specialist    III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34795",
            "PositionName" => "Sangguniang Panlalawigan Member - PCL**",
            "SalaryGrade"  => "35",
            "ShortName"    => "spm**"
            ],
            [
            "PosCode"      => "34775",
            "PositionName" => "MEDICAL OFFICER IV*",
            "SalaryGrade"  => "21",
            "ShortName"    => "MO IV"
            ],
            [
            "PosCode"      => "34598",
            "PositionName" => "Treasure Of The Philippines",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34616",
            "PositionName" => "Treasury Specialist",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34632",
            "PositionName" => "University Extension Associate II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34747",
            "PositionName" => "Weather Services Chief",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34602",
            "PositionName" => "Treasury Operations Assistant II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34659",
            "PositionName" => "Veterans Assistant Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34623",
            "PositionName" => "Trust Officer II",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34716",
            "PositionName" => "Water System Development Assistant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34695",
            "PositionName" => "Waiter A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34689",
            "PositionName" => "Vocational School Superintendent I (vocational And Technical Two Years Course)",
            "SalaryGrade"  => "25",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34779",
            "PositionName" => "NUTRIONIST-DIETITIAN II",
            "SalaryGrade"  => "15",
            "ShortName"    => "ND II"
            ],
            [
            "PosCode"      => "34683",
            "PositionName" => "Vocational School Administrion  III",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34794",
            "PositionName" => "Local Disaster Risk Reduction & Management Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "LDRRMO II"
            ],
            [
            "PosCode"      => "34621",
            "PositionName" => "Trust Assitant",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34786",
            "PositionName" => "MIDWIFE II*",
            "SalaryGrade"  => "11",
            "ShortName"    => "MID II"
            ],
            [
            "PosCode"      => "34568",
            "PositionName" => "Translator I",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34706",
            "PositionName" => "Water Maintenance Head",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34767",
            "PositionName" => "Zoology Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34769",
            "PositionName" => "Administrative Assistant IV",
            "SalaryGrade"  => "1",
            "ShortName"    => "ADMA IV"
            ],
            [
            "PosCode"      => "34685",
            "PositionName" => "Vocational School Department Head(elementary Grade)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34662",
            "PositionName" => "Vice Chairman",
            "SalaryGrade"  => "29",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34699",
            "PositionName" => "Wardress II",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34719",
            "PositionName" => "Water System Development Officer  III",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34656",
            "PositionName" => "Utility Worker I(b)",
            "SalaryGrade"  => "1",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34583",
            "PositionName" => "Transport Office B",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34777",
            "PositionName" => "RADIOLOGIC TECHNOLOGIST I",
            "SalaryGrade"  => "11",
            "ShortName"    => "RT I"
            ],
            [
            "PosCode"      => "34690",
            "PositionName" => "Vocational School Superintendent Ii (elem Grade)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34783",
            "PositionName" => "MIDWIFE IV*",
            "SalaryGrade"  => "15",
            "ShortName"    => "MID IV"
            ],
            [
            "PosCode"      => "34572",
            "PositionName" => "Transmission Lineman B",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34788",
            "PositionName" => "Sangguniang Panlalawigan Member - PCL*",
            "SalaryGrade"  => "33",
            "ShortName"    => "spm-tcl*"
            ],
            [
            "PosCode"      => "34732",
            "PositionName" => "Watershed Management Specialist",
            "SalaryGrade"  => "17",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34774",
            "PositionName" => "NURSE II*",
            "SalaryGrade"  => "15",
            "ShortName"    => "NUR II"
            ],
            [
            "PosCode"      => "34696",
            "PositionName" => "Waiter B",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34739",
            "PositionName" => "Weather Facilities Specialist I",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34626",
            "PositionName" => "Tuorism Operator Officer II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34694",
            "PositionName" => "Volunteer Service  Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34759",
            "PositionName" => "Youth Development Officer I",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34684",
            "PositionName" => "Vocational School Dean",
            "SalaryGrade"  => "24",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34609",
            "PositionName" => "Treasury Planning /management Analyst A",
            "SalaryGrade"  => "13",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34711",
            "PositionName" => "Water Resources Facilites Operator C",
            "SalaryGrade"  => "4",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34718",
            "PositionName" => "Water System Development Officer II",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34785",
            "PositionName" => "PUBLIC HEALTH NURSE I*",
            "SalaryGrade"  => "15",
            "ShortName"    => "PHN I"
            ],
            [
            "PosCode"      => "34693",
            "PositionName" => "Volunteer  Service  Officer II",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34625",
            "PositionName" => "Tuorism Operator Officer I",
            "SalaryGrade"  => "11",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34780",
            "PositionName" => "NURSE IV*",
            "SalaryGrade"  => "19",
            "ShortName"    => "NUR"
            ],
            [
            "PosCode"      => "34622",
            "PositionName" => "Trust Officer I",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34758",
            "PositionName" => "Youth Development Assistant II",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34606",
            "PositionName" => "Treasury Operations Officer IV",
            "SalaryGrade"  => "19",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34707",
            "PositionName" => "Water Resources  Facilities  Operator A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34686",
            "PositionName" => "Vocational School Department Head(secondary Grade)",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34593",
            "PositionName" => "Travel Tax Supervisor",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34624",
            "PositionName" => "Trust Officer  III",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34761",
            "PositionName" => "Youth Development Officer  III",
            "SalaryGrade"  => "18",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34787",
            "PositionName" => "ACCOUNTANT I*",
            "SalaryGrade"  => "12",
            "ShortName"    => "AC I"
            ],
            [
            "PosCode"      => "34726",
            "PositionName" => "Water/sewerage Maintenance Man A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34755",
            "PositionName" => "Well Drilling Supervisor II",
            "SalaryGrade"  => "10",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34672",
            "PositionName" => "Vice President Staff Officer V",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34652",
            "PositionName" => "Utilities/customer Services Officer A",
            "SalaryGrade"  => "16",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34734",
            "PositionName" => "Waterworks Superintendent II",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34687",
            "PositionName" => "Vocational School Department Head(vocational And Technical Two Years Course )",
            "SalaryGrade"  => "20",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34665",
            "PositionName" => "Vice President",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34752",
            "PositionName" => "Welder Foreman",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34721",
            "PositionName" => "Water Utilities Management/development Officer A",
            "SalaryGrade"  => "14",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34691",
            "PositionName" => "Vocational School Superintendent Ii (secondary Grade)",
            "SalaryGrade"  => "26",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34773",
            "PositionName" => "PHARMACIST I*",
            "SalaryGrade"  => "11",
            "ShortName"    => "PH I"
            ],
            [
            "PosCode"      => "34754",
            "PositionName" => "Well Drilling Supervisor I",
            "SalaryGrade"  => "9",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34757",
            "PositionName" => "Youth Development Assistant I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34680",
            "PositionName" => "Vocational Placement Coordinator II",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34746",
            "PositionName" => "Weather Observer IV",
            "SalaryGrade"  => "15",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34646",
            "PositionName" => "Upholsterer",
            "SalaryGrade"  => "7",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34698",
            "PositionName" => "Wardress I",
            "SalaryGrade"  => "5",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34647",
            "PositionName" => "Utilities/customer Services Assistant A",
            "SalaryGrade"  => "12",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34750",
            "PositionName" => "Welder A",
            "SalaryGrade"  => "8",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34772",
            "PositionName" => "Administrative Aide II",
            "SalaryGrade"  => "2",
            "ShortName"    => "ADM AIDE II"
            ],
            [
            "PosCode"      => "34762",
            "PositionName" => "Youth Development Officer IV",
            "SalaryGrade"  => "22",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34722",
            "PositionName" => "Water Works Technician",
            "SalaryGrade"  => "6",
            "ShortName"    => "tempx"
            ],
            [
            "PosCode"      => "34664",
            "PositionName" => "Vice President",
            "SalaryGrade"  => "28",
            "ShortName"    => "tempx"
            ]
            ];

            foreach($positions as $position) {
                Position::create([
                    'position_code'         => $position['PosCode'],
                    'position_name'         => $position['PositionName'],
                    'position_short_name'   => $position['ShortName'],
                    'sg_no'          => $position['SalaryGrade'],
                ]);
            }
    }
}
