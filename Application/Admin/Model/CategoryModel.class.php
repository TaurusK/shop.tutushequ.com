<?php
namespace Admin\Model;

use Think\Model;

class CategoryModel extends Model {
	
	//定义自动验证规则
	protected $_validate = array(
		//添加场景-----1,最后的参数为场景参数
		array('pid','require','请选择所属分类',1,'',1), //默认情况下用正则进行验证
		array('category_name','require','分类名必填',1,'',1), //默认情况下用正则进行验证
		
		//编辑场景-----2,最后的参数为场景参数
		array('category_name','','用户名已存在',1,'unique',2), //默认情况下用正则进行验证
		
	);
	
	//递归重组排序查询出来的分类方法
	public function recursionCat($catData,$pid=0,$level=0){
		static $newCat = [];   //定义一个静态变量用于保存重组的权限
		foreach($catData as $k => $v){
			if($v['pid']==$pid){
				$v['level']=$level;
				$newCat[$v['id']]=$v;   //优化，以分类的id------cat_id做为新数组的下标,这样可以不用连表就能获取到父分类名
				unset($catData[$k]);   //递归优化，把找到的分类删除了
				//递归重组
				$this->recursionCat($catData,$v['id'],$level+1);
			}
		}
		//返回重组后的数据
		return $newCat;
	}
}