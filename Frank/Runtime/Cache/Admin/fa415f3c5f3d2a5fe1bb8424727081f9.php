<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>邮政购票后台管理系统</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="http://www.123.com/tp/public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="http://www.123.com/tp/public/asset/admin/common/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="http://www.123.com/tp/public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="http://www.123.com/tp/public/asset/admin/common/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <link href="http://www.123.com/tp/public/css/animate.min.css" rel="stylesheet">
    <link href="http://www.123.com/tp/public/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="http://www.123.com/tp/public/asset/admin/common/css/bootstrap.min.css?v=3.3.0" rel="stylesheet">
    <link href="http://www.123.com/tp/public/asset/admin/common/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <!--公共菜单-->
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>剧目管理</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{U('index/index')}">后台首页</a>
                    </li>
                    <li>
                        <a>剧目详情</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <form method="post" class="form-horizontal" id="add_form" action="">
                            <div class="form-group">
                            <div class="form-group">
                                <!--隐藏表单-->
                                <input type="hidden" class="form-control" name="id" value="">
                                <label class="col-sm-2 control-label"><span style="color: red">*&nbsp;</span>剧目名:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span style="color: red">*&nbsp;</span>封面图片:</label>
                                <div class="col-sm-7">
                                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <div id="image" class="image">
                                        <div id="45" class="goods_img_row">
                                            <a href="{echo tplgetimg($obj.thumb_image)}" target="_blank">
                                                <img src="{echo tplgetimg($obj.thumb_image)}" height="80" width="80" data-img="">
                                            </a>
                                            <div class="del">
                                                <a href="javascript:;" onclick="del(45);return" false;="">
                                                    <i class="fa fa-times" title="删除"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--隐藏表单域-->
                                    <input type="hidden" class="form-control" name="thumb_image" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span style="color: red">*&nbsp;</span>剧目类型:</label>
                                <div class="col-sm-2">
                                    <select  name="dramacategory" class="col-sm-7 form-control" >
                                        <option selected="selected" value="<?php echo ($v['hid']); ?>"><?php echo ($v["title"]); ?></option>
                                        <option value="<?php echo ($v['hid']); ?>"><?php echo ($v["title"]); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span style="color: red">*&nbsp;</span>是否在首页显示:</label>
                                <div class="col-sm-2">
                                    <select  name="display" class="col-sm-7 form-control" >
                                        <option value="0">是</option>
                                        <option { value="1">否</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">演出时间:</label>
                                <div class="col-sm-2">
                                    <input placeholder="请选择演出时间" class="form-control laydate-icon" id="start" name="add_time" readonly><p>微信端剧目介绍时显示，填写最近一期演出时间</p>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span style="color: red">*&nbsp;</span>演出地点:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="theatre"   ><p>微信端剧目介绍时显示，填写最近演出地点</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span style="color: red">*&nbsp;</span>最低票价:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="price"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否赠送优惠卷:</label>
                                <div class="col-sm-2">
                                    <select  name="coupon" class="col-sm-7 form-control" >
                                        <option {if isset($obj)&&$obj.coupon==1}selected{/if} value="1">否</option>
                                        <option {if isset($obj)&&$obj.coupon==0}selected{/if} value="0">是</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">优惠卷名称:</label>
                                <div class="col-sm-2">
                                    <input type="text"placeholder="" class="form-control" name="title" >注：优惠卷名称只有在选择优惠卷为"是"的时候才填写。
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">优惠金额:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="money"   > 注：优惠金额只有在选择优惠卷为"是"的时候才填写。
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span style="color: red">*&nbsp;</span>剧目描述:</label>
                                <div class="col-sm-7">
                                    <div class="ibox-content no-padding">
                                        <!--{if isset($obj.content)}<?php echo ($obj["content"]); ?>{/if}-->
                                        <textarea type="text" id="content" name="content" style="width: 100%; height: 400px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
                                    <a class="btn btn-white" href="javascript:history.go(-1);">返回</a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Mainly scripts -->
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

<script>
    $(document).ready(function() {
        //实例化编辑器
        UM.getEditor('content');
        var validator = $("#add_form").submit(function () {
            UM.getEditor('content').sync();
        }).validate({
            ignore: "",
            rules: {
                area: "required",
                price: "required",
                theatre: "required",
                name: {
                    required:true,
                    maxlength: 25
                },
                add_time: "required",
                content: "required"

            },
            messages: {
                name: {
                    required: "请填写剧目名",
                    maxlength: "剧目名长度不能超过25，超过的字符将自动截取"
                },
                content:"请填写剧目描述",
                price:"请填写票价",
                theatre:"请填写演出地点",
                add_time:"请填写时间"
            }

        });
        validator.focusInvalid = function() {
            if( this.settings.focusInvalid ) {
                try {
                    var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
                    if (toFocus.is("textarea")) {
                        UM.getEditor('content').focus()
                    } else {
                        toFocus.filter(":visible").focus();
                    }
                } catch(e) {
                }
            }
        }
    });
    $(function() {
        $('#file_upload').uploadify({
            'onInit': function () { //载入时触发，将flash设置到最小
                $("#file_upload-queue").hide();
            },
            'queueSizeLimit': 1,
            'simUploadLimit': 1,
            'buttonClass': 'btn btn-primary btn-sm',
            'fileDataName' : 'file',
            'fileTypeDesc' : 'Image Files',					//类型描述
            //'removeCompleted' : false,    //是否自动消失
            'fileTypeExts' : '*.gif; *.jpg; *.png',		//允许类型
            'fileSizeLimit' : '2MB',					//允许上传最大值
            'swf'      : '/uploadify/uploadify.swf',	//加载swf
            'uploader' : '/common/uploadify/index',					//上传路径
            'buttonText' :'图片上传', //按钮的文字
            'overrideEvents': ['onSelectError', 'onDialogClose'],
            //返回一个错误，选择文件的时候触发
            'onSelectError': function (file, errorCode, errorMsg) {
                switch (errorCode) {
                    case -100:
                        alert("上传的文件数量已经超出系统限制的" + $('#file_upload').uploadify('settings', 'queueSizeLimit') + "个文件！");
                        break;
                    case -110:
                        alert("文件 [" + file.name + "] 大小超出系统限制的" + $('#file_upload').uploadify('settings', 'fileSizeLimit') + "大小！");
                        break;
                    case -120:
                        alert("文件 [" + file.name + "] 大小异常！");
                        break;
                    case -130:
                        alert("文件 [" + file.name + "] 类型不正确！");
                        break;
                }
                return false;
            },
            'onUploadStart' : function(file) {
                toastr.success('正在上传，注意上传成功提示！', "请等待");
                toastr_tip();
            },
            'onUploadSuccess' : function(file, data, response) {			//成功上传返回
                toastr.success('上传成功！', "已上传！");
                toastr_tip();
                var n=parseInt(Math.random()*100);								//100以内的随机数
                //alert(n+data);
                //插入到image标签内，显示图片的缩略图
                //console.log(data);
                var obj = JSON.parse(data);
                $('#image').html('<div id="'+n+'" class="goods_img_row"><a href="/data/attachment'+obj.file.resize_path+'"  target="_blank"><img src="/data/attachment'+obj.file.size_100x100+'"  height=80 width=80 data-img="/data/attachment'+obj.file.resize_path+'" /></a><div class="del"><a href="javascript:vo(0)" onclick=del("'+n+'");return false;><i class="fa fa-times" title="删除"></i></a></div></div>')
                //往表单里追加内容
                $('input[name=thumb_image]').val(obj.file.resize_path);
            }

        });
    });
    function del(delName){
        var d='#'+delName;
        $(d).remove();
        $('input[name=thumb_image]').val('');
    }

    /**
     * toastr 提示
     */
    function toastr_tip(){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
</script>
<script>
    $(function(){

        myEvent();



    });
    //剧场票价选择展示

    function drawArea(data){
        var myData = data.data.list;

        if(myData==null || myData == undefined || myData == "")
            return false;

        for(var j=0; j<myData.length; j++){

            var name = myData[j].jyname;
            var _item2 = "";
            $(".jC").each(function(){
                if($(this).attr("data-area") == name ){

                    if(myData[j].area == null || myData[j].area == "" || myData[j].area == undefined)
                        return true;

                    _item2 += '<div class="form-group">';
                    _item2 += '<div class="col-sm-2"></div>';
                    _item2 += '<div class="col-sm-1">';
                    _item2 += '<input type="text" class="form-control tCenter" name="area-type[]" value="'+myData[j].area+'"  readonly>';
                    _item2 += '</div>';
                    _item2 += '<div class="col-sm-1">';
                    _item2 += '<input type="text" class="form-control tCenter " name="area-prize[]">';
                    _item2 += '</div>';

                    $(this).find(".area-c").append(_item2);
                }

            })

        }


        myEvent();
    }

    function myEvent(){
        $('#theatre').unbind("change").change(function(){
            var index = $(this).children('option:selected').index();
            $('.jC').eq(index).show(0).siblings('.jC').hide(0);
        });

        $('.jC').hide(0);
        $('.jC').first().show(0);
    }

    //新增套票
    $(document).on('click','.tAdd',function(){
        var ltNum = $.trim($(this).parent().siblings('.col-sm-1').find('.tNum').val());
        if(ltNum == null || ltNum =='' || ltNum == undefined){
            layer.msg('请先填写套票数量');
            $('#tPbig .tNum:last-child').focus();
            return false;
        }

        var ltZk = $.trim($(this).parent().siblings('.col-sm-1').find('.tZk').val());
        if(ltZk == null || ltZk =='' || ltZk == undefined){
            layer.msg('请先填写套票折扣');
            $('#tPbig .tZk:last-child').focus();
            return false;
        }

        $(this).hide(0);
        var str = '';
        str += '<div class="col-sm-7 col-md-offset-2 tMt10">';
        str += '<span class="tDinb tLh34 tL">套票数量</span>';
        str += '<div class="col-sm-1 tDinb tL">';
        str += '<input type="text" class="form-control tCenter tNum" name="package_number[]">';
        str += '</div>';
        str += '<span class="tDinb tLh34 tL">张，折扣</span>';
        str += '<div class="col-sm-1 tDinb tL">';
        str += '<input type="text" class="form-control tCenter tZk" name="package_discount[]">';
        str += '</div>';
        str += '<span class="tDinb tLh34 tL">折</span>';
        str += '<div class="col-sm-1 tDinb tL">';
        str += '<a href="javascript:;" class="btn btn-w-m btn-primary tAdd">+新增</a>';
        str += '</div>';
        str += '</div>';
        $('#tPbig').append(str);
    });

    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD hh:mm:ss',
        min: '<?php echo ($times); ?>', //设定最小日期为当前日期
        max: '2099-06-16 23:59:59', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
        }
    };
    laydate(start);

    var area = '';
    var prizes = $("input[name='area-prize']");
    $("input[name='area-type']").each(function(i,v){
        var type = $(this).val();
        var prize = prizes.eq(i).val();
        area +=  type +'-'+ prize +"|"  ;
    });

</script>
</body>

</html>