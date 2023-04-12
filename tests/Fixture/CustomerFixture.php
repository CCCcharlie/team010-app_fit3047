<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomerFixture
 */
class CustomerFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'customer';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'cust_id' => 1,
                'cust_fname' => 'Lorem ipsum dolor sit amet',
                'cust_lname' => 'Lorem ipsum dolor sit amet',
                'cust_phone' => 1,
                'cust_startdate' => '2023-04-11',
                'cust_email' => 'Lorem ipsum dolor sit amet',
                'cust_password' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
