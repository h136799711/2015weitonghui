<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo ($vote["title"]); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width,height=device-height,maximum-scale=1.0,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="<?php echo ($vote["title"]); ?>">
        <!--
        <link href="/Public/static/vote/wap/css/custom.css?v=1.0.1" rel="stylesheet">
        <link href="/Public/static/vote/wap/skins/all.css?v=1.0.1" rel="stylesheet"> -->
        <link href="/Public/static/vote/wap/vote.css" rel="stylesheet">
        <!--link href="/Public/static/vote/wap/vote.css" rel="stylesheet"-->
        <script src="/Public/static/vote/wap/js/jquery.js"></script>
        <!-- <script src="/Public/static/vote/wap/icheck.js?v=1.0.1"></script> -->
        <script src="/Public/static/vote/wap/jquery.icheck.min.js"></script>
        <style>#vote-img li {width: 50%;float: left;}
        .votecontent .disabled{background: #a9a9a9;border-color: #a1a1a1;}
        .beizhu {
            background-color: #FFF5C5;
            border: 1px solid #EDE17E;
            border-radius: 5px;
            box-shadow: 0 1px 1px #F6F6F6;
            color: #BCA24B;
            font-size: 14px;
            line-height: 22px;
            margin: 11px 0 8px;
            padding: 4px 10px 5px;
            text-align: center;
        }
        .deploy_ctype_tip{z-index:1001;width:100%;text-align:center;position:fixed;top:50%;margin-top:-23px;left:0;}.deploy_ctype_tip p{display:inline-block;padding:13px 24px;border:solid #d6d482 1px;background:#f5f4c5;font-size:16px;color:#8f772f;line-height:18px;border-radius:3px;}
        .pxbtn{
        width: 100%;
        }
        </style>
    </head>
    <body id="vote-<?php echo ($vote['type']); ?>" class="wrap" style="width:100%;margin:0 auto;">
        <div class="vote">
            <div class="layout clear div_test">
                <div class="skin skin-line">
                    <!--div class="skin-section"-->
                    <div  class="votecontent">
                        <h2><?php echo ($vote["title"]); ?></h2>
                        <span class="date"><?php echo (date("Y-m-d",$vote["statdate"])); ?> / <?php echo (date("Y-m-d",$vote["enddate"])); ?></span><?php echo ($vote['info']); ?>
                        <p class="modus"><?php echo ($vote['info']); ?></p>
                        <br/>
                        <?php if(($vote['picurl'] != '') AND ($vote['showpic'] == 1) ): ?><p><img src="<?php echo ($vote["picurl"]); ?>" style="width:100%;" /></p><?php endif; ?>
                        <p class="modus"> <?php if($vote['cknums'] == 1): ?>单选<?php else: ?>多选<?php endif; ?>投票，<span class="number">共有<?php echo ($count); ?> 人参与投票</span></p>
                        <br/>
                        <!--投票选项开始-->
                        <ul class="list">
                            <?php if(is_array($vote_item)): $i = 0; $__LIST__ = $vote_item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i; if($vote['cknums'] == 1): ?><!--单选投票开始-->
                            <?php if($vote['type'] == 'text'): ?><!--单选 文字投票开始-->
                            <li>
                                <label for="square-checkbox-<?php echo ($i); ?>">
                                    <input tabindex="<?php echo ($i); ?>" name="vid[]"   value="<?php echo ($li["id"]); ?>" type="radio" id="square-checkbox-<?php echo ($i); ?>" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins><span><?php echo ($li["item"]); ?></span></label>
                                <div id="voteshow<?php echo ($i); ?>" class="votebar"><div class="pbg"><div style="width: <?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%;background-color:#ffcc00" class="pbr"></div></div><span class="percentage" style="color:#ffcc00"><?php echo ($li["per"]); ?>%<span class="user">(<?php echo ($li['pro']); ?>)</span></span>
                            </div>

                        </li>
                        <?php else: ?>
                        <!--单选 图片投票开始-->
                        <li>
                            <label for="square-checkbox-<?php echo ($i); ?>">
                                <a href="<?php echo ($li["tourl"]); ?>"><img src="<?php echo ($li["startpicurl"]); ?>" heigth="260" style="width:100%;max-height:720px;"></a>
                                <input tabindex="<?php echo ($i); ?>" name="vid[]"   value="<?php echo ($li["id"]); ?>" type="radio" id="square-checkbox-<?php echo ($i); ?>" style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins><span><?php echo ($li["item"]); ?></span></label>
                            <div id="voteshow<?php echo ($i); ?>" class="votebar"><div class="pbg"><div style="width: <?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%;background-color:#ffcc00" class="pbr"></div></div><span class="percentage" style="color:#ffcc00"><?php echo ($li["per"]); ?>%<span class="user">(<?php echo ($li['pro']); ?>)</span></span>
                        </div>
                        <!--
                                            <span><a href="<?php echo ($li["tourl"]); ?>"><img src="<?php echo ($li["startpicurl"]); ?>" heigth="260" style="width:100%;max-height:720px;"></a></span>
                                            <input tabindex="<?php echo ($i); ?>" type="radio" name="vid" value="<?php echo ($li["id"]); ?>" id="line-radio-<?php echo ($i); ?>">
                                            <label for="line-radio-<?php echo ($i); ?>"><?php echo ($li["item"]); ?></label>
                                            <div class="progress-bar orange shine">
                                                <span style="width: <?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%"><?php echo ($li["per"]); ?>%</span>&nbsp; &nbsp;<span><?php echo ($li['pro']); ?>(人)</span>
                                                <div class="vote_result_meta vote_graph">
                                <span style="width:<?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%;background-color:#<?php echo rand(100000,999999);?>" class="vote_progress"></span>
                            </div>
                        </div> -->
                    </li><?php endif; ?>
                    <?php else: ?><!--多选 投票开始-->
                    <?php if($vote['type'] == 'text'): ?><!--多选 文字投票开始-->
                    <li>
                        <label for="line-checkbox-<?php echo ($i); ?>"><input class="ckbx" tabindex="<?php echo ($i); ?>" name="vid[]" value="<?php echo ($li['id']); ?>" type="checkbox" id="line-checkbox-<?php echo ($i); ?>" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins><span><?php echo ($li["item"]); ?></span></label>
                        <!-- <div class="progress-bar orange shine">
                                            <span style="width: <?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%"><?php echo ($li["per"]); ?>%</span>&nbsp; &nbsp;<span><?php echo ($li['pro']); ?>(人) </span>
                                            <div class="vote_result_meta vote_graph">
                                <span style="width:<?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%;background-color:#<?php echo rand(100000,999999);?>" class="vote_progress"></span>
                            </div>
                        </div> -->

                    </li>
                    <?php else: ?> <!--多选 图片投票开始-->
                    <li>

                        <label for="square-checkbox-<?php echo ($i); ?>">
                            <a href="<?php echo ($li["tourl"]); ?>"><img src="<?php echo ($li["startpicurl"]); ?>" heigth="260" style="width:100%;max-height:720px;"></a>
                            <input tabindex="<?php echo ($i); ?>" name="vid[]"   value="<?php echo ($li["id"]); ?>" type="checkbox" id="square-checkbox-<?php echo ($i); ?>" style="position: absolute; opacity: 0;">
                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; background-position: initial initial; background-repeat: initial initial;"></ins><span><?php echo ($li["item"]); ?></span></label>
                        <div id="voteshow<?php echo ($i); ?>" class="votebar"><div class="pbg"><div style="width: <?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%;background-color:#ffcc00" class="pbr"></div></div><span class="percentage" style="color:#ffcc00"><?php echo ($li["per"]); ?>%<span class="user">(<?php echo ($li['pro']); ?>)</span></span>
                    </div>
                    <!--     <span><a href="<?php echo ($li["tourl"]); ?>"><img src="<?php echo ($li["startpicurl"]); ?>" heigth="260" style="width:100%;max-height:720px;" ></a></span>
                                
                                    <input tabindex="<?php echo ($i); ?>" type="checkbox" name="vid" value="<?php echo ($li["id"]); ?>"  id="line-checkbox-<?php echo ($i); ?>">
                                    <label for="line-checkbox-<?php echo ($i); ?>"><?php echo ($li["item"]); ?></label>
                                    <div class="progress-bar orange shine">
                                        <span style="width: <?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%"><?php echo ($li["per"]); ?>%</span>&nbsp; &nbsp;<span><?php echo ($li['pro']); ?>(人)</span>
                                        <div class="vote_result_meta vote_graph">
                            <span style="width:<?php echo ((isset($li["per"]) && ($li["per"] !== ""))?($li["per"]):0); ?>%;background-color:#<?php echo rand(100000,999999);?>" class="vote_progress"></span>
                        </div>
                    </div> -->
                </li><?php endif; endif; ?> <!--投票结束--><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>


            <?php
 if($vote['enddate'] < time()){ ?>
            <br/> 投票已经结束<br/>
            <?php
 }elseif($vote['statdate'] > time()){ echo " 投票还没正式开始"; }else{ if($vote_record == 1){ ?>
            <a href="javascript:showTip('请不要重复投票');" class="pxbtn disabled">您已经投过票了</a>
            <p class="beizhu" style="color: coral;">您投的是：<?php if(is_array($hasitems)): $i = 0; $__LIST__ = $hasitems;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo['item']); ?>,<?php endforeach; endif; else: echo "" ;endif; ?></p>
            <?php
 }else{ ?>
            <input class="pxbtn" name="sub" id="sub" value="提交选票" type="submit">
            <?php
 } } ?>
            <br/><br/>
        </div>
    </div>
</div>
</div>
<script>  $(document).ready(function(){
    $('.list input').each(function(){
    var self = $(this),
        label = self.next(),
        label_text = label.text();
        label.remove();
    self.iCheck({
        checkboxClass: 'icheckbox_flat',
        radioClass: 'iradio_flat',
        insert: '<div class="icheck_line-icon"></div>' + label_text
    });
    });
$("#sub").bind("click",function(){
    var self = $(this);
    var chk = document.getElementsByName('vid[]');
    var objarray = chk.length;
    var chid = "";
    var wecha_id = "{gr-I('wecha_id')}";
    var token  = "{gr-I('token')}";
    var tid = "<?php echo ($_GET['id']); ?>";
    for (i=0;i<objarray;i++)
    {
    if(chk[i].checked == true)
    {
        chid+=chk[i].value+",";
    }
    }
    if(wecha_id == ''){
    showTip("您可能是从分享页面打开的，请关注“<?php echo ($wxuser['weixin']); ?>”然后发送关键词“投票”进行投票");
    return;
    }
    if(chid == ""){
    showTip("请选择投票的选项");
    return;
    }else{
        var submitData={
            wecha_id : wecha_id,
                tid      : tid,
                chid     : chid,
                token    : token,
            action   : "add_vote"
        };
        
        $.post("<?php echo U('Wap/Vote/add_vote');?>"+'?token='+token+'&wecha_id='+wecha_id, submitData, function(backdata) {
        // console.log(backdata);
        // var obj=eval('('+backdata+')');
        // console.log(obj)
            showTip(backdata.info);
            setTimeout(function(){window.location.reload()},2000);
            return;
        },"json");
    }
});
});
function showTip(tipTxt) {
var div = document.createElement('div');
div.innerHTML = '<div class="deploy_ctype_tip"><p>' + tipTxt + '</p></div>';
var tipNode = div.firstChild;
$(".wrap").after(tipNode);
setTimeout(function () {
    $(tipNode).remove();
}, 1500);
}
</script>
<script type="text/javascript">
window.shareData = {
            "moduleName":"Vote",
            "moduleID":"0",
            "imgUrl": "<?php echo ($vote["picurl"]); ?>",
            "sendFriendLink": "<?php echo C('site_url'); echo U('Vote/index',array('token'=>$token,'id'=>$id));?>",
            "tTitle": "{<?php echo ($vote["title"]); ?>",
            "tContent": "<?php echo (html_entity_decode($vote['info'])); ?>"
        };
</script>
<?php echo ($user); ?>
<?php echo ($shareScript); ?>
</body>
</html>