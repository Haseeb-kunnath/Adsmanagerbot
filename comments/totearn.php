<?php



 if($there_admin == 1)  {
        $sum = mysqli_query($db, 'SELECT SUM(balance) AS value_sum FROM channel');
        $row = mysqli_fetch_assoc($sum);
        $totearn = number_format($row['value_sum'], 2);
        
        $bot->send_message($chatid, "💰 <b>Total of channel earnings :</b> ₹".$totearn, null, null, 'HTML');
  }