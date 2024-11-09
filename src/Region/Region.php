<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Versioned\Versioned;


class Region extends DataObject{
    
    private static $db = [
        'Title' => 'Varchar',
        'Subtitle' => 'Text',
        'Description' => 'Text',
        'Link' => 'Varchar'
    ];
    
    private static $has_one = [
        'Photo' => Image::class,
        'RegionsPage' => RegionsPage::class
    ];
    
    private static $owns = [
        'Photo'
    ];

/*  Das Array $owns  wird verwendet, um sicherzustellen, dass beim
    Speichern von Regionen auch die zugehörigen Bilder veröffentlicht
    werden. Dateien und Bilder sind standardmäßig Entwürfe, bis sie
    explizit veröffentlicht werden. Dadurch wird sichergestellt, dass sie
    implizit mit der Seite veröffentlicht werden, die sie verwendet.
*/
    
    private static $extensions = [
        Versioned::class,
    ];
    
    private static $versioned_gridfield_extensions = true;
    
    private static $summary_fields = [
        'Photo.Filename' => 'Photo file name',
        'Title' => 'Title of region',
        'Description' => 'Short description'
    ];

    public function getCMSFields(){
        
        $fields = FieldList::create(
            TextField::create('Title'),
            TextareaField::create('Subtitle'),
            TextareaField::create('Description'),
            TextField::create('Link'),
            $uploader = UploadField::create('Photo')
        );
        
        $uploader->setFolderName('region-photos');
        $uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);
       
        return $fields;
    }
    
    /*
    public function getGridThumbnail(){
        if($this->Photo()->exists()) {
            return $this->Photo()->ScaleWidth(100);
        }

        return "(no image)";
    }
        FUNKTIONIERT NICHT ?!
     */
    
     public function Link(){
        return $this->RegionsPage()->Link('show/'.$this->ID);
     }
    
    
}
