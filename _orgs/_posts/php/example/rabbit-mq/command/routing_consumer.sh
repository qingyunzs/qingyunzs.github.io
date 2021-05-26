#!/usr/bin/env bash
route="$1" # 路由组名称

routes=(user store system)

# Check correctness of route category
if [[ ! "${routes[@]}" =~ "$route" ]]; then
  echo "错误：非法的路由组名"
  exit
fi


# Start execute cumstomer command
echo "即将启用消费者队列......"
nohup php ~/code/rabbit-mq/Consumer.php "$route" &

# Get queue
total_number=`ps -ef |grep Consumer.php\ $route | wc -l`
let total_number=total_number-1

echo "----------------------------------"
echo "完成 $route 消费者队列启用"
echo "当前 $route 消息队列总计启用数量：$total_number"
echo "----------------------------------"
