<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Application</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Customer Form</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ route('store.customer') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Customer name" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" placeholder="name@example.com" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                <input type="number" id="phone" class="form-control" placeholder="Contact number" name="phone">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input type="number" class="form-control" placeholder="Contact number" name="phone">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pincode</label>
                <input type="number" class="form-control" placeholder="Contact number" name="phone">
            </div>

            <div class="">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$('#email').on('blur', function() {
    var email = $(this).val();

    $.post('/check-email', {
        email: email
    }, function(data) {
        console.log(data.message);
    });
});

$('#phone').on('blur', function() {
    var phone = $(this).val();

    $.post('/check-phone', {
        phone: phone
    }, function(data) {
        console.log(data.message);
    });
});
</script>

</html>