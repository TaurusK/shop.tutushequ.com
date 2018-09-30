<?php
namespace Admin\Model;

use Think\Model;

class ManagerModel extends Model {
	
	//定义自动验证规则
	protected $_validate = array(
		//添加场景-----1,最后的参数为场景参数
		array('username','require','用户名必填',1,'',1), //默认情况下用正则进行验证
		array('username','','用户名已存在',1,'unique',1), //默认情况下用正则进行验证
		array('password','require','密码必填',1,'',1), //默认情况下用正则进行验证
		
		//编辑场景-----2,最后的参数为场景参数
		array('username','require','用户名必填',1,'',2), //默认情况下用正则进行验证
		
		//登录场景-----3,最后的参数为场景参数
		array('username','require','用户名必填',1,'',3), //默认情况下用正则进行验证
		array('password','require','密码必填',1,'',3), //默认情况下用正则进行验证
	);
	
}