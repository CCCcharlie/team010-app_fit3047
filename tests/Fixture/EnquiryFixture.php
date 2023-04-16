<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnquiryFixture
 */
class EnquiryFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'enquiry';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'Name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'Email' => 'Lorem ipsum dolor sit amet',
                'Phone' => 1,
                'Message' => 'Lorem ipsum dolor sit amet',
                'enquiry_id' => 1,
            ],
        ];
        parent::init();
    }
}
