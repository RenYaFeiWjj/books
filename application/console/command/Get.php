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
use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\Db;
use think\Loader;
use app\admin\model\Curl;
use think\model;


class Get extends Command
{
    public $config = [
        '' => [

        ]
    ];

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
        $this->caiji1($output);
        $this->caiji2($output);
        $this->getCaiji($output);
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

    public function caiji1(Output $output)
    {
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
        foreach ($url as $v) {
            $output->writeln($v['title']);
            $this->caijidata1($v['url'], $output);
            $output->writeln($v['title'] . '结束');
        }
    }

    /**
     * @param Output $output
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 笔趣手机网
     */
    public function caiji2(Output $output)
    {
        $url = [
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
        ];
        foreach ($url as $v) {
            $output->writeln($v['title']);
            $this->caijidata1($v['url'], $output);
            $output->writeln($v['title'] . '结束');
        }
    }



    /**
     * @param $url
     * @param Output $output
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 三七中文网  笔趣手机网
     */
    public function caijidata1($url, Output $output)
    {
        for ($i = 1; $i < 200; $i++) {
            $output->writeln("开始采集第" . $i . '页数据');
            $url = $url . $i;
            $curl = new Curl();
            $html = $curl->getDataHttps($url);

            //第三方类库
            Loader::import('QueryList', EXTEND_PATH);
            //取得更新时间
            $content = array(
                'text' => array('.line>a:nth-child(2)', 'text'),
                'href' => array('.line>a:nth-child(2)', 'href'),
            );
            //匹配出信息
            $data = query($html, $content);
            print_r($url);
            print_r($html);
            print_r($data);exit;
            $output->writeln("匹配到" . count($data) . '条');
            if ($data) {
                foreach ($data as $v) {
                    $has = Db::table('books_cou')->where('books_name', $v['text'])->find();
                    if (!$has) {
                        $href = parse_url($url);
                        $newUrl = 'https://' . $href['host'] . $v['href'];
                        $output->writeln("准备" . $v['text']);
                        $this->Warehousing($newUrl, $v['text'], 14, $output);
                    }
                }
            }
        }
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
        if (!empty($info[0])) {
            $info[0]['author'] = str_replace('作者：', '', $info[0]['author']);
            $info[0]['time'] = str_replace('更新：', '', $info[0]['time']);
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
            }


        }


    }

}
