<?php

namespace tests;

use app\components;
use app\components\platforms\Github;
use app\models\User;

/**
 * SearcherTest contains test casess for searcher component
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class SearcherTest extends \Codeception\Test\Unit
{
    /**
     * Test case for searching via several platforms
     * 
     * IMPORTANT NOTE:
     * Should cover succeeded and failed suites
     *
     * @return void
     */

    // -
    // Idiomatically unit test shouldn't use any external resources e.g.: disk, net, etc.
    // External dependency should be mocked with test data
    public function testSearcher()
    {
        $users = ['kfr', 'frog'];
        $mplatforms = [new Github([])];
        $users = \Yii::$app->searcher->search($mplatforms, $users);

        foreach ($users as $user){
            $this->assertTrue($user instanceof User);
        }
    }

    // +
    public function testSearcherWithEmptyUsers()
    {
        $users = [];
        $mplatforms = [new Github([])];
        $users = \Yii::$app->searcher->search($mplatforms, $users);
        $this->assertTrue(empty($users));
    }
}