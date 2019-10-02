<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class CropController extends Controller
{
    //
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
        
        $ref = $database->getReference("Posts");
        $Posts = $ref->getValue();
        
        foreach($Posts as $post){
            $all_posts[] =$post;
        }
        //return json_encode($all_posts);
        return view('layouts.pages.posts',compact('all_posts'));
        }

        public function addpost(Request $request){
            
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');

            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://agrofarm-cd23b.firebaseio.com/')
            ->create();

            
            $database = $firebase->getDatabase();
            
            //$ref = $database->getReference("Posts");

            $posttitle = $request->title;
            $postdescription = $request->description;

            $ref = $database->getReference("Posts");

            $key = $ref->push()->getKey();

            $ref->getChild($key)->set([
                'title' => $posttitle,
                'description' => $postdescription
            ]);


            $Posts = $ref->getValue();
            foreach($Posts as $post){
            $all_posts[] =$post;
            }
            return view('layouts.pages.posts',compact('all_posts'));


        }
        
}
