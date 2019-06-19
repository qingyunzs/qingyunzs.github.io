---
layout: post
title: JavaScript Functions
author: zrg
comments: true
description: JS  函数
categories:
- php
tags:
- PHP
photos:
---
## 数字取整问题
1. 直接取整(不考虑小数点后的部分)
    ```javascript
    // 方式一: parseInt()
    var n = parseInt("3.14"); //3
    var n = parseInt("-3.14"); //-3
    var n = parseInt("2019hello"); //2019
    var n = parseInt(""); //NaN
    var n = parseInt("0xA"); //10(十六进制)
    var n = parseInt("070"); //56(八进制)
    // 方式二: 位运算
    var n = ~~3.14 //3
    var n = 3.14^0 //3
    var n = 3.14<<0 //3
    // 方式三: 
    ```
2. 计算后取整(四舍五入,向上取整,向下取整)
	```javascript
	// 四舍五入
	var n = Math.round(3.14); //3
	var n = Math.ceil(8.54); //9
	// 向上取整
	var n = Math.ceil(3.14); //4
	// 向下取整
	var n = Math.ceil(3.14); //3
    ```