@extends("layouts.layouts")

@section("konten")
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Permintaan Kendaraan</h1>
                <div class="section-header-button">
                    <a href="{{ route('permintaan.kendaraans.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">

                                <div class="card-header-form">
                                    <form action="{{ route('roles') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama" value="{{app('request')->input('nama')}}"">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                                            <th>Nomor Pesanan</th>
                                            <th>Kendaraan</th>
                                            <th>Nama</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->nomor_pesanan }}</td>
                                                <td>{{ $item->kendaraan->nama }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->tanggal }} {{ $item->jam_awal }} - {{ $item->tanggal_akhir }} {{ $item->jam_akhir }}</td>
                                                <td>
                                                    @if($item->status == "pending")
                                                        <span class="badge badge-info">Pending</span>
                                                    @else
                                                        <span class="badge badge-primary">Distujui</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="card-footer text-right">
                                                        <form action="{{ route('permintaan.kendaraans.destroy',$item->id) }}" method="POST">
                                                            <a href="{{ route('permintaan.kendaraans.edit',$item->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                            @csrf
                                                            @method("DELETE")
                                                            <a class="btn btn-icon btn-danger show-alert-delete-box"><i class="fas fa-trash" style="color: white"></i></a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                {!! $data->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
