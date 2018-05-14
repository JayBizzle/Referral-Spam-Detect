<?php

/*
 * This file is part of Referral Spam Detect.
 *
 * (c) Mark Beech <m@rkbee.ch>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$dot = dirname(__FILE__);

if (! file_exists($composer = dirname($dot).'/vendor/autoload.php')) {
    throw new RuntimeException("Please run 'composer install' first to set up autoloading. $composer");
}
/** @var \Composer\Autoload\ClassLoader $autoloader */
$autoloader = include $composer;
