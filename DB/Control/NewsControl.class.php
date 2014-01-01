<?php
//测试控制器类
class NewsControl extends Control{
    //显示新闻列表
    function show(){
       $db=M("news");
       //分页
       //查询总条数
       $count=$db->count();
       //分页对象
       $page=new Page($count,3);
       $this->assign("page",$page->show());
       
       $data=$db->where($page->limit())->all();
       $this->assign("news",$data);
       $this->display();
    }
    //添加新闻方法
    function add(){
          if (IS_POST) {
            $db=M("news");
            if ($db->add()) {
              $this->success("发表成功！",'show');
            }else{
              $this->error("发表失败！",'show');
            }
          }else{
            $this->display();
          }





    // 	if(IS_POST){
				// $data['title']=$_POST['title'];
				// $data['content']=$_POST['content'];
				// if(M('News')->add($data)){
				// 	$this->success('添加成功','show');
				// }else{
				// 	$this->error('添加失败','show');
				// }
			 // }else{
    // 			$this->display();
			 // }


    }
}
?>
