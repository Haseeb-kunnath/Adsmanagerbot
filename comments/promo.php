<?php



 if($there_admin == 1)  {
        $sum = mysqli_query($db, 'SELECT SUM(c_subs) AS value_sum FROM channel');
        $row = mysqli_fetch_assoc($sum);
        $totsubs = $row['value_sum'];
        $ts = number_format($totsubs);
        $totch = mysqli_query($db, 'SELECT COUNT(1) FROM channel');
        $countch = mysqli_fetch_array($totch);
        $amount = mysqli_query($db, "SELECT amt FROM count");
        $amt = mysqli_fetch_assoc($amount);
        $a = $amt[amt];
        $message = "🆔 <b>Promo ID :\n⏰ AD For :\n💰 AD Amount : ₹</b>".$a."\n👥 <b>Total Subscribers : </b>".$ts."\n📢 <b>Total Channels : </b>".$countch[0]."\n✅ <b>Successfull : \n❌ Unsuccessfull :</b>";
        
        $bot->send_message($chatid, $message, null, null, 'HTML');
 }