<?php

/*
 * This file is part of Referral Spam Detect.
 *
 * (c) Mark Beech <m@rkbee.ch>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

require 'src/Fixtures/AbstractProvider.php';
require 'src/Fixtures/SpamReferrers.php';

$src = array(
    'SpamReferrers',
);

foreach ($src as $class) {
    $class = "Jaybizzle\\ReferralSpamDetect\\Fixtures\\$class";
    $object = new $class;

    outputJson($object);
    outputTxt($object);
}

function outputJson($object)
{
    $className = (new ReflectionClass($object))->getShortName();
    file_put_contents("raw/$className.json", json_encode($object->getAll()));
}

function outputTxt($object)
{
    $className = (new ReflectionClass($object))->getShortName();
    file_put_contents("raw/$className.txt", implode($object->getAll(), PHP_EOL));
}
