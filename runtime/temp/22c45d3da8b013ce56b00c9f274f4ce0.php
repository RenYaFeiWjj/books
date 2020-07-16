<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:91:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/books\view\template\cover.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\header.html";i:1594870961;s:85:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\headerCon.html";i:1594870961;s:83:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\imglazy.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\footer.html";i:1594870961;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $module_data['title']; ?></title>
    <meta name="keywords" content="<?php echo $module_data['keywords']; ?>" />
    <meta name="description" content="<?php echo $module_data['descript']; ?>" />
    <meta name="baidu-site-verification" content="mB5gm5BccA" />

    <link rel="stylesheet" type="text/css" href="/static/css/style.css">

    <script type="text/javascript" src="/static/js/jq-c0eb42550f.1.11.min.js"></script>
    <script type="text/javascript" src="/static/js/jquery-546c1da987.lazyload.min.js"></script>
    <script type="text/javascript" src="/static/js/jquery-ui-019252536e.js"></script>
    <script>document.write("<script type='text/javascript' src='/static/js/common.js?v=" + Date.now() + "'><\/script>");</script>
    <script type="text/javascript" src="/static/js/layer/layer.js"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?fb88a436a9da0713ecb7533e23592412";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>
<body class="topline">
<div class="header-con">
    <div class="logo">
        <h1><img src="/static/images/logo.png"></h1>
    </div>
    <div class="header-logo">
        <div class="widthfix center">
            <div class="header ">
                <input type="hidden" value="<?php echo $cer; ?>" name="cer">
                <ul class="pc-nav clearfix">
                    <li class="zt"><a href="/" data-controller="Index">首页</a></li>
                    <li class="tl"><a href="<?php echo url('bibliotheca/index'); ?>" data-controller="Bibliotheca" >书库</a></li>
                    <li class="gx"><a href="<?php echo url('rankinglist/index'); ?>" data-controller="Rankinglist" >排行榜</a></li>
                    <li class="gx"><a href="<?php echo url('apotheosize/index'); ?>" data-controller="Apotheosize" >封神榜</a></li>

                    <li class="gx"><a href="<?php echo url('index/copyright'); ?>" data-controller="Copyright" >版权声明</a></li>

                    <li class="gx"><a class="daohan" href="javascript:">二次元</a></li>

                    <li class="gx"><a class="daohan" href="javascript:">作者福利</a></li>
                    <li class="zs openshelf_pc"><a href="javascript:" data-controller="Shelf" >书架</a></li>
                    <li class="zs"><a class="daohan" href="javascript:" >作者专区</a></li>
                </ul>


            </div>





            <div class="user-login-info" >
                <div id="loginCon">

                        <?php if(!empty($session_name)): ?>
                    <div class="u-lgn" id="login-not">
                        <a class="ellipse" title="" style="margin-left: 18px;"><?php echo $session_name; ?></a>
                        <ul class="nickname-list" style="display:none">
                            <li><a href="<?php echo url('user/index'); ?>"><span class="glyphicon glyphicon-user"></span>个人中心</a></li>
                            <li id="loginOut"><a href="javascript:;"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;登&nbsp;&nbsp;&nbsp;出</a></li>
                        </ul>
                    </div>
                        <?php else: ?>
                    <div class="u-lgn" id="login-link">
                        <span class="glyphicon glyphicon-user"></span>
                        <span>登录</span>
                    </div>


                    <!--登陆框-->
                    <div id="loginkuan" tabindex="-1" role="dialog"  class="ui-dialog login-dialog ui-widget ui-widget-content ui-front ui-resizable" aria-describedby="login" aria-labelledby="ui-id-1" style=" top: 141px; left: 347.5px; display: block; z-index: 101;display: none;">
                        <div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix">
                            <span id="ui-id-1" class="ui-dialog-title">&nbsp;</span><button type="button" class="ui-button ui-corner-all ui-widget ui-button-icon-only ui-dialog-titlebar-close" title="Close"><span class="ui-button-icon ui-icon ui-icon-closethick"></span><span class="ui-button-icon-space"></span>Close</button>
                        </div>
                        <div id="login" style="" class="ui-widget ui-dialog-content ui-widget-content">
                            <div id="login-vipjump-close" class="jump-close" style="cursor:pointer;">关闭</div>
                            <div class="logininput">
                                <h1 class="logo">
                                    <img src="/static/images/logo.png">
                                </h1>


                                <form action="<?php echo url('/login/login'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="loginname">
                                        <input type="text" name="username" placeholder="请输入用户名" value="">
                                    </div>
                                    <div class="loginpwd">
                                        <input type="password" name="password" placeholder="请输入密码" value="123456">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </div>


                                    <div class="logincheckPic">
                                        <input type="text" class="userCheckPic" name="userCheckPic" placeholder="请输入右侧图形校验码">
                                        <span id="checkCodePic-btn" class="checkCodePic"><?php echo captcha_img(); ?></span>
                                    </div>


                                    <div class="mrgT login-protocal">
                                        <label class="ant-checkbox-wrapper">
                                                    <span>
                                                        <span id="login-protocal-checkbox" class="ant-checkbox login_ok">
                                                        <span class="ant-checkbox-inner "></span>
                                                        <input type="checkbox" class="ant-checkbox-input login_checkbox" value="off">
                                                        </span>

                                                        <span>我已阅读、了解并接受<a id="verifyXy-dl" class="pro-color">《<?php echo $module_data['name']; ?>用户服务协议》</a>、
                                                            <a id="verifyXy-ysdl" class="pro-color">《隐私保护政策》</a></span>
                                                    </span>
                                        </label>
                                    </div>


                                    <button type="button" id="signUp" class="ant-btn ant-btn-primary ant-btn-lg ant-button-sq loginbtn disabled"  disabled="disabled">
                                        <span>登 录</span>
                                    </button>
                                </form>
                                <div class="register">
                                    <div class="remember" style="display: inline;">
                                        <label class="checkbox-re ant-checkbox-wrapper">
                                                        <span id="login-remember-checkbox" class="ant-checkbox">
                                                        <span class="ant-checkbox-inner"></span>
                                                        <input type="checkbox" class="ant-checkbox-input" value="off">
                                                        </span>
                                            <span style="font-size: 14px;">记住密码</span>
                                        </label>
                                    </div><i>|</i>
                                    <a href="<?php echo url('/login/register'); ?>">注册账号</a><i>|</i>
                                    <a href="<?php echo url('/login/forgetpassword'); ?>">忘记密码?</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="backwhite" class="ui-widget-overlay ui-front" style="z-index: 100;display: none;"></div>
                    <!--登陆框 end-->


                        <?php endif; ?>
                    </div>




                <span class="secah-box glyphicon glyphicon-search" id="search_box_btn">
                </span>
            </div>
        </div>
    </div>





    <!--搜索框-->
    <div class="secah-con">
        <div class="secahdiv">
            <input id="js_searchInput_common" type="text" class="search_input width-search" value="" maxlength="20" name="search" placeholder="搜索书名/关键字" autocomplete="off">
            <input id="js_search_common" type="button" class="query-btn" lmk="search" lmv="搜索" urltrue="true" lmurl="#">
        </div>
    </div>
    <script>
        $(function () {

            function getSearch() {
                var search = $("input[name='search']").val();
                if(search){
                    window.location.href = "/Search/index/books_name/"+search;
                }
            }
            $("#js_search_common").click(function () {
                getSearch();
            });

            //回车快捷查询
            $(".secahdiv").keypress(function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
                if (keyCode == 13){
                    getSearch();
                }
            });

            $("#signUp").click(function () {
                $.post('/login/login',$("form").serialize(),function (e) {
                    layer.msg(e.msg);
                    if(e.code==1){
                        setTimeout(function () {
                            window.location.href=e.url;
                        },2000);
                    }
                });
            });

            //退出登陆
            $("#loginOut").click(function () {
                $.post('/login/loginOut','',function (e) {
                    layer.msg(e.msg);
                    if(e.code==1){
                        setTimeout(function () {
                            window.location.href=e.url;
                        },2000);
                    }
                });
            });


            $(".daohan").click(function () {
                layer.msg('暂未开放');
            });


            var cer = $("input[name='cer']").val();
            $(".pc-nav li a").each(function(i,e){
                var now = $(this).attr('data-controller');
                if(cer == now){
                    $(this).addClass('active');
                    return false;
                }

            });

        })
    </script>

