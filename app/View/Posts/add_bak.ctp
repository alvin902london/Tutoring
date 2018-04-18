<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
			<h1><?php echo __('尋找導師'); ?></h1>
		</div>
	</div>
</div>
<?php echo $this->Form->create('Post', array(    
	'inputDefaults' => array(
		'label' => false, 
		'div' => false
	)   
)); ?>
<div class="row">
	<div class="col-lg-6">
		<h4><?php echo __('基本資料'); ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<?php echo $this->Form->input('contact_person', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => __('聯絡人姓名'), 
		    'placeholder' => __('聯絡人姓名')
		)); ?>
	</div>
	<div class="col-lg-3">
		<?php echo $this->Form->input('mobile', array(
		    'div' => 'form-group',
		    'type' => 'text',		    
		    'class' => 'form-control',
		    'label' => __('手提電話'), 
		    'placeholder' => __('手提電話')
		)); ?>
	</div>	
</div>
<div class="row">
	<div class="col-lg-6">		
		<?php echo $this->Form->input('email', array(
		    'div' => 'form-group',
		    'type' => 'email',		    
		    'class' => 'form-control',
		    'label' => __('電郵'), 
		    'placeholder' => __('電郵')
		)); ?>	
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<?php echo $this->Form->input('Student.0.grade', array(
		    'options' => array(
		    	__('幼稚園') => __('幼稚園'),		    	
		    	__('小一') => __('小一'),
		    	__('小二') => __('小二'),
		    	__('小三') => __('小三'),
		    	__('小四') => __('小四'),
		    	__('小五') => __('小五'),
		    	__('小六') => __('小六'),
		    	__('中一') => __('中一'),
		    	__('中二') => __('中二'),
		    	__('中三') => __('中三'),
		    	__('中四') => __('中四'),
		    	__('中五') => __('中五'),		    			    	
		    	__('中六') => __('中六'),
		    	__('大專或大學') => __('大專或大學'),
		    	__('成人') => __('成人')
		    ),
		    'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => __('學生級別')
		)); ?>			
	</div>
	<div class="col-lg-3">
		<?php echo $this->Form->input('Student.0.gender', array(
			'div' => 'form-group',
			'class' => 'form-control',
			'label' => __('學生性別'),
		    'options' => array(
		    	__('男') => __('男'),		    	
		    	__('女') => __('女')
		    ),
		)); ?>
	</div>	
</div>
<span id="readroot" style="display: none">
	<div class="row">
		<div class="col-lg-3">
			<?php echo $this->Form->input('Student.1.grade', array(
				'name' => 'grade',
			    'options' => array(
			    	__('幼稚園') => __('幼稚園'),		    	
			    	__('小一') => __('小一'),
			    	__('小二') => __('小二'),
			    	__('小三') => __('小三'),
			    	__('小四') => __('小四'),
			    	__('小五') => __('小五'),
			    	__('小六') => __('小六'),
			    	__('中一') => __('中一'),
			    	__('中二') => __('中二'),
			    	__('中三') => __('中三'),
			    	__('中四') => __('中四'),
			    	__('中五') => __('中五'),		    			    	
			    	__('中六') => __('中六'),
			    	__('大專或大學') => __('大專或大學'),
			    	__('成人') => __('成人')
			    ),
			    'empty' => __('請選擇'),
			    'div' => 'form-group',
			    'class' => 'form-control'
			    //'label' => __('學生級別')
			)); ?>			
		</div>
		<div class="col-lg-3">
			<?php echo $this->Form->input('Student.1.gender', array(
				'name' => 'gender',
				'div' => 'form-group',
				'class' => 'form-control',
				//'label' => __('學生性別'),
			    'options' => array(
			    	__('男') => __('男'),		    	
			    	__('女') => __('女')
			    ),
			)); ?>
		</div>	
	</div>
	<input class="btn btn-default" type="button" value="<?php echo __('移除學生'); ?>" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />
