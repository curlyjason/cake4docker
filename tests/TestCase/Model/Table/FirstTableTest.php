<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FirstTable;
use App\Test\Factory\FirstFactory;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FirstTable Test Case
 */
class FirstTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FirstTable
     */
    protected $First;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.First',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('First') ? [] : ['className' => FirstTable::class];
        $this->First = $this->getTableLocator()->get('First', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->First);

        parent::tearDown();
    }

    public function testIdExists() {
        FirstFactory::make()->persist();
    }
}
