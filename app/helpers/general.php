<?php


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



define('WEBLINK', 'http://lorembroker');



function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    // Update your secret key before use
    $secret_key = '$PPcFrkSqov1r5ZzreSH5YH7DgTOVNPIqG2Ng5yuA/';
    // Update your secret iv before use
    $secret_iv = 'sf67VQQwABeJKSOwadJkqPWXWPKVu3LQV1PRNrGt/';
    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function check_right($table,$right)
{
    if (Auth::check()) {
        $user = Auth::user();

        $letter=strtoupper(substr($right,0,1));


        $related = new Collection();
        foreach ($user->groups as $group) {
            $related = $related->merge(tables($group->GroupID, $table));

        }


        $filteredCollection = $related->filter(function ($item) use ($letter) {
            return stripos($item, $letter) !== false;
        });

        if (count($filteredCollection) > 0) return true;
        else return false;
    }
    return false;
}





function tables($id,$table)
{

//    $tables=DB::table('system_ugrights')
//        ->select('TableName', 'AccessMask')
//        ->where('GroupID', $id)
//        ->where('TableName', 'endorsements')
//        ->get();


    $tables=DB::table('system_ugrights')

        ->where('GroupID', $id)
        ->where('TableName', $table)
        ->pluck('AccessMask');


    return $tables;
}



