<?php
namespace Home\Model;

use Think\Model;

class GoodsModel extends Model {
	
	//定义自动验证规则
	protected $_validate = array(
		//购买场景-----1,最后的参数为场景参数
		array('goods_name','require','商品名必填',1,'',1), //默认情况下用正则进行验证
		array('size','require','请填写商品尺寸',1,'',1), //默认情况下用正则进行验证
		array('color','require','请填写商品颜色',1,'',1), //默认情况下用正则进行验证
		array('goods_price','require','请填写商品价格',1,'',1), //默认情况下用正则进行验证
		array('goods_num','require','请填商品数量',1,'',1), //默认情况下用正则进行验证
		
	
	);
	
	
	
}