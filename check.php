<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $furigana = $_POST["furigana"];
    $postal_code = $_POST["postal_code"];
    $prefecture = $_POST["prefecture"];
    $address = $_POST["address"];
    $street = $_POST["street"];
    $mail = $_POST["mail"];
    $phone = $_POST["phone"];
    $question = $_POST["question"];
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
<section id="form_check">
  <div class="nav_step">
  <ul>
    <li>入力</li>
    <li class="step">確認</li>
    <li>完了</li>
    </ul>
  </div>
  <h2>確認画面</h2>
   <p class="center">以下の情報を確認してください</p>
   <form action="mail.php" method="POST">
   <table>
          <tr>
     <th>お名前<input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>"></th>
     <td><span><?php echo htmlspecialchars($name,ENT_QUOTES, 'UTF-8'); ?></span></td>
  </tr>
  <tr>
  <th>ふりがな<input type="hidden" name="furigana" value="<?php echo htmlspecialchars($furigana); ?>"></th>
  <td><span><?php echo htmlspecialchars($furigana); ?></span></td>
  </tr>
  <th>郵便番号<input type="hidden" name="postal_code" value="<?php echo htmlspecialchars($postal_code); ?>"></th>
  <td><span><?php echo htmlspecialchars($postal_code); ?></span></td>
  <tr>
     <th>住所<input type="hidden" name="prefecture" value="<?php echo htmlspecialchars($prefecture . ' ' . $address. ' ' .$street); ?>"></th>
     <td><span><?php echo htmlspecialchars($prefecture . ' ' . $address. ' ' .$street ); ?></span></td>
     </tr>
  <tr>
     <th>メール<input type="hidden" name="mail" value="<?php echo htmlspecialchars($mail); ?>"></th>
     <td><span><?php echo htmlspecialchars($mail); ?></span></td>
     </tr>
  <tr>
     <th>電話番号<input type="hidden" name="phone" value="<?php echo htmlspecialchars($phone); ?>"></th>
     <td><span><?php echo htmlspecialchars($phone); ?></span></td>
     </tr>
  <tr>
     <th>質問<input type="hidden" name="question" value="<?php echo htmlspecialchars($question); ?>"></th>
     <td><span><?php echo htmlspecialchars($question); ?></span></td>
     </tr>
    </table>
  <div class="form_btn">
  <input type="button" class="reset" value="戻る" onClick='history.back()'>
     <input type="submit" value="送信" class="submit">
     </div>
 </form>
 </section>
  </main>
  <footer>【運営会社】株式会社NEXTイノベーション</br>
    〒169-0072 東京都新宿区大久保一丁目2-1 天翔オフィス東新宿207号室
  </footer>
</body>

</html>
