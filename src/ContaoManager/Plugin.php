<?php

declare(strict_types=1);

/*
 * This file is part of agonyz/contao-haveibeenpwned-bundle.
 *
 * (c) agonyz
 *
 * @license LGPL-3.0-or-later
 */

namespace Agonyz\ContaoHaveIBeenPwnedBundle\ContaoManager;

use Agonyz\ContaoHaveIBeenPwnedBundle\AgonyzContaoHaveIBeenPwnedBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(AgonyzContaoHaveIBeenPwnedBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
