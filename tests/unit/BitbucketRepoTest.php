<?php

namespace tests;

use app\models;

/**
 * BitbucketRepoTest contains test casess for bitbucket repo model
 *
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class BitbucketRepoTest extends \Codeception\Test\Unit
{
    /**
     * Test case for counting repo rating
     *
     * @return void
     */
    public function testRatingCount()
    {
        $bitbucketRepo = new models\BitbucketRepo('test', 2, 3);
        $actualResult = $bitbucketRepo->getRating();
        $this->assertEquals(3.5, $actualResult);
    }

    /**
     * Test case for repo model data serialization
     *
     * @return void
     */
    public function testData()
    {
        $bitbucketRepo = new models\BitbucketRepo('test', 2, 3);
        $actualResult = $bitbucketRepo->getData();
        $expectedResult = [
            'name' => 'test',
            'fork-count' => 2,
            'watcher-count' => 3,
            'start-count' => $this->startCount,
            'rating' => 3.5
        ];
        $this->assertTrue(!array_diff($actualResult, $expectedResult), 'data are equals');
    }

    /**
     * Test case for repo model __toString verification
     *
     * @return void
     */
    public function testStringify()
    {
        $bitbucketRepo = new models\BitbucketRepo('test', 2, 3);

        $expected = sprintf(
            "%-75s %4d ⇅ %6s %4d 👁️",
            'test',
            2,
            "",
            3);
        $this->assertEquals($expected, (string)$bitbucketRepo); //XD test testing )
    }
}