<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>

<a href="{{ route('posts.create') }}">Criar novo post</a>

@if (session('message'))
    <div>
        {{ (session('message')) }}
    </div>
@endif

<form action="{{ route('posts.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="Search">
    <button type="submit">Buscar</button>
</form>

@foreach ($posts as $post)
    <p> {{$post->title}} 
        [ <a href="{{ route('posts.show', ['id' => $post->id]) }}">Detalhes</a> ]
        [ <a href="{{ route('posts.edit', ['id' => $post->id]) }}">Editar</a> ]
    </p>

@endforeach

<hr>

<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>