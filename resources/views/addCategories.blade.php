@include('navbar');
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <title>Document</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Category Successfully added!',
                text: '{{ session('success') }}',
                showCancelButton: true,
                confirmButtonText: 'View',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to view cart page
                    window.location.href = '{{ route('categoryview') }}';
                }
            });
        </script>
    @endif
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            @include('sellerNavbar')
        </nav>
        <div id="content">
            <h1 style="text-align: center">Add Categories</h1>
            <div class="product_categories">
                <div class="category">
                    <a href="{{ route('categoryview') }}" class="category_toggle">All Categories</a>
                </div>
                <div class="category">
                    <a href="{{ route('addcategory') }}" class="category_toggle">Add Categories</a>

                </div>
                
            </div>

            <div class="add_product_form">
                <form class="main_form" action="{{ route('storeCategories') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form_left">
                        <label for="CategoriesName">Categories Name:</label>
                        <input type="text" id="CategoriesName" name="CategoriesName"
                            placeholder="Enter Categories Name">
                        <label for="CategoriesDescription">Categories Description:</label>
                        <textarea id="CategoriesDescription" name="CategoriesDescription" placeholder="Enter Product Description"></textarea>
                    </div>
                    <div class="form_right">
                        <label for="CategoryImage">Category Image:</label>
                        <dic class="photo">
                            <input style="border: none" type="file" id="CategoryImage" name="CategoryImage">
                        </dic>

                        <div class="formbtn">
                            <button type="submit">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>



</body>

</html>
