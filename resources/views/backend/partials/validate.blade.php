@if ($errors->any())
    <div class="callout callout-danger">
        <h4>Lỗi</h4>
        @foreach ($errors->all() as $error)
            <p>
                <span class="invalid-feedback" role="alert" >
                    {{ $error }}
                </span>
            </p>
        @endforeach

    </div>
@endif