</div>

<div class="cover-page">

        <!--content-->
        <div class="cover-top">
                <div class="covertbox">
                        <div class="cover-nav">
                                <p>&gt;
                                        <a href="<?php echo url('/bibliotheca/index',['type_id'=>$data['books_type']]); ?>"><?php echo $types[$data['books_type']]; ?></a> &gt; <span> <?php echo $data['books_name']; ?></span></p>
                        </div>

                        <div class="coverfm clearfix">
                                <div class="coverimg fl">
                                        <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $data['books_img']; ?>" class="cover_img">
                                </div>
                                <div class="coverinfo" lmk="bookmeta" lmv="书籍meta信息">
                                        <h3> <?php echo $data['books_name']; ?></h3>
                                        <p class="author">作者：<span><?php echo $data['books_author']; ?></span></p>
                                        <p class="part">
                                                <span class="synopsis"><?php echo $data['books_synopsis']; ?></span>
                                                <a class="zk" href="javascript:;"></a>

                                        </p>
                                        <p class="all" style="display: none"><?php echo $data['books_synopsis']; ?><a class="sq" href="javascript:;"></a>
                                        </p>

                                        <div class="cobtnbox">
                                                <?php if(empty($history_url) || (($history_url instanceof \think\Collection || $history_url instanceof \think\Paginator ) && $history_url->isEmpty())): ?>
                                                <a class="goread"  href="<?php echo url('/catalog/index',['books_id'=>$books_id]); ?>" >开始阅读</a>
                                                <?php else: ?>
                                                <a class="goread"  href="<?php echo url('/info/index',['books_id'=>$books_id,'chapter_url'=>$history_url]); ?>" >继续阅读</a>
                                                <?php endif; ?>


   <a class="js_chapter_btn_cover" href="<?php echo url('/catalog/index',['books_id'=>$books_id]); ?>" lmk="bookmeta-catalog" lmv="目录" urltrue="true" lmurl="#"><span class="glyphicon glyphicon-th-list"></span>&nbsp;目录</a>
                                                <?php if(($books_has == 1)): ?>
