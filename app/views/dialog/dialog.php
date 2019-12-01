<?php foreach ($messages as $message) {?>

    <div class="row" >
        <?php if($message->author_id !== $user->id) {?>
            <div class="col-md-5" style="background-color: #7abaff; margin-bottom: 5px">Other : <?=$message->text?></div>
        <?php }else{?>
            <div class="col-md-2"></div>
            <div class="col-md-5" style="background-color: #0074ff; margin-bottom: 5px">Me: <?=$message->text?></div>
        <?php }?>
    </div>
<? }?>

<form class="form" method="post">
    <textarea class="form-control" name="message_text"></textarea>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить сообщение</button>
</form>
