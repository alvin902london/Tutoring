<?php echo $this->element('posts_form_head'); ?>
<?php echo $this->Form->create('Post', array(    
	'inputDefaults' => array(
		'format' => array('before', 'label', 'between', 'input', 'after', 'error'),		
		'label' => false,
		'div' => false,
		'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
	)   
)); ?>
<div class="container">
<div class="row">
	<div class="col-lg-7">
		<div class="row">
			<div class="col-lg-12">			
				<h3><?php echo __('您希望補習甚麼科目？'); ?></h3>
				<?php echo $this->Form->input('Subject', array(
					'options' => $select_subjects,
					'class' => 'checkbox-inline no_indent',
					'type' => 'select',
					'multiple' => 'checkbox',
					'between' => '<div class="form-group has-error required has-feedback">',
					'after' => '</div>'
				)); ?>
				<div class="form-group has-error required has-feedback">
					<?php echo $this->Form->error('Subject', null, array('class' => 'help-block')); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo __('學生的年級是：'); ?></h3>
			</div>
		</div>
		<div class="well">
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('student_grade', array(
					    'options' => $select_grade,
					    'empty' => __('請選擇'),
					    'div' => 'form-group',
					    'class' => 'form-control',
				    	'label' => array(
				    		'class' => 'control-label',
				    		'text' => __('學生級別（升班以新學年作準）')
				    		)      
					)); ?>		
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('student_number', array(
						'div' => 'form-group',
					    'empty' => __('不適用'),			
						'class' => 'form-control',
				    	'label' => array(
				    		'class' => 'control-label',
				    		'text' => __('學生人數（如小組）')
				    		),
					    'options' => $select_number,
					)); ?>
				</div>	
			</div>					
		</div>		
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo __('您希望於哪個時段上課？'); ?></h3>
			</div>
			<div class="col-lg-6">
				<?php echo $this->Form->input('frequency', array(
				    'options' => $select_frequency,
				    'empty' => __('請選擇'),
				    'div' => 'form-group',
				    'class' => 'form-control',
    				'label' => array(
    					'class' => 'control-label',								
						'text' => __('每週上課次數')
						)
				)); ?>
			</div>
			<div class="col-lg-6">
				<?php echo $this->Form->input('duration', array(
				    'options' => $select_duration,
				    'empty' => __('請選擇'),
				    'div' => 'form-group',
				    'class' => 'form-control',
				    'onchange' => 'updateInput(value)',
    				'label' => array(
    					'class' => 'control-label',								
						'text' => __('每堂時間長度')
						)    
				)); ?>
			</div>
		</div>
		<div class="well">
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('Condition.0.week', array(
			        	'label' => array(
        					'text' => __('合適上課時間'),
        					'class' => 'control-label'
        				),
					    'options' => $select_condition,
					    'empty' => __('請選擇'),
					    'div' => 'form-group',
					    'class' => 'form-control'			
					)); ?>
				</div>
				<div class="col-lg-4"> 
			        <?php echo $this->Form->input('Condition.0.start', array(
			        	'label' => array(
        					'text' => __('由（最早開始時間）'),
        					'class' => 'control-label'
        				),
			        	'type' => 'text',
			        	'between' => '<div class="input-group date" id="datetimepicker1">',
			        	'class' => 'form-control',
					    'div' => 'nothing',
					    'class' => 'form-control',
					    'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>'
					));	?>
				</div>
				<div class="col-lg-4">
			        <?php echo $this->Form->input('Condition.0.end', array(
			        	'label' => array(
        					'text' => __('至（最遲結束時間）'),
        					'class' => 'control-label'
        				),
			        	'type' => 'text',
			        	'between' => '<div class="input-group date" id="datetimepicker2">',
			        	'class' => 'form-control',
					    'div' => 'nothing',
					    'class' => 'form-control',
					    'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>'
					));	?>									
				</div>	
			</div>
			<script type="text/javascript">
				var duration_hour = 0;
				var duration2_hour = 0;
				var duration_min = 0;
				var duration2_min = 0;
				function updateInput(ish){
					//console.log(ish);
					if (ish == '1hr') {
						duration_hour = +1;
						duration2_hour = -1;
					} else if (ish == '1.5hr') {
						duration_hour = +1;
						duration2_hour = -1;
						duration_min = +30;
						duration2_min = -30;
					} else if (ish == '2hr') {
						duration_hour = +2;
						duration2_hour = -2;
					} else if (ish == '2.5hr') {
						duration_hour = +2;
						duration2_hour = -2;
						duration_min = +30;
						duration2_min = -30;						
					} else if (ish =='3hr') {
						duration_hour = +3;
						duration2_hour = -3;						
					}
				}
			    $(function () {
			        $('#datetimepicker1').datetimepicker({
    				    format: 'LT' //display hour and minute only
    				});
			        $('#datetimepicker2').datetimepicker({
			        	format: 'LT' //display hour and minute only
			        });

    				$("#datetimepicker1").on("dp.change", function (e) {
	    				var CurrStartDate = new Date($('#datetimepicker1').data("DateTimePicker").date());
    				    var CurrEndDate = new Date($('#datetimepicker2').data("DateTimePicker").date());

    				    //Make sure year, month and dates of both dates stay the same all the time
    				    CurrEndDate.setDate(CurrStartDate.getDate());
    				    CurrEndDate.setMonth(CurrStartDate.getMonth());
    				    CurrEndDate.setFullYear(CurrStartDate.getFullYear());
    				    
        				if (CurrStartDate > CurrEndDate) {
    				    	CurrEndDate.setHours(CurrStartDate.getHours() + duration_hour);
    				    	CurrEndDate.setMinutes(CurrStartDate.getMinutes() + duration_min);
    				    	$('#datetimepicker2').data("DateTimePicker").date(CurrEndDate);
    				    }
    				});
    				$("#datetimepicker2").on("dp.change", function (e) {
    				    var CurrStartDate = new Date($('#datetimepicker1').data("DateTimePicker").date());
    				    var CurrEndDate = new Date($('#datetimepicker2').data("DateTimePicker").date());

    				    //Make sure  year, month and dates of both dates stay the same all the time
    				    CurrStartDate.setDate(CurrEndDate.getDate());
    				    CurrStartDate.setMonth(CurrEndDate.getMonth());
    				    CurrStartDate.setFullYear(CurrEndDate.getFullYear());

    				    if (CurrStartDate > CurrEndDate) {
    				    	CurrStartDate.setHours(CurrEndDate.getHours() + duration2_hour);
    				    	CurrStartDate.setMinutes(CurrEndDate.getMinutes() + duration2_min);
    				    	$('#datetimepicker1').data("DateTimePicker").date(CurrStartDate);
    				    }
			        });
			    });
			</script>
			<span id="readroot2" style="display: none">
				<div class="row">
					<div class="col-lg-4">
						<?php echo $this->Form->input('Condition.1.week', array(
							'name' => 'week',							
				        	'label' => array(
        						'text' => __('合適上課時間'),
        						'class' => 'control-label'
        					),
						    'options' => $select_condition,
						    'empty' => __('請選擇'),
						    'div' => 'form-group',
						    'class' => 'form-control'			
						)); ?>
					</div>
					<div class="col-lg-4">
				        <?php echo $this->Form->input('Condition.1.start', array(
				        	'name' => 'start',
		        			'label' => array(
    							'text' => __('由'),
    							'class' => 'control-label'
    						),
		        			'type' => 'text',
		        			'between' => '<div class="input-group date" id="datetimepicker3">',
		        			'class' => 'form-control',
						    'div' => 'nothing',
						    'class' => 'form-control',
						    'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>'
						));	?>		
					</div>
					<div class="col-lg-4">
				        <?php echo $this->Form->input('Condition.1.end', array(
				        	'name' => 'end',
		        			'label' => array(
    							'text' => __('至'),
    							'class' => 'control-label'
    						),
		        			'type' => 'text',
		        			'between' => '<div class="input-group date" id="datetimepicker4">',
		        			'class' => 'form-control',
						    'div' => 'nothing',
						    'class' => 'form-control',
						    'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>'
						));	?>	
					</div>	
				</div>
				<input class="btn btn-default" type="button" value="<?php echo __('移除'); ?>" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br />	<br />
			</span>
			<span id="writeroot2"></span>		
			<input class="btn btn-default" type="button" onClick="moreFields('readroot2', 'writeroot2', 'Condition')" value="<?php echo __('其他合適時間'); ?>" />
		</div>
		<div class="well">
			<div class="row">
				<div class="col-lg-12">
					<label for=""><?php echo __('首堂合適時間（如不同上）'); ?></label>
				</div>
			</div>	
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this->Form->input('FirstCondition.week', array(
					    'options' => $select_first_condition,
					    'empty' => __('請選擇'),
					    'div' => 'form-group',
			    		'label' => array(
			    			'class' => 'control-label',
			    			'text' => __('合適上課時間')				
							), 
					    'class' => 'form-control'			
					)); ?>
				</div>
				<div class="col-lg-4">
			        <?php echo $this->Form->input('FirstCondition.start', array(
			        	'label' => array(
        					'text' => __('由（最早開始時間）'),
        					'class' => 'control-label'
        				),
			        	'type' => 'text',
			        	'between' => '<div class="input-group date" id="datetimepicker6">',
			        	'class' => 'form-control',
					    'div' => 'nothing',
					    'class' => 'form-control',
					    'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>'
					));	?>	
				</div>
				<div class="col-lg-4">
			        <?php echo $this->Form->input('FirstCondition.end', array(
			        	'label' => array(
        					'text' => __('至（最遲結束時間）'),
        					'class' => 'control-label'
        				),
			        	'type' => 'text',
			        	'between' => '<div class="input-group date" id="datetimepicker7">',
			        	'class' => 'form-control',
					    'div' => 'nothing',
					    'class' => 'form-control',
					    'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>'
					));	?>	
				</div>
				<script type="text/javascript">				
			    $(function () {
			        $('#datetimepicker6').datetimepicker({
    				    format: 'LT' //display hour and minute only
    				});
			        $('#datetimepicker7').datetimepicker({
			        	format: 'LT' //display hour and minute only
			        });

    				$("#datetimepicker6").on("dp.change", function (e) {
	    				var CurrStartDate = new Date($('#datetimepicker6').data("DateTimePicker").date());
    				    var CurrEndDate = new Date($('#datetimepicker7').data("DateTimePicker").date());

    				    //Make sure year, month and dates of both dates stay the same all the time
    				    CurrEndDate.setDate(CurrStartDate.getDate());
    				    CurrEndDate.setMonth(CurrStartDate.getMonth());
    				    CurrEndDate.setFullYear(CurrStartDate.getFullYear());

        				if (CurrStartDate > CurrEndDate) {
    				    	CurrEndDate.setHours(CurrStartDate.getHours() + duration_hour);
    				    	CurrEndDate.setMinutes(CurrStartDate.getMinutes() + duration_min);
    				    	$('#datetimepicker7').data("DateTimePicker").date(CurrEndDate);
    				    }
    				});
    				$("#datetimepicker7").on("dp.change", function (e) {
    				    var CurrStartDate = new Date($('#datetimepicker6').data("DateTimePicker").date());
    				    var CurrEndDate = new Date($('#datetimepicker7').data("DateTimePicker").date());

    				    //Make sure  year, month and dates of both dates stay the same all the time
    				    CurrStartDate.setDate(CurrEndDate.getDate());
    				    CurrStartDate.setMonth(CurrEndDate.getMonth());
    				    CurrStartDate.setFullYear(CurrEndDate.getFullYear());

    				    if (CurrStartDate > CurrEndDate) {
    				    	CurrStartDate.setHours(CurrEndDate.getHours() + duration2_hour);
    				    	CurrStartDate.setMinutes(CurrEndDate.getMinutes() + duration2_min);
    				    	$('#datetimepicker6').data("DateTimePicker").date(CurrStartDate);
    				    }
			        });
			    });
				</script>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
		        <?php echo $this->Form->input('first', array(
		        	'label' => array(
		        		'text' => __('最快上課日期'),
		        		'class' => 'control-label'
		        		),
		        	'type' => 'text',
		        	'between' => '<div class="input-group date datetimepickerm">',
		        	'class' => 'form-control',
				    'div' => 'nothing',
				    'after' => '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div><div class="form-group has-error required has-feedback">'
				));	?>
				<script type="text/javascript">
		    	    $(function () {
		    	        $('.datetimepickerm').datetimepicker({
		    	    		format: 'YYYY/MM/DD'
		    			});
		    	    });
		    	</script>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo __('請提供上課地點。'); ?></h3>
			</div>
			<div class="col-lg-4">
				<?php echo $this->Form->input('Post.district', array(
				    'options' => $select_districts,
				    'empty' => __('請選擇'),
				    'div' => 'form-group',
				    'class' => 'form-control',
		    		'label' => array(
		    			'class' => 'control-label',								
						'text' => __('補習地點')
						)     
				)); ?>
			</div>
			<div class="col-lg-8">
				<?php echo $this->Form->input('Post.estate', array(
				    'div' => 'form-group',
				    'class' => 'form-control',
		    		'label' => array(
		    			'class' => 'control-label',								
						'text' => __('屋苑（如不適用，請填寫街道號碼或地點）')
						),
				    'placeholder' => __('屋苑')
				)); ?>
			</div>
		</div>		
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo __('告訴我們您的導師要求。'); ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">	
				<?php echo $this->Form->input('tutor_type', array(
				    'options' => $select_tutor_type,
				    'empty' => __('請選擇'),
			    	'label' => array(
			    		'class' => 'control-label',
			    		'text' => __('類型')
			    		),
				    'div' => 'form-group',
				    'class' => 'form-control'
				)); ?>
			</div>
			<div class="col-lg-6">
				<?php echo $this->Form->input('tutor_gender', array(
				    'options' => $select_gender,
				    'empty' => __('無所謂'),
			    	'label' => array(
			    		'class' => 'control-label',
			    		'text' => __('性別')
			    		),
				    'div' => 'form-group',
				    'class' => 'form-control'
				)); ?>
			</div>	
		</div>
		<div class="row">
			<div class="col-lg-8">
				<?php echo $this->Form->input('Post.rate', array(
					'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
					'div' => 'form-group',
					'label' => array(
						'class' => 'control-label',								
						'text' => __('學費（不填寫代表希望由導師自訂）') . '<a role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" class="pull-right">' . __('學費參考') . '</a>'
						),
					'between' => '<div class="input-group"><span class="input-group-addon">$</span>',
					'type' => 'text',
			    	'class' => 'form-control',
			    	'placeholder' => __('學費'),
			    	'after' => '</div>'
				)); ?>
				<div class="collapse" id="collapseExample2">
  					<div class="well">
    					<p>test</p>
  					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<?php echo $this->Form->input('Post.rate_unit', array(
				    'options' => $select_rate,
				    'div' => 'form-group',
					'label' => array(
						'class' => 'control-label',
						'text' => __('單位')							
						), 
				    'class' => 'form-control'			
				)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<label><?php echo __('其他導師要求（如適用）'); ?></label>
				<div class="panel-group" id="requirement_select" role="tablist" aria-multiselectable="true">
			  		<div class="panel panel-default">
    					<div class="panel-heading" role="tab" id="headingOne">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#requirement_select" href="#requirement_select_one" aria-expanded="true" aria-controls="requirement_select_one"> Collapsible Group Item #1 </a>
      						</h4>
    					</div>
    					<div id="requirement_select_one" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="requirement_select_one_heading">
      						<div class="panel-body">
								<?php echo $this->Form->input('Requirement.1.name', array(
									'format' => array( 'label', 'before', 'input', 'between', 'error', 'after'),
									'value' => 'test',
									'type' => 'checkbox',
									'before' => '<label class="checkbox-inline">',
									'between' => '2 </label>'
								    //'empty' => __('請選擇'),
	    							//'label' => array(
	    							//	'class' => 'control-label',
	    							//	'text' => __('性別')
	    							//	),
								    //'div' => 'form-group',
									//'class' => 'checkbox-inline no_indent'
								)); ?>
								<?php echo $this->Form->input('Requirement.2.name', array(
									'format' => array( 'label', 'before', 'input', 'between', 'error', 'after'),
									'value' => 'test2',
									'type' => 'checkbox',
									'before' => '<label class="checkbox-inline">',
									'between' => '3 </label>'
								    //'empty' => __('請選擇'),
	    							//'label' => array(
	    							//	'class' => 'control-label',
	    							//	'text' => __('性別')
	    							//	),
								    //'div' => 'form-group',
									//'class' => 'checkbox-inline no_indent'
								)); ?>
      						</div>
   						</div>
  					</div>
				</div>			
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo __('其他要求'); ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php echo $this->Form->input('ExtraRequirement.0.name', array(
			    	'div' => 'form-group',
			    	'class' => 'form-control',
			    	//'label' => __('其他要求'), 
					'placeholder' => __('其他要求')
				)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">	
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
		<?php 
		$options = array(
			'label' => __('下一步'),
			'class' => 'btn btn-default pull-right', 
			'div' => array(
				'class' => 'form-group'
			)
		);
		echo $this->Form->end($options); ?>		
	</div>
</div>
</div>
<script>
	$(document).ready(function getValue() {
		var x = document.getElementById('PostDuration').value;
		updateInput(x);
		//console.log(x);
	});

	var counter = 1;
	function moreFields(val1, val2, val3) {
		counter++;
		var newField = document.getElementById(val1).cloneNode(true);
		newField.id = 'root' + counter;
		//console.log(newField.id);
		newField.style.display = 'block';
		var newFields = newField.querySelectorAll('[name], [id], [for]');
			for (var i=0;i<newFields.length;i++) {
				var theNames = newFields[i].name
				if (theNames)
					newFields[i].name = "data[" + val3 + "][" + counter + "][" + theNames + "]";
					//console.log(newFields[i].name);
				var theNames2 = newFields[i].id;
		        if (theNames2)
		            newFields[i].id = theNames2 + counter;
		        	//console.log(newFields[i].id); 
		        var theNames3 = newFields[i].htmlFor;
		        if (theNames3)
		            newFields[i].htmlFor = theNames3 + counter;
		        	//console.log(newFields[i].htmlFor);   	
			}			
		var insertHere = document.getElementById(val2);
		insertHere.parentNode.insertBefore(newField, insertHere);

	    $(function () {
	        $("#" + newFields[3].id).datetimepicker({
			    format: 'LT' //display hour and minute only
			});
	        $("#" + newFields[6].id).datetimepicker({
	        	format: 'LT' //display hour and minute only
	        });

			$("#" + newFields[3].id).on("dp.change", function (e) {
				var CurrStartDate = new Date($("#" + newFields[3].id).data("DateTimePicker").date());
			    var CurrEndDate = new Date($("#" + newFields[6].id).data("DateTimePicker").date());

			    //Make sure year, month and dates of both dates stay the same all the time
			    CurrEndDate.setDate(CurrStartDate.getDate());
			    CurrEndDate.setMonth(CurrStartDate.getMonth());
			    CurrEndDate.setFullYear(CurrStartDate.getFullYear());

				if (CurrStartDate > CurrEndDate) {
			    	CurrEndDate.setHours(CurrStartDate.getHours() + duration_hour);
			    	CurrEndDate.setMinutes(CurrStartDate.getMinutes() + duration_min);
			    	$("#" + newFields[6].id).data("DateTimePicker").date(CurrEndDate);
			    }
			});
			$("#" + newFields[6].id).on("dp.change", function (e) {
			    var CurrStartDate = new Date($("#" + newFields[3].id).data("DateTimePicker").date());
			    var CurrEndDate = new Date($("#" + newFields[6].id).data("DateTimePicker").date());

			    //Make sure  year, month and dates of both dates stay the same all the time
			    CurrStartDate.setDate(CurrEndDate.getDate());
			    CurrStartDate.setMonth(CurrEndDate.getMonth());
			    CurrStartDate.setFullYear(CurrEndDate.getFullYear());

			    if (CurrStartDate > CurrEndDate) {
			    	CurrStartDate.setHours(CurrEndDate.getHours() + duration2_hour);
			    	CurrStartDate.setMinutes(CurrEndDate.getMinutes() + duration2_min);
			    	$("#" + newFields[3].id).data("DateTimePicker").date(CurrStartDate);
			    }
	        });
	    });	    
	}
	//window.onload = moreFields2;
</script>
<br>