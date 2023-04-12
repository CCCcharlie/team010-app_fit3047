<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffFixture
 */
class StaffFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'staff';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'staff_id' => 1,
                'staff_fname' => 'Lorem ipsum dolor sit amet',
                'staff_lname' => 'Lorem ipsum dolor sit amet',
                'staff_position' => 'Lorem ipsum dolor ',
                'staff_email' => 'Lorem ipsum dolor sit amet',
                'staff_password' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
