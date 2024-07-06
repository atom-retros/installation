<?php

namespace Atom\Installation\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Atom\Installation\Models\WebsiteSetting;
use Atom\Installation\Models\WebsiteInstallation;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Atom\Installation\Http\Requests\InstallationStoreCommand;
use Atom\Installation\Http\Requests\InstallationUpdateCommand;

class InstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('installation::index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstallationStoreCommand $request): RedirectResponse
    {
        WebsiteInstallation::first()
            ->update(['step' => 1, 'user_ip' => $request->ip()]);

        return redirect()->route('installation.show', ['installation' => 1]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $installation): View
    {
        $name = WebsiteSetting::firstWhere('key', 'hotel_name');

        $settings = WebsiteSetting::whereIn('key', Arr::get(config('installation.settings', []), $installation, []))
            ->get();

        return view('installation::step', [
            'name' => $name,
            'step' => $installation,
            'settings' => $settings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstallationUpdateCommand $request, int $installation): RedirectResponse
    {
        $installation = WebsiteInstallation::first();

        $installation->update([
            'step' => $installation->step === count(config('installation.settings', [])) ? $installation->step : $installation->step + 1,
            'completed' => $installation->step === count(config('installation.settings', [])),
        ]);

        if ($installation->completed) {
            return redirect()->route('welcome');
        }

        foreach ($request->validated() as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('installation.show', ['installation' => $installation->step]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $installation): RedirectResponse
    {
        WebsiteInstallation::first()
            ->update(['step' => 0, 'user_ip' => null, 'installation_key' => Str::uuid(), 'completed' => false]);

        return redirect()->route('installation.index');
    }
}
