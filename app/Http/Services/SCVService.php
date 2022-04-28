<?php
/**
 *
 * File: SCVService.php
 *
 * Created by Yiannis Kiranis <rocean74@gmail.com>
 * http://www.apps4net.eu
 *
 * Date: 28/4/22
 * Time: 10:29 μ.μ.
 *
 */

namespace App\Http\Services;

use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SCVService
{
    private $file = "file.scv";

    public function import() : void {
        $stream = Storage::disk('public')->readStream($this->file);

        $firstLine = fgets($stream);

        while (!feof($stream)) {
            $this->writeDataInDB(fgets($stream));
        }

    }

    private function writeDataInDB($string) : void {
        if($string != '') {
            $parameters = str_getcsv($string);

            $input = [
                'customer_email' => $parameters[0],
                'amount' => intval($parameters[1]),
                'date' => $parameters[2]
            ];

            $payment = Payment::create($input);
        }

    }

}
