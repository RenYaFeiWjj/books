<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:91:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/books\view\template\index.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\header.html";i:1594870961;s:85:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\headerCon.html";i:1594870961;s:83:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\imglazy.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\footer.html";i:1594870961;}*/ ?>
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

<!--幻灯片 -->
<div class="carrousel" id="banner">
    <div class="banberbox">
        <div class="corrouselbox">
            <ul class="txtinof"  >
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="hero"  style="left: -2400px;">
                    <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>"><h2 class="bktitle"><?php echo $vo['books_name']; ?></h2>
                        <p class="classify f16"><?php echo $vo['books_author']; ?>/<?php echo $types[$vo['books_type']]; ?></p>
                        <p class="intro f16"><?php echo $vo['books_synopsis']; ?></p></a>
                </li>

                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="thumbnail">
            <ul class="smallul">
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($k == '1'): ?>
                <li class="on" >
                    <img   src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>"  width="48" style="width: 90px; margin-top: 0px; display: inline-block;">
                </li>
                <?php else: ?>
                <li >
                    <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>" width="48" style="width: 48px; margin-top: 30px; display: inline-block;">
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>



            </ul>

        </div>
        <a id="lbl_btn" class="caleft" href="javascript:void(0)"></a>
        <a id="lbr_btn" class="caright" href="javascript:void(0)"></a>
    </div>
</div>

<!--榜单-->
<div class="pcbox">
    <div class="channel clearfix">
        <div class="channelbox" id="manbd">
            <div class="chatitle">
                <h2>人气榜单</h2>
            </div>
            <ul class="chalistbox" lmk="indexnpbd" lmv="男频榜单">


                <?php if(is_array($all) || $all instanceof \think\Collection || $all instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($all) ? array_slice($all,0,5, true) : $all->slice(0,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <li class="clearfix">
                    <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>">
                        <em class="chan"><?php echo $k; ?>.</em>
                        <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>"  alt="">
                        <h3><?php echo $vo['books_name']; ?></h3>
                        <p><?php echo $vo['books_author']; ?>/<?php echo $types[$vo['books_type']]; ?></p>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <div class="chamove hide">
                <a href="#">更多&gt;</a>
            </div>
        </div>
        <div class="channelbox" id="wombd">
            <div class="chatitle">
                <h2>热销榜单</h2>
            </div>
            <ul class="chalistbox" lmk="indexgpbd" lmv="女频榜单">

                <?php if(is_array($all) || $all instanceof \think\Collection || $all instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($all) ? array_slice($all,46,5, true) : $all->slice(46,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <li class="clearfix">
                    <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>">
                        <em class="chan"><?php echo $k; ?>.</em>
                        <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>" alt="">
                        <h3><?php echo $vo['books_name']; ?></h3>
                        <p><?php echo $vo['books_author']; ?>/<?php echo $types[$vo['books_type']]; ?></p>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <div class="chamove hide">
                <a href="#">更多&gt;</a>
            </div>
        </div>
        <div class="channelbox" id="typebd">
            <div class="chatitle">
                <h2>分类推荐榜</h2>
            </div>
            <ul class="chalistbox" lmk="indexflbd" lmv="分类推荐榜">

                <?php if(is_array($all) || $all instanceof \think\Collection || $all instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($all) ? array_slice($all,14,5, true) : $all->slice(14,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <li class="clearfix">
                    <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>">
                        <em class="chan"><?php echo $k; ?>.</em>
                        <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>" alt="">
                        <h3><?php echo $vo['books_name']; ?></h3>
                        <p><?php echo $vo['books_author']; ?>/<?php echo $types[$vo['books_type']]; ?></p>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <div class="chamove hide">
                <a href="#">更多&gt;</a>
            </div>
        </div>
        <div class="channelbox wbox" id="zuibd">
            <div class="chatitle">
                <h2>强力推荐榜</h2>
            </div>
            <ul class="chalastbox" lmk="indexqlbd" lmv="强力推荐榜">
                <?php if(is_array($all) || $all instanceof \think\Collection || $all instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($all) ? array_slice($all,19,10, true) : $all->slice(19,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <li class="clearfix" lmk="indexqlbd-sj" lmv="书籍" urltrue="true" lmurl="#">
                    <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>">
                        <em class="chan"><?php echo $k; ?>.</em>
                        <h3 class="lasth3"><?php echo $vo['books_name']; ?></h3>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>


            </ul>
            <div class="chamove hide">
                <a href="#">更多&gt;</a>
            </div>
        </div>
    </div>
</div>
<!--分类-->
<div class="batchtotal" id="typetab1">
    <table class="classtable" width="100%" border="0" cellspacing="0" lmk="indexfl" lmv="分类">

        <tbody>
        <tr>

            <td lmk="indexfl-10002" lmv="玄幻" urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'1']); ?>" class="divhei" style="background:url(../static/images/class_1.jpg);background-size: cover;">
                    <h3>玄幻</h3>
                </a>
            </td>


            <td lmk="indexfl-10006" lmv="都市" urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'5']); ?>" class="divhei" style="background:url(../static/images/class_2.jpg);background-size: cover;">
                    <h3>都市</h3>
                </a>
            </td>


            <td lmk="indexfl-10008" lmv="历史" urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'6']); ?>" class="divhei" style="background:url(../static/images/class_3.jpg);background-size: cover;">
                    <h3>历史</h3>
                </a>
            </td>


            <td lmk="indexfl-10010" lmv="悬疑" urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'11']); ?>" class="divhei" style="background:url(../static/images/class_4.jpg);background-size: cover;">
                    <h3>灵异</h3>
                </a>
            </td>

        </tr>
        <tr>


            <td lmk="indexfl-10011"  urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'10']); ?>" class="divhei" style="background:url(../static/images/class_5.jpg);background-size: cover;"> <h3>科幻</h3>
            </a></td>


            <td lmk="indexfl-10016"  urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'2']); ?>" class="divhei" style="background:url(../static/images/class_6.jpg);background-size: cover;"> <h3>奇幻魔法</h3>
            </a></td>


            <td lmk="indexfl-10018"  urltrue="true" lmurl="#" rowspan="2">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'7']); ?>" class="rspan" style="background:url(../static/images/class_7.jpg);background-size: cover;"> <h3>军事</h3>
            </a></td>


            <td lmk="indexfl-10019"  urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'12']); ?>" class="divhei" style="background:url(../static/images/class_8.jpg);background-size: cover;"> <h3>衍生同人</h3>
            </a></td>


        </tr>
        <tr>
            <td lmk="indexfl-10020"  urltrue="true" lmurl="#" colspan="2">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'8']); ?>" class="divhei" style="background:url(../static/images/class_9.jpg);background-size: cover;">
                    <h3>游戏竞技</h3>
                </a>
            </td>


            <td lmk="indexfl-10021"  urltrue="true" lmurl="#">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>'4']); ?>" class="divhei" style="background:url(../static/images/class_10.jpg);background-size: cover;">
                    <h3>武侠仙侠</h3>
                </a>
            </td>

        </tr>
        </tbody>
    </table>
