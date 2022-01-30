@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="display-5 text-center">Kalkulator</h1>
            </div>
            <div class="card-body">
                <form id="kalkulator" method="POST" action="">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="hasil" class="form-label">Hasil</label>
                                <input type="text" class="form-control form-control-lg" id="hasil" name="hasil" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="number" class="form-control" id="bil1" name="bil1" aria-describedby="bil1desc" required>
                                <div id="bil1desc" class="form-text" name=>Bilangan 1</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="number" class="form-control" id="bil2" name="bil2" aria-describedby="bil2desc" required>
                                <div id="bil2desc" class="form-text">Bilangan 2</div>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-6">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" id="jumlah">Penjumlahan</button>
                                <button class="btn btn-primary" type="submit" id="kurang">Pengurangan</button>
                                <button class="btn btn-primary" type="submit" id="kali">Perkalian</button>
                                <button class="btn btn-primary" type="submit" id="bagi">Pembagian</button>
                                <button class="btn btn-primary" type="submit" id="pangkat">Perpangkatan</button>
                                <button class="btn btn-primary" type="submit" id="modulo">Modulo</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="history" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hasil</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        getHasil('.btn-success')

        function getHasil(data)
        {
            $(document).on('click',data,function(){
                const id = $(this).data('id');

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                $.ajax({
                    type: "POST",
                    url: "{{route('get-hasil')}}",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        $('#bil1').val(response.hasil);
                    }
                });
            })
        }
        $(function() {
            $('#history').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                paging: false,
                ordering: false,
                info: false,
                scrollY: "200px",
                scrollCollapse: true,
                ajax: "{{ route('get-riwayat') }}",
                columns: [{
                        data: "hasil",
                        name: "hasil",
                        class: "text-center"
                    },
                    {
                        data: "action",
                        name: "action"
                    }
                ]
            });
            $('#kalkulator').submit(function(e) {
                e.preventDefault();
                $(document).on('click', '#jumlah', function() {
                    $('form').attr('action', '{{ route('jumlah') }}')

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "{{ route('jumlah') }}",
                        data: $('form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#hasil').val(response);
                            $('#bil1').val("");
                            $('#bil2').val("");
                            $('#history').DataTable().ajax.reload();
                        }
                    });
                })
                $(document).on('click', '#kurang', function() {
                    $('form').attr('action', '{{ route('kurang') }}')

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "{{ route('kurang') }}",
                        data: $('form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#hasil').val(response);
                            $('#bil1').val("");
                            $('#bil2').val("");
                            $('#history').DataTable().ajax.reload();
                        }
                    });
                })
                $(document).on('click', '#kali', function() {
                    $('form').attr('action', '{{ route('kali') }}')

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "{{ route('kali') }}",
                        data: $('form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#hasil').val(response);
                            $('#bil1').val("");
                            $('#bil2').val("");
                            $('#history').DataTable().ajax.reload();
                        }
                    });
                })
                $(document).on('click', '#bagi', function() {
                    $('form').attr('action', '{{ route('bagi') }}')

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "{{ route('bagi') }}",
                        data: $('form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#hasil').val(response);
                            $('#bil1').val("");
                            $('#bil2').val("");
                            $('#history').DataTable().ajax.reload();
                        }
                    });
                })
                $(document).on('click', '#pangkat', function() {
                    $('form').attr('action', '{{ route('pangkat') }}')

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "{{ route('pangkat') }}",
                        data: $('form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#hasil').val(response);
                            $('#bil1').val("");
                            $('#bil2').val("");
                            $('#history').DataTable().ajax.reload();
                        }
                    });
                })
                $(document).on('click', '#modulo', function() {
                    $('form').attr('action', '{{ route('modulo') }}')

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: "{{ route('modulo') }}",
                        data: $('form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#hasil').val(response);
                            $('#bil1').val("");
                            $('#bil2').val("");
                            $('#history').DataTable().ajax.reload();
                        }
                    });
                })
            })
        })
    </script>
@endsection
