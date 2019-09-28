---
layout: post
title: MySQL 使用笔记
author: zrg
comments: false
description: MySQL 笔记
date: 2017-12-14
categories:
- database
tags:
- MySQL
photos:
---

## MySQL 数据类型
### 数据字段属性
+ UNSIGNED
+ ZEROFILL
+ AUTO_INCREMENT
+ NULL & NOT NULL
+ DEFAULT
+ 
### Char vs Varchar vs Text
TEXT的最大长度:

|type|size(bytes)|size(MB)|
|:---|:---|:---|
|TINYTEXT|256 bytes|/|
|TEXT|65,535 bytes|~64KB|
|MEDIMUMTEXT|16,777,215 bytes|~16MB|
|LONGTEXT|4,294,967,295 bytes|~4GB|

## MySQL 默认字符集
1. MySQL的字符集支持(Character Set Support)有两个方面： 字符集(Character set)和排序方式(Collation)。 
2. 对于字符集的支持细化到四个层次: 服务器(server)，数据库(database)，数据表(table)和连接(connection)。**相当于一个优先级，7最高，1最低**
    (1)编译MySQL 时，指定了一个MySQL默认的字符集，这个字符集是 latin1； 
    (2)安装MySQL 时，可以在配置文件 (my.ini) 中指定一个默认的的字符集，如果没指定，这个值继承自编译时指定的； 
    (3)启动mysql 时，可以在命令行参数中指定一个默认的的字符集，如果没指定，这个值继承自配置文件中的配置,此时 character_set_server 被设定为这个默认的字符集；
    (4)当创建一个新的数据库时，除非明确指定，这个数据库的字符集被缺省设定为character_set_server； 
    (5)当选定了一个数据库时，character_set_database 被设定为这个数据库默认的字符集； 
    (6)在这个数据库里创建一张表时，表默认的字符集被设定为 character_set_database，也就是这个数据库默认的字符集；
    (7)当在表内设置一栏时，除非明确指定，否则此栏缺省的字符集就是表默认的字符集。
3. 查看系统的字符集和排序方式
```shell
mysql> show variables like 'character%'
mysql> show variables like 'collation_%'
```
## MySQL 备份与还原
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

## MySQL 函数(Functions)
### String Functions
+ ASCII，returns the ASCII value for the specific character.
+ char_length，return the length of a string (in characters).
+ char
+ concat，多个字段拼接
+ concat_ws，代表 concat with separator，是concat()的特殊形式。
```sql
-- Syntax: ASCII(character)
SELECT ASCII(CustomerName) AS NumCodeOfFirstChar FROM Customers;
-- Syntax: CHAR_LENGTH(string)
SELECT CHAR_LENGTH(CustomerName) AS LengthOfName FROM Customers;
-- Syntax: CHARACTER_LENGTH(string)
SELECT CHARACTER_LENGTH(CustomerName) AS LengthOfName FROM Customers;
-- Syntax: CONCAT(expression1, expression2, expression3,...)
-- Syntax: CONCAT(expression1, expression2, expression3,...)
-- Syntax: CONCAT(expression1, expression2, expression3,...)
SELECT CONCAT("SQL ", "Tutorial ", "is ", "fun!") AS ConcatenatedString;
SELECT CONCAT(Address, " ", PostalCode, " ", City) AS Address FROM Customers;
-- Syntax: CONCAT_WS(separator, expression1, expression2, expression3,...)
-- 第一个参数是其它参数的分隔符。
SELECT CONCAT_WS(" ", Address, PostalCode, City) AS Address FROM Customers;
```
> https://dev.mysql.com/doc/refman/8.0/en/string-functions.html

### Numeric Functions

### Date Functions

### Advanced Functions
+ case
```sql
SELECT OrderID, Quantity,
CASE
    WHEN Quantity > 30 THEN "The quantity is greater than 30"
    WHEN Quantity = 30 THEN "The quantity is 30"
    ELSE "The quantity is under 30"
END
FROM OrderDetails;
```
+ cast
```sql
--  converts a value (of any type) into the specified datatype.
-- syntax: CAST(value AS datatype)
SELECT CAST("14:06:10" AS TIME);
SELECT CAST(150 AS CHAR);
```