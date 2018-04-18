<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {

    /**
     * input method
     *
     * @param string $fieldName
     * @param array $options
     */
	public function input($fieldName, $options = array()) {
	    if($fieldName == 'Subject') {
	    	if($this->params['controller'] == 'orders') {
	    		$form = 'form.data';
	    	} elseif ($this->params['controller'] == 'profiles') {
	    		$form = 'form2.data';
	    	}
	        return $this->inputAccordionCheckboxes($fieldName, $options, $form);
	    }
	    
	    return parent::input($fieldName, $options);
	}
	
	private function inputAccordionCheckboxes($fieldName, $options, $form){
		$temp = SessionHelper::read($form);
	    $chkOptions = $options['options'];
	    $string = '';	
	    $string = '<input type="hidden" name="data[Subject][Subject]" value="" id="SubjectSubject"/><div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
		$i = 1;
		$toggle = 'in';
			foreach($chkOptions as $field => $boxes) {
	        	$string .= '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading' . $i . '"><h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse' . $i . '" aria-expanded="false" aria-controls="collapse' . $i . '">' . $field . '</a></h4></div><div id="collapse' . $i . '" class="panel-collapse collapse ' . $toggle . '" role="tabpanel" aria-labelledby="heading' . $i . '"><div class="panel-body">';
	        	foreach($boxes as $key => $value) {
	        		$checked = '';
	        		if(isset($temp['Subject']['Subject'])) {
	        			foreach($temp['Subject']['Subject'] as $subVal => $subVal2) {
	        				if($key == $subVal2) {
	        					$checked = 'checked="checked"';
	        				}
	        			}
	        		}
	        		$string .= '<div class="checkbox-inline no_indent"><input type="checkbox" name="data[Subject][Subject][]"' . $checked . ' value="' . $key . '" id="SubjectSubject' . $key . '" /><label for="SubjectSubject' . $key . '">' . $value . '</label></div>';
	        	}
	        	$string .= '</div></div></div>';
	    		$i++;
	    		$toggle = '';
			}
			$string .= '</div>';
	    return $string;
	}
}