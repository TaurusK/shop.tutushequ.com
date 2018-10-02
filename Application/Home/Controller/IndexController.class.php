<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\GoodsModel;

class IndexController extends Controller {
	
	//商城首页
    public function index(){
    	
		//调用模型
		$goodsModel = new GoodsModel();
		
		//查询首页热卖商品
		$hotGoods = $goodsModel->field('id,goods_name,goods_img,goods_price')->where(['category_id'=>['in','5,7']])->select();
		//查询首页推荐商品
		$recommendGoods = $goodsModel->field('id,goods_name,goods_img,goods_price')->where(['category_id'=>['in','4,8']])->select();
		//新品
		$newsGoods = $goodsModel->field('id,goods_name,goods_img,goods_price')->where(['category_id'=>['in','6,7']])->select();
		
		//注册模版变量
		$this->assign('hotGoods',$hotGoods);
		$this->assign('recommendGoods',$recommendGoods);
		$this->assign('newsGoods',$newsGoods);	
    	$this->display();
		
    }
}