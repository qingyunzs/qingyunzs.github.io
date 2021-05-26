#!/bin/zsh
route="$1" # 路由组名称
kill_number="$2"    # 要杀死的消费者队列数量（可选），不传表示杀死全部

routes=(user store system)

# Check routes exists
if [ ! -n "$route" ]; then
  echo "错误：接收两个参数，参数1：路由组名称，参数2（可选）：要杀死的消费者队列数量"
  exit
fi

# Check correctness of route category
if [[ ! "${routes[@]}" =~ "$route" ]]; then
  echo "错误：非法的路由组名称"
  exit
fi

# ps　-efw 查看所有进程的命令
# grep -w Consumer.php\ $route 强制 PATTERN 仅完全匹配字词
# grep -v grep 在列出的进程中去除含有关键字“grep”的进程
# cut -c 9-15 截取输入行的第9个字符到第15个字符，而这正好是进程号PID
# head -n $kill_number 指定列出要kill的PID
# xargs kill -9 xargs命令是用来把前面命令的输出结果（PID）作为“kill -9”命令的参数，并执行该命令
echo "----------------------------------"
ps -efw | grep -w Consumer.php\ $route | grep -v grep | cut -c 9-15 | xargs kill -9
all_kill_number=$(ps -efw | grep -w Consumer.php\ $route | grep -v grep | cut -c 9-15 | wc -l)
echo "已Kill $all_kill_number 个 $route 消费者队列，所有 $route 消费队列全部Kill完成"
echo "----------------------------------"
