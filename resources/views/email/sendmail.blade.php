@component('mail::message')
{{$data['title']}}

{{ $data['body']}}

@component('mail::button', ['url' =>$data['url']])
See your Favorite
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
