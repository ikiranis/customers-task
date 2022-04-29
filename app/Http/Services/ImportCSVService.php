<?php
/**
 *
 * File: ImportCSVService.php
 *
 * Created by Yiannis Kiranis <rocean74@gmail.com>
 * http://www.apps4net.eu
 *
 * Date: 29/4/22
 * Time: 5:56 π.μ.
 *
 */

namespace App\Http\Services;

use App\Jobs\ImportCSV;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;

class ImportCSVService
{
    private $file = "file.scv";

    public function import() : void {
        $stream = Storage::disk('public')->readStream($this->file);

        $firstLine = fgets($stream);

        while (!feof($stream)) {
            ImportCSV::dispatch(fgets($stream));
        }

    }
}
