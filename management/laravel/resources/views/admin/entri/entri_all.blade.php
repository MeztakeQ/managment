@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Записи</h4>

                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 168px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Номер</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 256px;"
                                                        aria-label="Position: activate to sort column ascending">Имя файла
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 256px;"
                                                        aria-label="Position: activate to sort column ascending">Файл
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 256px;"
                                                        aria-label="Position: activate to sort column ascending">Размер
                                                        файла
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 58px;"
                                                        aria-label="Age: activate to sort column ascending">Почта
                                                        пользователя</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 114px;"
                                                        aria-label="Start date: activate to sort column ascending">Создание
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 114px;"
                                                        aria-label="Start date: activate to sort column ascending">Изменения
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 102px;"
                                                        aria-label="Salary: activate to sort column ascending">Действия</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr>
                                                        <td> {{ $loop->iteration }} </td>
                                                        <td> {{ $item->title }} </td>
                                                        <td> <a href="{{route('entri.download', $item->id) }}">{{ $item->getName() }}</a></td>
                                                        <td> {{ $item->sizeForHuman() }} </td>
                                                        <td> {{ $item->email }} </td>
                                                        <td> {{ $item->created_at->isoFormat('LLL') }}</td>
                                                        <td> {{ $item->updated_at->isoFormat('LLL') }}</td>
                                                        <td>
                                                            <a href="{{ route('edit.entri', $item->id) }}"
                                                                class="btn btn-info sm" title="Редактировать запись"> <i
                                                                    class="fas fa-edit"></i> </a>

                                                            <a href="" class="btn btn-danger sm"
                                                                title="Удалить Запись" id="delete"> <i
                                                                    class="fas fa-trash-alt"></i> </a>

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">

                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
