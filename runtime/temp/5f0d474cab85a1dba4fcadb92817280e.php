<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:96:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\books_list.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
        <form action="booksList" class="layui-form layui-col-md12 x-so">
            <input class="layui-input" placeholder="开始日" name="start_time" id="start">
            <input class="layui-input" placeholder="截止日" name="end_time" id="end">
            <input type="text" name="books_name"  placeholder="请输入书籍名" value="<?php echo $res['books_name']; ?>" autocomplete="off" class="layui-input">
            <input type="text" name="books_author"  placeholder="请输入作者名" value="<?php echo $res['books_author']; ?>" autocomplete="off" class="layui-input">
            <input type="text" name="books_url"  placeholder="请输入源地址" value="<?php echo $res['books_url']; ?>" autocomplete="off" class="layui-input">
            <div class="layui-inline">
                <select name="books_type" >
                    <!--<option value=""><?php if(empty($res['books_type']) || (($res['books_type'] instanceof \think\Collection || $res['books_type'] instanceof \think\Paginator ) && $res['books_type']->isEmpty())): ?>请选择类型<?php else: ?><?php echo $types[$res['books_type']]; endif; ?></option>-->
                    <option value="">请选择类型</option>
                    <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['type_id']; ?>" <?php if($res['books_type'] == $vo['type_id']): ?>selected<?php endif; ?> ><?php echo $vo['type_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>

            </div>
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick='x_admin_show("添加用户","<?php echo url('books/addBooks'); ?>")'><i class="layui-icon"></i>添加</button>
        <?php if($admin_id == 1): ?>
        <button class="layui-btn layui-btn-danger" onclick="delbooks()"><i class="layui-icon"></i>清空小说</button>
        <?php endif; ?>
        <span class="x-right" style="line-height:40px">共有书籍：<?php echo $count; ?> 本</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>书籍名称</th>
            <th>作者</th>
            <th>更新时间</th>
            <th>类型</th>
            <th>状态</th>
            <th>操作</th></tr>
        </thead>
        <tbody>

        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td>
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['books_id']; ?>'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $vo['books_id']; ?></td>
            <td><?php echo $vo['books_name']; ?></td>
            <td><?php echo $vo['books_author']; ?></td>
            <td><?php echo $vo['books_time']; ?></td>
            <td><?php echo $types[$vo['books_type']]; ?></td>
            <td class="td-status">
                <?php if($vo['books_status']==0): ?>
                <span  >连载</span>
                <?php else: ?>
                <span  class="layui-btn-disabled">完结</span>
                <?php endif; ?>
            </td>

            <td class="td-manage">
                <!--<a onclick="member_stop(this,'10001')" href="javascript:;" is_disable="<?php echo $vo['books_status']; ?>" user_id="<?php echo $vo['books_id']; ?>" title="启用">-->
                    <!--<i class="layui-icon">&#xe601;</i>-->
                <!--</a>-->
                <a title="编辑"  onclick="x_admin_show('编辑','<?php echo url('books/edit',['books_id'=>$vo['books_id']]); ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe642;</i>
                </a>
                <a onclick="x_admin_show('最新章节','<?php echo url('books/books_chapter',['books_id'=>$vo['books_id']]); ?>')" title="最新章节" href="javascript:;">
                    <i class="layui-icon">&#xe621;</i>
                </a>
                <a title="删除" onclick="member_del(this,'<?php echo $vo['books_id']; ?>')" href="javascript:;">
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

    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){


            var is_disable = $(this).attr("class");
            var user_id = $(this).attr("user_id");
            console.log(is_disable);

            $.post("",{is_disable:is_disable},function () {

            });

            if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用');
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

            }else{
                $(obj).attr('title','启用');
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
            }

        });
    }

    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.post('/admin.php/books/delete',{books_id:id},function (e) {
                if(e.code==1){
                    //发异步删除数据
                    $(obj).parents("tr").remove();
                    layer.msg(e.msg,{icon:1,time:1000});
                }else{
                    layer.msg(e.msg,{icon:2,time:1000});
                }

            });


        });
    }

    /*清空小说*/
    function delbooks(){
        layer.confirm('确认要清空小说吗？',function(index){
            $.post('/admin.php/books/delAllBooks','',function (e) {
                if(e.code==1){
                    //发异步删除数据
                    layer.msg(e.msg,{icon:1,time:1000});
                    location.replace(location.href)
                }else{
                    layer.msg(e.msg,{icon:2,time:1000});
                }

            });


        });
    }



    function delAll (argument) {

        var books_ids = tableCheck.getData();

        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            $.post('/admin.php/books/delAllList',{books_ids:books_ids},function (e) {
                if(e.code==1){
                    //发异步删除数据
                    layer.msg(e.msg,{icon:1,time:1000});
                }else{
                    layer.msg(e.msg,{icon:2,time:1000});
                }

            });

            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
    }

    $(function () {
        $(".layui-anim-upbit>dd:end").click();
    });


    
</script>

</body>

</html>