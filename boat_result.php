<?php
    $tonsu_kubun ;
    $bariki_kubun ;
    $tonsu = htmlspecialchars($_POST['tonsu'], ENT_QUOTES);
    $bariki = htmlspecialchars($_POST['bariki'], ENT_QUOTES);
    $kingaku_sekinin = htmlspecialchars($_POST['kingaku_sekinin'], ENT_QUOTES);
    $select_toujousha = htmlspecialchars($_POST['select_toujousha'], ENT_QUOTES);
    $select_ryokyaku = htmlspecialchars($_POST['select_ryokyaku'], ENT_QUOTES);
    $select_wide = htmlspecialchars($_POST['select_wide'], ENT_QUOTES);
    

    if($select_ryokyaku !== "not_joukyaku") {
        $joukyaku_teiin = htmlspecialchars($_POST['joukyaku_teiin'], ENT_QUOTES);
        $senshu = htmlspecialchars($_POST['senshu'], ENT_QUOTES);
    } else {
        $joukyaku_teiin = 0;
        $senshu = 1;
    }
    if($select_toujousha !== "not_toujousha") {
        $toujousha_teiin = htmlspecialchars($_POST['toujousha_teiin'], ENT_QUOTES);
    } else {
        $toujousha_teiin = 0;
    }
    
// ＰＢ責任保険金額保険料
    $array_sekinin_50ika = ["9800","12300","12800","13200","13600","13900","14100","14300","14600","14800","15000","15200","15500"];
    $array_sekinin_100ika = ["15400","17200","18000","18500","19300","19800","20200","20500","20900","21200","21600","21900","22300"];
    $array_sekinin_150ika = ["20000","21800","22900","23600","24700","25400","25900","26400","26800","27300","27800","28300","28700"];
    $array_sekinin_150goe = ["24600","26400","27700","28700","30000","30900","31600","32200","32800","33400","34000","34500","35100"];
    $array_sekinin_50goe = ["error","27570","28580","30790","34410","36850","38960","40680","42620","44550","46270","47790","49330"];

// ＰＢ搭乗者傷害保険料
    $array_toujousha_500 = ["2360","4000","5160","5960","6520","6920","7120","7320","7520","7720","7920","8120","8320","8520","8720","8920","9120","9320","9520","9720","9920","10120","10320","10520","10720","10920","11120","11320","11520","11720","11920","12120","12320","12520","12720","12920","13120","13320","13520","13720"];
    $array_toujousha_1000 = ["4720","8000","10320","11920","13040","13840","14240","14640","15040","15440","15840","16240","16640","17040","17440","17840","18240","18640","19040","19440","19840","20240","20640","21040","21440","21840","22240","22640","23040","23440","23840","24240","24640","25040","25440","25840","26240","26640","27040","27440"];
    $array_toujousha_1500 = ["6300","10800","13860","16020","17640","18720","19260","19800","20340","20880","21420","21960","22500","23040","23580","24120","24660","25200","25740","26280","26820","27360","27900","28440","28980","29520","30060","30600","31140","31680","32220","32760","33300","33840","34380","34920","35460","36000","36540","37080"];
    $array_toujousha_2000 = ["8400","14400","18480","21360","23520","24960","25680","26400","27120","27840","28560","29280","30000","30720","31440","32160","32880","33600","34320","35040","35760","36480","37200","37920","38640","39360","40080","40800","41520","42240","42960","43680","44400","45120","45840","46560","47280","48000","48720","49440"];
    $array_toujousha_3000 = ["12380","21200","27220","31420","34610","36770","37790","38850","39910","40970","42030","43090","44150","45210","46270","47330","48390","49450","50510","51570","52630","53690","54750","55810","56870","57930","58990","60050","61110","62170","63230","64290","65350","66410","67470","68530","69590","70650","71710","72770"];


// ＰＢ乗客賠償責任保険料
    $array_joukyaku_kihon_3000 = ["3060","1910"];
    $array_joukyaku_kihon_5000 = ["4160","2540"];


// トン数区分
    if ($tonsu == 1 ) {
        $tonsu_kubun = 1;
    } else {
        $tonsu_kubun = 2;
    }

// 馬力区分
    if ($bariki > 150) {
        $bariki_kubun = 4;
    } else if ($bariki > 100) {
        $bariki_kubun = 3;
    } else if ($bariki > 50) {
        $bariki_kubun = 2;
    } else {
        $bariki_kubun = 1;
    }

