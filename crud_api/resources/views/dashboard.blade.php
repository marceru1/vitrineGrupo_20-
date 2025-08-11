{{--  CSS customizado --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6">
                {{-- Envio das imagens --}}
                <form action="/events" method="POST" enctype="multipart/form-data" class="upload-form">
                    @csrf

                    <label for="image" class="form-label" style="color: #333; font-weight: bold;">Imagem:</label>
                    <input type="file" class="form-control" id="image" name="image">

                    <input type="submit" class="upload-button" value="Enviar">
                </form>
            </div>
        </div>
    </div>

    {{-- Galeria de Fotos --}}
    <div class="photo-gallery-container mt-5">
        <h1 class="mb-4 text-center">Últimas Fotos Adicionadas</h1>

        <div class="photo-gallery-grid">
            {{-- Loop para exibir cada imagem que veio do controller --}}
            @foreach($imagens as $imagem)
                <div class="photo-gallery-item">
                    <div class="photo-card h-100 shadow-sm">

                        {{-- Exibe a imagem usando o path salvo no banco de dados --}}
                        <img src="{{ asset($imagem->path) }}" class="photo-card-img" alt="{{ $imagem->name }}">

                        <div class="photo-card-body">
                            <p class="photo-card-text">Enviada em: {{ $imagem->created_at->format('d/m/Y') }}</p>
                            <p class="photo-card-text"><small class="text-muted">Usuário ID: {{ $imagem->user }}</small></p>
                        </div>

                        <div class="photo-card-footer">
                            {{-- Formulário para apagar a imagem. Precisa do @method('DELETE') --}}
                            <form action="{{ route('imagens.destroy', $imagem->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta imagem?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
