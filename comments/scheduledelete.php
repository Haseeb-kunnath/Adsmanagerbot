<?php


$pik = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM schedule WHERE until='".$oo."' && status != 'done'"));
$step = $pik['u_id'];
    $query = mysqli_query($db, "SELECT * FROM messages WHERE id='".$pik['post']."'");
    $t = mysqli_num_rows($query);
    $errors = '';
    $i = 0;
    
$bot->send_message($step, "<b>⚡ Turbo schedule delete executing⏳</b>\nFor post ".$pik['post']."" , null, null, 'HTML');

    while ($row = mysqli_fetch_assoc($query)) {
    $del = $row['message_id']+500;
     if($i == 0){  $bot->delete_message($row['channel'],$del); }
       $botz = $bot->delete_message($row['channel'],$row['message_id']);
   mysqli_query($db, "DELETE FROM messages WHERE message_id = '".$row['message_id']."'");
        if($botz->ok == false){$errors .= "Channel: {$row['channel']}:\n {$botz->description}\n\n";}else{$i++;}
        
    }
    
    
        $bot->send_message($step, "Total Broadcasted 📤 Channels : $t\n\n📗 Successful : $i\n\n Unsuccessful 📙 \n🗳 Error List : \n$errors", null, null, 'HTML');
        mysqli_query($db, "UPDATE schedule SET status='done' WHERE id= '".$pik['id']."'");