<a class="addbksj yiadd" href="javascript:;" >已加入书架</a>
                                                <?php else: ?>
                                                <a class="addbksj" href="javascript:;" >+加入书架</a>
                                                <?php endif; ?>

                                                <!-- <div class="js_chapter_btn_cover"></div> -->
                                        </div>
                                        <div class="infospan">
                                                <span>分类：<?php echo $types[$data['books_type']]; ?></span>
                                                <span>字数：6334457字</span>
                                                <span>状态：<?php echo $data['books_status']; ?></span>
                                                <span style="margin-right:0;">更新时间：<?php echo $data['books_time']; ?></span>
                                        </div>
                                </div>
                        </div>

                </div>
        </div>




        <!-- 评论相关 -->
        <div class="cca-all-comment" style="margin-top: 80px;display: table;margin-left: auto;margin-right: auto;">

                <div class="cover-chapter-c">
                        <div class="cover-chapter-left">
                            <div id="new" class="burl">

                            </div>

                                <div class="comment-cover" lmk="comment" lmv="评论">
                                        <div class="title-comment-cover">
                                                <div class="title-comment-cover-left">
                                                        书友评论
                                                        <div class="line_title_cover"></div>
                                                </div>
                                                <div class="title-comment-cover-middle">
                                                </div>
                                                <!--<div class="title-comment-cover-right">-->
                                                        <!--共 <span class="title-comment-cover-right-span">2391</span> 条评论-->
                                                <!--</div>-->
                                        </div>
                                        <div class="text-comment-cover">
                                                <!-- 未登录提醒 -->
                                                <div id="SOHUCS" sid="<?php echo $books_id; ?>"></div>
                                                <script charset="utf-8" type="text/javascript" src="/static/js/changyan.js" ></script>
                                                <script type="text/javascript">
                                                    window.changyan.api.config({
                                                        appid: '<?php echo $changyan['appid']; ?>',
                                                        conf: '<?php echo $changyan['conf']; ?>'
                                                    });
                                                </script>


                                                <!-- 评论区域 -->

                                        </div>
                                </div>


                        </div>

                </div>


                <div class="cover-chapter-right">
                        <div class="cover-chapter-right-div" id="js_coverrbdbox" lmk="highly" lmv="强力推荐榜">
                                <div class="title-comment-cover-left">强力推荐榜<div class="line_title_cover"></div></div>
                                <div class="cover-rbdbox">
                                        <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $key = 0;$__LIST__ = is_array($res) ? array_slice($res,10,10, true) : $res->slice(10,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                                        <dl class="cover-rbddl">
                                                <div class="bangdan-num-c"><?php echo $key; ?>.</div>
                                                <dd class="cover-rtdd"><a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>"><h4><?php echo $vo['books_name']; ?></h4></a></dd>
                                                <dd class="cover-rcdd cover-active">
                                                        <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>" >
                                                                <img width="53" height="67" src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>" >
                                                                <h4><?php echo $vo['books_name']; ?></h4>
                                                                <p><?php echo $types[$vo['books_type']]; ?>/<?php echo $vo['books_author']; ?></p>
                                                        </a>
                                                </dd>
                                        </dl>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <!--<p class="ccrl-more">-->
                                        <!--<a href="./rankinglist.php" style="color:  rgba(235,99,75,1);" lmk="highly-gd" lmv="更多" urltrue="true" lmurl="#">更多-->
                                                <!--<span class="glyphicon glyphicon-chevron-right"></span></a>-->
                                <!--</p>-->
                        </div>
                </div>
                <!--
                <div class="down-shelf">
                <div class="down-shelf-div">此书已下架，两秒后跳回首页。。。</div>
                </div> -->
        </div>



        <div class="manbox" id="liekbox" lmk="youlike" lmv="猜你喜欢">
                <div class="mantit youlike">
                        <h2>猜你喜欢</h2>
                </div>
                <div class="rollbox">
                        <div class="hotseam likeseam">
                                <ul class="count" nowthis="1" >
                                        <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $key = 0;$__LIST__ = is_array($res) ? array_slice($res,20,18, true) : $res->slice(20,18, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                                        <li>
                                                <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>">
                                                        <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>" width="120" height="160">
                                                        <h3><?php echo $vo['books_name']; ?></h3>
                                                        <p><?php echo $types[$vo['books_type']]; ?>/<?php echo $vo['books_author']; ?></p>
                                                </a>
                                        </li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>


                                </ul>
                        </div>

                        <a class="manlbtn slick-prev" href="javascript:;"></a>
                        <a class="manrbtn slick-next" href="javascript:;"></a>

                </div>
        </div>
        <div class="hotbook" id="coverbd" lmk="hotbangdn" lmv="热门榜单">
                <div class="hotbkbox">
                        <h2>热门榜单</h2>
                        <div class="rollbox">
                                <div class="hotseam hotban">
                                        <ul class="count" nowthis="1" >
                                                <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $key = 0;$__LIST__ = is_array($res) ? array_slice($res,70,18, true) : $res->slice(70,18, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                                                <li>
                                                        <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>">
                                                                <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>" width="120" height="160">
                                                                <h3><?php echo $vo['books_name']; ?></h3>
                                                                <p><?php echo $types[$vo['books_type']]; ?>/<?php echo $vo['books_author']; ?></p>
                                                        </a>
                                                </li>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>


                                        </ul>
                                </div>

                                <a class="manlbtn hot-prev" href="javascript:;"></a>
                                <a class="manrbtn hot-next" href="javascript:;"></a>

                        </div>
                </div>
        </div>
        <div class="cc-background hide"></div>

</div>


<input type="hidden" name="url" value="<?php echo $data['books_url']; ?>">
<input type="hidden" name="books_id" value="<?php echo $books_id; ?>">
<script>

        $(function () {


            //最新章节
            var books_url = $("input[name='url']").val();
            var books_id = $("input[name='books_id']").val();
            $.post('/cover/newchapter',{books_url:books_url,books_id:books_id},function (e) {
                console.log(e);
                if(e.code == '200'){
                    var html = '';
                    html+='<div class="bknewc"><h2 class="newtit">最新章节</h2><div class="line_title_cover"></div>';
                    html+='<h3 class="newbktit">'+e.res.chapter_name+'</h3>';
                    html+='<p class="newtxt "><span class="newchap">'+e.res.chapter_content+'</span><a  href="'+e.res.chapter_url+'"  target="_blank" >(<span>阅读本章</span>)</a>';
                    html+='</p></div>';

                    $("#new").html(html);
                }
            },"json");


            $(".addbksj").click(function () {

                var i = $(".addbksj").hasClass('yiadd');

                if(i==false){

                    var books_id ="<?php echo $books_id; ?>";
                    var user_id ="<?php echo $session_name_id; ?>";
                    $.post("/cover/addShelf",{books_id:books_id,user_id:user_id},function (data) {
                        console.log(data);
                        if(data.code=='200'){
                            $(".addbksj").addClass('yiadd');
                            $(".addbksj").text('已加入书架');
                        }
                        layer.msg(data.msg);
                    },"json");

                }


            });


            //猜你喜欢
            lunpo($(".likeseam>ul>li"),$(".slick-next"),$(".slick-prev"));


            //热门版单
            lunpo($(".hotban>ul>li"),$(".hot-next"),$(".hot-prev"),5000);



            $(".cover-rbddl").mouseover(function(){
                $(".cover-rbddl").find('.cover-rtdd').removeClass('cover-active');
                $(".cover-rbddl").find('.cover-rcdd').addClass('cover-active');

                $(this).find('.cover-rcdd').removeClass('cover-active');
                $(this).find('.cover-rtdd').addClass('cover-active');
            });



        })

</script>

<!--图片懒加载-->
<script type="text/javascript" src="/static/js/underscore.js"></script>
<script>
    // 注意: 需要引入jQuery和underscore
    $(function() {
        // 获取window的引用:
        var $window = $(window);
        // 获取包含data-src属性的img，并以jQuery对象存入数组:
        var lazyImgs = _.map($('img[data-src]').get(), function (i) {
            return $(i);
        });
        // 定义事件函数:
        var onScroll = function() {
            // 获取页面滚动的高度:
            var wtop = $window.scrollTop();
            // 判断是否还有未加载的img:
            if (lazyImgs.length > 0) {
                // 获取可视区域高度:
                var wheight = $window.height();
                // 存放待删除的索引:
                var loadedIndex = [];
                // 循环处理数组的每个img元素:
                _.each(lazyImgs, function ($i, index) {
                    // 判断是否在可视范围内:
                    if ($i.offset().top - wtop < wheight) {
                        // 设置src属性:
                        $i.attr('src', $i.attr('data-src'));
                        // 添加到待删除数组:
                        loadedIndex.unshift(index);
                    }
                });
                // 删除已处理的对象:
                _.each(loadedIndex, function (index) {
                    lazyImgs.splice(index, 1);
                });
            }
        };
        // 绑定事件:
        $window.scroll(onScroll);
        // 手动触发一次:
        onScroll();
    });
</script>

<div class="footer">
    <div class="footbox">

        <div class="footbox-info clearfix">
            <div class="left">
                <a href="<?php echo url('/index/about'); ?>">关于我们</a><i>|</i><a href="<?php echo url('/index/privacy'); ?>">隐私条款</a><i>|</i><a href="<?php echo url('/index/employ'); ?>">申请收录</a><i>|</i><a href="<?php echo url('/index/copyright'); ?>">版权声明</a>
            </div>
            <div class="right"><?php echo $module_data['copyright']; ?></div>
        </div>
        <div class="footbox-info haveimg footbox-p clearfix" style="border-top: 1px solid #494949;">
            <div class="left">起点中文网&nbsp;&nbsp;&nbsp;言情小说吧</div>
            <div class="right">
                <a href="javascript:;" target="_blank"><img class="bottom_icon" src="/static/images/bottom_icon.png" /></a>
                <a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo $module_data['record']; ?></a>
                <span>增值电信业务许可证&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $module_data['record']; ?></span>
                <span>网络文化经营许可证&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $module_data['record']; ?></span>
            </div>
        </div>

        <div class="footbox-info footbox-p clearfix" style="border-top: 1px solid #494949;">
            <div class="left" >为保证更好的浏览效果，请使用IE9以上或其他主流浏览器访问</div>
            <div class="right">
                <span>地址：中国（上海）自由贸易试验区碧波路690号6号楼101、201室</span>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：021-61870500</span>
            </div>
        </div>
    </div>
</div>


</body>

</html>