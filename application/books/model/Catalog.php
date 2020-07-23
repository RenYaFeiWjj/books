<?php
/**
 * Created by PhpStorm.
 * User: end
 * Date: 2018/5/17
 * Time: 14:21
 */

namespace app\books\model;


use think\Model;
use think\Db;
use think\Request;
use QL\QueryList;
use think\loader;
use think\Cache;

class Catalog extends Model
{

    /*根据书籍id查出书籍目录带分页*/
    public function getBooksCatalog($books_id)
    {
        $result = Db::table("books_chapter")->where("books_id", $books_id)->paginate(102);
        return $result;
    }

    /*根据书籍id查出书籍目录*/
    public function getBooksCatalogAll($books_id)
    {
        $result = Db::table("books_chapter")->where("books_id", $books_id)->select();
        return $result;
    }

    /*根据章节id查出书籍内容地址*/
    public function getBooksCatalogUrl($chapter_id)
    {
        $result = Db::table("books_chapter")->where("chapter_id", $chapter_id)->find();
        return $result;
    }

    /*根据书id查询书籍信息*/
    public function getBook($books_id)
    {
        $result = Db::table('books_cou')->where('books_id', "$books_id")->find();
        return $result;
    }

    /**
     * @param $host
     * 根据地址查出相应采集规则
     */
    public function getRule($host)
    {
        $result = Db::table('books_rule')->field('chapter_name,chapter_url,info_title,info_content')->alias('r')->join('books_rule_info i', 'i.rule_id=r.rule_id')->where('rule_url', 'like', "%{$host}%")->cache(60)->find();
        return $result;
    }

    /**
     * @param $books_id 小说id
     * @return array
     * 取得章节的公共方法
     */
    public function getCatalog($books_id)
    {
        $match = cache($books_id . '_catalog');
        print_r($match);exit;
//        $match = '';
        if (empty($match)) {

            $books = $this->getBook($books_id);
            $curl = model("Curl");

            if(strpos($books['books_url'], 'm.37zw.net') !== false || strpos($books['books_url'], 'm.biquge5200.cc') !== false){
                $url = $this->search($books['books_name'], $curl);
                if ($url) {
                    $books['books_url'] = $url[0]['books_url'];
                }
            }
            $res = $curl->getUrlData($books['books_url']);
            $href = parse_url($books['books_url']);
            $rule = $this->getRule($href["host"]);
            /*取得小说地址*/
            $chapter_all = array(
                'text' => array($rule['chapter_name'], 'text'),
                'href' => array($rule['chapter_url'], 'href'),
            );
            //第三方类库
            Loader::import('QueryList', EXTEND_PATH);
            //匹配出所有章节
            $match = query($res, $chapter_all);

            if ($match) {
                foreach ($match as $key => &$val) {
                    if (!strstr($val['href'], 'www')) {
                        $val['href'] = correct_url($books['books_url'], $val['href']);
                    }
                    //使用该函数对结果进行转码
                    $val['text'] = mb_convert_encoding($val['text'], 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
                    $val['href'] = str_replace(array("\r\n", "\r", "\n"), "", $val['href']);
                    $val['href'] = base64_encode($val['href']); //加密
                }

                //先去重一遍，
                $list = array();
                $match = array_reverse($match);
                foreach ($match as $mk => $mv) {
                    $list[$mv['href']] = $mv['text'];
                }
                $carr = array();
                $i = 0;
                foreach ($list as $lk => $lv) {
                    $carr[$i]['text'] = $lv;
                    $carr[$i]['href'] = $lk;
                    $i++;
                }
                $carr = array_reverse($carr);

                //再次去重一遍
                $match = array_unique_fb($carr);
                cache($books_id . '_catalog', $match, 3600);
            }

        }
        return $match;
    }

    public function search($text, $curl)
    {
        $key = urlencode($text);
        $url = 'https://www.biquge5200.cc/modules/article/search.php?searchkey=' . $key;

        //引入curl方法
        $html = $curl->getDataHttps($url);
        if (!$html) {
            return false;
        }

        //取得地址
        $content = array(
            'books_name' => array('.odd>a:eq(0)', 'text'),
            'books_url' => array('.odd>a:eq(0)', 'href'),
        );


        //匹配出信息
        $info = query($html, $content);
        return $info;
    }


}