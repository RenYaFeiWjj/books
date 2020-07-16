<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:93:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/books\view\template\catalog.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\header.html";i:1594870961;s:85:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\headerCon.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\footer.html";i:1594870961;}*/ ?>
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


<div class="contetline">
    <div class="content">
        <div class="cover-nav">
            <p>&gt; <a class="booktitle" href="<?php echo url('/cover/index',['books_id'=>$books_id]); ?>"><?php echo $books_name; ?></a> &gt; <span>所有章节</span></p>
        </div>
        <div class="bookMeta">
            <h3 class="chatit"><?php echo $books_name; ?></h3>
            <p class="chaauto"><?php echo $books_author; ?></p>
        </div>
        <dl class="zjlistdl">
            <dt><a class="descsort" id="js_sort" href="javascript:;"></a></dt>
        </dl>
        <ul class="chapterul clearfix menus" id="chapterlists">

            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
            <li <?php if($key > '60'): ?>style='display: none;'<?php endif; ?> ><a   href="<?php echo url('/info/index',['books_id'=>$books_id,'chapter_url'=>$vo[1]]); ?>" target="_blank" ><?php echo $vo[0]; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>

        <div class="paging">
            <div class="pagingbox"></div>
        </div>

</div>
<script src="/static/js/jquery.pagination.js"></script>

<script>
    $(function () {
        //计算总记录数
        var list = $("#chapterlists li").length;

        //调用分页插件
        $('.pagingbox').pagination({
            mode: 'fixed',
            totalData:list,
            showData:60,
            prevContent: '上页',
            nextContent: '下页',
            keepShowPN:true,

        });


        $(".pagingbox").on('click', 'a', function () {
            setTimeout(function(){
                page();
            },10);
        });

        //倒序时重新分页，避免错乱
        $("#js_sort").click(function () {
            page();
        });

        //单击显示条数
        function page() {
            var num = $(".pagingbox>.active").text();
            var star = (num-1)*60;
            var end = num*60;
            var a =  $("#chapterlists li");
            a.hide();
            a.each(function (e) {
                if(e>=star && e<end){
                    $(this).show();
                }
            });
        }
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