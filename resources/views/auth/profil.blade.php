@extends("layouts.layouts")

@section("konten")
    <div class="main-content">
        <section class="section">
            <div class="section-header">

                <h1>Profil</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profil</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" name="id"  value="{{ $data->id }}" >
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name"  value="{{ $data->name }}" >
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ $data->email }}" >
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" >
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
