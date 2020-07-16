<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:100:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\settings_slide.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
<div class="layui-tab">
    <ul class="layui-tab-title">
        <li class="layui-this">pc幻灯片</li>
        <li>wap幻灯片</li>
    </ul>

    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <blockquote class="layui-elem-quote layui-quote-nm">请填入书籍的id，系统将会自动对应到相应的书籍</blockquote>
            <form class="layui-form">
                <div class="layui-fluid">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-col-md12">
                            <div class="layui-card">
                                <div class="layui-card-body">
                                    <?php if(is_array($books) || $books instanceof \think\Collection || $books instanceof \think\Paginator): $k = 0; $__LIST__ = $books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dl): $mod = ($k % 2 );++$k;?>

                                    <div class="layui-form-item">
                                        <label class="layui-form-label2">第<?php echo $k; ?>张幻灯片</label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="books_ids[]" value="<?php echo $dl['books_id']; ?>" class="layui-input" placeholder="书籍id" lay-verify="number">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">
                                            对应书籍：<?php echo $dl['books_name']; ?>
                                        </div>
                                    </div>

                                    <?php endforeach; endif; else: echo "" ;endif; ?>
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
            </form >
        </div>



        <div class="layui-tab-item">
            <form class="layui-form">
                <div class="layui-fluid">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-col-md12">
                            <div class="layui-card">
                                <div class="layui-card-body">

                                    <div class="layui-form" wid100="" lay-filter="">
                                        <?php if(is_array($slide_wap) || $slide_wap instanceof \think\Collection || $slide_wap instanceof \think\Paginator): $k = 0; $__LIST__ = $slide_wap;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sl): $mod = ($k % 2 );++$k;?>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label2">第<?php echo $k; ?>张幻灯片:</label>
                                            <div class="layui-col-md12" style="padding-left: 26px;">
                                                <input type="hidden" name="data[<?php echo $k; ?>][image]" value="<?php echo $sl['image']; ?>">
                                                  <img src="<?php echo $sl['image']; ?>" key="<?php echo $k; ?>" width="200px" height="60px" class="img_slide" style="cursor:pointer">
                                            </div>
                                            <div class="layui-col-md6" style="padding: 10px 0px 0px 26px;">
                                                    <input type="text" name="data[<?php echo $k; ?>][url]" placeholder="请输入链接地址" value='<?php echo $sl['url']; ?>' autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>


                                        <div class="layui-form-item">
                                            <div class="layui-input-block">
                                                <button class="layui-btn" lay-submit="" lay-filter="slide_wap">确认保存</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });

    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;


        //监听提交
        form.on('submit(add)', function(data){

            $.post('/admin.php/settings/slide',data.field,function (e) {
                layer.msg(e.msg);
            });

            return false;
        });

        form.on('submit(slide_wap)', function(data){

            $.post('/admin.php/settings/slide_wap',data.field,function (e) {
                layer.msg(e.msg);
            });

            return false;
        });


    });

    $(".img_slide").mouseover(function () {
        layer.tips('点击图片可进行修改', $(this));
    });

    layui.use('upload', function(){
        var upload = layui.upload;

        //执行实例
        var uploadInst = upload.render({
            elem: '.img_slide' //绑定元素
            ,url: 'upload_img' //上传接口
            ,done: function(res){
                //上传完毕回调
                if(res.code=='200'){
                 this.item.prev().val(res.res);
                 this.item.attr("src",res.res);
                }
            }
            ,error: function(){
                //请求异常回调
            }
        });
    });

</script>

</body>

</html>