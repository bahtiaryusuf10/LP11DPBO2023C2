<?php

interface KontrakPasienView
{
    public function tampil();
}

interface KontrakPasienPresenter
{
    public function prosesDataPasien();
    public function create($data);
    public function update($data);
    public function delete($id);
    public function getId($i);
    public function getNik($i);
    public function getNama($i);
    public function getTempat($i);
    public function getTl($i);
    public function getGender($i);
    public function getEmail($i);
    public function getPhone($i);
    public function getSize();
}
