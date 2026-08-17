<?php

namespace App\Http\Controllers\Rv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class SetupController extends Controller
{
    private function enabled(): bool
    {
        return File::exists(storage_path('app/rv-setup-enabled'));
    }

    public function index()
    {
        abort_unless($this->enabled(), 404);

        return view('rv.setup', [
            'installed' => Schema::hasTable('rv_sites'),
        ]);
    }

    public function run()
    {
        abort_unless($this->enabled(), 404);

        Artisan::call('migrate', ['--force' => true]);

        return view('rv.setup', [
            'installed' => Schema::hasTable('rv_sites'),
            'output' => Artisan::output(),
        ]);
    }
}
