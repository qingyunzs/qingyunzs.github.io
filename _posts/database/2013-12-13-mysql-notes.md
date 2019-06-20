---
layout: post
title: MySQL 使用笔记
author: zrg
comments: false
description: MySQL 笔记
categories:
- database
tags:
- MySQL
photos:
---

## MySQL 数据类型
### Char vs Varchar vs Text
TEXT的最大长度:
|type|size(bytes)|size(MB)|
|:---|:---|:---|
|TINYTEXT|256 bytes|/|
|TEXT|65,535 bytes|~64KB|
|MEDIMUMTEXT|16,777,215 bytes|~16MB|
|LONGTEXT|4,294,967,295 bytes|~4GB|

## MySQL备份与还原
> $ mysqldump -u username -p dbname>filename.sql输入密码
> //单独备份指定表
> $ mysqldump -u username -p dbname table1 table2>filename.sql输入密码
> //加条件备份指定表(注意单引号和双引号问题)
> $ mysqldump -u username -p dbname table1 table2 -w "id<10">filename.sql
> //执行SQL语句将查到的数据导出到文件
> $ mysql -u gcoin -p -Ne "use gold;select * from ecs_user" > ~/outfile.txt

windows
> $ mysql -u username -p 输入密码
> \>create database dbname
> \>use dbname
> \>source filename.sql

Linux
> $mysql -u username -p dbname<filename.sql

### 当没有备份数据库(mysql)时,恢复数据库办法
描述: 
	一次误操作导致系统崩溃了，数据库没来得及备份，重装系统后，进入D盘发现mysql/data目录下仍然存留frm文件和ibd文件（注意：我的www目录存在了D盘，也就是非系统盘）。
具体步骤:
	a. 进入mysql/data目录下，将存留的frm和ibd文件拷贝。
	b. 放到同样环境的mysql/data目录下。启动msyql，查看结果。
## MySQL 用户与权限
** 新建用户
: 示例：新建一个名为admin密码为123456的用户，建议方式2： 
: --方法1： 
: >insert into mysql.user(Host,User,Password)values("192.168.120.110","sa",password("123456")); 
: >flush privileges; 
: --方法2： 
: > create user admin@localhost identified by 'admins_password'; 
** 修改指定用户的密码 
: >update mysql.user set password=password('123456') where User="admin" and Host="localhost";//适用于mysql5.7.6以前版本 
: >update mysql.user set authentication_string=password('密码') where user='admin' and Host = 'localhost'; 或者 set password for 'admin'@'localhost'=password('密码');//适用于5.7.6以后版本 
: >flush privileges; 
: 下面是另一种方法： 
: >mysqladmin -u root -p password 'root' 
: >history -c //清除历史 
** 给用户授权
: 示例：授予用户admin全部权限，并允许该用户通过外部访问 
: >GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' identified by '123456' with grant option; 
: >flush privileges;  //刷新系统权限表 
: 示例：授权用户admin仅拥有数据库estep的所有权限允许本地访问： 
: >GRANT ALL PRIVILEGES ON estep.* TO 'admin'@'127.0.0.1' identified by '123456' with grant option; 
: >flush privileges;  //刷新系统权限表 
: 示例：指定数据库estep的部分权限给用户admin： 
: >grant select,update on estep.* to 'admin'@'localhost' identified by '123456'; 
: >flush privileges;  //刷新系统权限表 
