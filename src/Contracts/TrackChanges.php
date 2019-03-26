<?php

/**
 * This file is part of Word Changes Tracker
 *
 * (c) Edilsn Mucanze <edilsonhmberto@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace EdilsonMucanze\WordChangesTracker\Contracts;

interface TrackChanges{

    /**
     * @return bool
     */
    public function stringCompare($stored_word = null, $in_word = null);

    /**
     * @return array
     * array from comprare function
     */
    public function getNewString();

    /**
     * @param array $newWord
     */

    public function setNewString(array $newString);

    /**
     * @return array
     * array from comprare function
     */
    public function getOldString();

    /**
     * @param array $newWord
     */

    public function setOldString(array $OldString);
}
