<?php

/*
 * This file is part of note-bundle.
 *
 * (c) querformat GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace Querformat\QuerformatNoteBundle\Tests;

use Querformat\QuerformatNoteBundle\QuerformatNoteBundle;
use PHPUnit\Framework\TestCase;

class QuerformatNoteBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new QuerformatNoteBundle();

        $this->assertInstanceOf('Querformat\QuerformatNoteBundle\QuerformatNoteBundle', $bundle);
    }
}
