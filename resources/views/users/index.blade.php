@extends("layouts.layouts")

@section("konten")
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User</h1>
                <div class="section-header-button">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
                </div>

            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-form">
                                    <form action="{{ route('users') }}" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama" value="{{app('request')->input('nama')}}"">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-striped">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Hak Akses</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($data as $item)
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->roles?->nama }}</td>
                                                <td>

                                                    <form action="{{ route('users.destroy',$item->id) }}" method="POST">
                                                        <a href="{{ route('users.edit',$item->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                        @csrf
                                                        @method("DELETE")
                                                        <a class="btn btn-icon btn-danger show-alert-delete-box"><i class="fas fa-trash" style="color: white"></i></a>
                                                    </form>
{{--                                                    <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
