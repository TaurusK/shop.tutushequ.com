<?php
namespace Admin\Controller;

use Admin\Model\CategoryModel;

class CategoryController extends CommonController{
		
	//分类列表页
	public function index(){
		
		//调用模型
		$category = new CategoryModel();
		
		$cateData = $category->field('c1.id,c1.pid,c1.category_name,c2.category_name pname')
							->alias('c1')
							->join('LEFT JOIN sh_category c2 ON c1.pid=c2.id')
							->select();
		$cateData = $category->recursionCat($cateData);
		
		//注册模版变量
		$this->assign('cateData',$cateData);
		$this->display();
		
	}
	
	//分类添加页
	public function add(){
			
		//调用模型
		$category = new CategoryModel();
		
		$cateData = $category->select();
		$cateData = $category->recursionCat($cateData);
		
		
		//判断是否是post请求，并接收数据
		if($post = I('post.')){
			//验证表单数据
			if(!$category->create($post,1)){
				//验证失败
				$this->error($category->getError());
			}else{
				//验证通过,组合数据
				$post['update_time'] = time();
				$post['create_time'] = time();
				//数据入库
				if($category->add($post)){
					$this->success('新增成功', U('admin/Category/index'));
					exit;
				}else{
					$this->error('添加失败啦~请联系程序猿小哥哥吧');
				}
			}
			
		}
		
		//注册模版变量
		$this->assign('cateData',$cateData);
		$this->display();
		
	}
	
	//编辑分类
	public function upd(){
		
		//获取管理员id
		$id = I('get.id');
		//调用模型
		$category = new CategoryModel();
		
		$cateData = $category->select();
		$cateData = $category->recursionCat($cateData);
		
		$data = $category->where("id=$id")->find();
		
		
		//判断是否是post提交
		if($post = I('post.')){
			//验证表单数据
			if(!$category->create($post,1)){
				//验证失败
				$this->error($category->getError());
			}else{
				//这里要需要判断用户是否有修改分类名，修改了则进行分类名是否有重复的验证
				if($post['category_name'] != $data['category_name']){
					if(!$category->create($post,2)){
						$this->error($category->getError());
					}
				}
				//验证通过,组合数据
				$post['update_time'] = time();
				
				//数据更新
				if($category->where("id=$id")->save($post)){
					$this->success('更新成功', U('admin/Category/index'));
					exit;
				}else{
					$this->error('更新失败啦~请联系程序猿小哥哥吧');
				}
			}	
		}
		
		
		
		
		
		
		//注册模版变量
		$this->assign('cateData',$cateData);
		$this->assign('data',$data);
		$this->display();
	}
}