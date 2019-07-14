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
+ addcslashes — 以 C 语言风格使用反斜线转义字符串中的字符
+ addslashes()，字符串转义，使用反斜线引用字符串。如I'm Zhao中的'。
+ bin2hex — 函数把包含数据的二进制字符串转换为十六进制值
+ chop — rtrim 的别名
+ chr — 返回指定的字符
+ chunk_split — 将字符串分割成小块
+ convert_cyr_string — 将字符由一种 Cyrillic 字符转换成另一种
+ convert_uudecode — 解码一个 uuencode 编码的字符串
+ convert_uuencode — 使用 uuencode 编码一个字符串
+ count_chars — 返回字符串所用字符的信息
+ crc32 — 计算一个字符串的 crc32 多项式
+ crypt — 单向字符串散列
+ echo — 输出一个或多个字符串
+ fprintf — 将格式化后的字符串写入到流
+ get_html_translation_table — 返回使用 htmlspecialchars 和 htmlentities 后的转换表
+ hebrev — 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew）
+ hebrevc — 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew），并且转换换行符
+ hex2bin — 转换十六进制字符串为二进制字符串
+ html_entity_decode — Convert HTML entities to their corresponding characters
+ htmlentities — 将字符转换为 HTML 转义字符
+ htmlspecialchars_decode — 将特殊的 HTML 实体转换回普通字符
+ htmlspecialchars — 将特殊字符转换为 HTML 实体
~~~
htmlentities 和 htmlspecialchars 的区别:
	这两个函数的功能都是转换字符为 HTML 字符编码，特别是 url 和代码字符串。htmlentities 转换所有的 html 标记；htmlspecialchars 只格式化& ' " < 和 \> 这几个特殊符号。 
