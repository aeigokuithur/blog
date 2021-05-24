<?php namespace system\model;

use hdphp\model\Model;

class Category extends Model{

	//数据表
	protected $table = "category";

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
		['cname','required','分类名称不能空',self::MUST_VALIDATE ,self::MODEL_BOTH],
		['ctitle','required','分类标题不能空',self::MUST_VALIDATE ,self::MODEL_BOTH],
		['cdes','required','分类描述不能空',self::MUST_VALIDATE ,self::MODEL_BOTH],
		['ckeywords','required ','分类关键字不能空',self::MUST_VALIDATE ,self::MODEL_BOTH],
		['csort','num:1,99999','排列顺序必须是数字',self::MUST_VALIDATE ,self::MODEL_BOTH],
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=false;


	//禁止插入的字段
	protected $denyInsertFields = [];

	//禁止更新的字段
	protected $denyUpdateFields = [];

	//前置方法 比如: _before_add 为添加前执行的方法
	protected function _before_add(){}
	protected function _before_delete(){}
	protected function _before_save(&$data){}

	protected function _after_add(){}
	protected function _after_delete(){}
	protected function _after_save(){}
	//添加分类
	public function store(){
		if (!$this->create()) return false;
        //执行添加
        //p($this->data);die;
        //add(),默认添加的是data属性里面的东西
        //$this->add(),添加成功之后，是当前这条的主键id
        //form表单字段跟数据库保持一致
		return $this->add();
        //注意
        /*
        $data = [
            'title'=>'bb',
            'name'=>'aa',
        ];
        $this->add($data);
        */
	}
//	处理所有分类
public function getCateData($cid){
    //1.先找出所有子集
	$cids = $this->getSon($this->get(),$cid);
    //2.把自己追加进去
	$cids[]=$cid;
    //3.获取除了自己和自己子集的全部数据
	$data = $this->whereNotIn('cid',$cids)->get();
	return Data::tree($data,'cname');
}
//	子类递归
	public function getSon($data,$cid){
		static $temp = [];
		foreach ($data as $k => $v){
			if ($v['pid'] == $cid){
                //这个时候说明你是$cid的儿子
				$temp[] = $v['cid'];
				$this->getSon($data,$v['cid']);
			}
		}
		return $temp;
	}
//    编辑
   public function edit(){
       if (!$this->create()) return false;
       //执行save方法进行修改的时候，需要以post发送主键id
       //form表单字段跟数据库保持一致
       return $this->save();
   }
}