// ＰＢ責任保険料算出
    if ($bariki_kubun == 1 && $tonsu_kubun == 1) {
        $hokenryo_sekinin = $array_sekinin_50ika[$kingaku_sekinin -1];
    } else if ($bariki_kubun == 2 && $tonsu_kubun == 1) {
        $hokenryo_sekinin = $array_sekinin_100ika[$kingaku_sekinin -1];
    } else if ($bariki_kubun == 3 && $tonsu_kubun == 1) {
        $hokenryo_sekinin = $array_sekinin_150ika[$kingaku_sekinin -1];
    } else if ($bariki_kubun == 4 && $tonsu_kubun == 1) {
        $hokenryo_sekinin = $array_sekinin_150goe[$kingaku_sekinin -1];
    } else if (($bariki_kubun == 2 || $bariki_kubun == 3 || $bariki_kubun == 4) && $tonsu_kubun == 2) {
       
            $hokenryo_sekinin = $array_sekinin_50goe[$kingaku_sekinin -1];
            if($hokenryo_sekinin == "error") {
                $hokenryo_sekinin = "non";
            }
    } else {
        $hokenryo_sekinin = "non";
    }
    // 責任保険料だけhokenryouではなくhokenryoになっている事に注意する。

//  ＰＢ責任保険ワイド
    if($tonsu_kubun == 1) {
        $wide_hokenryou = 4000;
    } else if ($tonsu_kubun == 2) {
        $wide_hokenryou = 8000;
    } else {
        $wide_hokenryou = 0;
    }
    



//  ＰＢ搭乗者傷害保険料算出

    if($select_toujousha == 500){
        $hokenryou_toujousha = $array_toujousha_500[$toujousha_teiin -1];
    } else if ($select_toujousha == 1000) {
        $hokenryou_toujousha = $array_toujousha_1000[$toujousha_teiin -1];
    } else if ($select_toujousha == 1500) {
        $hokenryou_toujousha = $array_toujousha_1500[$toujousha_teiin -1];
    } else if ($select_toujousha == 2000) {
        $hokenryou_toujousha = $array_toujousha_2000[$toujousha_teiin -1];
    } else if ($select_toujousha == 3000) {
        $hokenryou_toujousha = $array_toujousha_3000[$toujousha_teiin -1];
    } else {
        $hokenryou_toujousha = 0;
    } 
  

   

// ＰＢ乗客賠償責任保険料算出
if($tonsu_kubun == 2) {
        $hokenryou_joukyaku = 0;
} else {
    if($select_ryokyaku == 1) {
        $hokenryou_joukyaku = $array_joukyaku_kihon_3000[$senshu -1] * $joukyaku_teiin;            
    } else {
        $hokenryou_joukyaku = $array_joukyaku_kihon_5000[$senshu -1] * $joukyaku_teiin;
    }
}

//合計保険料

if($hokenryo_sekinin == "non") {
    print('');
} else {
    if($select_toujousha !== "not_toujousha" && $select_ryokyaku !== "not_joukyaku" ) {
        //責任＋ワイド＋搭乗者＋乗客
        if($tonsu == 2) {
            $hokenryou_total = $hokenryo_sekinin + $wide_hokenryou + $hokenryou_toujousha;
        } else {
            $hokenryou_total = $hokenryo_sekinin + $wide_hokenryou + $hokenryou_toujousha + $hokenryou_joukyaku;
        }
        
    } else if($select_toujousha !== "not_toujousha") {
        //責任＋ワイド＋搭乗者
         
             $hokenryou_total = $hokenryo_sekinin + $wide_hokenryou + $hokenryou_toujousha;  
         
    } else if($select_ryokyaku !== "not_joukyaku") {
        //責任＋ワイド＋乗客
        if($tonsu == 2) {
             $hokenryou_total = $hokenryo_sekinin + $wide_hokenryou;
         } else {
        $hokenryou_total = $hokenryo_sekinin + $wide_hokenryou + $hokenryou_joukyaku;
        }
    } else {
        //責任（＋ワイド）
        if($select_wide == "not_wide") {
            $hokenryou_total = $hokenryo_sekinin;
        } else {
            $hokenryou_total = $hokenryo_sekinin + $wide_hokenryou;
        }
    }
}
?>


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
        <h1><a href="index.html">プレジャーボート保険料</a></h1>
    </div>
</header>
<main>
    <div class="container">
        <div class="hune_jouhou">
        
