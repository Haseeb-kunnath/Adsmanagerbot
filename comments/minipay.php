 <?php


    if($there_admin == 1)    {
        if(!empty($ex[1])){
            
            $insert = mysqli_query($db, "UPDATE count SET minipay = '".$ex[1]."' WHERE id = '1'");
            if($insert){
                
                $bot->send_message($chatid, "✅ minimum payout rate set to ₹".$ex[1].".", null, null, 'HTML');
            }else{
                
                $bot->send_message($chatid, "❌ Failed to set minimum payout.", null, null, 'HTML');
            }
        }else{
            
            $bot->send_message($chatid, "❌ Please use correct format.", null, null, 'HTML');
        }}