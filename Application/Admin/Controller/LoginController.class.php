<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\ManagerModel;

class LoginController extends Controller{
		
	//登录页
	public function index(){
		
		//调用模型
		$managerModel = new ManagerModel();
		
		//判断是否是post提交
		if($post = I('post.')){
			//验证表单数据
			if(!$managerModel->create($post,3)){
				//验证失败
				$this->error($managerModel->getError());
			}else{
				//验证通过,组合数据
				$post['password'] = md5($post['password']);
				$data = $managerModel->where("username='{$post['username']}' and password='{$post['password']}'")->find();
				if($data){
					//账号密码正确，将用户数据保存到session，系统默认已开启session
					session('manager_id',$data['id']);
					session('username',$data['username']);
					
					//更新登录时间
					$managerModel->where("id={$data['id']}")->save(['login_time'=>time()]);
					
					$this->success('登录成功', U('admin/Manager/index'));
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
		session('manager_id',null);
		session('username',null);
		//重定向到登录页
		$this->redirect('/Admin/Login/index');
		
	}
	
	
	
}
