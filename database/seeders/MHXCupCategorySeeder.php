<?php

namespace Database\Seeders;

use App\Models\Apps\MHXCup\RacerNickNameRegister;
use App\Models\Apps\MHXCup\RacerRegister;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MHXCupCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PdCd	LEE SENG LEONG	leesengleong668@gmail.com	LEESENG048, LEESENG049, LEESENG050	NA	3 FoC

        $semitech = 'semi-tech class a';
        $bmax = 'b-max class b';
        $stockcar = 'stock-car class c';

        $priceSemitech = 200;
        $priceBmax = 120;
        $priceStockcar = 35;

        $folder = 'assets/upload/';

        $racers = [
            // semi-tech class a
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 4,
                'full_name' => strtoupper('ZAINUDIN JUHARI'),
                'identification_card_number' => '850323015487',
                'phone_number' => '+6+60167800794',
                'email' => 'zainudinjuhari.zj@gmail.com',
                'nickname' => strtoupper('ARRC'),
                'team_group' => 'Arrc',
                'registration' => 4,
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                ],
            ],
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 4,
                'full_name' => strtoupper('ZAINUDIN JUHARI'),
                'identification_card_number' => '850323015487',
                'phone_number' => '+6+60167800794',
                'email' => 'zainudinjuhari.zj@gmail.com',
                'nickname' => strtoupper('ARRC'),
                'team_group' => 'Arrc',
                'registration' => 4,
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ARRC'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                ],
            ],
        ];

        foreach ($racers as $racer) {
            $uniq = Str::random(4);

            $registered = RacerRegister::where('category', $semitech)->orderBy('id', 'DESC')->first();
            if ($registered) {
                $lastNumberRegister = $registered->numberRegister->last();
                if ($lastNumberRegister) {
                    $register = $lastNumberRegister->register;
                }
            } else {
                $register = 0; // Start from 0 if no previous records found
            }

            $newRacer = new RacerRegister();
            $newRacer->fill([
                'uniq'                      => $uniq,
                'category'                  => $racer['category'],
                'price_category'            => $racer['price_category'],
                'total_cost'                => $racer['total_cost'],
                'full_name'                 => $racer['full_name'],
                'identification_card_number' => $racer['identification_card_number'],
                'phone_number'              => $racer['phone_number'],
                'email'                     => $racer['email'],
                'nickname'                  => $racer['nickname'],
                'team_group'                => $racer['team_group'],
                'registration'              => $racer['registration'],
                'receipt'                   => $racer['receipt'],
                'approval'                  => $racer['approval'],
            ]);
            $newRacer->save();

            foreach ($racer['runNum'] as $number) {
                $nickname = new RacerNickNameRegister();
                $nickname->fill([
                    'category'  => $newRacer->category,
                    'racer_id'  => $newRacer->id,
                    'uniq'      => $newRacer->uniq,
                    'nickname'  => $newRacer->nickname,
                    'register'  => $register + 1,
                    'shirt_zie' => $number['shirt_zie'],
                ]);
                $nickname->save();

                $register = $nickname->register;
            }
        }


        $racerClassBs = [
            // b-max class b
            [
                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('mohammad rozaini bin hamid'),
                'identification_card_number' => '940908105401',
                'phone_number' => '+60176843935',
                'email' => 'rozainibinhamid1994@gmail.com',
                'nickname' => strtoupper('ROZAI'),
                'team_group' => 'ARPJ',
                'registration' => 1,
                'receipt' => $folder . '8989447639.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ROZAI'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                ]
            ],
            [
                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Mohd amir bin abu bakar'),
                'identification_card_number' => '890213145375',
                'phone_number' => '+60122286163',
                'email' => 'amirburn1989@gmail.com',
                'nickname' => strtoupper('AMIRBUR'),
                'team_group' => 'TAMIYA LONGKANG (TL)',
                'registration' => 1,
                'receipt' => $folder . '2425266976.png',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('AMIRBUR'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                ]
            ],
            [
                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 2,
                'full_name' => strtoupper('Mohd Khairul Anuar Bin Zakaria'),
                'identification_card_number' => '860316295539',
                'phone_number' => '+60179122784',
                'email' => 'zizouanuar86@gmail.com',
                'nickname' => strtoupper('NUAR'),
                'team_group' => 'NA',
                'registration' => 2,
                'receipt' => $folder . '4982630673.png',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('NUAR'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('NUAR'),
                        'register' => '',
                        'shirt_zie' => 'xxxxl',
                    ],
                ]
            ],
        ];

        foreach ($racerClassBs as $racer) {
            $uniq = Str::random(4);

            $registered = RacerRegister::where('category', $bmax)->orderBy('id', 'DESC')->first();
            if ($registered) {
                $lastNumberRegister = $registered->numberRegister->last();
                if ($lastNumberRegister) {
                    $register = $lastNumberRegister->register;
                }
            } else {
                $register = 0; // Start from 0 if no previous records found
            }

            $newRacer = new RacerRegister();
            $newRacer->fill([
                'uniq'                      => $uniq,
                'category'                  => $racer['category'],
                'price_category'            => $racer['price_category'],
                'total_cost'                => $racer['total_cost'],
                'full_name'                 => $racer['full_name'],
                'identification_card_number' => $racer['identification_card_number'],
                'phone_number'              => $racer['phone_number'],
                'email'                     => $racer['email'],
                'nickname'                  => $racer['nickname'],
                'team_group'                => $racer['team_group'],
                'registration'              => $racer['registration'],
                'receipt'                   => $racer['receipt'],
                'approval'                  => $racer['approval'],
            ]);
            $newRacer->save();

            foreach ($racer['runNum'] as $number) {
                $nickname = new RacerNickNameRegister();
                $nickname->fill([
                    'category'  => $newRacer->category,
                    'racer_id'  => $newRacer->id,
                    'uniq'      => $newRacer->uniq,
                    'nickname'  => $newRacer->nickname,
                    'register'  => $register + 1,
                    'shirt_zie' => $number['shirt_zie'],
                ]);
                $nickname->save();

                $register = $nickname->register;
            }
        }

    }
}
