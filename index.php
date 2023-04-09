<?php
$getal = $_GET['url'];
$link = $getal;
$veri = file_get_contents($link);
//link

preg_match('/"name": "(.*?)"/',$veri,$sonuc);
$kanaladi = $sonuc[1];
//echo $kanaladi;
//Kanal adı burada bitti...

preg_match('/"viewCount":"(.*?)"/',$veri,$sonuc1);
$goruntuleme = number_format($sonuc1[1],0,',', '.');
//echo $goruntuleme;
//Görüntüleme burada bitti...

preg_match('/<meta name="title" content="(.*?)">/',$veri,$sonuc2);
$videoadi = $sonuc2[1];
//echo $videoadi;
//Video adı burada bitti...

preg_match('/"relativeDateText":{"accessibility":{"accessibilityData":{"label":"(.*?)"}}/',$veri,$sonuc3);
$videotarihi = $sonuc3[1];
//echo $videotarihi;
//Video tarihi burada biti...

preg_match('/"subscriberCountText":{"accessibility":{"accessibilityData":{"label":"(.*?)"}}/',$veri,$sonuc4);
$abonesayisi = $sonuc4[1];
//echo $abonesayisi;
//Abone sayısı burada bitti...

preg_match('/"attributedDescription":{"content":"(.*?)"}}}/',$veri,$sonuc5);
$videoaciklama =str_replace("\\n","",$sonuc5[1]);
//echo $videoaciklama;
//Video açıklama burada bitti...

preg_match('/{"iconType":"LIKE"},"defaultText":{"accessibility":{"accessibilityData":{"label":"(.*?)"}}/',$veri,$sonuc6);
$videobegeni = str_replace("beğeni","",$sonuc6[1]);
//echo $videobegeni;

preg_match('/"commentCount":{"simpleText":"(.*?)"}/',$veri,$sonuc7);
$videoyorumsayisi = $sonuc7[1];
//echo $videoyorumsayisi;
//Video yorum sayısı burada bitti...

preg_match('/"owner":{"videoOwnerRenderer":{"thumbnail":{"thumbnails":\[{"url":"(.*?)"/',$veri,$sonuc8);
$kanalresmiurl = $sonuc8[1];
//echo $kanalresmiurl;
//Kanal resmi burada bitti...
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
/Verileri basit olarak tablo ile görüntülüyoruz...
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube İstatistikleri</title>
</head>
<body>
<style>
th, td {
  background:whitesmoke;
  text-align:center;
}

h1,h2 {
margin:auto;
text-align:center;

}
#kanalresmi {
	margin: auto;
	text-align: center;
	height: 48px;
	border: solid #e3e3e3;
	border-radius: 1000px;
	max-width: 48px;
	overflow: hidden;
	padding: 5px;
}
</style>
    <h1 id="kanaladi"><?php echo $kanaladi;?></h1>
    <h2 id="kanaladi"><?php echo $abonesayisi;?></h2>
    <div id="kanalresmi"><img src="<?php echo $kanalresmiurl;?>" alt=""></div>
    <table style="width:100%;max-width: 800px;margin: auto;min-height:120px">
  <tr>
    <th>Video Adı</th>
    <th>Paylaşım Tarihi</th>
    <th>İzlenme Sayısı</th>
    <th>Beğenme Sayısı</th>
  </tr>
  <tr>
    <td><?php echo $videoadi;?></td>
    <td><?php echo $videotarihi;?></td>
    <td><?php echo $goruntuleme;?></td>
     <td><?php echo $videobegeni;?></td>
  </tr>
</table>
</body>
</html>


