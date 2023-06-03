<?php


include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr style='color: #40513B'>
						<td>" . $no . "</td>
						<td>" . $this->prosespasien->getNik($i) . "</td>
						<td>" . $this->prosespasien->getNama($i) . "</td>
						<td>" . $this->prosespasien->getTempat($i) . "</td>
						<td>" . $this->prosespasien->getTl($i) . "</td>
						<td>" . $this->prosespasien->getGender($i) . "</td>
						<td>" . $this->prosespasien->getEmail($i) . "</td>
						<td>" . $this->prosespasien->getPhone($i) . "</td>
						<td>
							<a type='button' data-toggle='modal' data-target='#modalUpdate" . $this->prosespasien->getId($i) . "'' class='btn btn-warning' style='color:#FFFFFF'>Ubah</a>
							<a href='index.php?delete_id=" . $this->prosespasien->getId($i) . "' class='btn btn-danger'>Hapus</a>
						</td>
					</tr>";

			// karena pada modal saya belum mengetahui caranya agar dapat melakukan trigger terhadap data-target dan href, maka saya memutuskan untuk membuat modal secara manual dengan menggunakan id yang telah saya buat pada modal yang ada di index.php
			// modal update
			$data .= '<div
						class="modal fade"
						id="modalUpdate' . $this->prosespasien->getId($i) . '"
						tabindex="-1"
						role="dialog"
						aria-labelledby="exampleModalLabel"
						aria-hidden="true"
						>
						<div class="modal-dialog" role="document">
							<div class="modal-content" style="background-color: #edf1d6">
							<div class="modal-header" style="border-color: #40513b">
								<h5
								class="modal-title"
								id="exampleModalLabel"
								style="color: #40513b"
								>
								Ubah Data Pasien
								</h5>
								<button
								type="button"
								class="close"
								data-dismiss="modal"
								aria-label="Close"
								>
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" style="border-top-color: #40513b">
								<!-- FORM -->
								<form action="index.php" method="POST" id="form-update' . $this->prosespasien->getId($i) . '">
								<div class="form-group">
									<input type="hidden" name="id" value="' . $this->prosespasien->getId($i) . '" class="form-control" />
								</div>
								<div class="form-group">
									<label for="nik" style="color: #40513b">NIK</label>
									<input
									required
									type="text"
									class="form-control"
									name="nik"
									value="' . $this->prosespasien->getNik($i) . '"
									/>
								</div>
								<div class="form-group">
									<label for="nama" style="color: #40513b">Nama</label>
									<input
									required
									type="text"
									class="form-control"
									name="nama"
									value="' . $this->prosespasien->getNama($i) . '"
									/>
								</div>
								<div class="form-group">
									<label for="tempat" style="color: #40513b">Tempat</label>
									<input
									required
									type="text"
									class="form-control"
									name="tempat"
									value="' . $this->prosespasien->getTempat($i) . '"
									/>
								</div>
								<div class="form-group">
									<label for="tl" style="color: #40513b">Tanggal Lahir</label>
									<input
									required
									type="date"
									class="form-control"
									name="tl"
									value="' . $this->prosespasien->getTl($i) . '"
									/>
								</div>
								<div class="form-group">
									<label for="gender" style="color: #40513b">Jenis Kelamin</label>
									<select class="form-control" name="gender">
										<option' . ($this->prosespasien->getGender($i) == 'Laki-laki' ? ' selected' : '') . '>Laki-laki</option>
										<option' . ($this->prosespasien->getGender($i) == 'Perempuan' ? ' selected' : '') . '>Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label for="email" style="color: #40513b">Alamat Email</label>
									<input
									required
									type="email"
									class="form-control"
									name="email"
									value="' . $this->prosespasien->getEmail($i) . '"
									/>
								</div>
								<div class="form-group">
									<label for="telepon" style="color: #40513b">Telepon</label>
									<input
									required
									type="text"
									class="form-control"
									name="telp"
									value="' . $this->prosespasien->getPhone($i) . '"
									/>
								</div>
								</form>
							</div>
							<div class="modal-footer" style="border-top-color: #40513b">
								<button
								type="button"
								class="btn btn-secondary"
								data-dismiss="modal"
								>
								Close
								</button>
								<button
								type="submit"
								name="update_data"
								class="btn btn-warning"
								style="color: #FFFFFF"
								form="form-update' . $this->prosespasien->getId($i) . '"
								>
								Ubah
								</button>
							</div>
							</div>
						</div>
					</div>';
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function addData($data)
	{
		// mengirimkan data ke model untuk ditambahkan ke database
		$this->prosespasien->create($data);

		// mengatur tampilan setelah data ditambahkan
		header("location:index.php");
	}

	function updateData($data)
	{
		// mengirimkan data perubahan ke model untuk mengganti data yang telah ada di database
		$this->prosespasien->update($data);

		// mengatur tampilan setelah data diubah
		header("location:index.php");
	}

	function deleteData($id)
	{
		// mengirimkan id pasien yang akan dihapus ke model
		$this->prosespasien->delete($id);

		// mengatur tampilan setelah data dihapus
		header("location:index.php");
	}
}
