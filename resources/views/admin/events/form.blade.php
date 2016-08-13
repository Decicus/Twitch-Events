{{ csrf_field() }}

<div class="form-group">
    <label for="title">Event title:</label>
    <input type="text" class="form-control" name="title" id="title" value="{!! $title or '' !!}" placeholder="Beers with The Blacklist" maxlength="100">
</div>

<div class="form-group">
    <label for="description">Event description:</label>
    <textarea name="description" rows="8" cols="40" class="form-control" maxlength="10000" placeholder="Meetup at the White House - 12 PM CST">{!! $description or '' !!}</textarea>
    <span class="help-block">Supports <a href="http://www.bbcode.org/reference.php">BBCode</a>.</span>
</div>
