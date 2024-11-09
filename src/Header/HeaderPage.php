<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\DataObject;

class HeaderPage extends Page {
    
   /* static $defaults = array(
        'ShowInMenus' => false,
        'ShowInSearch' => false
    );*/
    
    private static $has_one = array(
        'Logo' => Image::class,
        'Icon' => Image::class
    );
    
     //private static $icon = HeaderPage::get()->$icon;
     
     public function getCMSFields(){
        return new FieldList(
            UploadField::create('Logo')->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')),
            UploadField::create('Icon')->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
        );
        
        /*$fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', Gridfield::create(
            'Sections',
            'SectionNames',
            $this->Sections(),
            GridFieldConfig_RecordEditor::create()
        ));*/
        
     }
    
}

