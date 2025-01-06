<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Contact;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $districts = [
            ['name' => 'Denpasar', 'zip_code' => '80111'],
            ['name' => 'Badung', 'zip_code' => '80361'],
            ['name' => 'Buleleng', 'zip_code' => '81111'],
            ['name' => 'Gianyar', 'zip_code' => '80511'],
            ['name' => 'Karangasem', 'zip_code' => '80811'],
            ['name' => 'Klungkung', 'zip_code' => '80711'],
            ['name' => 'Tabanan', 'zip_code' => '82111'],
            ['name' => 'Bangli', 'zip_code' => '80611'],
            ['name' => 'Jembrana', 'zip_code' => '82211'],
        ];

        foreach ($districts as $districtData) {
            $district = District::create([
                'name' => $districtData['name'],
                'zip_code' => $districtData['zip_code']
            ]);

            $subdistricts = $this->getSubdistricts($districtData['name']);
            foreach ($subdistricts as $subDistrictData) {
                $subDistrict = SubDistrict::create([
                    'district_id' => $district->id,
                    'name' => $subDistrictData['name'],
                    'zip_code' => $subDistrictData['zip_code']
                ]);

                for ($i = 1; $i <= 10; $i++) {
                    Contact::create([
                        'district_id' => $district->id,
                        'sub_district_id' => $subDistrict->id,
                        'office_name' => "Office $i - $subDistrictData[name]",
                        'office_photo' => 'https://lh5.googleusercontent.com/p/AF1QipPksLlsBWQIjKYEj1xwnLWxIR8vputgwM_XbjRF=w650-h400-k-no',
                        'address' => "Address for $subDistrictData[name] - Office $i",
                        'email' => "office$i@example.com",
                        'phone' => "0812345678$i",
                        'website' => "http://office$i.com",
                        'status' => 'Active'
                    ]);
                }
            }
        }
    }

    private function getSubdistricts($districtName)
    {
        $subdistricts = [];

        switch ($districtName) {
            case 'Denpasar':
                $subdistricts = [
                    ['name' => 'Denpasar Barat', 'zip_code' => '80112'],
                    ['name' => 'Denpasar Timur', 'zip_code' => '80113'],
                    ['name' => 'Denpasar Selatan', 'zip_code' => '80114'],
                    ['name' => 'Denpasar Utara', 'zip_code' => '80115'],
                ];
                break;
            case 'Badung':
                $subdistricts = [
                    ['name' => 'Kuta', 'zip_code' => '80361'],
                    ['name' => 'Kuta Selatan', 'zip_code' => '80362'],
                    ['name' => 'Kuta Utara', 'zip_code' => '80363'],
                    ['name' => 'Abiansemal', 'zip_code' => '80364'],
                ];
                break;
            case 'Buleleng':
                $subdistricts = [
                    ['name' => 'Singaraja', 'zip_code' => '81111'],
                    ['name' => 'Seririt', 'zip_code' => '81112'],
                    ['name' => 'Tejakula', 'zip_code' => '81113'],
                    ['name' => 'Busungbiu', 'zip_code' => '81114'],
                ];
                break;
            case 'Gianyar':
                $subdistricts = [
                    ['name' => 'Ubud', 'zip_code' => '80511'],
                    ['name' => 'Gianyar', 'zip_code' => '80512'],
                    ['name' => 'Tampaksiring', 'zip_code' => '80513'],
                    ['name' => 'Payangan', 'zip_code' => '80514'],
                ];
                break;
            case 'Karangasem':
                $subdistricts = [
                    ['name' => 'Amlapura', 'zip_code' => '80811'],
                    ['name' => 'Abang', 'zip_code' => '80812'],
                    ['name' => 'Karangasem', 'zip_code' => '80813'],
                    ['name' => 'Manggis', 'zip_code' => '80814'],
                ];
                break;
            case 'Klungkung':
                $subdistricts = [
                    ['name' => 'Semarapura', 'zip_code' => '80711'],
                    ['name' => 'Banjarangkan', 'zip_code' => '80712'],
                    ['name' => 'Dawan', 'zip_code' => '80713'],
                    ['name' => 'Nusapenida', 'zip_code' => '80714'],
                ];
                break;
            case 'Tabanan':
                $subdistricts = [
                    ['name' => 'Tabanan', 'zip_code' => '82111'],
                    ['name' => 'Marga', 'zip_code' => '82112'],
                    ['name' => 'Baturiti', 'zip_code' => '82113'],
                    ['name' => 'Kediri', 'zip_code' => '82114'],
                ];
                break;
            case 'Bangli':
                $subdistricts = [
                    ['name' => 'Bangli', 'zip_code' => '80611'],
                    ['name' => 'Tembuku', 'zip_code' => '80612'],
                    ['name' => 'Susut', 'zip_code' => '80613'],
                    ['name' => 'Kintamani', 'zip_code' => '80614'],
                ];
                break;
            case 'Jembrana':
                $subdistricts = [
                    ['name' => 'Negara', 'zip_code' => '82211'],
                    ['name' => 'Mendoyo', 'zip_code' => '82212'],
                    ['name' => 'Rambut Sewa', 'zip_code' => '82213'],
                    ['name' => 'Jembrana', 'zip_code' => '82214'],
                ];
                break;
        }

        return $subdistricts;
    }
}
