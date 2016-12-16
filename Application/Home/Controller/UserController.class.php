<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/9
 * Time: 15:03
 */

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller {
    /**
     * �û���¼
     */
    public function login(){
        if(!empty($_POST)){
            $remember = I('remember','');
            $data = array(
                'user_name' => I('user_name'),
                'password'  => I('password'),
            );
            echo I('verify');
            echo session('ThinkPHP.CN');
            if(!check_verify(I('verify'))){
                if(D('User')->login($data)!=null){
                    session('user_name',I('user_name'));
                    if($remember!='') {
                        cookie('user_name', I('user_name'), 3600);
                        cookie('password', I('password'), 3600);
                    }
                    $this->redirect('http://voting.com/all');
                }else{
                    echo '�û������������';
                    //$this->redirect('http://voting.com/login');
                }
            }else{
                echo '��֤�����';
                //$this->redirect('http://voting.com/login');
            }
        }else{
            $this->display();
        }

    }

    /**
     * �˳���¼
     */
    public function outlogin(){
        session('user_name',null);
        cookie('user_name',null);
        cookie('password',null);
        $this->redirect('http://voting.com/login');
    }

    /**
     * ��֤��
     */
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->imageW = 130;
        $Verify->imageH = 50;
        //$Verify->useImgBg = true;
        //$Verify->useZh = true;
        $Verify->entry();
    }
}