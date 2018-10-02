<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;

class LoginController extends Controller{
		
	//登录页
	public function index(){
		
		//调用模型
		$userModel = new UserModel();
		
		//判断是否是post提交
		if($post = I('post.')){
			//验证表单数据
			if(!$userModel->create($post,3)){
				//验证失败
				$this->error($userModel->getError());
			}else{
				//验证通过,组合数据
				$post['password'] = md5($post['password']);
				$data = $userModel->where("acc='{$post['acc']}' and password='{$post['password']}'")->find();
				if($data){
					//账号密码正确，将用户数据保存到session，系统默认已开启session
					session('uid',$data['uid']);
					session('acc',$data['acc']);
					
					//更新登录时间
					$userModel->where("uid={$data['uid']}")->save(['login_time'=>time()]);
					
					$this->success('登录成功', U('home/index/index'));
					exit;
				}else{
					$this->error('账号或密码不对哦~');
				}
				
			}	
		}
		
		$this->display();
		
	}
	
	//退出登录
	public function logout(){
		
		//删除用户登录session数据
		session('uid',null);
		session('acc',null);
		//重定向到登录页
		$this->redirect('/Home/Login/index');
		
	}
	
	
	
}
