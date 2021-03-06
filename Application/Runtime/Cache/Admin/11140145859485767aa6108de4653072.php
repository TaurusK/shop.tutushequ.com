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
						  <li class="active">编辑管理员</li>
						</ol>
					</div>
					<!-- main -->
					<div class="row">
						<form class="form-horizontal" method="post">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
						    <div class="col-sm-3">
						      <input type="text" value="<?php echo ($data["username"]); ?>" name="username" class="form-control" id="inputEmail3">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
						    <div class="col-sm-3">
						      <input type="password" placeholder="不填则表示不修改密码" name="password" class="form-control" id="inputPassword3">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-3">
						      <button type="submit" class="btn btn-default">保存</button>
						    </div>
						  </div>
						</form>
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