<?php

/**
 * This file is part of Word Changes Tracker
 *
 * (c) Edilsn Mucanze <edilsonhmberto@gmail.com>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace EdilsonMucanze\WordChangesTracker;

use EdilsonMucanze\WordChangesTracker\Contracts\TrackChanges;


class WordChangesTracker implements TrackChanges{

    private $getNewString;
    private $setNewString;
    private $getOldString;
    private $setOldString;
    private $ins = array();
    private $del = array();
    private $in_max;
    private $std_max;
    private $stringTable;

    /**
     * Class Constructor
     */
    public function __construct(){}

    /**
     * Compare to sentence and trace the diference bettwen them
     * @return array $Diff
     * @author Edilson Mucanze
     */
    public function stringCompare($std_word = null, $in_word = null){
        $stringTable = array();
        $string_len = 0;

        foreach ($std_word as $std_index => $std_value) {
            $in_keys = array_keys($in_word, $std_value);
            foreach ($in_keys as $in_index) {
                $stringTable[$std_index][$in_index] = isset($stringTable[$std_index - 1][$in_index - 1]) ? $stringTable[$std_index - 1][$in_index - 1] + 1 : 1;

                if($stringTable[$std_index][$in_index] > $string_len){
                    $string_len = $stringTable[$std_index][$in_index];
                    $std_max = $std_index + 1 - $string_len;
                    $in_max = $in_index + 1 - $string_len;
                }
            }
        }

        if($string_len == 0)return array(array('del'=>$std_word,'ins'=> $in_word));

        /**
         * Self call function loop
         */
        $response = array_merge(
            self::stringCompare(array_slice($std_word, 0, $std_max), array_slice($in_word, 0, $in_max)),
            array_slice($in_word, $in_max, $string_len),
            self::stringCompare(array_slice($std_word, $std_max + $string_len), array_slice($in_word, $in_max + $string_len))
        );
        return $response;
    }

    public function getNewString(){
        return $this->getNewString;
    }

    public function setNewString($getNewString){
        $this->getOldString = $getNewString;
    }

    public function getOldString(){
        return $this->getOldString;
    }

    public function setOldString(array $string){
        $this->getOldString = $string;
    }
}
