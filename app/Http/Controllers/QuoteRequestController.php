<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequestRequest;
use App\Mail\QuoteRequestReceived;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class QuoteRequestController extends Controller
{
    public function store(StoreQuoteRequestRequest $request): RedirectResponse
    {
        $quoteRequest = QuoteRequest::create([
            ...$request->safe()->except(['website']),
            'ip_address' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
        ]);

        $recipient = config('services.business.email');

        if ($recipient) {
            try {
                Mail::to($recipient)->send(new QuoteRequestReceived($quoteRequest));
            } catch (Throwable $exception) {
                report($exception);
            }
        }

        return back()->with('quote_success', 'Thanks. Your request has been received and R&S Auto Works will get back to you.');
    }
}
