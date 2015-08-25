<!DOCTYPE HTML>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-2022-jp">
<H1>404 Not Found</H1></head>
<body>
<?php 
  $image_list = array(
                     "http://pds.exblog.jp/pds/1/200809/14/22/c0137122_63091.jpg",
                     "http://blog-imgs-31.fc2.com/z/o/o/zooon/sawako2.jpg",
                     "http://dic.nicovideo.jp/oekaki/728705.png",
                     "http://blog-imgs-11.fc2.com/k/u/r/kuroshimatubaki/miochan01.gif",
                     "http://blog-imgs-37.fc2.com/a/n/i/animezyouhou662/khgk.jpg"
                    );
  $index = rand(0,4);
  $image = $image_list[$index];
?>
  <img src=<?php echo $image;?> width="128" height="128"><br>
ファイルが削除されたか、サイトが閉鎖されたため指定されたページが見つかりません。
<a href="index.php?url=login">戻る</a>
</body>
</html>
