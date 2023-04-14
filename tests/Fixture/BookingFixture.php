<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingFixture
 */
class BookingFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'booking';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'booking_id' => 1,
                'booking_date' => '2023-04-14',
                'booking_time' => '04:38:30',
                'cust_id' => 1,
                'staff_id' => 1,
                'service_id' => 1,
            ],
        ];
        parent::init();
    }
}
