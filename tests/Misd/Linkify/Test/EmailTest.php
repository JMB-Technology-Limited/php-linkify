<?php

/*
 * This file is part of the Linkify library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Linkify\Test;

/**
 * Email address test.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class EmailTest extends LinkifyTest
{
    /**
     * Convert email addresses into links test.
     *
     * @test
     */
    public function makeEmailLinks()
    {
        foreach ($this->emailTests as $test) {
            $this->assertEquals($test->expected, $this->linkify->processEmails($test->test));
        }
    }

    /**
     * Avoid turning URLs into links test.
     *
     * @test
     */
    public function avoidUrlLinks()
    {
        foreach ($this->urlTests as $test) {
            $this->assertEquals($test->test, $this->linkify->processEmails($test->test));
        }
    }

    /**
     * Avoid turning non-email addresses into links.
     *
     * @test
     */
    public function avoidLinks()
    {
        foreach ($this->ignoreTests as $test) {
            $this->assertEquals($test, $this->linkify->processEmails($test));
        }
    }
}