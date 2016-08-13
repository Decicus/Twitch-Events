@if(isset($message))
    <div class="alert alert-{{ $message['type'] }}">
        {!! $message['text'] !!}
    </div>
@endif
