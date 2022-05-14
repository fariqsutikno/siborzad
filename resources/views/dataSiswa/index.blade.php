@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- Setup data for datatables --}}
            @php
                $heads = [['label' => 'Nama Lengkap', 'Width' => 25], ['label' => 'NISM', 'width' => 5], ['label' => 'Tempat Lahir', 'width' => 10], ['label' => 'Tanggal Lahir', 'width' => 10], ['label' => 'Kelas', 'width' => 5], ['label' => 'Nama Ayah', 'width' => 15], ['label' => 'No Telp', 'width' => 15], ['label' => 'Status', 'Width' => 5], ['label' => 'Aksi', 'no-export' => true, 'width' => 15]];
                
                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"><i class="fa fa-lg fa-fw fa-eye"></i></button>';
                
                $config = [
                    'order' => [[0, 'asc']],
                    'columns' => [null, null, null, null, null, null, null, null, ['orderable' => false]],
                ];
                
            @endphp



            {{-- <x-adminlte-datatable id="table7" :heads="$heads" head-theme="dark" theme="light" :config="$dataSiswa" striped
                hoverable with-buttons /> --}}
            <x-adminlte-datatable id="table7" :heads="$heads" head-theme="dark" :config="$config" theme="light" striped
                hoverable with-buttons>
                @foreach ($dataSiswa as $dataPerSiswa)
                    <tr>
                        <td>{{ $dataPerSiswa->fullName }}</td>
                        <td>{{ $dataPerSiswa->nism }}</td>
                        <td>{{ $dataPerSiswa->birthPlace }}</td>
                        <td>{{ $dataPerSiswa->birthDate }}</td>
                        <td>{{ $dataPerSiswa->class12 }}</td>
                        <td>{{ $dataPerSiswa->fatherName }}</td>
                        <td>{{ $dataPerSiswa->myPhone }}</td>
                        <td><span
                                class="badge badge-{{ $dataPerSiswa->status === 'verified' ? 'success' : ($dataPerSiswa->status === 'Aktif' ? 'primary' : 'danger') }}">{{ $dataPerSiswa->status }}</span>
                        </td>
                        <td>
                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Detail Data" href="/detail"><i
                                    class="fa fa-lg fa-fw fa-eye"></i></a>
                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit Data" href="/edit"><i
                                    class="fa fa-lg fa-fw fa-pen"></i></a>
                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Delete Data" href="/delete"><i
                                    class="fa fa-lg fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop
