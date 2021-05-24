<extend file='resource/view/master'/>
<block name="content">
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href=""><i class="fa fa-cogs"></i>
                分类管理</a>
        </li>
        <li class="active">
            <a href="">添加子分类</a>
        </li>

    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="{{u('index')}}">分类首页</a></li>
        <li class="active"><a href="">添加子分类</a></li>
    </ul>
    <form class="form-horizontal" id="form" action="" method="post" onsubmit="return addSon()">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">分类管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="cname"  class="form-control" placeholder="请填写分类名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">所属分类</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single form-control" name="pid">
                            <option value="{{$cateData['cid']}}">{{$cateData['cname']}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">分类标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="ctitle"  class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类描述</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" name="cdes" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类关键字</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" name="ckeywords" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">分类排序</label>
                    <div class="col-sm-9">
                        <input type="number" name="csort"  class="form-control" placeholder="请填写分类名称">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
</block>
<script>
    function addSon()
    {
        var data = $('#form').serialize();
        //res返回的数据：{valid:0,message:'提示信息'}
        $.post("{{u('addSon')}}",data,function(res){
            if(res.valid)
            {//成功
                //参数：提示消息，跳转地址，成功/失败
                util.message(res.message,"{{u('index')}}",'success');
            }else{
                util.message(res.message,"",'error');
            }
        },"json")
        return false;
    }
</script>
