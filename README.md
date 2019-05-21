## 本课程来源于慕课
-----------
[课程地址](https://www.imooc.com/learn/604 "课程地址")
[demo演示](http://www.dengxitong.com/PhoneAttribution/ "demo演示")

-----------

## 课程目录
    * 1-1需求分析和项目准备
    * 1-2开发环境以及工具
    * 2-1项目框架结构搭建
    * 2-2自动加载类功能实现
    * 2-3信息查询流程解析
    * 3-1校验手机码合法性
    * 3-2API请求数据
    * 3-3格式化数据
    * 3-4缓存数据到数据库
    * 3-5渲染数据到模板--JS基础类的实现
    * 3-6渲染数据到模板--数据渲染
 ## 课程笔记
 

原课程采用的是redis作为数据存储，本项目改用mysql实现，其中mysql安置在购置的腾讯云服务器上，对于其中的Dbconfig类，使用的是另外一个课程中封装好的类，后续可以自行编写设计完善。

        
 #####  课程中调用的函数总结

*  str_replace：：对于给定字符串中的部分字符串进行替换
```
str_replace(find,replace,string,count)
```
| 参数 | 描述 |
| --- | --- |
| find | 必要。规定要在string中查找的值 |
| replace | 必要。将查找到的值替换为replace中的值 |
| string | 必要。原字符串 |
| count | 非必要。对替换的字符串进行计数 |
*  json_encode：对变量进行 JSON 编码
   [点击查看](https://php.net/manual/zh/function.json-encode.php)
*  substr：返回字符串的一部分
```
substr(string,start,length)
```
| 参数 | 描述 |
| --- | --- |
| string | 必要。原字符串 |
| start | 必要。起始位置 |
| length | 非必要。返回的长度，默认是到字符串结束 |
*  preg_match：执行一个正则表达式的匹配
   [点击查看](https://www.runoob.com/php/php-preg_match.html)
*  preg_match_all
```
preg_match() 第一次匹配成功后就会停止匹配，如果要实现全部匹配，则需使用 preg_match_all() 函数,返回整个模式匹配的次数（可能为零）
```
*  array_combine:创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
```
array_combine ( array $keys , array $values ) : array
返回一个 array，用来自 keys 数组的值作为键名，来自 values 数组的值作为相应的值。
```
*  strtoupper:把所有字符转换为大写
```
相关函数：
lcfirst() - 把字符串中的首字符转换为小写
strtolower() - 把字符串转换为小写
ucfirst() - 把字符串中的首字符转换为大写
ucwords() - 把字符串中每个单词的首字符转换为大写
```
*  strrpos：strrpos(string,find,start)查找字符串在另一字符串中最后一次出现的位置
```
相关函数：
stripos() - 查找字符串在另一字符串中第一次出现的位置（不区分大小写）
strpos() - 查找字符串在另一字符串中第一次出现的位置（区分大小写）
strripos() - 查找字符串在另一字符串中最后一次出现的位置（不区分大小写）
```
*  iconv：iconv ( string $in_charset , string $out_charset , string $str ) : string
```
执行对字符串的字符集转换 ，str从in_charset 转换到out_charset。
```
*  http_build_query：拼接生成URL参数字符串
   [点击查看](http://www.hangge.com/blog/cache/detail_1367.html)
*  file_get_contents
```
把整个文件读入一个字符串中
例如file_get_contents("test.txt")
得到的是一个包含了test.txt中所有内容的字符串
```



    
