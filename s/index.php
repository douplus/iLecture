<!DOCTYPE HTML> 
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<script src="../req/lib-script.js"></script>
	<script src="https://cdn.firebase.com/js/client/1.0.15/firebase.js"></script>
	<script src="../req/s.js"></script>
	<?php 
		echo '<script>(function(){';
		echo 'var o_sInfo = {"sId": "s_"+$.timestamp.get().num, "roomName": "'.$_GET['n'].'"};';
		echo '$.cookie.set({ name: "'.$_GET['r'].'", value: JSON.stringify(o_sInfo), expires: "1", path: "/~thwang/ilecture/s/index.php" });';
		echo 'changeState( "'.$_GET['r'].'", o_sInfo );';
		echo '})();</script>';
	?>
</head>
<body id="body" class="tw">
	<article>
		<script>document.write( JSON.parse( $.cookie.get({ name: <?php echo '"'.$_GET['r'].'"';?> }) )['sId'] );</script>
	</article>
</body>
</html>