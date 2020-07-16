<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:97:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\book_gather.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
<div class="layui-col-md12">
    <div class="layui-card">
        <blockquote class="layui-elem-quote">点击开始采集后，采集程序将无法停止，直至采集完成！采集时将自动跳过已有书籍</blockquote>
        <div class="layui-card-body">
            <table class="layui-table" lay-even="" lay-skin="row">
                <colgroup>
                    <col width="150">
                    <col width="200">
                    <col width="150">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th>起点榜单</th>
                    <th>采集地址</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>原创风云榜</td>
                    <td>https://www.qidian.com/rank/yuepiao?style=1&chn=-1&page=</td>
                    <td>
                        <div class="layui-table-cell laytable-cell-1-0-7">
                            <a class="layui-btn layui-btn-normal layui-btn-xs btn_url" url="https://www.qidian.com/rank/yuepiao?style=1&chn=-1&page=" lay-event="edit">开始采集</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>推荐票榜</td>
                    <td>https://www.qidian.com/rank/recom?style=1&page=</td>
                    <td>
                        <div class="layui-table-cell laytable-cell-1-0-7">
                            <a class="layui-btn layui-btn-normal layui-btn-xs btn_url" url="https://www.qidian.com/rank/recom?style=1&page=" lay-event="edit">开始采集</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>VIP收藏榜</td>
                    <td>https://www.qidian.com/rank/vipcollect?style=1&page=</td>
                    <td>
                        <div class="layui-table-cell laytable-cell-1-0-7">
                            <a class="layui-btn layui-btn-normal layui-btn-xs btn_url" url="https://www.qidian.com/rank/vipcollect?style=1&page=" lay-event="edit">开始采集</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>VIP精品打赏榜</td>
                    <td>https://www.qidian.com/rank/vipreward?style=1&page=</td>
                    <td>
                        <div class="layui-table-cell laytable-cell-1-0-7">
                            <a class="layui-btn layui-btn-normal layui-btn-xs btn_url"  url="https://www.qidian.com/rank/vipreward?style=1&page=" lay-event="edit">开始采集</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>完本榜</td>
                    <td>https://www.qidian.com/rank/fin?style=1&page=</td>
                    <td>
                        <div class="layui-table-cell laytable-cell-1-0-7">
                            <a class="layui-btn layui-btn-normal layui-btn-xs btn_url" url="https://www.qidian.com/rank/fin?style=1&page=" lay-event="edit">开始采集</a>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<script>
    $(function () {
        $(".btn_url").click(function () {
            var index = layer.load(2, {shade: [0.5,'#fff']});
            var obj = $(this);
            var obj_url = obj.attr("url");
            $.post('/admin.php/rule/gather',{obj_url:obj_url},function (e) {
                if(e.code==1){
                    layer.close(index);
                    layer.alert(e.msg);
                    obj.parent().html('<button class="layui-btn layui-btn-xs">采集完成</button>');
                }else{
                    layer.alert(e.msg);
                }
            });

        });
    });
</script>


</body>

</html>