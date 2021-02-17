@extends( $base['thema_lock'].'master' )

@section('title_admin')
   viewBrowsur
@endsection

@section('style_css')
<style>
   main {
      margin-top: 1vh;
      height: 100%;
   }
   .navbar{
      display: none;
   }
</style>
@endsection

@section ('welcome')
  
@endsection


@section ('content')
   <iframe src="{{ $file }}" width="100%" height="100%" frameborder="0">
   </iframe>
@endsection

@section ('link_js')

@endsection