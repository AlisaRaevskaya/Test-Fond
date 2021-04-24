@extends('admin.layout')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="content-wrapper admin-container" style="margin-bottom:50px;">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="padding-top:10px;">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-md-1"></div>
                            <div class="col-sm-12 col-md-10">
                                <ol class="breadcrumb float-sm-right ">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Страницы</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ route('admin.faq.edit', 6) }}">К
                                            вопросам</a></li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Редактировать вопрос
                                    </h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="box-header with-border">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="box-body col-md-10">
                                        {{ Form::open(['route' => ['admin.faq-page.update', $topic->id], 'method' => 'PUT', 'files' => true]) }}
                                        @csrf
                                        <div class="form-group">
                                            {{ Form::label('title', 'Вопрос') }}
                                            {{ Form::text('title', $topic->title, ['class' => 'form-control required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('intro', 'Краткое описание') }}
                                            {{ Form::textArea('intro', $topic->intro, ['class' => 'form-control summernote']) }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('body', 'Ответ') }}
                                            {{ Form::textArea('body', $topic->body, ['class' => 'form-control required summernote']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('date_published', 'Дата публикации') }}
                                            {{ Form::datetime('date_published', $topic->date_published, ['class' => 'form-control required']) }}
                                        </div>
                                        @if (session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="buttons">
                                                <a href="{{ url()->previous() }}" class="btn btn-default "><i
                                                        class="fas fa-caret-left"></i> Назад</a>

                                                <button class="btn btn-primary pull-right" style="margin-left:20px;"><i
                                                        class="fas fa-save"></i>
                                                    Сохранить</button>

                                                <a href="{{ route('admin.faq-page.show', $topic->id) }}"
                                                    class="btn btn-warning pull-right">
                                                    <i class="fas fa-folder">
                                                    </i> Просмотр</a>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.col-->
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection
