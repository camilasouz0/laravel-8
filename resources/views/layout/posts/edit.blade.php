<h1>Editar post {{ $post->title }}</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Titulo" value={{ $post->title }}>
    <textarea name="content" id="content" cols="30" rows="10" placeholder="Conteudo">{{ $post->content }}</textarea>
    <button type="submit">Enviar</button>
</form>