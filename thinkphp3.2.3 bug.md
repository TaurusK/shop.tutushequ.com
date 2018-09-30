# thinkphp3.2.3 bug记录

1.thinkphp3.2.3 在nginx环境中使用时U函数会出现bug

​	U函数不能正常生成url

解决：

​	1.改写框架核心文件，ThinkPHP.php

​	2.开启nginx url重写隐藏index.php入口文件

​	3.访问时不能带index.php/home/index/index入口文件这样访问，不然还会有bug

​	正确的访问为/home/index/index