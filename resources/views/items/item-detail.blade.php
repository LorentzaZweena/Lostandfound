<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $item->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/item-detail.css') }}">
</head>

<body>

<div class="container py-5 mt-5">
    <div class="card-custom shadow-sm">
        <div class="mb-3">
            <span class="category-badge">
                {{ $item->category }}
            </span>

            <small class="text-muted ms-2">
                {{ $item->created_at->format('F d, Y') }}
            </small>
        </div>

        <h2 class="fw-bold mb-4">
            {{ $item->title }}
        </h2>

        @if($item->image)
            <img src="{{ asset($item->image) }}" class="hero-img mb-4">
        @else
            <img src="{{ asset('img/no-image.png') }}" class="hero-img mb-4">
        @endif

        <h6 class="fw-semibold mb-3">
            Reported by:
            {{ $item->user->name ?? 'Guest' }}
        </h6>

        <p class="text-muted" style="line-height: 1.8;">
            {{ $item->description }}
        </p>

        <hr>

        <div class="mt-3">
            <p><strong>📍 Location:</strong> {{ $item->location }}</p>
            <p><strong>📧 Contact:</strong> {{ $item->contact_email }}</p>
            <p>
                <strong>Status:</strong>
                <span class="badge {{ $item->status == 'lost' ? 'bg-danger' : 'bg-success' }}">
                    {{ ucfirst($item->status) }}
                </span>
            </p>
        </div>

    </div>

</div>

</body>
</html>