@extends('admin.layout')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid admin-container" style="margin-top:30px;">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Meню</a>
                    <li class="breadcrumb-item active">Новости</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        В данном разделе Вы можете редактировать статьи из раздела "Новости".
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Новости
                        <div class="text-center">
                            <a href="{{ route('admin.news.create') }}" class="btn btn-outline-primary pull-right"><i
                                    class="fa fa-plus"></i>
                                Добавить новость</a>
                        </div>
                    </div>

                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <div class="col-md-12 justify-content-center">
                                <table class="table table-bordered table-responsive" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Дата публикации</th>
                                            <th>Дата изменения</th>
                                            <th>Действия</th>


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>

                                            <th>Дата создания</th>
                                            <th>Дата публикации</th>
                                            <th>Действия</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($news as $new)
                                            <tr>
                                                <td>{{ $new->id }}</td>
                                                <td class="col-md-7">{!! $new->title !!}</td>

                                                <td class="col-md-1">{!! $new->date_published !!}</td>
                                                <td class="col-md-1">{!! $new->updated_at !!}</td>


                                                <td class="text-center col-md-3 pl10">
                                                    <div class="row justify-content-between">
                                                        <a href="{{ route('admin.news.edit', $new->id) }}"
                                                            class="btn btn-primary"><i class="far fa-edit"></i>
                                                            Редактировать</a>


                                                        <form action="{{ route('admin.news.destroy', $new->id) }}"
                                                            method="post" class="text-center">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger "><i
                                                                    class="fa fa-trash"></i> Удалить</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation" class="pagination_section">
                    <ul class="pagination">
                        <li>{{ $news->links() }}</li>
                    </ul>
                </nav>
            </div>
        </main>
    </div>
@endsection
