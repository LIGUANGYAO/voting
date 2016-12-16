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
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>ajaxfileupload.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>ueditor/ueditor.all.js"></script>

<script type="text/javascript">
    /*
    var editor;//编辑器的调用对象
     KindEditor.ready(function(e){
      editor = e.create("[name=introduce]",{
        "width":"85%",
        "height":"550px",
        "filterMode":false,//是否过滤html代码""
      });
         //设置编辑器中的内容
         //editor.html("请留下你的评论...");
    });
    */
	$(function(){
        var sex = $('#xb').val();
        if(sex == 1){
            $('#sex1').attr('checked','checked');
        }else if(sex == 2){
            $('#sex2').attr('checked','checked');
        }
		var url_img = $('#url_img').val();
        $('div').on('change','#photo',function() {
            $.ajaxFileUpload({
                type:'post', 
                url:'addpic',  
                secureuri:false,  
                fileElementId:$('#photo').attr('id'),//file标签的id  
                dataType: 'json',//返回数据的类型 
                data:{url_img:url_img},//一同上传的数据
                success: function (data) {
                    if(data.ret=='ok'){
                        $('#img').attr('src',data.src);
                        $('#url_img').val(data.src);
                    }else{
                        alert(data.msg);
                    }
                },
                error: function (data, status, e) {
                    alert(e);
                }
            }); 
        });
	});
</script>
</head>
<body>
<form action="" method="post" name="upfile">
    <div class="m-page">
        <h2 style=" text-align:center; background:#ffffff; box-shadow:0 0 1em #141414"  ><?php if($opration == alert): ?>修改候选人<?php else: ?>添加候选人<?php endif; ?></h2>
        <div style="padding-left:20px; padding-top:20px;">
        <input type="hidden" name="id" value="<?php echo ($detail["id"]); ?>">
        <input type="hidden" name="opration" value="<?php echo ($opration); ?>">
    	姓名：<input type="text" name="name" id="name" value="<?php echo ($detail["real_name"]); ?>" /><br />
        <input type="hidden" name="xb" id="xb" value="<?php echo ($detail["sex"]); ?>" />
        <input type="hidden" name="vote_count" value="<?php echo ($detail["vote_count"]); ?>" />
        性别：<input type="radio" name="sex" id="sex1" value="1" checked="checked" />男&nbsp;&nbsp;<input type="radio" value="2" name="sex" id="sex2" />女<br />
    	学院：<input type="text" name="college" id="college" value="<?php echo ($detail["college"]); ?>" /><br />
    	班级：<input type="text" name="class" id="class" value="<?php echo ($detail["class"]); ?>" /><br />
    	入学年份：<input type="text" name="year" id="year" value="<?php echo ($detail["school_year"]); ?>" onFocus="WdatePicker({lang:'zh-cn', isShowClear:false,readOnly:true,dateFmt:'yyyy-MM-dd' })" /><br />
    	相片：<div><input type="file" name="photo" id="photo"></div>
    		  <input type="hidden" name="url_img" id="url_img" value="<?php echo ($detail["photo"]); ?>" />
    		  <img id="img" src="<?php echo ($detail["photo"]); ?>" alt="" />
    	自我介绍：<!--<textarea name="introduce" id="introduce"><?php echo ($detail["introduce"]); ?></textarea>-->
            <script type="text/plain" id="introduce" name="introduce"><?php echo ($detail["introduce"]); ?></script>
            <script type="text/javascript">
                UE.getEditor('introduce',{
                })
            </script>
    	<input type="submit" name="submit" value="<?php if($opration == alert): ?>修改<?php else: ?>添加<?php endif; ?>" />
        </div>
    </div>
</form>
</body>
</html>