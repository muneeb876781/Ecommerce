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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <style>
        .category a.active {
            font-weight: bold;
            /* Add any other styles to indicate the active link */
        }
    </style>
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
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            @include('sellerNavbar')
        </nav>
        <div id="content">
            <h1 style="text-align: center">Categories</h1>
            <div class="product_categories">
                <div class="category">
                    <a href="#" class="category_toggle" data-target="all_categories">All Categories</a>
                </div>
                <div class="category">
                    <a href="#" class="category_toggle" data-target="add_category">Add Categories</a>
                </div>
            </div>

            <div class="categories_data" id="all_categories">
                <div class="container">
            
                    
            
                    <table id="openhouse" class="myTable">
                        <!-- Your table content -->
                        <thead>
                            <tr>
                                <th class="serial-number">No.</th>
                                <th class="title">Image</th>
                                <th class="title">Name</th>
                                <th class="ranking">Description</th>
                                <th class="ranking">Actions</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php $serialNumber = 1; @endphp
                            @foreach($categories as $category)
                            <tr>
                                    <td class="serial-number">{{ $serialNumber++ }}</td>
                                    <td><img src="{{ asset($category->image_url) }}" alt="{{ $category->name }}" class="rounded-circle"></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="#" title="Edit"><i class="fas fa-eye"></i></a>
                                        <a href="#" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" title="Edit"><i class="fas fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                   
            
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
            
                    <script>
                        $(document).ready(function() {
                            var toolsTable = $('#openhouse').DataTable({
                                "lengthMenu": [5, 10, 25, 50, -1],
                                "pageLength": 50,
                            });
            
                            // Search input event
                            $('#openhouse').on('keyup', function() {
                                toolsTable.search(this.value).draw();
                            });
                        });
                    </script>
                </div>
                

                

            </div>

            <div class="add_product_form" id="add_category" style="display: none;">
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

            <script>
                $(document).ready(function() {
                    // Toggle between all categories and add category form
                    $('.category_toggle').click(function(e) {
                        e.preventDefault();
                        var target = $(this).data('target');
                        $('.product_categories .category_toggle').removeClass('active');
                        $(this).addClass('active');
                        $('#all_categories, #add_category').hide();
                        $('#' + target).show();
                    });
                });
            </script>

        </div>
    </div>



</body>

</html>
