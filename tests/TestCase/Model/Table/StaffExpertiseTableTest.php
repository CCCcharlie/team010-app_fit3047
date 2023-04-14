<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffExpertiseTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffExpertiseTable Test Case
 */
class StaffExpertiseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffExpertiseTable
     */
    protected $StaffExpertise;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.StaffExpertise',
        'app.Staff',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StaffExpertise') ? [] : ['className' => StaffExpertiseTable::class];
        $this->StaffExpertise = $this->getTableLocator()->get('StaffExpertise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StaffExpertise);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StaffExpertiseTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StaffExpertiseTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
