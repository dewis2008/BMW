<h1>New quick enquiry</h1>

<p>A new R&S Auto Works quick enquiry has been submitted.</p>

<table>
    <tr><th align="left">Name</th><td>{{ $contactMessage->name }}</td></tr>
    <tr><th align="left">Phone or email</th><td>{{ $contactMessage->email_or_phone }}</td></tr>
    <tr><th align="left">Message</th><td>{{ $contactMessage->message }}</td></tr>
    <tr><th align="left">Submitted</th><td>{{ $contactMessage->created_at->format('d M Y H:i') }}</td></tr>
</table>
