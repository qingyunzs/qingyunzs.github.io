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
> addcslashes — 以 C 语言风格使用反斜线转义字符串中的字符
> addslashes()，字符串转义，使用反斜线引用字符串。如I'm Zhao中的'。
> bin2hex — 函数把包含数据的二进制字符串转换为十六进制值
> chop — rtrim 的别名
> chr — 返回指定的字符
> chunk_split — 将字符串分割成小块
> convert_cyr_string — 将字符由一种 Cyrillic 字符转换成另一种
> convert_uudecode — 解码一个 uuencode 编码的字符串
> convert_uuencode — 使用 uuencode 编码一个字符串
> count_chars — 返回字符串所用字符的信息
> crc32 — 计算一个字符串的 crc32 多项式
> crypt — 单向字符串散列
> echo — 输出一个或多个字符串
> fprintf — 将格式化后的字符串写入到流
> get_html_translation_table — 返回使用 htmlspecialchars 和 htmlentities 后的转换表
> hebrev — 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew）
> hebrevc — 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew），并且转换换行符
> hex2bin — 转换十六进制字符串为二进制字符串
> html_entity_decode — Convert HTML entities to their corresponding characters
> htmlentities — 将字符转换为 HTML 转义字符
> htmlspecialchars_decode — 将特殊的 HTML 实体转换回普通字符
> htmlspecialchars — 将特殊字符转换为 HTML 实体
~~~
htmlentities 和 htmlspecialchars 的区别:
	这两个函数的功能都是转换字符为 HTML 字符编码，特别是 url 和代码字符串。htmlentities 转换所有的 html 标记；htmlspecialchars 只格式化& ' " < 和 \> 这几个特殊符号。 
