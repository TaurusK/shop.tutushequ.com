<?php
namespace Admin\Model;

use Think\Model;

class GoodsModel extends Model {
	
	//定义自动验证规则
	protected $_validate = array(
		//添加场景-----1,最后的参数为场景参数
		array('category_id','require','分类必选',1,'',1), //默认情况下用正则进行验证
		array('goods_name','require','商品名必填',1,'',1), //默认情况下用正则进行验证
		array('goods_name','','商品名已存在',1,'unique',1), //默认情况下用正则进行验证
		array('size','require','请填写商品尺寸',1,'',1), //默认情况下用正则进行验证
		array('color','require','请填写商品颜色',1,'',1), //默认情况下用正则进行验证
		array('goods_price','require','请填写商品价格',1,'',1), //默认情况下用正则进行验证
		array('goods_amount','require','请填写商品库存',1,'',1), //默认情况下用正则进行验证
		
		
	);
	
	
	
}