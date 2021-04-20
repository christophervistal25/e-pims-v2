<?php

use Illuminate\Database\Seeder;
use App\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
               "office_code"   => "10001",
               "office_name"   => "Provincial Governor's Office",
               "office_short_name"  => "PGO",
               "office_head"   => "ALEXANDER T. PIMENTEL",
               "position_name" => "Provincial Governor"
            ],
            [
               "office_code"   => "10002",
               "office_name"   => "Provincial Vice Governor's Office",
               "office_short_name"  => "PVGO",
               "office_head"   => "LIBRADO C. NAVARRO",
               "position_name" => "Provincial Vice Governor "
            ],
            [
               "office_code"   => "10003",
               "office_name"   => "Tanggapan ng Sangguniang Panlalawigan - 1",
               "office_short_name"  => "TSP",
               "office_head"   => "LIBRADO C. NAVARRO",
               "position_name" => "Provincial Vice Governor"
            ],
            [
               "office_code"   => "10004",
               "office_name"   => "Provincial Administrator's Office",
               "office_short_name"  => "PADMO",
               "office_head"   => "PEDRO M. TRINIDAD, JR.",
               "position_name" => "Department Head"
            ],
            [
               "office_code"   => "10005",
               "office_name"   => "Provincial Accountant's Office",
               "office_short_name"  => "PAO",
               "office_head"   => "CONSUELO L. GARCIA",
               "position_name" => "OIC-Provincial Accountant "
            ],
            [
               "office_code"   => "10006",
               "office_name"   => "Provincial Treasurer's Office",
               "office_short_name"  => "PTO",
               "office_head"   => "FERMINA D. PALANGPANG",
               "position_name" => "Acting Provincial Treasurer"
            ],
            [
               "office_code"   => "10007",
               "office_name"   => "Provincial Assessor's Office",
               "office_short_name"  => "PASSO",
               "office_head"   => "SABINA C. NOGUERA, REA",
               "position_name" => "Provincial Assessor"
            ],
            [
               "office_code"   => "10008",
               "office_name"   => "Provincial Planning and Development Office",
               "office_short_name"  => "PPDO",
               "office_head"   => "MERLINDA O. BAURE",
               "position_name" => "Department Head"
            ],
            [
               "office_code"   => "10009",
               "office_name"   => "Provincial Budget Office",
               "office_short_name"  => "PBO",
               "office_head"   => "JOSE GREGG O. BANDOY",
               "position_name" => "Provincial Budget Officer"
            ],
            [
               "office_code"   => "10010",
               "office_name"   => "Provincial General Services Office - Admin",
               "office_short_name"  => "PGSO",
               "office_head"   => "PEDRITO M. SERRA",
               "position_name" => "Provincial Government Department Head"
            ],
            [
               "office_code"   => "10011",
               "office_name"   => "Provincial Legal Office",
               "office_short_name"  => "PLO",
               "office_head"   => "ATTY. LIMUEL L. AUZA",
               "position_name" => "Department Head"
            ],
            [
               "office_code"   => "10012",
               "office_name"   => "Provincial Prosecutor's Office",
               "office_short_name"  => "PPO",
               "office_head"   => "ATTY.VITO T. GOTOSTOS",
               "position_name" => "Oic-Provincial Prosecutor"
            ],
            [
               "office_code"   => "10013",
               "office_name"   => "Provincial Engineer's Office - Admin Division",
               "office_short_name"  => "PEOADM",
               "office_head"   => "ENGR. ELEUTERIO S. CUBERO, JR.",
               "position_name" => "Provincial Engineer"
            ],
            [
               "office_code"   => "10014",
               "office_name"   => "Provincial Agriculturist's Office",
               "office_short_name"  => "PAGO",
               "office_head"   => "MARCOS M. QUICO",
               "position_name" => "Provincial Agriculturist"
            ],
            [
               "office_code"   => "10015",
               "office_name"   => "Provincial Veterinary Office",
               "office_short_name"  => "PVO",
               "office_head"   => "DR. GERVACIO A. YPARRAGUIRRE",
               "position_name" => "Provincial Veterinarian"
            ],
            [
               "office_code"   => "10016",
               "office_name"   => "Provincial Fisheries and Aquatic Resources Office",
               "office_short_name"  => "PFARO",
               "office_head"   => "BERNESITA P. ROJAS",
               "position_name" => "Provincial Fisheries & Aquatic Resources Officer"
            ],
            [
               "office_code"   => "10029",
               "office_name"   => "PGO - Nutrition Division",
               "office_short_name"  => "PND",
               "office_head"   => "ERMELINDA C. ASCAREZ, RND",
               "position_name" => "Department Head"
            ],
            [
               "office_code"   => "10036",
               "office_name"   => "PEO - Motorpool Division",
               "office_short_name"  => "PEOMPD",
               "office_head"   => "ENGR. ELEUTERIO S. CUBERO, JR.",
               "position_name" => "Provincial Engineer"
            ],
            [
               "office_code"   => "10044",
               "office_name"   => "ITU - Information Technology Unit",
               "office_short_name"  => "ITU",
               "office_head"   => "RAMON R. MORALES",
               "position_name" => "Cao Ii"
            ],
            [
               "office_code"   => "10039",
               "office_name"   => "Provincial School Board",
               "office_short_name"  => "PSB",
               "office_head"   => "FE C. VALEROSO, CESO IV",
               "position_name" => "School Division Superintendent"
            ],
            [
               "office_code"   => "10045",
               "office_name"   => "Provincial Vice Governor's Office - VM",
               "office_short_name"  => "PVGO-VM",
               "office_head"   => "LIBRADO C. NAVARRO",
               "position_name" => "Provincial Vice Governor "
            ],
            [
               "office_code"   => "10022",
               "office_name"   => "Lianga District Hospital",
               "office_short_name"  => "LDH",
               "office_head"   => "JOSENITA C. QUISIL, M.D. MCH",
               "position_name" => "Department Head"
            ],
            [
               "office_code"   => "10023",
               "office_name"   => "Madrid District Hospital",
               "office_short_name"  => "MDH",
               "office_head"   => "ALGERICO H. IRIZARI, M.D.",
               "position_name" => "Chief Of Hospital"
            ],
            [
               "office_code"   => "10025",
               "office_name"   => "Lingig Medicare Community Hospital",
               "office_short_name"  => "LMCH",
               "office_head"   => "JULIUS E. BASTILLADA, M.D.",
               "position_name" => "Chief of Hospital"
            ],
            [
               "office_code"   => "10027",
               "office_name"   => "San Miguel Community Hospital",
               "office_short_name"  => "SMCH",
               "office_head"   => "SYLVA F. DIME, M,D.",
               "position_name" => "Chief Of Hospital"
            ],
            [
               "office_code"   => "10028",
               "office_name"   => "Provincial Tourism Office",
               "office_short_name"  => "PPTO",
               "office_head"   => "MARY VIL C. CHAN",
               "position_name" => "Provincial Tourism Officer"
            ],
            [
               "office_code"   => "10032",
               "office_name"   => "PGO - Warden Lianga",
               "office_short_name"  => "PWL",
               "office_head"   => "ROGELIO M. PIMENTEL",
               "position_name" => "Provincial Warden"
            ],
            [
               "office_code"   => "10033",
               "office_name"   => "PGO - Warden Bislig",
               "office_short_name"  => "PWB",
               "office_head"   => "ROGELIO M. PIMENTEL",
               "position_name" => "Provincial Warden"
            ],
            [
               "office_code"   => "10034",
               "office_name"   => "PGO - Warden Cantilan",
               "office_short_name"  => "PWC",
               "office_head"   => "ROGELIO M. PIMENTEL",
               "position_name" => "Provincial Warden"
            ],
            [
               "office_code"   => "10038",
               "office_name"   => "TSP - Elected",
               "office_short_name"  => "TSP-EL",
               "office_head"   => "LIBRADO C. NAVARRO",
               "position_name" => "Provincial Vice Governor"
            ],
            [
               "office_code"   => "10040",
               "office_name"   => "Provincial General Services Office - Security",
               "office_short_name"  => "PGSO",
               "office_head"   => "PEDRITO M. SERRA",
               "position_name" => " Department Head"
            ],
            [
               "office_code"   => "10017",
               "office_name"   => "Provincial Environment and Natural Resources Office",
               "office_short_name"  => "PENRO",
               "office_head"   => "THELMA S. ALCOBERES",
               "position_name" => "PENRO - LGU"
            ],
            [
               "office_code"   => "10018",
               "office_name"   => "Provincial Social Welfare and Development Office",
               "office_short_name"  => "PSWDO",
               "office_head"   => "CHARLITA G. MONTENEGRO",
               "position_name" => "Provincial Government Head"
            ],
            [
               "office_code"   => "10019",
               "office_name"   => "Provincial Health Office",
               "office_short_name"  => "PHO",
               "office_head"   => "ERIC T. MONTESCLAROS,  M.D.",
               "position_name" => "Provincial Health Officer Ii"
            ],
            [
               "office_code"   => "10020",
               "office_name"   => "Bislig District Hospital",
               "office_short_name"  => "BDH",
               "office_head"   => "ELENILA I. JAKOSALEM, M.D, MCH",
               "position_name" => "Chief Of Hospital"
            ],
            [
               "office_code"   => "10021",
               "office_name"   => "Hinatuan District Hospital",
               "office_short_name"  => "HDH",
               "office_head"   => "DANILO J. VIOLA, M.D., MCH",
               "position_name" => "Chief Of Hospital 1"
            ],
            [
               "office_code"   => "10024",
               "office_name"   => "Marihatag District Hospital",
               "office_short_name"  => "MARDH",
               "office_head"   => "EDMUND L. LAMELA,  MD,MDH",
               "position_name" => "Chief Of  Hospital I"
            ],
            [
               "office_code"   => "10026",
               "office_name"   => "Cortes Municipal Hospital",
               "office_short_name"  => "CMH",
               "office_head"   => "LIBETH H. ONGAYO, M.D.",
               "position_name" => "Officer-in-charge"
            ],
            [
               "office_code"   => "10030",
               "office_name"   => "PGO - Population Management Division",
               "office_short_name"  => "POM",
               "office_head"   => "JOSE A. POLINAR",
               "position_name" => "Pp0 Iv"
            ],
            [
               "office_code"   => "10031",
               "office_name"   => "PGO - Warden Tandag",
               "office_short_name"  => "PWT",
               "office_head"   => "ROGELIO M. PIMENTEL",
               "position_name" => "Provincial Warden"
            ],
            [
               "office_code"   => "10035",
               "office_name"   => "PEO - Construction and Maintenance Division 1",
               "office_short_name"  => "PEOCMD",
               "office_head"   => "ENGR. ELEUTERIO S. CUBERO, JR.",
               "position_name" => "Provincial Engineer"
            ],
            [
               "office_code"   => "10037",
               "office_name"   => "TSP - Coterminous",
               "office_short_name"  => "TSP-CO",
               "office_head"   => "MANUEL O. ALAMEDA, SR.",
               "position_name" => "Vice Governor"
            ],
            [
               "office_code"   => "10041",
               "office_name"   => "Provincial General Services Office - Detailed",
               "office_short_name"  => "PGSO",
               "office_head"   => "PEDRITO M. SERRA",
               "position_name" => " Department Head"
            ],
            [
               "office_code"   => "10042",
               "office_name"   => "PEO - Construction and Maintenance Division 2",
               "office_short_name"  => "PEOCMD",
               "office_head"   => "ENGR. ELEUTERIO S. CUBERO, JR.",
               "position_name" => "Provincial Engineer"
            ],
            [
               "office_code"   => "10043",
               "office_name"   => "DECS",
               "office_short_name"  => "DECS",
               "office_head"   => "ALEXANDER T. PIMENTEL.",
               "position_name" => "Provincial Governor"
            ],
            [
               "office_code"   => "10046",
               "office_name"   => "Provincial Disaster Risk Reduction & Mngt. Office",
               "office_short_name"  => "PDRRMO",
               "office_head"   => "ABEL L. DE GUZMAN",
               "position_name" => "Pdrrm Officer"
            ],
            [
               "office_code"   => "10050",
               "office_name"   => "Provincial Human Resource Management Office",
               "office_short_name"  => "PHRMO",
               "office_head"   => "ACE R. ORCULLO",
               "position_name" => "Provincial Government Department Head"
            ],
            [
               "office_code"   => "10055",
               "office_name"   => "Tanggapan ng Sangguniang Panlalawigan - 2",
               "office_short_name"  => "TSP",
               "office_head"   => "LIBRADO C. NAVARRO",
               "position_name" => "Provincial Vice Governor"
            ],
            [
               "office_code"   => "10056",
               "office_name"   => "TSP - Elected(ATM)",
               "office_short_name"  => "TSP-EL",
               "office_head"   => "LIBRADO C. NAVARRO",
               "position_name" => "Provincial Vice Governor"
            ]
        ];

        foreach($offices as $office) {
            Office::create([
                'office_code'          => $office['office_code'],
                'office_name'          => $office['office_name'],
                'office_short_name'    => $office['office_short_name'],
                'office_address'       => ' ',
                'office_short_address' => ' ',
                'office_head'          => $office['office_head'],
                'position_name'        => $office['position_name']
            ]);
        }


    }
}
