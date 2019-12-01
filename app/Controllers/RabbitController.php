<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 01.12.19
 * Time: 12:26
 */

namespace App\Controllers;


use App\Components\Controller;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitController extends Controller
{
    public function index()
    {
        $connection = new AMQPStreamConnection('rabbit', 5672, 'rabbitmq', 'rabbitmq');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);

        $msg = new AMQPMessage('Hello World!');
        $channel->basic_publish($msg, '', 'hello');

        echo " [x] Sent 'Hello World!'\n";
        var_dump(1);die;
    }
}