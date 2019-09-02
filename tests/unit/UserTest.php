<?php

namespace tests;

use app\models;

/**
 * UserTest contains test casess for user model
 *
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class UserTest extends \Codeception\Test\Unit
{
    /**
     * Test case for adding repo models to user model
     *
     * IMPORTANT NOTE:
     * Should cover succeeded and failed suites
     *
     * @return void
     */
    public function testAddingRepos()
    {
        $user = new models\User('testname', 'testname', 'github');
        $githubRepo = new models\GithubRepo('test', 2, 3, 4);
        $user->addRepos([$githubRepo]);

        $expected = [
            'name' => 'test',
            'fork-count' => 2,
            'start-count' => 3,
            'watcher-count' => 4,
            'rating' => 3.1666666666667
        ];
        $this->assertTrue(!array_diff($user->getData()['repo'][0], $expected), 'user has adding repos');
    }

    /**
     * Test case for counting total user rating
     *
     * @return void
     */
    public function testTotalRatingCount()
    {
        $user = new models\User('testname', 'testname', 'github');
        $githubRepo = new models\GithubRepo('test', 2, 3, 4);
        $gitlabRepo = new models\GitlabRepo('test2', 2, 7);
        $user->addRepos([$githubRepo, $gitlabRepo]);
        $actual = $user->getTotalRating();
        $expected = 6.9166666666667;
        $this->assertEquals($expected, $actual, 'total rating is right');
    }

    /**
     * Test case for user model data serialization
     *
     * @return void
     */
    public function testData()
    {
        $user = new models\User('testname', 'testname', 'github');
        $actual = $user->getData();
        $expected = [
            'name' => 'testname',
            'platform' => 'github',
            'total-rating' => 0,
            'repos' => []
        ];
        $this->assertTrue(!array_diff($expected, $actual), 'user has expected data');
    }

    /**
     * Test case for user model __toString verification
     *
     * @return void
     */
    public function testStringify()
    {
        /**
         * @todo IMPLEMENT THIS
         */
    }
}