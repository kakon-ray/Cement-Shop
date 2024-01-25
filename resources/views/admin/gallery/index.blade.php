@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Ecommerce' }}
@endsection

@section('content')
    <style>
        .delete-button {
            position: absolute;
            top: 10px;
        }
    </style>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        @include('layouts.admin.sidebar')
        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        <div id="content-wrapper">

            <div id="content">

                @include('layouts.admin.navigation')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 px-4 py-3 d-flex justify-content-end">
                            <a href="{{ route('admin.dashboard.gallery.add') }}" class="btn btn-info"> + Add New
                                Product</a>

                        </div>
                        <div class="col-lg-12 py-5">
                            <h2 class="py-3">Thumbnail Image </h2>
                            <div class="row">
                                @foreach ($allgallery as $item)
                                    <div class="col-lg-4 my-2">
                                        <div class="card p-3">
                                            <img src="{{ $item->thumbnail }}" class="img-fluid" alt="All Image">
                                            <form method="POST"
                                                action="{{ route('admin.dashboard.gallery.thumbnail.delete') }}"
                                                id="gallery">
                                                @csrf
                                                <input type="text" class="d-none" name="item"
                                                    value="{{ $item->thumbnail }}">
                                                <input type="text" class="d-none" name="id"
                                                    value="{{ $item->id }}">


                                                <button type="submit"
                                                    class="btn btn-danger btn-circle btn-sm delete-button"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>

                                        </div>

                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="col-lg-12">
                            <h2 class="py-3">All Image </h2>
                            <div class="row">
                                @foreach ($allgallery as $item)
                                    @if ($item->images)
                                        @foreach (json_decode($item->images) as $item2)
                                            <div class="col-lg-4 my-2">
                                                <div class="card p-3">
                                                    <img src="{{ $item2 }}" class="img-fluid" alt="All Image">

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
