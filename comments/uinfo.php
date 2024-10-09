<?php



if($there_admin == 1)    {

$forcereply = new Forcereply(true, true);
            $bot->send_message($chatid, "<b>Please send user ID</b>",null, json_encode($forcereply), 'HTML');
}