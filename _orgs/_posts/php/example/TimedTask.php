<?php
/**
 * 介绍
 * PHP定时执行的三种方式实现
 * 1、windows 的计划任务
 * 2、linux的脚本程序
 * 3、定时刷新Web浏览器

## 下面重点概述如果通过定时刷新Web浏览器实现定时执行任务
: //首先解决以下几个问题：
: 1、PHP脚本执行时间限制，默认的是30m 解决办法：set_time_limit()；或者修改PHP.ini 设置max_execution_time时间（不推荐）
: 2、如果客户端浏览器关闭，程序可能就被迫终止，解决办法：ignore_user_abort即使关闭页面依然正常执行
: 3、如果程序一直执行很有可能会消耗大量的资源，解决办法使用sleep使用程序休眠一会，然后在执行

: 特别说明：由于定时刷新浏览器的方式效率不是很高，建议直接使用脚本方式。
 */
class TimedTask
{
	private $_interval;
	/**
	 * 构造函数
	 */
	public function __construct(){
		//关掉浏览器，PHP脚本也可以继续执行.
		ignore_user_abort();
		// 通过set_time_limit(0)可以让程序无限制的执行下去
		set_time_limit(3000);
		$this->_interval = 5;
	}
	/**
	 * 方法一：死循环
	 */
	public function runByDieWhile(){
		do{
			echo '测试'.time().'<br/>';
			// 等待5s
			sleep($interval);
		}while(true);
	}
	/**
	 * 方法二：sleep
	 * @return [type] [description]
	 */
	public function runSleepTimed(){
		$startTime = $this->getMicrotime();
		for($i=0;$i<=10;$i++){
			echo '测试'.time().'<br/>';
			// 等待5s
			sleep($interval);
		}
		ob_flush();
		flush();
		$endTime = $curl->getmicrotime();
		echo '<br>';
		//输出程序执行时间
		echo round(($endTime-$startTime),4);
	}
	/**
	 * 获取时间戳（微秒级别）
	 * @return [type] [description]
	 */
	private function getMicrotime(){
		list($usec, $sec) = explode(" ", microtime());
    	return ((float)$usec + (float)$sec);
	}
}
