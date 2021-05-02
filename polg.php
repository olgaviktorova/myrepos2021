<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body style="color: #0a0; background-color: #333;">
<?php
/*settings*/
//$_SERVER['dport']
$token = $_SERVER['token'];
$achat = ['1126015709'];
define('DB_HOST', $_SERVER['dserver']);
define('DB_USER', $_SERVER['dusername']);
define('DB_PASSWORD', $_SERVER['dpass']);
define('DB_NAME', $_SERVER['dname']);
$pdo = false;
date_default_timezone_set('UTC');
$images = ['AgACAgEAAxkBAAMDYIxg1AoPOe-Vem8rL0L9upw3F9MAAuepMRvLnGBEMGO5EeLtM0s6ODhMFwADAQADAgADeQADd44AAh8E',
	'AgACAgEAAxkBAAMEYIxg1EnNQUpoTOzi6-pS72dFE7wAAuipMRvLnGBEVtJTeqgBdv-JsTZMFwADAQADAgADeQADRZoAAh8E',
	'AgACAgEAAxkBAAMFYIxg1Ud0i2A453DBlSCUonki8pEAAumpMRvLnGBEPO7ATMZKy3BRWOdLFwADAQADAgADeAADjHcBAAEfBA',
	'AgACAgEAAxkBAAMGYIxg1We2i0UhxAoI7k8zpWFgnVMAAuqpMRvLnGBE61OpCgWpLAABzJIbTRcAAwEAAwIAA3kAA7FGAAIfBA',
	'AgACAgEAAxkBAAMHYIxg1hnzIWPYbL8QZZnnpNE0SpUAAuupMRvLnGBEDxNfwG5CPhdp--5LFwADAQADAgADeQAD8WwBAAEfBA',
	'AgACAgEAAxkBAAMIYIxg18BOUa_vFX2kTHVCT-Kpf0gAAuypMRvLnGBEpaZbhYN1jyc_jPNLFwADAQADAgADeQADNmUBAAEfBA',
	'AgACAgEAAxkBAAMJYIxg2AujKwzQjY_V4uvjuB5PRkkAAu2pMRvLnGBEpnShXSvLPqU_7etLFwADAQADAgADeQADYHUBAAEfBA',
	'AgACAgEAAxkBAAMKYIxg2O_C_yzdP0LkClQ8MB3oKecAAu6pMRvLnGBE1tccNTf67V76-W9KFwADAQADAgADeQADpN0DAAEfBA',
	'AgACAgEAAxkBAAMLYIxg2S7KEEs7wUJ3lKVFTCutB50AAu-pMRvLnGBEsZhB714LIhwrNjhMFwADAQADAgADeQAD548AAh8E',
	'AgACAgEAAxkBAAMMYIxg2gLDsriRCabZNPqVjdjROScAAvCpMRvLnGBEbNhi2w84SXMsYsJKFwADAQADAgADeQAD7o0CAAEfBA',
	'AgACAgEAAxkBAAMNYIxg21yLpWk0HIz-WTlsCww0nkgAAvGpMRvLnGBEr8_7QIAov16EdbNLFwADAQADAgADeQADcnIBAAEfBA',
	'AgACAgEAAxkBAAMOYIxg21MORpXuF-wfrv3_h2jmZIIAAvKpMRvLnGBEoOJspouNn7b5gPJIFwADAQADAgADeQADM5sGAAEfBA',
	'AgACAgEAAxkBAAMPYIxg3MqykPAYEGrNd5yLoW9lRsgAAvOpMRvLnGBEK3GzzZybiNEkjfNLFwADAQADAgADeQADNmIBAAEfBA',
	'AgACAgEAAxkBAAMQYIxg3X3rt3E3wv3Ky4NmdSK7QOwAAvSpMRvLnGBE7Qkw4bcK5nM2X8JKFwADAQADAgADeQADnIUCAAEfBA',
	'AgACAgEAAxkBAAMRYIxg3vjPJEC6rLGH4beoRO3GHEYAAvWpMRvLnGBErVX0r3b0WW0yWedLFwADAQADAgADeQADLHQBAAEfBA',
	'AgACAgEAAxkBAAMSYIxg3iCnQGwE4Ge4iX8WMgrltBEAAvapMRvLnGBEV7QxOM6X-ZEAAZEbTRcAAwEAAwIAA3kAA41GAAIfBA',
	'AgACAgEAAxkBAAMTYIxg33XulAbGyaj3SH1gmUYoWrcAAvepMRvLnGBENQMKi8Gm4MGClTBMFwADAQADAgADeQADuuMBAAEfBA',
	'AgACAgEAAxkBAAMUYIxg3xD5uJpjJakh-sF0wEKzN7IAAvipMRvLnGBEdOp97sI6XsHMX0FMFwADAQADAgADeQADQYsAAh8E',
	'AgACAgEAAxkBAAMVYIxg4B3Pqs-IftG_NuagP7tv0acAAvmpMRvLnGBEoAuKZ3qGqE4gTylNFwADAQADAgADeQAD1EIAAh8E'];
	$videos = [[ 'link' => '', 'image' => 'BAACAgEAAxkBAAMYYIxiczKM4Y8uabt8f_Ss7vo5ewYAAoYBAALLnGBE_4Gth4iFVAsfBA', 'name' => 'playing with my tits', 'premium' => false ],
	[ 'link' => '', 'image' => 'BAACAgEAAxkBAAMWYIxiBC9Nzp9mg0_-BXOvkS-IzHgAAoQBAALLnGBEpbX3GRoWD-cfBA', 'name' => 'sexy legs of schoolgirl', 'premium' => false ],
	[ 'link' => '', 'image' => 'AAMCAQADGQEAAxdgjGIdPSKtDul_yqkKTINW7fLpMgAChQEAAsucYES6ghV3aNbWjU7_-UwXAAMBAAdtAAPVPQACHwQ', 'name' => 'my body and pussy', 'premium' => false ],
	[ 'link' => 'https://cloud.mail.ru/public/hf5G/gvwTVyKge', 'image' => 'BAACAgEAAxkBAAMhYIxjQ1OsckfTAAF_GFugDFIbJ2xbAAKPAQACy5xgRBANBqAyFpVPHwQ', 'name' => 'fingering pussy', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/MAJf/ctjouGFWG', 'image' => 'BAACAgEAAxkBAAMfYIxjLrwVGP8MO8cm3Y3ey5tBDPIAAo0BAALLnGBEH901aL1v6s8fBA', 'name' => 'fuck holes with a sex ,toy', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/xz6x/zny7NhEUm', 'image' => 'BAACAgEAAxkBAAMiYIxjT6IGB9UG7RfLNqQKzY0gTWcAApABAALLnGBE2DwTVdcsHHQfBA', 'name' => 'fucks my pussy with ,dildo', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/dL6K/TFQU7bwTG', 'image' => 'BAACAgEAAxkBAAMjYIxjVSgZc8uG2gABGCFVn8TbHyjgAAKRAQACy5xgRDg3moOOI0MJHwQ', 'name' => 'girl in shower', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/MzZA/ZfNcBF38F', 'image' => 'BAACAgEAAxkBAAMkYIxjX3YRdg__k3ToErSUcmixbDkAApIBAALLnGBEnfqgcHyJpFEfBA', 'name' => 'I love my sexy legs', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/b8oH/wBxRU5y9B', 'image' => 'BAACAgEAAxkBAAMlYIxjZYzliEnig_AYCQfKFpb4j_QAApMBAALLnGBEAAFDBJVKv76_HwQ', 'name' => 'I love sofa', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/7jYt/icaWzaWFH', 'image' => 'BAACAgEAAxkBAAMgYIxjNRsUiDP3IT_4NqQTIYAFqygAAo4BAALLnGBEh55vONanm1AfBA', 'name' => 'look at the sexy ass and pussy', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/aasd/DknQVJ292', 'image' => 'BAACAgEAAxkBAAMeYIxjJ8Dy8LU-TFcvCYgKkGEBYscAAowBAALLnGBEUputoJadlWsfBA', 'name' => 'massage pussy with dildo', 'premium' => true],
	[ 'link' => 'https://cloud.mail.ru/public/YN58/oJDreq1Sf', 'image' => 'BAACAgEAAxkBAAMwYIxj4jUOmtnQcWQTH-o5W064GuYAAp4BAALLnGBEm1ZnOalp9AYfBA', 'name' => 'masturbate pussy on the couch', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/B3DA/PiwC54xzv', 'image' => 'BAACAgEAAxkBAAMxYIxj7bJW9DLriDxu6nwdGqKxoqgAAp8BAALLnGBEhmlR8IW0FVMfBA', 'name' => 'masturbating', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/UPus/d3B23h7h9', 'image' => 'BAACAgEAAxkBAAMyYIxj8xbjx9UAAdKXNQQBSAz0DzZXAAKgAQACy5xgRKD6koUEqxx2HwQ', 'name' => 'my sexy body', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/pqzR/3Jh9CuMUU', 'image' => 'BAACAgEAAxkBAAMzYIxj_y1BP3tRu-jwz9SNtOsv_RcAAqEBAALLnGBE8WdHZA6DL4cfBA', 'name' => 'ride on dildo', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/iHpJ/jgerSkAsc', 'image' => 'BAACAgEAAxkBAAMZYIxi_gY1xx97PhemRAZgPFR-dVYAAocBAALLnGBE7UBehr6VJeAfBA', 'name' => 'rubing pussy and tits', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/yyDc/4AeZsR5Sy', 'image' => 'BAACAgEAAxkBAAMaYIxjA3lMp8PJVJOa7i8ItRQI55cAAogBAALLnGBEDZFnaQ8i-R8fBA', 'name' => 'rubing pussy pov', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/4qa6/cRizsRBtS', 'image' => 'BAACAgEAAxkBAAMbYIxjCyVIj2oXhn3XRLFrUnMB5AwAAokBAALLnGBEoa4mJT8OaLQfBA', 'name' => 'sex toy for orgasm', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/Rikw/eMZX8vBF5', 'image' => 'BAACAgEAAxkBAAMcYIxjFgNnYs4x6sBcTJe1LZz-hvcAAooBAALLnGBEC_UhYhA-3I0fBA', 'name' => 'sexy ass', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/5Yhs/6N9cJLzK7', 'image' => 'BAACAgEAAxkBAAMdYIxjG33chqHIgcGQJaERup61rnEAAosBAALLnGBEl_yqEKcKL2ofBA', 'name' => 'Sexy blonde caresses her holes', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/xmc4/JwShddbXk', 'image' => 'BAACAgEAAxkBAAMoYIxjk2ieWPnEuR7QBaJZp6V2oY0AApYBAALLnGBEH98Kww9Xw6YfBA', 'name' => 'sexy body and clother', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/rbDL/pXfYZ3qnx', 'image' => 'BAACAgEAAxkBAAMpYIxjmgIjwGvCLgiQd1PPwo3pJDgAApcBAALLnGBE4OwGM5Bs2P8fBA', 'name' => 'Sexy girl in a divine', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/iZmJ/nrroMKX22', 'image' => 'BAACAgEAAxkBAAMqYIxjp4e0NA-R3knHOoHXdmLVh2cAApgBAALLnGBE1Z1N3dkdk9sfBA', 'name' => 'sexy pussy handing', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/Aib9/iXmNrzeQa', 'image' => 'BAACAgEAAxkBAAMrYIxjs97QnhQThaspYzqZx3_AmdsAApkBAALLnGBEOeLSloPlztMfBA', 'name' => 'shaving pussy', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/wNki/3SeuzS4ch', 'image' => 'BAACAgEAAxkBAAMsYIxjue7QnPnZ642aFRPz7hfO1QMAApoBAALLnGBE8NEM7UuX43gfBA', 'name' => 'show sexy body', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/cugM/9QhZigenQ', 'image' => 'BAACAgEAAxkBAAMtYIxjw2dYJvymFKk--zqJoUAPIzMAApsBAALLnGBE2qMC37x_lzkfBA', 'name' => 'showing sexy ass and pussy', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/JW9U/ak9ohmDFn', 'image' => 'BAACAgEAAxkBAAMuYIxjzw1H36ECwwQukes2j_OxW3wAApwBAALLnGBECMQzrcp0AjwfBA', 'name' => 'sweet tits', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/g1D9/MCfsg22zu', 'image' => 'BAACAgEAAxkBAAMvYIxj2f78DmvHAAFuefVJlKp9OJOLAAKdAQACy5xgRNRQGRuS_9OqHwQ', 'name' => 'teen in sexy dress masturbates', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/PMHG/UoFA16iKa', 'image' => 'BAACAgEAAxkBAAMnYIxjfJOmVkCmWhr9qfGR797xwWsAApUBAALLnGBEBGg4rE7R9p8fBA', 'name' => 'undressing', 'premium' => true ],
	[ 'link' => 'https://cloud.mail.ru/public/BqnR/MoVWqzgkC', 'image' => 'BAACAgEAAxkBAAMmYIxjcHZlO6U62feseJypfOv0VlIAApQBAALLnGBEFzCmmItfQzgfBA', 'name' => 'undressing2', 'premium' => true ]];
/*parse params*/
if (isset($_GET['v'])) {
	goto metka;
}
/*main function*/
function razbor($result)
{
	global $images;
	global $videos;
	global $achat;
	global $token;
	if (isset($result['message'])) {
		$chat_id = $result['message']['chat']['id'];
		$first_name = $result['message']['from']['first_name'];
		$last_name = $result['message']['from']['last_name'];
		$from_username = $result['message']['from']['username'];
		$from_language_code = $result['message']['from']['language_code'];
		$date = $result['message']['date'];
		$date = date(DATE_RFC822, $date);
		$text = $result['message']['text'];
		switch ($text) {
			case '/start':
				start($chat_id);
				break;
			case 'aback':
				$markup = start_keyboard();
				$message_id = sendMessage($chat_id, 'Main menu', $markup);
				die;
				break;
			case 'chatid':
				sendMessage($chat_id, $chat_id);
				break;
			case '🔙?Back':
				start($chat_id);
				break;
			case '📸Photo':
				paginator($chat_id, 'photos', 0);
				break;
			case '📹Video':
				paginator($chat_id, 'videos', 0);
				break;
			case '💲Donate':
				donate($chat_id);
				break;
			case '📧Contact':
				contact($chat_id);
				break;
			default:
				$adms = '';
				foreach($achat as $adm)
					$adms.=$adm;
				if (preg_match('/adm/', $text) && preg_match("/$chat_id/", $adms)) {
					$adm = $chat_id;
					//feedbackAdmin($text, $chat_id);
					$params = explode('-', $text);
					$op = $params[1];
					$chat_id1 = $params[2];
					$caption = back_keyboard();
					if (preg_match('/prem/', $op)) {
						$dop = $params[3];
						$res = mypdo("SELECT * FROM users WHERE chat_id='$chat_id1'");
						$id = $res[0]['id'];
						if ($dop == 'all') {
							$premium .= ",";
							for($i = 0; $i < count($videos); $i++)
								$premium .= "$i,";
							$message_id = sendMessage($chat_id1, 'Your premium link for all videos https://cloud.mail.ru/public/MLDW/16oMAiiqb', $caption);						
						} else {
							$premium = $res[0]['premium'];
							$premium .= "$dop,";
							$message_id = sendMessage($chat_id1, 'Your premium link for payed video '.$videos[$dop]['link'], $caption);
						}
						mypdo("UPDATE users SET premium='$premium' WHERE id='$id'");
						feedbackAdmin("Good send premium $chat_id1; $message_id", $chat_id);
					}
					if (preg_match('/donat/', $op)) {
						$message_id = sendMessage($chat_id1, 'Thank you for donate. Your prize link https://cloud.mail.ru/public/Gvny/8fvsuuzMQ', $caption);
						feedbackAdmin("Good send donate $chat_id1; $message_id", $chat_id);
					}
					if (preg_match('/sms/', $op)) {
							$dop = $params[3];
							$message_id = sendMessage($chat_id1, $dop, $caption);
							feedbackAdmin("Good send answer $chat_id1; $message_id", $chat_id);
					}
					if (preg_match('/help/', $op)) {
						feedbackAdmin("adm-prem-chatid-number; adm-prem-chatid-all; adm-donat-chatid; adm-sms-chatid-text||adm-v-stats; adm-v-users; adm-v-clearus; adm-v-clearst; adm-help; adm-wall; adm-links", $chat_id);
					}	
					if (preg_match('/links/', $op)) {
						feedbackAdmin("https://cloud.mail.ru/public/Gvny/8fvsuuzMQ донат
						https://cloud.mail.ru/public/MLDW/16oMAiiqb олл", $chat_id);
					}		
					if (preg_match('/wall/', $op)) {
						feedbackAdmin("https://bitref.com/bc1qwgkqyl982ugp37ae0kme8m7t70gax5um094squ", $chat_id);
					}						
					if (preg_match('/users/', $chat_id1)) {
						$body = '<html><head></head><body><table><thead><tr><th>id</th><th>chat_id</th><th>message_id</th><th>premium</th></tr></thead><tbody>';
						$results = mypdo("SELECT * FROM users");
						foreach ($results as $row) {
							$id = $row['id'];
							$chat_id1 = $row['chat_id'];
							$message_id = $row['message_id'];
							$premium = $row['premium'];
							$body .= "<tr><td>$id</td><td>$chat_id1</td><td>$message_id</td><td>$premium</td></tr>";
						}
						$body .= '</tbody></table></body></html>';
						$path = __DIR__.'/users.html';
						file_put_contents($path, $body);
						$filepath = realpath($path);
						//foreach ($achat as $adm):
							$post = array('chat_id' => $adm,'document'=>new CurlFile($filepath));
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot$token/sendDocument");
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
							curl_exec ($ch);
							curl_close ($ch); 	
						//endforeach;
					}						
					if (preg_match('/stats/', $chat_id1)) {
						$path = __DIR__.'/stats.txt';
						$ddata = file_get_contents($path);
						$body = "<html><head></head><body><table><thead><tr><th>chat_id</th><th>date</th><th>user</th><th>command</th></tr></thead><tbody>$ddata</tbody></table></body></html>";
						$path = __DIR__.'/stats.html';
						file_put_contents($path, $body);
						$filepath = realpath($path);
						//foreach ($achat as $adm):
							$post = array('chat_id' => $adm,'document'=>new CurlFile($filepath));
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot$token/sendDocument");
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
							curl_exec ($ch);
							curl_close ($ch);
						//endforeach;
					}
					if (preg_match('/clearus/', $chat_id1)) {
						$query = "SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `chat_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `message_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `premium` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB COLLATE 'utf8_general_ci';";
  						$res = mypdo($query).' clear us';
						feedbackAdmin($res, $chat_id);
					}
					if (preg_match('/clearst/', $chat_id1)) {
						$path = __DIR__.'/stats.txt';
						$b = file_put_contents($path, '');
						$path = __DIR__.'/stats.html';
						$d = file_put_contents($path, '');
						feedbackAdmin('clear st '.$b.' '.$d, $chat_id);
					}
					die;
				} else {					
					$caption = back_keyboard();
					sendMessage($chat_id, 'ok i will read your message and send you an answer✏️', $caption);
					feedbackAdmin("msg $text adm-sms-$chat_id-text");
				}
		}
		$user = "$first_name;$last_name;$from_username;$from_language_code";
		$body = "<tr><td>$chat_id</td><td>$date</td><td>$user</td><td>$text</td></tr>";
		$path = __DIR__.'/stats.txt';
		file_put_contents($path, $body, FILE_APPEND);
	}
	if (isset($result['callback_query'])){
		$callback_data = $result['callback_query']['data'];
		$chat_id = $result['callback_query']['message']['chat']['id'];
		$date = $result['callback_query']['message']['date'];
		$date = date(DATE_RFC822, $date);
		if (preg_match('/back/', $callback_data))
			start($chat_id);
		preg_match_all('/\d+/', $callback_data, $matches);
		$number = isset($matches[0][0])?$matches[0][0]:'';
		if (preg_match('/buyvds/', $callback_data))
			buy($chat_id, $number);
		elseif (preg_match('/vds/', $callback_data))
			paginator($chat_id, 'videos', $number);	
		elseif (preg_match('/img/', $callback_data))
			paginator($chat_id, 'photos', $number);
		$body = "<tr><td>$chat_id</td><td>$date</td><td>callback</td><td>$callback_data</td></tr>";
		$path = __DIR__.'/stats.txt';
		file_put_contents($path, $body, FILE_APPEND);
	}
}
/*helper functions*/
function start($chat_id)
{
	if ($res = mypdo("SELECT * FROM users WHERE chat_id='$chat_id'")) {
		$id = $res[0]['id'];
		$message_id_del = $res[0]['message_id'];
		$markup = start_keyboard();
		$message_id = sendMessage($chat_id, 'Main menu', $markup);
		mypdo("UPDATE users SET message_id='$message_id' WHERE id='$id'");
		deleteMessage($chat_id, $message_id_del);
	} else {
		$markup = start_keyboard();
		$message_id = sendMessage($chat_id, 'Hello, I\'am Lisa see my photos and videos❤️', $markup);
		mypdo("INSERT INTO users (chat_id, message_id, premium) VALUES ('$chat_id', '$message_id', ',')");
	}
}
function paginator($chat_id, $type, $number)
{
	global $videos;
	global $images;
	$res = mypdo("SELECT * FROM users WHERE chat_id='$chat_id'");
	$message_id_del = $res[0]['message_id'];
	$id = $res[0]['id'];
	if (preg_match('/photos/', $type)) {
		$markup = photo_keyboard($number);
		$caption = 'See my private photos😍';
		$image = $images[$number];
		$message_id = sendPhoto($chat_id, $image, $caption, $markup);
	}
	if (preg_match('/videos/', $type)) {
		$caption = $videos[$number]['name'];
		$video = $videos[$number]['image'];
		$premiumneed = $videos[$number]['premium'];
		if ($premiumneed) {
			$premium = $res[0]['premium'];
			$regex = "/,$number,/";
			if (preg_match($regex, $premium))
				$premium = true;
			else
				$premium = false;
		} else
			$premium = true;			
		$markup = video_keyboard($number, $premium);
		$message_id = sendVideo($chat_id, $video, $caption, $markup);
	}
	
	mypdo("UPDATE users SET message_id='$message_id' WHERE id='$id'");
	deleteMessage($chat_id, $message_id_del);
}
function donate($chat_id){
	$res = mypdo("SELECT * FROM users WHERE chat_id='$chat_id'");
	$message_id_del = $res[0]['message_id'];
	$id = $res[0]['id'];
	$markup =back_keyboard();
	$message = "You will receive some private videos after this action.
	Donate me any amount with btc transaction to BTC adress - bc1qwgkqyl982ugp37ae0kme8m7t70gax5um094squ or use this qr code.
	You can use localcryptos.com or localbitcoins.net to buy BTC by PayPal, Visa\MasterCard, WeChat, etc.
	For	example watch how to use localcryptos.com in this video https://www.youtube.com/watch?v=LaNKSnOA5oA
	After payment write in entry field and send me a message with information about transaction.";
	$image = 'AgACAgEAAxkBAAIBUmCHI8ahXxrN7PUJ6zK0KlXz7F38AALpqTEborM5RP7d_aNpgTqdCxgdTRcAAwEAAwIAA20AAzs2AAIfBA';
	//$message_id = sendMessage($chat_id, $message, $markup);
	$message_id = sendPhoto($chat_id, $image, $message, $markup);
	mypdo("UPDATE users SET message_id='$message_id' WHERE id='$id'");
	deleteMessage($chat_id, $message_id_del);
	feedbackAdmin("id $id donat adm-donat-$chat_id");
}
function contact($chat_id){
	$res = mypdo("SELECT * FROM users WHERE chat_id='$chat_id'");
	$message_id_del = $res[0]['message_id'];
	$id = $res[0]['id'];
	$markup =back_keyboard();
	$message = "Send me a message and i will answer it✍";
	$message_id = sendMessage($chat_id, $message, $markup);
	mypdo("UPDATE users SET message_id='$message_id' WHERE id='$id'");
	deleteMessage($chat_id, $message_id_del);
}
function buy($chat_id, $number){
	$res = mypdo("SELECT * FROM users WHERE chat_id='$chat_id'");
	$message_id_del = $res[0]['message_id'];
	$id = $res[0]['id'];
	$markup =back_keyboard();
	$message = "You will receive some this videos after payed. Price of each video 0.0002 btc eq \$12.
	For	buy all videos send me 0.0017 btc eq \$100.
	Send me amount with btc transaction to BTC adress - bc1qwgkqyl982ugp37ae0kme8m7t70gax5um094squ or use this qr code.
	You can use localcryptos.com or localbitcoins.net to buy BTC by PayPal, Visa\MasterCard, WeChat, etc.
	For	example watch how to use localcryptos.com in this video https://www.youtube.com/watch?v=LaNKSnOA5oA
	After payment write in entry field and send me a message with information about transaction.";
	$image = 'AgACAgEAAxkBAAIBUWCHI4z0-mjovm4zPgtGcp88BP4aAALoqTEborM5RC3E4k4qI08tOZEbTRcAAwEAAwIAA20AAwQ4AAIfBA';
	//$message_id = sendMessage($chat_id, $message, $markup);
	$message_id = sendPhoto($chat_id, $image, $message, $markup);
	mypdo("UPDATE users SET message_id='$message_id' WHERE id='$id'");
	deleteMessage($chat_id, $message_id_del);
	feedbackAdmin("id $id buy adm-prem-$chat_id-$number");
}
/*system func*/
function feedbackAdmin($text, $chat_id=null){
	global $achat;
	$caption = json_encode($keyboard = ['keyboard' => [
			['aback']
		] ,
		'resize_keyboard' => true,
		'one_time_keyboard' => false,
		'selective' => true
	],true);
	if ($chat_id)
		sendMessage($chat_id, $text, $caption);
	else
		foreach ($achat as $adm)
			sendMessage($adm, $text, $caption);
}
/*keyboards*/
function start_keyboard()
{
	$keyboard = json_encode($keyboard = ['keyboard' => [
			['📸Photo','📹Video'],
			['💲Donate','📧Contact']
		] ,
		'resize_keyboard' => true,
		'one_time_keyboard' => false,
		'selective' => true
	],true);
	return $keyboard;
}
function back_keyboard()
{
	$keyboard = json_encode($keyboard = ['keyboard' => [
		['🔙?Back']
		] ,
		'resize_keyboard' => true,
		'one_time_keyboard' => false,
		'selective' => true
	],true);
	return $keyboard;
}
function photo_keyboard($number)
{
	global $images;
	$vsego = count($images);
	if (isset($images[$number + 1]))
		$next = $number + 1;
	else
		$next = 0;
	if (isset($images[$number - 1]))
		$prev = $number - 1;
	else
		$prev = $vsego - 1;
	$a = '[[{"text":"<","callback_data":"<img'.$prev.'"},{"text":"'.++$number.'/'.$vsego.'","callback_data":"none"},{"text":">","callback_data":">img'.$next.'"}],[{"text":"🔙Back","callback_data":"back"}]]';
	$keyboard = json_encode(array("inline_keyboard" =>  json_decode( $a ) ));
	return $keyboard;
}

function video_keyboard($number, $premium)
{
	global $videos;
	global $se;
	$vsego = count($videos);
	if (isset($videos[$number + 1]))
		$next = $number + 1;
	else
		$next = 0;
	if (isset($videos[$number - 1]))
		$prev = $number - 1;
	else
		$prev = $vsego - 1;
	$link = $videos[$number]['link'];
	$typeb = $link?'url':'callback_data';
	$nameb = $link?'download full video':'*';
	$link = $link?$link:'dibil';
	$rnumber = $number + 1;
	if ($premium)
		$a = '[[{"text":"<","callback_data":"<vds'.$prev.'"},{"text":"'.$rnumber.'/'.$vsego.'","callback_data":"none"},{"text":">","callback_data":">vds'.$next.'"}],[{"text":"'.$nameb.'","'.$typeb.'":"'.$link.'"}],[{"text":"🔙Back","callback_data":"back"}]]';
	else
		$a = '[[{"text":"<","callback_data":"<vds'.$prev.'"},{"text":"'.$rnumber.'/'.$vsego.'","callback_data":"none"},{"text":">","callback_data":">vds'.$next.'"}],[{"text":"buy full video","callback_data":"buyvds'.$number.'"}],[{"text":"🔙Back","callback_data":"back"}]]';
	$keyboard = json_encode(array("inline_keyboard" =>  json_decode( $a ) ));
	return $keyboard;
}
/*work updates*/
if (!empty(file_get_contents('php://input'))) {
	$result = false;
	if (isset($_POST)) {
		$data = file_get_contents("php://input");
		if (json_decode($data) != null)
			$result = json_decode($data, true);
	}
	razbor($result);
} else {
	echo 'hello world!';
	die;
}
function getUpdates($offset=null)
{
	if ($offset == 'x') {
		return request("getUpdates");
	}	
	return $offset?request("getUpdates?&offset=$offset"):request("getUpdates?timeout=10");
}
function feachres($arr)
{
	$last_update=FALSE;
	////////////test counts///////////
	if (count($results = $arr['result'])) {
		if (isset($results[0]['update_id'])) {
			foreach ($results as $result) {
				global $last_update;
				$update_id = $result['update_id'];
				if ($update_id) {
					$last_update = $update_id;
				}
				razbor($result);
			}
		} else {
			razbor($results);
		}
	}
	////////////last update///////////
	if ($last_update) {
		$last_update++;
		getUpdates($last_update);
	}
}
/*message work*/
function sendMessage($chat_id, $text, $markup=null)
{
	$url = "sendMessage?chat_id=$chat_id&text=".urlencode($text);
	if ($markup) {
		$url = $url."&reply_markup=$markup&parse_mode=Markdown";
	}
	$result = request($url);
	return $result['result']['message_id'];
}
function deleteMessage($chat_id, $message_id)
{
	return request("deleteMessage?chat_id=$chat_id&message_id=$message_id");
}
function sendPhoto($chat_id, $photo, $caption, $markup=null)
{
	$result = request("sendPhoto?chat_id=$chat_id&photo=$photo&caption=".urlencode($caption)."&reply_markup=$markup&parse_mode=Markdown");
	return $result['result']['message_id'];
}
function sendVideo($chat_id, $video, $caption, $markup=null)
{
	$result = request("sendVideo?chat_id=$chat_id&video=$video&caption=".urlencode($caption)."&reply_markup=$markup&parse_mode=Markdown");
	return $result['result']['message_id'];
}
/*admin panel*/
metka:
if (isset($_GET['v'])) {
	switch ($_GET['v']) {
			case 'pif':
			echo '<pre>';
			print_r($_SERVER);
			echo '</pre>';
			phpinfo();
			break;
		case 'start':
			for ($i = 0; $i < 3; $i++) {
				$results = getUpdates();
				feachres($results);	
			}
			break;
		case 'whtest':
			$webhook = 'https://api.telegram.org/bot'.$token.'/'.'setWebhook?url='.'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			echo('Наш вебхук '.$webhook);
			break;
		case 'wh':
			$webhook = 'https://api.telegram.org/bot'.$token.'/'.'setWebhook?url='.'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			echo('Установка вебхука'.$webhook);
			print_r(file_get_contents($webhook));
			break;
		case 'db':
			$query = "SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `chat_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `message_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `premium` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB COLLATE 'utf8_general_ci';";
			print_r(mypdo($query));
			$path = __DIR__.'/stats.txt';
			$ddata = file_put_contents($path, '');
			echo '<br>tables completed '.$ddata;
			break;
		case 'users':
		echo '<table><thead><tr><th>id</th><th>chat_id</th><th>message_id</th><th>premium</th></tr></thead><tbody>';
			$results = mypdo("SELECT * FROM users");
			foreach ($results as $row) {
				$id = $row['id'];
				$chat_id = $row['chat_id'];
				$message_id = $row['message_id'];
				$premium = $row['premium'];
				echo "<tr><td>$id</td><td>$chat_id</td><td>$message_id</td><td>$premium</td></tr>";
			}
			echo '</tbody></table>';
			break;
		case 'stats':
			$path = __DIR__.'/stats.txt';
			$ddata = file_get_contents($path);
			$body = "<html><head></head><body><table><thead><tr><th>chat_id</th><th>date</th><th>user</th><th>command</th></tr></thead><tbody>$ddata</tbody></table></body></html>";
			echo $body;
			break;
		case 'drall':
			print_r(mypdo("DROP TABLE users"));
			$path = __DIR__.'/stats.txt';
			$ddata = file_put_contents($path, '');
			echo '<br>dropped all tables '.$ddata;
			$path = __DIR__.'/stats.html';
			$ddata = file_put_contents($path, '');
			break;
		case 'update':
			$arr = getUpdates('x');
			$last_update=FALSE;
			////////////test counts///////////
			if (count($results = $arr['result'])) {
				if (isset($results[0]['update_id'])) {
					foreach ($results as $result) {
						global $last_update;
						$update_id = $result['update_id'];
						if ($update_id) {
							$last_update = $update_id;
						}
						echo '<pre>';
						print_r($result);
						echo '</pre>';
					}
				} else {
					echo '<pre>';
					print_r($results);
					echo '</pre>';
				}
			}
			////////////last update///////////
			if ($last_update) {
				$last_update++;
				getUpdates($last_update);
			}
			break;
		default:
		echo 'db - users - stats - drall - update - whtest - wh - start - pif';
			break;
	}
}
/*service*/
function mypdo($query)
{
	global $pdo;
	try {
		if (!$pdo) {
			$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		}
	} catch (PDOException $e) {
		feedbackAdmin('Error execute requst '.$e.' query '.$query);
	}
	try {
		if (preg_match('/SELECT/', $query)) {
			$result = $pdo->query($query);
			$res = $result->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		} else {
			$res = $pdo->exec($query);
			return $res;
		}} catch (PDOException $e) {
		feedbackAdmin('Error execute requst '.$e.' query '.$query);
	}
}
function request($method)
{
	global $token;
	$url = "https://api.telegram.org/bot$token/$method";
	//echo $url;
	for ($i = 0; $i < 3; $i++) {
		try {
			$result = file_get_contents($url);
			$result = json_decode($result, true);
			if (isset($result['ok']) and $result['ok']) {
				return $result;
			}
		} catch (Exception $e) {
			$xz = 1+1;//echo 'Error http request '.$e;
		}
	}
	feedbackAdmin('Error request with 3 try '.$e.' url '.$url);
	exit;
}
?>
</body>
</html>
