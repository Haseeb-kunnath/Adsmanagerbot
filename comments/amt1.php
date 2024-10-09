   <?php


  if($there_admin == 1)    {
        if(!empty($ex[1])){
            $sum = mysqli_query($db, 'SELECT SUM(c_subs) AS value_sum FROM channel');
            $row = mysqli_fetch_assoc($sum);
            $totsubs = $row['value_sum'];
            $updated_at = date('Y-m-d H:i:s');
            $insert = mysqli_query($db, "UPDATE count SET amt = '".$ex[1]."' , mem ='".$totsubs."', updated_at = '".$updated_at."' WHERE id = '1'");
            if($insert){
                
                $bot->send_message($chatid, "✅ Amount updated successfully.", null, null, 'HTML');
            }else{
                
                $bot->send_message($chatid, "❌ Failed to set amount", null, null, 'HTML');
            }
        }else{
            
            $bot->send_message($chatid, "❌ Please use correct format", null, null, 'HTML');
        }}