@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1 class="m-0 text-dark">List Pengajuan Perubahan Data</h1>
@stop

@section('content')
    <div class="row">
        <div class="card card-primary card-outline col-12 mx-auto">
            {{-- <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Tabs Custom Content Examples
                </h3>
            </div> --}}
            <div class="card-body">
                <ul class="nav nav-tabs pb-2" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-waiting-tab" data-toggle="pill"
                            href="#custom-content-below-waiting" role="tab" aria-controls="custom-content-below-waiting"
                            aria-selected="true">Menunggu <span
                                class="badge badge-pill badge-warning ml-2">{{ count($waitingReqs) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-accepted-tab" data-toggle="pill"
                            href="#custom-content-below-accepted" role="tab" aria-controls="custom-content-below-accepted"
                            aria-selected="false">Diterima <span
                                class="badge badge-pill badge-success ml-2">{{ count($acceptedReqs) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-ignored-tab" data-toggle="pill"
                            href="#custom-content-below-ignored" role="tab" aria-controls="custom-content-below-ignored"
                            aria-selected="false">Ditolak <span
                                class="badge badge-pill badge-danger ml-2">{{ count($ignoredReqs) }}</span></a>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-waiting" role="tabpanel">
                        @php
                            $heads = [['label' => 'Nama Lengkap', 'Width' => 25], ['label' => 'NISM', 'width' => 10], ['label' => 'NISN', 'width' => 10], ['label' => 'Kelas', 'width' => 10], ['label' => 'No Telp', 'width' => 15], ['label' => 'Tanggal Pengajuan', 'width' => 20], ['label' => 'Aksi', 'no-export' => true, 'width' => 10]];
                            
                            $config = [
                                'order' => [[5, 'asc']],
                                'columns' => [null, null, null, null, null, null, ['orderable' => false]],
                            ];
                            
                        @endphp
                        <x-adminlte-datatable id="table7" :heads="$heads" head-theme="dark" :config="$config"
                            theme="light" striped hoverable with-buttons>
                            @foreach ($waitingReqs as $waitingReq)
                                <tr>
                                    <td>{{ $waitingReq->fullName }}</td>
                                    <td>{{ $waitingReq->nism }}</td>
                                    <td>{{ $waitingReq->nisn }}</td>
                                    <td>{{ $waitingReq->class12 }}</td>
                                    <td>{{ $waitingReq->myPhone }}</td>
                                    <td>{{ $waitingReq->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <form action="{{ route('reqs.accept') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $waitingReq->id }}">
                                                <button class="btn btn-xs btn-default text-success mx-1 shadow"
                                                    title="Terima Perubahan" type="submit"
                                                    onclick="return confirm('Data yang ditolak tidak akan bisa diowah-owah di kemudian hari. Yakin ingin menerima?')"><i
                                                        class="fa fa-lg fa-fw fa-check"></i></button>
                                            </form>
                                            <form action="{{ route('reqs.ignore') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $waitingReq->id }}">
                                                <button class="btn btn-xs btn-default text-danger mx-1 shadow"
                                                    title="Tolak Perubahan" type="submit"
                                                    onclick="return confirm('Data yang ditolak tidak akan bisa diowah-owah di kemudian hari. Yakin ingin menolak?')"><i
                                                        class="fa fa-lg fa-fw fa-times"></i></button>
                                            </form>
                                            {{-- <button class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                title="Detail Perubahan" type="submit"><i
                                                    class="fa fa-lg fa-fw fa-user"></i></button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-accepted" role="tabpanel">
                        @php
                            $heads = [['label' => 'Nama Lengkap', 'Width' => 30], ['label' => 'NISM', 'width' => 10], ['label' => 'NISN', 'width' => 10], ['label' => 'Kelas', 'width' => 5], ['label' => 'Tanggal Pengajuan', 'width' => 20], ['label' => 'Tanggal Diterima', 'width' => 20], ['label' => 'Aksi', 'no-export' => true, 'width' => 5]];
                            
                            $config = [
                                'order' => [[5, 'asc']],
                                'columns' => [null, null, null, null, null, null, ['orderable' => false]],
                            ];
                            
                        @endphp
                        <x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" :config="$config"
                            theme="light" striped hoverable with-buttons>
                            @foreach ($acceptedReqs as $acceptedReq)
                                <tr>
                                    <td>{{ $acceptedReq->fullName }}</td>
                                    <td>{{ $acceptedReq->nism }}</td>
                                    <td>{{ $acceptedReq->nisn }}</td>
                                    <td>{{ $acceptedReq->class12 }}</td>
                                    <td>{{ $acceptedReq->created_at }}</td>
                                    <td>{{ $acceptedReq->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            {{-- <form action="acceptedReqs/acc/{{ $acceptedReq->id }}" method="post">
                                    @csrf
                                    <button class="btn btn-xs btn-default text-success mx-1 shadow" title="Terima Perubahan"
                                        type="submit"><i class="fa fa-lg fa-fw fa-check"></i></button>
                                </form>
                                <form action="acceptedReqs/ignore/{{ $acceptedReq->id }}" method="post">
                                    @csrf
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Tolak Perubahan"
                                        type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>
                                </form> --}}
                                            <button class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                title="Detail Perubahan" type="submit"><i
                                                    class="fa fa-lg fa-fw fa-user"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-ignored" role="tabpanel">
                        @php
                            $heads = [['label' => 'Nama Lengkap', 'Width' => 30], ['label' => 'NISM', 'width' => 10], ['label' => 'NISN', 'width' => 10], ['label' => 'Kelas', 'width' => 5], ['label' => 'Tanggal Pengajuan', 'width' => 20], ['label' => 'Tanggal Ditolak', 'width' => 20], ['label' => 'Aksi', 'no-export' => true, 'width' => 5]];
                            
                            $config = [
                                'order' => [[5, 'asc']],
                                'columns' => [null, null, null, null, null, null, ['orderable' => false]],
                            ];
                            
                        @endphp
                        <x-adminlte-datatable id="table9" :heads="$heads" head-theme="dark" :config="$config"
                            theme="light" striped hoverable with-buttons>
                            @foreach ($ignoredReqs as $ignoredReq)
                                <tr>
                                    <td>{{ $ignoredReq->fullName }}</td>
                                    <td>{{ $ignoredReq->nism }}</td>
                                    <td>{{ $ignoredReq->nisn }}</td>
                                    <td>{{ $ignoredReq->class12 }}</td>
                                    <td>{{ $ignoredReq->created_at }}</td>
                                    <td>{{ $ignoredReq->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            {{-- <form action="ignoredReqs/acc/{{ $ignoredReq->id }}" method="post">
                                    @csrf
                                    <button class="btn btn-xs btn-default text-success mx-1 shadow" title="Terima Perubahan"
                                        type="submit"><i class="fa fa-lg fa-fw fa-check"></i></button>
                                </form>
                                <form action="ignoredReqs/ignore/{{ $ignoredReq->id }}" method="post">
                                    @csrf
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Tolak Perubahan"
                                        type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>
                                </form> --}}
                                            <button class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                title="Detail Perubahan" type="submit"><i
                                                    class="fa fa-lg fa-fw fa-info"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
