<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class CropCondition extends Controller
{
    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');

        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        // The following line is optional if the project id in your credentials file
        // is identical to the subdomain of your Firebase project. If you need it,
        // make sure to replace the URL with the URL of your project.
        ->withDatabaseUri('https://agrofarm-cd23b.firebaseio.com/')
        ->create();

        
        $database = $firebase->getDatabase();

        $ref = $database->getReference("Conditions/");
        //$ref1 = $database->getReference("Conditions/flowers");
        
        

        $Conditions = $ref->getValue();
            foreach($Conditions as $Condition){
            $all_Conditions[] =$Condition;
            }
            
        //return json_encode($all_posts);
        //return view('layouts.pages.posts',compact('all_posts'));
        //return view('layouts.pages.conditions');
        return view('layouts.pages.conditions',compact('all_Conditions'));



    }
    



    public function addcrop(Request $request){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');

            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://agrofarm-cd23b.firebaseio.com/')
            ->create();

            
            $database = $firebase->getDatabase();

            //$ref = $database->getReference("Conditions");

            $croptype = $request->croptype;
            $cropname = $request->cropname;
            $temparature = $request->temparature;
            $humidity = $request->humidity;
            $soilmosture = $request->soilmosture;
            $lightlevel = $request->lightlevel;

            $ref = $database->getReference("Conditions/");
            //$name = strval($temparature);

            $key = $ref->push()->getKey();

            $ref->getChild($key)->set([
                'croptype' => $croptype,
                'cropname' => $cropname,
                'temparature' => $temparature,
                'humidity' => $humidity,
                'soilmosture' => $soilmosture,
                'lightlevel' => $lightlevel,
                'cropKey' => $key
            ]);

            $Conditions = $ref->getValue();
            foreach($Conditions as $Condition){
            $all_Conditions[] =$Condition;
            }
            return view('layouts.pages.conditions',compact('all_Conditions'));


    }
    
}
