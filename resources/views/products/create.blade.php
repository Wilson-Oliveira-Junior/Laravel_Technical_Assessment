@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Novo Produto</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" required placeholder="Nome do produto">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="Descrição do produto"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="number" step="0.01" name="price" class="form-control" required placeholder="0,00">
                </div>
                <div class="d-flex gap-2 mt-4">
                    <button class="btn btn-success"><i class="bi bi-check-circle"></i> Salvar</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
