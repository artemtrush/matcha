<?php

include_once (ROOT.'/models/Profile.php');

class ProfileController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/profile/index.php');
        
        return true;
    }
}
