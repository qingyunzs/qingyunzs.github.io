# 关于站点主题：NexT
> 精于心，简于形

NexT 是由 [Hexo NexT](https://github.com/iissnan/hexo-theme-next) 移植而来的 Jekyll 主题。<!--commit: f951075d9b739d26b42472431995fa68d08796aa-->

<a href="http://simpleyyt.github.io/jekyll-theme-next/" target="_blank">在线预览 Preview</a> | <a href="http://simpleyyt.com" target="_blank">Yitao's Blog</a> | <a href="http://theme-next.simpleyyt.com" target="_blank">NexT 使用文档</a> |  [English Documentation](README.en.md)

[![Join the chat at https://gitter.im/simpleyyt/jekyll-theme-next](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/jekyll-theme-next/lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

![NexT Schemes](http://iissnan.com/nexus/next/next-schemes.jpg)

## 浏览器支持 Browser support

![Browser support](http://iissnan.com/nexus/next/browser-support.png)

## 贡献 Contributing

欢迎提交问题与需求，修复代码。

## 开发 Development

NexT 主旨在于简洁优雅且易于使用，所以首先要尽量确保 NexT 的简洁易用性。

NexT is built for easily use with elegant appearance. First things first, always keep things simple.

# 本站点目录介绍
## 目录树
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
## 目录详细介绍
|文件 / 目录|描述|
|-----------|------|
|_config.yml|保存配置数据。|
|_drafts|（草稿）是未发布的文章。|
|_includes|包含部分到你的布局或者文章中以方便重用。可以用这个标签  {% include file.ext %} 来把文件 _includes/file.ext 包含进来。|
|_layouts|layouts（布局）是包裹在文章外部的模板。布局可以在 YAML 头信息中根据不同文章进行选择。标签  {{ content }} 可以将content插入页面中。|
|_posts|这里放的就是你的文章了。文件格式很重要，必须要符合: YEAR-MONTH-DAY-title.MARKUP。|
|_data|格式化好的网站数据应放在这里。jekyll 的引擎会自动加载在该目录下所有的 yaml 文件（后缀是 .yml, .yaml, .json 或者 .csv ）。这些文件可以经由 ｀site.data｀ 访问。如果有一个 members.yml 文件在该目录下，你就可以通过 site.data.members 获取该文件的内容。|
|_site|一旦 Jekyll 完成转换，就会将生成的页面放在这里（默认）。最好将这个目录放进你的 .gitignore 文件中。|
|index.html and other HTML, Markdown, Textile files|如果这些文件中包含 YAML 头信息 部分，Jekyll 就会自动将它们进行转换。当然，其他的如 .html, .markdown, .md, 或者 .textile 等在你的站点根目录下或者不是以上提到的目录中的文件也会被转换。|
|Other Files/Folders|其他一些未被提及的目录和文件如  css 还有 images 文件夹， favicon.ico 等文件都将被完全拷贝到生成的 site 中。|
