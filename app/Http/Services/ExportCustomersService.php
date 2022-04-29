<?php
/**
 *
 * File: ExportCustomers.php
 *
 * Created by Yiannis Kiranis <rocean74@gmail.com>
 * http://www.apps4net.eu
 *
 * Date: 29/4/22
 * Time: 4:19 π.μ.
 *
 */

namespace App\Http\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class ExportCustomersService
{
    private $file;

    /**
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    public function export() {
        $customers = Customer::all();

        $firstLine = 'Customer email,amount,date';

        Storage::disk('public')->put($this->file, $firstLine);

        foreach ($customers as $customer) {
            $csvLine = $customer->name . ','
                . $customer->email . ','
                . $customer->payments()->sum('amount') . ','
                . $customer->payments()->count();

            Storage::disk('public')->append($this->file, $csvLine);
        }
    }
}
