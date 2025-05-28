@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Novo Cupom</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('coupons.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input type="text" name="code" class="form-control" required placeholder="Código do cupom">
                </div>
                <div class="mb-3">
                    <label class="form-label">Valor do Desconto</label>
                    <input type="number" step="0.01" name="discount" class="form-control" required placeholder="0,00">
                </div>
                <div class="mb-3">
                    <label class="form-label">Validade</label>
                    <input type="date" name="valid_until" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Valor Mínimo</label>
                    <input type="number" step="0.01" name="min_value" class="form-control" required placeholder="0,00">
                </div>
                <div class="d-flex gap-2 mt-4">
                    <button class="btn btn-success"><i class="bi bi-check-circle"></i> Salvar</button>
                    <a href="{{ route('coupons.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
