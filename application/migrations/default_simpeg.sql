CREATE TABLE kepegawaian.ms_pegawai (
	id_pegawai bigserial,
	nip_pegawai char(100),
	nip_pegawai_lama char(100) NULL,
	no_kartu_pegawai char(100) NULL,
	nik_pegawai char(30) NULL,
	nama_depan_pegawai varchar(255) NULL,
	nama_tengah_pegawai varchar(255) NULL,
	nama_belakang_pegawai varchar(255) NULL,
	nama_gelar_depan char(10) NULL,
	nama_gelar_belakang char(10) NULL,
	tempat_lahir varchar(255) NULL,
	tanggal_lahir date NULL,
	jenis_kelamin char(5) NULL,
	id_agama bigint NULL,
	id_status_pernikahan bigint NULL,
	usia_pegawai int NULL,
	tanggal_masuk_kerja date NULL,
	id_warga_kewenegaraan bigint NULL,
	suku_bangsa_pegawai varchar(255) NULL,
	alamat_pegawai text NULL,
	no_npwp char(40) NULL,
	kartu_askes_pegawai char(40) NULL,
	email_pegawai varchar(255) NULL,
	no_telepon_pegawai char(50) NULL,
	id_status_pegawai bigint NULL,
	tanggal_pengangkatan_pegawai date NULL,
	tanggal_selesai_kerja date NULL,
	id_jabatan_pegawai bigint NULL,
	tanggal_mulai_jabatan date NULL,
	tanggal_selesai_jabatan date NULL,
	tinggi_badan_pegawai char(5) NULL,
	berat_badan_pegawai char(5) NULL,
	foto varchar(255) NULL,
	foto_ktp varchar(255) NULL,
	added_time char(20) NULL,
	updated_time char(20) NULL,
	deleted_time char(20) NULL,
	is_aktif int default 0,
	is_delete int default 0,
	PRIMARY KEY(id_pegawai),
	FOREIGN KEY(id_status_pegawai) REFERENCES kepegawaian.ms_status_pegawai(id_status_pegawai) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(id_jabatan_pegawai) REFERENCES kepegawaian.ms_jabatan_pegawai(id_jabatan_pegawai) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(id_agama) REFERENCES kepegawaian.ms_agama(id_agama) ON UPDATE CASCADE ON DELETE CASCADE FOREIGN KEY(id_status_pernikahan) REFERENCES kepegawaian.ms_status_pernikahan ON UPDATE CASCADE ON DELETE CASCADE FOREIGN KEY(id_warga_kewenegaraan) REFERENCES wilayah.ms_negara ON UPDATE CASCADE ON DELETE CASCADE
) CREATE TABLE wilayah.ms_negara (
	id_negara bigserial,
	2kode_negara char(2),
	3kode_negara char(3),
	nama_negara varchar(255),
	nama_kewarganegaraan varchar(255),
	PRIMARY KEY(id_negara)
) CREATE TABLE kepegawaian.ms_agama (
	id_agama bigserial,
	nama_agama varchar(255),
	PRIMARY KEY(id_agama)
) CREATE TABLE kepegawaian.ms_status_pernikahan (
	id_status_pernikahan bigserial,
	nama_status_pernikahan varchar(255),
	PRIMARY KEY(id_status_pernikahan)
)
SELECT a.id_pegawai,
	a.nip_pegawai,
	a.nip_pegawai_lama,
	a.no_kartu_pegawai,
	CONCAT(
		a.nama_gelar_depan,
    ' ',
		a.nama_depan_pegawai,
		a.nama_tengah_pegawai,
		a.nama_belakang_pegawai,
		',',
		a.nama_gelar_belakang
	) AS nama_pegawai,
	a.tempat_lahir,
	a.tanggal_lahir,
	a.jenis_kelamin,
	b.nama_agama,
	a.usia_pegawai,
	a.tanggal_masuk_kerja,
	a.alamat_pegawai,
	a.no_npwp,
	a.kartu_askes_pegawai,
  a.suku_bangsa_pegawai,
  e.nama_kewarganegaraan,
	c.nama_status_pegawai,
	a.tanggal_pengangkatan_pegawai,
	a.tanggal_selesai_kerja,
	d.nama_jabatan_pegawai,
	a.tanggal_mulai_jabatan,
	a.tanggal_selesai_jabatan,
	a.tinggi_badan_pegawai,
	a.berat_badan_pegawai,
	a.added_time,
	a.updated_time,
	a.deleted_time
FROM kepegawaian.ms_pegawai a
	JOIN kepegawaian.ms_agama b ON a.id_agama = b.id_agama
	JOIN kepegawaian.ms_status_pegawai c ON a.id_status_pegawai = c.id_status_pegawai
	JOIN kepegawaian.ms_jabatan_pegawai d ON a.id_jabatan_pegawai = d.id_jabatan_pegawai
  JOIN wilayah.ms_negara e ON a.id_warga_kewenegaraan = e.id_negara
WHERE a.is_aktif = 0
	AND a.is_delete = 0
	AND 1 = 1