<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\GoodsModel;

class GoodsController extends Controller {
		
	//商品详情页
    public function detail(){
    	
		
		//接收参数
		$id = I('get.id');
		//调用模型
		$goods = new GoodsModel();
		$goodsData = $goods->field('is_sale,is_del,create_time,update_time',true)->where("id={$id}")->find();
		
		//查商品属性
		$attribute = M('Attribute');
		$goods_attr = $attribute->where("goods_id={$id}")->find();
		//分解数据组合数组数据
		$size = explode('|', $goods_attr['size']);     //尺寸
		$color = explode('|', $goods_attr['color']);   //颜色
		
		//注册模版变量
		$this->assign('goodsData',$goodsData);
		$this->assign('size',$size);
		$this->assign('color',$color);
		
    	$this->display();
		
    }
	
	
	//立刻购买商品
	public function buy(){
		
		//判断是否是post提交并接收数据
		if($post = I('post.')){
			//调用模型
			$goods = new GoodsModel();
			if(!$goods->create($post,1)){
				$this->error($goods->getError());
			}else{
				//表单验证通过,核实商品数量是否正确
				$goods_price = $goods->field('goods_price')->where("goods_sn='{$post['goods_sn']}'")->find();
				//根据数据库查询出的价格计算总价
				$post['total_price'] = $goods_price['goods_price'] * $post['goods_num'];
				
				//注册模版变量
				$this->assign('orders',$post);
			}
			
		}else{
			$this->error('非法操作','/');
		}
		
		
		$this->display();
	}
	
}