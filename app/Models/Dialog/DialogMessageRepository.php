<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 25.11.19
 * Time: 22:47
 */

namespace App\Models\Dialog;


use App\Components\Repository;
use App\Models\ShardKey;

class DialogMessageRepository extends Repository
{
    /**
     * @var ShardKey
     */
    private $shardKey;

    public function __construct(ShardKey $shardKey)
    {
        $this->shardKey = $shardKey;
    }

    public function list($dialogId)
    {
        $this->chooseShard();

        return $this->selectClass('select * from user_messages order by created_at asc', DialogMessage::class);
    }

    public function create($dialogId, $text, $authorId)
    {
        $this->chooseShard();

        $this->insert('user_messages', [
            'dialog_id' => $dialogId,
            'text' => $text,
            'author_id' => $authorId,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function chooseShard()
    {
        $shard = 'shard1';
        if ($this->shardKey->hash() % 100 > 50) {
            $shard = 'shard2';
        }

        $this->connectionName = $shard;
    }
}