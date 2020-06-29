<?php

use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\User::create([
           'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
           'username' => 'willieY',
           'avatar' => 'f554a707835318d3608626fdf05d8805.jpg',
           'address' => 'jln tukad citarum f1 no 81',
           'gender' => 'Laki-laki',
           'phone' => '0895413450905',
           'dob' => '2020-02-19',
           'super_admin' => 1,
           'email' => 'yudha@gmail.com',
           'password' => bcrypt('bangsatdancuk'),
       ]);

       App\User::create([
        'full_name' => 'SuperA',
        'avatar' => 'f554a707835318d3608626fdf05d8805.jpg',
        'address' => 'jln serba super',
        'gender' => 'Laki-laki',
        'phone' => '081111110982',
        'dob' => '2020-02-19',
        'super_admin' => 1,
        'email' => 'superadmin@gmail.com',
        'password' => bcrypt('superadmin2020'),
        ]);

        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY1',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha15@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);

        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY2',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha1@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);


        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY3',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha2@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);



        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY4',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha3@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);



        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY5',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha4@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);




        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY6',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha5@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);




        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY7',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha6@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);




        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY8',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha7@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);



        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY9',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha8@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);



        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY10',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha9@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);



        // App\User::create([
        //     'full_name' => 'Putu Bagus Willie Yudha Maheswara' ,
        //     'username' => 'willieY11',
        //     'avatar' => '556026547.intanlatarmerah.jpg',
        //     'address' => 'jln tukad citarum f1 no 81',
        //     'gender' => 'Laki-laki',
        //     'phone' => '0895413450905',
        //     'dob' => '2020-02-19',
        //     'super_admin' => 0,
        //     'email' => 'yudha10@gmail.com',
        //     'password' => bcrypt('bangsatdancuk'),
        // ]);


    }

}
