<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>铜梁妇幼保健院</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="http://www.123.com/tp/public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="http://www.123.com/tp/public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="http://www.123.com/tp/public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="http://www.123.com/tp/public/css/animate.min.css" rel="stylesheet">
    <link href="http://www.123.com/tp/public/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <style>
        a{
            color: grey;
        }
    </style>
</head>

<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" role="form" id="edit" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">医院名称</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="name" value="<?php echo ($data["name"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">医院封面图</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly name="yz_img" value="">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary cover_upimg_but">上传</button>
                                    </span>
                                    <span class="up_loading"></span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">医院简介</label>
                            <div class="col-lg-8">
                                <textarea id="container" name="content" type="text/plain"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="hidden" name="id" value="<?php echo ($gid); ?>">
                                <button class="btn btn-primary" type="submit">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="http://www.123.com/tp/public/asset/admin/common/js/jquery-2.1.1.min.js"></script>
<script src="http://www.123.com/tp/public/asset/admin/common/js/bootstrap.min.js?v=3.3.0"></script>
<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="http://www.123.com/tp/public/asset/admin/common/js/hplus.js?v=2.0.0"></script>
<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/pace/pace.min.js"></script>

<script type="text/javascript" src="http://www.123.com/tp/public/asset/admin/common/uploadify/jquery.uploadify.min.js"></script>
<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/layer/laydate/laydate.js"></script>
<!--tip提示-->
<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/toastr/toastr.min.js"></script>
<!-- edit -->
<script type="text/javascript" charset="utf-8" src="http://www.123.com/tp/public/asset/admin/common/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://www.123.com/tp/public/asset/admin/common/umeditor/umeditor.min.js"></script>
<!-- jQuery Validation plugin javascript-->
<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/validate/jquery.validate.min.js"></script>
<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/validate/messages_zh.min.js"></script>

<script src="http://www.123.com/tp/public/asset/admin/common/js/plugins/layer/layer.min.js"></script>
<script src="http://www.123.com/tp/public/js/jquery.min.js?v=2.1.4"></script>
<script src="http://www.123.com/tp/public/js/bootstrap.min.js?v=3.3.6"></script>
<script src="http://www.123.com/tp/public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="http://www.123.com/tp/public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="http://www.123.com/tp/public/js/plugins/layer/layer.min.js"></script>
<script src="http://www.123.com/tp/public/js/hplus.min.js?v=4.1.0"></script>
<script type="text/javascript" src="http://www.123.com/tp/public/js/contabs.min.js"></script>
<script src="http://www.123.com/tp/public/js/plugins/pace/pace.min.js"></script>
<script>
    $(document).ready(function () {
        laydate({
            elem: '#start_time',
            format: 'YYYY-MM-DD',
            min: '{echo date("Y-m-d",time());}',
            max: '2099-06-16',
            istoday: true,
            choose: function (datas) {

            }
        });
        laydate({
            elem: '#end_time',
            format: 'YYYY-MM-DD',
            min: '{echo date("Y-m-d",time());}',
            max: '2099-06-16',
            istoday: true,
            choose: function (datas) {

            }
        });
        var index = parent.layer.getFrameIndex(window.name);
        UE.getEditor('container',{
            autoHeight: false,
            initialFrameHeight: 300,
        });
        $("form#edit").validate({
            rules: {
                title: {
                    required: true
                },
                thumb:{
                    required: true
                },
                number:{
                    required: true,
                    digits: true
                },
                integral:{
                    required: true,
                    digits: true
                },
                type:{
                    required: true
                },
                intro:{
                    required: true
                },
                content:{
                    required: true
                },
                get_way:{
                    required: true
                },
                use_type:{
                    required: true
                }


            },
            messages: {
                title: {
                    required: '请填写标题'
                },
                thumb:{
                    required: '请上传封面图'
                },
                number:{
                    required: '请填写商品数量',
                    digits: '只能正整数'
                },
                integral:{
                    required: '请填写兑换积分',
                    digits: '只能正整数'
                },
                type:{
                    required: '请选择商品分类'
                },
                intro:{
                    required: '请填写商品简介'
                },
                content:{
                    required: '请填写商品详情'
                },
                get_way:{
                    required: '请填写领取方式说明'
                },
                use_type:{
                    required: '请选择使用方式'
                }

            },
            // Form Processing via AJAX
            submitHandler: function(form){
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                $.ajax({
                    url: "{U('edit_goods')}",
                    method: 'POST',
                    dataType: 'json',
                    data: $("form").serialize(),
                    success: function(json){
                        if(json.status == true){
                            localStorage.edit_bankgoods = 1;//主要用于回调的时候检查是否成功 成功刷新
                            parent.toastr.success(json.msg, "恭喜您!!", opts);
                            parent.layer.close(index); //执行关闭

                        }else{
                            toastr.error(json.msg, "出错啦!!", opts);
                        }
                    },
                    error: function(json){
                        toastr.error(json.msg, "出错啦!!", opts);
                    }

                });
            }
        });

        //扩展图片上传
        $(".upimg_but").click(function(){
            if($("input[name='ext_img[]']").length >= 4){
                toastr.error('最多只能上传4张扩展图片', '出错啦!');
                return false;
            }
            ajaxupload('cover', 'image', function(json) {
                var path    = json.file.path;   //原始图片路径
                toastr.success(json.msg, "恭喜上传成功！");
                var html = '';
                html += '<div class="input-group ext_img_div">';
                html += '<input type="text" name="ext_img[]" readonly class="form-control" value="'+path+'">';
                html += '<span class="input-group-btn">';
                html += '</span>';
                html += '<span class="input-group-btn">';
                html += '<button type="button" class="btn btn-primary move_ext_img">移除</button>';
                html += '</span>';
                html += '</div>';

                //追加到扩展图下面
                $('.ext_img').append(html);
                $(html).insertAfter($(".upimg_but").prev());
            })
        });
        //封面上传
        $(".cover_upimg_but").click(function(){
            ajaxupload('cover', 'image', function(json) {
                var path    = json.file.path;   //原始图片路径
                toastr.success(json.msg, "恭喜上传成功！");
                $(".cover_upimg_but").parent().siblings('input').val(path);
            })
        });
        //移除扩展图片
        $(document).on("click", ".move_ext_img", function(){
            $(this).parent().parent().remove();
        });
        //重置时间为0
        $('.reset_zero').click(function(){
            $('.start_time').val(0);
        });
        $('.reset_zero1').click(function(){
            $('.end_time').val(0);
        });
        // Set Form focus
        $("form#edit .form-group:has(.form-control):first .form-control").focus();
    });
    $("form").submit(function(){
        window.close();
    });

</script>
</body>

</html>