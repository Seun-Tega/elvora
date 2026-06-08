<x-mail::message>
# New Intake Form Submitted

A new request has been received on the Elvora Innovations platform.

@if($type === 'project')
### Project Request Details
- **Contact Name:** {{ $data['name'] }}
- **Email Address:** {{ $data['email'] }}
- **Phone Number:** {{ $data['phone'] ?? 'N/A' }}
- **Organization:** {{ $data['organization'] ?? 'N/A' }}
- **Project Category:** {{ $data['project_type'] }}
- **Target Budget:** {{ $data['budget_range'] }}
- **Timeline:** {{ $data['timeline'] }}

**Scope Brief:**
{{ $data['description'] }}
@else
### Contact Inquiry Details
- **Sender Name:** {{ $data['name'] }}
- **Email Address:** {{ $data['email'] }}
- **Phone Number:** {{ $data['phone'] ?? 'N/A' }}

**Message:**
{{ $data['message'] }}
@endif

<x-mail::button :url="config('app.url') . '/admin'">
Access Admin Portal
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