</span>
<span id="writeroot"></span>		
<input class="btn btn-default" type="button" onclick="moreFields('readroot', 'writeroot', 'Student')" value="<?php echo __('増加學生'); ?>" />
<br>
<br>
<div class="row">
	<div class="col-lg-6">
		<h4><?php echo __('上課時間及地點'); ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<?php echo $this->Form->input('frequency', array(
		    'options' => array(
	    		__('一星期1日') => __('一星期1日'),
	    		__('一星期2日') => __('一星期2日'),
	    		__('一星期3日') => __('一星期3日'),
	    		__('一星期4日') => __('一星期4日')	,	
	    		__('一星期5日') => __('一星期5日')	,	    				    		
	    		__('一星期6日') => __('一星期6日'),
	    		__('一星期7日') => __('一星期7日'),	    		
		    ),
		    'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => __('每週上課次數')
		)); ?>
	</div>
	<div class="col-lg-3">
		<?php echo $this->Form->input('duration', array(
		    'options' => array(
		    	__('1hr') => __('1hr'),		    	
		    	__('1.5hr') => __('1.5hr'),
		    	__('2hr') => __('2hr'),
		    	__('2.5hr') => __('2.5hr'),
		    	__('3hr') => __('3hr'),
		    	__('3hr+') => __('3hr+'),		    		
		    ),
		    'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => __('每堂時間長度')
		)); ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="well">
<div class="row">
	<div class="col-lg-12">
		<label for=""><?php echo __('要求上課時間'); ?></label>
	</div>
</div>	
<div class="row">
	<div class="col-lg-4">
		<?php echo $this->Form->input('Condition.0.week', array(
		    'options' => array(
		    	__('每日') => __('每日'),		    	
		    	__('一至五') => __('一至五'),
		    	__('六日') => __('六日'),
		    	__('星期一') => __('星期一'),
		    	__('星期二') => __('星期二'),
		    	__('星期三') => __('星期三'),
		    	__('星期四') => __('星期四'),
		    	__('星期五') => __('星期五'),
		    	__('星期六') => __('星期六'),
		    	__('星期日') => __('星期日'),
		    ),
		    'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control'
		)); ?>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
            <div class="input-group date datetimepicker">
                <input type="text" class="form-control" name="data[Condition][0][start]"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
	</div>
	<div class="col-lg-4">
		<?php echo $this->Form->input('Condition.0.indicator', array(
		    'options' => array(
		    	__('開始') => __('開始'),		    	
		    	__('前') => __('前'),
		    	__('後') => __('後')
		    ),
		    //'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control'
		    //'label' => __('')
		)); ?>
	</div>	
</div>
<span id="readroot2" style="display: none">
	<div class="row">
		<div class="col-lg-4">
			<?php echo $this->Form->input('Condition.1.week', array(
				'name' => 'week',
			    'options' => array(
			    	__('每日') => __('每日'),		    	
			    	__('一至五') => __('一至五'),
			    	__('六日') => __('六日'),
			    	__('星期一') => __('星期一'),
			    	__('星期二') => __('星期二'),
			    	__('星期三') => __('星期三'),
			    	__('星期四') => __('星期四'),
			    	__('星期五') => __('星期五'),
			    	__('星期六') => __('星期六'),
			    	__('星期日') => __('星期日'),
			    ),
			    'empty' => __('請選擇'),
			    'div' => 'form-group',
			    'class' => 'form-control'
			)); ?>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
	            <div class="input-group date datetimepicker">
	                <input type="text" class="form-control" name="start"/>
	                <span class="input-group-addon">
	                    <span class="glyphicon glyphicon-time"></span>
	                </span>
	            </div>
	        </div>
		</div>
		<div class="col-lg-4">
			<?php echo $this->Form->input('Condition.1.indicator', array(
				'name' => 'indicator',
			    'options' => array(
			    	__('開始') => __('開始'),		    	
			    	__('前') => __('前'),
			    	__('後') => __('後')
			    ),
			    //'empty' => __('請選擇'),
			    'div' => 'form-group',
			    'class' => 'form-control'
			    //'label' => __('')
			)); ?>
		</div>	
	</div>
	<input class="btn btn-default" type="button" value="<?php echo __('移除'); ?>" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br />	<br />
