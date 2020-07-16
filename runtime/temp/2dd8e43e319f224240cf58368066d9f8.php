<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:97:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\article_add.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
        width: 60px;
    }
    .layui-form-switch em {
        width: 45px;
    }
    .layui-form-onswitch i {
        left: 50px;
    }
</style>
    <div class="x-body">

        <div class="layui-form" lay-filter="layuiadmin-app-form-list" id="layuiadmin-app-form-list" style="padding: 20px 30px 0 0;">
            <div class="layui-form-item">
                <label class="layui-form-label"> <span class="x-red">*</span>文章标题</label>
                <div class="layui-input-block">
                    <input type="text" name="article_name" lay-verify="required" placeholder="请输入文章标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>作者</label>
                <div class="layui-input-block">
                    <input type="text" name="article_author" lay-verify="required" placeholder="请输入作者" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>文章内容</label>
                <div class="layui-input-block">
                    <textarea name="article_content"   autocomplete="off" class="layui-textarea" id="article_content" ></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">是否发布</label>
                <div class="layui-input-inline">
                    <input type="radio" name="article_status" value="1" title="是" checked >
                    <input type="radio" name="article_status" value="0" title="否"  >
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    保存
                </button>
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

          $.post('/admin.php/article/articleAdd',data.field,function (e) {
              if(e.code==1){
                  //发异步，把数据提交给php000
                  layer.alert("新增成功", {icon: 6},function () {
                      // 获得frame索引
                      var index = parent.layer.getFrameIndex(window.name);
                      //关闭当前frame
                      parent.layer.close(index);
                  });
              }else{
                  layer.msg(e.msg);
              }
          });

          return false;
        });


      });
      layui.use('layedit', function(){
          var layedit = layui.layedit
              ,$ = layui.jquery;

          layedit.set({
              uploadImage: {
                  url: 'uploadImage' //接口url
                  , type: 'post' //默认post
              }
          });

          //构建一个默认的编辑器
          var index = layedit.build('article_content');

        //将编辑器的值赋予teaxt
          $('.layui-btn').on('click', function(){
              $("#article_content").text(layedit.getContent(index));
          });


      });



  </script>

  </body>

</html>