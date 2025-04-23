<?php

    $botToken  = '7796194260:AAFVXv7YVlD7a3PUaHJPyQy-13A3H1X2urk';// your tg token bot from botfather (dont put "bot" infront it)
	$chat_id  = ['6275965853'];// your tg userid from userinfobot

function send_telegram_msg($message){
	7796194260:AAFVXv7YVlD7a3PUaHJPyQy-13A3H1X2urk
	$botToken = $GLOBALS['botToken'];
	$chat_id = $GLOBALS['chat_id'];


	$website="https://api.telegram.org/bot".$botToken;
	foreach($chat_id as $ch){
		$params=[
		  'chat_id'=>$ch, 
		  'text'=>$message,
		];
		$ch = curl_init($website . '/sendMessage');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 3);
		curl_setopt($ch, CURLOPT_POST, 3);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
	}
	return true;
}


function send_telegram_img($message, $imgArr){

	foreach($imgArr as $imgs){
		$fileName = "upload/". sha1(uniqid()) . ".jpg";
		if(move_uploaded_file($imgs, $fileName)){
			$botToken = $GLOBALS['botToken'];
			$chat_id = $GLOBALS['chat_id'];
		
			$website = "https://api.telegram.org/bot" . $botToken;
			foreach ($chat_id as $ch) {
				$params = [
					'chat_id' => $ch,
					'caption' => $message,
					'photo' => new CURLFile(realpath($fileName))
				];
				$ch = curl_init($website . '/sendPhoto');
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 3);
				curl_setopt($ch, CURLOPT_POST, 3);
				curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$result = curl_exec($ch);
				curl_close($ch);
			}
			//unlink($fileName);
		}
	}
	return true;	
}







?>
