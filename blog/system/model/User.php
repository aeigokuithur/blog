<?php namespace system\model;

use hdphp\Model\Model;

class User extends Model
{

    //数据表
    protected $table = "user";

    //完整表名
    protected $full = false;

    //自动验证
    protected $validate = [
        //['字段名','验证方法','提示信息',验证条件,验证时间]
        ['username', 'required', '请输入用户名', self::MUST_VALIDATE, self::MODEL_BOTH],
        ['password', 'required', '请输入密码', self::MUST_VALIDATE, self::MODEL_BOTH],
        ['code', 'required', '请输入验证码', self::MUST_VALIDATE, self::MODEL_BOTH],
    ];

    //自动完成
    protected $auto = [
        //['字段名','处理方法','方法类型',验证条件,验证时机]
    ];

    //自动过滤
    protected $filter = [
        //[表单字段名,过滤条件,处理时间]
    ];

    //时间操作,需要表中存在created_at,updated_at字段
    protected $timestamps = false;


    //禁止插入的字段
    protected $denyInsertFields = [];

    //禁止更新的字段
    protected $denyUpdateFields = [];

    //前置方法 比如: _before_add 为添加前执行的方法
    protected function _before_add()
    {
    }

    protected function _before_delete()
    {
    }

    protected function _before_save(&$data)
    {
    }

    protected function _after_add()
    {
    }

    protected function _after_delete()
    {
    }

    protected function _after_save()
    {
    }

    public function login()
    {
//        执行自动验证
        if (!$this->create()) return false;
//        验证用户名
        if (strtoupper($_POST['code']) != $_SESSION['code']) {
            $this->error = '验证码错误';
            return false;
        }
        //对比用户名是否正确
        //first()获取一条数据，一维数组
        //get()获取多条数据，二维数组
        if (!$data = $this->where('username', $_POST['username'])->first()) {
            $this->error = '用户名错误';
            return false;
        }
        //对比密码是否正确
        if (Crypt::encrypt($_POST['password']) != $data['password']) {
            $this->error = '密码不正确';
            return false;
        }
        $_SESSION['admin']['uid'] = $data['uid'];
        $_SESSION['admin']['username'] = $data['username'];
        return true;
    }

//    重新改密码
    public function changePass()
    {
        $this->validate = [
            ['password', 'required', '请输入原始密码', self::MUST_VALIDATE, self::MODEL_BOTH],
            ['new_password', 'required', '请输入新密码', self::MUST_VALIDATE, self::MODEL_BOTH],
            ['confirm_password', 'confirm:new_password', '两次输入的密码不一致', self::MUST_VALIDATE, self::MODEL_BOTH],
        ];
//        执行自动验证
        if (!$this->create())  return false;
        //判断原始密码是否正确
        $data = $this->where('uid', $_SESSION['admin']['uid'])->first();
        if (Crypt::encrypt($_POST['password']) != $data['password']) {
            $this->error = '原始密码错误';
            return false;
        }
        //两次输入的新密码是否一致（在自动验证处理）
        //新密码跟原始密码不能一样
        if ($_POST['password'] == $_POST['new_password']) {
            $this->error = '新密码不能和原始密码一样';
            return false;
        }
        //数据库密码的修改
        $data = $this->where('uid', $_SESSION['admin']['uid'])->update(['password' => Crypt::encrypt($_POST['new_password'])]);
        if (!$data) {
            $this->error = '操作失败，请稍后再试';
            return false;
        }
        return true;
    }
}