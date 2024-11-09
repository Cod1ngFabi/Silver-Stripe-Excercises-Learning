<?php


namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\Form;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\RequiredFields;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\TextField;


    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_one = [];
        
/*
        public function SimpleContactForm(){
            $myForm = Form::create(
                $controller,
                'SimpleContactForm',
                FieldList::create(
                    TextField::create('YourName', 'Your Name'),
                    TextareaField::create('YourComments', 'Your comments')
                ),
                FieldList::create(
                    FormAction::create('sendContactForm', 'Submit')
                ),
                RequiredFields::create('YourName', 'YourComments')
            );
            
            return $myForm;
        }
        
        public function sendContactForm(){
            $name = $data['YourName'];
            $message = $data['YourMessage'];
            if(strlen($message) < 10){
                $form->addErrorMessage('YourMessage', 'Your Message is too short!', 'bad');
                return $this->redirectBack();
            }
            return $this->redirect('/some/success/url');
        }
*/
        
        
        
    }
}
