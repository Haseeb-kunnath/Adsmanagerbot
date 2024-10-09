<?php



  $ex = explode('|||',$data2);
    
    mysqli_query($db, "UPDATE payment SET status = 'none' WHERE u_id = '".$ex[1]."'");
    $bot->send_message($ex[1], "<b>Your withdraw request Declined! \n</b>", null, null, 'HTML');
    $bot->edit_message($chatid2,$mid2, "User will be noticed Declined", null, null, 'HTML');