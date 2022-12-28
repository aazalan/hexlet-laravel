{{ Form::model($article, ['route' => 'articles.store']) }}
    @include('article.form')
    {{ Form::submit('create') }}
{{ Form::close() }}