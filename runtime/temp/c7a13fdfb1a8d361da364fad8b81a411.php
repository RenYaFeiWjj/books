<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\phpstudy_pro\WWW\study\book\tkbooks\public/../application/books\view\template\info.html";i:1594870961;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $module_data['name']; ?></title>
    <meta name="keywords" content="<?php echo $module_data['keywords']; ?>" />
    <meta name="description" content="<?php echo $module_data['descript']; ?>" />
    <link rel="stylesheet" type="text/css" href="/static/css/style.css">
<style id="faaddaf4-8c99-40cb-95f0-254ac6884838">
    .pb-toast-main {
  z-index: 2147483639 !important;
  position: fixed !important;
  top: -50px !important;
  left: 0px !important;
  width: 100% !important;
  height: 44px !important;
  border: none !important;
  box-shadow: 0 1px 0 0 #b6b4b6 !important;
  transition: top 0.3s;
}

.pb-toast-main-move {
  top: 0px !important;
}

.pb-toast-main-show {
  transition: none;
  top: 0px !important;
}



#pb_jq_tipsWrapper {
  position: fixed !important;
  width: 230px !important;
  background-color: rgba(0, 0, 0, 0.8);
  box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.2);
  font-family: "Lucida Grande", tahoma, verdana, arial, sans-serif !important;
  border-radius: 5px !important;
  color: #ffffff !important;
  z-index: 2147483641 !important;
  padding: 15px !important;
  font-size: 14px !important;
}

#pb_jq_tipsWrapper:before {
  position: absolute !important;
  top: -10px !important;
  right: 60px !important;
  display: inline-block !important;
  border-right: 10px solid transparent !important;
  border-bottom: 10px solid #000 !important;
  border-left: 10px solid transparent !important;
  border-bottom-color: rgba(0, 0, 0, 0.2) !important;
  content: '' !important;
}

#pb_jq_tipsWrapper:after {
  position: absolute !important;
  top: -9px !important;
  right: 60px !important;
  display: inline-block !important;
  border-right: 9px solid transparent !important;
  border-bottom: 9px solid #000 !important;
  border-left: 9px solid transparent !important;
  content: '' !important;
}

#pb-link-copied-message {
  display: none;
  position: fixed;
  width: 90px;
  height: 29px;
  opacity: 0;
  border-radius: 100px;
  background-color: rgba(0, 0, 0, 0.7);
  z-index: 2147483641;
  font-family: "Lucida Grande", tahoma, verdana, arial, sans-serif !important;
  font-size: 13px;
  line-height: 29px;
  text-align: center;
  color: #ffffff;
}</style></head>
<body style="background: rgb(240, 225, 204);">
<input type="hidden" value="<?php echo $chapter_url; ?>" name="chapter_url" />
<div class="readwrap" id="js_rwap" style="display: block;">
    <!--进度-->
    <div class="chaptert">
        <div class="titlebox">
            <!--<p class="titlep fr">阅读到 <span>1%</span></p>-->
            <h3><?php echo $chapter_name; ?></h3>
        </div>
    </div>
    <!--正文阅读-->
    <div class="readcontent">
        <div class="page-style">
            <div class="page-box page_chapter">
                
            <div class="tcontent" c="1" style="min-height: 508px;">
                <h3><?php echo $chapter_name; ?></h3>
                <p class="textpre"><?php echo $text; ?></p>
            </div>

                <!--第二页数据-->


            </div>
        </div>
    </div>
    <!--阅读功能设置-->
    <div class="intercalate">
        <ul class="interul">
            <li class="readcat">
                <a href="#current" class="clset" id="js_clset">目录</a>
            </li>
            <li>
                <a href="<?php echo url('/cover/index',['books_id'=>$books_id]); ?>" class="rdcover" id="js_rdcover">封</a>
            </li>
            <!--上线切换-->
            <li>
                <a href="javascript:;" title="上一章" class="topscol" id="js_top"></a>
            </li>
            <li class="burl">
                <a href="javascript:;" target="_self" title="下一章" class="bootscol" id="js_bot"></a>
            </li>
        </ul>
    </div>
    <!--目录-->
    <div class="catalogbox" id="js_catabox">
        <div class="mlhd">
            <h3>目录</h3>
            <a href="javascript:void(0)" class="mlcolose" id="js_clos"></a>
        </div>
        <div class="chapterbox" id="js_chapbox"><div class="catainner" style="height: 430px;">
            <ul class="nojuul menus">

            </ul>
        </div></div>
    </div>
    
