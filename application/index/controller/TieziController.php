<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Tiezi;
use think\Request;
use app\index\model\Log;
use think\Session;


class TieziController extends Controller
{
    public function index($id,$ido,$idt)
    {
    	$list = Tiezi::where('ba_id',$id)
    		->where('ptie',0)
    		->where('quotetie',0)
    		->order('tiedate desc')
    		->select();
        $lists = Log::where('username',$ido)
            ->where('password',$idt)
            ->find();
        $this->assign('list',$list);
        $this->assign('lists',$lists);
        if($lists){
            Session::set('username',$ido);
            Session::set('password',$idt);
            return $this->fetch();
        }else{
            return "用户名或密码错误......";
        }
    }

    public function tiecontent($id){
    	$list = Tiezi::where('tieid|ptie', '=', $id)
    		->order('tiedate')
    		->select();
    	$this->assign('list',$list);
    	return $this->fetch();
    }

    public function list($id,$tieid){
    	$list = Tiezi::where('ptie',$id)
    		->select();
    	$listdo = Tiezi::find($tieid);
    	$this->assign('list',$list);
    	$this->assign('listdo',$listdo);
    	return $this->fetch();
    }

    public function add($id){
    	$list = Tiezi::where('ba_id',$id)
    		->find();
    	$this->assign('list',$list);
    	return $this->fetch();	
    }

    public function adddo(Request $request){
    	$Tiezi = new Tiezi;
		$Tiezi->tititle = $request->post('tititle');
		$Tiezi->tiecontent = $request->post('tiecontent');
		$Tiezi->ba_id = $request->post('baid');
		$Tiezi->ptie = $request->post('ptie');
		$Tiezi->quotetie = $request->post('quotetie');
		$Tiezi->tiedate = date("Y-m-d H:i:s");
		if ($Tiezi->save()) {
			return '帖子[ ' . $Tiezi->tititle . ']新增成功';
		} else {
			return $Tiezi->getError();
		}
    }

    public function huifu($tieid){
    	$select = Tiezi::find($tieid);
    	$this->assign('select',$select);
    	return $this->fetch();
    }

    public function huifudo(Request $request){
	   	$Tiezi = new Tiezi;
		$Tiezi->tiecontent = $request->post('tiecontent');
		$Tiezi->ba_id = $request->post('baid');
		$Tiezi->ptie = $request->post('tieid');
		$Tiezi->quotetie = $request->post('quotetie');
		$Tiezi->tiedate = date("Y-m-d H:i:s");
		if ($Tiezi->save()) {
			return '帖子[ ' . $Tiezi->tiecontent . ']回复成功';
		} else {
			return $Tiezi->getError();
		}
    }
}
