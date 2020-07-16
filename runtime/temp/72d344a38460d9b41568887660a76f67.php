<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:91:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\index.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\header.html";i:1594870961;s:80:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\meun.html";i:1594870961;s:82:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\footer.html";i:1594870961;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/js/jquery.1.11.min.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <script>
        /*清除缓存*/
        function cache_clear(){
            layer.confirm('确认要清除缓存吗？',function(index){
                $.post('/admin.php/index/clear','',function (e) {
                    layer.msg('缓存清成功',{icon:1,time:1000});
                });

                var index =  layer.alert();
                //关闭当前frame
                layer.close(index);

            });
        }
    </script>

</head>
<body>
<!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="#">后台管理</a></div>
    <div class="left_open">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;"><?php echo \think\Session::get('admin_name'); ?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a onclick="x_admin_show('个人信息','<?php echo url('Settings/myPwd'); ?>')">修改密码</a></dd>
                <dd><a href="<?php echo url('login/loginout'); ?>">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item to-index"><a onclick="cache_clear()" href="javascript:;">清除缓存</a></li>
        <li class="layui-nav-item to-index"><a href="/" target="_blank">前台首页</a></li>
    </ul>

</div>
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>角色管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('/user/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite class="power">网站用户</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('/user/adminList'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>后台管理员</cite>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe705;</i>
                    <cite>小说管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('/books/add'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite class="power">添加小说</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('/books/booksList'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite class="power">小说列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon">&#xe63c;</i>
                    <cite>文章管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('/article/articleList'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite class="power">站点文章</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon">&#xe663;</i>
                    <cite>分类管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('/type/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite class="power">小说分类</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon">&#xe628;</i>
                    <cite>采集管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('/rule/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite class="power">规则管理</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('/rule/bookGather'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite class="power">小说采集</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>设置</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="javascript:;">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>首页设置</cite>
                        </a>
                        <ul class="sub-menu" >
                        <li>
                            <a _href="<?php echo url('/Settings/slide'); ?>">
                                <i class="iconfont"></i>
                                <cite>幻灯片设置</cite>
                            </a>
                        </li>

                    </ul>
                        <ul class="sub-menu" >
                            <li>
                                <a _href="<?php echo url('/Settings/homeCache'); ?>">
                                    <i class="iconfont"></i>
                                    <cite>首页静态化</cite>
                                </a>
                            </li>

                        </ul>
                    </li >
                    <li>
                        <a _href="javascript:;">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>seo设置</cite>
                        </a>
                        <ul class="sub-menu" >
                            <li>
                                <a _href="<?php echo url('/Settings/seolist'); ?>">
                                    <i class="iconfont"></i>
                                    <cite>seo管理</cite>
                                </a>
                            </li>

                        </ul>
                    </li >
                    <li>
                        <a _href="javascript:;">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>系统设置</cite>
                        </a>
                        <ul class="sub-menu" >
                            <li>
                                <a _href="<?php echo url('/Settings/website'); ?>">
                                    <i class="iconfont"></i>
                                    <cite>网站设置</cite>
                                </a>
                            </li>
                            <li>
                                <a _href="<?php echo url('/Settings/mail'); ?>">
                                    <i class="iconfont"></i>
                                    <cite>邮件服务</cite>
                                </a>
                            </li>
                            <li>
                                <a _href="<?php echo url('/Settings/changyan'); ?>">
                                    <i class="iconfont"></i>
                                    <cite>畅言接入</cite>
                                </a>
                            </li>
                        </ul>
                    </li >
                </ul>
            </li>

        </ul>
    </div>
</div>
<script>
    $(function () {
        var admin = "<?php echo $admin_id; ?>";
            if(admin!='1'){
                    $("cite").each(function(){
                        var arr_data = <?php echo $arr; ?>;
                        var e = arr_data.indexOf($(this).text());
                        if(e=='-1'){
                            $(this).parent().parent().remove();
                        }
                    });
            }

        var meun = new Array()
        $("cite").each(function(e,i){
            var name = $(this).text();

            meun[e] = name;

        });
       var  meunjson = JSON.stringify(meun);

       //缓存栏目
       $.post('meun',{meunjson:meunjson},function (e) {
       });
    });
</script>
<!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src="<?php echo url('/index/welcome'); ?>" frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
<!-- 底部开始 -->
<div class="footer">
    <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved</div>
</div>
<!-- 底部结束 -->

</body>
</html>