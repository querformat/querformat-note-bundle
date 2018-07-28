<?php

declare(strict_types=1);

/*
 * This file is part of Contao.
 *
 * (c) querformat
 *
 * @license LGPL-3.0-or-later
 */

namespace Querformat\NoteBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode   = $treeBuilder->root('querformat_note_module');

        return $treeBuilder;
    }
}