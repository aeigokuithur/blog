<?php   namespace web\admin\controller;
use hdphp\route\Controller;

/**
 * Created by PhpStorm.
 * User: �� ��
 * Date: 2016/9/6
 * Time: 0:41
 */
class Index extends Common
{
    public function index()
    {
        //��ʾģ��
        View::make();
    }
    public function add()
    {
        View::make();
    }
}