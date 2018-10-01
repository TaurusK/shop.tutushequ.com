# shop.tutushequ.com
# 一、开发环境部署

1.在windows下开发，使得git管理项目，同时自动同步到linux上

流程图：

![1538189754885](E:\shop.tutushequ.com\md_img\1.png)

2.这是一个微商城项目，使用thinkphp3.2.3框架开发

# 二、设计表

## 后台表设计

sh_manager--------------管理员表

sh_role---------------------角色表

sh_auth-------------------权限表

这三张表实现一个简单的 **RBAC** 权限管理

sh_manager 表字段：

**id，username，passwrod，role_id（角色id），login_time，update_time，create_time**

sh_role 表字段：

**id，role_name，auth_id_list（权限id列表），update_time，create_time**

sh_auth 表字段：

**id auth_value，pid，update_time，create_time**

完成了，用户添加、编辑，列表显示功能，用户登录，退出、防翻墙功能

## 商品管理模块

1.设计表，这里最少需要3张表

1.商品表：sh_goods

字段：id, category_id, goods_name, goods_img, goods_info, goods_price, is_sale(是否上架)，is_del(是否删除)，goods_amount(商品库存)

2.分类表：sh_category

字段：id, pid, category_name

商品属性表：sh_attribute

字段：id, goods_id, size, color