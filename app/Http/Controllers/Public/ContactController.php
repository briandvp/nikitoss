<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(\App\Http\Requests\StoreContactRequest $request)
    {
        \App\Models\Message::create($request->validated());
        return back()->with('success', 'Message sent successfully!');
    }
}
