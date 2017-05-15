<section class="wrapper">	
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-plus-sign-alt"></i> Laporan Statistik Alumni : <b><?php if (!empty($namaprogdi->progdi_name)) { echo $namaprogdi->progdi_name; } ?></b>
        </header>

		<!-- Mulai Form -->
		<div class="row">
        	<div class="col-lg-6">                    
                    
			<section class="panel">					
            	<div class="panel-body">
                    <div class="form-group has-success">
                        <label for="exampleInputEmail1">GRAFIK TINGKAT KESERAPAN ALUMNI</label>
                        <div id="canvasserapan"></div>
                    </div>                    

                    <div class="form-group has-success">
                        <label for="exampleInputEmail1">GRAFIK KESESUAIAN BIDANG ILMU DENGAN PEKERJAAN</label>
                        <div id="canvasskala"></div>
                    </div>
                    
					<div class="form-group has-success">
                        <label for="exampleInputEmail1">GRAFIK TINGKAT GAJI ALUMNI</label>                         
                        <div id="canvasgaji"></div>
					</div>                    

                    <div class="form-group has-success">
                        <label for="exampleInputEmail1">GRAFIK JENIS PERUSAHAAN</label>
						<div id="canvasjenis"></div>
                    </div>

                    <div class="form-group has-success">
                        <label for="exampleInputEmail1">GRAFIK LAMA TUNGGU</label>
                        <div id="canvaslamatunggu"></div>
                    </div>            
                </div>
			</section>
			</div>
            
            
            <!-- Form Kanan -->
            <div class="col-lg-6">
            	
                <section class="panel">
                    <header class="panel-heading">
                    <b>Data Tingkat Keserapan Alumni</b>
                    </header>
                    
                    <table class="table">
                        <thead>
                        <tr>                            
                            <th>Kegiatan</th>
                            <th width="40%">Jumlah Alumni</th>                            
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php                                           
                        foreach($daftar_kegiatan as $k) {
                            $kegiatan_id = $k->kegiatan_id; 
                            $nilai = $this->statistik_model->select_by_kegiatan($kegiatan_id)->row();
                        ?>
                        <tr>                                            
                            <td><?php echo $k->kegiatan_desc; ?></td>
                            <td><?php echo $nilai->total; ?></td>                                          
                        </tr>
                        <?php } ?>                        
                        </tbody>
                    </table>
                </section> 

                <section class="panel">
                    <header class="panel-heading">
                    <b>Data Tingkat Keserapan Alumni</b>
                    </header>
                    
                    <table class="table">
                        <thead>
                        <tr>                            
                            <th>Tingkat Relevansi</th>
                            <th width="40%">Jumlah Alumni</th>                            
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php                                           
                        foreach($daftar_skala as $s) {
                            $skala_id = $s->skala_id; 
                            $nilai_s = $this->statistik_model->select_by_skala($skala_id)->row();
                        ?>
                        <tr>                                            
                            <td><?php echo $s->skala_desc; ?></td>
                            <td><?php echo $nilai_s->total; ?></td>                                          
                        </tr>
                        <?php } ?>                        
                        </tbody>
                    </table>
                </section> 

                <section class="panel">
                    <header class="panel-heading">
                    <b>Data Gaji Alumni</b>
                    </header>
                    
                    <table class="table">
                        <thead>
                        <tr>                            
                            <th>Gaji</th>
                            <th width="40%">Jumlah Alumni</th>                            
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php                                           
                        foreach($daftar_gaji as $g) {
                            $gaji_id = $g->gaji_id; 
                            $nilaigaji = $this->statistik_model->select_by_gaji($gaji_id)->row();
                        ?>
                        <tr>                                            
                            <td><?php echo $g->gaji_desc; ?></td>
                            <td><?php echo $nilaigaji->total; ?></td>                                          
                        </tr>
                        <?php } ?>                        
                        </tbody>
                    </table>
                </section>

                <section class="panel">
                    <header class="panel-heading">
                    <b>Data Jenis Perusahaan</b>
                    </header>
                    
                    <table class="table">
                        <thead>
                        <tr>                            
                            <th>Jenis Perusahaan</th>
                            <th width="40%">Jumlah Alumni</th>                            
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php                                           
                        foreach($daftar_jenis as $j) {
                            $jenis_id = $j->jenis_id; 
                            $nilaijenis = $this->statistik_model->select_by_jenis($jenis_id)->row();
                        ?>
                        <tr>                                            
                            <td><?php echo $j->jenis_desc; ?></td>
                            <td><?php echo $nilaijenis->total; ?></td>                                          
                        </tr>
                        <?php } ?>                        
                        </tbody>
                    </table>
                </section>

			</div>

        </div>
		<!-- Akhir Form -->
        </section>
		</div>
    </div>
</section>