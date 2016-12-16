<?php
namespace Home\Model;
use \Think\Model;

/**
* ip模型
*/
class ClientipModel extends Model {
	 /**
     * DB 配置
     * @var string
     */
    //protected $connection = 'DB_CONFIG1';

    // 数据表前缀
   // protected $tablePrefix  = 'vote_';

    /**
    *投票添加客户端ip
    *@param $data 数组(ip,时间)
    */
    public function addip($data){
    	$ip = M('Clientip');
    	return $ip->add($data);
    }

    /**
    *查询当天时间已存在客户端ip
    *@param $data 数组(ip,时间)
    */
    public function selectip($data){
    	$ip = M('Clientip');
    	return $ip->where("ip='{$data['ip']}' and date='{$data['date']}' and userid='{$data['userid']}'")->find();
    }

    /**
    *投票验证
    */
    public function vote($data){
    	if($this->selectip($data)==0){
    		return true;
    	}else{
    		return false;
    	}
    }
}