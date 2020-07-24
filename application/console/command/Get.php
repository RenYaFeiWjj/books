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

use AlibabaCloud\SDK\OSS\OSS\GetBucketWebsiteResponse\websiteConfiguration\routingRules\routingRule\condition;
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
        ini_set('memory_limit', '1024M');
        //设置永不超时
        set_time_limit(0);
        $this->start_time = $this->getCurrentTime();
        echo '------开始咯' . PHP_EOL;
        echo "process-start-time:" . date("Ymd H:i:s") . PHP_EOL;
//
//        echo "采集m.37zw.net" . PHP_EOL;
//        $this->ready($this->config['m.37zw.net']);
//        echo "采集m.biquge5200.cc" . PHP_EOL;
//        $this->ready($this->config['m.biquge5200.cc']);
//        echo "采集起点" . PHP_EOL;
//        $this->getCaiji($output); //采集笔趣pc端
//        echo "更新biquge5200作者" . PHP_EOL;
//        $this->updateMData($output, 14, 'm.biquge5200.cc'); //更新作者和更新时间
//        echo "更新37zw作者" . PHP_EOL;
//        $this->updateMData($output, 14, 'm.37zw.net'); //更新作者和更新时间
//        echo '------结束咯' . PHP_EOL;
        $this->updateChapters();
