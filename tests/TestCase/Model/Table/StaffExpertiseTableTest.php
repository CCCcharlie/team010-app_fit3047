<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffexpertiseTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffexpertiseTable Test Case
 */
class StaffexpertiseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffexpertiseTable
     */
    protected $Staffexpertise;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Staffexpertise',
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
        $config = $this->getTableLocator()->exists('Staffexpertise') ? [] : ['className' => StaffexpertiseTable::class];
        $this->Staffexpertise = $this->getTableLocator()->get('Staffexpertise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Staffexpertise);

        parent::tearDown();
    }
}
