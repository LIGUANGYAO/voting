<?php
namespace Home\Model;
use \Think\Model;

/**
 * user模型
 */
 class UserModel extends Model {
 	 /**
     * DB 配置
     * @var string
     */
    //protected $connection = 'DB_CONFIG1';

    // 数据表前缀
    //protected $tablePrefix  = 'vote_';

     /**
     * 查询候选人
     * @param $count,$sex,$pageindex,$pagesize
     */
     public function selectList($action='',$pageindex,$pagesize=10){
     	$where = '';
     	if(!empty($action)){
     		if($action=='count'){
     			$where .= "vote_count desc";
     		}else{
     			$where .= "sex asc";
     		}	
     	}
     	$user = M('User');
     	return $user->limit(($pageindex-1)*$pagesize,$pagesize)->order($where)->select();
     }
     /**
     * 添加选票人
     * @param array
     */
     public function insert($data){
        if(!empty($data)){
           return M('User')->add($data);
        }
     }
     /**
     * 修改选票人
     * @param array
     */
     public function update($id,$data){
        if(!empty($data)){
           return M('User')->where("id=$id")->save($data);
        }
     }
      /**
     * 候选人详情
     * @param string
     */
      public function detail($id){
        return M('User')->where("id=$id")->find();
      }
     
     /**
     * 投票加一
     * @var string
     */
     public function count($userid){
     	$user = M('User');
     	$result = $user->where("id=$userid")->setinC('vote_count',1);
        if($result){
            return $user->where("id=$userid")->field('vote_count')->find();
        }
     }

     /**
      * 登录验证
      */
     public function login($data){
        $user = M('User');
        $return = $user->where("user_name='{$data['user_name']}' and password='{$data['password']}'")->find();
        if($return){
           return $return;
        }else{
            return null;
        }
     }
 }