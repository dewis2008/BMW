<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\QuoteRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(): View
    {
        return view('admin.enquiries.index', [
            'enquiries' => $this->paginatedEnquiries(),
            'statuses' => QuoteRequest::statuses(),
        ]);
    }

    public function show(string $source, int $enquiry): View
    {
        return view('admin.enquiries.show', [
            'source' => $source,
            'enquiry' => $this->findEnquiry($source, $enquiry),
            'statuses' => QuoteRequest::statuses(),
        ]);
    }

    public function update(Request $request, string $source, int $enquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(QuoteRequest::statuses())],
        ]);

        $this->findEnquiry($source, $enquiry)->update([
            'status' => $validated['status'],
        ]);

        return back()->with('admin_success', 'Enquiry status updated.');
    }

    public function destroy(string $source, int $enquiry): RedirectResponse
    {
        $this->findEnquiry($source, $enquiry)->delete();

        return redirect()
            ->route('admin.enquiries.index')
            ->with('admin_success', 'Enquiry deleted.');
    }

    private function paginatedEnquiries(): LengthAwarePaginator
    {
        $combined = $this->quoteRequestQuery()->unionAll($this->contactMessageQuery());

        return DB::query()
            ->fromSub($combined, 'enquiries')
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();
    }

    private function quoteRequestQuery(): Builder
    {
        return DB::table('quote_requests')->select([
            DB::raw("'quote' as source"),
            'id',
            'name',
            'email',
            'phone',
            'vehicle_model',
            'service_required',
            'preferred_contact_method',
            'status',
            'created_at',
        ]);
    }

    private function contactMessageQuery(): Builder
    {
        return DB::table('contact_messages')->select([
            DB::raw("'contact' as source"),
            'id',
            'name',
            DB::raw('email_or_phone as email'),
            DB::raw('email_or_phone as phone'),
            DB::raw('NULL as vehicle_model'),
            DB::raw("'Quick enquiry' as service_required"),
            DB::raw("'Not specified' as preferred_contact_method"),
            'status',
            'created_at',
        ]);
    }

    private function findEnquiry(string $source, int $id): Model
    {
        if ($source === 'quote') {
            return QuoteRequest::findOrFail($id);
        }

        if ($source === 'contact') {
            return ContactMessage::findOrFail($id);
        }

        abort(404);
    }
}
