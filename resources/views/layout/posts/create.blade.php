<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>


@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

<div class="container">
    <h1>Cadastro novo post</h1>
    <div class="jumbotron">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" placeholder="Titulo" value="{{ old('title') }}" class="form-control form-control-sm">
            </div>
            </div>
            <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Conteudo</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Conteudo" class="form-control form-control-sm" >{{ old('content') }}</textarea>
            </div>
            </div>
            <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" >Enviar</button>
            </div>
            </div>
        </form>
    </div>
</div>