<?php



 if($there_admin == 1)  {
                $sum = mysqli_query($db, 'SELECT SUM(c_subs) AS value_sum FROM channel');
        $row = mysqli_fetch_assoc($sum);
        $totsubs = $row['value_sum'];
        
        $bot->send_message($chatid, "👥 <b>Total of channel subscribers :</b> ".number_format($totsubs), null, null, 'HTML');
}