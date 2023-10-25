<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // ユーザー入力をサニタイズ
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $furigana = htmlspecialchars($_POST["furigana"], ENT_QUOTES, 'UTF-8');
    $postal_code = htmlspecialchars($_POST["postal_code"], ENT_QUOTES, 'UTF-8');
    $prefecture = htmlspecialchars($_POST["prefecture"], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST["address"], ENT_QUOTES, 'UTF-8');
    $street = htmlspecialchars($_POST["street"], ENT_QUOTES, 'UTF-8');
    $mail = htmlspecialchars($_POST["mail"], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST["phone"], ENT_QUOTES, 'UTF-8');
    $question = htmlspecialchars($_POST["question"], ENT_QUOTES, 'UTF-8');
    
    // サーバーサイドバリデーション
    $errors = array();

    // 名前のバリデーション
    if (empty($name) || strlen($name) < 2 || strlen($name) > 20) {
        $errors["name"] = "名前は2文字以上20文字未満で入力してください";
    }

    // ふりがなのバリデーション
    if (empty($furigana) || strlen($furigana) < 2 || strlen($furigana) > 20) {
        $errors['furigana'] = 'ふりがなは2文字以上20文字未満で入力してください';
    }

    // 郵便番号のバリデーション
    if (empty($postal_code) || !preg_match('/^\d{7,8}$/', $postal_code)) {
        $errors['postal_code'] = '郵便番号はハイフンなしの7桁または8桁で入力してください';
    }

    // 都道府県のバリデーション
    if (empty($prefecture)) {
        $errors['prefecture'] = '都道府県を入力してください';
    }

    // 市区町村のバリデーション
    if (empty($address)) {
        $errors['address'] = '市区町村を入力してください';
    }

    // メールアドレスのバリデーション
    if (!empty($mail) && !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'メール形式で入力してください';
    }

    // 電話番号のバリデーション
    if (empty($phone) || !preg_match('/^\d{10,11}$/', $phone)) {
        $errors['phone'] = '電話番号はハイフンなしの10桁または11桁で入力してください';
    }

    // バリデーション結果の返却
    if (!empty($errors)) {
        header("HTTP/1.1 422 Unprocessable Entity");
        echo json_encode($errors);
    } else {
        header("Location: check.php");
        exit;
    }
}
?>
<html lang="ja">
<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WNJPZ55');
  </script>
  <!-- End Google Tag Manager -->
  <script src="js/jquery-3.6.0.min.js"></script>
  <meta charset="utf-8">
  <title>スターキー補聴器レンタル広場</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link rel="icon" href="./img/favicon.ico">
  <link rel="shortcut icon" href="" type="image/x-icon">
  <link rel="apple-touch-icon" href="" sizes="180x180">
  <link rel="icon" type="image/png" href="" sizes="192x192">
  <link href="./css/style.css" rel="stylesheet">
  <link href="./css/phone.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
<!-- 郵便番号自動入力 -->
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<!-- 名前自動入力 -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WNJPZ55" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <main>
    <header>
      <img src="./img/logo.png" class="logo">
      <h1>スターキー補聴器レンタル広場</h1>
    </header>
