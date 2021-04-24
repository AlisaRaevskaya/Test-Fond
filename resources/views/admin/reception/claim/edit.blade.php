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
                                    <li class="breadcrumb-item active">{{ $page->title }}</li>
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
                                        Редактировать статью
                                    </h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#content">Содержание</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#seo">SEO</a>
                                        </li>
                                    </ul>

                                    <div class="box tab-content">

                                        <div class="box-header with-border">
                                            {{-- @include('admin.errors')
                                            --}}
                                        </div>

                                        <div class="box-body tab-pane active" id="content">
                                            <div class="" style="margin-top:15px;">
                                                <div class="col-md-10">
                                                    {{ Form::open(['route' => ['admin.claim.update', $page->id], 'method' => 'PUT', 'files' => true]) }}
                                                    <div class="form-group">
                                                        {{ Form::label('title', 'Название') }}
                                                        {{ Form::text('title', $page->title, ['class' => 'form-control required']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('content', 'Текст') }}
                                                        {{ Form::textArea('content', $page->content, ['class' => 'form-control summernote']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('published', 'Опубликована') }}
                                                        {{ Form::select('published', [0 => 'Нет', 1 => 'Да'], $page->published) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('is_menu', 'Добавить в меню') }}
                                                        {{ Form::select('is_menu', [0 => 'Нет', 1 => 'Да'], $page->is_menu) }}
                                                    </div>

                                                    <div class="form-group">
                                                        <p style="color: tomato;">В URL могут присутствовать только буквы и
                                                            цифры латинского алфавита.Пробелы заменяются на "_" или "-"
                                                            тире. Знаки препинания должны отсутствовать.
                                                            Пример:while-we-put-off-life-it-passes
                                                        </p>
                                                        {{ Form::label('url', 'URL') }}
                                                        {{ Form::text('url', $page->url, ['class' => 'form-control']) }}
                                                    </div>
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-success">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                    <div class="box-footer">
                                                        <div class="buttons">
                                                            <a href="{{ url()->previous() }}" class="btn btn-default "><i
                                                                    class="fas fa-caret-left"></i> Назад</a>

                                                            <button class="btn btn-primary pull-right"
                                                                style="margin-left:20px;"><i class="fas fa-save"></i>
                                                                Сохранить</button>

                                                            <a href="{{ route('admin.claim.show', $page->id) }}"
                                                                class="btn btn-warning pull-right">
                                                                <i class="fas fa-folder">
                                                                </i> Просмотр</a>
                                                        </div>
                                                    </div>
                                                    {{-- {{ Form::close() }}
                                                    --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-body tab-pane" id="seo">
                                            <div class="" style="margin-top:15px;">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        {{ Form::label('name', 'Название (для админки)') }}
                                                        {{ Form::text('name', $seo->name, ['class' => 'form-control required m30']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('title', 'Title') }}
                                                        {{ Form::text('seo_title', $seo->seo_title, ['class' => 'form-control required']) }}
                                                        <i>Заголовок конкретной страницы</i>
                                                    </div>
                                                    <div class="form-group required">
                                                        {{ Form::label('description', 'Description') }}
                                                        {{ Form::textArea('description', htmlspecialchars_decode($seo->description, ENT_QUOTES), ['class' => 'form-control']) }}
                                                        <i>Описание конкретной страницы</i>
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('keywords', 'Keywords') }}
                                                        {{ Form::textArea('keywords', htmlspecialchars_decode($seo->keywords, ENT_QUOTES), ['class' => 'form-control required']) }}
                                                        <i>Ключевые слова</i>
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('og_title', 'og:Title') }}
                                                        {{ Form::text('og_title', $seo->og_title, ['class' => 'form-control']) }}
                                                        <i>заголовок страницы. Для него есть ограничение в 65 символов.
                                                            Напишите
                                                            что-то длиннее – текст будет обрезан.</i>
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('og_description', 'og:Description') }}
                                                        {{ Form::textArea('og_description', htmlspecialchars_decode($seo->og_description, ENT_QUOTES), ['class' => 'form-control']) }}
                                                        <i>краткое описание страницы длиной не более 300 символов.</i>
                                                        <i></i>
                                                    </div>


                                                    <div><a href="{{ route('admin.pages.index') }}"
                                                            class="btn btn-default "><i class="fas fa-caret-left"></i>К
                                                            страницам</a>
                                                    </div>
                                                    {{ Form::close() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </main>
    </div>
@endsection
