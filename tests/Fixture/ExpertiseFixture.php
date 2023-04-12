<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExpertiseFixture
 */
class ExpertiseFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'expertise';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'expertise_title' => 'c3050df9-d763-47fd-83e1-d3ed71c7ca5d',
                'expertise_desc' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
