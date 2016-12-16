<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
    *list首页
    *@return array() 
    */
    public function index(){
        //echo session('user_name');
//        if(session('user_name')==""){
//            $this->redirect('http://voting.com/login');
//        }
    	$action = I('action');
    	$pageindex = I('post.pageindex',1);
    	$pagesize = I('post.pagesize',10);
        if(!empty($_POST)){
            $resut = D('User')->selectList($action,$pageindex,$pagesize);
            if(!empty($resut)){
                echo json_encode($resut);
            }else{
                echo '0';
            }
            return;
        }
    	$resut = D('User')->selectList($action,$pageindex,$pagesize);
    	empty($resut) ? array() : $resut;
    	$this->assign('action',$action);
    	$this->assign('resut',$resut);
    	$this->display();
	}

     /**
    *修改列表
    *@return array() 
    */
    public function alert(){
        $action = I('action');
        $pageindex = I('post.pageindex',1);
        $pagesize = I('post.pagesize',10);
        if(!empty($_POST)){
            $resut = D('User')->selectList($action,$pageindex,$pagesize);
            if(!empty($resut)){
                echo json_encode($resut);
            }else{
                echo '0';
            }
            return;  
        }
        $resut = D('User')->selectList($action,$pageindex,$pagesize);
        empty($resut) ? array() : $resut;
        $this->assign('action',$action);
        $this->assign('resut',$resut);
        $this->display();
    }
	
	/**
    *详情页
    *@return array() 
    */

    public function detail(){
    	$id = I('id');
    	$detail = D('User')->detail($id);
        //show_bug($detail);
        //$detail['introduce'] = stripslashes($detail['introduce']); //html标签过滤
    	$this->assign('detail',$detail);
    	$this->display();
    }

    /**
    *添加修改投票人
    *@return string
    **/
    public function insert(){
        $id = I('id','');
        $opration = I('opration','add');
        $url = "./alert.html";
        if(isset($_POST['submit'])){
            $data = array(
                    'real_name' => I('name'),
                    'sex'       => I('sex'),
                    'college'   => I('college'),
                    'class'     => I('class'),
                    'school_year'=> strtotime(I('year')),
                    'photo'     => I('url_img'),
                    'introduce' => stripslashes(html_entity_decode(I('introduce'))), // 将实体转为字符 再去除"\" 符号
                    'vote_count'=> I('vote_count'),
                );
            if($id == ''){
            	$insert = D('User')->insert($data);
            	if($insert){
                    redirect($url, 1, '添加成功页面跳转中...');
            	}
            }
            if($opration == 'alert'){
                $save = D('User')->update($id,$data);
                if($save){
                    redirect($url, 1, '修改成功页面跳转中...');
                }
            }
        }else{
            if($opration == 'alert'){
                $detail = D('User')->detail($id);
                $detail['school_year'] = date('Y-m-d',$detail['school_year']);
                //$detail['introduce'] = stripslashes($detail['introduce']); //html去除"/" 符号
                $this->assign('opration',$opration);
                $this->assign('detail',$detail);
            }
            $this->display();
        } 	
    }

     /**
    *投票
    */

    public function vote(){
    	$ip= GetIP();
        //echo $ip;
    	$date = (string)date('Y-m-d');
    	$userid = I('userid');
    	$data = array(
    		'ip' => $ip,
    		'date' => $date,
            'userid' => $userid,
    	);
    	$resut = D('Clientip')->vote($data);
    	if($resut){
            $addip = D('Clientip')->addip($data);
            if($addip){
        		$count = D('User')->count($userid);
        		if($count){
        			echo json_encode(array('msg'=>'投票成功！','count'=>$count['vote_count']));
        		}
            }
    	}else{
    		echo json_encode(array('msg'=>'您今天已为他投过票，只能明天再投'));
    	}
    }

    //ajax上传图片
	public function addpic(){
		if(isset($_POST['url_img'])&&!empty($_POST['url_img'])){
            // 存在图片  先删除图片
			$img = $_POST['url_img'];
            $img = str_replace('/Public', './Public', $img);
            if(file_exists($img)){
                if(@!unlink($img)){
                    echo "<script>alert('删除原图失败！');</script>";
                }
            }
        }
        
		if (!file_exists(C('IMGROOT'))){
			mkdir(C('IMGROOT'),0777,true);
		}
		//图片上传
		if(!empty($_FILES['photo'])){
			if($_FILES['photo']['type']!='image/jpeg' && $_FILES['photo']['type']!='image/png'){
				echo json_encode(array('ret'=>'failed','msg'=>'图片类型错误'));
				exit;
			}
			if($_FILES['photo']['size']>2097152){
				echo json_encode(array('ret'=>'failed','msg'=>'图片不能大于2MB'));
				exit;
			}
			
			$ext = strrchr($_FILES['photo']['name'],'.');
            if(!is_file(C('IMGROOT').date("Ymd"))){
                mkdir(C('IMGROOT').date("Ymd"),0777,ture);
            }
            $img_name = date("Ymd").'/'.time().rand(0000,9999).$ext;
            $return = move_uploaded_file($_FILES['photo']['tmp_name'],C('IMGROOT').$img_name);
            $image = new \Think\Image(); 
            $image->open(C('IMGROOT').$img_name);
            // 按照原图的比例生成一个最大为1100*1000的缩略图
            $image->thumb(220, 260)->save(C('IMGROOT').$img_name);
			if($return){
                $img_url = str_replace('./', '/', C('IMGROOT').$img_name);
				echo json_encode(array('ret'=>'ok','src'=>$img_url));				
			}else{
				echo json_encode(array('ret'=>'failed','src'=>'文件上传失败！'));
			}
			
		}else{
			echo json_encode(array('ret'=>'failed','msg'=>'服务器歇菜了,请联系管理员。'));
		}		
	}
}