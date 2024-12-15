<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use RouterOS\Client;
use RouterOS\Query;

class MikrotikController extends Controller
{
    public function showPPPOE()
    {
        // Konfigurasi koneksi ke Mikrotik
        $client = new Client([
            'host' => '10.10.10.1',  // IP Mikrotik
            'user' => 'project',     // Username Mikrotik
            'pass' => 'project',     // Password Mikrotik
            'port' => 8728,          // Port API Mikrotik
        ]);

        try {
            $query = new Query('/ppp/active/print');
            $response = $client->query($query)->read();

            return view('pages.pppoe', ['activePPPoE' => $response]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal terhubung ke Mikrotik: ' . $e->getMessage()]);
        }
    }

    public function showLogs()
    {
        // Konfigurasi koneksi ke Mikrotik
        $client = new Client([
            'host' => '10.10.10.1',  // IP Mikrotik
            'user' => 'project',     // Username Mikrotik
            'pass' => 'project',     // Password Mikrotik
            'port' => 8728,          // Port API Mikrotik
        ]);

        try {
            $query = new Query('/interface/print');
            $response = $client->query($query)->read();

            return view('pages.interface', ['interfaces' => $response]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal terhubung ke Mikrotik: ' . $e->getMessage()]);
        }
    }
}
