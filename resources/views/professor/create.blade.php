@EXTENDS('templates.main', ["menu" => "home", "submenu" => "create"])
@section('titulo') Professores @endsection
@section('conetudo')

<form action="{{route('professor.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <input 
                    type="text" 
                    class="form-control @if($errors->has('nome')) is-invalid @endif"
                    name="nome"
                    placeholder="Nome"
                    value="{{old('nome')}}"
                />
                <label for="nome">Nome do Professor</label>
                @if($errors->has('nome'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('nome') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</form>
@endsection