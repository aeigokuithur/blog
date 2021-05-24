<?php   namespace web\admin\controller;

/**
 * Created by PhpStorm.
 * User: �� ��
 * Date: 2016/9/6
 * Time: 0:41
 */
class Index extends Common
{
    private $db;
    public function __construct()
    {
        $this->db = new \system\model\User();
    }
    public function index()
    {
        //显示模板
        View::make();
    }
    public function add()
    {
        View::make();
    }
    //	修改密码
    public function changePass(){
        if ($_POST){
            if ($this->db->changePass()){
                message('操作成功',u('index.index'),success);
            }
            message($this->db->getError(),'back',"error");
        }
        View::make();
    }
}