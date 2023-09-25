<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PBKK Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        {{-- Flash Message --}}
                        @if (session()->has('results') && session()->has('image'))
                            <div class="card" style="border-radius: 15px;"">
                                <div class="card-body">
                                    <h5 class="card-title">Form Submitted</h5>
                                    <p class="card-text">These are the data submitted</p>
                                </div>
                                <img src={{ asset('storage/images/' . session()->get('image')) }} class="card-img-top"
                                    alt="{{ session()->get('image') }}">
                                <ul class="list-group list-group-flush">
                                    @foreach (session('results') as $key => $value)
                                        <li class="list-group-item"><b>{{ $key }}:</b> {{ $value }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            {{-- MainForm --}}
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-center mb-5">5 Fields Form</h2>
                                    <form method="POST" action="/form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter your name..." value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter your email..." value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="value" class="form-label">Value (2.50 -
                                                99.99)</label>
                                            <input type="value" class="form-control" id="value" name="value"
                                                placeholder="Enter a value..." value="{{ old('value') }}"">
                                            @error('value')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address...">{{ old('address') }}</textarea>
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input class="form-control" type="file" id="image" name="image"
                                                accept="image/*">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
