@extends('layouts.admin')

@section('title', 'Enquiry Details | R&S Auto Works Admin')

@section('content')
    <section class="admin-panel" aria-labelledby="enquiry-heading">
        <div class="admin-panel-heading">
            <div>
                <p class="eyebrow">{{ ucfirst($source) }} enquiry</p>
                <h1 id="enquiry-heading">{{ $enquiry->name }}</h1>
            </div>
            <a class="button button-secondary button-small" href="{{ route('admin.enquiries.index') }}">Back to enquiries</a>
        </div>

        <div class="detail-grid">
            <article class="detail-panel">
                <h2>Customer details</h2>
                <dl class="detail-list">
                    <dt>Name</dt>
                    <dd>{{ $enquiry->name }}</dd>

                    @if($source === 'quote')
                        <dt>Email</dt>
                        <dd><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></dd>
                        <dt>Phone</dt>
                        <dd>{{ $enquiry->phone ?: 'Not supplied' }}</dd>
                        <dt>Vehicle</dt>
                        <dd>{{ $enquiry->vehicle_model ?: 'Not supplied' }}</dd>
                        <dt>Service</dt>
                        <dd>{{ $enquiry->service_required }}</dd>
                        <dt>Preferred contact</dt>
                        <dd>{{ $enquiry->preferred_contact_method }}</dd>
                    @else
                        <dt>Phone or email</dt>
                        <dd>{{ $enquiry->email_or_phone }}</dd>
                        <dt>Service</dt>
                        <dd>Quick enquiry</dd>
                    @endif

                    <dt>Date</dt>
                    <dd>{{ $enquiry->created_at->format('d M Y H:i') }}</dd>
                    <dt>IP address</dt>
                    <dd>{{ $enquiry->ip_address ?: 'Not captured' }}</dd>
                </dl>
            </article>

            <article class="detail-panel">
                <h2>Message</h2>
                <p class="message-body">{{ $enquiry->message }}</p>
            </article>

            <article class="detail-panel">
                <h2>Manage enquiry</h2>
                <form method="post" action="{{ route('admin.enquiries.update', [$source, $enquiry->id]) }}" class="admin-form">
                    @csrf
                    @method('patch')
                    <div class="field">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" @selected($enquiry->status === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="button button-primary" type="submit">Update Status</button>
                </form>

                <form method="post" action="{{ route('admin.enquiries.destroy', [$source, $enquiry->id]) }}" class="delete-form">
                    @csrf
                    @method('delete')
                    <button class="button button-danger" type="submit" data-confirm-delete>Delete Spam Submission</button>
                </form>
            </article>
        </div>
    </section>
@endsection
