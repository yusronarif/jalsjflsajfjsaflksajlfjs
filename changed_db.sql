ALTER TABLE `transaksi_dtl`
  ADD COLUMN `PUT_WHEN_TRANSAKSI_DTL` TINYINT(1) DEFAULT 1 NULL COMMENT 'Penentuan pengambilan makanan' AFTER `AMBIL_TRANSAKSI_DTL`;

UPDATE main_menu SET LINK_MM = 'admin/ar-ap/piutang' WHERE LINK_MM = 'piutang';

ALTER TABLE `transaksi_dtl`
  ADD COLUMN `PUT_DATE_TRANSAKSI_DTL` DATE NULL COMMENT 'penentuan diambil pada tgl' AFTER `AMBIL_TRANSAKSI_DTL`,
  CHANGE `PUT_WHEN_TRANSAKSI_DTL` `PUT_ON_TRANSAKSI_DTL` TINYINT(1) DEFAULT 1  NULL   COMMENT 'Penentuan pengambilan makanan',
  ADD COLUMN `STATUS_AR` TINYINT(1) DEFAULT 0  NOT NULL   COMMENT '0:belum di AR-kan' AFTER `STATUS_TRANSAKSI_DTL`;

ALTER TABLE `piutang_dtl`
ADD COLUMN `ID_TRANSAKSI_DTL` INT(11) NULL AFTER `NO_PIUTANG`,
ADD CONSTRAINT `FK_AR_TRANSDTL` FOREIGN KEY (`ID_TRANSAKSI_DTL`) REFERENCES `transaksi_dtl`(`ID_TRANSAKSI_DTL`) ON UPDATE CASCADE;

ALTER TABLE `piutang_dtl` DROP FOREIGN KEY `FK_RELATIONSHIP_34`;

ALTER TABLE `piutang_dtl` ADD CONSTRAINT `FK_RELATIONSHIP_34` FOREIGN KEY (`NO_PIUTANG`) REFERENCES `piutang`(`NO_PIUTANG`) ON UPDATE CASCADE;

ALTER TABLE `piutang`
CHANGE `TOTAL_PIUTANG` `TOTAL_PIUTANG` BIGINT(20) DEFAULT 0  NULL,
CHANGE `STATUS_PIUTANG` `STATUS_PIUTANG` TINYINT(1) DEFAULT 0  NULL;
