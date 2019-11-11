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
    public function registerUser($email, $name, $secondName, $age, $interests, $city, $gender, $password)
    {

        $user = $this->findByEmail($email);
        if ($user) {
            return ['success' => false, 'errorMsg' => 'Пользователь с таким email уже есть'];
        }

        $this->insertUser($email, $name, $secondName, $age, $interests, $city, $gender, $password);

        return ['success' => true, 'errorMsg' => ''];
    }

    public function insertUser($email, $name, $secondName, $age, $interests, $city, $gender, $password)
    {
        $this->insert('users', [
            'email' => $email,
            'name' => $name,
            'second_name' => $secondName,
            'age' => $age,
            'interests' => $interests,
            'city' => $city,
            'password' => password_hash($password, PASSWORD_ARGON2I),
            'gender' => $gender,
        ]);
    }

    public function search($namePart, $lastNamePart)
    {
        return $this->selectClass("select * from users where name like :name or second_name like :secondname limit 1000", User::class, [
            ':name' => $namePart . '%',
            ':secondname' => $lastNamePart . '%'
        ]);
    }

    public function findByName($userName): ?User
    {
        $result = $this->selectClass('select * from users where name=:name', User::class, [':name' => $userName]);

        if (!$result) {
            return null;
        }
        return $result[0];
    }

    public function findByEmail($email): ?User
    {
        $result = $this->selectClass('select * from users where email=:email', User::class, [':email' => $email]);

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

    public function searchByCity($city)
    {
        return $this->selectClass("select * from users where city like :city limit 1000", User::class, [
            ':city' => $city . '%',
        ]);
    }
}
