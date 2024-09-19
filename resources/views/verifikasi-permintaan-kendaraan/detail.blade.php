@extends("layouts.layouts")

@section("konten")
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('verifikasi.permintaan.kendaraans') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Verifikasi Permintaan Kendaraan</h1>
            </div>
            <div class="section-body">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <form action="{{ route('verifikasi.permintaan.kendaraans.update',$data->id) }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="card-header">
                                        <h4>Detail Permintaan Kendaraan</h4>
                                    </div>
                                    <div class="card-body">

                                        <input type="hidden" name="status" value="disetujui">
                                        <div class="form-group">
                                            <label>Nomor Pesanan</label>
                                            <input type="text" class="form-control" value="{{ $data->nomor_pesanan }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Kendaraan</label>
                                            <select class="form-control" name="kendaraan_id" disabled>
                                                @foreach($kendaraan as $k)
                                                    <option @if($data->kendaraan_id == $k->id) selected @endif value="{{ $k->id }}"> {{ $k->merk }} - {{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('kendaraan_id'))
                                                <span class="text-danger">{{ $errors->first('kendaraan_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tanggal"  value="{{ $data->tanggal }}"  disabled >
                                            @if ($errors->has('tanggal'))
                                                <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" class="form-control" name="tanggal_akhir"  value="{{ $data->tanggal_akhir }}"  disabled>
                                            @if ($errors->has('tanggal_akhir'))
                                                <span class="text-danger">{{ $errors->first('tanggal_akhir') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Propinsi</label>
                                            <input type="text" class="form-control" name="propinsi"  value="{{ $data->propinsi }}" disabled>
                                            @if ($errors->has('propinsi'))
                                                <span class="text-danger">{{ $errors->first('propinsi') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <input type="text" class="form-control" name="kota"  value="{{ $data->kota }}" disabled>
                                            @if ($errors->has('kota'))
                                                <span class="text-danger">{{ $errors->first('kota') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Awal</label>
                                            <input type="text" class="form-control timepicker" name="jam_awal"  value="{{ $data->jam_awal }}" disabled>
                                            @if ($errors->has('jam_awal'))
                                                <span class="text-danger">{{ $errors->first('jam_awal') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Akhir</label>
                                            <input type="text" class="form-control timepicker" name="jam_akhir"  value="{{ $data->jam_akhir }}" disabled>
                                            @if ($errors->has('jam_akhir'))
                                                <span class="text-danger">{{ $errors->first('jam_akhir') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat 1</label>
                                            <input type="text" class="form-control" name="alamat_1"  value="{{ $data->alamat_1 }}" disabled >
                                            @if ($errors->has('alamat_1'))
                                                <span class="text-danger">{{ $errors->first('alamat_1') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat 2</label>
                                            <input type="text" class="form-control" name="alamat_2"  value="{{ $data->alamat_2 }}" disabled>
                                            @if ($errors->has('alamat_2'))
                                                <span class="text-danger">{{ $errors->first('alamat_2') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($data->status != "disetujui")
                                        <div class="card-footer text-right">
                                            <a href="{{ route('verifikasi.permintaan.kendaraans') }}" class="btn btn-danger">Tolak</a>
                                            <button class="btn btn-primary">Verifikasi</button>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('addJs')
    <script>
        $('#yearpicker').datepicker({
            format: "yyyy",         // Year format
            viewMode: "years",      // Show only the years
            minViewMode: "years",   // Prevent viewing months and days
            autoclose: true         // Close after year selection
        });
    </script>
@endsection