</span>
<span id="writeroot2"></span>		
<input class="btn btn-default" type="button" onClick="moreFields('readroot2', 'writeroot2', 'Condition')" value="<?php echo __('更多時間要求'); ?>" />
<script>
	var counter = 1;
	function moreFields(val1, val2, val3) {
		counter++;
		var newField = document.getElementById(val1).cloneNode(true);
		newField.id = '';
		newField.style.display = 'block';
		var newFields = newField.querySelectorAll('[name], [id], [for]');
			for (var i=0;i<newFields.length;i++) {
				var theNames = newFields[i].name
				if (theNames)
					newFields[i].name = "data[" + val3 + "][" + counter + "][" + theNames + "]";
				var theNames2 = newFields[i].id;
		        if (theNames2)
		            newFields[i].id = theNames2 + counter;
		        var theNames3 = newFields[i].htmlFor;
		        if (theNames3)
		            newFields[i].htmlFor = theNames3 + counter;
		        	console.log(newFields[i].name);  	
			}			
		var insertHere = document.getElementById(val2);
		insertHere.parentNode.insertBefore(newField,insertHere);
		$(function () {
        	$('.datetimepicker').datetimepicker({
        	    format: 'LT'
        	});
    	});


	}

	//window.onload = moreFields2;

	$(function () {
        $('.datetimepicker').datetimepicker({
            format: 'LT'
        });
    });
</script>
</div>
</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="well">
<div class="row">
	<div class="col-lg-12">
		<label for=""><?php echo __('首堂時間（如不同）'); ?></label>
	</div>
</div>	
<div class="row">
	<div class="col-lg-4">
		<?php echo $this->Form->input('FirstCondition.week', array(
		    'options' => array(
		    	__('每日') => __('每日'),		    	
		    	__('一至五') => __('一至五'),
		    	__('六日') => __('六日'),
		    	__('星期一') => __('星期一'),
		    	__('星期二') => __('星期二'),
		    	__('星期三') => __('星期三'),
		    	__('星期四') => __('星期四'),
		    	__('星期五') => __('星期五'),
		    	__('星期六') => __('星期六'),
		    	__('星期日') => __('星期日'),
		    ),
		    'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control'
		)); ?>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
            <div class="input-group date datetimepicker">
                <input type="text" class="form-control" name="data[FirstCondition][start]"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
	</div>
	<div class="col-lg-4">
		<?php echo $this->Form->input('FirstCondition.indicator', array(
		    'options' => array(
		    	__('開始') => __('開始'),		    	
		    	__('前') => __('前'),
		    	__('後') => __('後')
		    ),
		    //'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control'
		    //'label' => __('')
		)); ?>
	</div>	
</div>
</div>
</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<label for=""><?php echo __('最快上課日期'); ?></label>
		<div class="form-group">
    	   	<div class="input-group date" id="datetimepicker1">
    	        <input type="text" class="form-control" name="data[Post][first]"/>
    	        <span class="input-group-addon">
    	            <span class="glyphicon glyphicon-calendar"></span>
    	        </span>
    	    </div>
    	</div>
		<script type="text/javascript">
    	    $(function () {
    	        $('#datetimepicker1').datetimepicker({
    	    		format: 'DD/MM/YYYY'
    			});
    	    });
    	</script>
	</div>
</div>
<script>
	function findselected(param1, param2){ 
		var indicator = document.getElementById(param1); 
		var click = document.getElementById(param2); 
		(indicator.value == '至')? click.disabled=false : click.disabled=true 
	} 
