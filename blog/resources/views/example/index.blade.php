<style>
    strong {
        color: red;
    }
</style>
@if ($errors->has('title'))
<strong>{{ $errors->first('title') }}</strong>
@endif
@foreach ($example as $examples)
    <p>{{ $examples->id.'.'.$examples->title }}
    <form action="example/{{ $examples->id }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('Delete') }}
    <input type="submit" value="Delete">
    </form>
    </p>
@endforeach


<form action="/example" method="post">
{{ csrf_field() }}
<input name="title" type="text" placeholder="say something">
<input type="submit">
</form>