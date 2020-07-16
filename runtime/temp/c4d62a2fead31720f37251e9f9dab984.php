<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:99:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\settings_mail.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">邮件服务</div>
                <div class="layui-card-body">

                    <div class="layui-form" wid100="" lay-filter="">
                        <div class="layui-form-item">
                            <label class="layui-form-label2">SMTP服务器</label>
                            <div class="layui-input-inline">
                                <input type="text" name="smtp_server" lay-verify="required" value="<?php echo $data['smtp_server']; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">如：smtp.163.com</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label2">SMTP端口号</label>
                            <div class="layui-input-inline" style="width: 80px;">
                                <input type="text" name="smtp_number" lay-verify="number|required" value="<?php echo $data['smtp_number']; ?>" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">一般为 25 或 465</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label2">发件人邮箱</label>
                            <div class="layui-input-inline">
                                <input type="text" name="send_email" value="<?php echo $data['send_email']; ?>" lay-verify="email" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label2">发件人昵称</label>
                            <div class="layui-input-inline">
                                <input type="text" name="send_nickname" lay-verify="required" value="<?php echo $data['send_nickname']; ?>" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label2">邮箱登入名</label>
                            <div class="layui-input-inline">
                                <input type="text" name="send_username" lay-verify="required" value="<?php echo $data['send_username']; ?>" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label2">邮箱登入密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="send_password"  lay-verify="pwd" value="<?php echo $data['send_password']; ?>" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">登入密码或是授权码</div>
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


<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;


        //监听提交
        form.on('submit(add)', function(data){

            $.post('/admin.php/settings/mail',data.field,function (e) {
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