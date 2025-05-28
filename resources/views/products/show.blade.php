@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-3">{{ $product->name }}</h2>
            <p class="mb-2"><span class="fw-bold">Descrição:</span> {{ $product->description }}</p>
            <p class="mb-4"><span class="fw-bold">Preço:</span> 
                <span class="text-success fs-5">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
            </p>
            <div class="d-flex gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger"><i class="bi bi-trash"></i> Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
