  <div class="modal fade simBNI" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
         <div class="modal-header">
            {{-- <h5 class="modal-title">OTP Telah Dikirim</h5> --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

  <input type="hidden" id="lang" value="">
  <div class="griya"></div>
  <div class="row p-3" id="userContent">
    <div class="col" style="">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div style="text-align: center;" id="titleSimulation">
            <span class="id" style="display: none"><b>SIMULASI</b></span>
            <span class="en" style="display: none"><b>SIMULATION</b></span>
          </div>
        </div>
        <div class="panel-body">
          <div id="inputSimulasi">
            <div class="form-group">
              <label for="">
              <span class="id" style="display: none">Simulasi Berdasarkan</span>
              <span class="en" style="display: none">Simulation base on</span>
              </label>
            </div>
            <div class="form-group">
              <div id="radioButton">
                <label class="radio-inline"><input type="radio"
                  name="optradio" value="penghasilanRadio" checked="checked">
                  <span class="id" style="display: none">Penghasilan</span>
                  <span class="en" style="display: none">Income</span>
                  </label>
                <label class="radio-inline"><input type="radio"
                  name="optradio" value="hargaRumahRadio">
                  <span class="id" style="display: none">Harga Rumah</span>
                  <span class="en" style="display: none">House Price</span></label>
              </div>
            </div>

            <!-- SIMULASI BERDASARKAN PENGHASILAN PERBULAN -->
            <hr>
            <form id="penghasilanContainerForm">
              <div id="penghasilanContainer" style="display:;">
                <div class="form-group" style="">
                  <label for="penghasilanBulanan">
                  <span class="id" style="display: none">Penghasilan Per Bulan</span>
                  <span class="en" style="display: none">Monthly Income</span></label> <input
                    type="text"
                    class="form-control mandatory onlyNumber resetValue"
                    id="penghasilanBulanan" name="penghasilanBulanan"
                    placeholder="Rp. ex. 1.000.000" maxlength="20"
                    required="required">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;"
                  data-for="penghasilanBulanan">
                  Penghasilan Per Bulan belum
                  terisi</div>

                <div class="form-group" style="">
                  <label for="penghasilanMasaKredit">
                  <span class="id" style="display: none">Masa Kredit (Bulan)</span>
                  <span class="en" style="display: none">Credit Tenor (month)</span>
                  </label>
                  <input type="text"
                    class="form-control mandatory onlyNumber resetValue"
                    id="penghasilanMasaKredit" name="penghasilanMasaKredit"
                    placeholder="Min. 12 Bulan (1 Tahun), Maks. 360 Bulan (30 Tahun)"
                    maxlength="3" required="required">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;"
                  data-for="penghasilanMasaKredit">
                    <span class="id" style="display: none">Masa Kredit belum terisi</span>
                    <span class="en" style="display: none">Credit Tenor is empty</span></div>
                <div class="alert alert-danger btsMasaKreditPeng"
                  style="margin-top: 10px; display: none;">
                  <span class="id" style="display: none">Lama Masa Kredit Tidak Memenuhi Syarat</span>
                  <span class="en" style="display: none">Credit Tenor not eligible</span></div> 

                <div class="form-group" style="">
                  <label for="penghasilanSukuBunga">
                  <span class="id" style="display: none">Suku Bunga</span>
                  <span class="en" style="display: none">Interest Rate</span>
                  </label> <input
                    type="text" class="form-control mandatory"
                    id="penghasilanSukuBunga" name="penghasilanSukuBunga"
                    placeholder="" maxlength="8" value="6.75%" required="required">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;"
                  data-for="penghasilanSukuBunga">Suku Bunga belum terisi</div>
                <div class="alert alert-danger sukuBungaPeng"
                  style="margin-top: 10px; display: none;">Inputan
                  mengandung karakter/simbol, simbol yang diberbolehkan hanya
                  titik '.' dan persen '%'</div>

                <div class="form-group text-center" style="">
                  <button type="submit" class="btn btn-md btn-primary"
                    id="kalkulasiSimulasiPeng" name="kalkulasiSimulasiPeng">
                    <span class="id" style="display: none">Kalkulasi</span>
                    <span class="en" style="display: none">Calculation</span>
                  </button>
                </div>
              </div>
            </form>

            <!-- SIMULASI BERDASARKAN HARGA RUMAH -->
            <form id="hargaRumahContainerForm">
              <div id="hargaRumahContainer" style="display: none;">
                <div class="form-group" style="">
                  <label for="rumahHarga">
                  <span class="id" style="display: none">Harga Rumah</span>
                  <span class="en" style="display: none">House Price</span>
                  </label> <input type="text"
                    class="form-control mandatory onlyNumber resetValue"
                    id="rumahHarga" name="rumahHarga" placeholder=""
                    maxlength="50" required="required">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;" data-for="rumahHarga">Harga
                  Rumah belum terisi</div>

                <div class="form-group" style="">
                  <label for=rumahMasaKredit>
                  <span class="id" style="display: none">Masa Kredit (Bulan)</span>
                  <span class="en" style="display: none">Credit Tenor (month)</span>
                  </label> <input
                    type="text"
                    class="form-control mandatory onlyNumber resetValue"
                    id="rumahMasaKredit" name="rumahMasaKredit"
                    placeholder="Min. 12 Bulan (1 Tahun), Maks. 360 Bulan (30 Tahun)"
                    maxlength="3" required="required">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;"
                  data-for="rumahMasaKredit">
                    <span class="id" style="display: none">Masa Kredit belum terisi</span>
                    <span class="en" style="display: none">Credit Tenor is empty</span></div>
                <div class="alert alert-danger btsMasaKreditRmh resetValue"
                  style="margin-top: 10px; display: none;">
                  <span class="id" style="display: none">Lama Masa Kredit Tidak Memenuhi Syarat</span>
                  <span class="en" style="display: none">Credit Tenor not eligible</span></div>

                <div class="form-group" style="">
                  <label for="rumahPersentaseUangmuka">
                  <span class="id" style="display: none">Persentase Uang Muka (%)</span>
                  <span class="en" style="display: none">Persentage of Down Payment (%)</span>
                  </label> <input type="text"
                    class="form-control mandatory onlyNumber resetValue"
                    id="rumahPersentaseUangmuka" name="rumahPersentaseUangmuka"
                    placeholder="" maxlength="8" required="required">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;"
                  data-for="rumahPersentaseUangmuka">Persentase Uang Muka
                  belum terisi</div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="rumahSukuBunga">
                  <span class="id" style="display: none">Suku Bunga</span>
                  <span class="en" style="display: none">Interest Rate</span>
                  </label> <input
                    type="text" class="form-control mandatory" id="rumahSukuBunga"
                    name="rumahSukuBunga" placeholder="" maxlength="8"
                    value="6.75%" required="required">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;"
                  data-for="rumahSukuBunga">Suku Bunga belum terisi</div>

                <div class="alert alert-danger sukuBungaRum"
                  style="margin-top: 10px; display: none;">Inputan
                  mengandung karakter/simbol, simbol yang diberbolehkan hanya
                  titik '.' dan persen '%'</div>

                <div class="form-group"
                  style="padding-bottom: 10px; display: none;">
                  <label for="rumahMaksKredit">Maksimal Kredit</label> <input
                    type="text"
                    class="form-control mandatory onlyNumber resetValue"
                    id="rumahMaksKredit" name="rumahMaksKredit" placeholder=""
                    maxlength="50" value="">
                </div>
                <div class="alert alert-danger"
                  style="margin-top: 10px; display: none;"
                  data-for="rumahMaksKredit">Maksimal Kredit belum terisi</div>

                <div class="form-group text-center" style="">
                  <button type="submit" class="btn btn-md btn-primary"
                    id="kalkulasiSimulasiRmh" name="kalkulasiSimulasiRmh">
                    <span class="id" style="display: none">Kalkulasi</span>
                    <span class="en" style="display: none">Calculation</span>
                    </button>
                </div>
              </div>
            </form>
          </div>

          <div id="outputSimulasi" style="display: none;">

            <!-- HASIL SIMULASI BERDASARKAN PENGHASILAN BULANAN -->
            <div id="outputPenghasilanCont" style="display: none;">
              <hr>
              <div class="form-group" style="padding-bottom: 10px;">
                <label><span class="id" style="display: none">Hasil Simulasi Berdasarkan Penghasilan</span>
                     <span class="en" style="display: none">Simulation Result Base On Income</span>
                </label>
              </div>

              <div class="form-group">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td><span class="id" style="display: none">Penghasilan Bersih per. Bulan</span>
                      <span class="en" style="display: none">Monthly Net Income</span></td>
                      <td class="text-right" id="tdPengBersih"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Masa Kredit (bulan)</span>
                      <span class="en" style="display: none">Credit Tenor (month)</span>
                      </td>
                      <td class="text-right" id="tdPengMasaKredit"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Suku Bunga per. Tahun</span>
                      <span class="en" style="display: none">Annual Interest Rate</span></td>
                      <td class="text-right" id="tdPengBunga"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Maks. Kredit</span>
                      <span class="en" style="display: none">Maximum Credit</span></td>
                      <td class="text-right" id="tdPengMaksKredit"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Angsuran Kredit per. Bulan</span>
                      <span class="en" style="display: none">Monthly Credit Installment</span></td>
                      <td class="text-right" id="tdPengAngsuran"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="form-group" style="padding-bottom: 10px;">
                <label><span class="id" style="display: none">Bunga Dapat Berubah Sewaktu-waktu Tanpa
                  Pemberitahuan Lebih Lanjut</span>
                  <span class="en" style="display: none">Interest Can Be Change At Any Time Without Further Notic</span></label>
              </div>
            </div>

            <!-- HASIL SIMULASI BERDASARKAN HARGA RUMAH -->
            <div id="outputHargaRumahCont" style="display: none;">
              <hr>
              <div class="form-group" style="padding-bottom: 10px;">
                <label><span class="id" style="display: none">Hasil Simulasi Berdasarkan Harga Rumah</span>
                <span class="en" style="display: none">Simulation Result Base On House Price</span></label>
              </div>

              <div class="form-group">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td><span class="id" style="display: none">Harga Rumah</span>
                      <span class="en" style="display: none">House Price</span></td>
                      <td class="text-right" id="tdRmhHarga"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Masa Kredit (bulan)</span>
                      <span class="en" style="display: none">Credit Tenor (month)</span></td>
                      <td class="text-right" id="tdRmhMasaKredit"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Persentase Uang Muka (%)</span>
                      <span class="en" style="display: none">Percentage of Down Payment (%)</span></td>
                      <td class="text-right" id="tdRmhPersenUangMuka"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Uang Muka</span>
                      <span class="en" style="display: none">Down Payment</span></td>
                      <td class="text-right" id="tdRmhUangMuka"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Suku Bunga per. Tahun</span>
                      <span class="en" style="display: none">Annual Interest Rate</span></td>
                      <td class="text-right" id="tdRmhBunga"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Maks. Kredit</span>
                      <span class="en" style="display: none">Maximum Credit</span></td>
                      <td class="text-right" id="tdRmhMaksKredit"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Angsuran Kredit per. Bulan</span>
                      <span class="en" style="display: none">Monthly Credit Installment</span></td>
                      <td class="text-right" id="tdRmhAngsuran"></td>
                    </tr>
                    <tr>
                      <td><span class="id" style="display: none">Min. Penghasilan Bersih per. Bulan</span>
                      <span class="en" style="display: none">Minimum Monthly Net Income</span></td>
                      <td class="text-right" id="tdRmhMinPenghasilan"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="form-group" style="padding-bottom: 10px;">
                <label><span class="id" style="display: none">Bunga Dapat Berubah Sewaktu-waktu Tanpa
                  Pemberitahuan Lebih Lanjut</span>
                  <span class="en" style="display: none">Interest Can Be Change At Any Time Without Further Notic</span></label>
              </div>
            </div>

            <div class="form-group text-center" style="">
              <button class="btn btn-md btn-primary" id="resetSimulasi"
                name="resetSimulasi">Reset</button>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-md btn-danger" onclick="window.open('{{ $baseApp['url_form_kredit'] }}');gooAnalytic('eform-bni');">AJUKAN PEMOHON BNI GRIYA</button>

        <a href="{{ route('expoproperty_front.dev', ['id' => '37584c05-c679-4629-ae25-3388ecf0f313' ]) }}">
        <img src="@foreach ( $sponsor as $kSp => $sp ) {{ env('URL_ENDPOINT').$sp['img_pic'] }} @endforeach" width="75">
        </a>

        <button class="btn btn-md btn-warning" onclick="window.open('{{ $baseApp['url_simulasi_kredit']}}', 'myWindow', 'width=360,height=650');gooAnalytic('url-simulasi-bni');"> simulasi BNI Griya</button>
      </div>
    </div>
  </div>


         </div>
      </div>
   </div>

<script>
$(document).ready(function() {
      
      $(".id").attr("style", "display:block");
      rupiahCurrency('rumahMaksKredit');
      rupiahCurrency('penghasilanBulanan');
      rupiahCurrency('rumahPenghasilanBulanan');
      rupiahCurrency('penghasilanMaksKredit');
      rupiahCurrency('rumahHarga');
      rupiahCurrency('rumahUangMuka');
      rupiahCurrency('penghasilanPerbulan');
      rupiahCurrency('nominalPengajuanKredit');
      rupiahCurrency('limitPinjaman');
      
      //ONLY ALLOW NUMBER INPUT
         $(".onlyNumber").keydown(function (e) {
         // Allow: backspace, delete, tab, escape, enter and .
         if ($.inArray(e.keyCode, [46,8, 9, 27, 13]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                  // let it happen, don't do anything
                  return;
         }
         // Ensure that it is a number and stop the keypress
         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
         }
         });
         
         $(".onlyCharandspace").keypress(function(event){
            var inputValue = event.which;
            // allow letters and whitespaces only.

               if(!(inputValue >= 65 && inputValue <= 122) && (inputValue != 94 && inputValue != 32 && inputValue != 0 && inputValue != 07 && inputValue != 08) ) { 
                     event.preventDefault(); 
               }       
         });
         
         $(".checkSpcialChar").keypress(function(event){
            var inputValue = event.which;
            // allow letters and whitespaces only.

               if(!(inputValue >= 46 && inputValue <= 57) && !(inputValue >= 65 && inputValue <= 122) && (inputValue != 94 && inputValue != 32 && inputValue != 0 && inputValue != 07 && inputValue != 08) ) { 
                     event.preventDefault(); 
               }
         });
});
function formatRupiah(bilangan, prefix)
      {
        var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa  = split[0].length % 3,
          rupiah  = split[0].substr(0, sisa),
          ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
          
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }

      function limitCharacter(e)
      {
        key = e.which || e.keyCode; 
        if(!( [8, 9, 13, 27, 46, 110, 188, 190].indexOf(key) !== -1 ||
                 (key == 65 && ( e.ctrlKey || e.metaKey  ) ) || 
                 (key >= 35 && key <= 40) ||
                 (key >= 48 && key <= 57 && !(e.shiftKey || e.altKey)) ||
                 (key >= 96 && key <= 105)
               ))
        {
          e.preventDefault();
          return false;
        }
      }

      function rupiahCurrency(id)
      {
        $('#'+id).blur(function(){
          $('#'+id).val().replace(/\./g, '');
        });
        
        $('#'+id).bind('keyup',function(e){
          $('#'+id).val(formatRupiah($('#'+id).val()));
        });
        
        $('#'+id).bind('keydown',function(e){
          limitCharacter(e);
        });
      }
      $(document).ready(function(){
        $("input").on("click",function(){
          if($("input:checked").val() == "penghasilanRadio"){
            $("#hargaRumahContainer").find(".resetValue").val('');
            $("#penghasilanContainer").show();
            $("#hargaRumahContainer").hide();
            $(".btsMasaKreditRmh,.btsMasaKreditPeng").hide();
          }else if($("input:checked").val() == "hargaRumahRadio"){
            $("#penghasilanContainer").find(".resetValue").val('');
            $("#hargaRumahContainer").show();
            $("#penghasilanContainer").hide();    
            $(".btsMasaKreditRmh,.btsMasaKreditPeng").hide();
          }
        });
        
        $("#penghasilanContainerForm").submit(function(event){
          $("#inputSimulasi").hide();//
          $("#outputSimulasi").show();
          setSimPenghasilan();
          $('#inputSimulasi').find(':input').attr('disabled','disabled');
          $("#outputPenghasilanCont").show();
          $("#outputHargaRumahCont").hide();
          event.preventDefault();
        });
        
        $("#hargaRumahContainerForm").submit(function(event){
          $("#inputSimulasi").hide();//
          $("#outputSimulasi").show();
          setSimHargaRumah();
          $('#inputSimulasi').find(':input').attr('disabled','disabled');
          $("#outputPenghasilanCont").hide();
          $("#outputHargaRumahCont").show();
          event.preventDefault();
        });
        
        $("#resetSimulasi").click(function(){
          $('#inputSimulasi').find(':input').removeAttr('disabled');
          $("#inputSimulasi").show();//
          $("#outputSimulasi").hide();
          $("#outputHargaRumahCont").hide();
          $("#outputPenghasilanCont").hide(); 
        });
        
        $("#penghasilanMasaKredit").blur(function(){
          if($("#penghasilanMasaKredit").val() < 12 || $("#penghasilanMasaKredit").val() > 360){
            $(".btsMasaKreditPeng").show();
            $("#penghasilanMasaKredit").val("");
          }else{
            $(".btsMasaKreditPeng").hide();
          }
        });
        
        $("#rumahMasaKredit").blur(function(){
          if($("#rumahMasaKredit").val() < 12 || $("#rumahMasaKredit").val() > 360){
            $(".btsMasaKreditRmh").show();
            $("#rumahMasaKredit").val("");
          }else{
            $(".btsMasaKreditRmh").hide();
          }
        });
        
        $("#penghasilanSukuBunga").blur(function(){
          var flag = false;
          if ($("#penghasilanSukuBunga").val() == ""){
            $("#penghasilanSukuBunga").val('6.75%') ;
          }else{
            var value = $("#penghasilanSukuBunga").val();
            if (value == "%"){
              $("#penghasilanSukuBunga").val('6.75') ;
            }
            if (value.split(".")[1] == ""){
              $("#penghasilanSukuBunga").val($("#penghasilanSukuBunga").val().replace(".","")) ;
            }
            flag = isNaN(value.replace("%",""));
            if(flag){
              $(".sukuBungaPeng").show();
              $("#penghasilanSukuBunga").val("");
            }else{
              if ($(this).val().split('').pop() !== '%') {
                      $(this).val($(this).val() + "%");
                  }
            }
          }
          });
        
        $("#rumahPersentaseUangmuka").blur(function(){
          if ($("#rumahPersentaseUangmuka").val() != ""){
            if ($(this).val().split('').pop() !== '%') {
                    $(this).val($(this).val() + "%");
                }
          }
          });
        
        $("#rumahSukuBunga").blur(function(){
          var flag = false;
          if ($("#rumahSukuBunga").val() == ""){
            $("#rumahSukuBunga").val('6.75%') ;
          }else{
            var value = $("#rumahSukuBunga").val()
            if (value == "%"){
              $("#rumahSukuBunga").val('6.75') ;
            }
            if (value.split(".")[1] == ""){
              $("#rumahSukuBunga").val($("#rumahSukuBunga").val().replace(".","")) ;
            }
            flag = isNaN(value.replace("%",""));
            if(flag){
              $(".sukuBungaRum").show();
              $("#rumahSukuBunga").val("");
            }else{
              if ($(this).val().split('').pop() !== '%') {
                      $(this).val($(this).val() + "%");
                  }
            }
          }
          });
        
        $('#penghasilanSukuBunga').click(function(){
          $(".sukuBungaPeng").hide();
          var str = $('#penghasilanSukuBunga').val();
          $('#penghasilanSukuBunga').val(str.replace("%",""))
        });
        
        $('#rumahSukuBunga').click(function(){
          $(".sukuBungaRum").hide();
          var str = $('#rumahSukuBunga').val();
          $('#rumahSukuBunga').val(str.replace("%",""))
        });
        
      //  $('#penghasilanSukuBunga').click(function(){
      //    $(".sukuBungaPeng").hide();
      //    if($('#penghasilanSukuBunga').val() == null || $('#penghasilanSukuBunga') == ""){
      //      $('#penghasilanSukuBunga').val("6.75");
      //    }
      //  });
      //  
      //  $('#rumahSukuBunga').click(function(){
      //    $(".sukuBungaRum").hide();
      //    if($('#rumahSukuBunga').val() == null || $('#rumahSukuBunga') == ""){
      //      $('#rumahSukuBunga').val("6.75");
      //    }
      //  });
        
        $('#rumahPersentaseUangmuka').on('click',function(){
          $('#rumahPersentaseUangmuka').val($('#rumahPersentaseUangmuka').val().replace(/\%/g, ''));
        });
        
        $('#rumahPersentaseUangmuka,#rumahHarga').blur(function(){
          if($('#rumahHarga').val() != "" && $('#rumahPersentaseUangmuka').val() != ""){
            var maksKredit = $('#rumahHarga').val().replace(/\./g, '') - hitungUangMuka();
            $('#rumahMaksKredit').val(toRupiah(maksKredit));
          }else{
            $('#rumahMaksKredit').val("");
          }
        });
        
      }); 

      function toRupiah(angka){
          var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
          var rev2    = '';
          for(var i = 0; i < rev.length; i++){
              rev2  += rev[i];
              if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                  rev2 += '.';
              }
          }
          return rev2.split('').reverse().join('');
      }
        
      function setSimPenghasilan(){
        $('#tdPengBersih').html("Rp. "+$('#penghasilanBulanan').val());
        var lang = document.getElementById("lang").value;
          if(lang == "en") {
            $('#tdPengMasaKredit').html($('#penghasilanMasaKredit').val()+" Months");
          }else{
            $('#tdPengMasaKredit').html($('#penghasilanMasaKredit').val()+" Bulan");
          }
        $('#tdPengBunga').html($('#penghasilanSukuBunga').val());
        $('#tdPengMaksKredit').html("Rp. "+hitungAPBPenghasilan());
        $('#tdPengAngsuran').html("Rp. "+toRupiah(($('#penghasilanBulanan').val().replace(/\./g, '')/2)));
      }

      function setSimHargaRumah(){
        $('#tdRmhHarga').html("Rp. "+$('#rumahHarga').val());
        var lang = document.getElementById("lang").value;
          if(lang == "en") { 
            $('#tdRmhMasaKredit').html($('#rumahMasaKredit').val()+" Months");
          }else{
            $('#tdRmhMasaKredit').html($('#rumahMasaKredit').val()+" Bulan"); 
          }
        
        
        $('#tdRmhPersenUangMuka').html($('#rumahPersentaseUangmuka').val());
        $('#tdRmhUangMuka').html("Rp. "+toRupiah(hitungUangMuka()));
        $('#tdRmhBunga').html($('#rumahSukuBunga').val());
        $('#tdRmhMaksKredit').html("Rp. "+$('#rumahMaksKredit').val());
        $('#tdRmhAngsuran').html("Rp. "+hitungAPBRumah());
        $('#tdRmhMinPenghasilan').html("Rp. "+hitungMinPendapatan());
      }

      function hitungAPBPenghasilan(){
        var apb = ($('#penghasilanBulanan').val().replace(/\./g, '')/2);
        var bungaPerBulan = ($('#penghasilanSukuBunga').val().replace(/\%/g, '')/12)/100;
        var jangkaWaktuKredit = $('#penghasilanMasaKredit').val();
        var pokokPinjaman = apb / (bungaPerBulan/(1- Math.pow((bungaPerBulan+1),-jangkaWaktuKredit)));
        return toRupiah(Math.floor(pokokPinjaman));
      }

      function hitungAPBRumah(){
        var pokokPinjaman = $('#rumahHarga').val().replace(/\./g, '') - hitungUangMuka();
        var bungaPerBulan = ($('#rumahSukuBunga').val().replace(/\%/g, '')/12)/100;
        var jangkaWaktuKredit = $('#rumahMasaKredit').val();
        var apb = pokokPinjaman * (bungaPerBulan/(1- Math.pow((bungaPerBulan+1),-jangkaWaktuKredit)));
        return toRupiah(Math.floor(apb));
      }

      function hitungUangMuka(){
        var hargaRumah = $('#rumahHarga').val().replace(/\./g, '');
        var dpRumah = $('#rumahPersentaseUangmuka').val().replace(/\%/g, '');
        var uangMuka = (dpRumah/100) * hargaRumah;
        return Math.floor(uangMuka);
      }

      function hitungMinPendapatan(){
        return toRupiah(Math.floor(hitungAPBRumah().replace(/\./g, '')*2));
      }
</script>