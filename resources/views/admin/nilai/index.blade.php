@extends('template.adminNilai')
@section('adminNilai')
    <div class="table-card prestasi-card-container">
        <div class=" text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="mb-0">Nilai Santri</h3>
                <a class="btn btn-md btn-primary " style="margin-bottom:20px" href="{{ route('admintambahnilai') }}"><i
                        class="fas fa-plus-circle"></i> Add New Data</a>
            </div>
        </div>
            <div class="card">
                <div class="card-body py-4 px-4">
                    <table class="table number align-right table-bordered table-hover mb-0 ">
                        <h5 class="card-title">Table Data Nilai Santri</h5><br>
                        <thead>
                            <tr class="text-white">
                                <th scope="col">No</th>
                                <th scope="col">Nama Santri</th>
                                <th scope="col">Fiqih</th>
                                <th scope="col">IT</th>
                                <th scope="col">Hadis</th>
                                <th scope="col">Quran</th>
                                <th scope="col">Bahasa Arab</th>
                                <th scope="col">Bahasa Inggris</th>
                                <th scope="col">Polygon</th>
                                <th style="center" scope="col">Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($query as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->namasantri }}</td>
                                    <td>{{ $item->Fiqih }}</td>
                                    <td>{{ $item->IT }}</td>
                                    <td>{{ $item->Hadis }}</td>
                                    <td>{{ $item->BahasaInggris }}</td>
                                    <td>{{ $item->BahasaArab }}</td>
                                    <td>{{ $item->Quran }}</td>
                                    <td>{{ $item->Polygon }}</td>

                                    <td class="text-center">
                                        <a class="btn btn-warning rounded-pill m-2" href="{{ route('admineditnilai', $item->id) }}"><i
                                                class="fa fa-solid fa-pen"></i></a>
                                        <a class="btn btn-light rounded-pill m-2" href="{{ route('adminhapusnilai', $item->id) }}"
                                            onclick="return confirm('Mau Dihapus!?')"><i class="fa fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
