<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coins;
use App\Http\Resources\CoinsResource;

class CoinsController extends Controller {
    public function index() {
        return new CoinsResource(Coins::firstOrFail());
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'coins' => ['required']
        ]);
        $coins = Coins::first();

        if ($coins) {
            $coins->update($validated);
        }  else {
            $coins = Coins::create($validated);
        }

        return new CoinsResource($coins);
    }
}
