<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 06.10.19
 * Time: 15:35
 */

namespace App\Models\User;


use App\Components\Repository;

class UserRepository extends Repository
{
    public function registerUser($name, $secondName, $age, $interests, $city, $gender, $password)
    {
        $user = $this->findByName($name);
        if ($user) {
            return ['success' => false, 'errorMsg' => 'Пользователь с таким именем уже есть'];
        }

        $this->insert('users', [
            'name' => $name,
            'second_name' => $secondName,
            'age' => $age,
            'interests' => $interests,
            'city' => $city,
            'password' => $password,
            'gender' => $gender,
        ]);

        return ['success' => true, 'errorMsg' => ''];
    }

    public function findByName($userName): ?User
    {
        $result = $this->selectClass('select * from users where name=:name', User::class, [':name' => $userName]);

        if (!$result) {
            return null;
        }
        return $result[0];
    }

    public function findById($userId): ?User
    {
        $result = $this->selectClass('select * from users where id=:id', User::class, [':id' => $userId]);

        if (!$result) {
            return null;
        }
        return $result[0];
    }

    public function findAll()
    {
        return $this->selectClass('select * from users', User::class);
    }
}