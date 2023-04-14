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
                'service_duration' => '04:55:10',
                'service_desc' => 'Lorem ipsum dolor sit amet',
                'service_price' => 1.5,
                'image_name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
