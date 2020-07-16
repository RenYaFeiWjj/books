<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:95:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/admin\view\template\rule_edit.html";i:1594870961;s:89:"D:\phpstudy_pro\WWW\study\book\tkbooks\application\admin\view\template\iframe_header.html";i:1594870961;}*/ ?>
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
<blockquote class="layui-elem-quote">
  注：所有项皆为必填项<br/>
</blockquote>
    <div class="x-body">
        <form class="layui-form layui-form-pane">
            <input type="hidden" name="rule_id" value="<?php echo $data['rule_id']; ?>" >
          <div class="layui-form-item">
              <label for="L_rule_name" class="layui-form-label">
                 规则名称
              </label>
              <div class="layui-col-md6">
                  <input type="text" id="L_rule_name" required placeholder="规则名称，示例：笔趣阁"  value="<?php echo $data['rule_name']; ?>" name="rule_name"  lay-verify="required"  autocomplete="off" class="layui-input"  >

              </div>

          </div>

            <div class="layui-form-item">
                <label for="L_rule_url" class="layui-form-label">
                    搜索地址
                </label>
                <div class="layui-col-md6">
                    <input type="text" id="L_rule_url" required placeholder="采集站的搜索链接，示例：https://www.23txt.com/search.php?keyword="  value="<?php echo $data['rule_url']; ?>" name="rule_url"  lay-verify="required"  autocomplete="off" class="layui-input"  >
                </div>

            </div>

            <div class="layui-form-item layui-col-md7" pane="">
                <label class="layui-form-label">是否可搜索</label>
                <div class="layui-input-inline">
                    <input type="radio" name="is_search"   value="1" title="是" <?php if($data['is_search'] == 1): ?>checked<?php endif; ?> >
                    <input type="radio" name="is_search"    value="0" title="否" <?php if($data['is_search'] == 0): ?>checked<?php endif; ?> >
                </div>
            </div>

            <div class="layui-form-item is_search">
                <label for="L_search_name" class="layui-form-label"> 搜索结果</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_search_namel" required placeholder="搜索结果小说名选择器，示例：.odd>a"  value="<?php echo $data['search_name']; ?>" name="search_name"    autocomplete="off" class="layui-input"  >
                </div>

            </div>

            <div class="layui-form-item is_search">
                <label for="L_search_url" class="layui-form-label"> 结果链接</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_search_url" required placeholder="搜索结果小说链接选择器，示例：.odd>a"  value="<?php echo $data['search_url']; ?>" name="search_url"    autocomplete="off" class="layui-input"  >
                </div>

            </div>

            <div class="layui-form-item layui-col-md7 is_search" pane="">
                <label class="layui-form-label">编码处理</label>
                <div class="layui-input-inline">
                    <input type="radio" name="is_urlencode" value="1" <?php if($data['is_urlencode'] == 1): ?>checked<?php endif; ?> title="是">
                    <input type="radio" name="is_urlencode" value="0" <?php if($data['is_urlencode'] == 0): ?>checked<?php endif; ?> title="否" >
                </div>
            </div>

            <div class="layui-form-item is_search">
                <label for="L_books_name" class="layui-form-label"> 小说名</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_books_name"  placeholder="书名选择器，示例：.odd>a"  value="<?php echo $data['books_name']; ?>" name="books_name"    autocomplete="off" class="layui-input"  >
                </div>

            </div>

            <div class="layui-form-item is_search">
                <label for="L_books_author" class="layui-form-label"> 小说作者</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_books_author"  placeholder="作者选择器，示例：.odd>a"  value="<?php echo $data['books_author']; ?>" name="books_author"    autocomplete="off" class="layui-input"  >
                </div>

            </div>

            <div class="layui-form-item is_search">
                <label for="L_books_time" class="layui-form-label"> 更新时间</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_books_time"  placeholder="更新时间选择器，示例：.odd>a"  value="<?php echo $data['books_time']; ?>" name="books_time"    autocomplete="off" class="layui-input"  >
                </div>

            </div>

            <div class="layui-form-item is_search">
                <label for="L_books_type" class="layui-form-label">小说类型</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_books_type"  placeholder="小说类型选择器，示例：.odd>a"  value="<?php echo $data['books_type']; ?>" name="books_type"    autocomplete="off" class="layui-input"  >
                </div>
            </div>

            <div class="layui-form-item is_search">
                <label for="L_books_synopsis" class="layui-form-label">小说简介</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_books_synopsis"  placeholder="小说简介选择器，示例：.odd>a"  value="<?php echo $data['books_synopsis']; ?>" name="books_synopsis"    autocomplete="off" class="layui-input"  >
                </div>
            </div>

            <div class="layui-form-item is_search">
                <label for="L_books_img" class="layui-form-label">小说图片</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_books_img"  placeholder="小说图片选择器，示例：.odd>a"  value="<?php echo $data['books_img']; ?>" name="books_img"    autocomplete="off" class="layui-input"  >
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_chapter_name" class="layui-form-label">小说章节</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_chapter_name" required placeholder="小说章节选择器，示例：.odd>a"  value="<?php echo $data['chapter_name']; ?>" name="chapter_name"  lay-verify="required"  autocomplete="off" class="layui-input"  >
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_chapter_url" class="layui-form-label">章节链接</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_chapter_url" required placeholder="章节链接选择器，示例：.odd>a"  value="<?php echo $data['chapter_url']; ?>" name="chapter_url"  lay-verify="required"  autocomplete="off" class="layui-input"  >
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_info_title" class="layui-form-label">小说标题</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_info_title" required placeholder="小说标题选择器，示例：.odd>a"  value="<?php echo $data['info_title']; ?>" name="info_title"  lay-verify="required"  autocomplete="off" class="layui-input"  >
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_info_content" class="layui-form-label">小说内容</label>
                <div class="layui-col-md6">
                    <input type="text" id="L_info_content" required placeholder="小说内容选择器，示例：.odd>a"  value="<?php echo $data['info_content']; ?>" name="info_content"  lay-verify="required"  autocomplete="off" class="layui-input"  >
                </div>
            </div>



            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="edit">立即提交</button>
            </div>
      </form>
    </div>
    <script>
      layui.use(['form','layer'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;

          form.on('radio', function(data){
              console.log(data.elem.name);
              if(data.elem.name == 'is_search'){
                  console.log(data.value);
                  if(data.value==1){
                      $(".is_search").show();
                      $(".search_input").attr("lay-verify","required");
                  }else {
                      $(".is_search").hide();
                      $(".search_input").attr("lay-verify","");
                  }
              }

          });

        //监听提交
        form.on('submit(edit)', function(data){
          console.log(form);

          $.post('/admin.php/rule/editrule',data.field,function (e) {
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


      var is_search= $("input[name='is_search']:checked").val();
      if(is_search==1){
          $(".is_search").show();
          $(".search_input").attr("lay-verify","required");
      }else {
          $(".is_search").hide();
          $(".search_input").attr("lay-verify","");
      }

    </script>

  </body>

</html>