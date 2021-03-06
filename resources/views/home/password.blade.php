<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$project_name}} -  {{wiki_config('SITE_NAME','SmartWiki')}}</title>
    <script src="{{asset('static/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('static/scripts/jquery.form.js')}}"></script>
    <style type="text/css">
        body{ background: #f2f2f2;}
        .d_button{ cursor: pointer;}
        @media(min-width : 450px){
            .auth_form{
                width: 400px;
                border: 1px solid #ccc;
                background-color: #fff;
                position: absolute;
                top: 20%;
                left: 50%;
                margin-left: -220px;
                padding: 20px;
            }

            .tit{
                font-size: 18px;
            }

            .inp{
                height: 30px;
                width: 387px;
                font-size: 14px;
                padding: 5px;
            }

            .btn{
                margin-top: 10px;
                float: right;
            }
        }
        @media(max-width : 449px){
            body{
                margin: 0 auto;
            }

            .auth_form{
                background-color: #fff;
                border-top: 1px solid #ccc;
                border-bottom: 1px solid #ccc;
                width: 100%;
                margin-top: 40px;
            }

            .shell{
                width: 90%;
                margin: 10px auto;
            }

            .tit{
                font-size: 18px;
            }

            .inp{
                height: 30px;
                width: 96.5%;
                font-size: 14px;
                padding: 5px;
            }

            .btn{
                margin-top: 10px;
                float: right;
            }
        }
        .clear{
            clear: both;
        }
        .button {
            color: #fff;
            background-color: #428bca;
            border-radius: 4px;
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid #357ebd;
        }
    </style>
</head>
<body>
<div class="auth_form">
    <div class="shell">
        <form action="{{route('home.check_document_auth')}}" method="post" id="auth_form">
            <input type="hidden" value="{{$project_id}}" name="pid" />
            <div class="tit">
                ?????????????????????
            </div>
            <div style="margin-top: 10px;">
                <input type="password" name="projectPwd" placeholder="????????????" class="inp"/>
            </div>
            <div class="btn">
                <span id="error" style="color: #919191; font-size: 13px;"></span>
                <input type="submit" value="??????" class="button"/>
            </div>
            <div class="clear"></div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $("#auth_form").ajaxForm({
        beforeSerialize: function(){
            var pwd = $("#auth_form input[name='projectPwd']").val();
            if(pwd==""){
                $("#error").html("???????????????");
                return false;
            }
        },
        dataType: "json",
        success: function(res){
            if(res.errcode == 0){
                window.location.reload();
            }else{
                $("#auth_form input[name='projectPwd']").val("");
                $("#auth_form input[name='projectPwd']").focus();
                $("#error").html(res.message);
            }
        }
    });
</script>

<script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>