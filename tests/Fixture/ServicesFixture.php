<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServicesFixture
 */
class ServicesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'service_id' => 1,
                'service_name' => 'Lorem ipsum dolor sit amet',
                'service_duration' => '2023-04-11',
                'service_desc' => 'Lorem ipsum dolor sit amet',
                'service_price' => 1.5,
            ],
        ];
        parent::init();
    }
}
