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

## 数组对象遍历操作
1. 使用 Object.keys(obj) 遍历
```javascript
var obj = {'0':'a','1':'b','2':'c'};
Object.keys(obj).forEach(function(key){
	console.log(key,obj[key]);
});
// 注意： forEach不支持以下2种方式跳出循环，
// 1) break; 执行报错: Uncaught SyntaxError: Illegal break statement
// 2) return false; 只能跳出当前遍历执行

// 缺失需要跳出循环，使用 try...catch...
var obj = {'0':'a','1':'b','2':'c'};
try {
Object.keys(obj).forEach(function(key){
	if(key == 'a'){
		console.log(key,obj[key]);
		throw new Error('exist');
	}
});
} catch (ex) {
  if(ex.message=='exist') throw ex
} finally {
  console.log('done')
}
```
2. for-in.	
```javascript
var obj = {'0':'a','1':'b','2':'c'};
for(var i in obj) {
	console.log(i,":",obj[i]);
}
```
3. for-of
```javascript
// 支持数组遍历、大多数类数组对象、字符串（视为一系列的Unicode字符来进行遍历）
var arr=["张三","李四","王五","赵六"];
for (var value of arr){
    console.log(value);
}
```
4. 使用Object.getOwnPropertyNames(obj) 遍历
```javascript
var obj = {'0':'a','1':'b','2':'c'};
Object.getOwnPropertyNames(obj).forEach(function(key){
    console.log(key,obj[key]);
});
```
4. 使用Reflect.ownKeys(obj) 遍历
```javascript
var obj = {'0':'a','1':'b','2':'c'};
Reflect.ownKeys(obj).forEach(function(key){
	console.log(key,obj[key]);
});
```