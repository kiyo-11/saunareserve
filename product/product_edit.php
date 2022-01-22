

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>スタッフ修正画面</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
        <main>
        <div id="header">
            <div class="inner">
                
                <div class="logo">
                    <a href="../staff_login/staff_login.html">SAUNA RESERVE<br><span>（管理者専用画面）</span></a>
                </div>
            </div>
        </div>
        <section id="main">
            <div id="wrapper">
                <section class="ontent">
                    
                    <aside id="sub" class="gridWrapper">
                        
                        <section class="gridd">
                            <h3 class="heading">商品編集</h3>
<?php
        session_start();
        session_regenerate_id(true);
        if(isset($_SESSION["login"]) === false) {
            print "ログインしていません。<br><br>";
            print "<a href='staff_login.html'>ログイン画面へ</a>";
            exit();
        } else {
            print $_SESSION["name"]."さんログイン中";
            print "<br><br>";
        }
try{
    
$code = $_GET["code"];
    
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT code, name, price, gazou, sauna, water, gaiki, rouryu, explanation FROM sauna WHERE code=?";
$stmt = $dbh -> prepare($sql);
$data[] = $code;
$stmt -> execute($data);
    
$dbh = null;
    
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    
if(empty($rec["gazou"]) === true) {
    $disp_gazou = "";
} else {
    $disp_gazou = "<img src='./gazou/".$rec['gazou']."'>";
}
    
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
        <table class="table">
            <tr>
                <th>商品コード</th>
                <td><?php print $rec["code"];?></td>
            </tr>

<form action="product_edit_check.php" method="post" enctype="multipart/form-data">


                <th>商品名</th>
                <td><input type="text" name="name" value="<?php print $rec['name'];?>"></td>
            </tr>
                <th>価格</th>
            <td><input type="text" name="price" value="<?php print $rec['price'];?>"></td>
        </tr>
        <th>画像</th>
        <td><?php print $disp_gazou;?>
        <input type="file" name="gazou"></td>
    </tr>
    <th>サウナ</th>
    <td><input type="text" name="sauna" value="<?php print $rec['sauna'];?>"></td>
</tr>
<th>水風呂</th>
<td><input type="text" name="water" value="<?php print $rec['water'];?>"></td>
</tr>
            
<th><label for="gender">外気浴</label></th>
<td><input type="radio" name="gaiki" value="0" checked=checked>有
<input type="radio" name="gaiki" value="1">無</td>
</tr>
<th><label for="gender">ロウリュ</label></th>
<td><input type="radio" name="rouryu" value="0" checked=checked>有
<input type="radio" name="rouryu" value="1">無</td>
</tr>
<th>詳細</th>
<td><div class="ex">
<textarea name="comments"><?php print $rec['explanation'];?></textarea>
</div></td>
</table>

<input type="hidden" name="code" value="<?php print $rec['code'];?>">
<input type="hidden" name="old_gazou" value="<?php print $rec['gazou'];?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</section>
</section>

<section class="content">
    <h3 class="heading">写真ギャラリー(外部リンク）</h3>
    <article class="gridWrapper" id="gallery">
        <figure class="grid"><a href="https://sauna-ikitai.com/magazine/ogaki-sauna/"><img src="../product/gazou/oashisu.jpg" width="200" height="140" alt="">夫婦二人三脚で営んできた奇跡のオアシス大垣サウナを訪ねて</a></figure>
            <figure class="grid"><a href="https://sauna-ikitai.com/magazine/sauna_genshi/"><img src="../product/gazou/genshi.jpg" width="200" height="140" alt="">労働式石焼サウナ『原始』制作の全記録</a></figure>
            <figure class="grid"><a href="https://sauna-ikitai.com/magazine/interview-kobayashi-ayana/"><img src="../product/gazou/honba.jpg" width="200" height="140" alt="">フィンランド人はととのい知らず!?サウナ文化研究家に聞いた「本場のサ道」
                    
            </a></figure>
            <figure class="grid"><a href="https://sauna-ikitai.com/magazine/sound-designer-atk/"><img src="../product/gazou/ongaku.jpg" width="200" height="140" alt="">サウナにとって最高の音楽とは？ サウンドデザイナーatkさんに聞いてみた</a></figure>
    </article>
    </section>
</div>
</main>
<div id="footer">
    <div class="inner">
        
        
        <section class="gridWrapper">
            
            <article class="grid">
                
                <p class="logo"><a href="../staff_login/staff_login.html">SAUNA RESERVE<br /><span>(管理者専用画面)</span></a></p>
                
            </article>
            
            <article class="grid">
                
                <p class="tel">電話: <strong>012-3456-7890</strong></p>
                <p>受付時間: 平日 AM 10:00 〜 PM 5:00</p>
                
            </article>
            
            <article class="grid copyright">
            create by saunadaisuki</a>
        </article>
        
    </section>
    
    
</div>
</div>
</body>
</html>