<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Mobil {
        private $tipe;
        private $pabrikan;
        private $cc;

        function Mobil($tipe, $pabrikan, $cc) {
            $this->tipe = $tipe;
            $this->pabrikan = $pabrikan;
            $this->cc = $cc;
        }
        public function lihat_info() {
            echo "Tipe : $this->tipe<br>";
            echo "Pabrikan : $this->pabrikan<br>";
            echo "CC : $this->cc<br>";
            echo "<hr>";
        }
        public function ubah_cc($cc){
            $this->cc = $cc;
        }
        public function ambil_cc(){
            return($this->cc);
        }
    }
?>