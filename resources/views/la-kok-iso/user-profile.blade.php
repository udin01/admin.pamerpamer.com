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

@section('style_css_all_in')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('link_js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('.select-jurusan').select2();

		$(".select-jurusan").change(function(){
				let jur = $(this).val()
				if(jur === 'lain-lain'){
					$('.input-jurusan-lain').show();
					$('.input-jurusan-lain').focus();
				} else {
					$('.input-jurusan-lain').hide();
				}
		});
		$(".select-institusi").change(function(){
				let jur = $(this).val()
				if(jur === 'lain-lain'){
					$('.input-institusi-lain').show();
					$('.input-institusi-lain').focus();
				} else {
					$('.input-institusi-lain').hide();
				}
		});
		$('#pasfoto').on('change', function () {
				var fileReader = new FileReader();
				fileReader.onload = function () {
					if( fileReader.result.includes("data:image") ){
						var data = fileReader.result;
						$('.imgPasfoto').remove();
						$('.imgPasfotoHead').prepend(`
						<img class="img-fluid rounded-circle imgPasfoto" src="${data}" />
						`);
						$('#ValPasfoto').val(data);
					} else {
						alert('masukan file gambar');
					}
				};
				fileReader.readAsDataURL($('#pasfoto').prop('files')[0]);
			});
	});

	function addPengalaman(){
		// var numRowPengalaman = $('.rowPengalaman').length;
		var html = `
		<div class="form-group row rowPengalaman rowPengalaman-${$.now()} ">
			<div class="col-lg-4">
				<span><small>Perusahaan</small></span>
				<input class="form-control" type="text" name="pengalaman[${$.now()}][perusahaan]" value="" placeholder="perusahan" >
			</div>
			<div class="col-lg-4">
				<span><small>Lama Bekerja / <i>dari tgl - sampai tgl </i></small></span>
				<input class="form-control" type="text" name="pengalaman[${$.now()}][lama]" value="" placeholder="lama bekerja" >
			</div>
			<div class="col-lg-4">
				<span><small>Posisi</small></span>
				<input class="form-control" type="text" name="pengalaman[${$.now()}][posisi]" value="" placeholder="posisi jabatan" >
				
				<span class="float-right m-1">
				<btn class="btn btn-xs btn-danger btn-round" onclick="$('.rowPengalaman-${$.now()}').remove();"><b>-</b></btn>
				</span>
			</div>
		</div>
		`;
		$( ".rowPengalamanHead" ).append( html );
	}

	function addOrg(){
		// var numRowOrg = $('.rowOrg').length;
		var html = `
		<div class="form-group row rowOrg rowOrg-${$.now()} ">
			<div class="col-lg-4">
				<span><small>Organisasi</small></span>
				<input class="form-control" type="text" name="org[${$.now()}][perusahaan]" value="" placeholder="Organisasi" >
			</div>
			<div class="col-lg-4">
				<span><small>Lama / <i>dari tgl - sampai tgl </i></small></span>
				<input class="form-control" type="text" name="org[${$.now()}][lama]" value="" placeholder="lama " >
			</div>
			<div class="col-lg-4">
				<span><small>Posisi</small></span>
				<input class="form-control" type="text" name="org[${$.now()}][posisi]" value="" placeholder="posisi/jabatan" >
				
				<span class="float-right m-1">
				<btn class="btn btn-xs btn-danger btn-round" onclick="$('.rowOrg-${$.now()}').remove();"><b>-</b></btn>
				</span>
			</div>
		</div>
		`;
		$( ".rowOrgHead" ).append( html );
	}
</script>
@endsection


@section ('content')
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
					<li class="active">My Account</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 align-self-center p-static order-2 text-center">
				<h1 class="text-dark text-8"> Akun Saya </h1>
			</div>
		</div>
	</div>
</section>
<div class="container">

<div class="container py-4">

