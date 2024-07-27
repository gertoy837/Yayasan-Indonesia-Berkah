@extends('template.nilai')
@section('nilai')
    <div class=" text-center rounded mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h3 class="mb-0">Data Nilai {{Auth::user()->nama_lengkap}}</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table number align-right table-bordered table-hover mb-0 ">
            <thead>
                <tr class="text-white">
                    <th scope="col" class="text-center" width="5%">No</th>
                    <th scope="col">Adab</th>
                    <th scope="col">Aqidah</th>
                    <th scope="col">Akhlak</th>
                    <th scope="col">Fiqih</th>
                    <th scope="col">IT</th>
                    <th scope="col">Hadis</th>
                    <th scope="col">Quran</th>
                    <th scope="col">Bahasa Arab</th>
                    <th scope="col">Bahasa Inggris</th>
                    <th scope="col">Pucblic Speaking</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->Adab }}</td>
                        <td>{{ $item->Aqidah }}</td>
                        <td>{{ $item->Akhlak }}</td>
                        <td>{{ $item->Fiqih }}</td>
                        <td>{{ $item->IT }}</td>
                        <td>{{ $item->Hadis }}</td>
                        <td>{{ $item->BahasaInggris }}</td>
                        <td>{{ $item->BahasaArab }}</td>
                        <td>{{ $item->Quran }}</td>
                        <td>{{ $item->Public_Speaking }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
