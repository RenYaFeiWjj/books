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

use app\admin\model\Curl;
use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\Db;
use think\Loader;


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
        $url = [
            [
                'title' => '三七中文网玄幻',
                'url' => 'https://m.37zw.net/sort/1_'
            ],
            [
                'title' => '三七中文网修真',
                'url' => 'https://m.37zw.net/sort/2_'
            ],
            [
                'title' => '三七中文网都市',
                'url' => 'https://m.37zw.net/sort/3_'
            ],
            [
                'title' => '三七中文网穿越',
                'url' => 'https://m.37zw.net/sort/4_'
            ],
            [
                'title' => '三七中文网网游',
                'url' => 'https://m.37zw.net/sort/5_'
            ],
            [
                'title' => '三七中文网科幻',
                'url' => 'https://m.37zw.net/sort/6_'
            ],
        ];
        $count = count($url);//为了方便演示，此处用1000意思一下
        for ($i = 0; $i < $count; $i++) {
            $this->creatProcess($i, $url[$i]['url'] , $output);
        }
        echo "process-end-time:" . date("Ymd H:i:s");
        // 定时器需要执行的内容
        $output->writeln("TestCommand:");

        $output->writeln("end....");
    }

    /**
     * @param $url
     * @param Output $output
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 三七中文网  笔趣手机网
     */
    public function caijidata1($urls)
    {


        for ($i = 1; $i < 300; $i++) {
            $url = $urls . $i . '/';
            echo "开始采集第" . $i . '页数据'.PHP_EOL;
//            $output->writeln("开始采集第" . $i . '页数据');
            $curl = new Curl();
            $html = $curl->getDataHttps($url);

            //第三方类库
            Loader::import('QueryList', EXTEND_PATH);
            //取得更新时间
            $content = array(
                'text' => array('.line>a:nth-child(2)', 'text'),
                'href' => array('.line>a:nth-child(2)', 'href'),
            );
//            $output->writeln($url);
            //匹配出信息
            $data = query($html, $content);
            if (!$data) {
                echo '没有数据了'.PHP_EOL;
//                $output->writeln("没有数据了");
                break;
            }
//            print_r($data);
//            $output->writeln("匹配到" . count($data) . '条');
            if ($data) {
                foreach ($data as $v) {
                    $has = Db::table('books_cou')->where('books_name', $v['text'])->find();
                    if (!$has) {
                        $href = parse_url($url);
                        $newUrl = 'https://' . $href['host'] . $v['href'];
                        echo "准备" . $v['text'] .PHP_EOL;
//                        $output->writeln("准备" . $v['text']);
//                        $this->Warehousing($newUrl, $v['text'], 14, $output);
                    } else {
                        echo $v['text'] . '已存在'.PHP_EOL;
//                        $output->writeln($v['text'] . '已存在');
                    }
                }
            }
        }
    }



    public function creatProcess($i, $url , $output)
    {
//    每次过来统计一下进程数量
        $cmd = "ps -ef |grep test1 |grep -v grep |wc -l";
        $pCount = system($cmd);//进程数量
        if ($pCount < 200) {
            //    创建子进程
            $process = new \swoole_process(function (\swoole_process $worker) use ($i, $url) {
                $content = $this->caijidata1($url);//方法里面处理你的逻辑

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
        file_put_contents("baidu.txt", "tttttttttttttttt" . $content, FILE_APPEND);
    }


}
