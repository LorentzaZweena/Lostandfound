<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>

</style>
</head>

<body>

<div class="sidebar shadow-sm text-center">
    <i class='bx bx-home'></i>
    <i class='bx bx-user'></i>
    <i class='bx bx-folder'></i>
</div>

<div class="main container py-4">
    <h4 class="fw-bold mb-4">Profile Dashboard</h4>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card-custom bg-white shadow-sm text-center">

                <img src="{{ $user->profile_photo ? asset($user->profile_photo) : asset('img/pp.jpg') }}" class="profile-img mb-3">

                <h5 class="fw-bold">{{ $user->name }}</h5>

                <span class="badge bg-success mb-3">Active User</span>

                <a href="/report" class="btn btn-primary rounded-pill px-4">
                    Add New Report
                </a>

                <hr>

                <p class="mb-1"><strong>Email:</strong></p>
                <small>{{ $user->email }}</small>

            </div>
        </div>

        <!-- STATS -->
        <div class="col-md-8">

            <div class="row g-3 mb-3">

                <div class="col-md-4">
                    <div class="stat-box shadow-sm">
                        <h3>{{ $totalReports }}</h3>
                        <small>All Reports</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-box shadow-sm">
                        <h3>{{ $lost }}</h3>
                        <small>Lost</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-box shadow-sm">
                        <h3>{{ $found }}</h3>
                        <small>Found</small>
                    </div>
                </div>

            </div>

            <!-- REPORT LIST -->
            <div class="card-custom bg-white shadow-sm">

                <h6 class="fw-bold mb-3">Your Reports</h6>

                @foreach(auth()->user()->items as $item)
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <strong>{{ $item->title }}</strong><br>
                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                    </div>

                    <span class="badge {{ $item->status == 'lost' ? 'badge-lost' : 'badge-found' }}">
                        {{ ucfirst($item->status) }}
                    </span>

                </div>
                @endforeach

            </div>

        </div>

    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>