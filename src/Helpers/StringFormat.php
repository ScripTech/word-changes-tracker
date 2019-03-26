<?php
/**
 * This file is part of Word Changes Tracker
 *
 * (c) Edilsn Mucanze <edilsonhmberto@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

/**
 * @author Edilson Mucanze
 */
namespace EdilsonMucanze\WordChangesTracker\Helpers;

/**
 * Formatting the input text before tracking changes
 */
class StringFormat{

    private $input;

    /**
     * Pre-process all strings before trackChanges in senteces
     * @return string $input
     * @author Edilson Mucanze <edilsonhmberto@gmail.com>
     */
    public function StringFormat($input = null){

        $this->input = str_replace(array("\r\n", "\r", "\n"), " </br>", $input);
        $this->input = preg_split("/[\s]+/", $this->input);

        return $this->input;
    }
}
