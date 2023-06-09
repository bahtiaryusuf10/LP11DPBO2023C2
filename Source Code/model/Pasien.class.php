<?php

/******************************************
Asisten Pemrogaman 11 
 ******************************************/

class Pasien
{
	// Atrbiut untuk menyimpan sementara data Pasien
	var $id = '';
	var $nik = '';
	var $nama = '';
	var $tempat = '';
	var $tl = '';
	var $gender = '';
	var $email = '';
	var $phone = '';

	// Konstruktor untuk membuat objek Pasien
	function __construct($id = '', $nik = '', $nama = '', $tempat = '', $tl = '', $gender = '', $email = '', $phone = '')
	{
		$this->id = $id;
		$this->nik = $nik;
		$this->nama = $nama;
		$this->tempat = $tempat;
		$this->tl = $tl;
		$this->gender = $gender;
		$this->email = $email;
		$this->phone = $phone;
	}

	// Setter untuk mengatur data Pasien
	function setId($id)
	{
		$this->id = $id;
	}

	function setNik($nik)
	{
		$this->nik = $nik;
	}

	function setNama($nama)
	{
		$this->nama = $nama;
	}

	function setTempat($tempat)
	{
		$this->tempat = $tempat;
	}

	function setTl($tl)
	{
		$this->tl = $tl;
	}

	function setGender($gender)
	{
		$this->gender = $gender;
	}

	function setEmail($email)
	{
		$this->email = $email;
	}

	function setPhone($phone)
	{
		$this->phone = $phone;
	}

	// Getter untuk mengambil data Pasien
	function getId()
	{
		return $this->id;
	}

	function getNik()
	{
		return $this->nik;
	}

	function getNama()
	{
		return $this->nama;
	}

	function getTempat()
	{
		return $this->tempat;
	}

	function getTl()
	{
		return $this->tl;
	}

	function getGender()
	{
		return $this->gender;
	}

	function getEmail()
	{
		return $this->email;
	}

	function getPhone()
	{
		return $this->phone;
	}
}
