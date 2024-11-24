<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

try {
    return RectorConfig::configure()
        ->withPaths([
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ])
        ->withPhpSets(php82: true)
//        ->withTypeCoverageLevel(40)
        ->withDeadCodeLevel(40)
        ->withRules([
            TypedPropertyFromStrictConstructorRector::class
        ])
        ->withSets([
            SetList::CODE_QUALITY,
            SetList::TYPE_DECLARATION,
            SetList::NAMING,
            SetList::PRIVATIZATION,
            SymfonySetList::SYMFONY_71,
            SymfonySetList::SYMFONY_CODE_QUALITY,
            SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION,
            SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES
        ]);
} catch (\Rector\Exception\Configuration\InvalidConfigurationException $e) {

}
