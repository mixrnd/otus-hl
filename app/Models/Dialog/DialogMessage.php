<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 25.11.19
 * Time: 22:46
 */

namespace App\Models\Dialog;


class DialogMessage
{
    public $id;
    public $dialog_id;
    public $text;
    public $created_at;
    public $author_id;
}