~~~
+ lcfirst — 使一个字符串的第一个字符小写
+ levenshtein — 计算两个字符串之间的编辑距离
+ localeconv — Get numeric formatting information
+ ltrim — 删除字符串开头的空白字符（或其他字符）
+ md5_file — 计算指定文件的 MD5 散列值
+ md5 — 计算字符串的 MD5 散列值
+ metaphone — Calculate the metaphone key of a string
+ money_format — 将数字格式化成货币字符串
+ nl_langinfo — Query language and locale information
+ nl2br — 在字符串所有新行之前插入 HTML 换行标记
+ number_format — 以千位分隔符方式格式化一个数字
```php
// 无论值是否为0，都保留小数点后两位
echo number_format((float)round($a,2,PHP_ROUND_HALF_ODD),2,'.','');
// 整数部分以千位分隔符方式分隔
echo number_format((float)round($a,2,PHP_ROUND_HALF_ODD),2,'.',',');
```
+ ord — 转换字符串第一个字节为 0-255 之间的值
+ parse_str — 将字符串解析成多个变量
+ print — 输出字符串
+ printf — 输出格式化字符串
+ quoted_printable_decode — 将 quoted-printable 字符串转换为 8-bit 字符串
+ quoted_printable_encode — 将 8-bit 字符串转换成 quoted-printable 字符串
+ quotemeta — 转义元字符集
+ rtrim — 删除字符串末端的空白字符（或者其他字符）
+ setlocale — 设置地区信息
+ sha1_file — 计算文件的 sha1 散列值
+ sha1 — 计算字符串的 sha1 散列值
+ similar_text — 计算两个字符串的相似度
+ soundex — Calculate the soundex key of a string
+ sprintf — Return a formatted string
+ sscanf — 根据指定格式解析输入的字符
+ str_getcsv — 解析 CSV 字符串为一个数组
+ str_ireplace — str_replace 的忽略大小写版本
+ str_pad — 使用另一个字符串填充字符串为指定长度
+ str_repeat — 重复一个字符串
+ str_rot13 — 对字符串执行 ROT13 转换
+ str_shuffle — 随机打乱一个字符串
+ str_split — 将字符串转换为数组
+ str_word_count — 返回字符串中单词的使用情况
+ strcasecmp — 二进制安全比较字符串（不区分大小写）
+ strcmp — 二进制安全字符串比较
+ strcoll — 基于区域设置的字符串比较
+ strcspn — 获取不匹配遮罩的起始子字符串的长度
+ strip_tags — 从字符串中去除 HTML 和 PHP 标记
+ stripcslashes — 反引用一个使用 addcslashes 转义的字符串
+ strpos()，查找字符串首次出现的位置。strpos ( string $haystack , mixed $needle [, int $offset = 0 ] ) : int，如果没找到 needle，将返回 FALSE，此函数可能返回布尔值 FALSE，但也可能返回等同于 FALSE 的非布尔值。应使用 === 运算符来测试此函数的返回值。缺点：对中文支持不好
```php
// 判断是否包含某字符串
$pos = strpos($str,$needle);
if($pos !== false){
	echo 'exist';
}
```
+ stripslashes — 反引用一个引用字符串
+ strlen()，获取字符串长度。 
+ strnatcasecmp — 使用“自然顺序”算法比较字符串（不区分大小写）
+ strnatcmp — 使用自然排序算法比较字符串
+ strncasecmp — 二进制安全比较字符串开头的若干个字符（不区分大小写）
+ strncmp — 二进制安全比较字符串开头的若干个字符
+ strpbrk — 在字符串中查找一组字符的任何一个字符
+ substr()，字符串截取。substr(字符串变量,开始截取的位置，截取个数） 。如：
+ mb_substr() ，字符串截取。mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] ) : string
+ strstr()，返回字符串从查找字符串出现的位置开始到字符串结尾的字符串。
```php
// 去除字符串后3位
substr($tempStr,0,strlen($tempStr)-3); 
// 截取某个字符之后的字符串
substr($str,strpos($str,"_");
// 判断是否包含某字符串，没有返回值，则不包含
echo strstr($str,'@');
```
+ stristr()，与 strstr() 的使用方法一样，区别是 stristr 不区分大小写。
+ strchr — strstr 的别名
+ strrchr — 查找指定字符在字符串中的最后一次出现
+ strrev — 反转字符串
+ strripos — 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
+ strspn — 计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。
+ strspn — 计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。
+ strstr — 查找字符串的首次出现
+ strtok — 标记分割字符串
+ strtolower — 将字符串转化为小写
+ strtoupper — 将字符串转化为大写
+ strtr — 转换指定字符
+ substr_compare — 二进制安全比较字符串（从偏移位置比较指定长度）
+ substr_count — 计算字串出现的次数
+ str_replace()，搜索替换字符串。substr_replace ( mixed $string , mixed $replacement , mixed $start [, mixed $length ] ) : mixed
+ trim — 去除字符串首尾处的空白字符（或者其他字符）
+ ucfirst — 将字符串的首字母转换为大写
+ ucwords — 将字符串中每个单词的首字母转换为大写
+ vfprintf — 将格式化字符串写入流
+ vprintf — 输出格式化字符串
+ vsprintf — 返回格式化字符串
+ wordwrap — 打断字符串为指定数量的字串
+ preg_replace()，搜索匹配替换字符串。Eg：搜索匹配到，,\n\r\s的使用|替换：preg_replace('/[,，\s\r\n]+/', '|', $ids);
+ sprintf()，格式化字符串。sprintf(格式,要转化的字符串)，Eg：Sprintf('%01.2f',$str);
+ Implode()，字符串的合并（array->string）。
+ explode()，字符串的分割（string->array）。
+ join — implode() 的别名
```php
// 判断是否包含某字符串
$tempArr = explode(',',$str);
if(count($tempArr) > 1){
	return true;
}
```

+ htmlentities/htmlspecialchars/addslashes/stripslashes/strip_tags、mysql_real_escape_strin。
+ json_decode()，对 JSON 格式的字符串进行解码。
+ json_encode()，对变量进行 JSON 编码 。
+ strtolower()，把所有字符转换为小写
+ strtoupper(), 把所有字符转换为大写
+ strncmp() ， 二进制安全比较字符串开头的若干个字符（区分大小写）

