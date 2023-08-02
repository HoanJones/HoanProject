<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                @if(date('Y') === 2022)
                    2022  © {{ config('app.name') }}
                @else
                    2022 - {{ date('Y') }} © {{ config('app.name') }}
                @endif
            </div>
        </div>
    </div>
</footer>
