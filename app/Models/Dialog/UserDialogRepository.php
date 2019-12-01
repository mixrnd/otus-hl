<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 24.11.19
 * Time: 21:56
 */

namespace App\Models\Dialog;


use App\Components\Repository;

class UserDialogRepository extends Repository
{
    public function findByUids($uids): ?UserDialog
    {
        $result = $this->selectClass(
            'select * from users_dialogs where uid1=:uid1 and uid2=:uid2', UserDialog::class,
            [
                ':uid1' => $uids[0],
                ':uid2' => $uids[1],
            ]);

        if (!$result) {
            return null;
        }
        return $result[0];
    }

    public function findById($id): ?UserDialog
    {
        $result = $this->selectClass(
            'select * from users_dialogs where id=:id', UserDialog::class,
            [
                ':id' => $id,
            ]);

        if (!$result) {
            return null;
        }
        return $result[0];
    }

    public function create($uids)
    {
        $this->insert('users_dialogs', [
            'uid1' => $uids[0],
            'uid2' => $uids[1],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->lastInsertId();
    }
}