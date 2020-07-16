<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\books_edit.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
            <input type="hidden" name="books_id" value="<?php echo $data['books_id']; ?>">
            <input type="hidden" name="books_img" value="<?php echo $data['books_img']; ?>">
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red"></span>书籍封面
                </label>
                <div class="layui-input-inline ">
                    <span class="file_photo" > <img src="/static/images/books_img/<?php echo $data['books_img']; ?>" style="width: 112px;margin-bottom: 10px;" id="portrait"  /></span>
                    <p>
                        <button type="button" class="layui-btn" id="test1">
                            <i class="layui-icon"></i>修改封面
                        </button>
                        <input class="layui-upload-file" type="file" accept="undefined" >
                        <input  type="hidden"  name="books_img" value="<?php echo $data['books_img']; ?>" >
                    </p>
                </div>
            </div>
          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red">*</span>书籍名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_username" name="books_name" required="" lay-verify="nikename" autocomplete="off" class="layui-input" value="<?php echo $data['books_name']; ?>" >
              </div>

          </div>

          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red">*</span>作者
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_email" name="books_author" required=""  value="<?php echo $data['books_author']; ?>"
                         autocomplete="off" class="layui-input">
              </div>
          </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>更新时间
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_time" name="books_time" required=""  value="<?php echo $data['books_time']; ?>"
                           autocomplete="off" class="layui-input" placeholder="更新时间" name="L_time">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>书籍类型
                </label>
                <div class="layui-input-inline">
                    <select name="books_type" >
                        <!--<option value=""><?php if(empty($res['books_type']) || (($res['books_type'] instanceof \think\Collection || $res['books_type'] instanceof \think\Paginator ) && $res['books_type']->isEmpty())): ?>请选择类型<?php else: ?><?php echo $types[$res['books_type']]; endif; ?></option>-->
                        <option value="">请选择类型</option>
                        <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['type_id']; ?>" <?php if($data['books_type'] == $vo['type_id']): ?>selected<?php endif; ?> ><?php echo $vo['type_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>更新状态
                </label>
                <div class="layui-input-inline">
                    <input type="radio" name="books_status" value="0" title="更新" <?php if($data['books_status'] == 0): ?>checked<?php endif; ?>>
                    <input type="radio" name="books_status" value="1" title="完结" <?php if($data['books_status'] == 1): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>书籍简介
                </label>
                <div class="layui-input-inline">
                    <textarea name="books_synopsis" required="书籍简介不能为空"  placeholder="请输入内容" class="layui-textarea"><?php echo $data['books_synopsis']; ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>源地址
                </label>
                <div class="layui-input-inline">
                    <input type="text"  name="books_url" required=""  value="<?php echo $data['books_url']; ?>"
                           autocomplete="off" class="layui-input">
                </div>
            </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="edit" lay-submit="">
                  保存
              </button>
          </div>
            <input type="hidden"  name="books_id"   value="<?php echo $data['books_id']; ?>" />
      </form>
    </div>
    <script>
        layui.use('laydate', function(){
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#L_time' //指定元素
            });

        });


        layui.use('upload', function(){
            var upload = layui.upload;

            //执行实例
            var uploadInst = upload.render({
                elem: '#test1' //绑定元素
                ,url: '/admin.php/books/upload_photo' //上传接口
                ,done: function(res){
                    //上传完毕回调
                    if(res.code=='200'){
                        var html = '<img src="'+res.res+'" style="width: 112px;margin-bottom: 10px;" />';
                        $(".file_photo").html(html);

                        $("input[name='books_img']").val(res.res);
                    }
                }
                ,error: function(){
                    //请求异常回调
                }
            });
        });


      layui.use(['form','layer'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;

        //自定义验证规则

        //监听提交
        form.on('submit(edit)', function(data){
          console.log(form);

          $.post('/admin.php/books/editBooks',data.field,function (e) {
              if(e.code==1){
                  //发异步，把数据提交给php000
                  layer.alert("编辑成功", {icon: 6},function () {
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

       $("#portrait").click(function () {
          $("input[name='user_img']").click();

       });


  </script>

  </body>

</html>