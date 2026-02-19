<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\BillingItem;
use App\Models\Service;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BillingController extends Controller
{
    public function index(): View
    {
        $billings = Billing::latest()->get();
        return view('admin.billings.index', compact('billings'));
    }

    public function create(): View
    {
        $services = Service::all();
        return view('admin.billings.create', compact('services'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'customer_mobile' => 'nullable|string|max:20',
            'services' => 'required|array|min:1',
            'services.*' => 'exists:services,id',
            'discount_amount' => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $totalAmount = 0;
            $itemsData = [];

            foreach ($request->services as $serviceId) {
                $service = Service::find($serviceId);
                $totalAmount += $service->price;
                $itemsData[] = [
                    'service_id' => $service->id,
                    'price' => $service->price,
                ];
            }

            $discount = $request->discount_amount ?? 0;
            $netAmount = $totalAmount - $discount;

            $billing = Billing::create([
                'bill_number' => 'BILL-' . strtoupper(uniqid()),
                'customer_name' => $request->customer_name,
                'customer_mobile' => $request->customer_mobile,
                'total_amount' => $totalAmount,
                'discount_amount' => $discount,
                'net_amount' => $netAmount,
            ]);

            foreach ($itemsData as $item) {
                $billing->items()->create($item);
            }

            DB::commit();
            notify()->success('Billing generated successfully.', 'Success');
            return redirect()->route('admin.billings.show', $billing->id);
        } catch (Exception $e) {
            DB::rollBack();
            notify()->error('Failed to generate billing.', 'Error');
            return back()->withInput();
        }
    }

    public function show(Billing $billing): View
    {
        $billing->load('items.service');
        return view('admin.billings.show', compact('billing'));
    }

    public function destroy(Billing $billing): RedirectResponse
    {
        try {
            $billing->delete();
            notify()->success('Billing record deleted.', 'Success');
        } catch (Exception $e) {
            notify()->error('Failed to delete billing record.', 'Error');
        }
        return back();
    }
}
