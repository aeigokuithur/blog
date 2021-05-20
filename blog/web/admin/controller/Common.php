<?php  namespace web\admin\controller;

use hdphp\route\Controller;
/**
 * Class Common
 * 公共控制器
 */
class Common extends Controller{
    //动作
	public function __construct(){
		//验证是否登陆，如果没有登陆跳转到登陆页面
		if(!isset($_SESSION['admin']['uid']))
		{
			//走到判断里面，说明没有登陆
			go('admin.login.index');
		}
	}
}
