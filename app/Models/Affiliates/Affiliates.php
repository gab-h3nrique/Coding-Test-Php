<?php

namespace App\Models\Affiliates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliates extends Model
{
    use HasFactory;

    //Model
    public static function toReadFile() {
        $file = file_get_contents('./affiliates.txt');

        $json = json_encode($file);

        $filename = './affiliates.txt';
        $array = [];
        $f = fopen($filename, 'r');
        if (!$f) {
            return;
        }
        while (!feof($f)) {
            $array[] = json_decode(fgets($f));
        }
        fclose($f);

        return $array;
    }
}
