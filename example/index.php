<?php

require_once '../FrameworkExtensions/Bootstrap3/Bootstrap.php';

class index extends \Bootstrap\Document {
	
	public function __construct() {
		parent::__construct('hello', 'utf-8', 'en');
	
		$body = $this->body;

		$form = $body->addForm(1, 'myForm', '/');

		$form->setFormInline(true, false);
		$form->setFormHorizontal();
		$form->setHorizontalLabelOffset(2);
		
		$form->addFormGroupWithLabelTextFieldAndHelpBlock('myGroup', 'My Field', 'Placeholder', null, 'Help Block');
		
		$successGroup = $form->addFormGroupWithLabelAndTextField('myGroup', 'My Field', 'Placeholder');
		$successGroup->setSuccessState(true);
		
		$warningGroup = $form->addFormGroupWithLabelAndTextField('myGroup', 'My Field', 'Placeholder');
		$warningGroup->setWarningState(true);
		
		$errorGroup = $form->addFormGroupWithLabelAndTextField('myGroup', 'My Field', 'Placeholder');
		$errorGroup->setErrorState(true);
		
		$form->addFormGroupWithSelectField('mySelect', 'My Select', array(1, 2, 3));
		
		$form->addFormGroupWithCheckBox('myCheckBox', 'My Checkbox');
		
		$form->addFormGroupWithRadioButton('myRadioButton', 'My Radio Button');
		$form->addFormGroupWithRadioButton('myRadioButton', 'My Radio Button', null, true);
		$form->addFormGroupWithRadioButton('myRadioButton', 'My Radio Button');
		
		$button = $form->addButton('My Button', 'myButton', 'info');
		$button->setDangerStyle();
		
	}
	
}

$document = new index();
$document->printAll();