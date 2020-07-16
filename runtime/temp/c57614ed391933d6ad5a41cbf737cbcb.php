<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:105:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\settings_home_cache.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/js/jquery.1.11.min.js"></script>
    <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="layui-anim layui-anim-up">
<div class="x-nav">
      <span class="layui-breadcrumb">
          <?php if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="javascript:;"><?php echo $vo; ?></a>
          <?php endforeach; endif; else: echo "" ;endif; ?>

      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<style>
    .layui-form-switch {
        margin-top: 8px;
    }
</style>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">

                </div>
                <blockquote class="layui-elem-quote layui-quote-nm">开启后，首页将生成静态页，当首页有更改时，需及时更新</blockquote>
                <div class="layui-card-body">
                    <div class="site-text site-block">
                        <form class="layui-form" action="">

                            <div class="layui-form-item" >
                                <label class="layui-form-label">首页静态化</label>
                                <div class="layui-input-inline">
                                    <input type="checkbox" lay-filter="switch" value="" name="switch" lay-skin="switch" lay-text="开启|关闭" class="btn_switch" <?php if($home_switch == true): ?>checked<?php endif; ?>  >
                                </div>
                            </div>


                            <div class="layui-form-item" >
                                <label class="layui-form-label">更新静态页</label>
                                <div class="layui-input-inline">
                                    <button type="button" class="layui-btn layui-btn-sm layui-btn-primary edit_home" lay-filter="edit" style="margin-top: 3px;" >更新首页</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

    layui.use('form', function(){
        var form = layui.form;

        //各种基于事件的操作，下面会有进一步介绍
        //监听提交
        form.on('switch(switch)', function(data){

            var home_switch = data.elem.checked;//开关是否开启，true或者false

            $.post('/admin.php/settings/homeCache',{home_switch:home_switch},function (e) {
                if(e.code==1){
                    //发异步，把数据提交给php
                    layer.alert(e.msg, {icon: 6},function () {
                        // 获得frame索引
                        var index =  layer.alert();
                        //关闭当前frame
                        layer.close(index);
                    });
                }else{
                    layer.msg(e.msg);
                }
            });

        });



        $(".edit_home").click(function () {
            $.post('/admin.php/settings/editHome','',function (e) {
                if(e.code==1){
                    //发异步，把数据提交给php
                    layer.alert(e.msg, {icon: 6},function () {
                        // 获得frame索引
                        var index =  layer.alert();
                        //关闭当前frame
                        layer.close(index);
                    });
                }else{
                    layer.msg(e.msg);
                }
            });


        });

    });













</script>



</body>

</html>