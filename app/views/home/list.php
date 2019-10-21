<table class="table">
    <thead>
    <tr>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Возраст</th>
        <th scope="col">Пол</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user) {?>
        <tr>
            <td><a href="/user?id=<?=$user->id?>"><?= $user->name ?></a></td>
            <td><?= $user->second_name ?></td>
            <td><?= $user->age ?></td>
            <td><?= $user->gender ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>