<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>voting</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="/favicon.ico" rel="Shortcut Icon"/>
<link href="/favicon.ico" rel="Bookmark"/>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>style.css" type="text/css">
</head>
<body>
<div class="m-page">
	<div class="detail-top clearfix">
		<div class="left">
			<img src="<?php echo ($detail["photo"]); ?>" title="<?php echo ($detail["real_name"]); ?>" alt="<?php echo ($detail["real_name"]); ?>">
		</div>
		<div class="right">
			<input type="hidden" name="userid" class="userid" value="<?php echo ($detail["id"]); ?>">
			<h3><?php echo ($detail["real_name"]); ?><span><?php if($detail["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></span></h3>
			<p><?php echo ($detail["college"]); ?></p>
			<p><?php echo ($detail["class"]); ?></p>
			<div class="abso-bottom">
				<p class="ps">当前票数：<?php echo ($detail["vote_count"]); ?></p>
				<a class="vote-btn" href="###">投票</a>	
			</div>
		</div>
	</div>
	<div class="detail-bottom">
		<h2>自我介绍</h2>
		<div class="content">
			<?php echo ($detail["introduce"]); ?>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('div.abso-bottom').on('click','.vote-btn',function(){
			var userid = $(this).parent().siblings('.userid').val();
			$.ajax({
				type:'post',
				url:'vote',
				data:{userid:userid},
				dataType:'json',
				success:function(data){
					if(data.msg=='投票成功！'){
						$('.ps').html('当前票数：'+data.count);
						alert(data.msg);
					}else{
						alert(data.msg);
					}
				},
				error:function(data,e){
					alert('数据出错了！');
				}
			});
		});
	});
</script>
</body>
</html>