<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>プレジャーボート保険料計算</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1><a href="index.html">ＰＢ責任保険とは</a></h1>
        <img class="header_img" src="img/header.png" width="80%" height= auto>
    </div>
</header>
<main>
    <div class="container">
        <p style="margin-bottom: 10px; color: gray;">
        以下の補償が付いています。
        </p>
        <ul class="list0">
            <li>対物賠償</li>
            <li>対人賠償</li>
            <li>人命捜索救助</li>
            <li>船体捜索救助</li>
        </ul>
        <h2><i class="fa fa-lightbulb-o" aria-hidden="true"></i>対物賠償</h2>
        <p class="explain">プレジャーボートの所有･使用･管理に起因する事故により、他人（自船の乗船者以外）の財物を減失・破損・汚損し、法律上の損害賠償責任を負担する事によって被る損害に対して保険金が支払われます。</p>
        <div class="example">
            <p style="font-size: 20px;">例えば・・・</p>
            <ul class="list1">
                <li>漁船、レジャー船や遊覧船あるいは貨物船などの船舶に衝突して、船体、漁具、積荷などに被害を与えてしまった場合。</li>
                <li>定置網、養殖網、海産物などの漁業用施設や漁協の施設に損害を与えてしまった場合。</li>
                <li>桟橋や補給設備などのマリーナにある施設に損害を与えてしまった場合。</li>
                <li>航路標識や防波堤など港湾にある施設に損害を与えてしまった場合。</li>
            </ul>
        </div>
        
        <h2><i class="fa fa-male" aria-hidden="true"></i>対人賠償</h2>
        <p class="explain">プレジャーボートの所有･使用･管理に起因する事故により、他人（自船の乗船者以外）を死傷させ、法律上の損害賠償責任を負担する事によって被る損害に対して保険金が支払われる。なお、衝突事故などで双方に過失がある場合は、過失割合に応じて賠償金が支払われます。</p>
        <div class="example">
            <p style="font-size: 20px;">例えば・・・</p>
            <ul class="list1">
                <li>漁船、レジャー船やその他船舶に衝突して相手船の乗船者を死傷させてしまった場合。</li>
                <li>自船の乗船者以外の遊泳者やダイバーなどと接触して、死傷させてしまった場合。</li>
                <li>水上オートバイや、水上スキーなどと衝突し、相手を死傷させてしまった場合。</li>
            </ul>
        </div>
        <h2><i class="fa fa-user-times" aria-hidden="true"></i>人命捜索救助</h2>
        <p class="explain">プレジャーボートの乗船者（操縦者を含みます）の遭難により、その乗船者が他の船舶により捜索または救助または移送された際に、創作者からの請求に基づいて、乗船者が支出した捜索、救助、移送の費用について保険金が支払われます。</p>
        <div class="example">
            <p style="font-size: 20px;">例えば・・・</p>
            <ul class="list1">
                <li>プレジャーボートに乗っている人が落水して見つからず、捜索してもらった場合。（他の船舶の燃料費、食料費、乗組員の給料が対象になります。）</li>
            </ul>
        </div>
        <h2><i class="fa fa-ship" aria-hidden="true"></i>船体捜索救助</h2>
        <p class="explain">プレジャーボートに不測かつ突発的な損害が生じ、他の船舶により自艇が曳航または救助された際に要した費用について保険金が支払われます。</p>
        <div class="example">
            <p style="font-size: 20px;">例えば・・・</p>
            <ul class="list1">
                <li>操船ミスにより座礁し、救助された場合。</li>
                <li>プロペラにロープが絡まって、曳航救助された場合。</li>
            </ul>
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