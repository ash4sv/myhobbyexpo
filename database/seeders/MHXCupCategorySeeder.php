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
                'full_name' => strtoupper('Ivan Astariyanto Putra'),
                'identification_card_number' => 'B2245373',
                'phone_number' => '+6281290698009',
                'email' => 'ivanastariyantop13@gmail.com',
                'nickname' => strtoupper('Ivan'),
                'team_group' => 'MELATI R',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Ivan'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ]
                ],
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 2,
                'full_name' => strtoupper('Dharma Yogara'),
                'identification_card_number' => 'c8847768',
                'phone_number' => '+081275715000',
                'email' => 'drdharmayogaraspb@gmail.com',
                'nickname' => strtoupper('Dharma'),
                'team_group' => 'MELATI R',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Dharma'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Dharma'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                ],
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Noor affendy bin ali @ mohd noor'),
                'identification_card_number' => '821219015599',
                'phone_number' => '+60196797677',
                'email' => 'where9848@gmail.com',
                'nickname' => strtoupper('affendy'),
                'team_group' => 'MELATI R',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('affendy'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Lilik Haryanto'),
                'identification_card_number' => 'C8198297',
                'phone_number' => '+6597393399',
                'email' => 'ngebutbenjut.m4wd@gmail.com',
                'nickname' => strtoupper('Robert'),
                'team_group' => 'Avante',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Robert'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Lilik Haryanto'),
                'identification_card_number' => 'C8198297',
                'phone_number' => '+6597393399',
                'email' => 'ngebutbenjut.m4wd@gmail.com',
                'nickname' => strtoupper('Robert'),
                'team_group' => 'Avante',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Robert'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Mohamed zaki Noordin '),
                'identification_card_number' => 'K1330176D',
                'phone_number' => '+6590220067',
                'email' => 'zakinoordin78@gmail.com',
                'nickname' => strtoupper('zaki'),
                'team_group' => 'MZ',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('zaki'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Muhammad Rizal'),
                'identification_card_number' => 'K1649300H',
                'phone_number' => '+6580661527',
                'email' => 'rizalrazaly@gmail.com',
                'nickname' => strtoupper('Rizal'),
                'team_group' => 'ZaK',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Rizal'),
                        'register' => '',
                        'shirt_zie' => 'xxxxl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 3,
                'full_name' => strtoupper('LEE SENG LEONG'),
                'identification_card_number' => '851114085969',
                'phone_number' => '+601158835991',
                'email' => 'leesengleong668@gmail.com',
                'nickname' => strtoupper('LEESENG'),
                'team_group' => 'NA',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('LEESENG'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('LEESENG'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('LEESENG'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Fauzan abdullah'),
                'identification_card_number' => 'X1975499',
                'phone_number' => '+081266181111',
                'email' => 'aan_kojenk@yahoo.com',
                'nickname' => strtoupper('Fauzan'),
                'team_group' => 'TopTip/aan',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Fauzan'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Krishpong Chompudang'),
                'identification_card_number' => 'AC3061802',
                'phone_number' => '+66836161116',
                'email' => 'nuttajibu@gmail.com',
                'nickname' => strtoupper('Krishpong'),
                'team_group' => 'OVERDOSE',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Krishpong'),
                        'register' => '',
                        'shirt_zie' => 'xxxl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 3,
                'full_name' => strtoupper('Nursalam bin abdul rahman'),
                'identification_card_number' => 'K3812612G',
                'phone_number' => '+6596669242',
                'email' => 'nursalamnorimah88@gmail.com',
                'nickname' => strtoupper('Nursalam'),
                'team_group' => 'Southern Brotherhood',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Nursalam'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Nursalam'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Nursalam'),
                        'register' => '',
                        'shirt_zie' => 'xxxxl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Tham Meng Teik'),
                'identification_card_number' => '821011145183',
                'phone_number' => '+60128856114',
                'email' => 'beemtthham1515@gmail.com',
                'nickname' => strtoupper('MR BEE'),
                'team_group' => 'Southern Brotherhood',
                'registration' => '',
                'receipt' => $folder.'1080890469.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('MR BEE'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 7,
                'full_name' => strtoupper('Choo Kah foo'),
                'identification_card_number' => '851107085653',
                'phone_number' => '+0122229544',
                'email' => 'Foo1107@hotmail.com',
                'nickname' => strtoupper('KAH FOO'),
                'team_group' => '360',
                'registration' => '',
                'receipt' => $folder.'5356042283.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Choo Kah foo'),
                'identification_card_number' => '851107085653',
                'phone_number' => '+0122229544',
                'email' => 'Foo1107@hotmail.com',
                'nickname' => strtoupper('KAH FOO'),
                'team_group' => '360',
                'registration' => '',
                'receipt' => $folder.'0666687234.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('KAH FOO'),
                        'register' => '',
                        'shirt_zie' => 'xxxxl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 2,
                'full_name' => strtoupper('Syamil'),
                'identification_card_number' => '930310015947',
                'phone_number' => '+0177292719',
                'email' => 'nurhansyamilsyah@gmail.com',
                'nickname' => strtoupper('BOYJB'),
                'team_group' => 'BHY',
                'registration' => '',
                'receipt' => $folder.'2159237759.jpg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('BOYJB'),
                        'register' => '',
                        'shirt_zie' => 'l',
                    ],
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('BOYJB'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 1,
                'full_name' => strtoupper('Khairul Aswad B Mohd Nudin'),
                'identification_card_number' => '871203026061',
                'phone_number' => '+01111309628',
                'email' => 'banditogoreng@gmail.com',
                'nickname' => strtoupper('Aswad'),
                'team_group' => 'NA',
                'registration' => '',
                'receipt' => $folder.'2790687979.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $semitech,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Aswad'),
                        'register' => '',
                        'shirt_zie' => 's',
                    ],
                ]
            ],
            [

                'category' => $semitech,
                'price_category' => $priceSemitech,
                'total_cost' => $priceSemitech * 2,
                'full_name' => strtoupper('syahir'),
                'identification_card_number' => '870320035333',
                'phone_number' => '+0193654660',
                'email' => 'syahirthani@gmail.com',
                'nickname' => strtoupper('syahir'),
                'team_group' => 'NA',
                'registration' => '',
                'receipt' => $folder.'1483489753.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'shirt_zie' => 'xl',
                    ],
                    [
                        'shirt_zie' => 'xxl',
                    ],
                ]
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
                'full_name' => strtoupper('Ivan Astariyanto Putra'),
                'identification_card_number' => 'B2245373',
                'phone_number' => '+6281290698009',
                'email' => 'ivanastariyantop13@gmail.com',
                'nickname' => strtoupper('Ivan'),
                'team_group' => 'MELATI R',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Ivan'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('hermen satria putra'),
                'identification_card_number' => 'C9537982',
                'phone_number' => '+6282171744417',
                'email' => 'hermensatria@gmail.com',
                'nickname' => strtoupper('hermen'),
                'team_group' => 'TOG',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('hermen'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Salomo sibarani'),
                'identification_card_number' => 'C6504537',
                'phone_number' => '+628126868356',
                'email' => 'salomosibarani@gmail.com',
                'nickname' => strtoupper('Salomo'),
                'team_group' => 'TOG',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Salomo'),
                        'register' => '',
                        'shirt_zie' => 'xl',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 2,
                'full_name' => strtoupper('Dharma Yogara'),
                'identification_card_number' => 'c8847768',
                'phone_number' => '+081275715000',
                'email' => 'drdharmayogaraspb@gmail.com',
                'nickname' => strtoupper('Dharma'),
                'team_group' => 'MELATI R',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Dharma'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Dharma'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Noor affendy bin ali @ mohd noor'),
                'identification_card_number' => '821219015599',
                'phone_number' => '+60196797677',
                'email' => 'where9848@gmail.com',
                'nickname' => strtoupper('affendy'),
                'team_group' => 'MELATI R',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('affendy'),
                        'register' => '',
                        'shirt_zie' => 'x',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Mohamed zaki Noordin '),
                'identification_card_number' => 'K1330176D',
                'phone_number' => '+6590220067',
                'email' => 'zakinoordin78@gmail.com',
                'nickname' => strtoupper('zaki'),
                'team_group' => 'MZ',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('zaki'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Muhammad Rizal'),
                'identification_card_number' => 'K1649300H',
                'phone_number' => '+6580661527',
                'email' => 'rizalrazaly@gmail.com',
                'nickname' => strtoupper('Rizal'),
                'team_group' => 'ZaK',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Rizal'),
                        'register' => '',
                        'shirt_zie' => 'xxxxl',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Fauzan abdullah'),
                'identification_card_number' => 'X1975499',
                'phone_number' => '+081266181111',
                'email' => 'aan_kojenk@yahoo.com',
                'nickname' => strtoupper('Fauzan'),
                'team_group' => 'TopTip/aan',
                'registration' => '',
                'receipt' => '',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Fauzan'),
                        'register' => '',
                        'shirt_zie' => 'xxl',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Mohd Izraruddin Bin Omar'),
                'identification_card_number' => '880628065669',
                'phone_number' => '+60137761613',
                'email' => 'dinomar4573@gmail.com',
                'nickname' => strtoupper('deen'),
                'team_group' => 'Southern Brotherhood',
                'registration' => '',
                'receipt' => $folder.'7060808117.jpg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('deen'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 1,
                'full_name' => strtoupper('Khairul Aswad B Mohd Nudin'),
                'identification_card_number' => '871203026061',
                'phone_number' => '+01111309628',
                'email' => 'banditogoreng@gmail.com',
                'nickname' => strtoupper('Aswad'),
                'team_group' => '',
                'registration' => '',
                'receipt' => $folder.'2790687979.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('Aswad'),
                        'register' => '',
                        'shirt_zie' => 's',
                    ],
                ]
            ],
            [

                'category' => $bmax,
                'price_category' => $priceBmax,
                'total_cost' => $priceBmax * 2,
                'full_name' => strtoupper('syahir'),
                'identification_card_number' => '870320035333',
                'phone_number' => '+0193654660',
                'email' => 'syahirthani@gmail.com',
                'nickname' => strtoupper('syahir'),
                'team_group' => '',
                'registration' => '',
                'receipt' => $folder.'1483489753.jpeg',
                'approval' => false,
                'runNum' => [
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('syahir'),
                        'register' => '',
                        'shirt_zie' => 'm',
                    ],
                    [
                        'category' => $bmax,
                        'racer_id' => '',
                        'uniq' => '',
                        'nickname' => strtoupper('syahir'),
                        'register' => '',
                        'shirt_zie' => 'l',
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
