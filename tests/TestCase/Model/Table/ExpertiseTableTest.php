<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExpertiseTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExpertiseTable Test Case
 */
class ExpertiseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExpertiseTable
     */
    protected $Expertise;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Expertise',
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
        $config = $this->getTableLocator()->exists('Expertise') ? [] : ['className' => ExpertiseTable::class];
        $this->Expertise = $this->getTableLocator()->get('Expertise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Expertise);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExpertiseTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
