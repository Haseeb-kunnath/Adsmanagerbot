<?php


 if($there_admin == 1)  {
        if(!empty($ex[1])){
            $disp = mysqli_query($db, "SELECT * FROM channel WHERE c_name = '".$ex[1]."'");
            $disp1 = mysqli_query($db, "SELECT * FROM ban WHERE c_name = '".$ex[1]."'");
         
            if (mysqli_num_rows($disp) > 0) {
                $read = mysqli_fetch_assoc($disp);
                $item = "<b>Channel detail:</b>\n📟 ID : ".$read['id']."\n🆔 Channel User-ID : ".$read['c_id']."\n🔖 Channel username : ".$read['c_name']."\n👥 Channel Subscribers : ".$read['c_subs']."\n🆔 Admin ID : ".$read['u_id']."\n👤 Admin username : @".$read['u_name']."\n💰 Earnings : ₹".$read['balance'];
                $bot->send_message($chatid, $item, null, null, 'HTML');
           }
           elseif (mysqli_num_rows($disp1) > 0) {
                $read = mysqli_fetch_assoc($disp1);
                $item = "<b>Channel detail:</b>\n📟 ID : ".$read['id']."\n🆔 Channel User-ID : ".$read['c_id']."\n🔖 Channel username : ".$read['c_name']."\n👥 Channel Subscribers : ".$read['c_subs']."\n🆔 Admin ID : ".$read['u_id']."\n👤 Admin username : @".$read['u_name']."\n💰 Earnings : ₹".$read['balance'];
                $bot->send_message($chatid, $item, null, null, 'HTML');
            
            }else{
                $bot->send_message($chatid, "❌ Channel not found.", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }}