<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactMessageController extends Controller
{
    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $contactMessage = ContactMessage::create([
            ...$request->safe()->except(['website']),
            'ip_address' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
        ]);

        $recipient = config('services.business.email');

        if ($recipient) {
            try {
                Mail::to($recipient)->send(new ContactMessageReceived($contactMessage));
            } catch (Throwable $exception) {
                report($exception);
            }
        }

        return redirect()
            ->route('home')
            ->withFragment('quote-form')
            ->with('contact_success', 'Thanks. Your message has been sent to R&S Auto Works.');
    }
}
