<?php



if($there_admin == 1)    {

        $ch = mysqli_query($db, "SELECT * FROM channel ORDER BY id");
        if(mysqli_num_rows($ch) > 0){
            $i = 0;
            $sum = mysqli_query($db, 'SELECT SUM(c_subs) AS value_sum FROM channel');
            $row = mysqli_fetch_assoc($sum);
            $totsubs = $row['value_sum'];
            $ts = number_format($totsubs); // total subscribers
            $totch = mysqli_query($db, 'SELECT COUNT(1) FROM channel');
            $countch = mysqli_fetch_array($totch); // total channels
            foreach ($ch as $channel) {
                $item .= $channel['id']." ".$channel['c_name']." - ".$channel['c_subs']." \n🆔<code>".$channel['c_id']."</code>\n\n";
               $i++;
               if($i == 50){
               $bot->send_message($chatid, "🗳 Registred Channel Lists\n<b>ID  Channel - Subs</b>\n".$item."\n", null, null, 'HTML');
               $i = 0;
               $item = '';
               }
            }
            $bot->send_message($chatid, "🗳 Registred Channel Lists\n<b>ID  Channel - Subs</b>\n".$item."\n<b>📢 Total channels: ".$countch[0]."\n👥 Total Subscribers: ".$ts."</b>", null, null, 'HTML');
                    
        
        
        }else{
            $bot->send_message($chatid, "❌ No channels registered yet.", null, null, 'HTML');
        }}