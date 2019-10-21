<div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-8">
        <h1 class="h3 mb-8 font-weight-normal">Информация о пользователе: <?= $user->name?></h1>
        <div class="col-sm-7">
            <dl class="row">
                <dt class="col-sm-3">Имя</dt>
                <dd class="col-sm-9"><?= $user->name?></dd>

                <dt class="col-sm-3">Фамилия</dt>
                <dd class="col-sm-9"><?= $user->second_name?></dd>

                <dt class="col-sm-3">Возраст</dt>
                <dd class="col-sm-9"><?= $user->age?></dd>

                <dt class="col-sm-3">Пол</dt>
                <dd class="col-sm-9"><?= $user->gender?></dd>

                <dt class="col-sm-3">Город</dt>
                <dd class="col-sm-9"><?= $user->city?></dd>

                <dt class="col-sm-3">Интересы</dt>
                <dd class="col-sm-9"><?= $user->interests?></dd>
            </dl>
        </div>
    </div>
    <div class="col-sm">
    </div>
</div>