//        $output->writeln("更新成功" . $this->update_count);
//        $output->writeln("用时" . $this->end_time - $this->start_time);


    }


    public function ready($config)
    {
        for ($i = 0; $i < 15; $i++) {
            if (isset($config['menu'][$i])) {
                echo '------开始' . $config['menu'][$i]['url'] . PHP_EOL;
                $process = new \swoole_process(function (\swoole_process $worker) use ($i, $config) {
                    $this->process($i, $config, $config['menu'][$i]['url']);
                });
                $pid = $process->start();
                echo $config['menu'][$i]['url'] . '------第' . $i . '页个子进程创建完毕' . PHP_EOL;
            }
        }
//        $this->process(2, $config, $config['menu'][2]['url']);
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
                    echo '----插入小说信息' . PHP_EOL;
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
        Cache::set('zhang', 0, 3600);
        echo "process-start-time:" . date("Ymd H:i:s") . PHP_EOL;
        $this->updateChapter(1);

//        $p = Cache::get('p');
//        echo $p . '||' . PHP_EOL;
//        Cache::set('p', '', 3600);
//        for ($i = 0; $i < 10; $i++) {
//            echo '------开始' . $i . PHP_EOL;
//            $process = new \swoole_process(function (\swoole_process $worker) use ($i) {
//                $this->updateChapter($i);
//            });
//            $pid = $process->start();
////            \swoole_process::wait();
//            echo '------第' . $i . '页个子进程创建完毕' . PHP_EOL;
//        }
    }


    /**
     * 更新最新章节和更新时间，连载状态
     */
    public function updateChapter($k)
    {
//        $data = Db::table('books_cou')->alias('c')->join('books_chapter a', 'a.books_id = c.books_id', 'left')
//            ->where(['c.books_status' => 0])
//            ->where(['a.chapter_name' => ''])
//            ->limit($k * 500, 500)
//            ->select();
        $arr = [7794,3970,7562,7795,8153,6742,7565,7026,6743,6744,5512,8154,5517,7998,7308,7566,4000,8160,6748,7031,7567,7999,8000,5518,4270,8006,5520,6750,8164,4276,6756,7039,8169,4284,8170,6371,7573,5522,7575,5530,6757,6372,7043,7578,4295,5531,4316,8171,7047,7313,7581,7804,6380,8172,4350,6387,8174,6759,6396,7317,6762,7319,6397,4355,6763,4366,7809,8013,7055,8178,7810,4372,4399,7811,8180,5533,7056,8183,8016,7331,4431,7332,8019,7583,7816,6402,4450,8184,8020,5568,8186,6409,5574,7587,7333,7817,6413,7057,4452,8187,7062,4453,7819,5580,7820,5595,4454,5611,4455,7589,7339,7064,8188,8025,4456,7065,8189,6416,7591,4457,7342,7069,7824,6421,8191,8194,6422,7592,6423,6764,4472,4474,4500,6770,5645,7072,6428,8029,4836,7594,6771,4837,6435,5651,7596,4841,6773,7083,6436,7085,5656,7599,7087,5662,8204,5674,4850,8030,8210,7092,8211,6440,7600,8031,4858,8212,5714,8032,8215,7093,6782,6470,8216,7830,6784,7346,7106,4863,8217,5736,7108,7604,4898,7113,7608,4899,6471,6785,7610,6475,4917,7115,8040,6504,6786,8220,7349,7117,4929,5747,7118,7612,8042,7119,8221,7351,7120,8222,7613,5784,7121,8224,7352,7124,8044,8225,6525,7353,6787,8046,8226,5786,8227,7354,8229,5016,8047,7842,7132,7355,8230,5021,7844,5818,8052,7356,5830,6540,5031,8053,7845,7136,5837,7623,8233,8054,7357,5037,5842,7364,8056,5049,7849,5050,6796,6542,8235,8057,6544,8236,5079,7625,7852,8237,7366,8061,6546,8063,8238,7853,5098,8064,6549,8065,7374,8239,8240,5102,5844,6550,7376,8244,5106,7628,7854,6552,7139,7631,8069,7855,6557,5120,7856,7377,7632,7378,5123,7635,7141,5147,6809,5148,7858,7642,8070,6558,7142,7380,7643,7144,6811,7859,7145,7645,8248,5156,7649,7861,6814,5159,7862,6559,5930,8249,8071,7650,7863,8072,6565,5174,7387,8075,7864,7158,5177,8077,6570,7654,6816,8252,7865,7160,8078,6571,5940,7870,8082,5178,8253,7875,7396,7655,7876,7664,7397,7167,8085,6823,7399,7665,6572,5197,8254,6573,7877,6574,8255,7400,7169,7879,5970,6576,5972,8088,7881,5981,5198,7172,6577,7882,6829,7403,7668,6579,8256,7406,6830,8090,5983,5207,7670,8257,6580,5216,7887,6583,5255,6044,6584,6831,6049,8258,7178,7672,6832,7888,7408,7677,7183,7678,5270,6837,8093,7679,7890,6053,7188,7409,7892,5272,6590,7681,6054,5273,7686,8260,6840,7687,7896,8094,6594,5279,8097,6845,8101,5323,7719,8102,6065,6596,6597,8262,8103,7417,6598,6072,8264,7198,6848,6600,7898,7199,8105,7204,7422,7209,6086,6114,8265,7904,7425,8106,5331,7906,7211,6604,6121,7909,5342,6605,8269,7427,7721,8271,7214,6849,7722,8274,6123,7216,7723,6854,8277,7428,6607,6144,6855,5376,7912,6612,5377,8278,6614,7724,7916,7725,7220,6615,6856,6165,8111,7726,6857,6618,8113,6859,7920,6170,5395,7434,6185,7227,6630,6631,7229,7230,5397,7437,7727,6202,6637,5399,7440,7728,8116,6860,6641,8284,6204,7442,7921,8120,6645,7923,8122,7445,8123,7924,6205,6212,7447,6238,8125,7927,5416,7233,6868,7448,6240,8289,7241,7930,8127,7449,5423,7931,6876,7933,6249,5425,7936,6651,5432,7939,7451,6654,7455,7940,6893,8128,6658,6896,8291,8129,7242,8292,8133,6263,7243,5434,6265,7459,5435,7460,6661,6899,7461,6905,7731,6663,6291,8138,6666,7736,7945,7738,6672,6299,7466,5440,7739,6676,6300,6906,7468,8294,7947,6680,6306,6912,7740,6917,6681,6307,7743,6684,8298,7253,6920,6924,6314,6927,6315,8299,7746,7469,7254,7747,6928,8303,8140,8141,7470,6322,8142,6934,6689,7756,7471,7260,7957,6951,7261,8146,6957,8147,7960,7480,7272,6959,8148,8304,7961,7276,8150,8307,7483,6695,7757,8151,6339,7962,6967,8308,7758,7484,6349,7964,7762,6360,7966,7281,7284,7766,7485,8310,6968,7770,6728,8311,7289,7488,6969,6732,7491,7499,7297,7500,6982,7300,7301,7505,7782,7983,7785,7516,7522,7524,7526,7790,7540,7006];
        $data = Db::table('books_cou')->alias('c')->join('books_chapter a', 'a.books_id = c.books_id', 'left')
            ->where(['a.chapter_name' => ''])
//            ->where(['c.books_status' => 0])
            ->where('c.books_id' ,'in',$arr)
//            ->where('c.books_url', 'not like', '%m.37zw.n%')
            ->field('c.*')
//            ->limit($k * 100, 100)
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
                    $p = Cache::get('p');
                    $p = explode(',',$p);
                    $p[] = $v['books_id'];
                    $p = implode(',',$p);
                    Cache::set('p', $p, 3600);
                    continue;
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
