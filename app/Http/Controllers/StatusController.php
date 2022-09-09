<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Str;

class statusController extends Controller
{
    public function store(Request $request): void {
        $status = Status::first();
        if($status == null) {
            $status = new Status();
            $status->id = Str::uuid()->toString();
        }
        $status->status = $request->status;
        $status->save();
    }

    public function show(): Factory|View|Application
    {
        $status = Status::first()->status;
        return view('welcome', ['hokStatus' => $status]);
    }
}