<div class="pcbook_mask"></div>

</div>


<script type="text/javascript" src="/static/js/jq-c0eb42550f.1.11.min.js"></script>
<script type="text/javascript" src="/static/js/jquery-546c1da987.lazyload.min.js"></script>
<script type="text/javascript" src="/static/js/jquery-ui-019252536e.js"></script>
<script>document.write("<script type='text/javascript' src='/static/js/common.js?v=" + Date.now() + "'><\/script>");</script>
<script type="text/javascript" src="/static/js/layer/layer.js"></script>

<!--当页面拉到底部时自动加载下一章-->
<script type="text/javascript">

//当阅读取到底部时自动加载下一章，由于体验效果不佳，暂时弃用
    //定义事件锁，防止重复请求同个章节
//    var is_running = true;
//
//
//    $(window).scroll(function() {
//
//
//            if ($(document).scrollTop() >= $(document).height() - $(window).height()) {
//
//
//                if(is_running == true){
//
//                    is_running = false;
//
//                    /*下一章id*/
//                    var chapter_name = $("input[name='chapter_name']").val();
//                    chapter_name = $.trim(chapter_name);
//                    var books_id = "<?php echo $books_id; ?>";
//
//                    $.post("/info/nextInfo",{chapter_name:chapter_name,books_id:books_id},function(result){
//                        if(result.code=='200'){
//                            /*将下一章内容添加进来*/
//                            var html = '';
//                            html = '<div class="tcontent">';
//                            html +='<h3>'+result.chapter_name+'</h3>';
//                            html +='<p class="textpre">'+result.content+'</p>';
//                            html +='</div>';
//                            $(".page_chapter").append(html);
//
//                            $("input[name='chapter_name']").val(result.chapter_name);
//                            is_running = true;
//                        }
//
//
//                    }, "json");
//
//                }
//
//
//            }
//
//
//
//
//
//    });


$(function () {

       /*下一章id*/
      var chapter_url = $("input[name='chapter_url']").val();
        chapter_url = $.trim(chapter_url);

       var books_id = "<?php echo $books_id; ?>";

    $.post("/info/nextchapter",{chapter_url:chapter_url,books_id:books_id},function(e){
        $("#js_bot").attr("href",e.data);
    },"json");

    /*上一章*/
    $.post("/info/upperchapter",{chapter_url:chapter_url,books_id:books_id},function(e){
        $("#js_top").attr("href",e.data);
    },"json");


    //请求目录
    $.post("/info/ajaxCatalog",{books_id:books_id},function (catalog) {

        var html='';
        $.each(catalog, function (i,n) {

            var chapter_url ="<?php echo $chapter_url; ?>";

            if(base64Encode(chapter_url) == n[1]){
                html+='<li><a href="'+n[1]+'" target="_self" name="current"  style="color:#3ebd98">'+n[0]+'</a></li>'
            }else{
                html+='<li><a href="'+n[1]+'" target="_self"   >'+n[0]+'</a></li>'

            }


        });

        $('.nojuul').html(html);

    },"json");

});

function base64Encode(input){
    var rv;
    rv = encodeURIComponent(input);
    rv = unescape(rv);
    rv = window.btoa(rv);
    return rv;
}


    $("#js_bot").click(function () {
        var href = $(this).attr('href');
        if(href == 'javascript:void(0);'){
            layer.msg('已经是最后一章了');
        }else{
            if(href == 'javascript:;'){
                layer.load(4);
                setTimeout(function(){
                    layer.closeAll('loading');
                }, 2000);
            }

        }
    });

    $("#js_top").click(function () {
        var href = $(this).attr('href');
        if(href == 'javascript:void(0);'){
            layer.msg('已经是第一章了');
        }else{
            if(href == 'javascript:;'){
                layer.load(4);
                setTimeout(function(){
                    layer.closeAll('loading');
                }, 2000);
            }

        }
    });


</script>

</body>
</html>