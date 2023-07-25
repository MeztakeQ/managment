@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <center>
                            <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg'))  }}"
                                alt="Card image cap">
                        </center>

                        <div class="card-body">
                            <h4 class="card-title">Имя : {{ $adminData->name }} </h4>
                            <hr>
                            <h4 class="card-title">Электронная почта пользователя : {{ $adminData->email }} </h4>
                            <hr>
                            <h4 class="card-title">Логин : {{ $adminData->username }} </h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Редактировать</a>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection
