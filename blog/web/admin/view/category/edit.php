<extend file='resource/view/master'/>
<block name="content">
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href=""><i class="fa fa-cogs"></i>
                分类管理</a>
        </li>
        <li class="active">
            <a href="">编辑分类</a>
        </li>

    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="{{u('index')}}">分类首页</a></li>
        <li class="active"><a href="">分类编辑</a></li>
    </ul>
    <form class="form-horizontal" id="form" action="" method="post" onsubmit="return edit()">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">分类管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$oldData['cname']}}" name="cname"  class="form-control" placeholder="请填写分类名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">所属分类</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single form-control" name="pid">
                            <option value="0">顶级分类</option>
                            <foreach from="$cateData" key="$k" value="$v">
                                <option value="{{$v['cid']}}">{{$v['_cname']}}</option>
                            </foreach>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">分类标题</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$oldData['ctitle']}}" name="ctitle"  class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类描述</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" name="cdes" >{{$oldData['cdes']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类关键字</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" name="ckeywords" >{{$oldData['ckeywords']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label" >分类排序</label>
                    <div class="col-sm-9">
                        <input type="number" value="{{$oldData['csort']}}" name="csort"  class="form-control" placeholder="请填写分类名称">
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="cid" value="{{q('get.cid')}}">
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
</block>
<script>
    function edit()
    {
        var data = $('#form').serialize();
        //res返回的数据：{valid:0,message:'提示信息'}
        $.post("{{u('edit')}}",data,function(res){
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