</script>
<div class="row">
	<div class="col-lg-2">
		<?php echo $this->Form->input('Post.district', array(
		    'options' => array(
		    	__('港島區') => array(
		    		__('薄扶林') => __('薄扶林'),
		    		__('半山') => __('半山'),
		    		__('西環') => __('西環'),
		    		__('中上環') => __('中上環'),
		    		__('灣仔') => __('灣仔'),
		    		__('銅鑼灣') => __('銅鑼灣'),
		    		__('跑馬地') => __('跑馬地'),
		    		__('北角') => __('北角'),
		    		__('則魚涌') => __('則魚涌'),
		    		__('太古') => __('太古'),
		    		__('筲箕灣') => __('筲箕灣'),
		    		__('西灣河') => __('西灣河'),
		    		__('香港仔') => __('香港仔'),
		    		__('鴨利洲') => __('鴨利洲'),
		    		__('赤柱') => __('赤柱')
		    	),
		    	__('九龍區') => array(
		    		__('藍田') => __('藍田'),
		    		__('油塘') => __('油塘'),
		    		__('秀茂坪') => __('秀茂坪'),
		    		__('牛頭角') => __('牛頭角'),
		    		__('九龍灣') => __('九龍灣'),
		    		__('彩虹') => __('彩虹'),
		    		__('牛池灣') => __('牛池灣'),
		    		__('慈雲山') => __('慈雲山'),
		    		__('鑽石山') => __('鑽石山'),
		    		__('新蒲崗') => __('新蒲崗'),
		    		__('黃大仙') => __('黃大仙'),
		    		__('樂富') => __('樂富'),
		    		__('九龍塘') => __('九龍塘'),
		    		__('石硤尾') => __('石硤尾'),
		    		__('何文田') => __('何文田'),
		    		__('九龍城') => __('九龍城'),
		    		__('土瓜灣') => __('土瓜灣'),
		    		__('紅磡') => __('紅磡'),
		    		__('油麻地') => __('油麻地'),
		    		__('佐敦') => __('佐敦'),
		    		__('尖沙咀') => __('尖沙咀'),
		    		__('旺角') => __('旺角'),
		    		__('大角咀') => __('大角咀'),
		    		__('深水步') => __('深水步'),
		    		__('長沙灣') => __('長沙灣'),
		    		__('荔枝角') => __('荔枝角'),
		    		__('美孚') => __('美孚'),
		    	),	
				__('新界區') => array(
		    		__('將軍澳') => __('將軍澳'),
		    		__('西貢') => __('西貢'),
		    		__('荃灣') => __('荃灣'),
		    		__('深井') => __('深井'),
		    		__('馬灣') => __('馬灣'),
		    		__('葵涌') => __('葵涌'),
		    		__('葵芳') => __('葵芳'),
		    		__('青衣') => __('青衣'),
		    		__('大圍') => __('大圍'),
		    		__('沙田') => __('沙田'),
		    		__('沙田市中心') => __('沙田市中心'),
		    		__('火炭') => __('火炭'),
		    		__('馬鞍山') => __('馬鞍山'),
		    		__('大埔') => __('大埔'),
		    		__('粉嶺') => __('粉嶺'),
		    		__('上水') => __('上水'),
		    		__('元朗') => __('元朗'),
		    		__('天水圍') => __('天水圍'),
		    		__('屯門') => __('屯門'),
		    		__('離島') => __('離島（除東涌）'),
		    		__('東涌') => __('東涌')
		    	)		    		    	
		    ),
		    'empty' => __('請選擇'),
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => __('補習地點')
		)); ?>
	</div>
	<div class="col-lg-4">
		<?php echo $this->Form->input('Post.estate', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => __('屋苑（如不適用，請填寫街道號碼或地點）'), 
		    'placeholder' => __('屋苑')
		)); ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<?php echo $this->Form->label('Post.rate', __('學費')); ?>
		<div class="input-group">
  			<span class="input-group-addon">$</span>
				<?php echo $this->Form->input('Post.rate', array(
				'type' => 'text',
			    
			    'class' => 'form-control',
			    
			    'placeholder' => __('學費')
			)); ?>
  			<span class="input-group-addon"><?php echo __('每小時'); ?></span>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-6">
		<h4><?php echo __('科目'); ?></h4>
		<?php echo $this->Form->input('Subject', array(
			'class' => 'checkbox-inline no_indent',
			'type' => 'select',
			'multiple' => 'checkbox',
			'options' => array(
				'小學' => array(
					'29' => __('全科'), 
					'30' => __('中文'),
					'31' => __('英文'),
					'32' => __('數學'),
					'33' => __('常識')				
				),
				'中學（包括 DSE）' => array(
					'1' => __('全科'), 
					'2' => __('中文'),
					'3' => __('英文'),
					'4' => __('數學'),
					'5' => __('數學（M1）'),
					'6' => __('數學（M2）'),
					'7' => __('中國文學'),
					'8' => __('英國文學'),
					'9' => __('中國歷史'),
					'10' => __('世界歷史'),
					'11' => __('地理'),
					'12' => __('通識'),
					'13' => __('綜合科學'),
					'14' => __('綜合人民'),
					'15' => __('附加數學'),
					'16' => __('純粹數學'),
					'17' => __('應用數學'),
					'18' => __('物理'),
					'19' => __('生物'),
					'20' => __('化學'),
					'21' => __('商業'),
					'22' => __('會計'),
					'23' => __('經濟'),
					'24' => __('企業概論'),
					'25' => __('政府及公共事務'),
					'26' => __('統計學'),
					'27' => __('BAFS'),
					'28' => __('電腦')
				),
				'公開考試（除 DSE）' => array(
					'34' => __('Cambridge YLE Starters'), 
					'35' => __('Cambridge YLE Movers'),
					'36' => __('Cambridge YLE Flyers'),
					'37' => __('Cambridge KET'),
					'38' => __('Cambridge PET'),
					'39' => __('Cambridge FCE'),	
					'40' => __('Cambridge CAE'),
					'41' => __('Cambridge CPE'),
					'42' => __('Cambridge IELTS'),
					'43' => __('TOEFL'),
					'44' => __('TOEFL Junior'),
					'45' => __('Common Entrance 13+'),
					'46' => __('GCE'),
					'47' => __('GCSE')
				)
			)	
		)); ?>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-6">
		<h4><?php echo __('導師要求'); ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">	
		<?php echo $this->Form->input('Post.required_education', array(
		    'options' => array(
		    	__('補習') => array(
		    		__('大學程度') => __('大學程度'),	
		    		__('大學畢業') => __('大學畢業'),	
		    		__('現職教師') => __('現職教師'),	
		    		__('退休老師') => __('退休老師'),	
		    		__('全職補習') => __('全職補習'),	
		    		__('外國回流導師') => __('外國回流導師'),	
		    		__('外籍導師') => __('外籍導師')
		    	),
		    	__('音樂') => array(
		    		__('五級') => __('五級'),	
		    		__('八級') => __('八級'),	
		    		__('演奏級') => __('演奏級')
		    	)
		    ),
		    'empty' => __('請選擇'),
		    'label' => __('學歷'),
		    'div' => 'form-group',
		    'class' => 'form-control'
		)); ?>
	</div>
	<div class="col-lg-3">
		<?php echo $this->Form->input('Post.required_gender', array(
		    'options' => array(
		    	__('男') => __('男'),		    	
		    	__('女') => __('女')
		    ),
		    'empty' => __('請選擇'),
		    'label' => __('性別'),
		    'div' => 'form-group',
		    'class' => 'form-control'
		)); ?>
	</div>	
