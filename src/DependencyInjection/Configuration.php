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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('agonyz_contao_have_i_been_pwned');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->scalarNode('user_notice')
            ->info('The notice that should be displayed to an user in the backend if his password has been leaked')
            ->defaultValue('When you logged in, the system checked whether your password is on publicly known password lists that originate from password leaks from other websites.<br>Unfortunately, your password was found on such a list.<br>You can check it yourself here <a href="https://www.haveibeenpwned.com/passwords">haveibeenpwned.com/passwords</a>')
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
