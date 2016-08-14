@if (!empty($message))
    <div class="alert alert-{{ $message['type'] }}">
        {!! $message['text'] !!}
    </div>
@endif

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $error }}
        </div>
    @endforeach
@endif
