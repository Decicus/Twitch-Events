{{ csrf_field() }}

<div class="form-group">
    <label for="title">Event title:</label>
    <input type="text" class="form-control" name="title" id="title" value="{!! $event->title or old('title') !!}" placeholder="Beers with The Blacklist" maxlength="100">
</div>

<div class="form-group">
    <label for="description">Event description:</label>
    <textarea name="description" rows="8" cols="40" class="form-control" maxlength="10000" placeholder="Meetup at the White House - 12 PM CST">{!! $event->description or old('description') !!}</textarea>
    <span class="help-block">Supports <a href="https://daringfireball.net/projects/markdown/syntax" target="_blank">Markdown</a>.</span>
</div>
