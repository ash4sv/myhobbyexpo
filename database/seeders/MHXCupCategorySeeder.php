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
                'total_cost' => $priceSemitech * 3,
                'full_name' => strtoupper('360 Prohobby'),
                'identification_card_number' => '830701045141',
                'phone_number' => '+60165007262',
                'email' => 'samlee6730@gmail.com',
                'nickname' => strtoupper('360'),
                'team_group' => 'Arrc',
                'registration' => 3,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 4,
                'payment_status' => 0,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('360'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('360'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('360'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                ],
            ],
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Muhammad Safwan Bin Mohd Azri (KMALL)'),
                'identification_card_number' => '971013145885',
                'phone_number' => '+601121868085',
                'email' => 'mr.safwan98@yahoo.com',
                'nickname' => strtoupper('Safwan'),
                'team_group' => 'ALK',
                'registration' => 1,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 4,
                'payment_status' => 0,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Safwan'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                ],
            ],
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('MOHAMAD NAZROL BIN NORDIN (KMALL)'),
                'identification_card_number' => '900302065437',
                'phone_number' => '+60179017190',
                'email' => 'mohdnazrol90@gmail.com',
                'nickname' => strtoupper('NAZROL'),
                'team_group' => 'yummy',
                'registration' => 1,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 4,
                'payment_status' => 0,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('NAZROL'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                ],
            ],
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 3,
                'full_name' => strtoupper('DYS HOBBY'),
                'identification_card_number' => '831027145267',
                'phone_number' => '+60172381281',
                'email' => 'season.onlineshop@gmail.com',
                'nickname' => strtoupper('DYSHOBBY'),
                'team_group' => 'YUMMY',
                'registration' => 3,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 4,
                'payment_status' => 0,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('DYSHOBBY'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('DYSHOBBY'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('DYSHOBBY'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                ],
            ],
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Saiful Mizan Bin Mustapha (KMALL)'),
                'identification_card_number' => '830520035075',
                'phone_number' => '+60126969649',
                'email' => 'info.saifulmizan@gmail.com',
                'nickname' => strtoupper('SaifulMizan'),
                'team_group' => 'SD',
                'registration' => 1,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 4,
                'payment_status' => 0,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('SaifulMizan'),
                        'register' => '',
                        'shirt_zie' => '',
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
                'payment_type'              => $racer['payment_type'],
                'payment_status'            => $racer['payment_status'],
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
                'full_name' => strtoupper('MD ZULFADLI BIN AWG HJ KASAH'),
                'identification_card_number' => '00-297474',
                'phone_number' => '+6737302039',
                'email' => 'hamdifatinah@gmail.com',
                'nickname' => strtoupper('ZULFADLI'),
                'team_group' => 'sengat',
                'registration' => 1,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 3,
                'payment_status' => 0,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ZULFADLI'),
                        'register' => '',
                        'shirt_zie' => '',
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
                'payment_type'              => $racer['payment_type'],
                'payment_status'            => $racer['payment_status'],
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


        $racerClassC = [
            // stock car class c
            [
                'category' => $stockcar,
                'price_category' => $priceStockcar,
                'total_cost' => $priceStockcar * 3,
                'full_name' => strtoupper('Terry'),
                'identification_card_number' => '871210145659',
                'phone_number' => '+60173134439',
                'email' => 'alyffd2@gmail.com',
                'nickname' => strtoupper('TERRY'),
                'team_group' => 'Seeker',
                'registration' => 3,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 1,
                'payment_status' => 1,
                'runNum' => [
                    [
                        'category' => $stockcar,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('TERRY'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                    [
                        'category' => $stockcar,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('TERRY'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                    [
                        'category' => $stockcar,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('TERRY'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                ]
            ]
        ];

        foreach ($racerClassC as $racer) {
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
                'payment_type'              => $racer['payment_type'],
                'payment_status'            => $racer['payment_status'],
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
