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
        $array1 = ['','10001','10002','10003','10004','10005','10006','10007','10008','10009','10010','10011','10012','10013','10014','10015','10016','10017','10018','10019','10020','10021','10022','10023','10024','10025','10026','10027','10028','10029','10030','10031','10032','10033','10034','10035','10036','10037','10038','10039','10040','10041','10042','10043','10044','10045','10046','10050','10055','10056'];
        $array2 = ['','Provincial Governor"s Office','Provincial Vice Governor"s Office','Tanggapan ng Sangguniang Panlalawigan','Provincial Administrator"s Office','Provincial Accountant"s Office','Provincial Treasurer"s Office','Provincial Assessor"s Office','Provincial Planning and Development Office','Provincial Budget Office','Provincial General Services Office - Admin','Provincial Legal Office','Provincial Prosecutor"s Office','Provincial Engineer"s Office - Admin Division','Provincial Agriculturist"s Office','Provincial Veterinary Office','Provincial Fisheries and Aquatic Resources Office','Provincial Environment and Natural Resources Office','Provincial Social Welfare and Development Office','Provincial Health Office','Bislig District Hospital','Hinatuan District Hospital','Lianga District Hospital','Madrid District Hospital','Marihatag District Hospital','Lingig Medicare Community Hospital','Cortes Municipal Hospital','San Miguel Community Hospital','Provincial Tourism Office','PGO - Nutrition Division','PGO - Population Management Division','PGO - Warden Tandag','PGO - Warden Lianga','PGO - Warden Bislig','PGO - Warden Cantilan','PEO - Construction and Maintenance Division 1','PEO - Motorpool Division','TSP - Coterminous','TSP - Elected','Provincial School Board','Provincial General Services Office - Security','Provincial General Services Office - Detailed','PEO - Construction and Maintenance Division 2','DECS','ITU - Information Technology Unit','Provincial Vice Governor"s Office - VM','Provincial Disaster Risk Reduction & Mngt. Office','Provincial Human Resource Management Office','Tanggapan ng Sangguniang Panlalawigan - 2','TSP - Elected(ATM)'];
        for($i = 1; $i <= 49; $i++){
            Office::create([
                'office_code' => $array1[$i],
                'office_name' => $array2[$i],
                // 'office_active' => 'active',
            ]);
        }
    }
}
