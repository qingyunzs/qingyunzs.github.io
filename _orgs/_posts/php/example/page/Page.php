<?php
class Page {
	private $total;          //总记录数
	private $size;           //一页显示的记录数
	private $page;           //当前页
	private $page_count;     //总页数
	private $i;              //起头页数
	private $en;             //结尾页数
	private $url;            //获取当前的url
	/*
	 * $show_pages
	 * 页面显示的格式，显示链接的页数为2*$show_pages+1。
	 * 如$show_pages=2那么页面上显示就是[首页] [上页] 1 2 3 4 5 [下页] [尾页]
	 */
	private $show_pages;

	public function __construct($total = 1, $size = 1, $page = 1, $url, $show_pages = 2) {
		$this->total = $this->numeric($total);
		$this->size = $this->numeric($size);
		$this->page = $this->numeric($page);
		$this->page_count = ceil($this->total / $this->size);
		$this->url = $url;
		if ($this->total < 0)
			$this->total = 0;
		if ($this->page < 1)
			$this->page = 1;
		if ($this->page_count < 1)
			$this->page_count = 1;
		if ($this->page > $this->page_count)
			$this->page = $this->page_count;
		$this->limit = ($this->page - 1) * $this->size;
		$this->i = $this->page - $show_pages;
		$this->en = $this->page + $show_pages;
		if ($this->i < 1) {
			$this->en = $this->en + (1 - $this->i);
			$this->i = 1;
		}
		if ($this->en > $this->page_count) {
			$this->i = $this->i - ($this->en - $this->page_count);
			$this->en = $this->page_count;
		}
		if ($this->i < 1)
			$this->i = 1;
	}

	//检测是否为数字
	private function numeric($num) {
		if (strlen($num)) {
			if (!preg_match("/^[0-9]+$/", $num)) {
				$num = 1;
			} else {
				$num = substr($num, 0, 11);
			}
		} else {
			$num = 1;
		}
		return $num;
	}

	//地址替换
	private function page_replace($page) {
		return str_replace("{page}", $page, $this->url);
	}

	//首页
	private function home() {
		if ($this->page != 1) {
			return "<a href='" . $this->page_replace(1) . "' title='首页'>首页</a>";
		} else {
			return "<p>首页</p>";
		}
	}

	//上一页
	private function prev() {
		if ($this->page != 1) {
			return "<a href='" . $this->page_replace($this->page - 1) . "' title='上一页'>上一页</a>";
		} else {
			return "<p>上一页</p>";
		}
	}

	//下一页
	private function next() {
		if ($this->page != $this->page_count) {
			return "<a href='" . $this->page_replace($this->page + 1) . "' title='下一页'>下一页</a>";
		} else {
			return"<p>下一页</p>";
		}
	}

	//尾页
	private function last() {
		if ($this->page != $this->page_count) {
			return "<a href='" . $this->page_replace($this->page_count) . "' title='尾页'>尾页</a>";
		} else {
			return "<p>尾页</p>";
		}
	}

	//输出
	public function write($id = 'page') {
		$str = "<div id=" . $id . ">";
		$str.=$this->home();
		$str.=$this->prev();
		if ($this->i > 1) {
			$str.="<p class='pageEllipsis'>...</p>";
		}
		for ($i = $this->i; $i <= $this->en; $i++) {
			if ($i == $this->page) {
				$str.="<a href='" . $this->page_replace($i) . "' title='第" . $i . "页' class='cur'>$i</a>";
			} else {
				$str.="<a href='" . $this->page_replace($i) . "' title='第" . $i . "页'>$i</a>";
			}
		}
		if ($this->en < $this->page_count) {
			$str.="<p class='pageEllipsis'>...</p>";
		}
		$str.=$this->next();
		$str.=$this->last();
		$str.="<p class='pageRemark'>共<b>" . $this->page_count ."</b>页<b>" . $this->total . "</b>条数据</p>";
		$str.="</div>";
		return $str;
	}

}
