<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);
//    	 Eloquent::unguard();
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('contacts')->insert([ //,
                'name' => $faker->name,
                'address' => $faker->address,
                'company' => $faker->company,
                'phone' => $faker->randomNumber(8),
                'email' => $faker->email,
                'dob' => $faker->dateTimeThisCentury,
                'user_id' => 1
            ]);
        }


        DB::table('users')->insert([ //,
            'name' => "Abdul Mobeen",
            'email' => "mobeendev@gmail.com",
            'password' => bcrypt("abc123"),
        ]);

//    	$this->call('UserTableSeeder');
    }

}
