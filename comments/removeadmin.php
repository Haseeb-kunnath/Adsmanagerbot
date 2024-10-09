 <?php


 if($there_admin == 1)    {
$disp = mysqli_query($db, "SELECT * FROM admins WHERE u_id = '$chatid'");
            $t = mysqli_fetch_assoc($disp);
            $ch = $t['owner'];

if($ch == Admin) {
    $bot->send_message($chatid, "❌ Sorry you are not a onwer only owner remove admin", null, null, null);
}elseif(!empty($ex[1])){

            $rem = mysqli_query($db, "DELETE FROM admins WHERE id = '".$ex[1]."'");
            $rem1 = mysqli_query($db, "DELETE FROM admins WHERE u_id = '".$ex[1]."'");
            $rem2 = mysqli_query($db, "DELETE FROM admins WHERE u_name = '".$ex[1]."'");
            if($rem){
                $bot->send_message(ADMIN_CHAT_ID, "✅ Admin removed sucessfully.", null, null, 'HTML');
            }elseif($rem1){
            
            $bot->send_message(ADMIN_CHAT_ID, "✅ Admin removed sucessfully.", null, null, 'HTML');
            }elseif($rem2){
                $bot->send_message(ADMIN_CHAT_ID, "✅ Admin removed sucessfully.", null, null, 'HTML');
            }else{
                $bot->send_message(ADMIN_CHAT_ID, "❌ Failed to remove Admin", null, null, 'HTML');
            }
        }else{
            $bot->send_message(ADMIN_CHAT_ID, "❌ Invalid format", null, null, 'HTML');
        }}