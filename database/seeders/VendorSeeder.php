<?php

namespace Database\Seeders;

use App\Models\Apps\BoothExhibitionBooked;
use App\Models\Apps\BoothNumber;
use App\Models\Apps\SalesAgent;
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
                'company' => 'SKALA ASSOCIATES',
                'roc_rob' => 'NA',
                'pic_name' => 'Razif Mustapha',
                'phone_num' => '+60129539231',
                'email' => 'razifmustapha@gmail.com',
                'social_media' => '{"facebook":null,"instagram":null,"tiktok":null,"other":null}',
                'website' => null,
                'image' => null,
            ],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }

        $vendor = Vendor::where('company', 'SKALA ASSOCIATES')->first();
        $boothsnumberHS05 = BoothNumber::where('booth_number', 'HB34')->first();
        $agent = SalesAgent::where('name', 'PRE-Reg Online')->first();

        $boothBooked = [
            'inv_number' => 'MHX-23-00000109',
            'inv_date' => '2023-11-29',
            'vendor_id' => $vendor->id,
            'sales_agent_id' => $agent->id,
            'inv_description' => '{"section_id":"2","booth_qty":"1","booth_price":"RM 850.00","booth_price_unit":"85","table_TPrice":"RM 0.00","add_on_table":"45.00","add_table":"0","chair_TPrice":"RM 0.00","add_on_chair":"9.00","add_chair":"0","sso_TPrice":"RM 70.00","add_on_sso":"70.00","add_sso":"1","ssoamp15_TPrice":"RM 0.00","add_on_sso_15amp":"150.00","add_sso_15amp":"0","steel_barricade_TPrice":"RM 0.00","add_on_steel_barricade":"55.00","add_steel_barricade":"0","shell_scheme_barricade_TPrice":"RM 0.00","add_on_shell_scheme_barricade":"35.00","add_shell_scheme_barricade":"0","sub_total":"RM 125.00","total":"RM 125.00","booths":{"id":{"322":"on",}}}',
            'add_on' => 'data',
            'total' => 600,
            'fee' => 21,
            'payment_status' => true,
        ];

        BoothExhibitionBooked::create($boothBooked);
        $boothsnumberHS05->update([
            'vendor_id' => $vendor->id
        ]);
    }
}
