---
title: PHP 常见函数
author: zrg
description: PHP 常见函数
date: 2018-05-04
categories:
- php
tags:
- PHP
---
## String
1. strlen()，获取字符串长度。 

2. substr()，字符串截取。substr(字符串变量,开始截取的位置，截取个数） 。如：

```php
substr($tempStr,0,strlen($tempStr)-3);//去除字符串后3位 。
```

3. mb_substr() ，字符串截取。mb_substr(字符串变量,开始截取的位置，截取个数, 网页编码） 。

4. strpos()，查找字符串首次出现的位置。strpos(要处理的字符串, 要定位的字符串, 定位的起始位置[可选]) 
```php
// 截取某个字符之后的字符串
substr($str,strpos($str,"_");
```
5. str_replace()，搜索替换字符串。str_replace(要查找的字符串, 要替换的字符串, 被搜索的字符串, 替换进行计数[可选]) 

6. preg_replace()，搜索匹配替换字符串。Eg：搜索匹配到，,\n\r\s的使用|替换：preg_replace('/[,，\s\r\n]+/', '|', $ids); 

7. sprintf()，格式化字符串。sprintf(格式,要转化的字符串)，Eg：Sprintf('%01.2f',$str); 

8. Implode()/explode()，字符串的合并（array->string）与分割（string->array）。合并:Implode(分隔符[可选], 数组);分割:explode(分隔符[可选], 字符串) 

9. addslashes()，字符串转义。如I'm Zhao中的'。 

10. htmlentities/htmlspecialchars/addslashes/stripslashes/strip_tags、mysql_real_escape_strin。
> htmlentities 和 htmlspecialchars 的区别:这两个函数的功能都是转换字符为 HTML 字符编码，特别是 url 和代码字符串。htmlentities 转换所有的 html 标记；htmlspecialchars 只格式化& ' " < 和 > 这几个特殊符号。 
11. json_decode()，对 JSON 格式的字符串进行解码。 
12. json_encode()，对变量进行 JSON 编码 。 
13. strtolower()，把所有字符转换为小写 
14. strtoupper(), 把所有字符转换为大写 
15. strncmp() ， 二进制安全比较字符串开头的若干个字符（区分大小写） 
## Array
[PHP Array](https://www.php.net/manual/zh/ref.array.php)
> curl_setopt_array — 为 cURL 传输会话批量设置选项 
> array_change_key_case — 将数组中的所有键名修改为全大写或小写 
> array_chunk — 将一个数组分割成多个 
> array_column — 返回数组中指定的一列 
> array_combine — 创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值 
> array_count_values — 统计数组中所有的值 
> array_diff_assoc — 带索引检查计算数组的差集 
> array_diff_key — 使用键名比较计算数组的差集 
> array_diff_uassoc — 用用户提供的回调函数做索引检查来计算数组的差集 
> array_diff_ukey — 用回调函数对键名比较计算数组的差集 
> array_diff — 计算数组的差集 
> array_fill_keys — 使用指定的键和值填充数组 
> array_fill — 用给定的值填充数组 
> array_filter — 用回调函数过滤数组中的单元。相当于如下代码块：
```php
// 去除空元素
<?php
foreach($arr as $k=>$v){
if(!$v) unset($arr[$k]);
}
?>
```
> array_flip — 交换数组中的键和值 
> array_intersect_assoc — 带索引检查计算数组的交集 
> array_intersect_key — 使用键名比较计算数组的交集 
> array_intersect_uassoc — 带索引检查计算数组的交集，用回调函数比较索引 
> array_intersect_ukey — 用回调函数比较键名来计算数组的交集 
> array_intersect — 计算数组的交集 
> array_key_exists — 检查数组里是否有指定的键名或索引 
> array_key_first — Gets the first key of an array 
> array_key_last — Gets the last key of an array 
> array_keys — 返回数组中部分的或所有的键名 
> array_map — 为数组的每个元素应用回调函数 
> array_merge_recursive — 递归地合并一个或多个数组 
> array_merge — 合并一个或多个数组 
> array_multisort — 对多个数组或多维数组进行排序 
> array_pad — 以指定长度将一个值填充进数组 
> array_pop — 弹出数组最后一个单元（出栈） 
> array_product — 计算数组中所有值的乘积 
> array_push — 将一个或多个单元压入数组的末尾（入栈） 
> array_rand — 从数组中随机取出一个或多个单元 
> array_reduce — 用回调函数迭代地将数组简化为单一的值 
> array_replace_recursive — 使用传递的数组递归替换第一个数组的元素 
> array_replace — 使用传递的数组替换第一个数组的元素 
> array_reverse — 返回单元顺序相反的数组 
> array_search — 在数组中搜索给定的值，如果成功则返回首个相应的键名 
> array_shift — 将数组开头的单元移出数组 
> array_slice — 从数组中取出一段 
> array_splice — 去掉数组中的某一部分并用其它值取代 
> array_sum — 对数组中所有值求和 
> array_udiff_assoc — 带索引检查计算数组的差集，用回调函数比较数据 
> array_udiff_uassoc — 带索引检查计算数组的差集，用回调函数比较数据和索引 
> array_udiff — 用回调函数比较数据来计算数组的差集 
> array_uintersect_assoc — 带索引检查计算数组的交集，用回调函数比较数据 
> array_uintersect_uassoc — 带索引检查计算数组的交集，用单独的回调函数比较数据和索引 
> array_uintersect — 计算数组的交集，用回调函数比较数据 
> array_unique — 移除数组中重复的值 
> array_unshift — 在数组开头插入一个或多个单元 
> array_values — 返回数组中所有的值 
> array_walk_recursive — 对数组中的每个成员递归地应用用户函数 
> array_walk — 使用用户自定义函数对数组中的每个元素做回调处理 
> array — 新建一个数组 
> arsort — 对数组进行逆向排序并保持索引关系 
> asort — 对数组进行排序并保持索引关系 
> compact — 建立一个数组，包括变量名和它们的值 
> count — 计算数组中的单元数目，或对象中的属性个数 
> current — 返回数组中的当前单元 
> each — 返回数组中当前的键／值对并将数组指针向前移动一步 
> end — 将数组的内部指针指向最后一个单元 
> extract — 从数组中将变量导入到当前的符号表 
> in_array — 检查数组中是否存在某个值 
> key_exists — 别名 array_key_exists 
> key — 从关联数组中取得键名 
> krsort — 对数组按照键名逆向排序 
> ksort — 对数组按照键名排序 
> list — 把数组中的值赋给一组变量 
> natcasesort — 用“自然排序”算法对数组进行不区分大小写字母的排序 
> natsort — 用“自然排序”算法对数组排序 
> next — 将数组中的内部指针向前移动一位 
> pos — current 的别名 
> prev — 将数组的内部指针倒回一位 
> range — 根据范围创建数组，包含指定的元素 
> reset — 将数组的内部指针指向第一个单元 
> rsort — 对数组逆向排序 
> shuffle — 打乱数组 
> sizeof — count 的别名 
> sort — 对数组排序 
> uasort — 使用用户自定义的比较函数对数组中的值进行排序并保持索引关联 
> uksort — 使用用户自定义的比较函数对数组中的键名进行排序 
> usort — 使用用户自定义的比较函数对数组中的值进行排序 
## Date/Datetime

## Math
> bcadd — [加]2个任意精度数字的加法计算
	```php
	echo bcadd($a, $b, 4);  // 6.2340
```
> bcsub — [减]2个任意精度数字的减法
> bcmul — [乘]2个任意精度数字乘法计算
> bcdiv — [除]2个任意精度的数字除法计算 
> bcmod — 对一个任意精度数字取模 
> bccomp — 比较两个任意精度的数字 
> echo bcmul('1.34747474747', '35', 3); // 47.161 
> bcpow — 任意精度数字的乘方 
> bcpowmod — Raise an arbitrary precision number to another, reduced by a specified modulus 
> bcscale — 设置所有bc数学函数的默认小数点保留位数 
> bcsqrt — 任意精度数字的二次方根 

> echo bcsub($a, $b, 4);  // -3.7660 
> intval(), 直接取整
> round(), 四舍五入
> ceil()，向上取整。 
> floor(), 向下取整
> 
## 文件
> file_put_contents, 将一个字符串写入文件
```php
<?php
// 格式:file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] ) : int
// FILE_USE_INCLUDE_PATH	在 include 目录里搜索 filename。 更多信息可参见 include_path。
// FILE_APPEND	如果文件 filename 已经存在，追加数据而不是覆盖。
// LOCK_EX	在写入时获得一个独占锁。
file_put_contents('20190606.json', json_encode(), FILE_APPEND, null);
```
> file_get_contents — 将整个文件读入一个字符串
```php
// 格式:file_get_contents ( string $filename [, bool $use_include_path = false [, resource $context [, int $offset = -1 [, int $maxlen ]]]] ) : string

```
> file_exists — 检查文件或目录是否存在
## 魔术方法
> __call() ，在一个对象的上下文中，如果调用的方法不能访问，它将被触发。 
> __callStatic() ，在一个静态的上下文中，如果调 用的方法不能访问，它将被触发。 
