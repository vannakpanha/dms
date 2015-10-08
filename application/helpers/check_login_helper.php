<?php
    function check_login($person_session)
    {
       
        if(isset($person_session))
        {
            return true;
        }else
        {
            redirect('logins/login');
        }
        
    }


?>