

@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Изменить пароль</h4>


                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show"> {{$error}} </p>
                                @endforeach

                            @endif

                            <form method="post" action="{{ route('update.password') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Старый пароль</label>
                                    <div class="col-sm-10">
                                        <input name="oldpassword" class="form-control" type="password"
                                            value="" id="oldpassword">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Новый пароль</label>
                                    <div class="col-sm-10">
                                        <input name="newpassword" class="form-control" type="password"
                                            value="" id="newpassword">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Подтвердить пароль</label>
                                    <div class="col-sm-10">
                                        <input name="confirm_password" class="form-control" type="password"
                                            value="" id="confirm_password">
                                    </div>
                                </div>
                                <!-- end row -->

                            
                               

                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Обновить пароль">
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
