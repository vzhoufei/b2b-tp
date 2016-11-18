<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>tpshop商家管理后台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
 	<link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/Public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
    	folder instead of downloading all of them to reduce the load. -->
    <link href="/Public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/Public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />   
    <!-- jQuery 2.1.4 -->
    <script src="/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/Public/js/global.js"></script>
    <script src="/Public/js/myFormValidate.js"></script>    
    <script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/Public/js/layer/layer-min.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
    <script src="/Public/js/myAjax.js"></script>
    <script type="text/javascript">
    function delfunc(obj){
    	layer.confirm('确认删除？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
    		    // 确定
   				$.ajax({
   					type : 'post',
   					url : $(obj).attr('data-url'),
   					data : {act:'del',del_id:$(obj).attr('data-id')},
   					dataType : 'json',
   					success : function(data){
   						if(data==1){
   							layer.msg('操作成功', {icon: 1});
   							$(obj).parent().parent().remove();
   						}else{
   							layer.msg(data, {icon: 2,time: 2000});
   						}
   						layer.closeAll();
   					}
   				})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }
    
    function selectAll(name,obj){
    	$('input[name*='+name+']').prop('checked', $(obj).checked);
    }    
	
    function get_help(obj){
        layer.open({
            type: 2,
            title: '帮助手册',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: $(obj).attr('data-url'), 
        });
    }	
    </script>        
  </head>
  <body style="background-color:#ecf0f5;">
 

<style>
.presales_tr,.aftersales_tr{ display:none;}
</style>
<div class="wrapper">
    <div class="breadcrumbs" id="breadcrumbs">
	<ol class="breadcrumb">
	<?php if(is_array($navigate_admin)): foreach($navigate_admin as $k=>$v): if($k == '后台首页'): ?><li><a href="<?php echo ($v); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo ($k); ?></a></li>
	    <?php else: ?>    
	        <li><a href="<?php echo ($v); ?>"><?php echo ($k); ?></a></li><?php endif; endforeach; endif; ?>          
	</ol>
</div>

    <section class="content" style="padding:0px 15px;">
        <!-- Main content -->
        <div class="container-fluid">
            <div class="panel panel-default"> 
                <div class="panel-heading">
          			<h3 class="panel-title"><i class="fa fa-list"></i> 客服中心</h3>
        		</div>          
                <div class="panel-body ">   
                    <!--表单数据-->
                    <form method="post" id="handlepost" action="<?php echo U('Index/store_service');?>">                    
                    <!--通用信息-->
                    <div class="tab-content">                 	  
                        <p class="text-warning">说明：客服信息需要填写完整，不完整信息将不会被保存。</p>
					  	<div class="row" style="margin:20px auto;text-align:center;">
					  	 <table class="table table-bordered">
				  	 		<tbody>
				  	 		  <tr>
						             <td>售前客服：</td>
						             <td>客服名称</td>                                     
						             <td>客服工具</td>
                                	 <td>客服账号</td>
                               		 <td></td>
                               </tr>
                            
                                <?php if(is_array($store[store_presales])): foreach($store[store_presales] as $k=>$v): ?><tr class="presales_tr" style="display:table-row;">
                                         <td></td>
                                         <td><input type="text" class="form-control" placeholder="客服名称" name="pre[<?php echo ($k); ?>][name]" value="<?php echo ($v['name']); ?>" /></td> 
                                         <td>
						             	<select class="form-control"  name="pre[<?php echo ($k); ?>][type]">
						             		<option value="ww" <?php if($v['type'] == 'ww'): ?>selected="selected"<?php endif; ?> >旺旺</option>
						             		<option value="qq" <?php if($v['type'] == 'qq'): ?>selected="selected"<?php endif; ?> >QQ</option>
						             		<!--<option value="IM" <?php if($v['type'] == 'IM'): ?>selected="selected"<?php endif; ?> >站内IM</option>-->
						             	</select>
                                         </td>
                                         <td><input type="text" class="form-control" placeholder="客服账号"  name="pre[<?php echo ($k); ?>][account]" value="<?php echo ($v['account']); ?>" /></td>
                                         <td><input type="button" class="btn btn-default del_sales_btn" value="- 删除" /></td>	
                                  </tr><?php endforeach; endif; ?>
                            
                               <tr class="presales_tr">
						             <td></td>
						             <td><input type="text" class="form-control" placeholder="客服名称" name="pre[0][name]"></td> 
						             <td>
						             	<select class="form-control"  name="pre[0][type]">
						             		<option value="ww">旺旺</option>
						             		<option value="qq">QQ</option>
						             		<option value="IM">站内IM</option>
						             	</select>
						             </td>
                                	 <td><input type="text" class="form-control" placeholder="客服账号"  name="pre[0][account]" value="" /></td>
                               		 <td><input type="button" class="btn btn-default del_sales_btn" value="- 删除" /></td>	
                              </tr>
                              <tr>
                                  <td></td>
                                  <td colspan="4" align="left">
                                  <input type="button" class="btn btn-primary" value="+添加售前客服" id="presales_btn">
                                  </td>
                              </tr>
				  	 		  <tr>
						             <td>售后客服：</td>
						             <td>客服名称</td>                                     
						             <td>客服工具</td>
                                	 <td>客服账号</td>
                               		 <td></td>
                               </tr>                              
				  	 		 <?php if(is_array($store[store_aftersales])): foreach($store[store_aftersales] as $k=>$v): ?><tr  class="aftersales_tr" style="display:table-row;">
						             <td></td>
						             <td><input type="text" class="form-control" placeholder="客服名称" name="after[<?php echo ($k); ?>][name]" value="<?php echo ($v['name']); ?>" /></td>
						             <td>
						             	<select class="form-control"  name="after[<?php echo ($k); ?>][type]">
						             		<option value="ww" <?php if($v['type'] == 'ww'): ?>selected="selected"<?php endif; ?> >旺旺</option>
						             		<option value="qq" <?php if($v['type'] == 'qq'): ?>selected="selected"<?php endif; ?> >QQ</option>
						             		<option value="IM" <?php if($v['type'] == 'IM'): ?>selected="selected"<?php endif; ?> >站内IM</option>
						             	</select>
						             </td>
                                	 <td><input type="text" class="form-control" placeholder="客服账号"  name="after[<?php echo ($k); ?>][account]" value="<?php echo ($v['account']); ?>" /></td>
                               		 <td><input type="button" class="btn btn-default del_sales_btn" value="- 删除" /></td>	
                               </tr><?php endforeach; endif; ?>
				  	 		  <tr  class="aftersales_tr">
						             <td></td>
						             <td><input type="text" class="form-control" placeholder="客服名称" name="after[0][name]"></td> 
						             <td>
						             	<select class="form-control"  name="after[0][type]">
						             		<option value="ww">旺旺</option>
						             		<option value="qq">QQ</option>
						             		<option value="IM">站内IM</option>
						             	</select>
						             </td>
                                	 <td><input type="text" class="form-control" placeholder="客服账号"  name="after[0][account]" value="" /></td>
                               		 <td><input type="button" class="btn btn-default del_sales_btn" value="- 删除" /></td>	
                               </tr>                               
                              <tr>
                                  <td></td>
                                  <td colspan="4" align="left">
                                  <input type="button" class="btn btn-primary" value="+添加售后客服" id="aftersales_btn">
                                  </td>
                              </tr>                               
				  	 		   <tr>
						             <td>工作时间：</td>
						             <td colspan="4" align="left">例：（工作时间 AM 10:00 - PM 18:00）</td>						              
                               </tr>
				  	 		   <tr>
						             <td>&nbsp;</td>
						             <td colspan="4" align="left">
                                     <textarea rows="3" cols="100" name="working_time"><?php echo ($store["store_workingtime"]); ?></textarea>
                                     </td>						              
                               </tr>                               
                             </tbody>
                          </table>
	                  	</div> 
		             	<div class="row" style="text-align:center;">
		             		<a href="javascript:void(0)" onclick="adsubmit()" class="btn btn-success margin">提交</a>
		             	</div>         
                    </div>              
			    	</form><!--表单数据-->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function adsubmit(){
	 // 表单提交
	$('#handlepost').submit();
}
$(document).ready(function(){
	
	// 添加售前客服
   $('#presales_btn').click(function(){
	   var count = $('.presales_tr').length; // 当前的数量	   
	   var presales_tr = $(this).parent().parent().prev('.presales_tr'); // 找到这个按钮的所在 tr 的前面的那个tr
	   var clont_tr = presales_tr.clone().show(); // 克隆一份出来
	   clont_tr.find('input[name="pre\[0\]\[name\]"]').val('售前'+count).attr('name',"pre["+count+"][name]");// 设置刚刚克隆出来里面 input 的值
	   clont_tr.find('select[name="pre\[0\]\[type\]"]').attr('name',"pre["+count+"][type]");
	   clont_tr.find('input[name="pre\[0\]\[account\]"]').attr('name',"pre["+count+"][account]");	   
	   presales_tr.before(clont_tr); // 在塞到 刚刚前面那个tr 里面去
	});
	
	// 添加售后客服
   $('#aftersales_btn').click(function(){
	   var count = $('.aftersales_tr').length; // 当前的数量
	   var aftersales_tr = $(this).parent().parent().prev('.aftersales_tr'); // 找到这个按钮的所在 tr 的前面的那个tr
	   var clont_tr = aftersales_tr.clone().show(); // 克隆一份出来
	   clont_tr.find('input[name="after\[0\]\[name\]"]').val('售后'+count).attr('name',"after["+count+"][name]");  // 设置刚刚克隆出来里面 input 的值
	   clont_tr.find('select[name="after\[0\]\[type\]"]').attr('name',"after["+count+"][type]");  
	   clont_tr.find('input[name="after\[0\]\[account\]"]').attr('name',"after["+count+"][account]");  
	   aftersales_tr.before(clont_tr); // 在塞到 刚刚前面那个tr 里面去
	});	
		
	// 删除某一行
	$(document).on('click','.del_sales_btn',function(){
			$(this).parent().parent().remove();	 	
	});	 
});

</script>
</body>
</html>