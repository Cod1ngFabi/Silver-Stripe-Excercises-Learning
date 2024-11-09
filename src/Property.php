<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\ArrayLib;
use SilverStripe\Forms\TabSet;
use SilverStripe\Versioned\Versioned;

class Property extends DataObject{
    
    private static $db = [
        'Title' => 'Varchar',
        'PricePerNight' => 'Currency',
        'Bedrooms' => 'Int',
        'Bathrooms' => 'Int',
        'FeaturedOnHomepage' => 'Boolean'    
    ];
    
    private static $has_one = [
        'Region' => Region::class,
        'PrimaryPhoto' => Image::class
    ];
    
    private static $owns = [
        'PrimaryPhoto',
    ];
    
    private static $extensions = [
        Versioned::class,
    ];
    
    private static $versioned_gridfield_extensions = true;
    
    public function getCMSFields(){
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main',[
            TextField::create('Title'),
            CurrencyField::create('PricePerNight', 'Price per Night'),
            DropdownField::create('Bedrooms')
            ->setSource(ArrayLib::valuekey(range(1,10))),
            DropdownField::create('Bathrooms')
            ->setSource(ArrayLib::valuekey(range(1,10))),
            DropdownField::create('RegionID','Region')
            ->setSource(Region::get()->map('ID','Title')),
            CheckboxField::create('FeaturedOnHomepage', 'Feature on Homepage')
        ]);
        $fields->addFieldToTab('Root.Photos', $upload = UploadField::create(
            'PrimaryPhoto', 'Primary Photo'
        ));
        
        $upload->getValidator()->setAllowedExtensions(array(
            'png','jpeg','jpg','gif'
        ));
        $upload->setFolderName('property-photos');
        
        return $fields;   
    }
    
    private static $summary_fields = [
        'Title' => 'Title',
        'Region.Title' => 'Region',
        'PricePerNight.Nice' => 'Price',
        'FeaturedOnHomepage.Nice' => 'Featured?'
    ];
    
    public function searchableFields(){
        return [
            'Title' => [
                'filter' => 'PartialMatchFilter',
                'title' => 'Title',
                'field' => TextField::class,
            ],
            'RegionID' => [
                'filter' => 'ExactMatchFilter',
                'title' => 'Region',
                'field' => DropdownField::create('RegionID')
                ->setSource(
                    Region::get()->map('ID','Title')
                )
                ->setEmptyString('-- Any Region')
            ],
            'FeaturedOnHomepage' => [
                'filter' => 'ExactMatchFilter',
                'title' => 'Only featured'              
            ] 
        ];
    } 
    
/* 
filter: Der Filtertyp, der bei der Suche verwendet werden soll. Eine 
vollständige Liste der verfügbaren Filter finden Sie unter 
Framework/src/ORM/Filters
title == label
*/
    
}
