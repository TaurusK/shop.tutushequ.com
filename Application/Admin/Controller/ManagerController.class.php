<?php
namespace Admin\Controller;

use Admin\Model\ManagerModel;

class ManagerController extends CommonController{
		
	//用户管理首页
	public function index(){
		
		//调用模型
		$managerModel = new ManagerModel();
		//查询管理员
		$data = $managerModel->order('id desc')->select();
		//dump(U('Admin/Manager/index'));
		
		//注册模版变量
		$this->assign('data',$data);
		$this->display();
		
	}
	
	//管理员添加
	public function add(){
		
		//判断是否是post提交
		if($data = I('post.')){
			//调用模型
			$managerModel = new ManagerModel();
			//验证表单数据
			if(!$managerModel->create()){
				//验证失败
				$this->error($managerModel->getError());
			}else{
				//验证通过,组合数据
				$data['password'] = md5($data['password']);
				$data['update_time'] = time();
				$data['create_time'] = time();
				//数据入库
				if($managerModel->add($data)){
					$this->success('新增成功', U('admin/Manager/index'));
					exit;
				}else{
					$this->error('添加失败啦~请联系程序猿小哥哥吧');
				}
			}	
		}

		//渲染模版	
		$this->display();
		
	}
	
	//编辑管理员
	public function upd(){
		
		//获取管理员id
		$id = I('get.id');
		//调用模型
		$managerModel = new ManagerModel();
		
		$data = $managerModel->where("id=$id")->find();
		
		
		//判断是否是post提交
		if($post = I('post.')){
			//验证表单数据
			if(!$managerModel->create($post,2)){
				//验证失败
				$this->error($managerModel->getError());
			}else{
				//验证通过,组合数据
				if(empty($post['password'])){
					//没有填密码，则不更新这个字段
					unset($post['password']);
				}else{
					$post['password'] = md5($post['password']);
				}
				
				$post['update_time'] = time();
				$post['create_time'] = time();
				//数据更新
				if($managerModel->where("id=$id")->save($post)){
					$this->success('更新成功', U('admin/Manager/index'));
					exit;
				}else{
					$this->error('更新失败啦~请联系程序猿小哥哥吧');
				}
			}	
		}
		
		//注册模版变量
		$this->assign('data',$data);
		$this->display();
	}
}