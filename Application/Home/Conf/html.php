<?php
		return array(
			'VIEW_PATH'       =>'./Template/pc/', // 改变某个模块的模板文件目录
			'DEFAULT_THEME'    =>'soubao', // 模板名称
			'TPL'				=>'default1',//--zhoufei 更改商户模板位置 
			'TMPL_PARSE_STRING'  =>array(
		//                '__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则
					'__STATIC__'     => '/Template/pc/soubao/Static', // 增加新的image  css js  访问路径  后面给 php 改了
					'__STYLE__'      => '/Merchants_tpl/pc/default1',//--zhoufei 样式位置 
			   ),
			   //'DATA_CACHE_TIME'=>60, // 查询缓存时间
			);

		?>