<div class="row">
	<div class="col-lg-3 mt-4 mt-lg-0">

		<div class="d-flex justify-content-center mb-4">
			<div class="profile-image-outer-container">
				<div class="profile-image-inner-container bg-color-primary imgPasfotoHead">
					<img class="img-fluid rounded-circle imgPasfoto"
					 @if($user->pasfoto) src="{{ $user->pasfoto }}"  @else src="{{ env('URL_ENDPOINT').$baseApp['default_logo_comapny'] }}" @endif />

					<span class="profile-image-button bg-color-dark">
						<i class="fas fa-camera text-light"></i>
					</span>
				</div>
				<input type="file" id="pasfoto" name="pasfoto" class="profile-image-input">
			</div>
		</div>
		<aside class="sidebar mt-2" id="sidebar">
			<div class="tabs tabs-vertical tabs-right tabs-navigation tabs-navigation-simple">
				<ul class="nav nav-tabs col-sm-3">
					<li class="nav-item @if(!$act) active @endif">
						<a class="nav-link" href="#tabsProfile" data-toggle="tab">Edit Profile</a>
					</li>
					<li class="nav-item @if($act === 'tabsSaveJobs') active @endif">
						<a class="nav-link" href="#tabsSaveJobs" data-toggle="tab">Save Jobs</a>
					</li>
					<li class="nav-item @if($act === 'tabsJobsApplied') active @endif">
						<a class="nav-link" href="#tabsJobsApplied" data-toggle="tab">Job Applied</a>
					</li>
					<li class="nav-item @if($act === 'tabsResume') active @endif">
						<a class="nav-link" href="#tabsResume" data-toggle="tab">Upload Resume</a>
					</li>
					{{-- <li class="nav-item @if($act === 'tabsSetting') active @endif">
						<a class="nav-link" href="#tabsSetting" data-toggle="tab">Setting</a>
					</li> --}}
				</ul>
			</div>
		</aside>

	</div>
	<div class="col-lg-9">
	
		<div class="tab-pane tab-pane-navigation @if(!$act) active @endif" id="tabsProfile">
			<div class="overflow-hidden mb-4 pb-3">
				<h2 class="font-weight-normal text-7 mb-0">{{ $user->name }}</h2>
			</div>
			<form role="form" class="needs-validation" action="{{ route('expoproperty_front.saveAccount') }}" method="POST">
				<input type="hidden" id="ValPasfoto" name="pasfoto">
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Nama Lengkap</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="name" value="{{ $user->name }}" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Email</label>
					<div class="col-lg-9">
						<input class="form-control" type="email" name="email" value="{{ $user->email }}" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Tanggal Lahir</label>
					<div class="col-lg-9">
						<input class="form-control" type="date" name="dob" value="{{ $user->dob }}" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Tempat Lahir</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="kota_asal" value="{{ $user->kota_asal }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Alamat</label>
					<div class="col-lg-9">
						{{-- <input class="form-control" type="text" name="alamat" value="{{ $user->alamat }}"> --}}
						
						<textarea class="form-control" type="text" name="alamat">{{ $user->alamat }}</textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Status Sipil</label>
					<div class="col-lg-9">
						{{-- <input class="form-control" type="text" name="status_nikah" value="{{ $user->status_nikah }}"> --}}
						<select class="form-control mb-3" name="status_nikah">
							@foreach ( $option['statusNikah'] as $statusNikah_key => $statusNikah)
								 <option value="{{$statusNikah_key}}"  @if($user->status_nikah === $statusNikah_key)  selected='selected' @endif>{{ $statusNikah }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Jenis Kelamin</label>
					<div class="col-lg-9">
						{{-- <input class="form-control" type="text" name="status_nikah" value="{{ $user->status_nikah }}"> --}}
						<select class="form-control mb-3" name="gender">
							@foreach ( $option['gender'] as $gender_key => $gender)
								 <option value="{{$gender_key}}" @if($user->gender === $gender_key)  selected='selected' @endif>{{ $gender }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">No. HP</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="berat" value="{{ $user->telp }}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Tinggi Badan</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="tinggi" value="{{ $user->tinggi }}">
						<span><small>dalam "cm"</small></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Berat Badan</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="berat" value="{{ $user->berat }}">
						<span><small>dalam "kg"</small></span>
					</div>
				</div>

				


			{{--		
				pengalaman_kerja (add lebih dari 1 ){
					Nama Perusahaan
					Posisi
					Lama Kerja (Bulan tahun masuk kerja-bulan tahun pindah kerja/tetap kerja di perusahaan yang sama )
				}
				
				pengalaman_organisasi (add lebh dari 1 ){
					Organisasi
					Jabatan
					Lama berorganisasi(Bulan tahun mulai berorganisasi-bulan tahun selesai berorganisasi)
				} --}}
																

				<div style="margin-top:60px;margin-botton:20px;"><hr/></div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Jenjang</label>
					<div class="col-lg-9">
						{{-- <input class="form-control" type="text" name="status_nikah" value="{{ $user->status_nikah }}"> --}}
						<select class="form-control mb-3" name="id_kualifikasi">
							@foreach ( $option['kualifikasi'] as $kualifikasi_key => $kualifikasi)
								 <option value="{{$kualifikasi_key}}" @if($user->id_kualifikasi === $kualifikasi_key)  selected='selected' @endif >{{ $kualifikasi }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Tahun Masuk Univ./SMA/SMK</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="thn_masuk" value="{{ $user->thn_masuk }}">
						<span><small>ijasah terakhir</small></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Tahun Lulus Univ./SMA/SMK</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="thn_lulus" value="{{ $user->thn_lulus }}">
						<span><small>ijasah terakhir</small></span>
					</div>
				</div>

				
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Universitas / sekolah</label>
					<div class="col-lg-9">
						{{-- <input class="form-control" type="text" name="institusi" value="{{ $user->institusi }}" > --}}
						<select class="form-control select-institusi" name="institusi">
							<option value="Universitas Brawijaya" @if($user->institusi === "Universitas Brawijaya")  selected='selected' @endif >Universitas Brawijaya</option>
							<option value="lain-lain" @if($user->institusi === "lain-lain")  selected='selected' @endif >Lain-lain</option>
						</select>
						<span>
							<small>Jika Jurusan tidak tercatum pilih "lain-lain"</small>
						</span>

						<input class="form-control input-institusi-lain input-danger" style="@if($user->institusi !== 'lain-lain') display:none; @endif " type="text" name="institusi_lain" value="{{ $user->institusi_lain }}" placeholder="Universitas/sekolah Lain-lain">

					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Fakultas</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="prodi" value="{{ $user->prodi }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Program Studi/Jurusan</label>
					<div class="col-lg-9">
						{{-- <input class="form-control" type="text" name="jurusan" value="{{ $user->jurusan }}"> --}}
						<select class="form-control mb-3 select-jurusan" name="jurusan">
							@foreach ( $option['jurusan'] as $jurusan_key => $jurusan)
								 <option value="{{$jurusan_key}}" @if($user->jurusan === $jurusan_key)  selected='selected' @endif>{{ $jurusan }}</option>
							@endforeach
						</select>
						<span>
							<small>Jika Jurusan tidak tercatum pilih "lain-lain"</small>
						</span>
						
						<input class="form-control input-jurusan-lain input-danger" style="@if($user->jurusan !== 'lain-lain') display:none; @endif" type="text" name="jurusan_lain" value="{{ $user->jurusan_lain }}" placeholder="Jurusan Lain-lain">

					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">IPK/Nilai Rata-rata</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="ipk" value="{{ $user->ipk }}" >
					</div>
				</div>

				<div style="margin-top:60px;margin-botton:20px;"><hr/></div>

				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Nilai Test TOEFL</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="toefl" value="{{ $user->toefl }}" >
						<span><small>Optional</small></span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Nilai Test TOEIC</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" name="toeic" value="{{ $user->toeic }}" >
						<span><small>Optional</small></span>
					</div>
				</div>

				<div style="margin-top:60px;margin-botton:20px;">
					<label class="font-weight-bold text-dark col-form-label form-control-label text-2">Pengalaman Kerja</label>
					<label class="font-weight-bold text-dark col-form-label form-control-label float-right">
					<btn class="btn btn-sm btn-success" onclick="addPengalaman();"><b>+</b></btn>
					</label>
					<hr style="margin-top:10px;"/>
				</div>
				
				@php
					try {
						$pengalaman = json_decode($user->pengalaman_kerja);
					} catch (\Throwable $th) {
						$pengalaman = [];
					}
					$pengalaman = ($pengalaman) ? $pengalaman : [];
				@endphp
				<div class="rowPengalamanHead">
					@foreach ( $pengalaman as $pengalaman_key => $pengalaman_v )
							<div class="form-group row rowPengalaman rowPengalaman-{{$pengalaman_key}} ">
								<div class="col-lg-4">
									<span><small>Perusahaan</small></span>
									<input class="form-control" type="text" name="pengalaman[{{$pengalaman_key}}][perusahaan]" value="{{$pengalaman_v->perusahaan}}" placeholder="perusahan" >
								</div>
								<div class="col-lg-4">
									<span><small>Lama Bekerja / <i>dari tgl - sampai tgl </i></small></span>
									<input class="form-control" type="text" name="pengalaman[{{$pengalaman_key}}][lama]" value="{{$pengalaman_v->lama}}" placeholder="lama bekerja" >
								</div>
								<div class="col-lg-4">
									<span><small>Posisi</small></span>
									<input class="form-control" type="text" name="pengalaman[{{$pengalaman_key}}][posisi]" value="{{$pengalaman_v->posisi}}" placeholder="posisi jabatan" >
									
									<span class="float-right m-1">
									<btn class="btn btn-xs btn-danger btn-round" onclick="$('.rowPengalaman-{{$pengalaman_key}}').remove();"><b>-</b></btn>
									</span>
								</div>
							</div>
					@endforeach
				</div>


				<div style="margin-top:60px;margin-botton:20px;">
					<label class="font-weight-bold text-dark col-form-label form-control-label text-2">Pengalaman Organisasi</label>
					<label class="font-weight-bold text-dark col-form-label form-control-label float-right">
					<btn class="btn btn-sm btn-success" onclick="addOrg();"><b>+</b></btn>
					</label>
					<hr style="margin-top:10px;"/>
				</div>
				@php
					try {
						$org = json_decode($user->pengalaman_organisasi);
					} catch (\Throwable $th) {
						$org = [];
					}
					$org = ($org) ? $org : [];
				@endphp
				<div class="rowOrgHead">
					@foreach ( $org as $org_key => $org_v )
							<div class="form-group row rowPengalaman rowPengalaman-{{$org_key}} ">
								<div class="col-lg-4">
									<span><small>Perusahaan</small></span>
									<input class="form-control" type="text" name="pengalaman[{{$org_key}}][perusahaan]" value="{{$org_v->perusahaan}}" placeholder="perusahan" >
								</div>
								<div class="col-lg-4">
									<span><small>Lama Bekerja / <i>dari tgl - sampai tgl </i></small></span>
									<input class="form-control" type="text" name="pengalaman[{{$org_key}}][lama]" value="{{$org_v->lama}}" placeholder="lama bekerja" >
								</div>
								<div class="col-lg-4">
									<span><small>Posisi</small></span>
									<input class="form-control" type="text" name="pengalaman[{{$org_key}}][posisi]" value="{{$org_v->posisi}}" placeholder="posisi jabatan" >
									
									<span class="float-right m-1">
									<btn class="btn btn-xs btn-danger btn-round" onclick="$('.rowPengalaman-{{$org_key}}').remove();"><b>-</b></btn>
									</span>
								</div>
							</div>
					@endforeach
				</div>

				
				<div class="form-group row">
					<div class="form-group col-lg-9">

					</div>
					<div class="form-group col-lg-3">
						@csrf
						<input type="submit" value="Simpan" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
					</div>
				</div>
			</form>
		</div>
		
		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}

		<div class="tab-pane tab-pane-navigation @if($act === 'tabsSaveJobs') active @endif" id="tabsSaveJobs">
			<div class="overflow-hidden mb-4 pb-3">
				<h2 class="font-weight-normal text-7 mb-0">Save Jobs</h2>
			</div>
			<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
				<thead>
					<tr>
						<th>Lowongan</th>
						<th>Lokasi</th>
						{{-- <th>Gaji</th> --}}
						{{-- <th>Status</th> --}}
						<th>Disimpan</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				@foreach ( $jobSave as $jobS ) 
					<tr>
						<td>
								<a href="{{ route('expoproperty_front.product', ['id' => $jobS->job->uuid]) }}" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary">
									{{ $jobS->job->name }} 
								</a>
							<small><b>
								<a href="{{ route('expoproperty_front.dev', ['id' => $jobS->job->company->uuid]) }}" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary">
									{{ $jobS->job->company->name }}
								</a>
							</b></small>
						</td>
						<td>{{ $jobS->job->penempatan }}</td>
						{{-- <td>Rp. 5 - 10 Juta</td> --}}
						{{-- <td>Open</td> --}}
						<td>
							<small>{!! \Carbon\Carbon::parse($jobS->updated_at)->format("M d, Y") !!}</small>
						</td>
						<td><a href="{{ route('expoproperty_front.saveJobDelete', ['id' => $jobS->uuid ]) }}" class="btn btn-3d btn-xs btn-danger rounded-0 mb-2">Delete</a></td>
					</tr>
				@endforeach
					{{-- <tr>
						<td>Web developer Afcchen, Surabaya</td>
						<td>Surabaya</td>
						<td>Negosiasi</td>
						<td>Maret 20, 2021</td>
						<td>Open</td>
						<td><a href="#" class="btn btn-3d btn-xs btn-danger rounded-0 mb-2">Delete</a></td>
					</tr> --}}
				</tbody>
			</table>
		</div>


		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
	


		<div class="tab-pane tab-pane-navigation @if($act === 'tabsJobsApplied') active @endif" id="tabsJobsApplied">
		<div class="overflow-hidden mb-4 pb-3">
				<h2 class="font-weight-normal text-7 mb-0">Job Applied</h2>
			</div>
			<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
				<thead>
					<tr>
						<th>Lowongan</th>
						<th>Lokasi</th>
						<th>Disimpan</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ( $jobApply as $jobA_key => $jobA) 
					<tr>
						<td>
								<a href="{{ route('expoproperty_front.product', ['id' => $jobA->job->uuid]) }}" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary">
									{{ $jobA->job->name }} 
								</a>
							<small><b>
								<a href="{{ route('expoproperty_front.dev', ['id' => $jobA->job->company->uuid]) }}" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary">
									{{ $jobA->job->company->name }}
								</a>
							</b></small>
						</td>
						<td>{{ $jobA->job->penempatan }}</td>
						
						<td>
							<small>{!! \Carbon\Carbon::parse($jobA->updated_at)->format("M d, Y") !!}</small>
						</td>
						<td>
							<a href="{{ route('expoproperty_front.applyJobDelete', ['id' => $jobA->uuid ]) }}" class="btn btn-xs btn-danger rounded-0 mb-2">Cancel</a><br/>
							<button type="button" class="mt-2 btn btn-warning btn-xs" data-toggle="modal" data-target=".viewCv-{{ $jobA_key }}" onclick="gooAnalytic('modal-booth-lain')">View Prolog</button>



							{{-- ################################################## --}}
							<div class="modal fade viewCv-{{ $jobA_key }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										{{-- ..... --}}
										<section>
											<div class="containerpb-4">

													<div class="row pt-2">
														<div class="col">
														<p class="custom-font-size-1 text-center mb-2">Prolog</p>
														</div>
													</div>

												<div class="form-group row">
													<div class="col-lg-12">
														<textarea class="form-control" type="text" name="pitch" placeholder="Beritahu perusahaan mengapa Anda paling cocok untuk posisi ini. Sebutkan keterampilan khusus dan bagaimana Anda berkontribusi. Hindari hal generik seperti Saya bertanggung jawab.">{{ $jobA->surat_lamaran }}</textarea>
													</div>
												</div>	


													<div class="row pt-2">
														<div class="col text-center">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>

											</div>
										</section>
										{{-- ..... --}}
									</div>
								</div>
							</div>
							{{-- ./################################################ --}}


						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>


		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
	


		<div class="tab-pane tab-pane-navigation @if($act === 'tabsSetting') active @endif" id="tabsSetting">
		<div class="overflow-hidden mb-4 pb-3">
				<h2 class="font-weight-normal text-7 mb-0">Setting</h2>
			</div>
			<form role="form" class="needs-validation">
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Email</label>
					<div class="col-lg-9">
						<input class="form-control" type="email" name="email" value="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Password</label>
					<div class="col-lg-9">
						<input class="form-control" type="password" name="password" value="" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Password Verify</label>
					<div class="col-lg-9">
						<input class="form-control" type="password" name="repassword" value="" required>
					</div>
				</div>
				<div class="form-group row">
					<div class="form-group col-lg-9">
						<small>*) Kosongi bila tidak ingin merubah</small>
					</div>
					<div class="form-group col-lg-3">
						<input type="submit" value="Simpan" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
					</div>
				</div>
			</form>
		</div>

		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}



		<div class="tab-pane tab-pane-navigation @if($act === 'tabsResume') active @endif" id="tabsResume">
			<div class="overflow-hidden mb-4 pb-3">
				<h2 class="font-weight-normal text-7 mb-0">Resume</h2>
			</div>
			
			<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">file that has been uploaded</label>
					<div class="col-lg-9">
						<a href="{{ route('expoproperty_front.viewFile', ['id' => $user->uuid ]) }}" class="btn btn-success btn-modern float-right" data-loading-text="Loading...">
						{{ $user->cv_name_origin ?? '-' }}
						</a>
					</div>
				</div>	
			<form role="form" class="needs-validation" action="{{ route('expoproperty_front.uploadcv') }}" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">upload Resume</label>
					<div class="col-lg-9">
						<input type="file" name="cv" value="" >
					</div>
				</div>	
				<div class="form-group row">
					<div class="form-group col-lg-9">

					</div>
					<div class="form-group col-lg-3">
						@csrf
						<input type="submit" value="Simpan" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
					</div>
				</div>
			</form>
			<div class="col-md-12">
				@if($user->cv && $user->cv_ext === 'pdf' )
				<iframe src="{{ route('expoproperty_front.viewFile', ['id' => $user->uuid ]) }}" style="width:100%; height:500px;" frameborder="0"></iframe>
				@endif
			</div>

		</div>
	

		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
		{{-- ################################ ################################ ################################ --}}
	

	</div>
</div>

</div>

</div>

@endsection

