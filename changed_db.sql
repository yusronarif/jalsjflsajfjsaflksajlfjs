ALTER TABLE `transaksi_dtl`
  ADD COLUMN `PUT_WHEN_TRANSAKSI_DTL` TINYINT(1) DEFAULT 1 NULL COMMENT 'Penentuan pengambilan makanan' AFTER `AMBIL_TRANSAKSI_DTL`;

UPDATE main_menu SET LINK_MM = 'ar/piutang' WHERE LINK_MM = 'piutang';
