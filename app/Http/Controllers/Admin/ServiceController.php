<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        try {
            Service::create($request->all());
            notify()->success('Service created successfully.', 'Success');
            return redirect()->route('admin.services.index');
        } catch (Exception $e) {
            notify()->error('Failed to create service.', 'Error');
            return back()->withInput();
        }
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        try {
            $service->update($request->all());
            notify()->success('Service updated successfully.', 'Success');
            return redirect()->route('admin.services.index');
        } catch (Exception $e) {
            notify()->error('Failed to update service.', 'Error');
            return back()->withInput();
        }
    }

    public function destroy(Service $service): RedirectResponse
    {
        try {
            $service->delete();
            notify()->success('Service deleted successfully.', 'Success');
        } catch (Exception $e) {
            notify()->error('Failed to delete service.', 'Error');
        }
        return back();
    }
}
