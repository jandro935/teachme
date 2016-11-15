<?php

use database\seeds\BaseSeeder;
use Faker\Generator;
use TeachMe\Entities\TicketComment;

class TicketCommentsTableSeeder extends BaseSeeder
{
    protected $total = 250;

    public function getModel()
    {
        return new TicketComment();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'comment' => $faker->paragraph(),
            'link' => $faker->randomElement(['', '', $faker->url]),
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id,
        ];
    }
}
