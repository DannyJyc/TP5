<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Ba;
use app\index\model\Log;
use think\Request;
use think\Session;

class BaController extends Controller
{
    public function index(Request $request)
    {
    	$list = Ba::all();    		
		$this->assign('list',$list);
		$lists = Log::where('username',$request->post('username'))
			->where('password',$request->post('password'))
			->find();
		$this->assign('lists',$lists);
		if($lists){
			Session::set('username',$request->post('username'));
			Session::set('password',$request->post('password'));
			return $this->fetch();
		}else{
			return "用户名或密码错误......";
		}
    }
}
