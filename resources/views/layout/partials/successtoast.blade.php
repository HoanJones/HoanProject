@if(session()->has('success'))
    @push('scripts')
        <script>$.NotificationApp.send("Great!", "{{session()->get('success')}}", "top-right", "rgba(0,0,0,0.2)", "success")</script>
    @endpush
@endif