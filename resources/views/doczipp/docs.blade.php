


@extends('layouts.layout')
@section('title', " Liste des Documents")
@section('content')

    <div class="col-md-8 mx-auto ">
      <h2>@lang('lang.text_list_doc')</h2>
        <table class="table">
         
            <tbody>
              <tr> 
                <td>@lang('lang.text_name')</td> <td>@lang('lang.text_title')</td> <td>@lang('lang.text_link')</td></tr> 
  
              @foreach ($docsZipps as $docsZipp)  

              <tr>   
                <td><strong>{{ $docsZipp->docHasUser->name}} </strong></td> <td><strong>{{$docsZipp->title}}</strong> </td> <td><strong> <a href="#">{{$docsZipp->path}}  </a>  
                  @if(auth()->user()->id === $docsZipp->user_id)
                <td><a href="{{route('docs.edit', $docsZipp->id)}}" class='btn btn-secondary'>@lang('lang.text_modifiy')</a> </td>
                <td> <form action="{{route('docs.delete', $docsZipp->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" value="@lang('lang.text_delete')" class="btn btn-danger ">
                 
              </form></td>
              @endif
               
              </tr>
              @endforeach   
            </tbody>
          </table>
     
  
        </div>
        {{ $docsZipps }}
</div>

@endsection


