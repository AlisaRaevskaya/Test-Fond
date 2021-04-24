<!-- Left Section -->
@extends('layout',['seo' => $page->getSeo()])

@section('content')
    <section id="entity_section" class="entity_section">
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <div class="entity-wrapper">

                        <div class="row justify-content-center">
                            <h1 style="text-decoration:underline">{{ $category->ru_name }}</h1>
                        </div>

                        @foreach ($pressnews as $item)

                            <div class="row justify-content-md-center m30">
                                <div class="col-md-6">
                                    <div class="entity_img" style="max-width:370px;">
                                        <img class="img-responsive"
                                            src="{{ asset('storage/app/public/news/' . $item->image) }}"
                                            alt="{{ $item->image }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="entity_title">
                                        <h1><a href="{{ route('press_category.id', $item->id) }}" target="_self">
                                                {!! $item->title !!}</a>
                                        </h1>
                                    </div>

                                    <div class="entity_meta">
                                        <p>{{ $item->cutDateline() }}</p>
                                    </div>

                                    <div class="entity_intro">
                                        {!! $item->intro !!}
                                    </div>

                                    <div style="margin-top:10px">
                                        <a href="{{ route('press_category.id', $item->id) }}"
                                            class="btn btn-outline-primary btn-lg active">
                                            Подробнее>>></a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <nav aria-label="Page navigation" class="pagination_section">
                            <ul class="pagination">
                                <li>{{ $pressnews->links() }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </section>
@endsection
<!-- Left Section -->
