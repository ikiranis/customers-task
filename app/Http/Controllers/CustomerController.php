<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerFormRequest;
use App\Http\Services\ImportCSVService;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($filter = true)
    {
        $customers = Customer::all();

        return view('customers.index', compact(['customers', 'filter']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CustomerFormRequest $request)
    {
        $validatedData = $request->validated();

        $input = $request->all();

        try {
            $customer = Customer::create($input);
        } catch (\Exception $e) {
            return redirect(route('customers.create'))
                ->withErrors(['Cant create the customer ' . $e->getMessage()]);
        }

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $customer = Customer::whereId($id)->first();

        return view('payments.index', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CustomerFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $input = $request->all();

        $customer = Customer::findOrFail($id);

        try {
            $customer->update($input);
        } catch (\Exception $e) {
            return redirect(route('customers.create'))
                ->withErrors(['Cant update the customer ' . $e->getMessage()]);
        }

        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $customer = Customer::whereId($id);

        try {
            $customer->delete();
        } catch (\Exception $e) {
            return redirect(route('index'))
                ->withErrors(['Cant delete the customer ' . $e->getMessage()]);
        }

        return redirect(route('index'));
    }

    /**
     * Start the import of CSV file
     *
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function importPayments() {
        try {
            $importSCV = new ImportCSVService('file.scv');
            $importSCV->import();

            return redirect()->back()->with('message', 'Importing CSV file. Refresh page after a while to see the changes!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }

    }
}
