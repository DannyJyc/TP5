<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Log;
use think\Request;
use think\Session;


class LogController extends Controller
{
	public function login(Request $request){
		$Log = new Log;
		$Log->username = $request->post('username');
		$Log->password = $request->post('password');
		$Log->power = $request->post('power');
		if ($Log->save()) {
			return '您好[ ' . $Log->username . ']注册成功';
		} else {
			return $Log->getError();
		}

	}

	public function log(){
		return $this->fetch();
	}

	public function logdo(Request $request){
		$list = Log::where('username',$request->post('username'))
			->where('password',$request->post('password'))
			->find();
		$this->assign('list',$list);
		if($list){
			Session::set('username',$request->post('username'));
			Session::set('password',$request->post('password'));
			return $this->fetch();
		}else{
			return "用户名或密码错误......";
		}
	}

    public function index()
    {
    	return $this->fetch();
    }

    public function logout(){
    	Session::delete('username');
    	Session::delete('password');
   		return $this->fetch();
    }
}