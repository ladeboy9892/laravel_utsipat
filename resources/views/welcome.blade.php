<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rest API Mahasiswa</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-0 h1" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="http://unbin.ac.id/asset/img/unbin_big.png" alt="Logo" width="50" height="25" class="d-inline-block align-text-top">
                     
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Dashboard Mahasiswa</div>

                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="btnAdd">Tambah
                                    Data</a>
                                <br><br>
                                <table class="table table-striped table-bordered table-sm" id="mahasiswaTable">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="CreateModal" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="formAction" name="formAction" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="npm" class="col-md-12 col-form-label">{{ __('NPM') }}</label>

                                    <div class="col-md-12">
                                        <input id="npm-input" type="number"
                                            class="form-control @error('npm-input') is-invalid @enderror"
                                            name="npm-input" value="{{ old('npm-input') }}" required
                                            autocomplete="npm-input" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-12 col-form-label">{{ __('Phone') }}</label>

                                    <div class="col-md-12">
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-12 control-label">{{ __('Address') }}</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="address" id="address" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block" id="btnCreate"
                                    value="create">Simpan
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="UpdateModal" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleModal"></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="formActionEdit" name="formActionEdit" class="form-horizontal">

                                <div class="form-group row">
                                    <label for="name-edit" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name-edit" type="text"
                                            class="form-control @error('name-edit') is-invalid @enderror" name="name"
                                            value="{{ old('name-edit') }}" required autocomplete="name-edit" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone-edit" class="col-md-12 col-form-label">{{ __('Phone') }}</label>

                                    <div class="col-md-12">
                                        <input id="phone-edit" type="text"
                                            class="form-control @error('phone-edit') is-invalid @enderror"
                                            name="phone-edit" value="{{ old('phone-edit') }}" required
                                            autocomplete="phone" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address-edit" class="col-sm-12 control-label">{{ __('Address')
                                        }}</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="address-edit" id="address-edit"
                                            required></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block" id="btnEdit" value="edit">Simpan
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="confirmModal" data-backdrop="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Perhatian!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>apakah anda yakin untuk menghapus data ini ?</p>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-danger" name="btnDelete" id="btnDelete">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });

                $('#btnAdd').click(function() {
                    $('#button-create').val("create-post");
                    $('#id').val('');
                    $('#formAction').trigger("reset"); 
                    $('#CreateModal').modal('show');
                });

                $(document).ready(function() {
                    $.get('http://localhost:8100/mahasiswa', function(data) {
                        var rows = '';
                        $.each(data, function(index, item) {
                            rows += '<tr>';
                            rows += '<td>' + item.npm + '</td>';
                            rows += '<td>' + item.name + '</td>';
                            rows += '<td>' + item.phone + '</td>';
                            rows += '<td>' + item.address + '</td>';
                            rows += '<td><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' + item.npm + '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a> <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' + item.npm + '" data-original-title="Delete" class="delete btn btn-danger btn-sm "> Delete</a></td>';
                            rows += '</tr>';
                        });
                        $('#mahasiswaTable tbody').html(rows);
                    });
                });

                $(document).ready(function() {
                    $('#formAction').submit(function(e) {
                        e.preventDefault();
                        $('#btnCreate').html('Sending..');
                        $.post({
                            url: 'http://localhost:8100/mahasiswa',
                            contentType: 'application/json; charset=utf-8',
                            dataType: 'json',
                            data: JSON.stringify({
                                'npm': parseInt($('#npm-input').val()),
                                'name': $('#name').val(),
                                'phone': $('#phone').val(),
                                'address': $('#address').val(),
                            }),
                            success: function(data) {
                                // handle success response
                                $('#formAction').trigger("reset");
                                $('#CreateModal').modal('hide');
                                $('#btnCreate').html('Save');
                                iziToast.success({ //show toast success
                                    title: 'Saved',
                                    message: '{{ Session(' success ') }}',
                                    position: 'bottomRight'
                                });
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                // handle error response
                                alert('There was an error submitting the form.');
                                $('#btnCreate').html('Save');
                            }
                        });
                    });
                }); 

                $('body').on('click', '.edit-post', function () {
                    var data_id = $(this).data('id');  
                    $('#titleModal').html("Edit Mahasiswa <br> NPM " + data_id);
                    $('#formActionEdit').trigger("reset"); 
                    $('#UpdateModal').modal('show');
                });
                
                $(document).ready(function() {
                    $('#formActionEdit').submit(function(e) {
                        e.preventDefault(); 
                        var data_npm = parseInt($('#npm-input-edit').val())
                        $('#btnEdit').html('Sending..');
                        $.ajax({
                            url: 'http://localhost:8100/mahasiswa/15210008',
                            type: 'PUT',
                            data: JSON.stringify({
                                'npm': data_npm,
                                'name': $('#name-edit').val(),
                                'phone': $('#phone-edit').val(),
                                'address': $('#address-edit').val(),
                            }),
                            contentType: 'application/json; charset=utf-8',
                            dataType: 'json',
                            beforeSend: function(xhr) {
                                xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT');
                            },
                            success: function(data) {
                                // handle success response
                                $('#formActionEdit').trigger("reset");
                                $('#UpdateModal').modal('hide');
                                $('#btnEdit').html('Save');
                                iziToast.success({ //show toast success
                                    title: 'Saved',
                                    message: '{{ Session(' success ') }}',
                                    position: 'bottomRight'
                                });
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                // handle error response
                                alert('There was an error submitting the JSON data.');
                                $('#btnEdit').html('Save');
                            }
                        });
                    });
                }); 

                $(document).on('click', '.delete', function () {
                    data_id = $(this).data('id');  
                    $('#confirmModal').modal('show');
                });
                
                $('#btnDelete').click(function () { 
                    $.ajax({
                        url: "http://localhost:8100/mahasiswa/" + data_id,
                        type: 'DELETE',
                        beforeSend: function () {
                            $('#btnDelete').text('Delete');
                        },
                        success: function (data) {
                            setTimeout(function () {
                                $('#confirmModal').modal('hide');
                            });
                            iziToast.warning({ //show toast warning
                                title: 'Deleted',
                                message: '{{ Session('delete')}}',
                                position: 'bottomRight'
                            }); 
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // handle error response
                            alert('There was an error submitting the JSON data.');
                            $('#btnEdit').html('Save');
                        }
                    })
                }); 
            </script>
        </main>
    </div>
</body>

</html>