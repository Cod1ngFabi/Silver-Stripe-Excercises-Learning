<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class RegionsPage extends Page{
    
    private static $has_many= [
        'Regions' => Region::class
    ];
    
/*  $has_many-Beziehungen stellen einen Sonderfall dar, da sie von der
    zugehörigen Klasse erwidert werden müssen. Während jede RegionsPag
    viele Regionen hat, stimmt es auch, dass jede Region eine RegionPage
    hat, die sie enthält. Regionen können nicht zu mehr als einer
    Regionsseite gehören.
*/
    
    private static $owns = [
        'Regions'    
    ];
    
/* In der $owns-Deklaration muss man nicht den vollständig qualifizierten 
   Klassennamen Region::class verwenden. Das liegt daran, dass wir uns auf
   die Beziehung beziehen, nicht auf die Klasse. Die Beziehung wird im 
   has_many-Array als Regionen deklariert. Die Einträge in $owns könnten
   genauso gut Methodennamen sein, wenn Sie den Besitz in einem
   benutzerdefinierten Getter deklarieren möchten.

*/
    
    


    public function getCMSFields(){
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Region', GridField::create(
            'Regions',              // Ein erforderlicher, beliebiger Name für das GridField
            'Regions on this page', // Ein Titel für das GridField. Sollte benutzerfreundlich sein.
            $this->Regions(), 
/* Es füllt das Raster mit Daten. In diesem Fall verwenden wir die
   magische Methode, die durch unsere $has_many-Beziehung erstellt wurde, um das Raster mit allen
   Datensätzen zu füllen, die derzeit mit der Seite verknüpft 
   sind. 
*/
            GridFieldConfig_RecordEditor::create()
        ));
        return $fields;
    }
    
}
