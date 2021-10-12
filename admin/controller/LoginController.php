<?php
require_once("model/UserModel.php");
class LoginController
{
    public function login()
    {
        if(!empty($_POST))
        {
            if(!empty($_POST["username"]) and !empty($_POST["password"]))
            {
                $userModel=new UserModel;
                $auth=$userModel->autentifikacija($_POST["username"],$_POST["password"]);
                if($auth)
                {
                    header("location:index.php");
                }
            }
            
        }
        ob_start();
        require_once( 'view/loginView.php' );
        $output = ob_get_clean();
        return $output;
    }
}
