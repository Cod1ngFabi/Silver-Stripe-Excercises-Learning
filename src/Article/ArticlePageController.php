<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;

class AriclePageController extends PageController{
    
    public function CommentForm(){
        $form = Form::create(
          $this,
          __FUNCTION__,
          FieldList::create(
            TextField::create('Name','')
            ->setAttribute('placeholder', '*Name')
            ->addExtraClass('form-control'),
            EmailField::create('Email','')
            ->setAttribute('placeholder','Email*')
            ->addExtraClass('form-control'),
            TextareaField::create('Comment','')
            ->setAttribute('placeholder','Comment*')
            ->addExtraClass('form-control')
          ),
           FieldList::create(
            FormAction::create('handleComment','Post Comment')
            ->setUseButtonTag(true)
            ->addExtraClass('btn btn-default-color btn-lg')
           ),
           RequiredFields::create('Name','Email','Comment')
        );
        
        /* oder Klassen und Platzhalter dynamisch zuweisen
        foreach($form->Fields() as $field) {
        $field->addExtraClass('form-control')
               ->setAttribute('placeholder', $field->getName().'*');            
        }
        */
        
        $form->addExtraClass('form-style');
        
        
        return $form;
    }
    
}
