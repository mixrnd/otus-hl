<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 24.11.19
 * Time: 21:16
 */

namespace App\Controllers;


use App\Components\Controller;
use App\Models\Dialog\DialogMessageRepository;
use App\Models\Dialog\UserDialogRepository;
use App\Models\ShardKey;

class DialogController extends Controller
{
    protected $layout = 'main';

    public function dialog()
    {

//        die;
//        $dialogId = $this->request->get('id');
//        $messages = [
//            ['klein.chelsey@yahoo.com', 'Hello'],
//            ['carley91@yahoo.com', 'Hi'],
//            ['carley91@yahoo.com', 'Hi'],
//            ['carley91@yahoo.com', 'Hi'],
//            ['klein.chelsey@yahoo.com', 'Hello'],
//            ['klein.chelsey@yahoo.com', 'Hello'],
//            ['klein.chelsey@yahoo.com', 'Hello'],
//        ];
        $dr = new UserDialogRepository();
        $dialog = $dr->findById($this->request->get('id'));

        $shardKey = new ShardKey($dialog->uid1, $dialog->uid2);

        $dmr = new DialogMessageRepository($shardKey);
        if ($this->request->isMethod("POST")) {
            $messageText = $this->request->get('message_text');
            $dmr->create($dialog->id, $messageText, $this->auth->getUser()->id);
        }



        $messages = $dmr->list($dialog->id);
         //var_dump($messages);die;
        return $this->view('dialog/dialog', [
            'messages' => $messages,
            'user' => $this->auth->getUser()
        ]);
    }

    public function list()
    {
        return $this->view('dialog/list');
    }

    public function createDialog()
    {
        if ($this->request->isMethod("POST")) {
            $userToEmail = $this->request->get('email');
            $userEmail = $this->auth->getUser()->email;
//            var_dump($userToEmail);
//            var_dump($userEmail);

            $dr = new UserDialogRepository();
            $mails = [$userEmail, $userToEmail];
            sort($mails);
            $ud = $dr->findByUids($mails);
            $dialogId = null;
            if (!$ud) {
                $dialogId = $dr->create($mails);
            } else {
                $dialogId = $ud->id;
            }

            $this->redirect('/dialogs/dialog?id=' . $dialogId);
        }

        // add database record
        return $this->view('dialog/create_dialog');
    }
}