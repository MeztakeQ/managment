@extends('frontend.main_master')
@section('main')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            {{-- <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div> --}}
            <!-- end page title -->


            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-buttons"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 268px;"
                                                        aria-label="Name: activate to sort column descending"
                                                        aria-sort="ascending">Имя файла
                                                    </th>

                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 98px;"
                                                        aria-label="Name: activate to sort column descending"
                                                        aria-sort="ascending">Размер файла
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 121px;"
                                                        aria-label="Office: activate to sort column ascending">Почта
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 58px;"
                                                        aria-label="Age: activate to sort column ascending">Изменения</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 54px;"
                                                        aria-label="Start date: activate to sort column ascending">Действия
                                                    </th>

                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php
                                                    $entri = App\Models\Entri::latest()->get();
                                                    
                                                @endphp


                                                @foreach ($entri as $item)
                                                    <tr class="odd">

                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $item->title }}
                                                        </td>
                                                        <td>122MB</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->updated_at }}</td>

                                                        <td><a href="{{route('entri.download', $item->id) }}">Скачать</a></td>



                                                    </tr>
                                                @endforeach()

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
            <!-- end row -->
        </div>

    </div>
@endsection
