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
            <form method="post" name="form1" action="boat_result.php">
                <div class="sentaku hune">

                    <h2>---船の情報を入力して下さい---</h2>
                    <h3>船の種類</h3>
                    <p>プレジャーボート</p>
                    <h3 id="test2">馬力</h3>
                    <input id="bariki" type="number" step="5" name="bariki" min="10" max="999" required>
                    <h3>総トン数</h3>
                    <select id="tonsu" name="tonsu" required>
                        <option value="1" selected>５トン未満</option>
                        <option value="2">５トン以上</option> 
                    </select>
                </div>
                <div class="sentaku hoken">
                    <h2>---保険内容を選択してください---</h2>
                    <h3><a href="pb_sekinin.php" target="_blank">ＰＢ責任保険</a></h3>
                    <h4>-保険金額-</h4>
                    <p style="font-size: 13px;">（１事故につき）</p>
                    <select name="kingaku_sekinin">
                        <option value="1" selected>1000万円</option>    
                        <option value="2">3000万円</option>    
                        <option value="3">5000万円</option>    
                        <option value="4">1億円</option>    
                        <option value="5">2億円</option>     
                        <option value="6">3億円</option>    
                        <option value="7">4億円</option>     
                        <option value="8">5億円</option>     
                        <option value="9">6億円</option>     
                        <option value="10">7億円</option>     
                        <option value="11">8億円</option>     
                        <option value="12">9億円</option>   
                        <option value="13">10億円</option>       
                    </select>
                    <h3><a href="pb_wide.php" target="_blank">ＰＢ責任保険ワイド</a></h3>
                    <select name="select_wide" id="select_wide">
                        <option value="not_wide" selected>つけない</option> 
                        <option value="wide">つける</option>
                    </select>
                    <div id="wide" style="opacity: 0.2;">
                    <p style="color: red;">（付帯保険：搭乗者or乗客に加入すると自動で付帯されます。）</p>
                    </div>
                    <h3><a href="pb_toujousha.php" target="_blank">ＰＢ搭乗者傷害保険</a></h3>
                    <h4>-保険金額-</h4>
                    <p style="font-size: 13px;">（1名あたり）</p>
                    <select name="select_toujousha" id="select_toujousha">
                        <option value="not_toujousha" selected>つけない</option> 
                        <option value="500">500万円</option>    
                        <option value="1000">1000万円</option>    
                        <option value="1500">1500万円</option>    
                        <option value="2000">2000万円</option>    
                        <option value="3000">3000万円</option>
                    </select>
                    <div id="toujousha_teiin" style="display:none;">

                    </div>
                    <h3><a href="pb_joukyaku.php" target="_blank">ＰＢ乗客賠償責任保険</a></h3>   

                    <h4>-保険金額-</h4>
                    <p style="font-size: 13px;">（1名あたり）</p>
                    <select  name = "select_ryokyaku" id="select_ryokyaku">
                        <option value="not_joukyaku" selected>つけない</option> 
                        <option value="1">3000万円</option>    
                        <option value="2">5000万円</option>
                    </select>
                    <div id="ryokyaku_teiin" style="display:none;">
                    </div>
                </div>
                <input type="submit" class="btn3" value="保険料計算">
        </form>
           
        <div class="reset">
            <a class="btn3" href="index.html">戻る</a>
            <a class="btn3" href="boat.php">リセット</a>
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
    <script>
    (function() {
        'use strict';

 // 変数の定義
        var bariki = document.getElementById('bariki');  
        var tonsu = document.getElementById('tonsu');
        
        var toujousha_teiin = document.getElementById('toujousha_teiin');
        var joukyaku_teiin = document.getElementById('joukyaku_teiin');
        
        var select_wide = document.getElementById('select_wide');
        
            
//搭乗者の人数を出したり消したり
        var toujousha = document.getElementById('select_toujousha');
       
        toujousha.onchange = function() { // 選択肢が変更されたら
            var selectedItem = this.options[ this.selectedIndex ]; // 選択肢のインデックスを取得して
            var a = selectedItem.value; // その値を受け取る
            
            if(a !== "not_toujousha") {
                document.getElementById("toujousha_teiin").style.display = "block";
                select_wide.value = "wide";
                
// 多分toujousha_teiinに中身が合ったら追加なかったら削除という式になっている。
                if(toujousha_teiin.innerHTML = '<h4>-定員数-</h4>'){
                    var div_element = document.createElement("div");
                div_element.className = "test_toujousha";
                div_element.innerHTML = '<p style="color: red;">任意の人数を入れて下さい。</p><input type="number" type="number" step="1" name="toujousha_teiin" id="toujousha_teiin_su" min="1" max="40" required>';
                var parent_object = document.getElementById("toujousha_teiin");
                parent_object.appendChild(div_element);  
                }
                
                document.getElementById("wide").style.opacity = "1";
            } else {  
                
                document.getElementById("toujousha_teiin").style.display = "none";
                
                var toujousha_teiin_su = document.getElementById('toujousha_teiin_su');
                toujousha_teiin_su.removeAttribute('required');
                
                if(document.form1.select_ryokyaku.value == "not_joukyaku"){
                document.getElementById("wide").style.opacity = "0.2";
                }
            }
        }
        
// 乗客の人数を出したり消したり
        var ryokyaku = document.getElementById('select_ryokyaku');
        ryokyaku.onchange = function() {
            var selectedItem = this.options[ this.selectedIndex ];

    var c = selectedItem.value;
            
            if(c !== "not_joukyaku") {
                document.getElementById("ryokyaku_teiin").style.display = "block";
                select_wide.value = "wide";
                
                if(ryokyaku_teiin.innerHTML = '<h4>-旅客定員数-</h4>'){
                    var div_element = document.createElement("div");
                    div_element.className = "test";
                    div_element.innerHTML = '<p style="color: red;">船舶検査証の旅客人数を入れて下さい。</p><input id="ryokyaku_teiin_su" type="number" step="1" name="joukyaku_teiin" min="1" max="99" required><h4>-船種-</h4><input type="radio" name="senshu" value="1" id="senshu" checked required>遊漁船<input type="radio" name="senshu" value="2" id="senshu">旅客船';
                    var parent_object = document.getElementById("ryokyaku_teiin");
                    parent_object.appendChild(div_element);  
                }
                
                document.getElementById("wide").style.opacity = "1";
            } else {
                
                document.getElementById("ryokyaku_teiin").style.display = "none";
                
                var ryokyaku_teiin_su = document.getElementById('ryokyaku_teiin_su');
                ryokyaku_teiin_su.removeAttribute('required');
                var senshu = document.getElementById('senshu');
                senshu.removeAttribute('required');
                
                if(document.form1.select_toujousha.value == "not_toujousha"){
                   document.getElementById("wide").style.opacity = "0.2"; 
                }
                
            }
        }

        
})();
    
    
    </script>
</body>    
    
</html>