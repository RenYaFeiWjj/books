<?php
/**
 * tpAdmin [a web admin based ThinkPHP5]
 *
 * @author    yuan1994 <tianpian0805@gmail.com>
 * @link      http://tpadmin.yuan1994.com/
 * @copyright 2016 yuan1994 all rights reserved.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 */

namespace app\console\command;

use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\Db;


class Test1 extends Command
{
    protected function configure()
    {
        $this->setName('test1')
            ->setDescription('定时计划测试：每分钟插入一条数据');
    }

    protected function execute(Input $input, Output $output)
    {
        // 输出到日志文件
        $output->writeln("TestCommand:");

        echo "process-start-time:" . date("Ymd H:i:s") . PHP_EOL;
        $baseUrl = "http://www.baidu.com/";//自定义网页
        $count = 1000;//为了方便演示，此处用1000意思一下
        for ($i = 0; $i < $count; $i++) {
            $this->creatProcess($i, $baseUrl);
        }
        echo "process-end-time:" . date("Ymd H:i:s");
        // 定时器需要执行的内容
        $output->writeln("TestCommand:");

        $output->writeln("end....");
    }


    public function creatProcess($i, $url)
    {
//    每次过来统计一下进程数量
        $cmd = "ps -ef |grep test1 |grep -v grep |wc -l";
        $pCount = system($cmd);//进程数量
        if ($pCount < 200) {
            //    创建子进程
            $process = new \swoole_process(function (swoole_process $worker) use ($i, $url) {
                $content = $this->curlData($url);//方法里面处理你的逻辑
            });
            $pid = $process->start();
            echo $url . '------第' . $i . '个子进程创建完毕' . PHP_EOL;
        } else {
            sleep(10);//可以根据实际情况定义
            $this->creatProcess($i, $url);
        }
    }

    public function curlData($url)
    {
        sleep(20);//为了让子进程多存在一段时间，让大家看到效果
        $content = file_get_contents($url);
        file_put_contents("./sData/baidu.txt", "tttttttttttttttt" . $content, FILE_APPEND);
    }


}