<section id="form_input">
  <div class="nav_step">
  <ul>
    <li class="step">入力</li>
    <li>確認</li>
    <li>完了</li>
    </ul>
  </div>
    <h2>入力画面</h2>
  <form action="check.php" method="POST" class="h-adr">
    <input type="hidden" class="p-country-name" value="Japan">
      <table>
          <tr>
              <th><label for="name">お名前</label><span class="indispensable">必須</span></th>
              <td><input type="text" id="name" name="name" placeholder="山田太郎"></td>
              <td class="caution"><div class="name_error"></div></td>
          </tr>
          <tr>
              <th><label for="furigana">ふりがな</label></th>
              <td><input type="text" id="furigana" name="furigana"placeholder="やまだたろう"></td>
              <td class="caution"><div class="furigana_error"></div></td>
          </tr>
          <tr>
           <th><label for="address">住所</label><span class="indispensable">必須</span></th>
           <td>
           〒<input type="text" id="postal_code" name="postal_code" class="p-postal-code" placeholder="1112222"><br>
           <select id="prefecture" name="prefecture" class="p-region" ><br>
           <option value="">都道府県</option>
           <option value="北海道">北海道</option>
           <option value="青森県">青森県</option>
           <option value="岩手県">岩手県</option>
           <option value="宮城県">宮城県</option>
           <option value="秋田県">秋田県</option>
           <option value="山形県">山形県</option>
           <option value="福島県">福島県</option>
           <option value="茨城県">茨城県</option>
           <option value="栃木県">栃木県</option>
           <option value="群馬県">群馬県</option>
           <option value="埼玉県">埼玉県</option>
           <option value="千葉県">千葉県</option>
           <option value="東京都">東京都</option>
           <option value="神奈川県">神奈川県</option>
           <option value="新潟県">新潟県</option>
           <option value="富山県">富山県</option>
           <option value="石川県">石川県</option>
           <option value="福井県">福井県</option>
           <option value="山梨県">山梨県</option>
           <option value="長野県">長野県</option>
           <option value="岐阜県">岐阜県</option>
           <option value="静岡県">静岡県</option>
           <option value="愛知県">愛知県</option>
           <option value="三重県">三重県</option>
           <option value="滋賀県">滋賀県</option>
           <option value="京都府">京都府</option>
           <option value="大阪府">大阪府</option>
           <option value="兵庫県">兵庫県</option>
           <option value="奈良県">奈良県</option>
           <option value="和歌山県">和歌山県</option>
           <option value="鳥取県">鳥取県</option>
           <option value="島根県">島根県</option>
           <option value="岡山県">岡山県</option>
           <option value="広島県">広島県</option>
           <option value="山口県">山口県</option>
           <option value="徳島県">徳島県</option>
           <option value="香川県">香川県</option>
           <option value="愛媛県">愛媛県</option>
           <option value="高知県">高知県</option>
           <option value="福岡県">福岡県</option>
           <option value="佐賀県">佐賀県</option>
           <option value="長崎県">長崎県</option>
           <option value="熊本県">熊本県</option>
           <option value="大分県">大分県</option>
           <option value="宮崎県">宮崎県</option>
           <option value="鹿児島県">鹿児島県</option>
           <option value="沖縄県">沖縄県</option>
       </select></br>
       <input type="text" id="address" name="address" class="p-locality p-street-address p-extended-address"  placeholder="市区町村" ><br>
       <input type="text" name="street"  placeholder="それ以降の番地(任意)"><br>
     </td>
     <td class="caution"><div class="postal_code_error"></div></td>
     <td class="caution"><div class="prefecture_error"></div></td>
     <td class="caution"><div class="address_error"></div></td>
          </tr>
          <tr>
              <th><label for="address">メールアドレス</label></th>
              <td><input type="text" id="mail" name="mail" placeholder="info@example.com"></td>
              <td class="caution"><div class="mail_error"></div></td>
          </tr>
          <tr>
              <th><label for="phone">電話番号</label><span class="indispensable">必須</span></th>
              <td><input type="tel" id="phone" name="phone" placeholder="08011112222"></td>
               <td class="caution"><div class="phone_error"></div></td>
          </tr>
          <tr>

              <th><label for="question">質問</label></th>
              <td><textarea id="question" name="question" rows="4" cols="50" placeholder="ご質問があればご記入ください"></textarea></td>
          </tr>
      </table>
      <div class="privacy_policy">
<h3>個人情報取り扱い同意書</h3>
株式会社NEXTイノベーション(以下「当社」)では、お預かりした個人情報について、以下のとおり適正かつ安全に管理・運用することに努めます。

<h4>１．利用目的</h4>
当社は、収集した個人情報について、以下の目的のために利用いたします。

①商品発送やサービス実施、およびアフターサービスのため
②資料請求に対する発送のため
③相談・お問い合わせへの回答のため
④商品・サービス・イベントの案内のため

<h4>２．第三者提供</h4>
当社は、以下の場合を除いて、個人データを第三者へ提供することはしません。

①法令に基づく場合
②人の生命・身体・財産を保護するために必要で、本人から同意を得ることが難しい場合
③公衆衛生の向上・児童の健全な育成のために必要で、本人から同意を得ることが難しい場合
④国の機関や地方公共団体、その委託者などによる法令事務の遂行にあたって協力する必要があり、かつ本人の同意を得ることで事務遂行に影響が生じる可能性がある場合
      </div>
      <p>上記の個人情報の取扱いに関する事項について、
同意の方のみ送信ボタンをクリックして次にお進みください。</p>
<div class="form_btn">
      <input type="reset"class="reset">
      <input type="submit" value="送信" class="submit">
    </div>
  </form>
</section>
  </main>
  <footer>【運営会社】株式会社NEXTイノベーション</br>
    〒169-0072 東京都新宿区大久保一丁目2-1 天翔オフィス東新宿207号室
  </footer>
</body>
<!-- クライアントサイドバリテーション -->
<script src="./js/jquery.validate.min.js"></script>
<script src="./js/validate.js"></script>--><!--自分で作成するjsファイル-->
<!-- 名前自動入力 -->
<script type="text/javascript" src="./js/jquery.autoKana.js"></script>
<script>
$(function() {
      $.fn.autoKana('#name', '#furigana', {katakana : false});
  });
</script>
</html>