~~~
> lcfirst — 使一个字符串的第一个字符小写
> levenshtein — 计算两个字符串之间的编辑距离
> localeconv — Get numeric formatting information
> ltrim — 删除字符串开头的空白字符（或其他字符）
> md5_file — 计算指定文件的 MD5 散列值
> md5 — 计算字符串的 MD5 散列值
> metaphone — Calculate the metaphone key of a string
> money_format — 将数字格式化成货币字符串
> nl_langinfo — Query language and locale information
> nl2br — 在字符串所有新行之前插入 HTML 换行标记
> number_format — 以千位分隔符方式格式化一个数字
```php
// 无论值是否为0，都保留小数点后两位
echo number_format((float)round($a,2,PHP_ROUND_HALF_ODD),2,'.','');
// 整数部分以千位分隔符方式分隔
echo number_format((float)round($a,2,PHP_ROUND_HALF_ODD),2,'.',',');
```
> ord — 转换字符串第一个字节为 0-255 之间的值
> parse_str — 将字符串解析成多个变量
> print — 输出字符串
> printf — 输出格式化字符串
> quoted_printable_decode — 将 quoted-printable 字符串转换为 8-bit 字符串
> quoted_printable_encode — 将 8-bit 字符串转换成 quoted-printable 字符串
> quotemeta — 转义元字符集
> rtrim — 删除字符串末端的空白字符（或者其他字符）
> setlocale — 设置地区信息
> sha1_file — 计算文件的 sha1 散列值
> sha1 — 计算字符串的 sha1 散列值
> similar_text — 计算两个字符串的相似度
> soundex — Calculate the soundex key of a string
> sprintf — Return a formatted string
> sscanf — 根据指定格式解析输入的字符
> str_getcsv — 解析 CSV 字符串为一个数组
> str_ireplace — str_replace 的忽略大小写版本
> str_pad — 使用另一个字符串填充字符串为指定长度
> str_repeat — 重复一个字符串
> str_rot13 — 对字符串执行 ROT13 转换
> str_shuffle — 随机打乱一个字符串
> str_split — 将字符串转换为数组
> str_word_count — 返回字符串中单词的使用情况
> strcasecmp — 二进制安全比较字符串（不区分大小写）
> strcmp — 二进制安全字符串比较
> strcoll — 基于区域设置的字符串比较
> strcspn — 获取不匹配遮罩的起始子字符串的长度
> strip_tags — 从字符串中去除 HTML 和 PHP 标记
> stripcslashes — 反引用一个使用 addcslashes 转义的字符串
> strpos()，查找字符串首次出现的位置。strpos ( string $haystack , mixed $needle [, int $offset = 0 ] ) : int，如果没找到 needle，将返回 FALSE，此函数可能返回布尔值 FALSE，但也可能返回等同于 FALSE 的非布尔值。应使用 === 运算符来测试此函数的返回值。缺点：对中文支持不好
```php
// 判断是否包含某字符串
$pos = strpos($str,$needle);
if($pos !== false){
	echo 'exist';
}
```
> stripslashes — 反引用一个引用字符串
> strlen()，获取字符串长度。 
> strnatcasecmp — 使用“自然顺序”算法比较字符串（不区分大小写）
> strnatcmp — 使用自然排序算法比较字符串
> strncasecmp — 二进制安全比较字符串开头的若干个字符（不区分大小写）
> strncmp — 二进制安全比较字符串开头的若干个字符
> strpbrk — 在字符串中查找一组字符的任何一个字符
> substr()，字符串截取。substr(字符串变量,开始截取的位置，截取个数） 。如：
```php
// 去除字符串后3位
substr($tempStr,0,strlen($tempStr)-3); 
```
> mb_substr() ，字符串截取。mb_substr(字符串变量,开始截取的位置，截取个数, 网页编码） 
```php
// 截取某个字符之后的字符串
substr($str,strpos($str,"_");
```
> strstr()，返回字符串从查找字符串出现的位置开始到字符串结尾的字符串。
```php
// 判断是否包含某字符串，没有返回值，则不包含
echo strstr($str,'@');
```
> stristr()，与 strstr() 的使用方法一样，区别是 stristr 不区分大小写。
> strchr — strstr 的别名 
> strrchr — 查找指定字符在字符串中的最后一次出现
> strrev — 反转字符串
> strripos — 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
> strspn — 计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。
> strspn — 计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。
> strstr — 查找字符串的首次出现
> strtok — 标记分割字符串
> strtolower — 将字符串转化为小写
> strtoupper — 将字符串转化为大写
> strtr — 转换指定字符
> substr_compare — 二进制安全比较字符串（从偏移位置比较指定长度）
> substr_count — 计算字串出现的次数
> str_replace()，搜索替换字符串。substr_replace ( mixed $string , mixed $replacement , mixed $start [, mixed $length ] ) : mixed 
> trim — 去除字符串首尾处的空白字符（或者其他字符）
> ucfirst — 将字符串的首字母转换为大写
> ucwords — 将字符串中每个单词的首字母转换为大写
> vfprintf — 将格式化字符串写入流
> vprintf — 输出格式化字符串
> vsprintf — 返回格式化字符串
> wordwrap — 打断字符串为指定数量的字串
> preg_replace()，搜索匹配替换字符串。Eg：搜索匹配到，,\n\r\s的使用|替换：preg_replace('/[,，\s\r\n]+/', '|', $ids); 
> sprintf()，格式化字符串。sprintf(格式,要转化的字符串)，Eg：Sprintf('%01.2f',$str); 
> Implode()，字符串的合并（array->string）。
> explode()，字符串的分割（string->array）。
> join — implode() 的别名
```php
// 判断是否包含某字符串
$tempArr = explode(',',$str);
if(count($tempArr) > 1){
	return true;
}
```

> htmlentities/htmlspecialchars/addslashes/stripslashes/strip_tags、mysql_real_escape_strin。
> json_decode()，对 JSON 格式的字符串进行解码。 
> json_encode()，对变量进行 JSON 编码 。 
> strtolower()，把所有字符转换为小写 
> strtoupper(), 把所有字符转换为大写 
> strncmp() ， 二进制安全比较字符串开头的若干个字符（区分大小写） 

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
```php
echo bcmul('1.34747474747', '35', 3); // 47.161
```
> bcpow — 任意精度数字的乘方 
> bcpowmod — Raise an arbitrary precision number to another, reduced by a specified modulus 
> bcscale — 设置所有bc数学函数的默认小数点保留位数 
> bcsqrt — 任意精度数字的二次方根 
```php
echo bcsub($a, $b, 4);  // -3.7660 
```
> intval(), 直接取整
> round(), 四舍五入
> ceil()，向上取整。 
> floor(), 向下取整
```php
// intval()
echo intval(3.14); // 3
// round()
// 格式：round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] ) : float
echo round(3.145,2); // 3.15
echo round(3.142,2); // 3.14
// ceil()
// 格式：ceil ( float $value ) : float
echo ceil(3.14); // 4
// floor()
echo floor(3.14); // 3
```

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
> unlink()
## 魔术方法
> __call() ，在一个对象的上下文中，如果调用的方法不能访问，它将被触发。 
> __callStatic() ，在一个静态的上下文中，如果调 用的方法不能访问，它将被触发。 
