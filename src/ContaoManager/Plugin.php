<?php

declare(strict_types=1);
/*
 * This file is part of note-bundle.
 *
 * (c) querformat GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace Querformat\NoteBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Querformat\NoteBundle\QuerformatNoteBundle;
use DMA\DMAElementGeneratorCallbacks;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(QuerformatNoteBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                    DMAElementGeneratorCallbacks::class

                ]),
        ];
    }
}
