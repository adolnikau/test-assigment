<?php

namespace tests;

use app\components;
use app\components\platforms\Gitlab;

/**
 * FactoryTest contains test casess for factory component
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class FactoryTest extends \Codeception\Test\Unit
{
    // - low coverage
    /**
     * Test case for creating platform component
     * 
     * IMPORTANT NOTE:
     * Should cover succeeded and failed suites
     *
     * @return void
     */
    public function testCreate()
    {
        $actualPlatform = \Yii::$app->factory->create('gitlab');
        $this->assertTrue($actualPlatform instanceof Gitlab);
    }
}