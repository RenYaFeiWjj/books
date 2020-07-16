<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:102:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\settings_website.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
<form class="layui-form">
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">网站设置</div>
                <div class="layui-card-body" pad15="">

                    <div class="layui-form" wid100="" lay-filter="">
                        <div class="layui-form-item">
                            <label class="layui-form-label"><span class="x-red">*</span>网站名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" lay-verify="required" value="<?php echo $data['name']; ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"><span class="x-red">*</span>网站域名</label>
                            <div class="layui-input-block">
                                <input type="text" name="domain" lay-verify="url" value="<?php echo $data['domain']; ?>" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label"><span class="x-red">*</span>首页标题</label>
                            <div class="layui-input-block">
                                <textarea name="title" lay-verify="required" class="layui-textarea"><?php echo $data['title']; ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label"><span class="x-red">*</span>META关键词</label>
                            <div class="layui-input-block">
                                <textarea name="keywords" lay-verify="required" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割"><?php echo $data['keywords']; ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label"><span class="x-red">*</span>META描述</label>
                            <div class="layui-input-block">
                                <textarea name="descript" lay-verify="required" class="layui-textarea"><?php echo $data['descript']; ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"><span class="x-red">*</span>备案号</label>
                            <div class="layui-input-block">
                                <input type="text" name="record" lay-verify="required" value="<?php echo $data['record']; ?>" class="layui-input">
                            </div>

                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label"><span class="x-red">*</span>版权信息</label>
                            <div class="layui-input-block">
                                <textarea name="copyright" lay-verify="required" class="layui-textarea"><?php echo $data['copyright']; ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="add">确认保存</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</form>



<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;


        //监听提交
        form.on('submit(add)', function(data){

            $.post('/admin.php/settings/website',data.field,function (e) {
                if(e.code==1){
                    //发异步，把数据提交给php000
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

            return false;
        });


    });





</script>
</body>

</html>