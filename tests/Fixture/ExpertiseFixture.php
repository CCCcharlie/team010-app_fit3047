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
                'expertise_title' => 'a16abd05-ab73-4c92-8e69-8fc8790a7641',
                'expertise_desc' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
