<?php
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller{
		
	//初始化方法
	public function _initialize(){
		
		//防翻墙
		if(!session('manager_id')){
			$this->error('请先登录哦~',U('Admin/Login/index'));
		}
		
	}
	
	
}