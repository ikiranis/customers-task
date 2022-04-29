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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImportCSVService
{
    private $file;

    /**
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @throws \Exception
     */
    public function import() : void {
        if(Storage::disk('public')->exists($this->file)) {
            try {
                $stream = Storage::disk('public')->readStream($this->file);
            } catch (\Exception $e) {
                throw new \Exception("Problem with file");
            }

            $firstLine = fgets($stream);

            while (!feof($stream)) {
                ImportCSV::dispatch(fgets($stream));
            }
        } else {
            throw new \Exception("File doesn't exist");
        }

    }
}
