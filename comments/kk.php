<?php



	mysqli_query($db, "UPDATE users SET step='none' WHERE chat='$chatid'");
	$explode = explode("\n", $text);
	$arrr =[];
	foreach($explode as $key){
		if(is_numeric($key)){$num = $key; continue;}
		$ex = explode(',', $key);
			$arr = [];
			foreach($ex as $keys){
				$ex2 = explode('+', $keys);
				$text = $ex2[0];
				$url = $ex2[1];
				$arrNew = ['text' => $text, 'url' => $url];
				array_push($arr, $arrNew);
			} array_push($arrr, $arr);
	}
		$save = json_encode($arrr, JSON_UNESCAPED_UNICODE);
		mysqli_query($db, "UPDATE posts SET keyboard='$save' WHERE id='$num'");
		$nnn = json_encode(['inline_keyboard' => $arrr]);
		$bot->send_message($chatid, "Successfully added url buttons to post:\n\nif you want any changes just do the same thing again using post ID\nHere is how it looks now ⬇️" , null, $nnn, 'HTML');
		