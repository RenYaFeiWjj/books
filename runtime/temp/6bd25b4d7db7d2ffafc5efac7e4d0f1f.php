<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:95:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\rule_list.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
        <blockquote class="layui-elem-quote">如果选中了可搜索，则可以在 <em>小说管理</em> -> <em>添加小说</em> 中的源地址出现</blockquote>
    </div>
    <xblock>
        <button class="layui-btn" onclick='x_admin_show("添加规则","<?php echo url('rule/add'); ?>")'><i class="layui-icon"></i>添加</button>
    </xblock>

    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>采集网址</th>
            <th>采集地址</th>
            <th>操作</th>
        </thead>
        <tbody>

        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td>
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $vo['rule_id']; ?>'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $vo['rule_id']; ?></td>
            <td class="type_name"><?php echo $vo['rule_name']; ?></td>
            <td><?php echo $vo['host']; ?></td>

            <td class="td-manage">
                <a title="编辑"  onclick="x_admin_show('编辑','<?php echo url('rule/edit',['rule_id'=>$vo['rule_id']]); ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe642;</i>
                </a>
                <a title="删除" onclick="member_del(this,'<?php echo $vo['rule_id']; ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe640;</i>
                </a>
            </td>
        </tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

<?php if(!(empty($res) || (($res instanceof \think\Collection || $res instanceof \think\Paginator ) && $res->isEmpty()))): ?>
    <fieldset class="layui-elem-field">
        <legend>等待添加的采集规则</legend>
        <div class="layui-field-box">
            <table class="layui-table" lay-skin="line">
                <tbody>
                <tr>
                    <td >
                        书库中存中从以下源地址抓取的的书籍，但却没有匹配的采集规则，请尽快添加相应规则，避免阅读时出错
                    </td>
                </tr>
                <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td >
                        <a class="x-a" href="http://<?php echo $vo; ?>" target="_blank"><?php echo $vo; ?></a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
            </table>
        </div>
    </fieldset>
<?php endif; ?>
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
    function member_del(obj,rule_id){
        layer.confirm('确认要删除吗？',function(index){

            $.post('delete',{rule_id:rule_id},function (e) {
                if(e.code==1) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }else{
                    layer.msg('删除失败!',{icon:2,time:1000});
                }
            });


        });
    }


    

    
</script>

</body>

</html>