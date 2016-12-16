$(function(){
		$('.vote-btn').click(function(){
			var userid = $(this).parent().parent().siblings('.userid').val();
			alert(userid);
			$.ajax({
				type:'post',
				url:'__CONTROLLER__/vote',
				data:{userid:userid},
				dataType:'text',
				success:function(data){
					alert(data);
					//$(this).parent().parent().siblings('sort-num').html("当前票数："data.count);
					alert(data.msg);
				},
				error:function(data,e){
					alert('数据出错了！');
				}
			});
		});

		if ($.cookie("current")!= null){
	    	var num = $.cookie("current");
	    	$('.sort-title').find('li').eq(num).addClass('active');
    	}
		$('.sort-title').find('li').click(function(){
			var index = $('.sort-title').find('li').index(this);
			$.cookie("current", index);
			$(this).addClass('active');
			$('.active').removeClass('active');
		});
	});

		var isloader = false;
    	var pageindex=1;
   		var pagesize=10;
		function loadmore(btn){
			if(isloader){
				return;
			}
			isloader = true;
			var action=$('#action').val();
	        pageindex++;
	        var loader = "<img src='/public/images/loader.gif' alt=''/>";
	        $(btn).html(loader);
	        $.ajax({
	            type: "post",
	            url: "__CONTROLLER__/index",
	            data: {action:action, pageindex:pageindex, pagesize:pagesize},
	           	dataType: "json",
	            success: function(data){
	            	isloader=false;
	        		$(btn).html("加载更多");
	                if(data==0){
	                	isloader=true;
	                    $(btn).html("没有更多了");
	                }
	                insertHtml(data);
	            },
	            error:function(data,err){
	                isloader=false;
	                alert('数据有误了！');
	                $(btn).html("加载中...");
	            }
	        });
		}

		function insertHtml(arr){
			var parentdiv = $('.sort-list>ul');
	        for(var i=0;i<arr.length;i++){
	        	var openDiv = $('<li></li>').appendTo($('#add'));
	        	//var openDiv = document.createElement("li");
	            strHtml="<input type=\"hidden\" name=\"user_id\" class=\"user_id\" value=\""+arr[i]['id']+"\" /><div class=\"sort-num\">当前票数："+arr[i]['vote_count']+"</div><div class=\"sort-main clearfix\"><div class=\"left\"><a href=\"__CONTROLLER__/vote\"><img src=\""+arr[i]['photo']+"\" title=\""+arr[i]['real_name']+"\" alt=\""+arr[i]['real_name']+"\"></a></div><div class=\"right\"><a href=\"#\"><h3>"+arr[i]['real_name']+"<span>";
				if(arr[i]['sex']==1){
				    strHtml+= "男";
				}else{
				    strHtml+= "女";
				} 
				strHtml+="</span></h3><p>"+arr[i]['college']+"<span>"+arr[i]['class']+"</span></p></a><a class=\"vote-btn\" href=\"#\">投票</a></div><a class=\"detail-btn\" href=\"__CONTROLLER__/detail/id/"+arr[i]['id']+"\"></a></div>";
	            openDiv.html(strHtml);
	        }
   		}
