<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mini ERP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { background: #f8fafc; }
        .navbar-brand { font-weight: bold; letter-spacing: 1px; }
        .card { border-radius: 1rem; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Mini ERP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}"><i class="bi bi-box"></i> Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('inventory.index') }}"><i class="bi bi-archive"></i> Estoque</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-cart4"></i> Carrinho</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('coupons.index') }}"><i class="bi bi-ticket-detailed"></i> Cupons</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mb-5">
        @yield('content')
    </main>
    <footer class="text-center text-muted py-3 small">
        &copy; {{ date('Y') }} Mini ERP. Todos os direitos reservados.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
