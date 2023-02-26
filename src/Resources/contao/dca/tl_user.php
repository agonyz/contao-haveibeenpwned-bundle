<?php

declare(strict_types=1);

/*
 * This file is part of agonyz/contao-haveibeenpwned-bundle.
 *
 * (c) agonyz
 *
 * @license LGPL-3.0-or-later
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_user']['fields']['agonyzHaveIBeenPwnedNotification'] = [
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'default' => '1'],
];

PaletteManipulator::create()
    ->addLegend('agonyz_have_i_been_pwned_legend:hide', 'password_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('agonyzHaveIBeenPwnedNotification', 'agonyz_have_i_been_pwned_legend:hide', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('admin', 'tl_user')
    ->applyToPalette('login', 'tl_user')
;
