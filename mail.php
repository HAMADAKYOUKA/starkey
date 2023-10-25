<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータを受け取る
$name = $_POST['name'];
$furigana = $_POST['furigana'];
$postal_code = $_POST['postal_code'];
$prefecture = $_POST['prefecture'];
$mail =  $_POST['mail'];
$phone = $_POST['phone'];
$question = $_POST['question'];
if (!empty($mail)) {
//リマインドメール
$subject = "STARKEYレンタル広場｜申込み";
$header = "From: k-hamada@nxti.co.jp";
$body = $name."さま\n\n"
        ."この度はお問い合わせいただき、誠に有難うございます。\n
         追って担当者よりご連絡致しますので、\n
         今しばらくお待ち下さいますようお願い申し上げます。\n
         ※万が一2～3日中に担当者より折り返しのご連絡が無い場合、\n
         大変お手数ではございますが「フリーダイヤル：0120-914-273」宛までご連絡をお願い致します。\n
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n"

        ."お名前：" . $name . "\n"
        ."ふりがな：" . $furigana . "\n"
        ."郵便番号：" . $postal_code . "\n"
        ."住所：" . $prefecture .  "\n"
        ."メールアドレス：" . $mail . "\n"
        ."電話番号： " . $phone . "\n"
        ."質問：" . $question .

"\n\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝";

//管理者に送信
$subject2 = "【LP】STARKEYレンタル広場｜申込み";
$body2 = "お問い合わせは、下記の通りです。". "\n
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n"
        ."お名前：" . $name . "\n"
        ."ふりがな：" . $furigana . "\n"
        ."郵便番号：" . $postal_code . "\n"
        ."住所：" . $prefecture .  "\n"
        ."メールアドレス：" . $mail . "\n"
        ."電話番号： " . $phone . "\n"
        ."質問：" . $question . "\n\n
\n\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝";

mb_language("ja");
mb_internal_encoding("UTF-8");
if (mb_send_mail($mail, $subject, $body, $header)) {
    mb_send_mail($header, $subject2, $body2);
    header("Location: thanks.php");
    exit;
} else {
    echo "メールの送信に失敗しました";
    exit;
}
} else {
  //管理者に送信
  $subject2 = "【LP】STARKEYレンタル広場｜申込み";
  $body2 = "お問い合わせは、下記の通りです。". "\n
  ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n"
          ."お名前：" . $name . "\n"
          ."ふりがな：" . $furigana . "\n"
          ."郵便番号：" . $postal_code . "\n"
          ."住所：" . $prefecture .  "\n"
          ."メールアドレス：" . $mail . "\n"
          ."電話番号： " . $phone . "\n"
          ."質問：" . $question . "\n\n
  \n\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝";
}
mb_language("ja");
       mb_internal_encoding("UTF-8");
       if (mb_send_mail($header, $subject2, $body2 )) {
           header("Location: thanks.php");
           exit;
       } else {
           echo "メールの送信に失敗しました";
           exit;
       }
   }
}
?>
