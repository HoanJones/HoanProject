@if(isset ($errors) && count($errors) > 0)
    @push('scripts')
        @foreach($errors->all() as $error)
            <script>$.NotificationApp.send("Something Went Wrong!", "{{$error}}", "top-right", "rgba(0,0,0,0.2)", "error")</script>
        @endforeach
    @endpush
@endif
