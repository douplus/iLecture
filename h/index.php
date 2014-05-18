<?php include('../php/tinyUrl.php'); ?>
<?php $tinyURL = getTinyURL( urlencode( 'http://merry.ee.ncku.edu.tw/~thwang/ilecture/s/index.php?r='.$_GET['r'].'&n='.$_GET['n'] ) ); ?>
<!DOCTYPE HTML> 
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<link rel="stylesheet" href="../req/h.css"/>
	<script src="../req/lib-script.js"></script>
	<script src="https://cdn.firebase.com/js/client/1.0.15/firebase.js"></script>
	<script src="../req/h.js"></script>
	<?php 
		echo '<script>(function(){';
		echo 'var o_hInfo = {"roomName": "'.$_GET['n'].'"};';
		echo '$.cookie.set({ name: "'.$_GET['r'].'", value: JSON.stringify(o_hInfo), expires: "1", path: "/~thwang/ilecture/h/index.php" });';
		echo 'bindOnline_s( "'.$_GET['r'].'", o_hInfo );';
		echo '})();';
		echo '</script>';
	?>
</head>
<body id="body" class="tw">
	<div id="show-linkRoom-box">顯示QRcode</div>
	<article id="linkRoom-box">
		<section>
			<header>
				<div id="leave" class="chinese" style="position: absolute;  right: 10px;  top: 6px;  font-size: 18px;  line-height: 31px;  height: 30px;  padding: 1px 10px;  cursor: pointer;  color: #fff;">離開</div>
			</header>
			<article>
				<div style="margin: 12px;">
					<section id="onlineNum" style="font-size: 50px; font-weight: bold; text-align: left;">線上：<span></span></section>
					<section id="show-qrCode" style=" margin: 10px; display: inline-block;"></section>
					<script>
						var qrcode = new QRCode('show-qrCode', {
							width: 256,
							height: 256,
							colorDark : '#000000',
							colorLight : '#ffffff',
							correctLevel : QRCode.CorrectLevel.H
						});
						qrcode.makeCode( <?php echo '"'.$tinyURL.'"'; ?> );
					</script>
					<section id="show-tinyUrl"><a href="<?php echo $tinyURL; ?>" target="_blank"><?php echo $tinyURL; ?></a></section>
				</div>
			</article>
		</section>
	</article>
</body>
</html>