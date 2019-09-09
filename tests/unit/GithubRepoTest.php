<?php

namespace tests;

use app\models;

/**
 * GithubRepoTest contains test casess for github repo model
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class GithubRepoTest extends \Codeception\Test\Unit
{
    // +
    /**
     * Test case for counting repo rating
     *
     * @return void
     */
    public function testRatingCount()
    {
        $githubRepo = new models\GithubRepo('test', 2,3,4);
        $actualResult = $githubRepo->getRating();
        $this->assertEquals(3.1666666666667, $actualResult);
    }

    // +
    /**
     * Test case for repo model data serialization
     *
     * @return void
     */
    public function testData()
    {
        $githubRepo = new models\GithubRepo('test', 2,3,4);
        $actualResult = $githubRepo->getData();
        $expectedResult = [
            'name' => 'test',
            'fork-count' => 2,
            'start-count' => 3,
            'watcher-count' => 4,
            'rating' => 3.1666666666667
        ];
        $this->assertTrue(!array_diff($actualResult, $expectedResult), 'data are equals');
    }

    // +
    /**
     * Test case for repo model __toString verification
     *
     * @return void
     */
    public function testStringify()
    {
        $githubRepo = new models\GithubRepo('test', 2,3,4);
        $expected = sprintf(
            "%-75s %4d ⇅ %4d ★ %4d 👁️",
            'test',
            2,
            3,
            4
        );
        $this->assertEquals($expected, (string)$githubRepo); //XD test testing )
    }
}