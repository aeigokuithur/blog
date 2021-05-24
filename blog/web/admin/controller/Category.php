<?php  namespace web\admin\controller;

class Category extends Common{
	protected $db;
	public function __construct()
	{
		parent::__construct();
		$this->db = new \system\model\Category();
	}
    //动作
	public function index(){
		//获取首页数据
		$data = Data::tree($this->db->get(),'cname');
//        分配变量
		View::with('data',$data)->make();
	}
	//顶级分类管理的添加
	public function add(){
		if (IS_POST){
			if ($this->db->store()){
				message('添加成功','','success');
			}
			message($this->db->getError(),'','error');
		}
		View::make();
	}
//	子类添加
	public function addSon(){
		$cid = q('get.cid',0,'intval');
		if (IS_POST){
			if ($this->db->store()){
				message('添加成功','','success');
			}
			message($this->db->getError(),'','error');
		}
        //获取所属分类（父级分类）
        //field,获取指定字段的数据
		$cateData = $this->db->where('cid',$cid)->field(['cid','cname'])->first();
		View::with('cateData',$cateData)->make();
	}
//    编辑
    public function edit(){
        if(IS_POST){
            if ($this->db->edit()){
                message('修改成功','','success');
            }
            message($this->db->getError(),'','error');
        }
        $cid = q('get.cid',0,'intval');
        //获取旧数据
        $oldData = $this->db->where('cid',$cid)->first();
        //p($oldData);
        //处理所属分类getCateData()是模型中的方法来完成
        $cateData = $this->db->getCateData($cid);
        View::with('oldData',$oldData)->with('cateData',$cateData)->make();
    }
    public function del(){
        $cid = q('get.cid',0,'intval');
        //把子集提一级（上位）
        //获取当前cid所对应的pid
        //pluck获取单一字段
        $pid = $this->db->where('cid',$cid)->pluck('pid');
        $this->db->where('pid',$cid)->update(['pid'=>$pid]);
        //把当前cid这条数据删除
        $this->db->where('cid',$cid)->delete();
        message('删除成功',u('index'),'error');
    }
}
