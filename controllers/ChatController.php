<?php

include_once (ROOT.'/models/Chat.php');

class ChatController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/chat/index.php');
        
        return true;
    }
}