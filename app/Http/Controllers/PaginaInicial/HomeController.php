<?php

namespace App\Http\Controllers\PaginaInicial;

use App\Http\Controllers\Controller;
use App\Models\Affiliates\Affiliates;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index() {  
        return view('PaginaInicial\home');
    }

    public function distance($lat1, $lon1, $lat2, $lon2) {
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);
        $dist = (6371 * acos(cos($lat1) * cos($lat2) * cos($lon2 - $lon1) + sin($lat1) * sin($lat2)));
        $dist = number_format($dist, 3, '.', '');
        return $dist;
    }

    public function affiliates(Request $request) {
        $office = [
            "latitude"=> 53.3340285, 
            "affiliate_id"=> 12, 
            "name"=> "Yosef Giles", 
            "longitude"=> -6.2535495
        ];
        $affiliates = Affiliates::toReadFile();

        foreach($affiliates as $afl) {
            $afl->distance = (float)self::distance($office['latitude'], $office['longitude'], $afl->latitude, $afl->longitude);
        }
        $response = [
            'affiliates' => $affiliates,
            'office' => $office,
        ];
        return $response;
    }
    // -------------------------------------formulas that don't work for me --------------------------------

    // public function DnsDew($d) {
    //     $pi2 = pi() * 2;
    //     $raio = 6371; // earth R
    //     $deltaA = $d;
    //     $dns = ($pi2 * $raio * $deltaA) / 360;

    //     $result = $dns;
    //     return $result;
    // }
    
    // public function DlaDlo($p1, $p2) {
    //     $result = 0;
    //     if ($p1 > 0 && $p2 > 0 || $p1 < 0 && $p2 < 0) {
    //         $result = $p1 - $p2;
    //     } else {
    //         $result = $p1 + $p2;
    //     }
    //     return $result;
    // }
    
    // public function distance($dns, $dew) {
        
    //     $d = sqrt( (($dns**2) + ($dew**2)) );
    //     $d = $d * 0.95384;

    //     return $result = $d;
    // }
    
    
    
    // // to calculate the distance between this point with the earth: radian * 6400km (earth radius)
    // public function convertToRadians($decimal) {
    //     $result = ($decimal * pi()) / 180;
    //     return $result;
    // }


    // public function distancia($lat1, $lon1, $lat2, $lon2) {

    //     $lat1 = deg2rad($lat1);
    //     $lat2 = deg2rad($lat2);
    //     $lon1 = deg2rad($lon1);
    //     $lon2 = deg2rad($lon2);

    //     $dist = (6371 * acos(cos($lat1) * cos($lat2) * cos($lon2 - $lon1) + sin($lat1) * sin($lat2)));
    //     $dist = number_format($dist, 3, '.', '');
    //     return $dist;
    // }

    
    // // its return is an Array Hash
    // public function convertToDegree($latitude, $longitude) {
    //     $zero = "0";
    //     $response = explode(".", $latitude);
        
    //     $degree = (int)$response[0];
        
    //     $response = (float)$zero. "." .(float)$response[1];
    //     $response = (float)$response;
        
    //     $response = explode(".", (float)$response * 60);
    //     $minutes = (int)$response[0];
        
    //     $response = (float)$zero. "." .(float)$response[1];
    //     $response = (float)$response;
        
    //     $seconds = (float)$response * 60;
    //     $direction = strrchr($degree, '-');
    //         if ($direction != false) {
    //             $direction = 'S';
    //         } else {
    //             $direction = 'N';
    //         }
    //         $latitude = [
    //             'degree' => $degree,
    //             'minutes' => $minutes,
    //             'seconds' => $seconds,
    //             'direction' => $direction
    //         ];
            
    //     $response = explode(".", $longitude);
            
    //     $degree = (int)$response[0];
            
    //     $response = (float)$zero. "." .(float)$response[1];
    //     $response = (float)$response;
        
    //     $response = explode(".", (float)$response * 60);
        
    //     $minutes = (int)$response[0];
        
    //     $response = (float)$zero. "." .(float)$response[1];
    //     $response = (float)$response;

    //     $seconds = (float)$response * 60;
    //     $direction = strrchr($degree, '-');

    //         if ($direction != false) {
    //             $direction = 'W';
    //         } else {
    //             $direction = 'E';
    //         }

    //     $longitude = [
    //         'degree' => $degree,
    //         'minutes' => $minutes,
    //         'seconds' => $seconds,
    //         'direction' => $direction
    //     ];

    //         $data = [
    //             'latitude' => $latitude,
    //             'longitude' => $longitude
    //         ];
        
    //     $result = $data;
    //     return $result;
    // }
    // // is a float
    // public function convertToDecimal($degree, $minutes, $seconds) {
    //     $result = $seconds / 60;
    //     $result = ($minutes + $result) / 60;
    //     if($degree < 0) {
    //         $str = '';
    //         $degree1 = substr(strval($degree), 1);
    //         $degree1 = (int)$degree1;
    //         $result = $str. '-' .($degree1 + $result);
    //         $result = (float)$result;
    //     } else{
    //         $result = $degree + $result;
    //     }
    //     return $result;
    // }
}
