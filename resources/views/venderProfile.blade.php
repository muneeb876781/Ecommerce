{{-- @include('header') --}}
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - Atrana</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('../assets/modules/bootstrap-5.1.3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/modules/fontawesome6.1.1/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/modules/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/modules/apexcharts/apexcharts.css') }}">


</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('venderNav');
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'info Successfully updated!',
                text: '{{ session('update_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif



    <div class="sidebar-overlay"></div>


    <!--Content Start-->
    <div class="content-start transition">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h4>{{ $shopInfo->name }}</h4>
                <p>Change information about yourself on this page</p>
            </div>

            <div class="row">
                <div class="card">
                    <form action="{{ route('editShop', ['id' => $shopInfo->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center  ">
                                <img src="{{ asset('storage/uploads/' . $shopInfo->logo) }}" alt=""
                                    alt="user-avatar" class="d-block rounded" height="100" width="100px"
                                    id="shopLogo" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary1 me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" name="shopLogo" class="account-file-input"
                                            hidden accept="image/png, image/jpeg" />
                                    </label>
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
                                <style>
                                    .btn-primary1 {
                                        background-color: white;
                                        color: #456dff;
                                        border-color: #456dff;
                                        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3); 

                                    }

                                    .btn-primary1:hover {
                                        background-color: #456dff;
                                        color: #fff;
                                        border-color: #456dff;
                                    }
                                </style>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Shop Name</label>
                                    <input class="form-control" type="text" id="shopname" name="shopname"
                                        value="{{ $shopInfo->name }}" autofocus />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Address</label>
                                    <input class="form-control" type="text" id="shopaddress" name="shopaddress"
                                        value="{{ $shopInfo->address }}" placeholder="Andree@example.com" />
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="lastName" class="form-label">Description</label>
                                    <input class="form-control" type="text" name="shopdescription"
                                        id="shopdescription" value="{{ $shopInfo->description }}" />
                                </div>

                                {{-- <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Seller Email</label>
                                    <input class="form-control" type="text" id="selleremail" name="selleremail"
                                        value="{{ $seller->email }}" placeholder="Andree@example.com" />
                                </div>

                                

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Seller Password</label>
                                    <input class="form-control" type="password" id="sellerpass" name="sellerpass"
                                        value="{{ $seller->password }}" placeholder="Andree@example.com" />
                                </div> --}}




                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Seller Phone</label>
                                    <input class="form-control" type="text" id="sellerphone" name="sellerphone"
                                        value="{{ $shopInfo->seller_phone }}" placeholder="Andree@example.com" />
                                </div>



                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Seller Address</label>
                                    <input class="form-control" type="text" id="selleraddress" name="selleraddress"
                                        value="{{ $shopInfo->seller_address }}" placeholder="Andree@example.com" />
                                </div>



                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?
                                </h6>
                                <p class="mb-0">Once you delete your account, there is no going back. Please be
                                    certain.
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('deleteStore', ['id' => $shopInfo->id]) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete your store? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                    id="accountActivation" />
                                <label class="form-check-label" for="accountActivation">I confirm my account
                                    deactivation</label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate
                                Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>








</body>

</html>
