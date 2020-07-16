<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:99:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\books_chapter.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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

    <div class="x-body">
        <form class="layui-form">
            <input type="hidden" value="<?php echo $books_id; ?>" name="books_id">
            <input type="hidden" value="edit" name="action">
            <input type="hidden" value="<?php echo $has; ?>" name="has">
          <div class="layui-form-item">
              <label for="L_chapter_name" class="layui-form-label">
                  <span class="x-red">*</span>章节名称
              </label>
              <div class="layui-col-md4">
                  <input type="text" id="L_chapter_name" name="chapter_name" required="章节名称不能为空"  value="<?php echo $chapter_name; ?>" autocomplete="off" class="layui-input">
              </div>
          </div>

            <div class="layui-form-item">
                <label for="L_chapter_url" class="layui-form-label">
                    <span class="x-red">*</span>源地址
                </label>
                <div class="layui-col-md4">
                    <input type="text"  name="chapter_url" required="源地址不能为空"  value="<?php echo $chapter_url; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  保存
              </button>
          </div>
      </form>
    </div>
    <script>


      layui.use(['form','layer'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;

        //自定义验证规则

        //监听提交
        form.on('submit(add)', function(data){
          console.log(form);

          $.post('/admin.php/books/books_chapter',data.field,function (e) {
              if(e.code==1){
                  //发异步，把数据提交给php000
                  layer.alert(e.msg, {icon: 6},function () {
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




  </script>

  </body>

</html>