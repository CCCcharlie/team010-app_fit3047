<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentFixture
 */
class PaymentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'payment';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'payment_no' => 1,
                'booking_id' => 1,
                'payment_amount' => 1,
                'payment_date' => '2023-04-14',
            ],
        ];
        parent::init();
    }
}
