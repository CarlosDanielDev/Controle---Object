<?php

require_once 'Controlador.php';
class ControleRemoto implements Controlador {
    private $volume;
    private $ligado;
    private $tocando;

    public function __construct() {
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }
   private function getVolume() {
        return $this->volume;
    }
    private function getLigado(){
        return $this->ligado;
    }
    private function getTocando(){
        return $this->tocando;
    }
    private function setLigado($ligado){
        $this->ligado = $ligado;
    }
    private function setTocando($tocando){
        $this->tocando = $tocando;
    }
    private function setVolume($volume){
        $this->volume = $volume;
    }

    public function ligar(){
        $this->setLigado(true);
    }

    public function desligar(){
        $this->setLigado(false);
    }

    public function abrirMenu(){
        if ($this->getLigado()){
            echo "<b>-----Menu-----</b>";
            echo "<br>Está ligado ?:" . ($this->getLigado()?"SIM":"NÃO");
            echo "<br>Está Tocando ?:" . ($this->getTocando()?"SIM":"NÃO");
            echo "<br>Volume :" . ($this->getVolume());
            for($i=0; $i <= $this->getVolume(); $i+=10){
                echo "|";
            }
            echo "<br>";
        }else{
            echo "Impossível ligar menu, Tv Desligada<br>";
        }
    }

    public function fecharMenu(){
        if ($this->getLigado()){
        echo "<p>Fechando Menu ...</p>";
        }else{
            echo "<b>ERROR 005 </b>";
        }
    }

    public function maisVolume(){
        if ($this->getLigado()){
            $this->setVolume($this->getVolume() + 5);
        } else{
            echo "<b>ERRO</b>  Impossível Aumentar o Volume (TV Desligada)<br>";
        }
    }
    public function menosVolume(){
        if ($this->getLigado()){
            $this->setVolume($this->getVolume() - 5);
        }else{
            echo "<b>ERRO</b> Impossível Diminuir o Volume(TV Desligada)<br>";
        }
    }
    public function ligarMudo(){
        if ($this->getLigado() && $this->getVolume()>0){
            $this->setVolume(0);
        }
    }
    public function desligarMudo(){
        if ($this->getLigado() && $this->getVolume() == 0){
            $this->setVolume(50);
        }
    }
    public function play(){
        if ($this->getLigado() && !($this->getTocando())){
            $this->setTocando(true);
        }
    }
    public function pause(){
        if ($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }
    }
}