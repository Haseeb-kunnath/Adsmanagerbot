<?php


 $ex = explode('|||',$data2);
    mysqli_query($db, "UPDATE channel SET balance='0' WHERE u_id='".$ex[1]."'");
    mysqli_query($db, "UPDATE payment SET status = 'none' WHERE u_id = '".$ex[1]."'");
    $bot->send_message($ex[1], "<b>Your withdraw request completed! ✅\n</b>", null, null, 'HTML');
    $bot->edit_message($chatid2,$mid2, "User will be noticed now", null, null, 'HTML');