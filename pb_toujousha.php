<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>プレジャーボート保険料計算</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106871737-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-106871737-1');
</script>
</head>
<body>
<header>
    <div class="container">
        <h1><a href="index.html">ＰＢ搭乗者傷害保険とは</a></h1>
        <img class="header_img" src="img/header.png" width="80%" height= auto>
    </div>
</header>
<main>
    <div class="container">
        <p class="explain">ご加入のプレジャーボートに搭乗中の方（操縦者を含みます）が、プレジャーボートの航行に起因する事故、プレジャーボート航行中の衝突、火災、爆発またはプレジャーボートのその他不測かつ突発的な事故により死亡されたり、後遺障害または傷害を被られた場合、あらかじめ定められた金額を保険金として支払われます。</p>
        <p style="margin-bottom: 10px; color: gray;">以下の補償が付いています。</p>
        <ul class="list0">
            <li>死亡保険金</li>
            <li>後遺障害保険金</li>
            <li>医療保険金</li>
        </ul>
        <h2><i class="fa fa-user-md" aria-hidden="true"></i></i>死亡保険金</h2>
        <p class="explain">上記の事故による傷害が元で事故の日からその日を含めて１８０日以内に亡くなられたとき、１名につき保険金額の全額が、被災搭乗者の法定相続人に支払われます。</p>
        <h2><i class="fa fa-deaf" aria-hidden="true"></i>後遺障害保険金</h2>
        <p class="explain">上記の事故による傷害が元で事故の日からその日を含めて１８０日以内に後遺障害が生じたとき、１名につきその後遺障害の程度によりあらかじめ定められた額（保険金額の４％〜１００％）が被災搭乗者に支払われます。</p>
        <h2><i class="fa fa-hospital-o" aria-hidden="true"></i></i>医療保険金</h2>
        <p class="explain">上記の事故により、傷害を被り医師の治療を受けたとき、事故の日からその日を含めて１８０日以内で、医師による治療日数１日につき、１名あたりあらかじめ定められた日額が、被災搭乗者に支払われます。</p>
        <div class="example">
            <p style="font-size: 14px;">医学的他覚所見のない場合は支払いの対象外になります。</p>
        </div>
    <p style="margin-top: 60px;">--保険料計算をしてみる--</p>
        <div class="main_area1">
        <a class="btn1" href="boat.php">プレジャーボートの保険料計算は<br>こちら</a>
        </div>
        <div class="main_area2">
        <a class="btn2" href="yacht.php">プレジャーヨットの保険料計算は<br>こちら</a>
        </div>
    </div>
</main>    
<footer>
        <small>Copyright 2017-
            <?php
                $now = date('Y');
                print($now);
            ?>
            ,プレジャーボート保険</small>
</footer>
</body>    
    
</html>