<div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-4">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <?php if ($error) {?>
            <div class="alert alert-danger" role="alert">
               <?= $error?>
            </div>
        <?php } ?>
        <form method="post" action="/register">
            <div class="row">
                <label for="name" class="sr-only">Имя</label>
                <input  id="name" class="form-control" name="name" placeholder="имя" value="<?= $request->get('name')?>">
            </div>

            <div class="row">
                <label for="second_name" class="sr-only">Фамилия</label>
                <input  id="second_name" class="form-control" name="second_name" placeholder="Фамилия" value="<?= $request->get('second_name')?>">
            </div>

            <div class="row">
                <label for="age" class="sr-only">Возраст</label>
                <input  id="age" class="form-control" name="age" placeholder="Возраст" value="<?= $request->get('age')?>">
            </div>

            <div class="row">
                <label for="gender" class="sr-only">Пол</label>
                <select  id="gender" class="form-control" name="gender">
                    <option value="m">М</option>
                    <option value="f">Ж</option>
                </select>
            </div>

            <div class="row">
                <label for="interests" class="sr-only">Интересы</label>
                <input  id="interests" class="form-control" name="interests" placeholder="Интересы" value="<?= $request->get('interests')?>">
            </div>

            <div class="row">
                <label for="city" class="sr-only">Город</label>
                <input  id="city" class="form-control" name="city" placeholder="Город" value="<?= $request->get('city')?>">
            </div>

            <div class="row">
                <label for="password" class="sr-only">Пароль</label>
                <input  id="password" type="password" class="form-control" name="password" placeholder="пароль">
            </div>
            <div class="row">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
            </div>
        </form>
    </div>
    <div class="col-sm">
    </div>
</div>
