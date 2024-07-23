@extends('template.adminNilai')
@section('adminNilai')
    <div id="main-content">
        <div class="page-heading">
            <h3>Edit Data Nilai Santri {{$users->nama_lengkap}}</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="card">
                    <form method="POST" action="{{ route('adminupdatenilai', $query->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nama Santri</label>
                                                        <input value="{{ $users->nama_lengkap }}" disabled type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nama Santri" name="">
                                                        <input value="{{ $users->id }}" hidden type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nama Santri" name="user_id">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Fiqih</label>
                                                        <input value="{{ $query->Fiqih }}" type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nilah Fiqih" name="Fiqih">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column"> IT </label>
                                                        <input value="{{ $query->IT }}" type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nilai IT " name="IT">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Hadis</label>
                                                        <input value="{{ $query->Hadis }}" type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nilai Hadis" name="Hadis">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Quran</label>
                                                        <input value="{{ $query->Quran }}" type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nilai Quran" name="Quran">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Bahasa Arab</label>
                                                        <input value="{{ $query->BahasaArab }}" type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nilai Bahasa Arab" name="BahasaArab">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Bahasa Inggris</label>
                                                        <input value="{{ $query->BahasaInggris }}" type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nilai Bahasa Inggris" name="BahasaInggris">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Polyglot</label>
                                                        <input value="{{ $query->Polygon }}" type="no"
                                                            id="first-name-column" class="form-control"
                                                            placeholder="Nilai Polygon" name="Polygon">
                                                    </div>
                                                </div>



                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">edit</button>
                                                    <a href="{{ route('adminnilai') }}" type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
            </form>
        </div>
        </section>
    </div>
    </div>
    </div>
    </div>
@endsection
