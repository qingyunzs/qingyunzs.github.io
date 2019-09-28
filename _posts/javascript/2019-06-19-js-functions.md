---
layout: post
title: JavaScript Functions
author: zrg
comments: true
description: JavaScript  Notes
categories:
- javascript
tags:
- JavaScript
- LTS
photos:
---
## MySQL Functions
## Array
### 判断一个元素是否存在数组中
```javascript
var arr = ['a,','b','c','d','e'];
if(arr.indexOf('a') >= 0) // indexOf 如果元素存在于数组中，会返回数组下标，否则返回 -1
if($.inArray('a',arr) >=0) // 使用 jQuery 的 inArray 方法，与 indexOf 一样，如果元素存在于数组中，会返回数组下标，否则返回 -1
```
### 判断某个 value 是否存在对象中
### 数组对象遍历操作
1. 使用 Object.keys(obj) 遍历
```javascript
var obj = {'0':'a','1':'b','2':'c'};
Object.keys(obj).forEach(function(key){
	console.log(key,obj[key]);
});
// 注意： forEach不支持以下2种方式跳出循环，
// 1) break; 执行报错: Uncaught SyntaxError: Illegal break statement
// 2) return false; 只能跳出当前遍历执行

// 返回指定格式数组
var obj = {"1":5,"2":7,"3":0,"4":0,"5":0,"6":0,"7":0,"8":0}
var result = Object.keys(obj).map(function(key) {
  return [Number(key), obj[key]];
});
console.log(result);// [[1,5],[2,7],[3,0],[4,0]...].


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
## Date
## Math & Number
+ random()，默认返回 0 ~ 1 之间的随机数。
```javascript
// 取得介于 1 到 10 之间的一个随机数：
Math.floor((Math.random()*10)+1);
// 返回 min（包含）～ max（包含）之间的数字：
function getRndInteger(min, max) {
	return Math.floor(Math.random() * (max - min + 1) ) + min;
}
```

+ 直接取整(不考虑小数点后的部分)
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
+ 计算后取整(四舍五入,向上取整,向下取整)
```javascript
// 四舍五入
var n = Math.round(3.14); //3
var n = Math.ceil(8.54); //9
// 向上取整
var n = Math.ceil(3.14); //4
// 向下取整
var n = Math.ceil(3.14); //3
```
## String
+ concat(str1,str2)，字符串拼接
+ left(str, length)，
+ right(str, length)，
+ substring(str, pos, length[optional])，pos：从第几位开始截取
+ mid()，
+ substr()，
+ substring_index(str, delim, count)，delim：关键字，count：关键字出现的次数