</div>
<div class="row">
	<div class="col-lg-6">
		<?php echo $this->Form->input('Requirement', array(
			'class' => 'checkbox-inline no_indent',
			'div' => 'form-group',
			'type' => 'select',
			'multiple' => 'checkbox',
			'options' => array(
				__('語言') => array(
					'1' => __('全英上堂'), 
					'2' => __('全普通話上堂'),
					'3' => __('英文程度要高'),
					'4' => __('中文程度要高')
					),
				__('教材') => array(
					'5' => __('可提供筆記')
					),
				)
			)
		); ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<h4><?php echo __('其他要求'); ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<?php echo $this->Form->input('ExtraRequirement.0.name', array(
	    	'div' => 'form-group',
	    	'class' => 'form-control',
	    	//'label' => __('其他要求'), 
			'placeholder' => __('其他要求')
		)); ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">	
		<span id="readroot3" style="display: none">
			<?php echo $this->Form->input('ExtraRequirement.1.name', array(
				'name' => 'name',
		    	'div' => 'form-group',
		    	'class' => 'form-control',
		    	//'label' => __('其他要求'), 
		    	'placeholder' => __('其他要求')
			)); ?>
		<input class="btn btn-default" type="button" value="<?php echo __('移除自訂要求'); ?>" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br />	<br />
		</span>
		<span id="writeroot3"></span>		

		<input class="btn btn-default" type="button" onClick="moreFields('readroot3', 'writeroot3', 'ExtraRequirement')" value="<?php echo __('增加自訂要求'); ?>" />
	</div>	
</div>	
<br>
<br>
<br>
<?php 
$options = array(
	'label' => __('登記'),
	'class' => 'btn btn-default', 
	'div' => array(
		'class' => 'form-group'
	)
);
echo $this->Form->end($options); 
?> 
	            