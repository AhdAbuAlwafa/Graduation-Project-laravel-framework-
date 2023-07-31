<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            [
// 103
                'fname' => 'جمال',
                'lname' => 'عطاطرة',
                'number' => 1,
                'image' =>'',
                'description'=> 'أعمل في تقليم الأشجار فيه الحدائق ،
                 قمت بالعمل من قبل فيه عدة حدائق عاملة في كل من نابلس ورام الله ،
                  ولدي خبرة كبيرة في تقليم وتشكيل أشجار السرو . ',
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('1')

            ],
            // 104
            [
                'fname' => 'أحمد',
                'lname' => 'القاسم',
                'number' => 2,
                'image' =>'',
                'description'=> 'أعمل في تقليم الأشجار فيه الحدائق ،
                قمت بالعمل من قبل فيه عدة حدائق عاملة في كل من نابلس ورام الله ،
                 ولدي خبرة كبيرة في تقليم وتشكيل أشجار السرو . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('2')
            ],
            // 105
            [
                'fname' => 'حسني',
                'lname' => 'صوافطة',
                'number' => 3,
                'image' =>'',
                'description'=> 'أعمل في الدهان ،
                 قمت بالعمل من قبل فيه عدة فيلات في كل من نابلس ورام الله ،
                 ولدي خبرة كبيرة في استخدام آالة رش الدهان . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('3')
            ],
            // 106
            [
                'fname' => 'عدنان',
                'lname' => 'قبها',
                'number' => 4,
                'image' =>'',
                'description'=>'أعمل في الدهان ،
                قمت بالعمل من قبل فيه عدة فيلات في كل من نابلس ورام الله ،
                ولدي خبرة كبيرة في استخدام آالة رش الدهان . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('4')
            ],
                        // 107

            [
                'fname' => 'محمود',
                'lname' => 'قبها',
                'number' => 5,
                'image' =>'',
                'description'=> 'أعمل في الدهان ،
                قمت بالعمل من قبل فيه عدة فيلات في كل من نابلس ورام الله ،
                ولدي خبرة كبيرة في استخدام آالة رش الدهان . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('5')
            ], [
                'fname' => 'عدنان',
                'lname' => 'محمود',
                'number' => 6,
                'image' =>'',
                'description'=> 'أعمل في الدهان ،
                قمت بالعمل من قبل فيه عدة فيلات في كل من نابلس ورام الله ،
                ولدي خبرة كبيرة في استخدام آالة رش الدهان . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('6')
            ],
            // 109
            [
                'fname' => 'عبد الرحمن',
                'lname' => 'ابو الرب',
                'number' => 7,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('7')
            ],
            // 108
            [
                'fname' => 'توفيق',
                'lname' => 'عمارنة',
                'number' => 8,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('8')
            ],
            // 111
            [
                'fname' => 'صالح',
                'lname' => 'عمارنة',
                'number' => 9,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('9')
            ],
          
            [
                'fname' => 'محمد',
                'lname' => 'جمال',
                'number' => 10,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('10')
            ],[
                'fname' => 'صالح',
                'lname' => 'مصظفى',
                'number' => 11,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('11')
            ],[
                'fname' => 'مهند',
                'lname' => 'صوافطة',
                'number' => 12,
                'image' =>'',
                'description'=>'أعمل في تقليم الأشجار فيه الحدائق ،
                قمت بالعمل من قبل فيه عدة حدائق عاملة في كل من نابلس ورام الله ،
                 ولدي خبرة كبيرة في تقليم وتشكيل أشجار السرو . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('12')
            ],
            // 115
            [
                'fname' => 'شكري',
                'lname' => 'مهند',
                'number' => 13,
                'image' =>'',
                'description'=>'أعمل في تقليم الأشجار فيه الحدائق ،
                قمت بالعمل من قبل فيه عدة حدائق عاملة في كل من نابلس ورام الله ،
                 ولدي خبرة كبيرة في تقليم وتشكيل أشجار السرو . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('13')
            ],[
                'fname' => 'كامل',
                'lname' => 'شكري',
                'number' => 14,
                'image' =>'',
                'description'=>'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('14')
            ],[
                'fname' => 'خليل',
                'lname' => 'جمال',
                'number' => 15,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('15')
            ],
            // 118
            [
                'fname' => 'توفيق',
                'lname' => 'صالح',
                'number' => 16,
                'image' =>'',
                'description'=> 'أعمل في تقليم الأشجار ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('16')
            ],[
                'fname' => 'جمال',
                'lname' => 'قبها',
                'number' => 17,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('17')
            ],
                        // 120
            [
                'fname' => 'صالح',
                'lname' => 'عطاري',
                'number' => 18,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('18')
            ],[
                'fname' => 'خليل',
                'lname' => 'حمد',
                'number' => 19,
                'image' =>'',
                'description'=> 'أعمل في تقليم الأشجار فيه الحدائق ،
                قمت بالعمل من قبل فيه عدة حدائق عاملة في كل من نابلس ورام الله ،
                 ولدي خبرة كبيرة في تقليم وتشكيل أشجار السرو . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('19')
            ],[
                'fname' => 'ادهم',
                'lname' => 'شكري',
                'number' => 20,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('20')
            ],
                        // 123

            [
                'fname' => 'خالد',
                'lname' => 'ملحم',
                'number' => 21,
                'image' =>'',
                'description'=> 'أعمل في تقليم الأشجار ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('21')
            ],
            // 24
            [
                'fname' => 'مهند',
                'lname' => 'خالد',
                'number' => 22,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('22')
            ],[
                'fname' => 'سعيد',
                'lname' => 'مهند',
                'number' => 23,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('23')
            ],[
                'fname' => 'صالح',
                'lname' => 'عطاطرة',
                'number' => 24,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('24')
            ],[
                'fname' => 'جمال',
                'lname' => 'محمد',
                'number' => 25,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('25')
            ],
            
            // 28
            [
                'fname' => 'لؤى',
                'lname' => 'جمال',
                'number' => 26,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('26')
            ],[
                'fname' => 'محسن',
                'lname' => 'اسعد',
                'number' => 27,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('27')
            ],[
                'fname' => 'شكري',
                'lname' => 'أبو الرب',
                'number' => 28,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('28')
            ],
            // 31
            [
                'fname' => 'صالح',
                'lname' => 'سعيد',
                'number' => 29,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('29')
            ],[
                'fname' => 'محمد',
                'lname' => 'صبري',
                'number' => 30,
                'image' =>'',
                'description'=> 'أعمل في تقليم الاشجار ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('30')
            ],
            // 33
            [
                'fname' => 'محمد',
                'lname' => 'الخليلي',
                'number' => 31,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('31')
            ],[
                'fname' => 'احمد',
                'lname' => 'محسن',
                'number' => 32,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('32')
            ],[
                'fname' => 'سعيد',
                'lname' => 'ابو الرب',
                'number' => 33,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('33')
            ],
            // 36
            [
                'fname' => 'أسعد',
                'lname' => 'محمد',
                'number' => 34,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('34')
            ],[
                'fname' => 'جهاد',
                'lname' => 'شكري',
                'number' => 35,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('35')
            ],
            // 8
            [
                'fname' => 'توفيق',
                'lname' => 'صبري',
                'number' => 36,
                'image' =>'',
                'description'=> 'أعمل في تقليم الاشجار ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('36')
            ],[
                'fname' => 'احمد',
                'lname' => 'شكري',
                'number' => 37,
                'image' =>'',
                'description'=> 'أعمل في الدهان ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 49, 
                'password' => Hash::make('37')
            ],
            // 40
            [
                'fname' => 'محمد',
                'lname' => 'قبها',
                'number' => 38,
                'image' =>'',
                'description'=> 'أعمل في تقليم الأشجار ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 2, 
                'password' => Hash::make('38')
            ],[
                'fname' => 'صالح',
                'lname' => 'عزالدين',
                'number' => 39,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 48, 
                'password' => Hash::make('39')
            ],[
                'fname' => 'لؤي',
                'lname' => 'محسن',
                'number' => 40,
                'image' =>'',
                'description'=> 'أعمل في السباكة ، وأقوم بتوفير عمل متقن للغاية . ',
                
                
                'gender'=> 0,
                'is_worker'=> 1,
                
                'address_id'=> 1, 
                'password' => Hash::make('40')
            ],
        ]);
    }
}