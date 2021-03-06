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


use QL\QueryList;
use think\Cache;
use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\Db;
use think\Loader;
use app\admin\model\Curl;
use think\model;

/**
 * Class Get
 * @package app\console\command
 * 每日采集小说数据
 * 每日更新时间和最新章节
 * 每日查看图片丢失数据
 */
class Get extends Command
{

    public $config = [
        'www.qidian.com' => [
            'menu' => [
                [
                    'title' => '原创风云榜',
                    'url' => 'https://www.qidian.com/rank/yuepiao?style=1&chn=-1&page='
                ],
                [
                    'title' => '原创月票榜',
                    'url' => 'https://www.qidian.com/rank/yuepiao?style=1&chn=-1&page='
                ],

                [
                    'title' => '推荐票榜	',
                    'url' => 'https://www.qidian.com/rank/recom?style=1&page='
                ],
                [
                    'title' => 'VIP收藏榜',
                    'url' => 'https://www.qidian.com/rank/vipcollect?style=1&page='
                ],
                [
                    'title' => 'VIP精品打赏榜',
                    'url' => 'https://www.qidian.com/rank/vipreward?style=1&page='
                ],
                [
                    'title' => '完本榜',
                    'url' => 'https://www.qidian.com/rank/fin?style=1&page='
                ]
            ],
        ],
        'm.37zw.net' => [
            'menu' => [
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
                ]
            ],
            'search_rule' => [
                'text' => ['.line>a:nth-child(2)', 'text'],
                'href' => ['.line>a:nth-child(2)', 'href'],
            ],
            'match_rule' => [
                'name' => ['h1', 'text'],
                'type' => ['.block_txt2>p:eq(2)>a', 'text'],
                'author' => ['.block_txt2>p:eq(1)', 'text'],
                'time' => ['.block_txt2>p:eq(4)', 'text'],
                'synopsis' => ['.intro_info', 'text'],
                'img' => ['.block_img2>img', 'src'],
                'status' => ['.block_txt2>p:eq(3)', 'text'],
                'chapter_name' => ['.block_txt2>p:eq(5) a', 'text'],
                'chapter_href' => ['.block_txt2>p:eq(5) a', 'href'],
            ],
            'chapter_rule' => [
                'text' => ['.chapter>li>a', 'text'],
                'herf' => ['.chapter>li>a', 'href'],
            ]
        ],
        'm.biquge5200.cc' => [
            'menu' => [
                [
                    'title' => '笔趣手机网玄幻',
                    'url' => 'https://m.biquge5200.cc/sort-1-'
                ],
                [
                    'title' => '笔趣手机网仙侠',
                    'url' => 'https://m.biquge5200.cc/sort-2-'
                ],
                [
                    'title' => '笔趣手机网都市',
                    'url' => 'https://m.biquge5200.cc/sort-3-'
                ],
                [
                    'title' => '笔趣手机网历史',
                    'url' => 'https://m.biquge5200.cc/sort-4-'
                ],
                [
                    'title' => '笔趣手机网游戏',
                    'url' => 'https://m.biquge5200.cc/sort-5-'
                ],
                [
                    'title' => '笔趣手机网科幻',
                    'url' => 'https://m.biquge5200.cc/sort-6-'
                ],
                [
                    'title' => '笔趣手机网言情',
                    'url' => 'https://m.biquge5200.cc/sort-7-'
                ],
                [
                    'title' => '笔趣手机网同人',
                    'url' => 'https://m.biquge5200.cc/sort-8-'
                ],
                [
                    'title' => '笔趣手机网灵异',
                    'url' => 'https://m.biquge5200.cc/sort-9-'
                ],
                [
                    'title' => '笔趣手机网奇幻',
                    'url' => 'https://m.biquge5200.cc/sort-10-'
                ],
                [
                    'title' => '笔趣手机网竞技',
                    'url' => 'https://m.biquge5200.cc/sort-11-'
                ],
                [
                    'title' => '笔趣手机网武侠',
                    'url' => 'https://m.biquge5200.cc/sort-12-'
                ],
                [
                    'title' => '笔趣手机网军事',
                    'url' => 'https://m.biquge5200.cc/sort-13-'
                ],
                [
                    'title' => '笔趣手机网校园',
                    'url' => 'https://m.biquge5200.cc/sort-14-'
                ],
                [
                    'title' => '笔趣手机网官场',
                    'url' => 'https://m.biquge5200.cc/sort-15-'
                ],
            ],
            'search_rule' => [
                'text' => ['.line>a:nth-child(2)', 'text'],
                'href' => ['.line>a:nth-child(2)', 'href'],
            ],
            'match_rule' => [
                'name' => ['h1', 'text'],
                'type' => ['.block_txt2>p:eq(2)>a', 'text'],
                'author' => ['.block_txt2>p:eq(1)', 'text'],
                'time' => ['.block_txt2>p:eq(4)', 'text'],
                'synopsis' => ['.intro_info', 'text'],
                'img' => ['.block_img2>img', 'src'],
                'status' => ['.block_txt2>p:eq(3)', 'text'],
                'chapter_name' => ['.block_txt2>p:eq(5) a', 'text'],
                'chapter_href' => ['.block_txt2>p:eq(5) a', 'href'],
            ],
            'chapter_rule' => [
                'text' => ['.chapter>li>a', 'text'],
                'herf' => ['.chapter>li>a', 'href'],
            ]
        ]
    ];


    public $start_time = 0;
    public $end_time = 0;
    public $count = 0;
    public $update_count = 0;

    protected function configure()
    {
        $this->setName('get')
            ->setDescription('采集小说');
    }

    protected function execute(Input $input, Output $output)
    {
        file_get_contents('https://sc.ftqq.com/SCU140275T29b6baf71872e8ea31dc4740966935ac5fe99b3421da9.send?text='.urlencode('小说爬取开始脚本~'));

        Cache::clear('num');
        ini_set('memory_limit', '1024M');
        //设置永不超时
        set_time_limit(0);
        \think\Loader::import('QueryList', EXTEND_PATH);
        $this->start_time = $this->getCurrentTime();
        echo '------开始咯' . PHP_EOL;
        echo "process-start-time:" . date("Ymd H:i:s") . PHP_EOL;
////
//        echo "采集m.37zw.net" . PHP_EOL;
//        $this->ready($this->config['m.37zw.net']);
        echo "采集m.biquge5200.cc" . PHP_EOL;
        $this->ready($this->config['m.biquge5200.cc']);
//        echo "采集m.37zw.net" . PHP_EOL;
//        $this->ready($this->config['m.37zw.net']);
        echo "采集起点" . PHP_EOL;
        $this->getCaiji($output); //采集笔趣pc端
        echo "更新biquge5200作者" . PHP_EOL;
        $this->updateMData($output, 17, 'm.biquge5200.cc'); //更新作者和更新时间
//        echo "更新37zw作者" . PHP_EOL;
//        $this->updateMData($output, 14, 'm.37zw.net'); //更新作者和更新时间
        echo '------结束咯' . PHP_EOL;
        $this->updateChapters();
//        $this->updateChapterid();
//        $output->writeln("更新成功" . $this->update_count);
//        $output->writeln("用时" . $this->end_time - $this->start_time);


    }


    public function ready($config)
    {
        for ($i = 0; $i < count($config['menu']); $i++) {
            if (isset($config['menu'][$i])) {
                echo '------开始' . $config['menu'][$i]['url'] . PHP_EOL;
                $process = new \swoole_process(function (\swoole_process $worker) use ($i, $config) {
                    $this->process($config['menu'][$i]['title'], $config, $config['menu'][$i]['url']);
                });
                $pid = $process->start();
                echo $config['menu'][$i]['url'] . '------第' . $i . '页个子进程创建完毕' . PHP_EOL;
            }
        }
    }

    public function process($k, $config, $url)
    {
        for ($i = 1; $i < 300; $i++) {
            echo $k . "------开始第" . $i . "页" . PHP_EOL;
            $this->search($k, $config, $url . $i . '/');
        }
    }


    public function search($k, $config, $url)
    {

        $curl = new Curl();
        $html = $curl->getDataHttps($url);
        //第三方类库
        Loader::import('QueryList', EXTEND_PATH);
        //取得更新时间
        $content = $config['search_rule'];

        echo $k . '------匹配出信息' . PHP_EOL;
        //匹配出信息
        $data = query($html, $content);
        if (!$data) {
            echo $k . '------没有数据了' . PHP_EOL;
            return false;
        }

        echo $k . "------匹配到" . count($data) . '条' . PHP_EOL;

        if ($data) {
            foreach ($data as $v) {
                $has = Db::table('books_cou')->where('books_name', $v['text'])->find();
                if (!$has) {
                    echo $k . "------准备" . $v['text'] . PHP_EOL;
                    $href = parse_url($url);
                    $newUrl = 'https://' . $href['host'] . $v['href'];
                    echo $newUrl . PHP_EOL;
                    $this->Warehousings($newUrl, $v['text'], $config);
                } else {
                    echo $k . "------" . $v['text'] . '已存在' . PHP_EOL;
                }
            }
        }
    }

    /**
     * 匹配小说后入库
     */
    public function Warehousings($href, $name, $config)
    {
        //引入curl方法
        $curl = new Curl();
        $all = $curl->getDataHttps($href);
        //第三方类库
        Loader::import('QueryList', EXTEND_PATH);
        //取得小说信息
        $content = $config['match_rule'];
        //匹配出信息
        $info = query($all, $content);
        if (!empty($info[0]) && isset($info[0]['author'])) {
            $author = str_replace('作者：', '', $info[0]['author']);
            $time = str_replace('更新：', '', $info[0]['time']);
            $books_status = strpos($info[0]['status'], '连载') ? 0 : 1;
            $has = Db::table('books_cou')->where('books_name', $name)->find();
            if (empty($has)) {
//使用该函数对结果进行转码
                $synopsis = mb_convert_encoding($info[0]['synopsis'], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                $url = $info[0]['img'];
                $types = mb_convert_encoding($info[0]['type'], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                $types = substr($types, 0, 6);
                if ($types == '修真') {
                    $types = '仙侠';
                } elseif ($types == '言情') {
                    $types = '都市';
                }
                $type_id = Db::table('books_type')->where('type_name', 'like', "%{$types}%")->value('type_id');
                $type_id = !empty($type_id) ? $type_id : '14';

//下载小说封面
                $path = ROOT_PATH . 'public/static/images/books_img/';
                $imgName = $curl->downloadImg($url, $path);
                $result = ['books_name' => $name, 'books_author' => $author, 'books_synopsis' => $synopsis, 'books_time' => $time, 'books_img' => $imgName, 'books_type' => $type_id, 'books_status' => $books_status, 'books_url' => $href];

                $books_id = Db::table('books_cou')->insertGetId($result);
//最新章
                $end_chapter = [];
                if (isset($info[0]['chapter_name']) && $info[0]['chapter_name']) {
                    $chapter_href = correct_url($href, $info[0]['chapter_href']);
                    $end_chapter = ['text' => $info[0]['chapter_name'], 'href' => $chapter_href];
                } else {
                    $chapter_all = $config['chapter_rule'];
//匹配出所有章节
                    $match = query($all, $chapter_all);
                    if ($match) {
//去除前面重复的几个最新章节
                        $match = array_unique_fb($match);
                        $chapter = [];//218 美女
                        foreach ($match as $key => $val) {
//使用该函数对结果进行转码
                            $chapter[$key]['text'] = mb_convert_encoding($val[0], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                            $chapter[$key]['href'] = correct_url($href, $val[1]);
                        }

                        $end_chapter = $chapter ? $chapter[0] : [];
                    }
                }

                if ($end_chapter) {
                    $chapter_data = ['books_id' => $books_id, 'chapter_name' => $end_chapter['text'], 'chapter_url' => $end_chapter['href']];

                    Db::table('books_chapter')->insert($chapter_data);
                    $num = Cache::get('num');
                    Cache::set('num', $num + 1);
                    echo '----插入小说信息' . PHP_EOL;
                    echo '----共插入小说' . $num + 1 . PHP_EOL;
                }

                $this->count += 1;
            }
        }
    }


    public function getCaiji(Output $output)
    {
        $data = [
            [
                'title' => '原创风云榜',
                'url' => 'https://www.qidian.com/rank/yuepiao?style=1&chn=-1&page='
            ],
            [
                'title' => '原创月票榜',
                'url' => 'https://www.qidian.com/rank/yuepiao?style=1&chn=-1&page='
            ],

            [
                'title' => '推荐票榜	',
                'url' => 'https://www.qidian.com/rank/recom?style=1&page='
            ],
            [
                'title' => 'VIP收藏榜',
                'url' => 'https://www.qidian.com/rank/vipcollect?style=1&page='
            ],
            [
                'title' => 'VIP精品打赏榜',
                'url' => 'https://www.qidian.com/rank/vipreward?style=1&page='
            ],
            [
                'title' => '完本榜',
                'url' => 'https://www.qidian.com/rank/fin?style=1&page='
            ],

        ];

        foreach ($data as $v) {
            $this->gather($v, $output);
        }
// 输出到日志文件
        $output->writeln("TestCommand:");
// 定时器需要执行的内容
        $output->writeln("TestCommand:");

        $output->writeln("end....");
    }


    /**
     * 采集小说具体方法
     */
    public function gather($data, Output $output)
    {
        $obj_url = $data['url'];
        $title = $data['title'];
        if (empty($obj_url)) {
            $output->writeln("采集链接为空");
        }
        $output->writeln(date('Y-m-d H:i:s'));
        for ($i = 1; $i < 26; $i++) {
            $output->writeln("开始采集'.$title.'第" . $i . '页数据');
            $url = $obj_url . $i;
            $curl = new Curl();
            $html = $curl->getDataHttps($url);

            //第三方类库
            Loader::import('QueryList', EXTEND_PATH);
            //取得更新时间
            $content = array(
                'text' => array('.book-img-text>>h4', 'text'),
            );
            $data = [];
            //匹配出信息
            $data = QueryList::Query($html, $content)->getData();;

            $output->writeln("匹配到结果" . count($data) . '条');
            foreach ($data as $val) {

                $has = Db::table('books_cou')->where('books_name', $val['text'])->find();
                if (empty($has)) {

                    $key = urlencode($val['text']);
                    $url = 'https://www.23txt.com/search.php?keyword=' . $key;

                    //引入curl方法
                    $html = $curl->getDataHttps($url);
                    if (empty($html)) {
                        continue;
                    }

                    //取得地址
                    $content = array(
                        'books_name' => array('.result-game-item-detail>h3>a>span', 'text'),
                        'books_url' => array('.result-game-item-detail>h3>a', 'href'),
                    );


                    //匹配出信息
                    $info = QueryList::Query($html, $content)->data;
                    $output->writeln("匹配到信息" . count($info) . '条');
                    foreach ($info as $tal) {
                        if ($tal['books_name'] == $val['text']) {
                            $this->Warehousing($tal['books_url'], $tal['books_name'], 2, $output);
                        } else {
                            continue;
                        }
                    }
                }
            }

        }

        $output->writeln("采集完成");
    }

    /**
     * @param Output $output
     * @param $rule_id
     * @param $url
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     * 更新三七中文网和 笔趣手机网 作者和更新时间
     */
    function updateMData(Output $output, $rule_id, $url)
    {
//        m.biquge5200.cc
//        m.37zw.net
        $data = Db::table('books_cou')->where('books_url', 'like', "%{$url}%")->where(['books_author' => ''])->select();
        $output->writeln("共有数据" . count($data) . '需更新');
        foreach ($data as $v) {
            $output->writeln('查询' . $v['books_name'] . "数据");
            //引入curl方法
            $curl = new Curl();
            $all = $curl->getDataHttps($v['books_url']);

            //规则匹配方法
            $rule = Db::table('books_rule_info')->where('rule_id', $rule_id)->find();
            //第三方类库
            Loader::import('QueryList', EXTEND_PATH);
            //取得小说信息
            $content = array(
                'author' => array($rule['books_author'], 'text'),
                'authors' => array($rule['books_author'] . '>a', 'text'),
                'time' => array($rule['books_time'], 'text'),
                'books_status' => array('.block_txt2>p:eq(3)', 'text'),
            );
            //匹配出信息
            $info = query($all, $content);

            if (!$info) {
                continue;
            }
            $info[0]['author'] = str_replace('作者：', '', $info[0]['author']);
            $info[0]['author'] = $info[0]['author'] ? $info[0]['author'] : $info[0]['authors'];
            $info[0]['time'] = str_replace('更新：', '', $info[0]['time']);
            $info[0]['books_status'] = strpos($info[0]['books_status'], '连载') ? 0 : 1;
            $res = Db::table('books_cou')->where(['books_id' => $v['books_id']])->update([
                'books_author' => $info[0]['author'],
                'books_time' => $info[0]['time'],
                'books_status' => $info[0]['books_status'],
            ]);
            if ($res) {
                $this->update_count += 1;
                $output->writeln($v['books_name'] . "更新成功");
            } else {
                $output->writeln($v['books_name'] . "更新失败");
            }

        }

        $output->writeln($url . "更新成功" . $this->update_count);
        $this->update_count = 0;

    }

    /**
     * 匹配小说后入库
     */
    public function Warehousing($href, $name, $rule_id = 2, $output)
    {

        //引入curl方法
        $curl = new Curl();
        $all = $curl->getDataHttps($href);

        //规则匹配方法
        $rule = Db::table('books_rule_info')->where('rule_id', $rule_id)->find();
        //第三方类库
        Loader::import('QueryList', EXTEND_PATH);
        //取得小说信息
        $content = array(
            'name' => array($rule['books_name'], 'text'),
            'type' => array($rule['books_type'], 'text'),
            'author' => array($rule['books_author'], 'text'),
            'time' => array($rule['books_time'], 'text'),
            'synopsis' => array($rule['books_synopsis'], 'text'),
            'img' => array($rule['books_img'], 'src'),
        );
        //匹配出信息
        $info = QueryList::Query($all, $content)->data;
        if (!empty($info[0]) && isset($info[0]['author'])) {
            $has = Db::table('books_cou')->where('books_name', $name)->find();

            if (empty($has)) {
                //使用该函数对结果进行转码
                $author = mb_convert_encoding($info[0]['author'], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                $author = substr($author, 33);

                $synopsis = mb_convert_encoding($info[0]['synopsis'], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');


                $time = mb_convert_encoding($info[0]['time'], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                $time = substr($time, 15);

                $url = $info[0]['img'];

                $types = mb_convert_encoding($info[0]['type'], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                $types = substr($types, 0, 6);
                if ($types == '修真') {
                    $types = '仙侠';
                } elseif ($types == '言情') {
                    $types = '都市';
                }

                $type_id = Db::table('books_type')->where('type_name', 'like', "%{$types}%")->value('type_id');
                $type_id = !empty($type_id) ? $type_id : '14';


                //下载小说封面
                $path = ROOT_PATH . 'public/static/images/books_img/';
                $imgName = $curl->downloadImg($url, $path);

                $result = ['books_name' => $name, 'books_author' => $author, 'books_synopsis' => $synopsis, 'books_time' => $time, 'books_img' => $imgName, 'books_type' => $type_id, 'books_status' => '0', 'books_url' => $href];

                $books_id = Db::table('books_cou')->insertGetId($result);
                $chapter_all = array(
                    'text' => array($rule['chapter_name'], 'text'),
                    'href' => array($rule['chapter_url'], 'href'),
                );
                //匹配出所有章节
                $match = QueryList::Query($all, $chapter_all)->data;

                //去除前面重复的几个最新章节
                $match = array_unique_fb($match);


                foreach ($match as $key => $val) {

                    //使用该函数对结果进行转码
                    $chapter[$key]['text'] = mb_convert_encoding($val[0], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                    $chapter[$key]['href'] = correct_url($href, $val[1]);

                }

                $end_chapter = end($chapter);

                $chapter_data = ['books_id' => $books_id, 'chapter_name' => $end_chapter['text'], 'chapter_url' => $end_chapter['href']];

                Db::table('books_chapter')->insert($chapter_data);
                $output->writeln("插入小说信息");
                $this->count += 1;
            }
        }
    }


    public function updateChapters()
    {
        echo "process-start-time:" . date("Ymd H:i:s") . PHP_EOL;
        $baseUrl = "http://www.baidu.com/";//自定义网页
        $count = 100;//为了方便演示，此处用1000意思一下
        for ($i = 0; $i < $count; $i++) {
            $this->creatProcess($i, $baseUrl);
        }

        echo "process-end-time:" . date("Ymd H:i:s");
    }


    public function creatProcess($i, $url)
    {
//    每次过来统计一下进程数量
        $cmd = "ps -ef |grep get |grep -v grep |wc -l";
        $pCount = system($cmd);//进程数量
        if ($pCount < 20) {
            //    创建子进程
            $process = new \swoole_process(function (\swoole_process $worker) use ($i, $url) {
                //  $content = $this->curlData($url);//方法里面处理你的逻辑
                $this->updateChapter($i);
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
        echo '$url' . PHP_EOL;
    }


    /**
     * 更新最新章节和更新时间，连载状态
     */
    public function updateChapter($k)
    {
//        $books_ids = Db::table('books_chapter')->column('books_id');
        $data = Db::table('books_cou')->alias('c')
            ->join('books_chapter a', 'a.books_id = c.books_id', 'left')
//            ->where(['a.chapter_name' => ''])
            ->where(['c.books_status' => 0])
//            ->where('c.books_id','not in',$books_ids)
//            ->where('c.books_id' ,'in',$arr)
            ->field('c.*')
            ->limit($k * 100, 100)
            ->select();
        if (!$data) {
            echo $k . '------第' . $k . '个没有数据' . PHP_EOL;
            return false;
        }
        foreach ($data as $v) {
            sleep(10);
            echo $k . '-----' . $v['books_id'] . PHP_EOL;
            echo $k . '-----' . $v['books_name'] . PHP_EOL;
            echo $k . '-----' . $v['books_url'] . PHP_EOL;
            $books_url = parse_url($v['books_url']);
            //print_r($books_url);
            $curl = new Curl();
            $ress = $curl->getDataHttps($v['books_url']);
            if (!$ress) {
                echo '获取页面失败' . PHP_EOL;
                continue;
            }
            $host = $books_url['host'];
            $has = Db::table('books_rule_info')->alias('i')->field('i.*')->join('books_rule r', 'r.rule_id=i.rule_id')->where('r.rule_url', 'like', "%{$host}%")->find();
            if ($has) {
                $content = array(
                    'text' => [$has['chapter_name'], 'text'],
                    'herf' => [$has['chapter_url'], 'href'],
                );
                //print_r($content);
                echo $k . '-----开始匹配最新章节' . PHP_EOL;
                $match = [];
                $match = query($ress, $content);
                // print_r($match);
                if (!$match) {
                    echo $k . 'ERROR' . $v['books_id'] . '-----没有匹配到最新章节' . PHP_EOL;
                    $content = [
                        'text' => ['.block_txt2>p:eq(5) a', 'text'],
                        'herf' => ['.block_txt2>p:eq(5) a', 'href'],
                    ];
                    $match = query($ress, $content);
                    if (!$match) {
                        echo $k . 'ERROR二次' . $v['books_id'] . '-----没有匹配到最新章节' . PHP_EOL;

                        print_r($ress);
                        $p = Cache::get('p');
                        $p = explode(',', $p);
                        $p[] = $v['books_id'];
                        $p = implode(',', $p);
                        Cache::set('p', $p, 60 * 60 * 24);
                        //echo 'exit--------' . PHP_EOL;
                        //exit;
                        continue;
                    } else {
                        echo $k . 'YES二次' . $v['books_id'] . '-----匹配到最新章节' . PHP_EOL;
                    }
                } else {
                    echo $k . 'YES' . $v['books_id'] . '-----已匹配到最新章节' . PHP_EOL;
                }

                //去除前面重复的几个最新章节
                $match = array_unique_fb($match);
                $chapter = [];
                if ($match) {
                    foreach ($match as $key => $val) {
                        //使用该函数对结果进行转码
                        $chapter[$key]['text'] = mb_convert_encoding($val[0], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                        $chapter[$key]['href'] = correct_url($v['books_url'], $val[1]);
                    }
                    echo $k . $v['books_id'] . '-----准备更新' . PHP_EOL;
                    $end_chapter = $has['is_zuixin'] == 2 ? $chapter[count($chapter) - 1] : $chapter[0];
                    echo $k . $v['books_id'] . '-----' . $end_chapter['text'] . PHP_EOL;
                    $c = Db::table('books_chapter')->where(['books_id' => $v['books_id']])->find();
                    if ($c) {
                        $chapter_data = ['chapter_name' => $end_chapter['text'], 'chapter_url' => $end_chapter['href']];
                        $res = Db::table('books_chapter')->where(['books_id' => $v['books_id']])->update($chapter_data);
                    } else {
                        $chapter_data = ['books_id' => $v['books_id'], 'chapter_name' => $end_chapter['text'], 'chapter_url' => $end_chapter['href']];

                        $res = Db::table('books_chapter')->insert($chapter_data);
                    }

                    if ($res) {
                        $zhang = Cache::get('zhang') ? Cache::get('zhang') : 0;
                        echo $v['books_id'] . '--更新成功' . $zhang . '个' . PHP_EOL;
                        Cache::set('zhang', $zhang + 1, 3600);
                        echo $k . $v['books_id'] . '-----最新章节更新成功' . PHP_EOL;
                    } else {
                        echo $k . 'error-----章节更新失败' . PHP_EOL;
                    }
                } else {
                    echo $k . 'error-----时间未匹配到结果' . PHP_EOL;
                }


                echo $k . '-----开始匹配更新时间' . PHP_EOL;
                //更新时间和状态
                $content = array(
                    'time' => [$has['books_time'], 'text'],
                );

                $res = query($ress, $content);
                if ($res && isset($res[0]) && $res[0]) {
                    $time = getDates($res[0]['time']);
                    //如果最后一次更新时间大于现在时间半年 状态为完结
                    $status = 0;
                    if ($time) {
                        $time = date('Y-m-d', strtotime($time));
                        if (time() - strtotime($time) > 60 * 60 * 24 * 180) {
                            echo $k . '-----状态改为完本' . PHP_EOL;
                            $status = 1;
                        }
                    }
                    $ress = Db::table('books_cou')->where(['books_id' => $v['books_id']])->update(['books_time' => $time, 'books_status' => $status]);
                    if ($ress) {
                        echo $k . '-----更新时间更新成功' . PHP_EOL;
                    } else {
                        echo $k . 'error-----时间更新失败' . PHP_EOL;
                    }
                } else {
                    echo $k . 'error-----时间未匹配到结果' . PHP_EOL;
                }
            } else {
                echo $k . 'error-----未定义匹配规则' . PHP_EOL;
            }
        }
    }

    /**
     * 更新最新章节和更新时间，连载状态
     */
    public function updateChapterid()
    {
        $ids = Cache::get('p');
        $ids = explode(',', $ids);
        if (!$ids) {
            echo '暂无没有匹到数据' . PHP_EOL;
        }
        $k = 0;
        $data = Db::table('books_cou')->alias('c')->join('books_chapter a', 'a.books_id = c.books_id', 'left')
            ->where('c.books_id', 'in', $ids)
            ->where('c.books_url', 'not like', '%m.37zw.n%')
            ->field('c.*')
            ->select();

        if (!$data) {
            echo $k . '------第' . $k . '个没有数据' . PHP_EOL;
            return false;
        }
        $p = [];
        foreach ($data as $v) {
            echo $k . '-----' . $v['books_id'] . PHP_EOL;
            echo $k . '-----' . $v['books_name'] . PHP_EOL;
            echo $k . '-----' . $v['books_url'] . PHP_EOL;
            $books_url = parse_url($v['books_url']);
            $host = $books_url['host'];
            $has = Db::table('books_rule_info')->alias('i')->field('i.*')->join('books_rule r', 'r.rule_id=i.rule_id')->where('r.rule_url', 'like', "%{$host}%")->find();
            if ($has) {
                $content = array(
                    'text' => [$has['chapter_name'], 'text'],
                    'herf' => [$has['chapter_url'], 'href'],
                );

                echo $k . '-----开始匹配最新章节' . PHP_EOL;
                $curl = new Curl();
                $datas = [];
                $datas = $curl->getDataHttps($v['books_url']);
                if (!$datas) {
                    echo $k . $v['books_id'] . '-----没有匹配到最新章节' . PHP_EOL;
                    continue;
                }
                $match = [];
                $match = query($datas, $content);
                if (!$match) {
                    echo $k . $v['books_id'] . '-----没有匹配到数据' . PHP_EOL;
                    $content = [
                        'text' => ['.block_txt2>p:eq(5) a', 'text'],
                        'herf' => ['.block_txt2>p:eq(5) a', 'href'],
                    ];
                    $match = query($datas, $content);
                    if (!$match) {
                        echo $k . $v['books_id'] . '二次-----没有匹配到数据' . PHP_EOL;
                        $p = Cache::get('p');
                        $p = explode(',', $p);
                        $p[] = $v['books_id'];
                        $p = implode(',', $p);
                        Cache::set('p', $p, 60 * 60 * 24);
                        continue;
                    }
                }
                print_r($match);
                exit;
                //去除前面重复的几个最新章节
                $match = array_unique_fb($match);
                $chapter = [];
                if ($match) {
                    foreach ($match as $key => $val) {

                        //使用该函数对结果进行转码
                        $chapter[$key]['text'] = mb_convert_encoding($val[0], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                        $chapter[$key]['href'] = correct_url($v['books_url'], $val[1]);

                    }
                    echo $k . $v['books_id'] . '-----准备更新' . PHP_EOL;
                    $end_chapter = $has['is_zuixin'] == 2 ? $chapter[count($chapter) - 1] : $chapter[0];
                    echo $k . $v['books_id'] . '-----' . $end_chapter['text'] . PHP_EOL;
                    $c = Db::table('books_chapter')->where(['books_id' => $v['books_id']])->find();
                    if ($c) {
                        $chapter_data = ['chapter_name' => $end_chapter['text'], 'chapter_url' => $end_chapter['href']];
                        $res = Db::table('books_chapter')->where(['books_id' => $v['books_id']])->update($chapter_data);
                    } else {
                        $chapter_data = ['books_id' => $v['books_id'], 'chapter_name' => $end_chapter['text'], 'chapter_url' => $end_chapter['href']];

                        $res = Db::table('books_chapter')->insert($chapter_data);
                    }

                    foreach ($ids as $k => $v) {
                        if ($v['books_id'] == $v) unset($ids[$k]);
                    }
                    $ids = array_values($ids);
                    $ids = implode(',', $ids);
                    Cache::set('p', $ids, 60 * 60 * 24);
                    if ($res) {
                        $zhang = Cache::get('zhang') ? Cache::get('zhang') : 0;
                        echo $v['books_id'] . '--更新成功' . $zhang . '个' . PHP_EOL;
                        Cache::set('zhang', $zhang + 1, 3600);
                        echo $k . $v['books_id'] . '-----最新章节更新成功' . PHP_EOL;
                    } else {
                        echo $k . 'error-----章节更新失败' . PHP_EOL;
                    }
                } else {
                    echo $k . 'error-----时间未匹配到结果' . PHP_EOL;
                }


                echo $k . '-----开始匹配更新时间' . PHP_EOL;
//更新时间和状态
                $content = array(
                    'time' => [$has['books_time'], 'text'],
                );

                $res = query($datas, $content);
                if ($res && isset($res[0]) && $res[0]) {
                    $time = getDates($res[0]['time']);
//如果最后一次更新时间大于现在时间半年 状态为完结
                    $status = 0;
                    if ($time) {
                        $time = date('Y-m-d', strtotime($time));
                        if (time() - strtotime($time) > 60 * 60 * 24 * 180) {
                            echo $k . '-----状态改为完本' . PHP_EOL;
                            $status = 1;
                        }
                    }
                    $ress = Db::table('books_cou')->where(['books_id' => $v['books_id']])->update(['books_time' => $time, 'books_status' => $status]);
                    if ($ress) {
                        echo $k . '-----更新时间更新成功' . PHP_EOL;
                    } else {
                        echo $k . 'error-----时间更新失败' . PHP_EOL;
                    }
                } else {
                    echo $k . 'error-----时间未匹配到结果' . PHP_EOL;
                }
            } else {
                echo $k . 'error-----未定义匹配规则' . PHP_EOL;
            }
        }
    }


    /**
     * Description:计算当前时间
     *
     * @return float
     */
    function getCurrentTime()
    {
        list ($msec, $sec) = explode(" ", microtime());
        return (float)$msec + (float)$sec;
    }
}
