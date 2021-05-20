<extend file='resource/view/master'/>
<block name="content">
    <style>
        th{
            text-align: center;
        }
    </style>
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href=""><i class="fa fa-cogs"></i>
                分类管理</a>
        </li>
        <li class="active">
            <a href="">添加分类</a>
        </li>
    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#tab1">分类管理</a></li>
        <li><a href="{{u('add')}}">添加分类</a></li>
    </ul>
    <form action="" method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr style="text-align: center">
                        <th width="80">编号</th>
                        <th>分类名称</th>
                        <th width="100">显示顺序</th>
                        <th>是否显示</th>
                        <th>是否团购分类</th>
                        <th width="200">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align: center">
                            <td>分类编号</td>
                            <td>分类名称</td>
                            <td>
                                <input type="text"  class="form-control" name="" value="1">
                            </td>
                            <td>
                                <i class="fa fa-check text-success"></i>
                                <i class="fa fa-times text-danger"></i>
                            </td>
                            <td>非团购分类</td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="">编辑</a></li>
                                        <li class="divider"></li>
                                        <li><a href="">删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <div class="pagination pagination-sm pull-right">
    </div>
</block>