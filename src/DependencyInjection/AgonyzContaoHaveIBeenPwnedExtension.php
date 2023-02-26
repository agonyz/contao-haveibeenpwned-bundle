<?php

declare(strict_types=1);

/*
 * This file is part of agonyz/contao-haveibeenpwned-bundle.
 *
 * (c) agonyz
 *
 * @license LGPL-3.0-or-later
 */

namespace Agonyz\ContaoHaveIBeenPwnedBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AgonyzContaoHaveIBeenPwnedExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('agonyz_contao_haveibeenpwned.user_notice', $config['user_notice']);
    }
}
