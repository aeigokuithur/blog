<?php  namespace web\admin\controller;


use hdphp\route\Controller;

class Login extends Controller{
    //登录判断
	private $db;
	public function __construct()
	{
		$this->db = new \system\model\User();
	}
//	登录页面
	public function index(){
		if ($_POST){
			if ($this->db->login()){
				message('操作成功',u('index.index'),success);
			}
			message($this->db->getError(),'back',"error");
		}
		View::make();
	}
//	验证码
	public function code(){
		Code::num(1)->make();
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
//	退出登录
	public function out(){
		session_unset();
		session_destroy();
		go('index');
	}
}
