<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>    <title>快学网后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="http://127.0.0.1/php/myspl/blog/resource/hdjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://127.0.0.1/php/myspl/blog/resource/css/site.css" rel="stylesheet">
    <link href="http://127.0.0.1/php/myspl/blog/resource/hdjs/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://127.0.0.1/php/myspl/blog/resource/hdjs/js/jquery.min.js"></script>
    <script src="http://127.0.0.1/php/myspl/blog/resource/hdjs/app/util.js"></script>
    <script src="http://127.0.0.1/php/myspl/blog/resource/hdjs/require.js"></script>
    <script src="http://127.0.0.1/php/myspl/blog/resource/hdjs/app/config.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i {
            color: #337ab7;
        }
    </style>
</head>
<body>
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="" style="color: white;margin-left: -14px">C70博客系统</a></h4>
                <div class="navbar-header">
                    <ul class="nav navbar-nav">

                        <li>
                            <a href="http://doc.hdphp.com" target="_blank"><i class="fa fa-w fa-file-code-o"></i> 在线文档</a>
                        </li>
                        <li>
                            <a href="http://fontawesome.dashgame.com/" target="_blank"><i class="fa fa-w fa-hand-o-right"></i>   图标库</a>
                        </li>
                        <li>
                            <a href="http://bbs.houdunwang.com" target="_blank"><i class="fa fa-w fa-forumbee"></i> 论坛讨论</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                                                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://127.0.0.1/php/myspl/blog/index.php?s=admin/login/changePass">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="http://127.0.0.1/php/myspl/blog/index.php?s=admin/Login/out">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="panel panel-default" id="menus" >
                <!--学员管理菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">学员管理菜单</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample">
                    <a href="" class="list-group-item" >
                        <i class="fa fa-male" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        学员管理
                    </a>
                </ul>
                <!--学员管理菜单 end-->

                <!--课程管理菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">课程管理菜单</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample2">
                    <a href="" class="list-group-item" >
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        阶段课程
                    </a>
                    <a href="" class="list-group-item" >
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        碎片课程
                    </a>
                </ul>
                <!--课程管理菜单 end-->

                <!--网站配置管理菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">网站配置菜单</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample3">
                    <a href="" class="list-group-item" >
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        系统配置
                    </a>
                </ul>
                <!--网站配置管理菜单 end-->
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">
            
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href="javascript:;"><i class="fa fa-cogs"></i>
                密码管理</a>
        </li>
        <li class="active">
            <a href="javascript:;">修改密码</a>
        </li>
    </ol>
    <form onsubmit="return changePass()" class="form-horizontal" id="form" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">修改密码</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">原始密码</label>
                    <div class="col-sm-9">
                        <input required type="text" name="password"  class="form-control" placeholder="请填写原始密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-9">
                        <input required type="text" name="new_password"  class="form-control" placeholder="请填写新密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-9">
                        <input required type="text" name="confirm_password"  class="form-control" placeholder="请填写确认密码">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    <input type='hidden' name='__TOKEN__' value='8f08797a658610bb1ab0ce9158c07bc8'/></form>

        </div>
    </div>
</div>
<div class="master-footer" style="margin-top: 150px">
    <a href="http://www.houdunwang.com">高端培训</a>
    <a href="http://www.hdphp.com">开源框架</a>
    <a href="http://bbs.houdunwang.com">后盾论坛</a>
    <br>
    Powered by hdphp v2.0 © 2016-2022 www.hdphp.com
</div>
</body>
</html>
<script>
    require(['bootstrap'],function($){})
</script>

<script>
    function changePass()
    {
        var data = $("#form").serialize();
        //$.post('请求地址',{发送数据},返回值,返回值的数据类型)
        //原生写法
        $.post("<?php echo u('login.changePass')?>",data,function(res){
            if(res.valid)
            {//如果成功
                util.message(res.message,'index.php?s=admin/Login/index','success');
            }else{
                util.message(res.message,'back','error');
            }
        },"json")
        return false;
    }
</script>

