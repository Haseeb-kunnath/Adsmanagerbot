<?php



        if (!empty($ex[1]) and !empty($ex[2])) {
        $id = $ex[1];
            $result = $bot->getChat(getId($id));
print_r($result);
            $type = $result->result->type;
            if($result->ok == 'true'){
            $ch_id = $result->result->id;
            }else{
            $ch_id = $id; }
            $disp = mysqli_query($db, "SELECT * FROM channel WHERE c_id = '".$ch_id."'");
            $read = mysqli_fetch_assoc($disp);
            $b = $read['u_id'];
            
            $up = mysqli_query($db, "UPDATE channel SET u_id = '".$ex[2]."' WHERE c_id = '".$ch_id."'");
            if($up){
                $bot->send_message($chatid,"Channel ".$ex[1]." Successfully Switched from id ".$b." to id $ex[2]", null, null, 'HTML');
            }else{
                $bot->send_message($chatid, "❌ Failed to fine channel", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }