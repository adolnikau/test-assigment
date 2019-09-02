<?php

namespace tests;

use app\models;

/**
 * GitlabRepoTest contains test casess for gitlab repo model
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class GitlabRepoTest extends \Codeception\Test\Unit
{
    /**
     * Test case for counting repo rating
     *
     * @return void
     */
    public function testRatingCount()
    {
        $gitlabRepo = new models\GitlabRepo('test',2,7);
        $actualResult = $gitlabRepo->getRating();
        $this->assertEquals(3.75, $actualResult);
    }

    /**
     * Test case for repo model data serialization
     *
     * @return void
     */
    public function testData()
    {
        $gitlabRepo = new models\GitlabRepo('test',2,7);
        $actualResult = $gitlabRepo->getData();
        $expectedResult = [
            'name' => 'test',
            'fork-count' => 2,
            'start-count' => 7,
            'rating' => 3.75
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
        $gitlabRepo = new models\GitlabRepo('test',2,7);
        $expected = sprintf(
            "%-75s %4d ⇅ %4d ★",
            'test',
            2,
            7
        );
        $this->assertEquals($expected, (string)$gitlabRepo); //XD test testing )
    }
}