@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('name', 'Article name') }}<br>
{{ Form::text('name') }}<br>
{{ Form::label('body', 'Article body') }}<br>
{{ Form::textarea('body') }}<br>