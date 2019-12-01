<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 25.11.19
 * Time: 22:54
 */

namespace App\Models;


class ShardKey
{

    private $uidsOrdered;
    /**
     * ShardKey constructor.
     */
    public function __construct($uid1, $uid2)
    {
        $this->uidsOrdered = [$uid1, $uid2];
        sort($this->uidsOrdered);
    }

    public function hash()
    {
        return crc32($this->uidsOrdered[0] . $this->uidsOrdered[1]);
    }

    public function uids()
    {
        return $this->uidsOrdered;
    }
}