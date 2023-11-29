<?php

namespace Database\Seeders;

use App\Models\Apps\BoothExhibitionBooked;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [
            [
                'company' => 'UNCLE WONG',
                'roc_rob' => 'NA',
                'pic_name' => 'UNCLE WONG',
                'phone_num' => '0123072744',
                'email' => 'unclewong@gmail.com',
                'social_media' => '',
                'website' => '',
                'image' => '',
            ],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }

        $vendor = Vendor::where('company', 'UNCLE WONG')->first();
        $boothsnumberHS05 = BoothNumber::where('booth_number', 'HS05')->first();

        $boothBooked = [
            'inv_number' => 'MHX-23-00000108',
            'inv_date' => '2023-11-29',
            'vendor_id' => $vendor->id,
            'sales_agent_id' => 26,
            'inv_description' => '{"section_id":"2","booth_qty":"1","booth_price":"RM 850.00","booth_price_unit":"85","table_TPrice":"RM 0.00","add_on_table":"45.00","add_table":"0","chair_TPrice":"RM 0.00","add_on_chair":"9.00","add_chair":"0","sso_TPrice":"RM 70.00","add_on_sso":"70.00","add_sso":"1","ssoamp15_TPrice":"RM 0.00","add_on_sso_15amp":"150.00","add_sso_15amp":"0","steel_barricade_TPrice":"RM 0.00","add_on_steel_barricade":"55.00","add_steel_barricade":"0","shell_scheme_barricade_TPrice":"RM 0.00","add_on_shell_scheme_barricade":"35.00","add_shell_scheme_barricade":"0","sub_total":"RM 125.00","total":"RM 125.00","booths":{"id":{"322":"on",}}}',
            'add_on' => 'data',
            'total' => 125,
            'fee' => 4.375,
            'payment_status' => true,
        ];

        BoothExhibitionBooked::create($boothBooked);
        $boothsnumberHS05->update([
            'vendor_id' => $vendor->id
        ]);
    }
}
