

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>スタッフ追加実効</title>
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
      print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
      exit();
    } else {
      print $_SESSION["name"]."さんログイン中";
      print "<br><br>";}
    try{
    
require_once("../common/common.php");
    
$post = sanitize($_POST);
$code = $post["code"];
$name = $post["name"];
$price = $post["price"];
$gazou = $post["gazou"];
$old_gazou = $post["old_gazou"];
      $sauna = $post["sauna"];
      $water = $post["water"];
      $gaiki = $post["gaiki"];
      $rouryu = $post["rouryu"];
      
$comments = $post["explanation"];
//$cate = $post["cate"];
        
if(empty($gazou) && isset($old_gazou) === true) {
    $gazou = $old_gazou;
}
           
          
      if($old_gazou != "")
if($gazou != $old_gazou) {
    if(isset($gazou) && isset($old_gazou) === true) {
        unlink("./gazou/".$old_gazou); 
        }
    } 
        
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "UPDATE sauna SET name=?, price=?, gazou=?, sauna=?, water=?, gaiki=?, rouryu=?, explanation=? WHERE code=?";
$stmt = $dbh -> prepare($sql);
//$data[] = $cate;
$data[] = $name;
$data[] = $price;
$data[] = $gazou;
      $data[] = $sauna;
      $data[] = $water;
      $data[] = $gaiki;
      $data[] = $rouryu;
$data[] = $comments;
$data[] = $code;
      
      
$stmt -> execute($data);
    
$dbh = null;
        
  
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
    
商品を修正しました。<br><br>
<a href="product_list.php">スタッフ一覧へ</a>
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
                    
                    <p class="logo"><a href="../staff_login/staff_login.html">SAUNA RESERVE<br /><span>（管理者専用画面）</span></a></p>
                    
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
