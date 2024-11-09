<?php

use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;


class ArticlePage extends Page{
    
    private static $db = [
        'Date' => 'Date',
        'Teaser' => 'Text',
        'Author' => 'Varchar',
      ];
      
    private static $can_be_root = false;
    /*
Wenn wir nun versuchen, eine ArticlePage auf der Stammebene der
Site-Struktur zu erstellen, ist die Aktion nicht zulässig. 
*/
    
    private static $many_many = [
        'Categories' => ArticleCategory::class
    ];
    
    public function getCMSFields(){
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', DateField::create('Date','Date of article'), 'Content');
        $fields->addFieldToTab('Root.Main', TextareaField::create('Teaser')
     ->setDescription('This is the summary that appears on the article list page.'),
        'Content'
        );
        $fields->addFieldToTab('Root.Main', TextField::create('Author','Author of article'), 'Content');
        $fields->addFieldToTab('Root.Categories', CheckboxSetField::create(
            'Categories',
            'Selected categories',
            $this->Parent()->Categories()->map('ID','Title')
        ));
        return $fields;
    }
    
/*
- Categories: Der Name der $many_many-Beziehung, die wir verwalten.
- „Selected categories“: Eine Beschriftung für die Kontrollkästchen.
$this->Parent()->Categories(): Die Kategorien werden auf der übergeordneten
ArticleHolder-Seite gespeichert, daher müssen wir zuerst Parent() aufrufen.
- ->map('ID', 'Title'): Erstellen Sie anhand der resultierenden
Kategorienliste ein Array, das die ID jeder Kategorie ihrem Titel zuordnet.
Dadurch werden die Kontrollkästchen angewiesen, die ID in der Beziehung zu
speichern, das Feld „Titel“ jedoch als Beschriftung anzuzeigen. Beachten
Sie, dass Title eine beliebige öffentliche Methode sein kann, die für das
Objekt ausführbar ist. Dies ist nützlich, wenn Sie einen berechneten Wert
oder eine Verkettung mehrerer Felder wünschen. In 99 % der Fälle werden
Sie hier die ID als erstes Argument verwenden wollen, da alle relationalen
Daten durch eindeutige Bezeichner zusammengehalten werden.
*/

    public function CategoriesList()
        {
            if($this->Categories()->exists()) {
                return implode(', ', $this->Categories()->column('Title'));
            }

            return null;
        }
    
}
