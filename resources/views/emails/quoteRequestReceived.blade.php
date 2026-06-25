<h1>New quote request</h1>

<p>A new R&S Auto Works quote request has been submitted.</p>

<table>
    <tr><th align="left">Name</th><td>{{ $quoteRequest->name }}</td></tr>
    <tr><th align="left">Email</th><td>{{ $quoteRequest->email }}</td></tr>
    <tr><th align="left">Phone</th><td>{{ $quoteRequest->phone ?: 'Not supplied' }}</td></tr>
    <tr><th align="left">Vehicle</th><td>{{ $quoteRequest->vehicle_model ?: 'Not supplied' }}</td></tr>
    <tr><th align="left">Service</th><td>{{ $quoteRequest->service_required }}</td></tr>
    <tr><th align="left">Preferred contact</th><td>{{ $quoteRequest->preferred_contact_method }}</td></tr>
    <tr><th align="left">Message</th><td>{{ $quoteRequest->message }}</td></tr>
    <tr><th align="left">Submitted</th><td>{{ $quoteRequest->created_at->format('d M Y H:i') }}</td></tr>
</table>
