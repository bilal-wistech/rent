@include('emails.common.header')

@section('emails.main')
    {!! $template->content !!}
@endsection

@yield('emails.main')

@include('emails.common.footer')
