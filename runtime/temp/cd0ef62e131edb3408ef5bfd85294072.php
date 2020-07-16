<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:95:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\books_add.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so layui-form-pane" action="<?php echo url('/books/add'); ?>" method="post"  >
          <input class="layui-input" placeholder="书籍名或作者名称" name="books_name" required="书籍名或作者名称不能为空" value="<?php echo $books_name; ?>" style="width:50%">
          <div class="layui-inline">
            <select name="rule_id" required="书籍名或作者名称不能为空" >
              <?php if(is_array($rule_list) || $rule_list instanceof \think\Collection || $rule_list instanceof \think\Paginator): $i = 0; $__LIST__ = $rule_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <option value="<?php echo $vo['rule_id']; ?>" <?php if($rule_id == $vo['rule_id']): ?>selected<?php endif; ?> ><?php echo $vo['rule_name']; ?></option>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

          </div>
          <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
        </form>
      </div>
      <blockquote class="layui-elem-quote">如果搜索不到想要小说，可移步到小说中列表中手动添加小说</blockquote>

      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>书籍名</th>
            <th>链接</th>
            <th>操作</th>
        </thead>
        <tbody>

        <?php if(isset($result)): if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $vo['name']; ?></td>
            <td><a href="<?php echo $vo['href']; ?>" target="_blank"><?php echo $vo['href']; ?></a></td>
            <td class="td-manage">
              <button class="layui-btn layui-btn layui-btn-xs jkbooks" name="<?php echo $vo['name']; ?>" rule_id="<?php echo $rule_id; ?>" href="<?php echo $vo['href']; ?>"  ><i class="layui-icon"></i>添加入库</button>
            </td>
          </tr>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

        </tbody>
      </table>


    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }

      //小说入库
      $(".jkbooks").click(function () {

          //调用
          loading("小说入库中，请稍等！");

          var href = $(this).attr('href');
          var name = $(this).attr('name');
          var rule_id = $(this).attr('rule_id');

          $.post('Warehousing',{href:href,name:name,rule_id:rule_id},function (e) {
              layer.msg(e.msg);
          });
      });

      //加载层
      function loading(msg) {
          layer.msg(msg, {
              icon: 16,
              shade: [0.1, '#fff'],
              time: false  //取消自动关闭
          })
      }



    </script>




  </body>

</html>