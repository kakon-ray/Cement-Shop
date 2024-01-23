@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Ecommerce' }}
@endsection

@section('content')
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
                            <a href="{{ route('admin.dashboard.product.add') }}" class="btn btn-success"> + Add New
                                Product</a>

                        </div>
                        <div class="col-lg-12">
                            <div class="p-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Brand Name</th>
                                                <th>Category</th>
                                                <th>Product Price</th>
                                                <th>Product Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>
                                                    <a href="{{route('admin.dashboard.product.update')}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>

                                                    <button type="button" onclick="delete_doctor({!! 2 !!})"
                                                        class="btn btn-danger btn-circle btn-sm"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
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


    <script>
        const open_model = (id) => {
            $('#exampleModal').modal('show');

            axios
                .get("/admin/addpement/student/data", {
                    params: {
                        id: id
                    }
                })
                .then(function(response) {

                    if (response.status == 200) {
                        var name = response.data.students.student_name
                        var id = response.data.id
                        document.getElementById("set_student_name").value = name;
                        document.getElementById("set_student_id").value = id;

                    }

                })
                .catch(function(error) {
                    Swal.fire({
                        position: "top-center",
                        icon: "error",
                        title: "Your form submission is not complete",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                });

        }

        const close_model = (id) => {
            $('#exampleModal').modal('hide');

        }
    </script>
@endsection
