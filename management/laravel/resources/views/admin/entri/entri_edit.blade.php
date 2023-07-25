@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Редактирование записи</h4>

                            <form method="post" action="{{ route('update.entri') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $entri->id }}">

                                <div class="row mb-3">
                                    
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Имя Файла</label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text"
                                            value="{{ $entri->title }}" id="example-text-input">
                                        @error('title')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Почта
                                        пользователя</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="email"
                                            value="{{ $entri->email }}" id="example-text-input">

                                        @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->



            
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Файл записи</label>
                                    <div class="col-sm-10">
                                        <input name="home_file" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ asset($entri->home_file) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Protfolio Data">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
