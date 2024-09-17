@extends("layouts.layouts")

@section("konten")
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('roles') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Role</h1>
            </div>
            <div class="section-body">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <form action="{{ route('roles.store') }}" method="POST" >
                                    @csrf
                                    <div class="card-header">
                                        <h4>Tambah Role</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Role</label>
                                            <input type="text" class="form-control" name="nama"  value="{{ old("nama") }}" >
                                            @if ($errors->has('nama'))
                                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="d-block">Master Data</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="menu[]" value="dashboards" >
                                                        <label class="form-check-label">
                                                            Dashboard
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="menu[]" value="roles" >
                                                        <label class="form-check-label">
                                                            Role
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="menu[]" value="users" >
                                                        <label class="form-check-label">
                                                            User
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="menu[]" value="departemens" >
                                                        <label class="form-check-label">
                                                            Departemen
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="menu[]" value="kendaraans" >
                                                        <label class="form-check-label">
                                                            Kendaraan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="d-block">Transaksi</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="menu[]" value="permintaan-kendaraans" >
                                                        <label class="form-check-label">
                                                            Permintaan Kendaraan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="menu[]" value="verifikasi-permintaan-kendaraans" >
                                                        <label class="form-check-label">
                                                            Verifikasi Permintaan Kendaraan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('roles') }}" class="btn btn-info">Kembali</a>
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
