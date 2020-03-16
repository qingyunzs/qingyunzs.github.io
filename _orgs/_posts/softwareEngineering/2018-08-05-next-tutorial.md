---
title: Customize my own theme tutorial with Next Theme
author: zrg
description: "NexT is a high quality elegant Jekyll theme ported from Hexo Next. It is crafted from scratch, with love."
date: 2018-08-05
categories:
- jekyll
tags:
- jekyll
- NexT
---

## Preface
NexT theme from [Hexo NexT](https://github.com/iissnan/hexo-theme-next), and this site build  with org-mode. The following are some references:
+ [Jekyll Official Site](https://jekyllrb.com/)
+ [NexT theme](http://theme-next.simpleyyt.com/)
+ [Live Preview](http://simpleyyt.github.io/jekyll-theme-next/)
+ [Yitao's Blog](http://simpleyyt.com/)
+ [NexT 使用文档 ](http://theme-next.simpleyyt.com/)
+ [Setting up your GitHub Pages site locally with Jekyll](https://help.github.com/articles/setting-up-your-github-pages-site-locally-with-jekyll/)
## Installation
1. Check whether you have `Ruby 2.1.0` or higher installed:
	```sh
	$ ruby --version
	```
2. Install `Bundler` and `Jekyll`:
	```sh
	$ gem install bundler jekyll
	```
3. Clone:
	```sh
	$ git clone https://github.com/zhaorengui/zhaorengui.github.io.git
	$ cd jekyll-theme-next
	```
4. Install dependencies packages:
	```sh
	$ bundle install
	```
5. Running your Jekyll site locally:
	```sh
	$ bundle exec jekyll server
	```
	Access http://localhost:4000 on browser.
## Diretory Structure
~~~
├─_data		数据目录
│  ├─languages	语言目录
├─_drafts	(预发布)草稿目录
├─_include	固定文件模板引用目录
├─_orgs		org文件目录
│  ├─_assets	资源目录，img,js,css,...
│  ├─_drafts	org草稿目录
│  ├─_posts	org发布目录
├─_posts	文章目录，皆是html文件
├─_sass		scss文件目录
├─_site		站点访问目录
├─about		关于目录
├─archives	归档目录
├─assets	资源目录
├─categories	分类目录
├─tag		标签目录
├─tags		标签目录
├─404.html	404页面
├─Gemfile	jekyll文件	
├─Gemfile.lock	jekyll文件
├─README.en.md	英文说明文件
├─README.md	说明文件
├─_config.yml	配置文件
├─index.html	入口文件
└─search.xml	搜索配置文件
~~~
## Name
1. 分类命名：英文名称全部小写，如algorithms，c#，javascript等。两个单词以上组成，采用-字符连接。分类名称不能重名。
2. 标签命名：与实际常见命名一致，如MySQL，PHP，Jekyll等。另外一些两个单词以上组成的术语，建议采用-字符连接，如Design-Pattern。
3. org 源文件命名：日期+文件描述名称，文件描述名称采用-字符连接，如2018-12-12-vue-iview.org。
4. org 发布目录命名：采用驼峰法命名。
## .org

## Screenshots

## Browser support
![Browser support](http://iissnan.com/nexus/next/browser-support.png)
## Contributing
Welcome you submit issues.
