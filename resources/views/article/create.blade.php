{{ Form::model($article, ['route' => 'article.store']) }}
    @include('article.form')
    {{ Form::submit('create') }}
{{ Form::close() }}