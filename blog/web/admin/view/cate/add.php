<extend file='resource/view/master'/>
<block name="content">
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="">分类管理</a></li>
        <li class="active"><a href="">添加分类</a></li>
    </ul>
    <form class="form-horizontal" id="form" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">分类管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="cate_title" required class="form-control" placeholder="请填写分类名称">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">是否显示</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" value="1" name="cate_isshow" checked="checked"><i></i> 显示
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="2" name="cate_isshow"><i></i> 不显示
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">下拉菜单</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single form-control" name="goods_cate_cid">
                            <option value="0">请选择分类</option>
                                <option value="">下拉1</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">海报图</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="goods_poster" readonly="" value="{{$field['thumb']}}">
                            <div class="input-group-btn">
                                <button onclick="upImage1(this)" class="btn btn-default" type="button" onclick="upImage1(this)">选择图片
                                </button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{$field['thumb']?:'resource/images/nopic.jpg'}}" class="img-responsive img-thumbnail haibao"
                                 width="150">
                        </div>
                        <span class="help-block">建议大小(宽100高100)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">多图上传</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="goods_poster" readonly="" value="{{$field['thumb']}}">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <div id="box"></div>
                        </div>
                        <span class="help-block">建议大小(宽100高100)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">商品详情</label>
                    <div class="col-sm-9">
                        <textarea id="container" name="goods_describe" style="height:300px;width:100%;"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">城市选择</label>
                    <div class="col-sm-9">
                        <select name="address[province]"></select>
                        <select name="address[city]"></select>
                        <select name="address[area]"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">列表日期选择</label>
                    <div class="col-sm-9">
                        <select name="birthyear" ></select>
                        <select name="birthmonth"></select>
                        <select name="birthday" ></select>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>

</block>
<script>
    //上传
    function upImage1(obj) {
        require(['util'], function (util) {
            util.image(function (images) {
                $("[name='goods_poster']").val(images[0]);
                $(".haibao").attr('src', images[0]);
            }, {})
        })
    }
    //百度编辑器
    util.ueditor('container', {}, function (editor) {
        //这是回调函数 editor是百度编辑器实例
    });
</script>
<script>
    //上传图片
    function upImage(obj) {
        require(['util'], function (util) {
            options = {
                //上传多图
                multiple: true,
            };
            util.image(function (images) {
                $(images).each(function(k,v){
                    $("<img src='"+v+"'/>").appendTo('#box');
                })
            }, options)
        });
    }
</script>
<script>
    require(['address'], function (a) {
        a.render({
            //省份标签
            province: document.querySelector('[name="address[province]"]'),
            //城市标签
            city: document.querySelector('[name="address[city]"]'),
            //地区标签
            area: document.querySelector('[name="address[area]"]'),
        }, {
            //默认省
            province: '福建省',
            //默认市
            city:'厦门市',
            //默认地区
            area:'海沧区',
        });
    })
</script>
<script>
    util.date_picker(
        {
            year: document.querySelector('[name="birthyear"]'),//年select表单
            month: document.querySelector('[name="birthmonth"]'),//月表单
            day: document.querySelector('[name="birthday"]'),//日表单
        },
        {
            year: 1998,//初始年
            month:7,//初始月
            day:20,//初始日
        }
    );
</script>