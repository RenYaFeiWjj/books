<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:98:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\article_list.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
        <form class="layui-form layui-col-md12 x-so">
            <input type="text" name="article_name"  placeholder="请输入文章名称" autocomplete="off" value="<?php echo $res['article_name']; ?>" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>
    <xblock>
        <!--<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>-->
        <button class="layui-btn" onclick='x_admin_show("添加文章","<?php echo url('article/articleAdd'); ?>")'><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $num; ?> 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>文章名</th>
            <th>文章作者</th>
            <th>发布时间</th>
            <th>发布状态</th>
            <th>操作</th></tr>
        </thead>
        <tbody>

        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td>
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['article_id']; ?>'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $vo['article_id']; ?></td>
            <td><?php echo $vo['article_name']; ?></td>
            <td><?php echo $vo['article_author']; ?></td>
            <td><?php echo $vo['add_time']; ?></td>
            <td class="td-status">
                <?php if($vo['article_status']==1): ?>
                <button class="layui-btn layui-btn-xs">已发布</button>
                <?php else: ?>
                <button class="layui-btn layui-btn-primary layui-btn-xs">未发布</button>
                <?php endif; ?>
            </td>
            <td class="td-manage">

                <a title="编辑"  onclick="x_admin_show('编辑','<?php echo url('article/articleEdit',['article_id'=>$vo['article_id']]); ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe642;</i>
                </a>

                <a title="删除" onclick="member_del(this,'<?php echo $vo['article_id']; ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe640;</i>
                </a>
            </td>
        </tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>



    <div class="page">
        <div>
            <?php echo $data->render(); ?>
        </div>
    </div>

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



    /*用户-删除*/
    function member_del(obj,article_id){
        layer.confirm('确认要删除吗？',function(index){

            $.post('/admin.php/article/articleDelete',{article_id:article_id},function (e) {
                if(e.code==1) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }else{
                    layer.msg('删除失败!',{icon:2,time:1000});
                }
            });


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
    

    
</script>

</body>

</html>