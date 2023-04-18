<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContentBlocksFixture
 */
class ContentBlocksFixture extends TestFixture
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
                'id' => 1,
                'hint' => 'Lorem ipsum dolor sit amet',
                'content_type' => 'Lorem ip',
                'content_value' => 'Lorem ipsum dolor sit amet',
                'previous_value' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
