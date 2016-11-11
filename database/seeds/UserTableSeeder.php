<?php

use database\seeds\BaseSeeder;
use TeachMe\Entities\User;
use Faker\Generator;

class UserTableSeeder extends BaseSeeder
{

    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret')
        ];
    }

    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(50);
    }

    private function createAdmin()
    {
        $this->create([
            'name' => 'Alejandro Seisdedos',
            'email' => 'alejandro.seisdedos@gft.com',
            'password' => bcrypt('admin')
        ]);
    }

}
