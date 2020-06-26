@extends('layouts.user')

@section('content')
<h2 class="brand-header">質問一覧</h2>
<div class="main-wrap">
  <form name='search'>
    <div class="btn-wrapper">
      <div class="search-box">
        {!! Form::text('search_word', $searches['search_word'] ??  null, ['class' => "form-control search-form", 'placeholder' => 'Search words...']) !!}
        {!! Form::button('<i class="fa fa-search" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'search-icon']) !!}
      </div>
      <a class="btn" href="{{ route('question.create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <a class="btn" href="{{ route('question.showMypage')}}">
        <i class="fa fa-user" aria-hidden="true"></i>
      </a>
    </div>
    <div class="category-wrap">
      <div class="btn all" id="">all</div>
      @foreach ($tagCategories as $tagCategory)
      <div class="btn" id="{{ $tagCategory->id }}">{{ $tagCategory->name }}</div>
      @endforeach
      {!! Form::hidden('tag_category_id', $searches['tag_category_id'] ??  null, ['id' => 'category-val']) !!}
    </div>
  </form>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-1">user</th>
          <th class="col-xs-2">category</th>
          <th class="col-xs-6">title</th>
          <th class="col-xs-1">comments</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($questions as $question)
        <tr class="row">
          <td class="col-xs-1"><img src="{{ $question->user->avatar }}" class="avatar-img"></td>
          <td class="col-xs-2">{{ $question->tagCategories->name }}</td>
          <td class="col-xs-6"></td>
          <td class="col-xs-1">{{ $question->comments->count() }}<span class="point-color"></span></td>
          <td class="col-xs-2">
            <a class="btn btn-success" href="{{ route('question.show', $question->id) }}">
              <i class="fa fa-comments-o" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div aria-label="Page navigation example" class="text-center">
        {{-- {{ $questions->appends($searches)->links() }} --}}
    </div>
  </div>
</div>
@endsection