<?php

class PhanSo
{
    private $_tuso;
    private $_mauso;

    public function __construct($_tuso, $_mauso)
    {
        $this->_tuso = $_tuso;
        $this->_mauso = $_mauso;
    }

    // Display Phan So
    public function showPS()
    {
        echo $this->_tuso . '/' . $this->_mauso;
    }

    // Rut gon PS
    public function rutGon()
    {
        $ucln = $this->findUCLN($this->_tuso, $this->_mauso);
        $this->_tuso = $this->_tuso / $ucln;
        $this->_mauso = $this->_mauso / $ucln;
    }

    // Calculate 
    public function calculate($phanso)
    {
        $this->_tuso = $this->_tuso * $phanso->_mauso + $phanso->_tuso * $this->_mauso;
        $this->_mauso = $this->_mauso * $phanso->_mauso;
        $this->rutGon();
    }

    // Minus
    public function minus($phanso)
    {
        $this->_tuso = $this->_tuso * $phanso->_mauso - $phanso->_tuso * $this->_mauso;
        $this->_mauso = $this->_mauso * $phanso->_mauso;
        $this->rutGon();
    }

    // Nhan
    public function nhan($phanso)
    {
        $this->_tuso = $this->_tuso * $phanso->_tuso;
        $this->_mauso = $this->_mauso * $phanso->_mauso;
        $this->rutGon();
    }

    // Chia
    public function chia($phanso)
    {
        $this->_tuso = $this->_tuso * $phanso->_mauso;
        $this->_mauso = $this->_mauso * $phanso->_phanso;
        $this->rutGon();
    }

    // Tim UCLN
    private function findUCLN($a, $b)
    {
        $min = min(array($a, $b));
        while ($min > 0) {
            if ($a % $min == 0 && $b % $min == 0) {
                return $min;
            } else {
                $min--;
            }
        }
    }
}
