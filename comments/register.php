<?php



$disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$chatid."'");
        $disp1 = mysqli_query($db, "SELECT * FROM ban WHERE u_id = '".$chatid."'");
        $disp2 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid."'");
        if(mysqli_num_rows($disp2) > 0){
        
        if(mysqli_num_rows($disp) == 0 && mysqli_num_rows($disp1) == 0){
        $rem = mysqli_query($db, "DELETE FROM payment WHERE u_id = '".$chatid."'");
        }}
$rem = mysqli_query($db, "DELETE FROM checkch WHERE u_id = '".$chatid."'");
 $disp = mysqli_query($db, "SELECT * FROM count WHERE id = '1'");
 $disp1 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid."'");
            $t = mysqli_fetch_assoc($disp);
            $ch = $t['onoff'];
 if($ch != open) {
    $bot->send_message($chatid, "Registration are closed for now! Will open up soon👍", null, null, null);
}else{
if(mysqli_num_rows($disp1) > 0){
$forcereply = new Forcereply(true, true);
            $bot->send_message($chatid, "<b>Please send Your Channel @username or Channel ID (which looks like this -1234567890123)</b>",null, json_encode($forcereply), 'HTML');
}else{
$keyboard = new InlineKeyboardMarkup(true, false);
        $options[0][0] = ['text' => 'Paytm', 'callback_data' => 'Paytm'];
        $options[0][1] = ['text' => 'UPI', 'callback_data' => 'UPI'];
        $options[0][2] = ['text' => 'Paypal', 'callback_data' => 'paypal'];
        $options[1][0] = ['text' => 'Google pay', 'callback_data' => 'gpay'];
        $options[1][1] = ['text' => 'Phonepe', 'callback_data' => 'phonepe'];        
        $options[2][0] = ['text' => '✳️ Cancel', 'callback_data' => 'cancel'];
        $keyboard->add_option($options);
        
        $bot->send_Photo($chatid, "https://telegrambots.tk/adsbot/payz.jpg","Please Select$mi a payment method 💳",null, null, json_encode($keyboard));
        $bot->answer_inline($mid,"loading",false,null,null);
        }}