<?php

use SilverStripe\Control\HTTPRequest;

class RegionsPageController extends PageController{
    
    private static $allowed_actions = [
        'test',
        'show'
    ];
    
    public function test(){
        die('it works');
    }
    
    public function show(HTTPRequest $request)
    {
        $region = Region::get()->byID($request->param('ID'));
        
        if(!$region){
            return $this->httpError(404, 'That region could not be found');
        }
        
        return [
          'Region' => $region  
        ];
    }
    
}
