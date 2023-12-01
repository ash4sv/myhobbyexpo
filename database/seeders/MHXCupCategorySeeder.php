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

        // type of payment
        //case 1: // Direct Pay
        //paymentType = 'Direct',
        //case 2: // BillPlz
        //paymentType = 'BillPlz',
        //case 3: // Cash
        //paymentType = 'Cash',
        //case 4: // Cash
        //paymentType = 'FoC',
        //default:
        //paymentType = 'Unknown',

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
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Zaim'),
                'identification_card_number' => '851128036463',
                'phone_number' => '+60139178888',
                'email' => 'boboy6666@gmail.com',
                'nickname' => strtoupper('ZAIM'),
                'team_group' => 'NA',
                'registration' => 1,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 1,
                'payment_status' => 0,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('ZAIM'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                ],
            ],
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 2,
                'full_name' => strtoupper('Mohd rafizi'),
                'identification_card_number' => '841128145417',
                'phone_number' => '+60194199244',
                'email' => 'mohdrafizi20@gmail.com',
                'nickname' => strtoupper('shinchan'),
                'team_group' => strtoupper('shinchan'),
                'registration' => 2,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 4,
                'payment_status' => 1,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('shinchan'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('shinchan'),
                        'register' => '',
                        'shirt_zie' => '',
                    ],
                ],
            ],
            [
                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Haziq Syafiq'),
                'identification_card_number' => '950511045577',
                'phone_number' => '+60147169167',
                'email' => 'aziq945@gmail.com',
                'nickname' => strtoupper('Ella'),
                'team_group' => strtoupper('Ella'),
                'registration' => 1,
                'receipt' => '',
                'approval' => false,
                'payment_type' => 4,
                'payment_status' => 1,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Ella'),
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


//        $racerClassBs = [
//            // b-max class b
//            [
//                'category' => $bmax,
//                'price_category' => $priceBmax,
//                'total_cost' => $priceBmax * 1,
//                'full_name' => strtoupper('Lilik Haryanto'),
//                'identification_card_number' => 'C8198297',
//                'phone_number' => '+65 9739 3399',
//                'email' => ' ngebutbenjut.m4wd@gmail.com',
//                'nickname' => strtoupper('Avante'),
//                'team_group' => 'Avante',
//                'registration' => 1,
//                'receipt' => '',
//                'approval' => false,
//                'payment_type' => 3,
//                'payment_status' => 0,
//                'runNum' => [
//                    [
//                        'category' => $bmax,
//                        'racer_id' => '',
//                        'uniq' => '',
//                        'nickname' => strtoupper('Avante'),
//                        'register' => '',
//                        'shirt_zie' => '',
//                    ],
//                ]
//            ],
//            [
//                'category' => $bmax,
//                'price_category' => $priceBmax,
//                'total_cost' => $priceBmax * 1,
//                'full_name' => strtoupper('Aniq Zulfadhli Bin Norizal'),
//                'identification_card_number' => '150831140359',
//                'phone_number' => '+60172303362',
//                'email' => ' jumaliah@hotmail.com',
//                'nickname' => strtoupper('Aniq'),
//                'team_group' => 'Aniq',
//                'registration' => 1,
//                'receipt' => '',
//                'approval' => false,
//                'payment_type' => 4,
//                'payment_status' => 1,
//                'runNum' => [
//                    [
//                        'category' => $bmax,
//                        'racer_id' => '',
//                        'uniq' => '',
//                        'nickname' => strtoupper('Aniq'),
//                        'register' => '',
//                        'shirt_zie' => '',
//                    ],
//                ]
//            ],
//            [
//                'category' => $bmax,
//                'price_category' => $priceBmax,
//                'total_cost' => $priceBmax * 1,
//                'full_name' => strtoupper('Putra Indra'),
//                'identification_card_number' => '940429106271',
//                'phone_number' => '+60182572429',
//                'email' => ' ucophassan@gmail.com',
//                'nickname' => strtoupper('Pakdik'),
//                'team_group' => 'Pakdik',
//                'registration' => 1,
//                'receipt' => '',
//                'approval' => false,
//                'payment_type' => 4,
//                'payment_status' => 1,
//                'runNum' => [
//                    [
//                        'category' => $bmax,
//                        'racer_id' => '',
//                        'uniq' => '',
//                        'nickname' => strtoupper('Pakdik'),
//                        'register' => '',
//                        'shirt_zie' => '',
//                    ],
//                ]
//            ],
//        ];
//
//        foreach ($racerClassBs as $racer) {
//            $uniq = Str::random(4);
//
//            $registered = RacerRegister::where('category', $bmax)->orderBy('id', 'DESC')->first();
//            if ($registered) {
//                $lastNumberRegister = $registered->numberRegister->last();
//                if ($lastNumberRegister) {
//                    $register = $lastNumberRegister->register;
//                }
//            } else {
//                $register = 0; // Start from 0 if no previous records found
//            }
//
//            $newRacer = new RacerRegister();
//            $newRacer->fill([
//                'uniq'                      => $uniq,
//                'category'                  => $racer['category'],
//                'price_category'            => $racer['price_category'],
//                'total_cost'                => $racer['total_cost'],
//                'full_name'                 => $racer['full_name'],
//                'identification_card_number' => $racer['identification_card_number'],
//                'phone_number'              => $racer['phone_number'],
//                'email'                     => $racer['email'],
//                'nickname'                  => $racer['nickname'],
//                'team_group'                => $racer['team_group'],
//                'registration'              => $racer['registration'],
//                'receipt'                   => $racer['receipt'],
//                'approval'                  => $racer['approval'],
//                'payment_type'              => $racer['payment_type'],
//                'payment_status'            => $racer['payment_status'],
//            ]);
//            $newRacer->save();
//
//            foreach ($racer['runNum'] as $number) {
//                $nickname = new RacerNickNameRegister();
//                $nickname->fill([
//                    'category'  => $newRacer->category,
//                    'racer_id'  => $newRacer->id,
//                    'uniq'      => $newRacer->uniq,
//                    'nickname'  => $newRacer->nickname,
//                    'register'  => $register + 1,
//                    'shirt_zie' => $number['shirt_zie'],
//                ]);
//                $nickname->save();
//
//                $register = $nickname->register;
//            }
//        }
//
//
//        $racerClassC = [
//            // stock car class c
//            [
//                'category' => $stockcar,
//                'price_category' => $priceStockcar,
//                'total_cost' => $priceStockcar * 3,
//                'full_name' => strtoupper('muhamad hanif othman'),
//                'identification_card_number' => '990912566719',
//                'phone_number' => '+60172527455',
//                'email' => 'anop.othman88@gmail.com',
//                'nickname' => strtoupper('Team H'),
//                'team_group' => 'Team H',
//                'registration' => 2,
//                'receipt' => '',
//                'approval' => false,
//                'payment_type' => 1,
//                'payment_status' => 1,
//                'runNum' => [
//                    [
//                        'category' => $stockcar,
//                        'racer_id' => '',
//                        'uniq' => '',
//                        'nickname' => strtoupper('Team H'),
//                        'register' => '',
//                        'shirt_zie' => '',
//                    ],
//                    [
//                        'category' => $stockcar,
//                        'racer_id' => '',
//                        'uniq' => '',
//                        'nickname' => strtoupper('Team H'),
//                        'register' => '',
//                        'shirt_zie' => '',
//                    ],
//                ]
//            ]
//        ];
//
//        foreach ($racerClassC as $racer) {
//            $uniq = Str::random(4);
//
//            $registered = RacerRegister::where('category', $stockcar)->orderBy('id', 'DESC')->first();
//            if ($registered) {
//                $lastNumberRegister = $registered->numberRegister->last();
//                if ($lastNumberRegister) {
//                    $register = $lastNumberRegister->register;
//                }
//            } else {
//                $register = 0; // Start from 0 if no previous records found
//            }
//
//            $newRacer = new RacerRegister();
//            $newRacer->fill([
//                'uniq'                      => $uniq,
//                'category'                  => $racer['category'],
//                'price_category'            => $racer['price_category'],
//                'total_cost'                => $racer['total_cost'],
//                'full_name'                 => $racer['full_name'],
//                'identification_card_number' => $racer['identification_card_number'],
//                'phone_number'              => $racer['phone_number'],
//                'email'                     => $racer['email'],
//                'nickname'                  => $racer['nickname'],
//                'team_group'                => $racer['team_group'],
//                'registration'              => $racer['registration'],
//                'receipt'                   => $racer['receipt'],
//                'approval'                  => $racer['approval'],
//                'payment_type'              => $racer['payment_type'],
//                'payment_status'            => $racer['payment_status'],
//            ]);
//            $newRacer->save();
//
//            foreach ($racer['runNum'] as $number) {
//                $nickname = new RacerNickNameRegister();
//                $nickname->fill([
//                    'category'  => $newRacer->category,
//                    'racer_id'  => $newRacer->id,
//                    'uniq'      => $newRacer->uniq,
//                    'nickname'  => $newRacer->nickname,
//                    'register'  => $register + 1,
//                    'shirt_zie' => $number['shirt_zie'],
//                ]);
//                $nickname->save();
//
//                $register = $nickname->register;
//            }
//        }

    }
}
