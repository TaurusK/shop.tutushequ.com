<?php if (!defined('THINK_PATH')) exit();?><!-- header -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	    <link rel="stylesheet" href="<?php echo C('STATIC_RESOURCE');?>css/bootstrap3.3.7.min.css" />
		<title>后台首页</title>
		<style>
			.top{
				color: #fffff3;
				background:#222222;
				padding:10px;
			}
			.left{
				color:#95b1a7;
				background:#4d5e70;
			}
			.left_height{
				height: calc(100vh - 54px);
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row top">
				<div class="col-lg-2">商城后台管理系统</div>
				<div class="col-lg-10 text-right dropdown">
					超级管理员：
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    admin
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
				    <li><a href="#">退出</a></li>
				  </ul>
				</div>
			</div>

			<div class="row">
				<!-- left -->
				<div class="col-lg-2 left left_height">
					<ul class="nav nav-pills nav-stacked">
					  <li role="presentation" class="dropdown active">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					      	用户管理 <span class="caret"></span>
					    </a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo U('Admin/Manager/index');?>">管理员列表</a></li>
							<li><a href="<?php echo U('admin/Manager/add');?>">添加管理员</a></li>
						</ul>
					  </li>
					  <li role="presentation" class="dropdown active">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					      	权限管理 <span class="caret"></span>
					    </a>
						<ul class="dropdown-menu">
							<li><a href="#">用户列表</a></li>
							<li><a href="#">添加用户</a></li>
						</ul>
					  </li>
					</ul>
				</div>

				<div class="col-lg-10">
					<div class="row">
						<!--路径导航-->
						<ol class="breadcrumb">
						      当前位置：
						  <li><a href="#">用户管理</a></li>
						  <li class="active">管理员列表</li>
						</ol>
					</div>
					<!-- main -->
					<div class="row">
						<table class="table table-striped table-hover table-responsive">
							<tr>
								<th>id</th>
								<th>用户名</th>
								<th>角色</th>
								<th>登录时间</th>
								<th>修改时间</th>
								<th>创建时间</th>
								<th>操作</th>
							</tr>
							<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
								<td><?php echo ($v['id']); ?></td>
								<td><?php echo ($v['username']); ?></td>
								<td><?php echo ($v['role_id']); ?></td>
								<td><?php echo (date("Y-m-d H:i:s",$v['login_time'])); ?></td>
								<td><?php echo (date("Y-m-d",$v['update_time'])); ?></td>
								<td><?php echo (date("Y-m-d",$v['create_time'])); ?></td>
								<td>
									<a href="<?php echo U('admin/Manager/upd');?>?id=<?php echo ($v["id"]); ?>" class="btn btn-warning btn-xs">编辑</a>
									<a href="<?php echo U('admin/Manager/del?id=$v.id');?>" class="btn btn-danger btn-xs">删除</a>
								</td>
							</tr><?php endforeach; endif; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
		
	<!-- footer -->
	<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script type="text/javascript" src="<?php echo C('STATIC_RESOURCE');?>js/jquery2.1.4.min.js" ></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="<?php echo C('STATIC_RESOURCE');?>js/bootstrap3.3.7.min.js"></script>

	</body>
</html>