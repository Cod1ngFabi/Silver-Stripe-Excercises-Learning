<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class ArticleHolder extends Page{
    
    private static $db = [];
    
    private static $allowed_children = [
        ArticlePage::class
    ];

/*
$allowed_children ist genau das, wonach es sich anhört. Es handelt sich
um eine Liste der Seitentypen, die unter diesem Seitentyp erstellt werden
dürfen. Beachten Sie, dass hier auch ein Skalarwert akzeptiert wird, wenn
Sie nur einen Seitentyp haben.
*/
    
    private static $has_many = [
        'Categories' => ArticleCategory::class,
    ];
    
    public function getCMSFields(){
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Categories', GridField::create(
            'Categories',
            'Article Categories',
            $this->Categories(),
            GridFieldConfig_RecordEditor::create()
        ));
        return $fields;
    }
    
}
