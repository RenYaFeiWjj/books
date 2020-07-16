<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:95:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/books\view\template\copyright.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\header.html";i:1594870961;s:85:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\headerCon.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\books\view\template\footer.html";i:1594870961;}*/ ?>
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
        <div class="contbox">
            <h3>版权声明</h3>
            <p>鉴于本服务以非人工检索方式提供无线搜索、根据您输入的关键字自动生成到第三方网页的链接，本服务会提供与其他任何互联网网站或资源的链接。由于<?php echo $module_data['name']; ?>无法控制这些网站或资源的内容，您了解并同意：无论此类网站或资源是否可供利用，<?php echo $module_data['name']; ?>不予负责；<?php echo $module_data['name']; ?>亦对存在或源于此类网站或资源之任何内容、广告、产品或其他资料不予保证或负责。因您使用或依赖任何此类网站或资源发布的或经由此类网站或资源获得的任何内容、商品或服务所产生的任何损害或损失，<?php echo $module_data['name']; ?>不负任何直接或间接责任。</p>
            <p>因本服务搜索结果根据您键入的关键字自动搜索获得并生成，不代表<?php echo $module_data['name']; ?>赞成被搜索链接到的第三方网页上的内容或立场。</p>
            <p>任何通过使用本服务而搜索链接到的第三方网页均系第三方提供或制作，您可能从该第三方网页上获得资讯及享用服务，<?php echo $module_data['name']; ?>无法对其合法性负责，亦不承担任何法律责任。</p>
            <p>您应对使用无线搜索引擎的结果自行承担风险。<?php echo $module_data['name']; ?>不做任何形式的保证：不保证搜索结果满足您的要求，不保证搜索服务不中断，不保证搜索结果的安全性、准确性、及时性、合法性。因网络状况、通讯故障、第三方网站等任何原因而导致您不能正常使用本服务的，<?php echo $module_data['name']; ?>不承担任何法律责任。</p>
            <p>您应该了解并知晓，<?php echo $module_data['name']; ?>作为移动互联网的先行者，拥有先进的无线数据应用技术和智能搜索系统，为手机等无线端用户提供了移动互联网的最佳搜索体验。<?php echo $module_data['name']; ?>使用行业内成熟的搜索引擎技术，同时充分考虑用户手机端上网特征，由于电脑端网页的复杂、多样与标准的不同，用户无法通过手机正常浏览电脑端网页，为了提供更好的用户体验，用户在搜索点击后，我们网页会提供转码，这就是网页实时转换技术，将页面转换为适于手机用户访问的页面，从而为用户提供可用、高效的搜索服务。由于搜索引擎对数据即时性和客观性的要求，和复杂的数据变更以及本身的技术问题，在转码的过程中可能会出现原网站的部门数据异常而导致部分数据错误，若您想获取完整的原网站完整有效的内容，您应选择去原网站浏览，介于此类技术问题，<?php echo $module_data['name']; ?>一直在不断的完善搜索技术，以提高数据的准确性。</p>
            <p>您使用本服务即视为您已阅读并同意受本声明内容的相关约束。<?php echo $module_data['name']; ?>有权在根据具体情况进行修改本声明条款。对此，我们不会有专门通知，但，您可以在相关页面中查阅最新的条款。条款变更后，如果您继续使用本服务，即视为您已接受修改后的条款。如果您不接受，应当停止使用本服务。</p>
            <p>本声明内容同时包括《<?php echo $module_data['name']; ?>软件服务协议》，《版权保护投诉指引》及<?php echo $module_data['name']; ?>可能不断发布本服务的相关声明、协议、业务规则等内容。上述内容一经正式发布，即为本声明不可分割的组成部分，您同样应当遵守。上述内容与本声明内容存在冲突的，以本声明为准。您对前述任何业务规则、声明内容的接受，即视为您对本声明内容全部的接受。</p>
            <p>本声明的成立、生效、履行、解释及纠纷解决，适用中华人民共和国大陆地区法律（不包括冲突法）。</p>
            <p>若您和<?php echo $module_data['name']; ?>之间发生任何纠纷或争议，首先应友好协商解决；协商不成的，您同意将纠纷或争议提交<?php echo $module_data['name']; ?>所在地的人民法院处理。</p>
        </div>
    </div>
</div>
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