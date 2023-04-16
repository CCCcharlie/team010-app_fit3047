<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnquiryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnquiryTable Test Case
 */
class EnquiryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnquiryTable
     */
    protected $Enquiry;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Enquiry',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Enquiry') ? [] : ['className' => EnquiryTable::class];
        $this->Enquiry = $this->getTableLocator()->get('Enquiry', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Enquiry);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EnquiryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
