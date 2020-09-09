<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DTR Webpage</title>

    <link href="{{ asset('css/admin/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/admin/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet" type="text/css">
    @stack('css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#employeeModal">
                                                <i class="fas fa-upload fa-sm text-white-50"></i> Import Record
                                            </button>
                                            <h6 class="m-0 font-weight-bold text-primary">Daily Transcript Record</h6>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal">
                                                <i class="fas fa-plus fa-sm text-white-50"></i> Add Log
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Employee Name</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($employee as $employee)
                                                    <tr>
                                                        <td>{{ $employee->name}}   <span class="float-right"><button class="btn btn-info btn-circle btn-sm btn-edit" data-id="{{ $employee->id}}">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </button>

                                                            <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="POST" style="display:inline-block">
                                                          
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger btn-circle btn-sm btn-delete" data-toggle="modal" data-target="#editModal">
                                                <i class="fas fa-trash"></i> 
                                            </button>
                                                            </form></span></td>
                                                        <td>{{ $employee->date}}</td>
                                                        <td>{{ $employee->time}}</td>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Add Log Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employees.store') }}" method="post" id="offer-form" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="name">Employee Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" value="{{ old('name', '') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : ''}}" id="date" name="date" value="{{ old('date', '') }}">
                            @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control {{ $errors->has('time') ? 'is-invalid' : ''}}" id="time" name="time" value="{{ old('time', '') }}">
                            @error('time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="float-right">
                            <button type="reset" class="btn btn-danger" id="btn-clear">Clear</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Edit Log Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employees.update') }}" method="post" id="offer-form" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="name">Employee Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" value="{{ old('name', '') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : ''}}" id="date" name="date" value="{{ old('date', '') }}">
                            @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control {{ $errors->has('time') ? 'is-invalid' : ''}}" id="time" name="time" value="{{ old('time', '') }}">
                            @error('time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="float-right">
                            <button type="reset" class="btn btn-danger" id="btn-clear">Clear</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('js/admin/employee.js') }}"></script>
    @stack('scripts')

</body>

</html>