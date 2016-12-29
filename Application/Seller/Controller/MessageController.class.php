<?php
namespace Seller\Controller;
use Think\Controller;

class MessageController extends Controller 
{
    

    public function add()
    {
        if(IS_POST){
            $verify = new \Think\Verify(); 
             $code = $verify->check($_POST['code']);
             // if(!$code){
             //    echo "<script>alert('验证码错误！');window.history.go(-1);</script>";
             //    exit;
             // }
            if(!$_POST['username']){ echo "<script>alert('未知错误！');window.history.go(-1);</script>";exit;}
            $message = M('store_message');
            $_POST['addtime'] = time();
            $data = $message->create($_POST, 1); //根据表单提交的POST数据创建数据对象
            if(!$data){
              $erroer = $message->getError();
              $this->error($erroer);
            }
            $res = $message->add($data);
            if($res){
                $useremail = M('store')->where(array('store_id'=>$data['store_id']))->field('email')->find();
                //向用户发送邮件
                 $time = date('Y-m-d H:i:s',$data['addtime']);
                 $body = "留言者姓名:{$data['username']}<br>
                          留言者电话:{$data['tel']}<br>
                          留言者邮箱:{$data['email']}<br>
                          留言者Q  Q:{$data['qq']}<br>
                          留言内容:{$data['text']}<br>
                          留言页面:{$data['url']}<br>
                          留言时间:{$time}<br> ";
                $email_res = send_email($useremail['email'],'云狄建站提醒您，您有新的留言。',$body);
                echo "<script>alert('留言成功，我们会尽快与您联系。');window.history.go(-1);</script>";
            }else{
                 echo "<script>alert('提交失败！');window.history.go(-1);</script>";
            }
        }else{
            $this->redirect('Login/login');
        }
    }



    /**
     * 验证码
     */
    public function code()
    {
        $config = array('fontSize' => 30,'useCurve' => false,);
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }



    public function _empty()
    {
    	$this->display('Public/404');
    }





}