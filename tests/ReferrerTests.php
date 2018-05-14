<?php

/*
 * This file is part of Referral Spam Detect.
 *
 * (c) Mark Beech <m@rkbee.ch>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use PHPUnit\Framework\TestCase;
use Jaybizzle\ReferralSpamDetect\Fixtures\Crawlers;
use Jaybizzle\ReferralSpamDetect\ReferralSpamDetect;

class UserAgentTest extends TestCase
{
    protected $ReferralSpamDetect;

    public function setUp()
    {
        $this->ReferralSpamDetect = new ReferralSpamDetect();
    }

    /** @test */
    public function referrers_are_spam()
    {
        $lines = file(__DIR__.'/referrers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $this->assertTrue(
                $this->ReferralSpamDetect->isReferralSpam($line),
                $line
            );
        }
    }

    /** @test */
    public function empty_referrer()
    {
        $this->assertFalse(
            $this->ReferralSpamDetect->isReferralSpam('      '),
            false
        );
    }

    /** @test */
    public function current_visitor()
    {
        $headers = (array) json_decode('{"HTTP_REFERER":"http://www.znaturaloriginal.com/foo", "DOCUMENT_ROOT":"\/home\/test\/public_html","GATEWAY_INTERFACE":"CGI\/1.1","HTTP_ACCEPT":"*\/*","HTTP_ACCEPT_ENCODING":"gzip, deflate","HTTP_CACHE_CONTROL":"no-cache","HTTP_CONNECTION":"Keep-Alive","HTTP_FROM":"bingbot(at)microsoft.com","HTTP_HOST":"www.test.com","HTTP_PRAGMA":"no-cache","HTTP_USER_AGENT":"Mozilla\/5.0 (compatible; bingbot\/2.0; +http:\/\/www.bing.com\/bingbot.htm)","PATH":"\/bin:\/usr\/bin","QUERY_STRING":"order=closingDate","REDIRECT_STATUS":"200","REMOTE_ADDR":"127.0.0.1","REMOTE_PORT":"3360","REQUEST_METHOD":"GET","REQUEST_URI":"\/?test=testing","SCRIPT_FILENAME":"\/home\/test\/public_html\/index.php","SCRIPT_NAME":"\/index.php","SERVER_ADDR":"127.0.0.1","SERVER_ADMIN":"webmaster@test.com","SERVER_NAME":"www.test.com","SERVER_PORT":"80","SERVER_PROTOCOL":"HTTP\/1.1","SERVER_SIGNATURE":"","SERVER_SOFTWARE":"Apache","UNIQUE_ID":"Vx6MENRxerBUSDEQgFLAAAAAS","PHP_SELF":"\/index.php","REQUEST_TIME_FLOAT":1461619728.0705,"REQUEST_TIME":1461619728}');

        $cd = new ReferralSpamDetect($headers);

        $this->assertTrue($cd->isReferralSpam());
    }

    /** @test */
    public function referrer_passed_via_contructor()
    {
        $cd = new ReferralSpamDetect(null, 'http://znaturaloriginal.com/foo/bar');

        $this->assertTrue($cd->isReferralSpam());
    }

    /** @test */
    public function the_spam_referrer_urls_are_unique()
    {
        $lines = file(__DIR__.'/referrers.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $this->assertEquals(count($lines), count(array_unique($lines)));
    }
}
