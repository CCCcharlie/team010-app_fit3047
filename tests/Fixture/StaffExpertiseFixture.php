<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffExpertiseFixture
 */
class StaffExpertiseFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'staff_expertise';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'staff_exp_id' => 1,
                'staff_id' => 1,
                'expertise_title' => 'Lorem ipsum dolor sit amet',
                'staffexpert_date_completed' => '2023-04-14',
            ],
        ];
        parent::init();
    }
}
