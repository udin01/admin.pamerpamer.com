@extends( $base['thema_lock'].'master' )

@section('title_admin')
  {{ $baseApp['title'] }}
@endsection

@section('style_css')
<style>
 @media (max-width: 768px){
  .video-bg .video-foreground, .video-background iframe {
    height: calc(100vw/1.77);
    top: calc(20vh/2);
  }
}
</style>
@endsection

@section ('welcome')
  <section class="bg-dark">
    <div class="container" style="min-height:101px">
      
    </div>
  </section>
	<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
		<div class="container">
    <div class="row">
			<div class="col-md-12 align-self-center order-1">
				<ul class="breadcrumb d-block text-center">
					<li><a href="{{ route('expoproperty_front.home') }}">Home</a></li>
					<li class="active">Change password</li>
				</ul>
			</div>
		</div>

			<div class="row">
				<div class="col-md-12 align-self-center p-static order-2 text-center">
					<h1 class="text-dark text-8"> Konfirmasi password baru</h1>
				</div>
			</div>
		</div>
	</section>
@endsection


@section ('content')

<div class="container">

  <div class="row py-4">
    <div class="col-lg-6">

      <div class="overflow-hidden mb-1">
        <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">New Password</strong></h2>
      </div>
      <div class="overflow-hidden mb-4 pb-3">
        <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Isikan password baru!</p>
      </div>

      <form class="contact-form" action="{{ route('expoproperty_front.update-new-password') }}" method="POST">
        @csrf
        <div class="contact-form-success alert alert-success d-none mt-4">
          <strong>Success!</strong> Success Change password , lets login with new password.
        </div>

        <div class="contact-form-error alert alert-danger d-none mt-4">
          <strong>Error!</strong>
          <span class="mail-error-message text-1 d-block"></span>
        </div>

        <div class="form-row">
          <div class="form-group col-lg-12">
            <label class="required font-weight-bold text-dark text-2">Password</label>
            <input type="password" value="" data-msg-required="Please enter your password." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="password" required>
            <input type="hidden" value="{{ $user->id }}" name="id" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
          </div>
          <div class="form-group col-md-8">
            <div class="text-right">
              <label class="form-check-label">
                <a href="{{ route('expoproperty_front.login') }}">kembali ke halaman Login</a>
              </label>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <input type="submit" value="Send" class="btn btn-primary btn-modern" data-loading-text="Loading...">
          </div>
        </div>
      </form>


      <div class="divider divider-small">
					<hr class="bg-color-grey-scale-4">
			</div>

      <a type="button" class="btn btn-warning" href="{{ route('expoproperty_front.signup') }}" >Mendaftar</a>

    </div>
    <div class="col-lg-6">

      @include( $base['thema_lock'].'side-login')

    </div>

  </div>

</div>

@endsection
