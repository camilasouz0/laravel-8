<h1>Detalhes do post {{ $post->title }}</h1>

<ul>
    <li>Titulo: {{ $post->title }}</li>
    <li>Conteudo: {{ $post->content }}</li>
</ul>

<form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
    @csrf
    {{-- @method('DELETE') --}}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar o post: {{ $post->title }}</button>
</form>