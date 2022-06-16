<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function ajaxCheck(Request $request)
    {
        $input =   str_replace(' ', '', $request->input); //to remove blank spaces from input

        $alphabets = range('a', 'z');

        // to convert an input string into an array
        $array = str_split($input);


        foreach ($array as $char) {
            //check if character is alphabet or not
            if (ctype_alpha($char)) {

                //check for upper case character and convert it to lower case
                if (ctype_upper($char)) {
                    $char = strtolower($char);
                }

                $key = array_search($char, $alphabets);
                if ($key !== false) {
                    unset($alphabets[$key]);                 //to delete an element from alphabets array
                }
            } else {
                return "invalid Input";
            }
        }

        if (!$alphabets) {               //to check whether an alphabets array is empty or not
            return  "Valid";
        } else {
            return "Missing Character(s): " . implode("  ", $alphabets);;        //prints the missings characters 
        }
    }



 




}
