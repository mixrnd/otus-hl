<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 17.11.19
 * Time: 16:48
 */

namespace App\Models;


use App\Components\Repository;

class TestTableRepository extends Repository
{

    public function insertNumber($number)
    {
        $this->insert('test_table4', [
            'number' => $number,
        ]);
    }

}