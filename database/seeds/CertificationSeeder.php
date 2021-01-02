<?php

use Illuminate\Database\Seeder;
use App\Certification;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$certifications = [
			[ 'name'=> 	'Other' ],
			[ 'name'=> 	'BLS' ],
			[ 'name'=> 	'ACLS' ],
			[ 'name'=> 	'NIHSS' ],
			[ 'name'=> 	'PALS' ],
			[ 'name'=> 	'TNC' ],
			[ 'name'=> 	'CCRN' ],
			[ 'name'=> 	'CCRN - E' ],
			[ 'name'=> 	'CWCN' ],
			[ 'name'=> 	'PCCN' ],
			[ 'name'=> 	'CNOR' ],
			[ 'name'=> 	'CNRFA' ],
			[ 'name'=> 	'CSSM' ],
			[ 'name'=> 	'CNS-CP' ],
			[ 'name'=> 	'CEN' ],
			[ 'name'=> 	'CFRN' ],
			[ 'name'=> 	'CPEN' ],
			[ 'name'=> 	'CTRN' ],
			[ 'name'=> 	'TCRN' ],
			[ 'name'=> 	'CMC' ],
			[ 'name'=> 	'NALS' ],
			[ 'name'=> 	'PEARS' ],
			[ 'name'=> 	'CSC' ],
			[ 'name'=> 	'CARN' ],
			[ 'name'=> 	'ACRN' ],
			[ 'name'=> 	'AACRN' ],
			[ 'name'=> 	'CMSRN' ],
			[ 'name'=> 	'CRNA' ],
			[ 'name'=> 	'NCSN' ],
			[ 'name'=> 	'AOCN' ],
			[ 'name'=> 	'CRN' ],
		];
	
		foreach ($certifications as $certificate) {
            Certification::updateOrCreate(['name' => $certificate['name']], $certificate);
        }

    }
}
