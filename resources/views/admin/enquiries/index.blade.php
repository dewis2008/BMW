@extends('layouts.admin')

@section('title', 'Enquiries | R&S Auto Works Admin')

@section('content')
    <section class="admin-panel" aria-labelledby="enquiries-heading">
        <div class="admin-panel-heading">
            <div>
                <p class="eyebrow">Enquiries</p>
                <h1 id="enquiries-heading">Quote and contact submissions</h1>
            </div>
            <a class="button button-secondary button-small" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">View site</a>
        </div>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Vehicle</th>
                        <th>Service</th>
                        <th>Preferred Contact</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enquiries as $enquiry)
                        <tr>
                            <td><span class="source-pill">{{ ucfirst($enquiry->source) }}</span></td>
                            <td><a href="{{ route('admin.enquiries.show', [$enquiry->source, $enquiry->id]) }}">{{ $enquiry->name }}</a></td>
                            <td>{{ $enquiry->email ?: 'Not supplied' }}</td>
                            <td>{{ $enquiry->phone ?: 'Not supplied' }}</td>
                            <td>{{ $enquiry->vehicle_model ?: 'Not supplied' }}</td>
                            <td>{{ $enquiry->service_required }}</td>
                            <td>{{ $enquiry->preferred_contact_method }}</td>
                            <td>{{ \Illuminate\Support\Carbon::parse($enquiry->created_at)->format('d M Y H:i') }}</td>
                            <td><span class="status-pill status-{{ $enquiry->status }}">{{ ucfirst($enquiry->status) }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No enquiries have been submitted yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($enquiries->hasPages())
            <nav class="admin-pagination" aria-label="Enquiry pages">
                @if($enquiries->onFirstPage())
                    <span>Previous</span>
                @else
                    <a href="{{ $enquiries->previousPageUrl() }}">Previous</a>
                @endif

                <span>Page {{ $enquiries->currentPage() }} of {{ $enquiries->lastPage() }}</span>

                @if($enquiries->hasMorePages())
                    <a href="{{ $enquiries->nextPageUrl() }}">Next</a>
                @else
                    <span>Next</span>
                @endif
            </nav>
        @endif
    </section>
@endsection
