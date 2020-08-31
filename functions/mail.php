<?php
	$mailarea = htmlspecialchars($_POST['mailarea'], ENT_QUOTES);
	$namearea = htmlspecialchars($_POST['namearea'], ENT_QUOTES);
	$textboxarea = htmlspecialchars($_POST['textboxarea'], ENT_QUOTES);
	
	//セット
	header("Content-Type:text/html; charset=UTF-8");
	mb_language("japanese");
	mb_internal_encoding("utf-8");
		
	//送信先メールアドレス
	$mail="kdw3227@gmail.com";
	//タイトル
	$sub1="[自動返信] STARTOUTへのお問合せが完了しました";
	//ユーザーメールアドレス
	$mail_to = $mailarea;
	
	//本文
	$messegeall .= "STARTOUTへのお問合せありがとうございます。\n";
	$messegeall .= "今後とも、何卒、よろしくお願いいたします。\n";
	$messegeall .= "\n";
	$messegeall .= "─登録内容の確認─────────────────\n";
	$messegeall .= "\n";
	$messegeall .= "お名前：".$namearea."\n";
	$messegeall .= "メールアドレス：".$mailarea."\n";
	$messegeall .= "テキスト：\n";
	$messegeall .= $textboxarea."\n";
	$messegeall .= "\n";
	$messegeall .= "─────────────────────────\n";
	$messegeall .= "\n";
	$messegeall .= "============================================\n";
	$messegeall .= "このメールは自動送信です。\n";
	$messegeall .= "お心当たりのない方は、お手数をおかけいたしますが、\n";
	$messegeall .= "下記メールアドレスまでご連絡ください。\n";
	$messegeall .= "============================================\n";
	$messegeall .= "\n";
	$messegeall .= "\n";
	$messegeall .= "━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
	$messegeall .= "　Wigoutbreak\n";
	$messegeall .= "　E-mail：kdw3227@gmail.com\n";
	$messegeall .= "━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
	$messegeall .= "　webクリエイター\n";
	$messegeall .= "　◆グローバルな「デザイナー×エンジニア×起業家」\n";
	$messegeall .= "　https://wigoutbreak.com/\n";
	$messegeall .= "━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
	
	//$success1=mb_send_mail(送り先メアド,タイトル,メッセージ内容,"From:".送り元メアド);
	$success1=mb_send_mail($mail_to,$sub1,$messegeall,"From:".$mail);
	//自動返信メール(送り先メアド&送り元メアドを交換が条件)
	$success2=mb_send_mail($mail,$sub1,$messegeall,"From:".$mail_to);
	
	//json
	header('Content-type: application/json');
	echo json_encode( "送信が完了しました！" );
?>