## Array
[PHP Array](https://www.php.net/manual/zh/ref.array.php)
+ curl_setopt_array — 为 cURL 传输会话批量设置选项
+ array_change_key_case — 将数组中的所有键名修改为全大写或小写
+ array_chunk — 将一个数组分割成多个
+ array_column — 返回数组中指定的一列
+ array_combine — 创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
+ array_count_values — 统计数组中所有的值

+ array_diff_assoc — 带索引检查计算数组的差集
+ array_diff_key — 使用键名比较计算数组的差集
+ array_diff_uassoc — 用用户提供的回调函数做索引检查来计算数组的差集
+ array_diff_ukey — 用回调函数对键名比较计算数组的差集
+ array_diff — 计算数组的差集
```php
// array_diff_assoc ( array $array1 , array $array2 [, array $... ] ) : array
//  返回一个数组，该数组包括了所有在 array1 中但是不在任何其它参数数组中的值。键名也用于比较。

// array_diff_key ( array $array1 , array $array2 [, array $... ] ) : array
// 使用键名比较计算数组的差集

// array_diff_uassoc ( array $array1 , array $array2 [, array $... ], callable $key_compare_func ) : array
// 用用户提供的回调函数做索引检查来计算数组的差集

// array_diff_ukey ( array $array1 , array $array2 [, array $... ], callable $key_compare_func ) : array
//  返回一个数组，该数组包括了所有出现在 array1 中但是未出现在任何其它参数数组中的键名的值。

// array_diff ( array $array1 , array $array2 [, array $... ] ) : array
// 返回在 array1 中但是不在其他 array 里的值。

```
+ array_intersect_assoc — 带索引检查计算数组的交集
+ array_intersect_key — 使用键名比较计算数组的交集
+ array_intersect_uassoc — 带索引检查计算数组的交集，用回调函数比较索引
+ array_intersect_ukey — 用回调函数比较键名来计算数组的交集
+ array_intersect — 计算数组的交集
```php

// 去除空元素
foreach($arr as $k=>$v){
	if(!$v) unset($arr[$k]);
}
```
+ array_fill — 用给定的值填充数组
+ array_fill_keys — 使用指定的键和值填充数组
+ array_filter — 用回调函数过滤数组中的单元。
```php
// array_filter ( array $array [, callable $callback [, int $flag = 0 ]] ) : array

```
+ array_flip — 交换数组中的键和值
+ array_key_exists — 检查数组里是否有指定的键名或索引
+ array_key_first — Gets the first key of an array
+ array_key_last — Gets the last key of an array
+ array_keys — 返回数组中部分的或所有的键名
+ array_map — 为数组的每个元素应用回调函数
+ array_walk_recursive — 对数组中的每个成员递归地应用用户函数
+ array_walk — 使用用户自定义函数对数组中的每个元素做回调处理
+ array_merge_recursive — 递归地合并一个或多个数组
+ array_merge — 合并一个或多个数组
+ array_multisort — 对多个数组或多维数组进行排序
+ array_reverse — 返回单元顺序相反的数组
+ array_pad — 以指定长度将一个值填充进数组
+ array_pop — 弹出数组最后一个单元（出栈）
+ array_product — 计算数组中所有值的乘积
+ array_push — 将一个或多个单元压入数组的末尾（入栈）
+ array_rand — 从数组中随机取出一个或多个单元
+ array_reduce — 用回调函数迭代地将数组简化为单一的值
+ array_replace_recursive — 使用传递的数组递归替换第一个数组的元素
+ array_replace — 使用传递的数组替换第一个数组的元素
+ array_search — 在数组中搜索给定的值，如果成功则返回首个相应的键名
+ array_slice — 从数组中取出一段
+ array_splice — 去掉数组中的某一部分并用其它值取代
+ array_sum — 对数组中所有值求和
+ array_udiff_assoc — 带索引检查计算数组的差集，用回调函数比较数据
+ array_udiff_uassoc — 带索引检查计算数组的差集，用回调函数比较数据和索引
+ array_udiff — 用回调函数比较数据来计算数组的差集
+ array_uintersect_assoc — 带索引检查计算数组的交集，用回调函数比较数据
+ array_uintersect_uassoc — 带索引检查计算数组的交集，用单独的回调函数比较数据和索引
+ array_uintersect — 计算数组的交集，用回调函数比较数据
+ array_unique — 移除数组中重复的值
+ array_shift — 将数组开头的单元移出数组
+ array_unshift — 在数组开头插入一个或多个单元
+ array_values — 返回数组中所有的值
+ array — 新建一个数组
+ arsort — 对数组进行逆向排序并保持索引关系
+ asort — 对数组进行排序并保持索引关系
+ compact — 建立一个数组，包括变量名和它们的值
+ count — 计算数组中的单元数目，或对象中的属性个数
+ current — 返回数组中的当前单元
+ each — 返回数组中当前的键／值对并将数组指针向前移动一步
+ end — 将数组的内部指针指向最后一个单元
+ extract — 从数组中将变量导入到当前的符号表
+ in_array — 检查数组中是否存在某个值
+ key_exists — 别名 array_key_exists
+ key — 从关联数组中取得键名
+ krsort — 对数组按照键名逆向排序
+ ksort — 对数组按照键名排序
+ list — 把数组中的值赋给一组变量
+ natcasesort — 用“自然排序”算法对数组进行不区分大小写字母的排序
+ natsort — 用“自然排序”算法对数组排序
+ next — 将数组中的内部指针向前移动一位
+ pos — current 的别名
+ prev — 将数组的内部指针倒回一位
+ range — 根据范围创建数组，包含指定的元素
+ reset — 将数组的内部指针指向第一个单元
+ rsort — 对数组逆向排序
+ shuffle — 打乱数组
+ sizeof — count 的别名
+ sort — 对数组排序
+ uasort — 使用用户自定义的比较函数对数组中的值进行排序并保持索引关联
+ uksort — 使用用户自定义的比较函数对数组中的键名进行排序
+ usort — 使用用户自定义的比较函数对数组中的值进行排序
## Date/Datetime

## Math
+ bcadd — [加]2个任意精度数字的加法计算
+ bcsub — [减]2个任意精度数字的减法
+ bcmul — [乘]2个任意精度数字乘法计算
+ bcdiv — [除]2个任意精度的数字除法计算 
```php
$a = '1.234';
$b = '5';
echo bcadd($a,$b, 4);  // 6.2340
echo bcsub($a, $b, 4);  // -3.7660
echo bcmul('1.34747474747', '35', 3); // 47.161
```
+ bcmod — 对一个任意精度数字取模 
+ bccomp — 比较两个任意精度的数字 
+ bcpow — 任意精度数字的乘方 
+ bcpowmod — Raise an arbitrary precision number to another, reduced by a specified modulus 
+ bcscale — 设置所有bc数学函数的默认小数点保留位数 
~~~
*扩展PHP高精度计算问题*
1. 引入
javascript
0.1 + 0.2 //为啥不等于 0.3 ? （正确结果：0.30000000000000004）
0.8 * 7 //为啥不等于 5.6 ? （正确结果：5.6000000000000005）
php
var_dump(intval(0.58 * 100)); // 正确结果是 57，而不是 58
2. 原因分析
浮点运算惹的祸，并非语言的 bug，但和语言的实现原理有关，不管什么语言，只要涉及浮点运算，都是存在类似的问题，使用时一定要注意。
浮点数的表示(IEEE 754)：浮点数, 以64位的长度(双精度)为例, 会采用1位符号位(E), 11指数位(Q), 52位尾数(M)表示(一共64位)。
符号位：最高位表示数据的正负，0表示正数，1表示负数。
指数位：表示数据以2为底的幂，指数采用偏移码表示。
尾数：表示数据小数点后的有效数字。
0.58的二进制表示是: 0.10010100011110101110000101000111101011100001010001111
0.57的二进制表示是: 0.1001000111101011100001010001111010111000010100011111
如果只是通过这52位计算的话,分别是:0.58 -> 0.57999999999999996，0.57 -> 0.5699999999999999。
PHP浮点型在进行+-*%/存在不准确的问题，例如，floor((0.1+0.7)*10) 通常会返回 7 而不是预期中的 8，因为该结果内部的表示其实是类似 7.9999999999...。
3. 结论
永远不要相信浮点数结果精确到了最后一位，也永远不要比较两个浮点数是否相等。如果确实需要更高的精度，应该使用任意精度数学函数或者 gmp 函数。
~~~
+ fmod — 返回除法的浮点数余数
+ intdiv — 对除法结果取整
+ bcsqrt — 任意精度数字的二次方根
+ sqrt — 平方根
+ is_finite — 判断是否为有限值
+ is_infinite — 判断是否为无限值
+ is_nan — 判断是否为合法数值
+ lcg_value — 组合线性同余发生器
+ log10 — 以 10 为底的对数
+ log1p — 返回 log(1 + number)，甚至当 number 的值接近零也能计算出准确结果
+ log — 自然对数
+ max — 找出最大值
+ min — 找出最小值

+ exp — 计算 e 的指数
+ expm1 — 返回 exp(number) - 1，甚至当 number 的值接近零也能计算出准确结果
+ pi — 得到圆周率值
+ pow— 指数表达式，pow ( number $base , number $exp ) : number

+ cos — 余弦
+ cosh — 双曲余弦
+ sin — 正弦
+ sinh — 双曲正弦
+ tan — 正切
+ tanh — 双曲正切
+ acos — 反余弦
+ acosh — 反双曲余弦
+ asin — 反正弦
+ asinh — 反双曲正弦
+ atan2 — 两个参数的反正切
+ atan — 反正切
+ atanh — 反双曲正切

+ deg2rad — 将角度转换为弧度
+ rad2deg — 将弧度数转换为相应的角度数
+ mt_getrandmax — 显示随机数的最大可能值
+ mt_rand — 生成更好的随机数
+ mt_srand — 播下一个更好的随机数发生器种子
+ rand — 产生一个随机整数
+ srand — 播下随机数发生器种子

+ intval(), 直接取整，intval ( mixed $var [, int $base = 10 ] ) : int
+ round(), 四舍五入
+ ceil()，向上取整
+ floor(), 向下取整
```php
// intval()
echo intval(3.14); // 3
// round()
// 格式：round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] ) : float
//  PHP_ROUND_HALF_UP、 PHP_ROUND_HALF_DOWN PHP_ROUND_HALF_EVEN 或 PHP_ROUND_HALF_ODD
$number = 1346.21;
var_dump(round($number, 2)); //float(1346.21)
var_dump(round($number, 0)); //float(1346)
var_dump(round($number, -1)); //float(1350)
var_dump(round($number, -2)); //float(1300)
var_dump(round(9.5, 0, PHP_ROUND_HALF_UP)); //10,四舍六入,遇5进1
var_dump(round(9.5, 0, PHP_ROUND_HALF_DOWN)); //9,四舍六入,遇5不舍弃
var_dump(round(9.5, 0, PHP_ROUND_HALF_EVEN)); //10,四舍六入,整数部分为奇数则进1
var_dump(round(9.5, 0, PHP_ROUND_HALF_ODD)); //9,四舍六入,整数部分为偶数则进1
var_dump(round(8.5, 0, PHP_ROUND_HALF_UP)); //9
var_dump(round(8.5, 0, PHP_ROUND_HALF_DOWN)); //8
var_dump(round(8.5, 0, PHP_ROUND_HALF_EVEN)); //8
var_dump(round(8.5, 0, PHP_ROUND_HALF_ODD)); //9
// ceil()
// 格式：ceil ( float $value ) : float
echo ceil(3.14); // 4
// floor()
// 格式：floor ( float $value ) : float
echo floor(3.14); // 3
var_dump(floor(3.157*100)/100));// 保留两位小数,不四舍五入
```
+ bindec — 二进制转换为十进制
+ decbin — 十进制转换为二进制
+ dechex — 十进制转换为十六进制
+ decoct — 十进制转换为八进制
+ octdec — 八进制转换为十进制
+ hexdec — 十六进制转换为十进制
+ base_convert — 在任意进制之间转换数字
```php
// decbin ( int $number ) : string
```
+ hypot — 计算一直角三角形的斜边长度

## 文件
+ basename — 返回路径中的文件名部分
+ chgrp — 改变文件所属的组
+ chmod — 改变文件模式
+ chown — 改变文件的所有者
+ clearstatcache — 清除文件状态缓存
+ copy — 拷贝文件
+ delete — 参见 unlink 或 unset

+ dirname — 返回路径中的目录部分
+ disk_free_space — 返回目录中的可用空间
+ disk_total_space — 返回一个目录的磁盘总大小
+ file_exists — 检查文件或目录是否存在
+ is_dir — 判断给定文件名是否是一个目录
+ mkdir — 新建目录
+ readlink — 返回符号连接指向的目标
+ realpath_cache_get — 获取真实目录缓存的详情
+ realpath_cache_size — 获取真实路径缓冲区的大小
+ realpath — 返回规范化的绝对路径名
+ rename — 重命名一个文件或目录
+ rmdir — 删除目录
+ glob — 寻找与模式匹配的文件路径
+ pathinfo — 返回文件路径的信息

+ diskfreespace — disk_free_space 的别名
+ fclose — 关闭一个已打开的文件指针
+ feof — 测试文件指针是否到了文件结束的位置
+ fflush — 将缓冲内容输出到文件
+ fgetc — 从文件指针中读取字符
+ fgetcsv — 从文件指针中读入一行并解析 CSV 字段
+ fgets — 从文件指针中读取一行
+ fgetss — 从文件指针中读取一行并过滤掉 HTML 标记
+ fputcsv — 将行格式化为 CSV 并写入文件指针
+ fputs — fwrite 的别名
```php
// fputcsv ( resource $handle , array $fields [, string $delimiter = ',' [, string $enclosure = '"' ]] ) : int

// fgetcsv ( resource $handle [, int $length = 0 [, string $delimiter = ',' [, string $enclosure = '"' [, string $escape = '\\' ]]]] ) : array

```

+ file_get_contents — 将整个文件读入一个字符串
+ file_put_contents — 将一个字符串写入文件
```php
<?php
// 格式:file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] ) : int
// FILE_USE_INCLUDE_PATH	在 include 目录里搜索 filename。 更多信息可参见 include_path。
// FILE_APPEND	如果文件 filename 已经存在，追加数据而不是覆盖。
// LOCK_EX	在写入时获得一个独占锁。
file_put_contents('../test.json', json_encode($data), FILE_APPEND, null);
file_put_contents('../test.json', json_encode($data));
// 格式:file_get_contents ( string $filename [, bool $use_include_path = false [, resource $context [, int $offset = -1 [, int $maxlen ]]]] ) : string
```
+ file — 把整个文件读入一个数组中
+ fileatime — 取得文件的上次访问时间
+ filectime — 取得文件的 inode 修改时间
+ filegroup — 取得文件的组
+ fileinode — 取得文件的 inode
+ filemtime — 取得文件修改时间
+ fileowner — 取得文件的所有者
+ fileperms — 取得文件的权限
+ filesize — 取得文件大小
+ filetype — 取得文件类型
+ flock — 轻便的咨询文件锁定
+ fnmatch — 用模式匹配文件名
+ fopen — 打开文件或者 URL
+ fpassthru — 输出文件指针处的所有剩余数据

+ fread — 读取文件（可安全用于二进制文件）
+ fscanf — 从文件中格式化输入
+ fseek — 在文件指针中定位
+ fstat — 通过已打开的文件指针取得文件信息
+ ftell — 返回文件指针读/写的位置
+ ftruncate — 将文件截断到给定的长度
+ fwrite — 写入文件（可安全用于二进制文件）

+ is_executable — 判断给定文件名是否可执行
+ is_file — 判断给定文件名是否为一个正常的文件
+ is_link — 判断给定文件名是否为一个符号连接
+ is_readable — 判断给定文件名是否可读
+ is_uploaded_file — 判断文件是否是通过 HTTP POST 上传的
+ is_writable — 判断给定的文件名是否可写
+ is_writeable — is_writable 的别名
+ lchgrp — 修改符号链接的所有组
+ lchown — 修改符号链接的所有者
+ link — 建立一个硬连接
+ linkinfo — 获取一个连接的信息
+ lstat — 给出一个文件或符号连接的信息

+ move_uploaded_file — 将上传的文件移动到新位置
+ parse_ini_file — 解析一个配置文件
+ parse_ini_string — 解析配置字符串
+ pclose — 关闭进程文件指针
+ popen — 打开进程文件指针
+ readfile — 输出文件
+ rewind — 倒回文件指针的位置

+ set_file_buffer — stream_set_write_buffer 的别名
+ stat — 给出文件的信息
+ symlink — 建立符号连接
+ tempnam — 建立一个具有唯一文件名的文件
+ tmpfile — 建立一个临时文件
+ touch — 设定文件的访问和修改时间
+ umask — 改变当前的 umask
+ unlink — 删除文件>

## PHP Options/Info
+ assert_options — 设置/获取断言的各种标志
+ assert — 检查一个断言是否为 FALSE
+ cli_get_process_title — Returns the current process title
+ cli_set_process_title — Sets the process title
+ dl — 运行时载入一个 PHP 扩展
+ extension_loaded — 检查一个扩展是否已经加载
+ gc_collect_cycles — 强制收集所有现存的垃圾循环周期
+ gc_disable — 停用循环引用收集器
+ gc_enable — 激活循环引用收集器
+ gc_enabled — 返回循环引用计数器的状态
+ gc_mem_caches — Reclaims memory used by the Zend Engine memory manager
+ gc_status — Gets information about the garbage collector
+ get_cfg_var — 获取 PHP 配置选项的值
+ get_current_user — 获取当前 PHP 脚本所有者名称
+ get_defined_constants — 返回所有常量的关联数组，键是常量名，值是常量值
+ get_extension_funcs — 返回模块函数名称的数组
+ get_include_path — 获取当前的 include_path 配置选项
+ get_included_files — 返回被 include 和 require 文件名的 array
+ get_loaded_extensions — 返回所有编译并加载模块名的 array
+ get_magic_quotes_gpc — 获取当前 magic_quotes_gpc 的配置选项设置
+ get_magic_quotes_runtime — 获取当前 magic_quotes_runtime 配置选项的激活状态
+ get_required_files — 别名 get_included_files
+ get_resources — Returns active resources
+ getenv — 获取一个环境变量的值
+ getlastmod — 获取页面最后修改的时间
+ getmygid — 获取当前 PHP 脚本拥有者的 GID
+ getmyinode — 获取当前脚本的索引节点（inode）
+ getmypid — 获取 PHP 进程的 ID
+ getmyuid — 获取 PHP 脚本所有者的 UID
+ getopt — 从命令行参数列表中获取选项
+ getrusage — 获取当前资源使用状况
+ ini_alter — 别名 ini_set
+ ini_get_all — 获取所有配置选项
+ ini_get — 获取一个配置选项的值
+ ini_restore — 恢复配置选项的值
+ ini_set — 为一个配置选项设置值
+ magic_quotes_runtime — 别名 set_magic_quotes_runtime
+ main — 虚拟的main
+ memory_get_peak_usage — 返回分配给 PHP 内存的峰值
+ memory_get_usage — 返回分配给 PHP 的内存量
+ php_ini_loaded_file — 取得已加载的 php.ini 文件的路径
+ php_ini_scanned_files — 返回从额外 ini 目录里解析的 .ini 文件列表
+ php_logo_guid — 获取 logo 的 guid
+ php_sapi_name — 返回 web 服务器和 PHP 之间的接口类型
+ php_uname — 返回运行 PHP 的系统的有关信息
+ phpcredits — 打印 PHP 贡献者名单
+ phpinfo — 输出关于 PHP 配置的信息
+ phpversion — 获取当前的PHP版本
+ putenv — 设置环境变量的值
+ restore_include_path — 还原 include_path 配置选项的值
+ set_include_path — 设置 include_path 配置选项
+ set_magic_quotes_runtime — 设置当前 magic_quotes_runtime 配置选项的激活状态
+ set_time_limit — 设置脚本最大执行时间
+ sys_get_temp_dir — 返回用于临时文件的目录
+ version_compare — 对比两个「PHP 规范化」的版本数字字符串
+ zend_logo_guid — 获取 Zend guid
+ zend_thread_id — 返回当前线程的唯一识别符
+ zend_version — 获取当前 Zend 引擎的版本
## 魔术方法
+ __call() ，在一个对象的上下文中，如果调用的方法不能访问，它将被触发。 
+ __callStatic() ，在一个静态的上下文中，如果调 用的方法不能访问，它将被触发。 
```php
// public __call ( string $name , array $arguments ) : mixed
// public static __callStatic ( string $name , array $arguments ) : mixed
// 当调用当前环境下未定义或不可见的类属性或方法时，重载方法会被调用。

```
## 函数处理 函数
+ call_user_func_array — 调用回调函数，并把一个数组参数作为回调函数的参数
+ call_user_func — 把第一个参数作为回调函数调用
```php
// call_user_func_array ( callable $callback , array $param_arr ) : mixed
// call_user_func ( callable $callback [, mixed $parameter [, mixed $... ]] ) : mixed
```
+ create_function — Create an anonymous (lambda-style) function
+ forward_static_call_array — Call a static method and pass the arguments as array
+ forward_static_call — Call a static method
+ func_get_arg — 返回参数列表的某一项
+ func_get_args — 返回一个包含函数参数列表的数组
+ func_num_args — Returns the number of arguments passed to the function
+ function_exists — 如果给定的函数已经被定义就返回 TRUE
+ get_defined_functions — 返回所有已定义函数的数组
+ register_shutdown_function — 注册一个会在php中止时执行的函数
+ register_tick_function — Register a function for execution on each tick
+ unregister_tick_function — De-register a function for execution on each tick

## 其他
+ connection_aborted — 检查客户端是否已经断开
+ connection_status — 返回连接的状态位
+ constant — 返回一个常量的值
+ define — 定义一个常量
+ defined — 检查某个名称的常量是否存在
+ die — 等同于 exit
+ eval — 把字符串作为PHP代码执行
+ exit — 输出一个消息并且退出当前脚本
+ get_browser — 获取浏览器具有的功能
+ \_\_halt_compiler — 中断编译器的执行
+ highlight_file — 语法高亮一个文件
+ highlight_string — 字符串的语法高亮
+ hrtime — Get the system's high resolution time
+ ignore_user_abort — 设置客户端断开连接时是否中断脚本的执行
+ pack — 将数据打包成二进制字符串
+ php_check_syntax — 检查PHP的语法（并执行）指定的文件
+ php_strip_whitespace — 返回删除注释和空格后的PHP源码
+ sapi_windows_cp_conv — Convert string from one codepage to another
+ sapi_windows_cp_get — Get process codepage
+ sapi_windows_cp_is_utf8 — Indicates whether the codepage is UTF-8 compatible
+ sapi_windows_cp_set — Set process codepage
+ sapi_windows_vt100_support — Get or set VT100 support for the specified stream associated to an output buffer of a Windows console.
+ show_source — 别名 highlight_file
+ sleep — 延缓执行
+ sys_getloadavg — 获取系统的负载（load average）
+ time_nanosleep — 延缓执行若干秒和纳秒
+ time_sleep_until — 使脚本睡眠到指定的时间为止。
+ uniqid — 生成一个唯一ID
+ unpack — Unpack data from binary string
+ usleep — 以指定的微秒数延迟执行