</div>
<!--男频精选-->
<div class="manbox" id="manwrap" lmk="indexnpjx" lmv="男频精选">
    <div class="mantit">
        <h2>热门精选</h2>
    </div>
    <div class="rollbox" id="manlb">
        <div class="hotseam">
            <ul class="count" nowthis="1">

                <?php if(is_array($all) || $all instanceof \think\Collection || $all instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($all) ? array_slice($all,43,18, true) : $all->slice(43,18, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <li class="">
                    <a href="<?php echo url('/cover/index',['books_id'=>$vo['books_id']]); ?>">
                        <img src="/static/images/cover.jpg" data-src="/static/images/books_img/<?php echo $vo['books_img']; ?>" width="120" height="160">
                        <h3><?php echo $vo['books_name']; ?></h3>
                        <p><?php echo $vo['books_author']; ?>/<?php echo $types[$vo['books_type']]; ?></p>
                    </a>
                </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>


            </ul>

        </div>

        <a class="manlbtn slick-prev" href="javascript:void(0)"></a>
        <a class="manrbtn slick-next" href="javascript:void(0)"></a>

    </div>

    <div class="mantable clearfix">
        <?php if(is_array($host) || $host instanceof \think\Collection || $host instanceof \think\Paginator): if( count($host)==0 ) : echo "" ;else: foreach($host as $hvk=>$hvo): ?>
        <div class="manlist" id="mt1">
            <dl>
                <dt><h2><?php echo $types[$hvk]; ?></h2></dt>
                <dd>
                    <ul>
                        <?php if(is_array($hvo) || $hvo instanceof \think\Collection || $hvo instanceof \think\Paginator): $i = 0; $__LIST__ = $hvo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ho): $mod = ($i % 2 );++$i;?>
                        <li ><a href="<?php echo url('/cover/index',['books_id'=>$ho['books_id']]); ?>"><?php echo $ho['books_name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>

                </dd>

            </dl>
            <div class="chamove">
                <a href="<?php echo url('/bibliotheca/index',['type_id'=>$hvk]); ?>">更多&gt;</a>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>


<script>
    $(function () {
        $(".caright").click();

        //热门精选
        lunpo($(".hotseam>ul>li"),$(".slick-next"),$(".slick-prev"));

    });


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