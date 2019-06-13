---
title: PHP 程序员升级之路
author: zrg
description: PHP 开发知识体系结构总结
date: 2018-08-05
categories:
- php
tags:
- PHP-Programmer
---
# Web 入门

## B/S vs C/S
B/S：SMS, SNS, WebGame, Wiki, RSS, BLog, 电子商务系统

## Web 2.0
Web1.0->Web2.0->Web3.0（Microsoft，站内信可以直接和其他网站进行交换和互动）->Web4.0（Eg. 聚餐吃饭情形，实现资源共享）

网页设计发展阶段:table->table+css->div+css

## 脚本语言和主流 Web 应用开发平台
脚本语言：PHP, HTML, CSS, JavaScript, VBScript, ActionScript, ASP, JSP, SQL, Perl, Python, Ruby, JavaFx, Lua, AutoIt, ...
+ Asp.Net
+ JavaEE
+ LAMP

## HTTP（HyperText Transfer Protocol）

### 工作过程：
1.	客户端连接到 Web Server
2.	发送 HTTP 请求
3.	服务器接收到请求并返回 HTTP 响应
4.	释放 TCP 连接
5.	客户端解析 HTML 内容

### HTTP Request Header
请求行（头部行）：请求方法，URL，HTTP 版本

### HTTP Response Header
协议版本，状态码，原因短语
content-length:
content-type: text/html

### 常见的状态码
1. 200
2. 301
3. 400
4. 500
5. 502

### URL vs URI
 URL(Uniform Resource Locator，统一资源定位符)
 URI(Uniform Resource Identifier，统一资源标识符)，用于标识互联网资源名称的字符串，常见形式就是 URL，另外还有一个叫 URN(Uniform Resource Name，统一资源名称)，通俗地说，URL 和 URN 是 URI 的子集，URI 属于更高层次的抽象。

### Web 工作原理
> 当用户打开浏览器，输入一个 URL，按下回车键，请大致描述发生的所有事件。

## HTML5 & CSS3

### HTML5
1. 新变化

	```html
	<!-- 声明 -->
	<!DOCTYPE html>
	<!-- 编码 -->
	<meta charset="UTF-8">
	<!-- 具有 boolean 属性 -->
	<input type="text" disabled="false" readonly="true" />
	<!-- 新增结构元素、表单属性、多媒体属性、其他元素 -->
	<header></header>
	<section></section>
	<aside></aside>
	<footer><footer>
	```
2. 高级功能：

	+ 绘制图形，如签名
	+ 本地存储和离线应用：本地存储分为 Web Storage(原 HTML 4 中扩展)和本地 DB(HTML5 新增)
	+ 通信 API：两种方式：跨文档消息传输和 Web Sockets API。解决了同源通信和跨域通信，同时 Server 不再需要被动的等待 Client 发出请求，只要两端建立连接后，Server 端就可以主动推送数据给 Client 端。
	+ 处理线程：在 HTML4 和 JS 编写程序时，所有的处理都是单线程内执行，话费时间比较长。HTML5 新增 Web Workers API，可以容易地在后台创建线程，并且这个后台线程还能创建多个子线程。
	+ 获取地理位置

### CSS3
圆角、多背景、3D 动画、渐变、阴影效果、透明度、……

### Less CSS 框架

## 主流前端技术

### BootStrap

### Jquery

### VueJS

# PHP 基础

## PHP 学习导向
    1. 确定学习目标
    2. 坚持动手实践
    3. 以解决事情为先
    4. 学习路线图

## 搭建 PHP 环境

### Linux 下源码安装

### Windows 下 WampServer 集成包安装
	1. 安装准备
	2. 安装步骤
	3. 环境测试
	4. 常见配置
		+ 改变 www 目录位置
		+ phpMyAdmin管理

## PHP 基本语法

### 基本语法结构

### 注释 & 指令分隔副符

### 变量及变量数据类型、数据类型转换

### 函数

### 运算符和表达式

### 流程控制

### 函数的应用
    1. 自定义函数
    2. 内置函数
    3. 递归函数
    4. 匿名函数(闭包函数)

## PHP Array

### foreach & list & each & while & for

### 数组的内部指针：
	1. current()
	2. key()
	3. next()
	4. prev()
	5. end()
	6. reset()

### 预定义 Array
	1. $_SERVER
	2. $_GET
	3. $_POST
	4. ...

### Array 操作函数

### 注意事项
	+ ”+“可以把两个数组合并，与 Array_merget() 作用差不多，只是它会去除重复的键值
	+ 两个 Array 存在相同的 Key、Value可以使用运算符比较
	+ 删除 Array 元素，使用 unset，但不会重建数组索引
	+ Array 下标只能是 int 和 string

## PHP String

### 单引号和双引号的区别

### echo & print & var_dump & die & printf & sprintf

### 常用字符串函数

## 正则表达式

## 面向对象

### 类、对象、抽象方法、接口

### 对象类型在内存中的分配：栈、堆、静态区、代码段

### 面向对象三特性
	1. 封装
	2. 继承
	3. 多态：最直接的定义就是让具有继承关系的不同类，可以对相同的成员方法进行调用，产生不同的效果。

### 单态设计模式

### instanceOf 关键字

### trait

### 命名空间

### 克隆对象

### 对象序列化
