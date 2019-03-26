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

use EdilsonMucanze\WordChangesTracker\WordChangesTracker;
use EdilsonMucanze\WordChangesTracker\Contracts\TrackChanges;

/**
 * Track Changes Helper Class
 *
 */
class TrackChangesHelper{

    private $ArrayResponse;
    private $WCTrack;
    private $StringResponse = array();

    /**
     * Class Constructor
     */
    public function __construct($ArrayResponse){
        $this->ArrayResponse = $ArrayResponse;
    }

    /**
     * Trace change in string sentences
     * @return string $StringResponse
     */
    public function traceChanges($isDecorated = false){

        $this->StringResponse['new'] = " ";
        $this->StringResponse['old'] = " ";

        if($isDecorated){
            $style_ins = "style='text-decoration:none; border-radius:4px; padding:0px 8px; background-color:#b7f9c1; .border:1px solid #8df19c'";
            $style_del = "style='text-decoration:none; border-radius:4px; padding:0px 8px; background-color:#fdbbbb; .border:1px solid #f98179'";
        }else{
            $style_ins = "class='ins'"; $style_del = "class='del'";
        }


        foreach ($this->ArrayResponse as $key) {
            // Check if array is empty or not
            if(is_array($key)){

                    $this->StringResponse['old'] .=(!empty($key['del']) ? "<del $style_del>".implode(' ', $key['del'])."</del> " : '');
                    $this->StringResponse['new'] .=(!empty($key['ins']) ? "<ins $style_ins>".implode(' ', $key['ins'])."</ins> " : '');

            }else{
                if($key == "</br>"){
                }else{
                    $this->StringResponse['new'] .= $key." ";
                    $this->StringResponse['old'] .= $key." ";
                }
            }
        }
        return $this->StringResponse;
    }

}
