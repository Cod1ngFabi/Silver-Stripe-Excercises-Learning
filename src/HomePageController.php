<?php

class HomePageController extends PageController
{

    public function FeaturedProperties()
    {
        return Property::get()
                ->filter(array(
                    'FeaturedOnHomepage' => true
                ))
                ->limit(6);
    }   
}
