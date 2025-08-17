@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Students List</h3>
                                <a href="{{ route('students.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Class</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Fees Pending</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $key=> $student)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->studentClass->name ?? 'N/A' }}</td>
                                            <td>{{ $student->studentYear->name ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge badge-{{ $student->status == 'active' ? 'success' : ($student->status == 'inactive' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($student->status) }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($student->fees_pending, 2) }}</td>
                                            <td>
                                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>

@endsection