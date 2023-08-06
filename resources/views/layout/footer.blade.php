<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                @if(date('Y') === '2023')
                    2023  © {{ config('app.name') }}
                @else
                    2023 - {{ date('Y') }} © {{ config('app.name') }}
                @endif
            </div>
        </div>
    </div>
</footer>
