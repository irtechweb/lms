@component('mail::message')
    # Hi {{ $data['name'] }}
    {{ $data['message'] }}
    Username: {{ $data['email'] }}
    Password: {{ $data['password'] }}
    {{ $data['note'] }}
    Thanks,<br>
    Speak2Impact
@endcomponent