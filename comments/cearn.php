<?php


 if($there_admin == 1)  {
        $disp = mysqli_query($db, "SELECT * FROM channel");
        if(mysqli_num_rows($disp) > 0){
            foreach ($disp as $count) {
                $item .= $count['id']." ".$count['c_name']." - ₹".$count['balance']."\n";
            }
            
            $bot->send_message($chatid, "💰 <b>Channel Earnings</b>\n\n".$item, null, null, 'HTML');
            file_put_contents("channelearnings.txt", "All Channel Earnings  📈\n$item");
            $bot->send_document($chatid, "channelearnings.txt","",null, null, null);
      
        }else{
            
            $bot->send_message($chatid, "❌ Failed", null, null, 'HTML');
        }}