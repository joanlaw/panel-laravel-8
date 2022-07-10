<?php

namespace App\Http\Controllers;
use App\Models\Matche;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MatchController extends Controller
{
    public function match(Request $request)
    {
    // select all animal where pet=pet filed , race =race field    
    $matches=Matche::all()->where('pet',$request->pet)->where('race',$request->race);
        if($request->color){
            // if we have color in filed , we will choose just color matched the same thing for features 
            $matches=$matches->whereIn('color',$request->color);
        }
       foreach($matches as $match)
        {
               $details = [
                    'pet' => $request->pet,
                    'race' =>$request->race,
                    'colors' =>implode($request->color ?? ["empty"]),
                    'features' =>implode($request->features ?? ["empty"]),
                    'adult' =>implode($request->adult ??["empty"]),
                    'child' =>implode($request->child ?? ["empty"]),
                    'startdate' =>$request->startdate,
                    'enddate' =>$request->enddate,
                    'comment' =>$request->comment,
                    
                ];
                Mail::to($match->email)->send(new \App\Mail\MyTestMail($details));
                // send mail
                   
        }
        return $matches; 

    }
}
