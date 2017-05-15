<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    KUESIONER DIKTI
                    </h4> 
                    <?php 
                    if ($this->session->flashdata('notification')) { ?>
                        <div class="alert alert-success fade in">
                        <?php echo $this->session->flashdata('notification'); ?>
                        </div>
                        <br>                
                    <? } ?>                   
                </div>

            </div>
        </div>
    </div>
    </section>   

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                <i class="icon-plus-sign-alt"></i> Data Alumni 
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                                    
                        <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="#" method="post" enctype="multipart/form-data">                        

                        <div class="form-group">
                            <label class="col-sm-3 control-label col-sm-3">N I M</label>
                            <div class="col-sm-3 has-success">                
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter N I M" value="<?php echo $alumni->alumni_nim; ?>" autocomplete="off" readonly>
                            </div>                
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-sm-3">Nama Alumni</label>
                            <div class="col-sm-4 has-success">                
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Nama Alumni" value="<?php echo $alumni->alumni_nama; ?>" autocomplete="off" readonly>
                            </div>                
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-sm-3">Fakultas, Program Studi</label>
                            <div class="col-sm-5 has-success">                
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Program Studi" value="<?php echo $alumni->fakultas_name.' ,'.$alumni->progdi_name; ?>" autocomplete="off" readonly>
                            </div>                
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-sm-3">No. Handphone</label>
                            <div class="col-sm-3 has-success">                
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter No. Handphone" value="<?php echo $alumni->alumni_hp; ?>" autocomplete="off" readonly>
                            </div>                
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-sm-3">E-mail</label>
                            <div class="col-sm-4 has-success">                
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter E-mail" value="<?php echo $alumni->alumni_email; ?>" autocomplete="off" readonly>
                            </div>                
                        </div>
                        </form>

                        </div>
                        </section>
                    </div>
                </div>

            </section>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-plus-sign-alt"></i> Tracer Study (Mohon diisi dengan Lengkap)
        </header>

        <?php if (count($detail) == 0) { ?>        
        <!-- Tracer Study -->
        <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                            
            <div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('dikti/savedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            
                    
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">1. Kapan anda mulai mencari pekerjaan ? <br><em>Mohon pekerjaan sambilan tidak dimasukkan</em></label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f301" id="f301" value="1" <?php echo set_radio( 'f301', '1'); ?> >
                        Kira-kira                         
                        <input type="text" name="f302" id="f302" size="3" value="<?php echo set_value('f302', 0); ?>" autocomplete="off" >
                        Bulan sebelum lulus.                        
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f301" id="f301" value="2" <?php echo set_radio( 'f301', '2'); ?> >
                        Kira-kira
                        <input type="text" name="f303" id="f303" size="3" value="<?php echo set_value('f303', 0); ?>" autocomplete="off" >
                        Bulan sesudah lulus.
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f301" id="f301" value="3" <?php echo set_radio( 'f301', '3'); ?>>
                        Saya tidak mencari kerja. <em>(Langsung ke pertanyaan 8)</em>
                        </label>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">2. Bagaimana anda mencari pekerjaan tersebut ? <br><em>Jawaban bisa lebih dari satu</em></label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f401" id="f401" <?php echo set_checkbox( 'f401', '1'); ?>>
                        Melalui iklan di koran/majalah atau brosur.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f402" id="f402" <?php echo set_checkbox( 'f402', '1'); ?>>
                        Melamar ke perusahaan tanpa mengetahui lowongan yang ada.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f403" id="f403" <?php echo set_checkbox( 'f403', '1'); ?>>
                        Pergi ke bursa/pameran kerja.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f404" id="f404" <?php echo set_checkbox( 'f404', '1'); ?>>
                        Mencari lewat internet/iklan online/milis.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f405" id="f405" <?php echo set_checkbox( 'f405', '1'); ?>>
                        Dihubungi oleh perusahaan.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f406" id="f406" <?php echo set_checkbox( 'f406', '1'); ?>>
                        Menghubungi Kemenakertrans.
                        </label>
                    </div> 
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f407" id="f407" <?php echo set_checkbox( 'f407', '1'); ?>>
                        Menghubungi agen tenaga kerja komersial/swasta.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f408" id="f408" <?php echo set_checkbox( 'f408', '1'); ?>>
                        Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f409" id="f409" <?php echo set_checkbox( 'f409', '1'); ?>>
                        Menghubungi kantor kemahasiswaan/hubungan alumni.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f410" id="f410" <?php echo set_checkbox( 'f410', '1'); ?>>
                        Membangun jejaring (network) sejak masih kuliah.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f411" id="f411" <?php echo set_checkbox( 'f411', '1'); ?>>
                        Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.).
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f412" id="f412" <?php echo set_checkbox( 'f412', '1'); ?>>
                        Membangun bisnis sendiri.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f413" id="f413" <?php echo set_checkbox( 'f413', '1'); ?>>
                        Melalui penempatan kerja atau magang.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f414" id="f414" <?php echo set_checkbox( 'f414', '1'); ?>>
                        Bekerja di tempat yang sama dengan tempat kerja semasa kuliah.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f415" id="f415" <?php echo set_checkbox( 'f415', '1'); ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f416" class="form-control" id="f416" value="<?php echo set_value('f416'); ?>" autocomplete="off" >                                       
                        </div>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">3. Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f500" id="f500" value="1" <?php echo set_radio( 'f500', '1'); ?> >
                        Kira-kira                         
                        <input type="text" name="f501" id="f501" size="3" value="<?php echo set_value('f501', 0); ?>" autocomplete="off" >
                        Bulan sebelum lulus ujian.                        
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f500" id="f500" value="2" <?php echo set_radio( 'f500', '2'); ?> >
                        Kira-kira
                        <input type="text" name="f502" id="f502" size="3" value="<?php echo set_value('f502', 0); ?>" autocomplete="off" >
                        Bulan sesudah lulus ujian.
                        </label>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">4. Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama ?</label>
                <div class="col-sm-8">
                     <div class="form-group">
                        <div class="col-sm-2 has-success">
                        <input type="text" name="f6" class="form-control" id="f6" value="<?php echo set_value('f6', 0); ?>" autocomplete="off" >                        
                        </div>
                        Perusahaan/Instansi/Institusi.
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">5. Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda ?</label>
                <div class="col-sm-8">
                     <div class="form-group">
                        <div class="col-sm-2 has-success">
                        <input type="text" name="f7" class="form-control" id="f7" value="<?php echo set_value('f7', 0); ?>" autocomplete="off" >                        
                        </div>
                        Perusahaan/Instansi/Institusi.
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">6. Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara ?</label>
                <div class="col-sm-8">
                     <div class="form-group">
                        <div class="col-sm-2 has-success">
                        <input type="text" name="f7a" class="form-control" id="f7a" value="<?php echo set_value('f7a', 0); ?>" autocomplete="off" >                        
                        </div>
                        Perusahaan/Instansi/Institusi.
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">7. Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha) ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f8" id="f8" value="1" <?php echo set_radio( 'f8', '1'); ?>>
                        Ya <em>(Jika Ya, lanjutkan pertanyaan No. 11)</em>                       
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f8" id="f8" value="2" <?php echo set_radio( 'f8', '2'); ?>>
                        Tidak
                        </label>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">8. Bagaimana anda menggambarkan situasi anda saat ini ? <em>Jawaban bisa lebih dari satu</em></label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f901" id="f901" <?php echo set_checkbox( 'f901', '1'); ?>>
                        Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f902" id="f902" <?php echo set_checkbox( 'f902', '1'); ?>>
                        Saya menikah
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f903" id="f903" <?php echo set_checkbox( 'f903', '1'); ?>>
                        Saya sibuk dengan keluarga dan anak-anak
                        </label>
                    </div> 
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f904" id="f904" <?php echo set_checkbox( 'f904', '1'); ?>>
                        Saya sekarang sedang mencari pekerjaan
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f905" id="f905" <?php echo set_checkbox( 'f905', '1'); ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f906" class="form-control" id="f906" value="<?php echo set_value('f906'); ?>" autocomplete="off" >                                       
                        </div>
                    </div>  
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">9. Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir ? Pilihlah Satu Jawaban. 
                <br>LANJUT KE F17</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="1" <?php echo set_radio( 'f1001', '1'); ?>>
                        Tidak
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="2" <?php echo set_radio( 'f1001', '2'); ?>>
                        Tidak, tapi saya sedang menunggu hasil lamaran kerja
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="3" <?php echo set_radio( 'f1001', '3'); ?>>
                        Ya, saya akan mulai bekerja dalam 2 minggu ke depan
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="4" <?php echo set_radio( 'f1001', '4'); ?>>
                        Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="5" <?php echo set_radio( 'f1001', '5'); ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f1002" class="form-control" id="f1002" value="<?php echo set_value('f1002'); ?>" autocomplete="off" >                                       
                        </div>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">10. Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="1" <?php echo set_radio( 'f1101', '1'); ?>>
                        Instansi pemerintah (termasuk BUMN)
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="2" <?php echo set_radio( 'f1101', '2'); ?>>
                        Organisasi non-profit/Lembaga Swadaya Masyarakat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="3" <?php echo set_radio( 'f1101', '3'); ?>>
                        Perusahaan swasta
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="4" <?php echo set_radio( 'f1101', '4'); ?>>
                        Wiraswasta/perusahaan sendiri
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="5" <?php echo set_radio( 'f1101', '5'); ?>>
                        Lainnya, tuliskan :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f1102" class="form-control" id="f1102" value="<?php echo set_value('f1102'); ?>" autocomplete="off" >                                       
                        </div>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">11. Tempat anda bekerja saat ini bergerak di bidang apa? (Klasifikasi Baku Lapangan Usaha Indonesia, Kemnakertrans, 2009)</label>
                <div class="col-sm-8">                
                <select class="form-control m-bot15" name="f12" id="f12">
                <option value="">- Choose -</option>
                    <option value='01' <?php echo set_select('f12', '01'); ?>>[01] Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu
                    <option value='02' <?php echo set_select('f12', '02'); ?>>[02] Kehutanan dan penebangan kayu
                    <option value='03' <?php echo set_select('f12', '03'); ?>>[03] Perikanan
                    <option value='04' <?php echo set_select('f12', '04'); ?>>[04] Pertambangan batu bara dan lignit
                    <option value='05' <?php echo set_select('f12', '05'); ?>>[05] Pertambangan minyak bumi dan gas alam dan panas bumi
                    <option value='06' <?php echo set_select('f12', '06'); ?>>[06] Pertambangan bijih logam
                    <option value='07' <?php echo set_select('f12', '07'); ?>>[07] Pertambangan dan penggalian lainnya
                    <option value='08' <?php echo set_select('f12', '08'); ?>>[08] Jasa pertambangan
                    <option value='09' <?php echo set_select('f12', '09'); ?>>[09] Industri makanan
                    <option value='10' <?php echo set_select('f12', '10'); ?>>[10] Industri minuman
                    <option value='11' <?php echo set_select('f12', '11'); ?>>[11] Industri pengolahan tembakau
                    <option value='12' <?php echo set_select('f12', '12'); ?>>[12] Industri tekstil
                    <option value='13' <?php echo set_select('f12', '13'); ?>>[13] Industri pakaian jadi
                    <option value='14' <?php echo set_select('f12', '14'); ?>>[14] Industri kulit, barang dari kulit dan alas kaki
                    <option value='15' <?php echo set_select('f12', '15'); ?>>[15] Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya
                    <option value='16' <?php echo set_select('f12', '16'); ?>>[16] Industri kertas dan barang dari kertas
                    <option value='17' <?php echo set_select('f12', '17'); ?>>[17] Industri pencetakan dan reproduksi media rekaman
                    <option value='18' <?php echo set_select('f12', '18'); ?>>[18] Industri produk dari batu bara dan pengilangan minyak bumi
                    <option value='19' <?php echo set_select('f12', '19'); ?>>[19] Industri bahan kimia dan barang dari bahan kimia
                    <option value='20' <?php echo set_select('f12', '20'); ?>>[20] Industri farmasi, produk obat kimia dan obat tradisional
                    <option value='21' <?php echo set_select('f12', '21'); ?>>[21] Industri karet, barang dari karet dan plastik
                    <option value='22' <?php echo set_select('f12', '22'); ?>>[22] Industri barang galian bukan logam
                    <option value='23' <?php echo set_select('f12', '23'); ?>>[23] Industri logam dasar
                    <option value='24' <?php echo set_select('f12', '24'); ?>>[24] Industri barang logam, bukan mesin dan peralatannya
                    <option value='25' <?php echo set_select('f12', '25'); ?>>[25] Industri komputer, barang elektronik dan optik
                    <option value='26' <?php echo set_select('f12', '26'); ?>>[26] Industri peralatan listrik
                    <option value='27' <?php echo set_select('f12', '27'); ?>>[27] Industri mesin dan perlengkapan ytdl
                    <option value='28' <?php echo set_select('f12', '28'); ?>>[28] Industri kendaraan bermotor, trailer dan semi trailer
                    <option value='29' <?php echo set_select('f12', '29'); ?>>[29] Industri alat angkutan lainnya
                    <option value='30' <?php echo set_select('f12', '30'); ?>>[30] Industri furnitur
                    <option value='31' <?php echo set_select('f12', '31'); ?>>[31] Industri pengolahan lainnya
                    <option value='32' <?php echo set_select('f12', '32'); ?>>[32] Jasa reparasi dan pemasangan mesin dan peralatan
                    <option value='33' <?php echo set_select('f12', '33'); ?>>[33] Pengadaan listrik, gas, uap/air panas dan udara dingin
                    <option value='34' <?php echo set_select('f12', '34'); ?>>[34] Pengadaan air
                    <option value='35' <?php echo set_select('f12', '35'); ?>>[35] Pengolahan limbah
                    <option value='36' <?php echo set_select('f12', '36'); ?>>[36] Pengolahan sampah dan daur ulang
                    <option value='37' <?php echo set_select('f12', '37'); ?>>[37] Jasa pembersihan dan pengelolaan sampah lainnya
                    <option value='38' <?php echo set_select('f12', '38'); ?>>[38] Konstruksi gedung
                    <option value='39' <?php echo set_select('f12', '39'); ?>>[39] Konstruksi bangunan sipil
                    <option value='40' <?php echo set_select('f12', '40'); ?>>[40] Konstruksi khusus
                    <option value='41' <?php echo set_select('f12', '41'); ?>>[41] Perdagangan, reparasi dan perawatan mobil dan sepeda motor
                    <option value='42' <?php echo set_select('f12', '42'); ?>>[42] Perdagangan besar, bukan mobil dan sepeda motor
                    <option value='43' <?php echo set_select('f12', '43'); ?>>[43] Perdagangan eceran, bukan mobil dan motor
                    <option value='44' <?php echo set_select('f12', '44'); ?>>[44] Angkutan darat dan angkutan melalui saluran pipa
                    <option value='88' <?php echo set_select('f12', '88'); ?>>[88] Angkutan Air
                    <option value='45' <?php echo set_select('f12', '45'); ?>>[45] Angkutan udara
                    <option value='46' <?php echo set_select('f12', '46'); ?>>[46] Pergudangan dan jasa penunjang angkutan
                    <option value='47' <?php echo set_select('f12', '47'); ?>>[47] Pos dan kurir
                    <option value='48' <?php echo set_select('f12', '48'); ?>>[48] Penyediaan akomodasi
                    <option value='49' <?php echo set_select('f12', '49'); ?>>[49] Penyediaan makanan dan minuman
                    <option value='50' <?php echo set_select('f12', '50'); ?>>[50] Penerbitan
                    <option value='51' <?php echo set_select('f12', '51'); ?>>[51] Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik
                    <option value='52' <?php echo set_select('f12', '52'); ?>>[52] Penyiaran dan pemrograman
                    <option value='53' <?php echo set_select('f12', '53'); ?>>[53] Telekomunikasi
                    <option value='54' <?php echo set_select('f12', '54'); ?>>[54] Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu
                    <option value='55' <?php echo set_select('f12', '55'); ?>>[55] Kegiatan jasa informasi
                    <option value='56' <?php echo set_select('f12', '56'); ?>>[56] Jasa keuangan, bukan asuransi dan dana pensiun
                    <option value='57' <?php echo set_select('f12', '57'); ?>>[57] Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib
                    <option value='58' <?php echo set_select('f12', '58'); ?>>[58] Jasa penunjang jasa keuangan, asuransi dan dana pensiun
                    <option value='59' <?php echo set_select('f12', '59'); ?>>[59] Real estate
                    <option value='60' <?php echo set_select('f12', '60'); ?>>[60] Jasa hukum dan akuntansi
                    <option value='61' <?php echo set_select('f12', '62'); ?>>[61] Kegiatan kantor pusat dan konsultasi manajemen
                    <option value='62' <?php echo set_select('f12', '62'); ?>>[62] Jasa arsitektur dan teknik sipil; analisis dan uji teknis
                    <option value='63' <?php echo set_select('f12', '63'); ?>>[63] Penelitian dan pengembangan ilmu pengetahuan
                    <option value='64' <?php echo set_select('f12', '64'); ?>>[64] Periklanan dan penelitian pasar
                    <option value='65' <?php echo set_select('f12', '65'); ?>>[65] Jasa profesional, ilmiah dan teknis lainnya
                    <option value='66' <?php echo set_select('f12', '66'); ?>>[66] Jasa kesehatan hewan
                    <option value='67' <?php echo set_select('f12', '67'); ?>>[67] Jasa persewaan dan sewa guna usaha tanpa hak opsi
                    <option value='68' <?php echo set_select('f12', '68'); ?>>[68] Jasa ketenagakerjaan
                    <option value='69' <?php echo set_select('f12', '69'); ?>>[69] Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya
                    <option value='70' <?php echo set_select('f12', '70'); ?>>[70] Jasa keamanan dan penyelidikan
                    <option value='71' <?php echo set_select('f12', '72'); ?>>[71] Jasa untuk gedung dan pertamanan
                    <option value='72' <?php echo set_select('f12', '72'); ?>>[72] Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya
                    <option value='73' <?php echo set_select('f12', '73'); ?>>[73] Administrasi pemerintahan, pertahanan dan jaminan sosial wajib
                    <option value='74' <?php echo set_select('f12', '74'); ?>>[74] Jasa pendidikan
                    <option value='75' <?php echo set_select('f12', '75'); ?>>[75] Jasa kesehatan manusia
                    <option value='76' <?php echo set_select('f12', '76'); ?>>[76] Jasa kegiatan sosial di dalam panti
                    <option value='77' <?php echo set_select('f12', '77'); ?>>[77] Jasa kegiatan sosial di luar panti
                    <option value='78' <?php echo set_select('f12', '78'); ?>>[78] Kegiatan hiburan, kesenian dan kreativitas
                    <option value='79' <?php echo set_select('f12', '79'); ?>>[79] Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya
                    <option value='80' <?php echo set_select('f12', '80'); ?>>[80] Kegiatan perjudian dan pertaruhan
                    <option value='81' <?php echo set_select('f12', '81'); ?>>[81] Kegiatan olahraga dan rekreasi lainnya
                    <option value='82' <?php echo set_select('f12', '82'); ?>>[82] Kegiatan keanggotaan organisasi
                    <option value='83' <?php echo set_select('f12', '83'); ?>>[83] Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga
                    <option value='84' <?php echo set_select('f12', '84'); ?>>[84] Jasa perorangan lainnya
                    <option value='85' <?php echo set_select('f12', '85'); ?>>[85] Jasa perorangan yang melayani rumah tangga
                    <option value='86' <?php echo set_select('f12', '86'); ?>>[86] Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan
                    <option value='87' <?php echo set_select('f12', '87'); ?>>[87] Kegiatan badan internasional dan badan ekstra internasional lainnya
                    </select>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">12. Kira-kira berapa pendapatan anda setiap bulannya ?</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        Dari Pekerjaan Utama
                        Rp. <input type="text" name="f1301" id="f1301" size="10" value="<?php echo set_value('f1301', 0); ?>" autocomplete="off" >
                        (Isilah dengan ANGKA saja, tanpa tanda Titik atau Koma)                        
                    </div>
                     <div class="form-group">
                        Dari Lembur dan Tips
                        Rp. <input type="text" name="f1302" id="f1302" size="10" value="<?php echo set_value('f1302', 0); ?>" autocomplete="off" >
                        (Isilah dengan ANGKA saja, tanpa tanda Titik atau Koma)                        
                    </div>
                    <div class="form-group">
                        Dari Pekerjaan Lainnya
                        Rp. <input type="text" name="f1303" id="f1303" size="10" value="<?php echo set_value('f1303', 0); ?>" autocomplete="off" >
                        (Isilah dengan ANGKA saja, tanpa tanda Titik atau Koma)                        
                    </div>                    
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">13. Seberapa erat hubungan antara bidang studi dengan pekerjaan anda ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="1" <?php echo set_radio( 'f14', '1'); ?>>
                        Sangat Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="2" <?php echo set_radio( 'f14', '2'); ?>>
                        Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="3" <?php echo set_radio( 'f14', '3'); ?>>
                        Cukup Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="4" <?php echo set_radio( 'f14', '4'); ?>>
                        Kurang Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="5" <?php echo set_radio( 'f14', '5'); ?>>
                        Tidak Sama Sekali
                        </label>
                    </div>                    
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">14. Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="1" <?php echo set_radio( 'f15', '1'); ?>>
                        Setingkat Lebih Tinggi
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="2" <?php echo set_radio( 'f15', '2'); ?>>
                        Tingkat yang Sama
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="3" <?php echo set_radio( 'f15', '3'); ?>>
                        Setingkat Lebih Rendah
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="4" <?php echo set_radio( 'f15', '4'); ?>>
                        Tidak Perlu Pendidikan Tinggi
                        </label>
                    </div>                                    
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">15. Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya ? <em>Jawaban bisa lebih dari satu</em></label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1601" id="f1601" <?php echo set_checkbox( 'f1601', '1'); ?>>
                        Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1602" id="f1602" <?php echo set_checkbox( 'f1602', '1'); ?>>
                        Saya belum mendapatkan pekerjaan yang lebih sesuai
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1603" id="f1603" <?php echo set_checkbox( 'f1603', '1'); ?>>
                        Di pekerjaan ini saya memeroleh prospek karir yang baik
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1604" id="f1604" <?php echo set_checkbox( 'f1604', '1'); ?>>
                        Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya
                        </label>
                    </div> 
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1605" id="f1605" <?php echo set_checkbox( 'f1605', '1'); ?>>
                        Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1606" id="f1606" <?php echo set_checkbox( 'f1606', '1'); ?>>
                        Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1607" id="f1607" <?php echo set_checkbox( 'f1607', '1'); ?>>
                        Pekerjaan saya saat ini lebih aman/terjamin/secure
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1608" id="f1608" <?php echo set_checkbox( 'f1608', '1'); ?>>
                        Pekerjaan saya saat ini lebih menarik
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1609" id="f1609" <?php echo set_checkbox( 'f1609', '1'); ?>>
                        Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1610" id="f1610" <?php echo set_checkbox( 'f1610', '1'); ?>>
                        Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1611" id="f1611" <?php echo set_checkbox( 'f1611', '1'); ?>>
                        Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1612" id="f1612" <?php echo set_checkbox( 'f1612', '1'); ?>>
                        Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1613" id="f1613" <?php echo set_checkbox( 'f1613', '1'); ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f1614" class="form-control" id="f1614" value="<?php echo set_value('f1614'); ?>" autocomplete="off" >                                       
                        </div>
                    </div>  
                </div>                
            </div>
            <div class="form-group">                
                <div class="col-sm-12">
                    <section class="panel">                        
                        <table class="table">
                        <thead>
                            <tr>
                                <th colspan="5" width="25%">Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai ?</th>
                                <th></th>
                                <th colspan="5" width="25%">Pada saat lulus, bagaimana kontribusi perguruan tinggi dalam hal kompetensi di bawah ini ?</th>
                            </tr>
                            <tr>
                                <th colspan="2" width="12%">Sangat Rendah</th>
                                <th colspan="3" width="13%">Sangat Tinggi</th>
                                <th>Keterangan</th>
                                <th colspan="2" width="12%">Sangat Rendah</th>
                                <th colspan="3" width="13%">Sangat Tinggi</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th></th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>                        
                        <tbody>
                            <tr>
                                <td>
                                <input type="radio" name="f171" id="f171" value="1" <?php echo set_radio( 'f171', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="2" <?php echo set_radio( 'f171', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="3" <?php echo set_radio( 'f171', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="4" <?php echo set_radio( 'f171', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="5" <?php echo set_radio( 'f171', '5'); ?> required>
                                </td>
                                <td>Pengetahuan di bidang atau disiplin ilmu anda </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="1" <?php echo set_radio( 'f172', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="2" <?php echo set_radio( 'f172', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="3" <?php echo set_radio( 'f172', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="4" <?php echo set_radio( 'f172', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="5" <?php echo set_radio( 'f172', '5'); ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f173" id="f173" value="1" <?php echo set_radio( 'f173', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="2" <?php echo set_radio( 'f173', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="3" <?php echo set_radio( 'f173', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="4" <?php echo set_radio( 'f173', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="5" <?php echo set_radio( 'f173', '5'); ?> required>
                                </td>
                                <td>Pengetahuan di luar bidang atau disiplin ilmu anda</td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="1" <?php echo set_radio( 'f174', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="2" <?php echo set_radio( 'f174', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="3" <?php echo set_radio( 'f174', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="4" <?php echo set_radio( 'f174', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="5" <?php echo set_radio( 'f174', '5'); ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f175" id="f175" value="1" <?php echo set_radio( 'f175', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="2" <?php echo set_radio( 'f175', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="3" <?php echo set_radio( 'f175', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="4" <?php echo set_radio( 'f175', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="5" <?php echo set_radio( 'f175', '5'); ?> required>
                                </td>
                                <td>Pengetahuan umum</td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="1" <?php echo set_radio( 'f176', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="2" <?php echo set_radio( 'f176', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="3" <?php echo set_radio( 'f176', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="4" <?php echo set_radio( 'f176', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="5" <?php echo set_radio( 'f176', '5'); ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f177" id="f177" value="1" <?php echo set_radio( 'f177', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="2" <?php echo set_radio( 'f177', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="3" <?php echo set_radio( 'f177', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="4" <?php echo set_radio( 'f177', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="5" <?php echo set_radio( 'f177', '5'); ?> required>
                                </td>
                                <td>Bahasa Inggris</td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="1" <?php echo set_radio( 'f178', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="2" <?php echo set_radio( 'f178', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="3" <?php echo set_radio( 'f178', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="4" <?php echo set_radio( 'f178', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="5" <?php echo set_radio( 'f178', '5'); ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f179" id="f179" value="1" <?php echo set_radio( 'f179', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="2" <?php echo set_radio( 'f179', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="3" <?php echo set_radio( 'f179', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="4" <?php echo set_radio( 'f179', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="5" <?php echo set_radio( 'f179', '5'); ?> required>
                                </td>
                                <td>Ketrampilan internet</td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="1" <?php echo set_radio( 'f1710', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="2" <?php echo set_radio( 'f1710', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="3" <?php echo set_radio( 'f1710', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="4" <?php echo set_radio( 'f1710', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="5" <?php echo set_radio( 'f1710', '5'); ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="1" <?php echo set_radio( 'f1711', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="2" <?php echo set_radio( 'f1711', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="3" <?php echo set_radio( 'f1711', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="4" <?php echo set_radio( 'f1711', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="5" <?php echo set_radio( 'f1711', '5'); ?> required>
                                </td>
                                <td>Ketrampilan komputer</td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="1" <?php echo set_radio( 'f1712', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="2" <?php echo set_radio( 'f1712', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="3" <?php echo set_radio( 'f1712', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="4" <?php echo set_radio( 'f1712', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="5" <?php echo set_radio( 'f1712', '5'); ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="1" <?php echo set_radio( 'f1713', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="2" <?php echo set_radio( 'f1713', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="3" <?php echo set_radio( 'f1713', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="4" <?php echo set_radio( 'f1713', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="5" <?php echo set_radio( 'f1713', '5'); ?> required>
                                </td>
                                <td>Berpikir kritis</td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="1" <?php echo set_radio( 'f1714', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="2" <?php echo set_radio( 'f1714', '2'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="3" <?php echo set_radio( 'f1714', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="4" <?php echo set_radio( 'f1714', '4'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="5" <?php echo set_radio( 'f1714', '5'); ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="1" <?php echo set_radio( 'f1715', '1'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="2" <?php echo set_radio( 'f1715', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="3" <?php echo set_radio( 'f1715', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="4" <?php echo set_radio( 'f1715', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="5" <?php echo set_radio( 'f1715', '5'); ?> required>                                
                                </td>
                                <td>Ketrampilan riset</td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="1" <?php echo set_radio( 'f1716', '1'); ?> required>                        
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="2" <?php echo set_radio( 'f1716', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="3" <?php echo set_radio( 'f1716', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="4" <?php echo set_radio( 'f1716', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="5" <?php echo set_radio( 'f1716', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="1" <?php echo set_radio( 'f1717', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="2" <?php echo set_radio( 'f1717', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="3" <?php echo set_radio( 'f1717', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="4" <?php echo set_radio( 'f1717', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="5" <?php echo set_radio( 'f1717', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan belajar</td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="1" <?php echo set_radio( 'f1718', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="2" <?php echo set_radio( 'f1718', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="3" <?php echo set_radio( 'f1718', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="4" <?php echo set_radio( 'f1718', '4'); ?> required>                            
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="5" <?php echo set_radio( 'f1718', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="1" <?php echo set_radio( 'f1719', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="2" <?php echo set_radio( 'f1719', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="3" <?php echo set_radio( 'f1719', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="4" <?php echo set_radio( 'f1719', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="5" <?php echo set_radio( 'f1719', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan berkomunikasi</td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="1" <?php echo set_radio( 'f1720', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="2" <?php echo set_radio( 'f1720', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="3" <?php echo set_radio( 'f1720', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="4" <?php echo set_radio( 'f1720', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="5" <?php echo set_radio( 'f1720', '5'); ?> required>                            
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="1" <?php echo set_radio( 'f1721', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="2" <?php echo set_radio( 'f1721', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="3" <?php echo set_radio( 'f1721', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="4" <?php echo set_radio( 'f1721', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="5" <?php echo set_radio( 'f1721', '5'); ?> required>                                
                                </td>
                                <td>Bekerja di bawah tekanan</td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="1" <?php echo set_radio( 'f1722', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="2" <?php echo set_radio( 'f1722', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="3" <?php echo set_radio( 'f1722', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="4" <?php echo set_radio( 'f1722', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="5" <?php echo set_radio( 'f1722', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="1" <?php echo set_radio( 'f1723', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="2" <?php echo set_radio( 'f1723', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="3" <?php echo set_radio( 'f1723', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="4" <?php echo set_radio( 'f1723', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="5" <?php echo set_radio( 'f1723', '5'); ?> required>                                
                                </td>
                                <td>Manajemen waktu</td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="1" <?php echo set_radio( 'f1724', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="2" <?php echo set_radio( 'f1724', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="3" <?php echo set_radio( 'f1724', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="4" <?php echo set_radio( 'f1724', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="5" <?php echo set_radio( 'f1724', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="1" <?php echo set_radio( 'f1725', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="2" <?php echo set_radio( 'f1725', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="3" <?php echo set_radio( 'f1725', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="4" <?php echo set_radio( 'f1725', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="5" <?php echo set_radio( 'f1725', '5'); ?> required>                                
                                </td>
                                <td>Bekerja secara mandiri</td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="1" <?php echo set_radio( 'f1726', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="2" <?php echo set_radio( 'f1726', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="3" <?php echo set_radio( 'f1726', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="4" <?php echo set_radio( 'f1726', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="5" <?php echo set_radio( 'f1726', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="1" <?php echo set_radio( 'f1727', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="2" <?php echo set_radio( 'f1727', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="3" <?php echo set_radio( 'f1727', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="4" <?php echo set_radio( 'f1727', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="5" <?php echo set_radio( 'f1727', '5'); ?> required>                                
                                </td>
                                <td>Bekerja dalam tim/bekerjasama dengan orang lain</td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="1" <?php echo set_radio( 'f1728', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="2" <?php echo set_radio( 'f1728', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="3" <?php echo set_radio( 'f1728', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="4" <?php echo set_radio( 'f1728', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="5" <?php echo set_radio( 'f1728', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="1" <?php echo set_radio( 'f1729', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="2" <?php echo set_radio( 'f1729', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="3" <?php echo set_radio( 'f1729', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="4" <?php echo set_radio( 'f1729', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="5" <?php echo set_radio( 'f1729', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan dalam memecahkan masalah</td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="1" <?php echo set_radio( 'f1730', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="2" <?php echo set_radio( 'f1730', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="3" <?php echo set_radio( 'f1730', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="4" <?php echo set_radio( 'f1730', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="5" <?php echo set_radio( 'f1730', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="1" <?php echo set_radio( 'f1731', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="2" <?php echo set_radio( 'f1731', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="3" <?php echo set_radio( 'f1731', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="4" <?php echo set_radio( 'f1731', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="5" <?php echo set_radio( 'f1731', '5'); ?> required>                                
                                </td>
                                <td>Negosiasi</td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="1" <?php echo set_radio( 'f1732', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="2" <?php echo set_radio( 'f1732', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="3" <?php echo set_radio( 'f1732', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="4" <?php echo set_radio( 'f1732', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="5" <?php echo set_radio( 'f1732', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="1" <?php echo set_radio( 'f1733', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="2" <?php echo set_radio( 'f1733', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="3" <?php echo set_radio( 'f1733', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="4" <?php echo set_radio( 'f1733', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="5" <?php echo set_radio( 'f1733', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan analisis</td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="1" <?php echo set_radio( 'f1734', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="2" <?php echo set_radio( 'f1734', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="3" <?php echo set_radio( 'f1734', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="4" <?php echo set_radio( 'f1734', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="5" <?php echo set_radio( 'f1734', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="1" <?php echo set_radio( 'f1735', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="2" <?php echo set_radio( 'f1735', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="3" <?php echo set_radio( 'f1735', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="4" <?php echo set_radio( 'f1735', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="5" <?php echo set_radio( 'f1735', '5'); ?> required>                                
                                </td>
                                <td>Toleransi </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="1" <?php echo set_radio( 'f1736', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="2" <?php echo set_radio( 'f1736', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="3" <?php echo set_radio( 'f1736', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="4" <?php echo set_radio( 'f1736', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="5" <?php echo set_radio( 'f1736', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="1" <?php echo set_radio( 'f1737', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="2" <?php echo set_radio( 'f1737', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="3" <?php echo set_radio( 'f1737', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="4" <?php echo set_radio( 'f1737', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="5" <?php echo set_radio( 'f1737', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan adaptasi</td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="1" <?php echo set_radio( 'f1738', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="2" <?php echo set_radio( 'f1738', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="3" <?php echo set_radio( 'f1738', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="4" <?php echo set_radio( 'f1738', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="5" <?php echo set_radio( 'f1738', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="1" <?php echo set_radio( 'f1739', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="2" <?php echo set_radio( 'f1739', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="3" <?php echo set_radio( 'f1739', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="4" <?php echo set_radio( 'f1739', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="5" <?php echo set_radio( 'f1739', '5'); ?> required>                                
                                </td>
                                <td>Loyalitas</td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="1" <?php echo set_radio( 'f1740', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="2" <?php echo set_radio( 'f1740', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="3" <?php echo set_radio( 'f1740', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="4" <?php echo set_radio( 'f1740', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="5" <?php echo set_radio( 'f1740', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="1" <?php echo set_radio( 'f1741', '5'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="2" <?php echo set_radio( 'f1741', '5'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="3" <?php echo set_radio( 'f1741', '5'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="4" <?php echo set_radio( 'f1741', '5'); ?> required                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="5" <?php echo set_radio( 'f1741', '5'); ?> required>                                
                                </td>
                                <td>Integritas</td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="1" <?php echo set_radio( 'f1742', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="2" <?php echo set_radio( 'f1742', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="3" <?php echo set_radio( 'f1742', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="4" <?php echo set_radio( 'f1742', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="5" <?php echo set_radio( 'f1742', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="1" <?php echo set_radio( 'f1743', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="2" <?php echo set_radio( 'f1743', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="3" <?php echo set_radio( 'f1743', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="4" <?php echo set_radio( 'f1743', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="5" <?php echo set_radio( 'f1743', '5'); ?> required>                                
                                </td>
                                <td>Bekerja dengan orang yang berbeda budaya maupun latar belakang</td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="1" <?php echo set_radio( 'f1744', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="2" <?php echo set_radio( 'f1744', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="3" <?php echo set_radio( 'f1744', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="4" <?php echo set_radio( 'f1744', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="5" <?php echo set_radio( 'f1744', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="1" <?php echo set_radio( 'f1745', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="2" <?php echo set_radio( 'f1745', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="3" <?php echo set_radio( 'f1745', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="4" <?php echo set_radio( 'f1745', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="5" <?php echo set_radio( 'f1745', '5'); ?> required>                                
                                </td>
                                <td>Kepemimpinan</td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="1" <?php echo set_radio( 'f1746', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="2" <?php echo set_radio( 'f1746', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="3" <?php echo set_radio( 'f1746', '3'); ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="4" <?php echo set_radio( 'f1746', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="5" <?php echo set_radio( 'f1746', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="1" <?php echo set_radio( 'f1747', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="2" <?php echo set_radio( 'f1747', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="3" <?php echo set_radio( 'f1747', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="4" <?php echo set_radio( 'f1747', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="5" <?php echo set_radio( 'f1747', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan dalam memegang Tanggung Jawab</td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="1" <?php echo set_radio( 'f1748', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="2" <?php echo set_radio( 'f1748', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="3" <?php echo set_radio( 'f1748', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="4" <?php echo set_radio( 'f1748', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="5" <?php echo set_radio( 'f1748', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="1" <?php echo set_radio( 'f1749', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="2" <?php echo set_radio( 'f1749', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="3" <?php echo set_radio( 'f1749', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="4" <?php echo set_radio( 'f1749', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="5" <?php echo set_radio( 'f1749', '5'); ?> required>                                
                                </td>
                                <td>Inisiatif</td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="1" <?php echo set_radio( 'f1750', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="2" <?php echo set_radio( 'f1750', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="3" <?php echo set_radio( 'f1750', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="4" <?php echo set_radio( 'f1750', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="5" <?php echo set_radio( 'f1750', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="1" <?php echo set_radio( 'f1751', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="2" <?php echo set_radio( 'f1751', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="3" <?php echo set_radio( 'f1751', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="4" <?php echo set_radio( 'f1751', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="5" <?php echo set_radio( 'f1751', '5'); ?> required>                                
                                </td>
                                <td>Manajemen proyek/program</td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="1" <?php echo set_radio( 'f1752', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="2" <?php echo set_radio( 'f1752', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="3" <?php echo set_radio( 'f1752', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="4" <?php echo set_radio( 'f1752', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="5" <?php echo set_radio( 'f1752', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="1" <?php echo set_radio( 'f1753', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="2" <?php echo set_radio( 'f1753', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="3" <?php echo set_radio( 'f1753', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="4" <?php echo set_radio( 'f1753', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="5" <?php echo set_radio( 'f1753', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan untuk memresentasikan ide/produk/laporan</td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="1" <?php echo set_radio( 'f1754', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="2" <?php echo set_radio( 'f1754', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="3" <?php echo set_radio( 'f1754', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="4" <?php echo set_radio( 'f1754', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="5" <?php echo set_radio( 'f1754', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="1" <?php echo set_radio( 'f1755', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="2" <?php echo set_radio( 'f1755', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="3" <?php echo set_radio( 'f1755', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="4" <?php echo set_radio( 'f1755', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="5" <?php echo set_radio( 'f1755', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan dalam menulis laporan, memo dan dokumen</td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="1" <?php echo set_radio( 'f1756', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="2" <?php echo set_radio( 'f1756', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="3" <?php echo set_radio( 'f1756', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="4" <?php echo set_radio( 'f1756', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="5" <?php echo set_radio( 'f1756', '5'); ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="1" <?php echo set_radio( 'f1757', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="2" <?php echo set_radio( 'f1757', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="3" <?php echo set_radio( 'f1757', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="4" <?php echo set_radio( 'f1757', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="5" <?php echo set_radio( 'f1757', '5'); ?> required>                                
                                </td>
                                <td>Kemampuan untuk terus belajar sepanjang hayat</td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="1" <?php echo set_radio( 'f1758', '1'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="2" <?php echo set_radio( 'f1758', '2'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="3" <?php echo set_radio( 'f1758', '3'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="4" <?php echo set_radio( 'f1758', '4'); ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="5" <?php echo set_radio( 'f1758', '5'); ?> required>                                
                                </td>                                
                            </tr>
                        </tbody>
                        </table>                        
                    </section>
                </div>                    
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Kritik & Saran untuk Universitas Muria Kudus :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="f18" id="f18" rows="6"><?php echo set_value('f18'); ?></textarea>
                </div>                
            </div>

            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                                     
            </form>
            </div>
            </section>
            </div>
        </div>
        <?php } else { ?>      
        <!-- Tracer Study -->
        <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                            
            <div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('dikti/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            
            <input type="hidden" name="dikti_id" value="<?php echo $detail->dikti_id; ?>" />

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">1. Kapan anda mulai mencari pekerjaan ? <br><em>Mohon pekerjaan sambilan tidak dimasukkan</em></label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f301" id="f301" value="1" <?php if ($detail->dikti_f301 == 1) { echo 'checked'; } ?> >
                        Kira-kira                         
                        <input type="text" name="f302" id="f302" size="3" value="<?php echo $detail->dikti_f302; ?>" autocomplete="off" >
                        Bulan sebelum lulus.                        
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f301" id="f301" value="2" <?php if ($detail->dikti_f301 == 2) { echo 'checked'; } ?> >
                        Kira-kira
                        <input type="text" name="f303" id="f303" size="3" value="<?php echo $detail->dikti_f303; ?>" autocomplete="off" >
                        Bulan sesudah lulus.
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f301" id="f301" value="3" <?php if ($detail->dikti_f301 == 3) { echo 'checked'; } ?>>
                        Saya tidak mencari kerja. <em>(Langsung ke pertanyaan 8)</em>
                        </label>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">2. Bagaimana anda mencari pekerjaan tersebut ? <br><em>Jawaban bisa lebih dari satu</em></label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f401" id="f401" <?php if ($detail->dikti_f401 == 1) { echo 'checked'; } ?>>
                        Melalui iklan di koran/majalah atau brosur.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f402" id="f402" <?php if ($detail->dikti_f402 == 1) { echo 'checked'; } ?>>
                        Melamar ke perusahaan tanpa mengetahui lowongan yang ada.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f403" id="f403" <?php if ($detail->dikti_f403 == 1) { echo 'checked'; } ?>>
                        Pergi ke bursa/pameran kerja.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f404" id="f404" <?php if ($detail->dikti_f404 == 1) { echo 'checked'; } ?>>
                        Mencari lewat internet/iklan online/milis.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f405" id="f405" <?php if ($detail->dikti_f405 == 1) { echo 'checked'; } ?>>
                        Dihubungi oleh perusahaan.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f406" id="f406" <?php if ($detail->dikti_f406 == 1) { echo 'checked'; } ?>>
                        Menghubungi Kemenakertrans.
                        </label>
                    </div> 
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f407" id="f407" <?php if ($detail->dikti_f407 == 1) { echo 'checked'; } ?>>
                        Menghubungi agen tenaga kerja komersial/swasta.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f408" id="f408" <?php if ($detail->dikti_f408 == 1) { echo 'checked'; } ?>>
                        Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f409" id="f409" <?php if ($detail->dikti_f409 == 1) { echo 'checked'; } ?>>
                        Menghubungi kantor kemahasiswaan/hubungan alumni.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f410" id="f410" <?php if ($detail->dikti_f410 == 1) { echo 'checked'; } ?>>
                        Membangun jejaring (network) sejak masih kuliah.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f411" id="f411" <?php if ($detail->dikti_f411 == 1) { echo 'checked'; } ?>>
                        Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.).
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f412" id="f412" <?php if ($detail->dikti_f412 == 1) { echo 'checked'; } ?>>
                        Membangun bisnis sendiri.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f413" id="f413" <?php if ($detail->dikti_f413 == 1) { echo 'checked'; } ?>>
                        Melalui penempatan kerja atau magang.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f414" id="f414" <?php if ($detail->dikti_f414 == 1) { echo 'checked'; } ?>>
                        Bekerja di tempat yang sama dengan tempat kerja semasa kuliah.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f415" id="f415" <?php if ($detail->dikti_f415 == 1) { echo 'checked'; } ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f416" class="form-control" id="f416" value="<?php echo $detail->dikti_f416; ?>" autocomplete="off" >                                       
                        </div>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">3. Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f500" id="f500" value="1" <?php if ($detail->dikti_f500 == 1) { echo 'checked'; } ?> >
                        Kira-kira                         
                        <input type="text" name="f501" id="f501" size="3" value="<?php echo $detail->dikti_f501; ?>" autocomplete="off" >
                        Bulan sebelum lulus ujian.                        
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f500" id="f500" value="2" <?php if ($detail->dikti_f500 == 2) { echo 'checked'; } ?> >
                        Kira-kira
                        <input type="text" name="f502" id="f502" size="3" value="<?php echo $detail->dikti_f502; ?>" autocomplete="off" >
                        Bulan sesudah lulus ujian.
                        </label>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">4. Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama ?</label>
                <div class="col-sm-8">
                     <div class="form-group">
                        <div class="col-sm-2 has-success">
                        <input type="text" name="f6" class="form-control" id="f6" value="<?php echo $detail->dikti_f6; ?>" autocomplete="off" >                        
                        </div>
                        Perusahaan/Instansi/Institusi.
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">5. Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda ?</label>
                <div class="col-sm-8">
                     <div class="form-group">
                        <div class="col-sm-2 has-success">
                        <input type="text" name="f7" class="form-control" id="f7" value="<?php echo $detail->dikti_f7; ?>" autocomplete="off" >                        
                        </div>
                        Perusahaan/Instansi/Institusi.
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">6. Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara ?</label>
                <div class="col-sm-8">
                     <div class="form-group">
                        <div class="col-sm-2 has-success">
                        <input type="text" name="f7a" class="form-control" id="f7a" value="<?php echo $detail->dikti_f7a; ?>" autocomplete="off" >                        
                        </div>
                        Perusahaan/Instansi/Institusi.
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">7. Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha) ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f8" id="f8" value="1" <?php if ($detail->dikti_f8 == 1) { echo 'checked'; } ?>>
                        Ya <em>(Jika Ya, lanjutkan pertanyaan No. 11)</em>                       
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f8" id="f8" value="2" <?php if ($detail->dikti_f8 == 2) { echo 'checked'; } ?>>
                        Tidak
                        </label>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">8. Bagaimana anda menggambarkan situasi anda saat ini ? <em>Jawaban bisa lebih dari satu</em></label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f901" id="f901" <?php if ($detail->dikti_f901 == 1) { echo 'checked'; } ?>>
                        Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f902" id="f902" <?php if ($detail->dikti_f902 == 1) { echo 'checked'; } ?>>
                        Saya menikah
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f903" id="f903" <?php if ($detail->dikti_f903 == 1) { echo 'checked'; } ?>>
                        Saya sibuk dengan keluarga dan anak-anak
                        </label>
                    </div> 
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f904" id="f904" <?php if ($detail->dikti_f904 == 1) { echo 'checked'; } ?>>
                        Saya sekarang sedang mencari pekerjaan
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f905" id="f905" <?php if ($detail->dikti_f905 == 1) { echo 'checked'; } ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f906" class="form-control" id="f906" value="<?php echo $detail->dikti_f906; ?>" autocomplete="off" >                                       
                        </div>
                    </div>  
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">9. Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir ? Pilihlah Satu Jawaban. 
                <br>LANJUT KE F17</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="1" <?php if ($detail->dikti_f1001 == 1) { echo 'checked'; } ?>>
                        Tidak
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="2" <?php if ($detail->dikti_f1001 == 2) { echo 'checked'; } ?>>
                        Tidak, tapi saya sedang menunggu hasil lamaran kerja
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="3" <?php if ($detail->dikti_f1001 == 3) { echo 'checked'; } ?>>
                        Ya, saya akan mulai bekerja dalam 2 minggu ke depan
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="4" <?php if ($detail->dikti_f1001 == 4) { echo 'checked'; } ?>>
                        Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1001" id="f1001" value="5" <?php if ($detail->dikti_f1001 == 5) { echo 'checked'; } ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f1002" class="form-control" id="f1002" value="<?php echo $detail->dikti_f1002; ?>" autocomplete="off" >                                       
                        </div>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">10. Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="1" <?php if ($detail->dikti_f1101 == 1) { echo 'checked'; } ?>>
                        Instansi pemerintah (termasuk BUMN)
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="2" <?php if ($detail->dikti_f1101 == 2) { echo 'checked'; } ?>>
                        Organisasi non-profit/Lembaga Swadaya Masyarakat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="3" <?php if ($detail->dikti_f1101 == 3) { echo 'checked'; } ?>>
                        Perusahaan swasta
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="4" <?php if ($detail->dikti_f1101 == 4) { echo 'checked'; } ?>>
                        Wiraswasta/perusahaan sendiri
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f1101" id="f1101" value="5" <?php if ($detail->dikti_f1101 == 5) { echo 'checked'; } ?>>
                        Lainnya, tuliskan :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f1102" class="form-control" id="f1102" value="<?php echo $detail->dikti_f1102; ?>" autocomplete="off" >                                       
                        </div>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">11. Tempat anda bekerja saat ini bergerak di bidang apa? (Klasifikasi Baku Lapangan Usaha Indonesia, Kemnakertrans, 2009)</label>
                <div class="col-sm-8">                
                <select class="form-control m-bot15" name="f12" id="f12">
                <option value="">- Choose -</option>
                    <option value='01' <?php if ($detail->dikti_f12 == '01') { echo 'selected'; } ?>>[01] Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu
                    <option value='02' <?php if ($detail->dikti_f12 == '02') { echo 'selected'; } ?>>[02] Kehutanan dan penebangan kayu
                    <option value='03' <?php if ($detail->dikti_f12 == '03') { echo 'selected'; } ?>>[03] Perikanan
                    <option value='04' <?php if ($detail->dikti_f12 == '04') { echo 'selected'; } ?>>[04] Pertambangan batu bara dan lignit
                    <option value='05' <?php if ($detail->dikti_f12 == '05') { echo 'selected'; } ?>>[05] Pertambangan minyak bumi dan gas alam dan panas bumi
                    <option value='06' <?php if ($detail->dikti_f12 == '06') { echo 'selected'; } ?>>[06] Pertambangan bijih logam
                    <option value='07' <?php if ($detail->dikti_f12 == '07') { echo 'selected'; } ?>>[07] Pertambangan dan penggalian lainnya
                    <option value='08' <?php if ($detail->dikti_f12 == '08') { echo 'selected'; } ?>>[08] Jasa pertambangan
                    <option value='09' <?php if ($detail->dikti_f12 == '09') { echo 'selected'; } ?>>[09] Industri makanan
                    <option value='10' <?php if ($detail->dikti_f12 == '10') { echo 'selected'; } ?>>[10] Industri minuman
                    <option value='11' <?php if ($detail->dikti_f12 == '11') { echo 'selected'; } ?>>[11] Industri pengolahan tembakau
                    <option value='12' <?php if ($detail->dikti_f12 == '12') { echo 'selected'; } ?>>[12] Industri tekstil
                    <option value='13' <?php if ($detail->dikti_f12 == '13') { echo 'selected'; } ?>>[13] Industri pakaian jadi
                    <option value='14' <?php if ($detail->dikti_f12 == '14') { echo 'selected'; } ?>>[14] Industri kulit, barang dari kulit dan alas kaki
                    <option value='15' <?php if ($detail->dikti_f12 == '15') { echo 'selected'; } ?>>[15] Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya
                    <option value='16' <?php if ($detail->dikti_f12 == '16') { echo 'selected'; } ?>>[16] Industri kertas dan barang dari kertas
                    <option value='17' <?php if ($detail->dikti_f12 == '17') { echo 'selected'; } ?>>[17] Industri pencetakan dan reproduksi media rekaman
                    <option value='18' <?php if ($detail->dikti_f12 == '18') { echo 'selected'; } ?>>[18] Industri produk dari batu bara dan pengilangan minyak bumi
                    <option value='19' <?php if ($detail->dikti_f12 == '19') { echo 'selected'; } ?>>[19] Industri bahan kimia dan barang dari bahan kimia
                    <option value='20' <?php if ($detail->dikti_f12 == '20') { echo 'selected'; } ?>>[20] Industri farmasi, produk obat kimia dan obat tradisional
                    <option value='21' <?php if ($detail->dikti_f12 == '21') { echo 'selected'; } ?>>[21] Industri karet, barang dari karet dan plastik
                    <option value='22' <?php if ($detail->dikti_f12 == '22') { echo 'selected'; } ?>>[22] Industri barang galian bukan logam
                    <option value='23' <?php if ($detail->dikti_f12 == '23') { echo 'selected'; } ?>>[23] Industri logam dasar
                    <option value='24' <?php if ($detail->dikti_f12 == '24') { echo 'selected'; } ?>>[24] Industri barang logam, bukan mesin dan peralatannya
                    <option value='25' <?php if ($detail->dikti_f12 == '25') { echo 'selected'; } ?>>[25] Industri komputer, barang elektronik dan optik
                    <option value='26' <?php if ($detail->dikti_f12 == '26') { echo 'selected'; } ?>>[26] Industri peralatan listrik
                    <option value='27' <?php if ($detail->dikti_f12 == '27') { echo 'selected'; } ?>>[27] Industri mesin dan perlengkapan ytdl
                    <option value='28' <?php if ($detail->dikti_f12 == '28') { echo 'selected'; } ?>>[28] Industri kendaraan bermotor, trailer dan semi trailer
                    <option value='29' <?php if ($detail->dikti_f12 == '29') { echo 'selected'; } ?>>[29] Industri alat angkutan lainnya
                    <option value='30' <?php if ($detail->dikti_f12 == '30') { echo 'selected'; } ?>>[30] Industri furnitur
                    <option value='31' <?php if ($detail->dikti_f12 == '31') { echo 'selected'; } ?>>[31] Industri pengolahan lainnya
                    <option value='32' <?php if ($detail->dikti_f12 == '32') { echo 'selected'; } ?>>[32] Jasa reparasi dan pemasangan mesin dan peralatan
                    <option value='33' <?php if ($detail->dikti_f12 == '33') { echo 'selected'; } ?>>[33] Pengadaan listrik, gas, uap/air panas dan udara dingin
                    <option value='34' <?php if ($detail->dikti_f12 == '34') { echo 'selected'; } ?>>[34] Pengadaan air
                    <option value='35' <?php if ($detail->dikti_f12 == '35') { echo 'selected'; } ?>>[35] Pengolahan limbah
                    <option value='36' <?php if ($detail->dikti_f12 == '36') { echo 'selected'; } ?>>[36] Pengolahan sampah dan daur ulang
                    <option value='37' <?php if ($detail->dikti_f12 == '37') { echo 'selected'; } ?>>[37] Jasa pembersihan dan pengelolaan sampah lainnya
                    <option value='38' <?php if ($detail->dikti_f12 == '38') { echo 'selected'; } ?>>[38] Konstruksi gedung
                    <option value='39' <?php if ($detail->dikti_f12 == '39') { echo 'selected'; } ?>>[39] Konstruksi bangunan sipil
                    <option value='40' <?php if ($detail->dikti_f12 == '40') { echo 'selected'; } ?>>[40] Konstruksi khusus
                    <option value='41' <?php if ($detail->dikti_f12 == '41') { echo 'selected'; } ?>>[41] Perdagangan, reparasi dan perawatan mobil dan sepeda motor
                    <option value='42' <?php if ($detail->dikti_f12 == '42') { echo 'selected'; } ?>>[42] Perdagangan besar, bukan mobil dan sepeda motor
                    <option value='43' <?php if ($detail->dikti_f12 == '43') { echo 'selected'; } ?>>[43] Perdagangan eceran, bukan mobil dan motor
                    <option value='44' <?php if ($detail->dikti_f12 == '44') { echo 'selected'; } ?>>[44] Angkutan darat dan angkutan melalui saluran pipa
                    <option value='88' <?php if ($detail->dikti_f12 == '88') { echo 'selected'; } ?>>[88] Angkutan Air
                    <option value='45' <?php if ($detail->dikti_f12 == '45') { echo 'selected'; } ?>>[45] Angkutan udara
                    <option value='46' <?php if ($detail->dikti_f12 == '46') { echo 'selected'; } ?>>[46] Pergudangan dan jasa penunjang angkutan
                    <option value='47' <?php if ($detail->dikti_f12 == '47') { echo 'selected'; } ?>>[47] Pos dan kurir
                    <option value='48' <?php if ($detail->dikti_f12 == '48') { echo 'selected'; } ?>>[48] Penyediaan akomodasi
                    <option value='49' <?php if ($detail->dikti_f12 == '49') { echo 'selected'; } ?>>[49] Penyediaan makanan dan minuman
                    <option value='50' <?php if ($detail->dikti_f12 == '50') { echo 'selected'; } ?>>[50] Penerbitan
                    <option value='51' <?php if ($detail->dikti_f12 == '51') { echo 'selected'; } ?>>[51] Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik
                    <option value='52' <?php if ($detail->dikti_f12 == '52') { echo 'selected'; } ?>>[52] Penyiaran dan pemrograman
                    <option value='53' <?php if ($detail->dikti_f12 == '53') { echo 'selected'; } ?>>[53] Telekomunikasi
                    <option value='54' <?php if ($detail->dikti_f12 == '54') { echo 'selected'; } ?>>[54] Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu
                    <option value='55' <?php if ($detail->dikti_f12 == '55') { echo 'selected'; } ?>>[55] Kegiatan jasa informasi
                    <option value='56' <?php if ($detail->dikti_f12 == '56') { echo 'selected'; } ?>>[56] Jasa keuangan, bukan asuransi dan dana pensiun
                    <option value='57' <?php if ($detail->dikti_f12 == '57') { echo 'selected'; } ?>>[57] Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib
                    <option value='58' <?php if ($detail->dikti_f12 == '58') { echo 'selected'; } ?>>[58] Jasa penunjang jasa keuangan, asuransi dan dana pensiun
                    <option value='59' <?php if ($detail->dikti_f12 == '59') { echo 'selected'; } ?>>[59] Real estate
                    <option value='60' <?php if ($detail->dikti_f12 == '60') { echo 'selected'; } ?>>[60] Jasa hukum dan akuntansi
                    <option value='61' <?php if ($detail->dikti_f12 == '61') { echo 'selected'; } ?>>[61] Kegiatan kantor pusat dan konsultasi manajemen
                    <option value='62' <?php if ($detail->dikti_f12 == '62') { echo 'selected'; } ?>>[62] Jasa arsitektur dan teknik sipil; analisis dan uji teknis
                    <option value='63' <?php if ($detail->dikti_f12 == '63') { echo 'selected'; } ?>>[63] Penelitian dan pengembangan ilmu pengetahuan
                    <option value='64' <?php if ($detail->dikti_f12 == '64') { echo 'selected'; } ?>>[64] Periklanan dan penelitian pasar
                    <option value='65' <?php if ($detail->dikti_f12 == '65') { echo 'selected'; } ?>>[65] Jasa profesional, ilmiah dan teknis lainnya
                    <option value='66' <?php if ($detail->dikti_f12 == '66') { echo 'selected'; } ?>>[66] Jasa kesehatan hewan
                    <option value='67' <?php if ($detail->dikti_f12 == '67') { echo 'selected'; } ?>>[67] Jasa persewaan dan sewa guna usaha tanpa hak opsi
                    <option value='68' <?php if ($detail->dikti_f12 == '68') { echo 'selected'; } ?>>[68] Jasa ketenagakerjaan
                    <option value='69' <?php if ($detail->dikti_f12 == '69') { echo 'selected'; } ?>>[69] Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya
                    <option value='70' <?php if ($detail->dikti_f12 == '70') { echo 'selected'; } ?>>[70] Jasa keamanan dan penyelidikan
                    <option value='71' <?php if ($detail->dikti_f12 == '71') { echo 'selected'; } ?>>[71] Jasa untuk gedung dan pertamanan
                    <option value='72' <?php if ($detail->dikti_f12 == '72') { echo 'selected'; } ?>>[72] Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya
                    <option value='73' <?php if ($detail->dikti_f12 == '73') { echo 'selected'; } ?>>[73] Administrasi pemerintahan, pertahanan dan jaminan sosial wajib
                    <option value='74' <?php if ($detail->dikti_f12 == '74') { echo 'selected'; } ?>>[74] Jasa pendidikan
                    <option value='75' <?php if ($detail->dikti_f12 == '75') { echo 'selected'; } ?>>[75] Jasa kesehatan manusia
                    <option value='76' <?php if ($detail->dikti_f12 == '76') { echo 'selected'; } ?>>[76] Jasa kegiatan sosial di dalam panti
                    <option value='77' <?php if ($detail->dikti_f12 == '77') { echo 'selected'; } ?>>[77] Jasa kegiatan sosial di luar panti
                    <option value='78' <?php if ($detail->dikti_f12 == '78') { echo 'selected'; } ?>>[78] Kegiatan hiburan, kesenian dan kreativitas
                    <option value='79' <?php if ($detail->dikti_f12 == '79') { echo 'selected'; } ?>>[79] Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya
                    <option value='80' <?php if ($detail->dikti_f12 == '80') { echo 'selected'; } ?>>[80] Kegiatan perjudian dan pertaruhan
                    <option value='81' <?php if ($detail->dikti_f12 == '81') { echo 'selected'; } ?>>[81] Kegiatan olahraga dan rekreasi lainnya
                    <option value='82' <?php if ($detail->dikti_f12 == '82') { echo 'selected'; } ?>>[82] Kegiatan keanggotaan organisasi
                    <option value='83' <?php if ($detail->dikti_f12 == '83') { echo 'selected'; } ?>>[83] Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga
                    <option value='84' <?php if ($detail->dikti_f12 == '84') { echo 'selected'; } ?>>[84] Jasa perorangan lainnya
                    <option value='85' <?php if ($detail->dikti_f12 == '85') { echo 'selected'; } ?>>[85] Jasa perorangan yang melayani rumah tangga
                    <option value='86' <?php if ($detail->dikti_f12 == '86') { echo 'selected'; } ?>>[86] Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan
                    <option value='87' <?php if ($detail->dikti_f12 == '87') { echo 'selected'; } ?>>[87] Kegiatan badan internasional dan badan ekstra internasional lainnya
                    </select>
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">12. Kira-kira berapa pendapatan anda setiap bulannya ?</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        Dari Pekerjaan Utama
                        Rp. <input type="text" name="f1301" id="f1301" size="10" value="<?php echo $detail->dikti_f1301; ?>" autocomplete="off" >
                        (Isilah dengan ANGKA saja, tanpa tanda Titik atau Koma)                        
                    </div>
                     <div class="form-group">
                        Dari Lembur dan Tips
                        Rp. <input type="text" name="f1302" id="f1302" size="10" value="<?php echo $detail->dikti_f1302; ?>" autocomplete="off" >
                        (Isilah dengan ANGKA saja, tanpa tanda Titik atau Koma)                        
                    </div>
                    <div class="form-group">
                        Dari Pekerjaan Lainnya
                        Rp. <input type="text" name="f1303" id="f1303" size="10" value="<?php echo $detail->dikti_f1303; ?>" autocomplete="off" >
                        (Isilah dengan ANGKA saja, tanpa tanda Titik atau Koma)                        
                    </div>                    
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">13. Seberapa erat hubungan antara bidang studi dengan pekerjaan anda ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="1" <?php if ($detail->dikti_f14 == 1) { echo 'checked'; } ?>>
                        Sangat Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="2" <?php if ($detail->dikti_f14 == 2) { echo 'checked'; } ?>>
                        Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="3" <?php if ($detail->dikti_f14 == 3) { echo 'checked'; } ?>>
                        Cukup Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="4" <?php if ($detail->dikti_f14 == 4) { echo 'checked'; } ?>>
                        Kurang Erat
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f14" id="f14" value="5" <?php if ($detail->dikti_f14 == 5) { echo 'checked'; } ?>>
                        Tidak Sama Sekali
                        </label>
                    </div>                    
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">14. Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini ?</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="1" <?php if ($detail->dikti_f15 == 1) { echo 'checked'; } ?>>
                        Setingkat Lebih Tinggi
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="2" <?php if ($detail->dikti_f15 == 2) { echo 'checked'; } ?>>
                        Tingkat yang Sama
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="3" <?php if ($detail->dikti_f15 == 3) { echo 'checked'; } ?>>
                        Setingkat Lebih Rendah
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="f15" id="f15" value="4" <?php if ($detail->dikti_f15 == 4) { echo 'checked'; } ?>>
                        Tidak Perlu Pendidikan Tinggi
                        </label>
                    </div>                                    
                </div>                
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">15. Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya ? <em>Jawaban bisa lebih dari satu</em></label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1601" id="f1601" <?php if ($detail->dikti_f1601 == 1) { echo 'checked'; } ?>>
                        Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1602" id="f1602" <?php if ($detail->dikti_f1602 == 1) { echo 'checked'; } ?>>
                        Saya belum mendapatkan pekerjaan yang lebih sesuai
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1603" id="f1603" <?php if ($detail->dikti_f1603 == 1) { echo 'checked'; } ?>>
                        Di pekerjaan ini saya memeroleh prospek karir yang baik
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1604" id="f1604" <?php if ($detail->dikti_f1604 == 1) { echo 'checked'; } ?>>
                        Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya
                        </label>
                    </div> 
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1605" id="f1605" <?php if ($detail->dikti_f1605 == 1) { echo 'checked'; } ?>>
                        Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1606" id="f1606" <?php if ($detail->dikti_f1606 == 1) { echo 'checked'; } ?>>
                        Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1607" id="f1607" <?php if ($detail->dikti_f1607 == 1) { echo 'checked'; } ?>>
                        Pekerjaan saya saat ini lebih aman/terjamin/secure
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1608" id="f1608" <?php if ($detail->dikti_f1608 == 1) { echo 'checked'; } ?>>
                        Pekerjaan saya saat ini lebih menarik
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1609" id="f1609" <?php if ($detail->dikti_f1609 == 1) { echo 'checked'; } ?>>
                        Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1610" id="f1610" <?php if ($detail->dikti_f1610 == 1) { echo 'checked'; } ?>>
                        Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1611" id="f1611" <?php if ($detail->dikti_f1611 == 1) { echo 'checked'; } ?>>
                        Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1612" id="f1612" <?php if ($detail->dikti_f1612 == 1) { echo 'checked'; } ?>>
                        Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="1" name="f1613" id="f1613" <?php if ($detail->dikti_f1613 == 1) { echo 'checked'; } ?>>
                        Lainnya :
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 has-success">
                        <input type="text" name="f1614" class="form-control" id="f1614" value="<?php echo $detail->dikti_f1614; ?>" autocomplete="off" >                                       
                        </div>
                    </div>  
                </div>                
            </div>
            <div class="form-group">                
                <div class="col-sm-12">
                    <section class="panel">                        
                        <table class="table">
                        <thead>
                            <tr>
                                <th colspan="5" width="25%">Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai ?</th>
                                <th></th>
                                <th colspan="5" width="25%">Pada saat lulus, bagaimana kontribusi perguruan tinggi dalam hal kompetensi di bawah ini ?</th>
                            </tr>
                            <tr>
                                <th colspan="2" width="12%">Sangat Rendah</th>
                                <th colspan="3" width="13%">Sangat Tinggi</th>
                                <th>Keterangan</th>
                                <th colspan="2" width="12%">Sangat Rendah</th>
                                <th colspan="3" width="13%">Sangat Tinggi</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th></th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>                        
                        <tbody>
                            <tr>
                                <td>
                                <input type="radio" name="f171" id="f171" value="1" <?php if ($detail->dikti_f171 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="2" <?php if ($detail->dikti_f171 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="3" <?php if ($detail->dikti_f171 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="4" <?php if ($detail->dikti_f171 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f171" id="f171" value="5" <?php if ($detail->dikti_f171 == 5) { echo 'checked'; } ?> required>
                                </td>
                                <td>Pengetahuan di bidang atau disiplin ilmu anda </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="1" <?php if ($detail->dikti_f172 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="2" <?php if ($detail->dikti_f172 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="3" <?php if ($detail->dikti_f172 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="4" <?php if ($detail->dikti_f172 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f172" id="f172" value="5" <?php if ($detail->dikti_f172 == 5) { echo 'checked'; } ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f173" id="f173" value="1" <?php if ($detail->dikti_f173 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="2" <?php if ($detail->dikti_f173 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="3" <?php if ($detail->dikti_f173 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="4" <?php if ($detail->dikti_f173 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f173" id="f173" value="5" <?php if ($detail->dikti_f173 == 5) { echo 'checked'; } ?> required>
                                </td>
                                <td>Pengetahuan di luar bidang atau disiplin ilmu anda</td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="1" <?php if ($detail->dikti_f174 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="2" <?php if ($detail->dikti_f174 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="3" <?php if ($detail->dikti_f174 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="4" <?php if ($detail->dikti_f174 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f174" id="f174" value="5" <?php if ($detail->dikti_f174 == 5) { echo 'checked'; } ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f175" id="f175" value="1" <?php if ($detail->dikti_f175 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="2" <?php if ($detail->dikti_f175 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="3" <?php if ($detail->dikti_f175 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="4" <?php if ($detail->dikti_f175 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f175" id="f175" value="5" <?php if ($detail->dikti_f175 == 5) { echo 'checked'; } ?> required>
                                </td>
                                <td>Pengetahuan umum</td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="1" <?php if ($detail->dikti_f176 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="2" <?php if ($detail->dikti_f176 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="3" <?php if ($detail->dikti_f176 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="4" <?php if ($detail->dikti_f176 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f176" id="f176" value="5" <?php if ($detail->dikti_f176 == 5) { echo 'checked'; } ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f177" id="f177" value="1" <?php if ($detail->dikti_f177 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="2" <?php if ($detail->dikti_f177 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="3" <?php if ($detail->dikti_f177 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="4" <?php if ($detail->dikti_f177 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f177" id="f177" value="5" <?php if ($detail->dikti_f177 == 5) { echo 'checked'; } ?> required>
                                </td>
                                <td>Bahasa Inggris</td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="1" <?php if ($detail->dikti_f178 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="2" <?php if ($detail->dikti_f178 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="3" <?php if ($detail->dikti_f178 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="4" <?php if ($detail->dikti_f178 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f178" id="f178" value="5" <?php if ($detail->dikti_f178 == 5) { echo 'checked'; } ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f179" id="f179" value="1" <?php if ($detail->dikti_f179 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="2" <?php if ($detail->dikti_f179 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="3" <?php if ($detail->dikti_f179 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="4" <?php if ($detail->dikti_f179 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f179" id="f179" value="5" <?php if ($detail->dikti_f179 == 5) { echo 'checked'; } ?> required>
                                </td>
                                <td>Ketrampilan internet</td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="1" <?php if ($detail->dikti_f1710 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="2" <?php if ($detail->dikti_f1710 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="3" <?php if ($detail->dikti_f1710 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="4" <?php if ($detail->dikti_f1710 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1710" id="f1710" value="5" <?php if ($detail->dikti_f1710 == 5) { echo 'checked'; } ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="1" <?php if ($detail->dikti_f1711 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="2" <?php if ($detail->dikti_f1711 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="3" <?php if ($detail->dikti_f1711 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="4" <?php if ($detail->dikti_f1711 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1711" id="f1711" value="5" <?php if ($detail->dikti_f1711 == 5) { echo 'checked'; } ?> required>
                                </td>
                                <td>Ketrampilan komputer</td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="1" <?php if ($detail->dikti_f1712 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="2" <?php if ($detail->dikti_f1712 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="3" <?php if ($detail->dikti_f1712 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="4" <?php if ($detail->dikti_f1712 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1712" id="f1712" value="5" <?php if ($detail->dikti_f1712 == 5) { echo 'checked'; } ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="1" <?php if ($detail->dikti_f1713 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="2" <?php if ($detail->dikti_f1713 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="3" <?php if ($detail->dikti_f1713 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="4" <?php if ($detail->dikti_f1713 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1713" id="f1713" value="5" <?php if ($detail->dikti_f1713 == 5) { echo 'checked'; } ?> required>
                                </td>
                                <td>Berpikir kritis</td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="1" <?php if ($detail->dikti_f1714 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="2" <?php if ($detail->dikti_f1714 == 2) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="3" <?php if ($detail->dikti_f1714 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="4" <?php if ($detail->dikti_f1714 == 4) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1714" id="f1714" value="5" <?php if ($detail->dikti_f1714 == 5) { echo 'checked'; } ?> required>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="1" <?php if ($detail->dikti_f1715 == 1) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="2" <?php if ($detail->dikti_f1715 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="3" <?php if ($detail->dikti_f1715 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="4" <?php if ($detail->dikti_f1715 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1715" id="f1715" value="5" <?php if ($detail->dikti_f1715 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Ketrampilan riset</td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="1" <?php if ($detail->dikti_f1716 == 1) { echo 'checked'; } ?> required>                        
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="2" <?php if ($detail->dikti_f1716 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="3" <?php if ($detail->dikti_f1716 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="4" <?php if ($detail->dikti_f1716 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1716" id="f1716" value="5" <?php if ($detail->dikti_f1716 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="1" <?php if ($detail->dikti_f1717 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="2" <?php if ($detail->dikti_f1717 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="3" <?php if ($detail->dikti_f1717 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="4" <?php if ($detail->dikti_f1717 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1717" id="f1717" value="5" <?php if ($detail->dikti_f1717 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan belajar</td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="1" <?php if ($detail->dikti_f1718 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="2" <?php if ($detail->dikti_f1718 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="3" <?php if ($detail->dikti_f1718 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="4" <?php if ($detail->dikti_f1718 == 4) { echo 'checked'; } ?> required>                            
                                </td>
                                <td>
                                <input type="radio" name="f1718" id="f1718" value="5" <?php if ($detail->dikti_f1718 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="1" <?php if ($detail->dikti_f1719 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="2" <?php if ($detail->dikti_f1719 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="3" <?php if ($detail->dikti_f1719 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="4" <?php if ($detail->dikti_f1719 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1719" id="f1719" value="5" <?php if ($detail->dikti_f1719 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan berkomunikasi</td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="1" <?php if ($detail->dikti_f1720 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="2" <?php if ($detail->dikti_f1720 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="3" <?php if ($detail->dikti_f1720 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="4" <?php if ($detail->dikti_f1720 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1720" id="f1720" value="5" <?php if ($detail->dikti_f1720 == 5) { echo 'checked'; } ?> required>                            
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="1" <?php if ($detail->dikti_f1721 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="2" <?php if ($detail->dikti_f1721 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="3" <?php if ($detail->dikti_f1721 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="4" <?php if ($detail->dikti_f1721 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1721" id="f1721" value="5" <?php if ($detail->dikti_f1721 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Bekerja di bawah tekanan</td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="1" <?php if ($detail->dikti_f1722 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="2" <?php if ($detail->dikti_f1722 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="3" <?php if ($detail->dikti_f1722 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="4" <?php if ($detail->dikti_f1722 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1722" id="f1722" value="5" <?php if ($detail->dikti_f1722 == 5) { echo 'checked'; } ?>required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="1" <?php if ($detail->dikti_f1723 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="2" <?php if ($detail->dikti_f1723 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="3" <?php if ($detail->dikti_f1723 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="4" <?php if ($detail->dikti_f1723 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1723" id="f1723" value="5" <?php if ($detail->dikti_f1723 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Manajemen waktu</td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="1" <?php if ($detail->dikti_f1724 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="2" <?php if ($detail->dikti_f1724 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="3" <?php if ($detail->dikti_f1724 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="4" <?php if ($detail->dikti_f1724 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1724" id="f1724" value="5" <?php if ($detail->dikti_f1724 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="1" <?php if ($detail->dikti_f1725 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="2" <?php if ($detail->dikti_f1725 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="3" <?php if ($detail->dikti_f1725 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="4" <?php if ($detail->dikti_f1725 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1725" id="f1725" value="5" <?php if ($detail->dikti_f1725 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Bekerja secara mandiri</td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="1" <?php if ($detail->dikti_f1726 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="2" <?php if ($detail->dikti_f1726 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="3" <?php if ($detail->dikti_f1726 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="4" <?php if ($detail->dikti_f1726 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1726" id="f1726" value="5" <?php if ($detail->dikti_f1726 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="1" <?php if ($detail->dikti_f1727 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="2" <?php if ($detail->dikti_f1727 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="3" <?php if ($detail->dikti_f1727 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="4" <?php if ($detail->dikti_f1727 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1727" id="f1727" value="5" <?php if ($detail->dikti_f1727 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Bekerja dalam tim/bekerjasama dengan orang lain</td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="1" <?php if ($detail->dikti_f1728 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="2" <?php if ($detail->dikti_f1728 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="3" <?php if ($detail->dikti_f1728 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="4" <?php if ($detail->dikti_f1728 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1728" id="f1728" value="5" <?php if ($detail->dikti_f1728 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="1" <?php if ($detail->dikti_f1729 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="2" <?php if ($detail->dikti_f1729 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="3" <?php if ($detail->dikti_f1729 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="4" <?php if ($detail->dikti_f1729 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1729" id="f1729" value="5" <?php if ($detail->dikti_f1729 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan dalam memecahkan masalah</td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="1" <?php if ($detail->dikti_f1730 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="2" <?php if ($detail->dikti_f1730 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="3" <?php if ($detail->dikti_f1730 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="4" <?php if ($detail->dikti_f1730 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1730" id="f1730" value="5" <?php if ($detail->dikti_f1730 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="1" <?php if ($detail->dikti_f1731 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="2" <?php if ($detail->dikti_f1731 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="3" <?php if ($detail->dikti_f1731 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="4" <?php if ($detail->dikti_f1731 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1731" id="f1731" value="5" <?php if ($detail->dikti_f1731 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Negosiasi</td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="1" <?php if ($detail->dikti_f1732 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="2" <?php if ($detail->dikti_f1732 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="3" <?php if ($detail->dikti_f1732 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="4" <?php if ($detail->dikti_f1732 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1732" id="f1732" value="5" <?php if ($detail->dikti_f1732 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="1" <?php if ($detail->dikti_f1733 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="2" <?php if ($detail->dikti_f1733 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="3" <?php if ($detail->dikti_f1733 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="4" <?php if ($detail->dikti_f1733 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1733" id="f1733" value="5" <?php if ($detail->dikti_f1733 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan analisis</td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="1" <?php if ($detail->dikti_f1734 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="2" <?php if ($detail->dikti_f1734 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="3" <?php if ($detail->dikti_f1734 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="4" <?php if ($detail->dikti_f1734 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1734" id="f1734" value="5" <?php if ($detail->dikti_f1734 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="1" <?php if ($detail->dikti_f1735 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="2" <?php if ($detail->dikti_f1735 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="3" <?php if ($detail->dikti_f1735 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="4" <?php if ($detail->dikti_f1735 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1735" id="f1735" value="5" <?php if ($detail->dikti_f1735 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Toleransi </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="1" <?php if ($detail->dikti_f1736 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="2" <?php if ($detail->dikti_f1736 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="3" <?php if ($detail->dikti_f1736 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="4" <?php if ($detail->dikti_f1736 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1736" id="f1736" value="5" <?php if ($detail->dikti_f1736 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="1" <?php if ($detail->dikti_f1737 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="2" <?php if ($detail->dikti_f1737 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="3" <?php if ($detail->dikti_f1737 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="4" <?php if ($detail->dikti_f1737 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1737" id="f1737" value="5" <?php if ($detail->dikti_f1737 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan adaptasi</td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="1" <?php if ($detail->dikti_f1738 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="2" <?php if ($detail->dikti_f1738 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="3" <?php if ($detail->dikti_f1738 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="4" <?php if ($detail->dikti_f1738 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1738" id="f1738" value="5" <?php if ($detail->dikti_f1738 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="1" <?php if ($detail->dikti_f1739 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="2" <?php if ($detail->dikti_f1739 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="3" <?php if ($detail->dikti_f1739 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="4" <?php if ($detail->dikti_f1739 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1739" id="f1739" value="5" <?php if ($detail->dikti_f1739 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Loyalitas</td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="1" <?php if ($detail->dikti_f1740 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="2" <?php if ($detail->dikti_f1740 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="3" <?php if ($detail->dikti_f1740 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="4" <?php if ($detail->dikti_f1740 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1740" id="f1740" value="5" <?php if ($detail->dikti_f1740 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="1" <?php if ($detail->dikti_f1741 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="2" <?php if ($detail->dikti_f1741 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="3" <?php if ($detail->dikti_f1741 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="4" <?php if ($detail->dikti_f1741 == 4) { echo 'checked'; } ?> required                                
                                </td>
                                <td>
                                <input type="radio" name="f1741" id="f1741" value="5" <?php if ($detail->dikti_f1741 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Integritas</td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="1" <?php if ($detail->dikti_f1742 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="2" <?php if ($detail->dikti_f1742 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="3" <?php if ($detail->dikti_f1742 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="4" <?php if ($detail->dikti_f1742 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1742" id="f1742" value="5" <?php if ($detail->dikti_f1742 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="1" <?php if ($detail->dikti_f1743 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="2" <?php if ($detail->dikti_f1743 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="3" <?php if ($detail->dikti_f1743 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="4" <?php if ($detail->dikti_f1743 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1743" id="f1743" value="5" <?php if ($detail->dikti_f1743 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Bekerja dengan orang yang berbeda budaya maupun latar belakang</td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="1" <?php if ($detail->dikti_f1744 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="2" <?php if ($detail->dikti_f1744 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="3" <?php if ($detail->dikti_f1744 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="4" <?php if ($detail->dikti_f1744 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1744" id="f1744" value="5" <?php if ($detail->dikti_f1744 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="1" <?php if ($detail->dikti_f1745 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="2" <?php if ($detail->dikti_f1745 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="3" <?php if ($detail->dikti_f1745 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="4" <?php if ($detail->dikti_f1745 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1745" id="f1745" value="5" <?php if ($detail->dikti_f1745 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kepemimpinan</td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="1" <?php if ($detail->dikti_f1746 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="2" <?php if ($detail->dikti_f1746 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="3" <?php if ($detail->dikti_f1746 == 3) { echo 'checked'; } ?> required>
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="4" <?php if ($detail->dikti_f1746 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1746" id="f1746" value="5" <?php if ($detail->dikti_f1746 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="1" <?php if ($detail->dikti_f1747 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="2" <?php if ($detail->dikti_f1747 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="3" <?php if ($detail->dikti_f1747 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="4" <?php if ($detail->dikti_f1747 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1747" id="f1747" value="5" <?php if ($detail->dikti_f1747 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan dalam memegang Tanggung Jawab</td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="1" <?php if ($detail->dikti_f1748 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="2" <?php if ($detail->dikti_f1748 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="3" <?php if ($detail->dikti_f1748 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="4" <?php if ($detail->dikti_f1748 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1748" id="f1748" value="5" <?php if ($detail->dikti_f1748 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="1" <?php if ($detail->dikti_f1749 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="2" <?php if ($detail->dikti_f1749 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="3" <?php if ($detail->dikti_f1749 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="4" <?php if ($detail->dikti_f1749 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1749" id="f1749" value="5" <?php if ($detail->dikti_f1749 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Inisiatif</td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="1" <?php if ($detail->dikti_f1750 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="2" <?php if ($detail->dikti_f1750 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="3" <?php if ($detail->dikti_f1750 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="4" <?php if ($detail->dikti_f1750 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1750" id="f1750" value="5" <?php if ($detail->dikti_f1750 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="1" <?php if ($detail->dikti_f1751 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="2" <?php if ($detail->dikti_f1751 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="3" <?php if ($detail->dikti_f1751 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="4" <?php if ($detail->dikti_f1751 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1751" id="f1751" value="5" <?php if ($detail->dikti_f1751 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Manajemen proyek/program</td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="1" <?php if ($detail->dikti_f1752 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="2" <?php if ($detail->dikti_f1752 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="3" <?php if ($detail->dikti_f1752 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="4" <?php if ($detail->dikti_f1752 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1752" id="f1752" value="5" <?php if ($detail->dikti_f1752 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="1" <?php if ($detail->dikti_f1753 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="2" <?php if ($detail->dikti_f1753 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="3" <?php if ($detail->dikti_f1753 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="4" <?php if ($detail->dikti_f1753 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1753" id="f1753" value="5" <?php if ($detail->dikti_f1753 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan untuk memresentasikan ide/produk/laporan</td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="1" <?php if ($detail->dikti_f1754 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="2" <?php if ($detail->dikti_f1754 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="3" <?php if ($detail->dikti_f1754 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="4" <?php if ($detail->dikti_f1754 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1754" id="f1754" value="5" <?php if ($detail->dikti_f1754 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="1" <?php if ($detail->dikti_f1755 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="2" <?php if ($detail->dikti_f1755 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="3" <?php if ($detail->dikti_f1755 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="4" <?php if ($detail->dikti_f1755 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1755" id="f1755" value="5" <?php if ($detail->dikti_f1755 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan dalam menulis laporan, memo dan dokumen</td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="1" <?php if ($detail->dikti_f1756 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="2" <?php if ($detail->dikti_f1756 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="3" <?php if ($detail->dikti_f1756 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="4" <?php if ($detail->dikti_f1756 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1756" id="f1756" value="5" <?php if ($detail->dikti_f1756 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="1" <?php if ($detail->dikti_f1757 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="2" <?php if ($detail->dikti_f1757 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="3" <?php if ($detail->dikti_f1757 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="4" <?php if ($detail->dikti_f1757 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1757" id="f1757" value="5" <?php if ($detail->dikti_f1757 == 5) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>Kemampuan untuk terus belajar sepanjang hayat</td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="1" <?php if ($detail->dikti_f1758 == 1) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="2" <?php if ($detail->dikti_f1758 == 2) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="3" <?php if ($detail->dikti_f1758 == 3) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="4" <?php if ($detail->dikti_f1758 == 4) { echo 'checked'; } ?> required>                                
                                </td>
                                <td>
                                <input type="radio" name="f1758" id="f1758" value="5" <?php if ($detail->dikti_f1758 == 5) { echo 'checked'; } ?> required>                                
                                </td>                                
                            </tr>
                        </tbody>
                        </table>                        
                    </section>
                </div>                    
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Kritik & Saran untuk Universitas Muria Kudus :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="f18" id="f18" rows="6"><?php echo $detail->dikti_f18; ?></textarea>
                </div>                
            </div>

            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
            <a href="<?php echo site_url('dikti/downloadbukti'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-download-alt"></span> Download Bukti Input Kuesioner
            </a>            
            </form>
            </div>
            </section>
            </div>
        </div>

        <?php } ?>
        </section>
        </div>
    </div>

</section>        