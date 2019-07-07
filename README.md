> 本站点所用的 NexT 是由 [Hexo NexT](https://github.com/iissnan/hexo-theme-next) 移植而来的 Jekyll 主题，并结合 org-mode 进行构建。<!--commit: f951075d9b739d26b42472431995fa68d08796aa-->

<a href="http://simpleyyt.github.io/jekyll-theme-next/" target="_blank">在线预览 Preview</a> | <a href="http://simpleyyt.com" target="_blank">Yitao's Blog</a> | <a href="http://theme-next.simpleyyt.com" target="_blank">NexT 使用文档</a> |  [English Documentation](README.en.md)

## 贡献 Contributing

欢迎提交问题与需求，修复代码。

## 开发 Development
- Jekyll
- org-mode
- PlantUML
- Latex

## 目录结构
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

## 内容规范
### 命名
1. 分类命名：英文名称全部小写，如algorithms,c#,javascript等。两个单词以上组成，采用-字符连接。分类名称不能重名。
2. 标签命名：与实际常见命名一致，如MySQL,PHP,Jekyll等。另外一些两个单词以上组成的术语，建议采用-字符连接，如Design-Pattern。
3. org 源文件命名：日期+文件描述名称，文件描述名称采用-字符连接，如2018-12-12-vue-iview.org。
4. org 发布目录命名：采用驼峰法命名。

### 内容规范
1. 目录编号：文章内容最多支持 3 级目录，对于 3 级以上内容使用有序列表或无序列表表示。
2. 标点符号：严格遵守中英文标点符号命名规则及行文规范。
3. 中英文混用情况：
 + 英文符号就近使用原则，也就是说包含英文则使用英文符号。
 + 中英文混用时，英文单词两端使用空格隔开。

## Org 编写
参考如下： 
> [The Org Manual](http://orgmode.org/manual/index.html)
> [GNU Emacs](https://zhaorengui.github.io/software/2016/06/06/using-emacs/)

注意：在通过 PlantUML 组件画图时，目前的解决办法只能是：先指定生成图片的地址，执行生成操作，然后改为站点访问地址，最后执行发布。具体操作如下：
1. 先指定特定生成图片地址
#+BEING_SRC plantuml :file ../../_assets/example.png 
Alice -> Bob: Authentication Request
Bob --> Alice: Authentication Response

Alice -> Bob: Another authentication Request
Alice <-- Bob: Another authentication Response
#+END_SRC
2. 执行生成操作
> https://github.com/skuro/plantuml-mode
3. 改写为访问地址
#+BEGIN_SRC plantuml :file {{site.url}}/assets/images/example.png
Alice -> Bob: Authentication Request
Bob --> Alice: Authentication Response

Alice -> Bob: Another authentication Request
Alice <-- Bob: Another authentication Response
#+END_SRC
4. 执行发布操作
## 安装NexT
1. 确保已安装`Ruby 2.1.0` 或更高版本：
 $ ruby --version
2. 安装 Bundler 和 jekyll：
 $ sudo gem install bundler
 安装jeyll之前，先安装ruby-dev
 $ sudo apt install ruby-dev
 $ sudo gem install jekyll
3. $ git clone https://github.com/zhaorengui/zhaorengui.github.io.git
 $ cd zhaorengui.github.io
4. 安装依赖项：
 $ bundle install
5. $ bundle exec jekyll server
6. 使用浏览器访问 http://localhost:4000，检查站点是否正确运行。具体可参考 http://theme-next.simpleyyt.com/ 

## 工作流
1. 搭建jekyll环境
> 参考：https://zhaorengui.github.io/jekyll/2018/08/05/next-tutorial/
> 或者参考：http://theme-next.simpleyyt.com/
2. 构建emacs+org+jekyll写作环境
	- 下载文件：https://github.com/zhaorengui/dotfile/blob/master/dot.emacs.d/lisp/init-org-jekyll.el
	- 修改init-org-jekyll.el其中的参数为你自己的
	- 放到~/.emacs.d/lisp/目录下
	- 配置emacs加载init-org-jekyll
	- 打开emacs，M-x jekyll-draft-post RET，检查是否正常提示输入文章标题，正常说明配置加载成功。
3. 文章写作流
	- 打开emacs，M-x jekyll-draft-post，按提示输入标题，Emacs便会在 _org/_drafts中新建该文件，在_org/_drafts中编辑的文件不会被发布；
	- 当文章写好后，M-x jekyll-publish-post，Emacs便会将文章转移至_org/_posts中；
	- M-x org-publish，选择jekyll-zhaorengui-github-io（取决于你配置中改的名字），Emacs会将_org/_posts中的所有org文件转换成html文件并存于_posts中，并把 _org/_assest中图片等静态资源全部复制至站点根目录下的_assest目录中。
