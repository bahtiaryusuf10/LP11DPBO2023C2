<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasienData($data)
	{
		$ein = $data['nik'];
		$name = $data['nama'];
		$location = $data['tempat'];
		$dob = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$phone = $data['telp'];

		// Query mysql insert data pasien
		$query = "INSERT INTO pasien VALUES ('','$ein', '$name','$location', '$dob', '$gender', '$email', '$phone')";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasienData($id)
	{
		// Query mysql delete data pasien berdasarkan id
		$query = "DELETE FROM pasien WHERE id = '$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function updatePasienData($data)
	{
		$id = $data['id'];
		$ein = $data['nik'];
		$name = $data['nama'];
		$location = $data['tempat'];
		$dob = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$phone = $data['telp'];

		// Query mysql update data pasien
		$query = "UPDATE pasien SET nik = '$ein', nama = '$name', tempat = '$location', tl = '$dob', gender = '$gender', email = '$email', telp = '$phone' WHERE id = '$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}
}
