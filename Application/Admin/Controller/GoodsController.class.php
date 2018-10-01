<?php
namespace Admin\Controller;

use Admin\Model\CategoryModel;
use Admin\Model\GoodsModel;

class GoodsController extends CommonController{
		
	//后台首页
	public function index(){

		//调用模型
		$goods = new GoodsModel();
		
		$goodsData = $goods->field('g.id,c.category_name,g.goods_name,g.goods_img,g.goods_price,
									g.is_sale,g.is_del,g.goods_amount,g.sell_count,
									g.create_time,g.update_time')
							->alias('g')
							->join('LEFT JOIN sh_category c ON g.category_id=c.id')
							->select();
		
		
		
		//dump($goodsData);
		//注册模版变量
		$this->assign('goodsData',$goodsData);
		$this->display();
		
	}
	
	//添加商品
	public function add(){
		
		//调用模型
		$category = new CategoryModel();
		
		$cateData = $category->select();
		$cateData = $category->recursionCat($cateData);
		
		//判断是否是post提交
		if($post = I('post.')){
			
			//调用模型
			$goods = new GoodsModel();
			
			//验证表单数据
			if(!$goods->create($post,1)){
				//验证失败
				$this->error($goods->getError());
			}else{
				//验证通过调用上传方法处理，并获取上传信息
				$file = $this->upload();
				//组合图片路径
				$post['goods_img'] = $file['goods_img']['savepath'].$file['goods_img']['savename'];
				
				//组合数据
				//生成商品货号
				$post['goods_sn'] = 'SN'.date('Ymdhis',time()).rand(1000, 9999);
				$post['update_time'] = time();
				$post['create_time'] = time();
				//数据入库，并获得新增商品id
				if($goods_id = $goods->add($post)){
					//实例化属性模型
					$attribute = M('Attribute');
					//组合属性数据
					$attr['goods_id'] = $goods_id;
					$attr['size'] = $post['size'];
					$attr['color'] = $post['color'];
					if($attribute->add($attr)){
						$this->success('新增成功', U('admin/Goods/index'));
						exit;
					}else{
						$this->error('商品属性入库失败~ 请联系程序猿小哥哥吧');
					}
				}else{
					$this->error('添加失败啦~请联系程序猿小哥哥吧');
				}
			}
			
		}
		
		
		
		//注册模版变量
		$this->assign('cateData',$cateData);
		$this->display();
		
	}
	
	
	//图片上传函数
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     C('GOODS_UPLOADS'); // 设置附件上传目录
		
		// 上传文件     
		$info   =   $upload->upload();
		
		if(!$info) {// 上传错误提示错误信息       
			$this->error($upload->getError());    
		}else{
			// 上传成功返回上传信息
			return $info;
			//$this->success('上传成功！');    
		} 
	}
	
	
}