<!--
            <h2>
            <?php
                print('馬力区分：'.$bariki_kubun);    
            ?>
            </h2>
            <h2>
            <?php
                print('トン数区分：'.$tonsu_kubun);    
            ?>
            </h2>
            <h2>
            <?php
                if($select_toujousha !== "not_toujousha") {
                    print('金額区分：'.$kingaku_sekinin);    
                }
            ?>
            </h2>
            <h2>
            <?php
                if($select_toujousha !== "not_toujousha") {
                    print('搭乗者金額区分：'.$select_toujousha);    
                }
            ?>
            </h2>
            <h2>
            <?php
                if($select_toujousha !== "not_toujousha") {
                        print('搭乗者人数区分：'.$toujousha_teiin);
                    }
            ?>
            </h2>
            <h2>
            <?php
                if($select_ryokyaku !== "not_joukyaku") {
                    print('乗客金額区分：'.$select_ryokyaku);    
                }
            ?>
            </h2>
            <h2>
            <?php
                if($select_ryokyaku !== "not_joukyaku") {
                        print('乗客人数区分：'.$joukyaku_teiin);
                    }
            ?>
            </h2>
            <h2>
            <?php
                if($select_ryokyaku !== "not_joukyaku") {
                        print('乗客船種区分：'.$senshu);
                    }
            ?>
            </h2>
-->
            
            
            
            <div class ="hokenryou_center">
                <div class="hokenryou">
                    <p><?php
                        if($hokenryo_sekinin == "non") {
                            print('');
                        } else {
                            $hokenryo_sekinin_format = number_format($hokenryo_sekinin);
                            print('ＰＢ責任保険：'.$hokenryo_sekinin_format.'円');
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if($hokenryo_sekinin == "non") {
                            print('');
                        } else {
                            if($select_wide == "wide") {
                                $wide_hokenryou_format = number_format($wide_hokenryou);
                                print('ＰＢ責任保険ワイド：'.$wide_hokenryou_format.'円');
                            }
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if($hokenryo_sekinin == "non") {
                            print('');
                        } else {
                            if($select_toujousha !== "not_toujousha") {
                                
                                $hokenryou_toujousha_format = number_format($hokenryou_toujousha);
                                print('ＰＢ搭乗者傷害保険：'.$hokenryou_toujousha_format.'円');
                                
                            }
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if($hokenryo_sekinin == "non") {
                            print('');
                        } else {
                            if($select_ryokyaku !== "not_joukyaku") {
                                if($tonsu == 1) {
                                    $hokenryou_joukyaku_format = number_format($hokenryou_joukyaku);
                                    print('ＰＢ乗客賠償責任保険：'.$hokenryou_joukyaku_format.'円');
                                } else {
                                print('ＰＢ乗客賠償責任保険：_____×');
                                }
                            }
                        }
                        ?>
                    </p>
                    
                </div>
            </div>
            <div style="border-top: 2px solid #000; margin: 5px auto; width: 85%;"></div>
            <h1>
                <?php         
                if($hokenryo_sekinin == "non") {
                    print('取り扱ってません');
                } else {
                    $hokenryou_total_format = number_format($hokenryou_total);
                    if($select_toujousha !== "not_toujousha" && $select_ryokyaku !== "not_joukyaku") {
                        //責任＋ワイド＋搭乗者＋乗客
                        print('合計保険料：'.$hokenryou_total_format.'円');
                    } else if($select_toujousha !== "not_toujousha") {
                        //責任＋ワイド＋搭乗者
                        print('合計保険料：'.$hokenryou_total_format.'円');
                    } else if($select_ryokyaku !== "not_joukyaku") {
                        //責任＋ワイド＋乗客
                        print('合計保険料：'.$hokenryou_total_format.'円');
                    } else if ($select_toujousha == "not_toujousha" && $select_ryokyaku == "not_joukyaku"){
                        //責任
                        print('合計保険料：'.$hokenryou_total_format.'円');
                    } else {
                        print('eraaaaaaaaaa');
                    }
                }
                ?>
            </h1>
            <p style="color: red;">
                <?php
                if($hokenryo_sekinin == "non") {
                    print('条件を変更するか他社の保険を調べてみてください。');
                }
                ?>
            </p>

        </div>
        <a class="btn3" href="boat.php">戻る</a>
        <p style="color: red;">戻る場合はこちらを押してください。</p>

<script type="text/javascript">rakuten_design="text";rakuten_affiliateId="14cc90a0.50bedda6.14cc90a1.5ffa2500";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="300x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1528805005030";rakuten_bgColor="FFFFFF";rakuten_txtColor="1D54A7";rakuten_captionColor="000000";rakuten_moverColor="C00000";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js"></script>
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
    <script>
    
    
    
    
    </script>
</body>    
    
</html>