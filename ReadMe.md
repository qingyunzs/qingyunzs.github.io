1.目录结构
	_config.yml: 整个站点的配置文件，存放全局变量（如插件信息，CDN节点或者作者信息等），可通过 liquid 语言的site.XXX 访问。
	_layouts: 存放页面布局模板
	_posts: 存放用 markdown 写就的博文
	_org: 存放利用 org-mode 写就的文章，利用 emacs 生成md文件发布至 _posts 目录，稍后会详细介绍。
	_includes: 存放页面插件，所谓插件，就是某段可重用的HTML或JS代码（如主题模板，评论界面等），利用{% include **/** %} 可嵌入页面中
	_assets: 存放图片，主题CSS，JS等静态资源
	_plugins: 存放Jekyll插件，一般为Ruby脚本程序
	_index.html: 博客网站主页
	_site: 运行 jekyll build 生成的全部静态页面，最终产物
