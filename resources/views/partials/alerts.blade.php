<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>Sucesso!</strong> {{ session('success') }}
                </div>
            @endif
            @if (session('info'))
                <div class="alert alert-info">
                    <strong>Informativo</strong> {{ session('info') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    <strong>Atenção!</strong> {{ session('warning') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Erro!</strong> Ocorreu(ram) erro(s) durante o processamento:
                    <li>
                        @foreach ($errors->all() as $error)
                            <ul>{{ $error }}</ul>
                        @endforeach
                    </li>
                </div>
            @endif
        </div>
    </div>
</div>