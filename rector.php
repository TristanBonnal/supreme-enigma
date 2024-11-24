<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;

try {
    return RectorConfig::configure()
        ->withPaths([
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ])
        // uncomment to reach your current PHP version
        ->withPhpSets(php81: true)
        ->withSets([
            SetList::DEAD_CODE,
            SetList::CODE_QUALITY,
            SetList::NAMING,
            SetList::PRIVATIZATION,
        ]);
} catch (\Rector\Exception\Configuration\InvalidConfigurationException $e) {

}
