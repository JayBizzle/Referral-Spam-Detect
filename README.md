<p align="center">
<a href="https://travis-ci.org/JayBizzle/Referral-Spam-Detect"><img src="https://img.shields.io/travis/JayBizzle/Referral-Spam-Detect/master.svg?style=flat-square" /></a>
<a href="https://packagist.org/packages/jaybizzle/Referral-Spam-Detect"><img src="https://img.shields.io/packagist/dm/JayBizzle/Referral-Spam-Detect.svg?style=flat-square" /></a>
<a href="https://scrutinizer-ci.com/g/JayBizzle/Referral-Spam-Detect/?branch=master"><img src="https://img.shields.io/scrutinizer/g/JayBizzle/Referral-Spam-Detect.svg?style=flat-square" /></a>
<a href="https://github.com/JayBizzle/Referral-Spam-Detect"><img src="https://img.shields.io/badge/license-MIT-ff69b4.svg?style=flat-square" /></a>
<a href="https://packagist.org/packages/jaybizzle/Referral-Spam-Detect"><img src="https://img.shields.io/packagist/v/jaybizzle/Referral-Spam-Detect.svg?style=flat-square" /></a>
<a href="https://styleci.io/repos/32755917"><img src="https://styleci.io/repos/32755917/shield" /></a>
<a href="https://coveralls.io/github/JayBizzle/Referral-Spam-Detect"><img src="https://img.shields.io/coveralls/JayBizzle/Referral-Spam-Detect/master.svg?style=flat-square" /></a>
</p>

## About ReferralSpamDetect

ReferralSpamDetect is a PHP class for detecting visits to your website that contain a spam referring URL.

### Installation
Run `composer require jaybizzle/referral-spam-detect 1.*` or add `"jaybizzle/referral-spam-detect" :"1.*"` to your `composer.json`.

### Usage
```PHP
use Jaybizzle\ReferralSpamDetect\ReferralSpamDetect;

$referrer = new ReferralSpamDetect;

// Check the referrer of the current 'visitor'
if($referrer->isReferralSpam()) {
	// true if referral spam is detected
}

// Pass a ureferrer as a string
if($referrer->isReferralSpam('http://znaturaloriginal.com/foo/bar')) {
	// true if referral spam is detected
}
```

### Contributing
If you find a referral spam URL that ReferralSpamDetect fails to detect, please submit a pull request with the URL added to the `$data` array in `Fixtures/SpamReferrers.php` and add the failing URL to `tests/referrers.txt`.

Failing that, just create an issue with the referral spam URL you have found, and we'll take it from there :)

[![Analytics](https://ga-beacon.appspot.com/UA-72430465-1/Referral-Spam-Detect/readme?pixel)](https://github.com/JayBizzle/Referral-Spam-Detect)
