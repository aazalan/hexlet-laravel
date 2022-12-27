@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::model($article, ['route' => 'article.store']) }}
    {{ Form::label('name', 'Article name') }}
    {{ Form::text('name') }}<br>
    {{ Form::label('body', 'Article body') }}
    {{ Form::textarea('body') }}<br>
    {{ Form::submit('create') }}
{{ Form::close() }}