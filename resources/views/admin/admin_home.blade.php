@extends('admin.layout')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Административный кабинет</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Главная</li>
                </ol>
                <div class="m30 ">
                    <h4>Уважаемый, {{ Auth::user()->name }}, {{ __('Вы авторизованы!') }}
                    </h4>
                </div>
                <div class="row m30">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Страницы</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.pages.index') }}">Просмотреть Страницы</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 ml1">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Сообщения</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.messages.show.all') }}">Просмотреть сообщения</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 ml1">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Новости</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('admin.news.index') }}">Посмотреть
                                    новости</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
