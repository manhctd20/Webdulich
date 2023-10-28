@extends('frontend.master')
@section('title')
    Result
@endsection

@section('search-results')
    <section class="search-results">
        <div class="container">
            <h2>Kết quả tìm kiếm cho "{{ $query }}"</h2>

            @if (count($searchResults) > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li>
                            <h3>{{ $result->title }}</h3>
                            <p>{{ $result->description }}</p>
                            <a href="{{ route('guide.details', ['id' => $result->id]) }}">Xem chi tiết</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Không tìm thấy kết quả phù hợp.</p>
            @endif
        </div>
    </section>
@endsection
