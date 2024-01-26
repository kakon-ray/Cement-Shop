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
                            <a href="{{ route('admin.dashboard.employee.add') }}" class="btn btn-info"> + Add New
                                Employee</a>

                        </div>
                        <div class="col-lg-12">
                            <div class="p-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Address</th>
                                                <th>QR Code</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($allemploye as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->position }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td><img src="{{ $item->image  }}" style="height: 100px"
                                                        class="img-fluid" alt="Products"></td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>
                                                        {!! QrCode::size(100)->generate($item->email) !!}
                                                    </td>
                                          
                                                    <td>
                                                        <a href="{{ route('admin.dashboard.employee.update', ['id' => $item->id]) }}"
                                                            class="btn btn-info btn-circle btn-sm"><i
                                                                class="fas fa-edit"></i></a>

                                                        <button type="button"
                                                            onclick="delete_employee({!! $item->id !!})"
                                                            class="btn btn-danger btn-circle btn-sm"><i
                                                                class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach


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
        const delete_employee = (id) => {
            Swal.fire({
                customClass: 'swalstyle',
                title: 'Are you sure?',
                text: "Delete this Item",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .get("/admin/dashboard/employee/delete", {
                            params: {
                                id: id
                            }
                        })
                        .then(function(response) {

                            if (response.data.status == 200) {
                                Swal.fire({
                                    customClass: 'swalstyle',
                                    position: 'top-center',
                                    icon: 'success',
                                    title: response.data.msg,
                                    showConfirmButton: false,
                                    timer: 1500

                                })
                                setTimeout(function() {
                                    location.reload();
                                }, 1500);


                            } else {
                                Swal.fire({
                                    customClass: 'swalstyle',
                                    position: 'top-center',
                                    icon: 'error',
                                    title: response.data.msg,
                                    text: response.data.err_msg,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }


                        })
                        .catch(function(error) {
                            Swal.fire({
                                customClass: 'swalstyle',
                                position: 'top-center',
                                icon: 'error',
                                title: 'Internal Error',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });
                }
            })



        }
    </script>
@endsection
