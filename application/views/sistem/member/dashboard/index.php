			<ul class="info-blocks">
				
				<li class="bg-success">
					<div class="top-info">
						<?php echo anchor('member/deposit', 'Deposit / Saldo')?>
						<small>Lakukan Pengisian</small>
					</div>
					<?php echo anchor('member/deposit', '<i class="icon-coin"></i>')?>
					<span class="bottom-info bg-info">Rp. <?php echo number_format($saldo_user);?>
			    	</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<?php echo anchor('member/pesan', 'Pesan')?>
						<small>Lakukan Pemesanan</small>
					</div>
					<?php echo anchor('member/pesan', '<i class="icon-cart-plus"></i>')?>
					<span class="bottom-info bg-success">&nbsp;</span>
				</li>
				<li class="bg-info">
					<div class="top-info">
						<?php echo anchor('member/keranjang', 'Lihat Pesanan')?>
						<small>Item dalam Keranjang</small>
					</div>
					<?php echo anchor('member/keranjang', '<i class="icon-cart-checkout"></i>')?>
					<span class="bottom-info bg-warning">&nbsp;</span>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<?php echo anchor('member/histori_pesanan', 'Histori Pesanan')?>
						<small>Daftar Transaksi</small>
					</div>
					<?php echo anchor('member/histori_pesanan', '<i class="icon-cart4"></i>')?>
					<span class="bottom-info bg-primary">&nbsp;</span>
				</li>
				
			</ul>