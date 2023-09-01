<?php
declare(strict_types=1);

namespace App\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use Faker\Generator;
use CakephpTestSuiteLight\Fixture\TruncateDirtyTables;

/**
 * FirstFactory
 *
 * @method \App\Model\Entity\First getEntity()
 * @method \App\Model\Entity\First[] getEntities()
 * @method \App\Model\Entity\First|\App\Model\Entity\First[] persist()
 * @method static \App\Model\Entity\First get(mixed $primaryKey, array $options = [])
 */
class FirstFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'First';
    }

    /**
     * Defines the factory's default values. This is useful for
     * not nullable fields. You may use methods of the present factory here too.
     *
     * @return void
     */
    protected function setDefaultTemplate(): void
    {
        $this->setDefaultData(function (Generator $faker) {
            return [
                // set the model's default values
                // For example:
                // 'name' => $faker->lastName
            ];
        });
    }
}
