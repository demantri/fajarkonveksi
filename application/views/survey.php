
<div class="card-body">



<div class="col-lg-12">
	<div class="signup-form">
		<form action="<?php echo base_url('survey/add'); ?>" method="post">
			<h2 class="text-center">KUISIONER KEPUASAN PELANGGAN</h2>
			<br>
			<p class="text-center">Web Ecommerce Fajar Konveksi</p>
			<br>
			<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
            <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
			<hr>
			<br>
			<ol start="1" type="1">

				<!-- // looping untuk group soal -->
				<?php
				$nogrupsoal = 1;
				$hitungsemuasubsoal = 1;
				foreach ($groupsoals as $groupsoal) :
				?>
					<!-- <h4>
						<li><strong><?= $groupsoal->groupname; ?> </strong> </li><br>
					</h4> -->



					<ol start="1" type="1">
						<!-- // looping untuk sub soal -->

						<?php
						$nosubsoal = 1;
						$subsoals = $this->general->getSubSoalById($groupsoal->groupid);
						foreach ($subsoals as $subsoal) :
						?>

							<li><?= $subsoal->subnama; ?> </li>
							<!-- <li> <?php echo $subsoal->subnama; ?></li> -->
							<input type="hidden" name="id_subsoal[]" value="<?= $subsoal->subid; ?>">



							<ol start="1" type="A"> <br>
								<!-- <i> -->
								<!-- // looping untuk jawaban sub soal -->

								<?php
								$nojawaban = 1;
								$jawabansubsoal = $this->general->getJawabanSubSoalById($subsoal->subid);
								foreach ($jawabansubsoal as $jawaban) :
									// echo $hitungsemuasubsoal;
								?>
									<li>
										<fieldset id="namajawaban<?= $hitungsemuasubsoal ?>[]">
											<input type="radio" name="namajawaban<?= $hitungsemuasubsoal ?>[]" value="<?= $jawaban->namajawaban; ?>"> &nbsp;<?= $jawaban->namajawaban; ?>
										</fieldset>
									</li>
								<?php
									$nojawaban++;
								endforeach;
								?>
								<!-- end looping jawaban sub soal -->
								<!-- </i> -->


							</ol>
							<br>


						<?php
							$hitungsemuasubsoal++;
							$nosubsoal++;
						endforeach;
						?>

						<!-- end looping sub soal -->

					</ol>

				<?php
					$nogrupsoal++;
				endforeach;
				?>

				<!-- end looping grup soal -->
			</ol>
			<div class="form-group">
				<label for="saran">
					<h4><Strong>SARAN/KRITIK PELAYANAN Fajar Konveksi</Strong></h4>
				</label>
				<textarea class="form-control" name="saran" rows="6"></textarea>
			</div>
			<br>
			<div class="row">
				<div class="col md 6">
					<div class="form-group" style="float: right;">
						<button type="submit" class="btn btn-primary btn-lg pull-right">Selesai</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
<!-- </body>

</html> -->