<?php

class Reservas extends Ligacao {

    private $reserva_id;
    private $reserva_start;
    private $reserva_status;
    private $reserva_checkIn;
    private $reserva_checkOut;
    private $reserva_valor;
    private $reserva_cliente;
    private $quarto_id;
    private $quarto_nome;
    private $quarto_valor;
    private $quarto_config;
    private $quarto_itens;
    private $foto;

    ////////// SET

    protected function setReservaId($reserva_id) {
        $this->reserva_id = $reserva_id;
    }

    protected function setReservaStart($reserva_start) {
        $this->reserva_start = $reserva_start;
    }

    protected function setReservaStatus($reserva_status) {
        $this->reserva_status = $reserva_status;
    }

    protected function setReservaCheckIn($reserva_checkIn) {
        $this->reserva_checkIn = $reserva_checkIn;
    }

    protected function setReservaCheckOut($reserva_checkOut) {
        $this->reserva_checkOut = $reserva_checkOut;
    }

    protected function setReservaValor($reserva_valor) {
        $this->reserva_valor = $reserva_valor;
    }

    protected function setReservaCliente($reserva_cliente) {
        $this->reserva_cliente = $reserva_cliente;
    }

    protected function setQuartoId($quarto_id) {
        $this->quarto_id = $quarto_id;
    }

    protected function setQuartoNome($quarto_nome) {
        $this->quarto_nome = $quarto_nome;
    }

    protected function setQuartoValor($quarto_valor) {
        $this->quarto_valor = $quarto_valor;
    }

    protected function setQuartoConfig($quarto_config) {
        $this->quarto_config = $quarto_config;
    }

    protected function setQuartoItens($quarto_itens) {
        $this->quarto_itens = $quarto_itens;
    }

    ////////// GET

    protected function getReservaId() {
        return $this->reserva_id;
    }

    protected function getReservaStart() {
        return $this->reserva_start;
    }

    protected function getReservaStatus() {
        return $this->reserva_status;
    }

    protected function getReservaCheckIn() {
        return $this->reserva_checkIn;
    }

    protected function getReservaCheckOut() {
        return $this->reserva_checkOut;
    }

    protected function getReservaValor() {
        return $this->reserva_valor;
    }

    protected function getReservaCliente() {
        return $this->reserva_cliente;
    }

    protected function getQuartoId() {
        return $this->quarto_id;
    }

    protected function getQuartoNome() {
        return $this->quarto_nome;
    }

    protected function getQuartoValor() {
        return $this->quarto_valor;
    }

    protected function getQuartoConfig() {
        return $this->quarto_config;
    }

    protected function getQuartoItens() {
        return $this->quarto_itens;
    }

    ////////// PUBLIC
    #######################################
    #######################################
    # VERIFICANDO QUARTOS DISPONIVEIS
    #######################################
    #######################################

    public function consultaDisponiveisDatas($reserva_checkIn, $reserva_checkOut) {
        $this->setReservaCheckIn($reserva_checkIn);
        $this->setReservaCheckOut($reserva_checkOut);
    }

    public function buscaFoto() {
        $conecta = $this->conecta();
        $quarto_id = $this->quarto_id;

        $sql = "select * from fotos where foto_quarto = :quarto";
        $stmt = $conecta->prepare($sql);
        $stmt->bindParam(':quarto', $quarto_id);

        try {
            if ($stmt->execute()):
                $res = $stmt->fetchAll();
                $count = count($res);
                if ($count >= 1):
                    foreach ($res as $key) {
                        $foto_id = $key['foto_id'];
                        $foto_caminho = $key['foto_caminho'];
                        $foto_tipo = $key['foto_tipo'];
                    }

                endif;

                $quarto_nome = $this->getQuartoNome();
                $quarto_valor = $this->getQuartoValor();
                $quarto_config = $this->getQuartoConfig();
                $quarto_itens = $this->getQuartoItens();
                $checkIn = $this->getReservaCheckIn();
                $checkOut = $this->getReservaCheckOut();

                include '../blocos/quarto.php';
            endif;
        } catch (Exception $ex) {
            
        }
    }

    public function expiraReserva($reserva_id) {
        $conecta = $this->conecta();

        $reserva_id = $reserva_id;

        $sql = "update reservas set reserva_status = 'expirada' where reserva_id = :id";
        $stmt = $conecta->prepare($sql);
        $stmt->bindParam(':id', $reserva_id);

        try {
            if ($stmt->execute()):
                $this->consultaQuartos();
            endif;
        } catch (Exception $ex) {
            echo "Erro ao atualizar a reserva. Erro " . $ex->getMessage();
        }
    }

    public function consultaReservas() {
        $conecta = $this->conecta();

        $reserva_checkIn = $this->getReservaCheckIn();
        $reserva_checkOut = $this->getReservaCheckOut();

        $quarto_id = $this->quarto_id;

        $condicao_um = "reserva_quarto = '$quarto_id' && '$reserva_checkIn' = reserva_checkin && reserva_status != 'expirada'";
        $condicao_dois = "reserva_quarto = '$quarto_id' && '$reserva_checkIn' < reserva_checkin && '$reserva_checkOut' > reserva_checkin && reserva_status != 'expirada'";
        $condicao_tres = "reserva_quarto = '$quarto_id' && '$reserva_checkIn' > reserva_checkin && '$reserva_checkIn' < reserva_checkout && reserva_status != 'expirada'";

        $sql = "select * from reservas where " . $condicao_um . " ||" . $condicao_dois . " ||" . $condicao_tres;
        $stmt = $conecta->prepare($sql);

        try {
            if ($stmt->execute()):
                $reserva_hoje = strtotime(date("Y/m/d H:i:s"));

                $res = $stmt->fetchAll();
                $count = count($res);
                foreach ($res as $key) {
                    $reserva_id = $key['reserva_id'];
                    $reserva_start = $key['reserva_start'];
                    echo $reserva_start . " - " . date("d/m/Y H:i:s", $reserva_start) . "<br>";
                    $reserva_status = $key['reserva_status'];
                    if ($reserva_status == "ativa"):
                    elseif ($reserva_status == "pendente"):
                        if ($reserva_start < $reserva_hoje):
                            $this->expiraReserva($reserva_id);
                        endif;
                    else:
                        $this->buscaFoto();
                    endif;
                }
                if ($count == 0):
                    $this->buscaFoto();
                endif;
            endif;
        } catch (Exception $ex) {
            echo "Erro ao verificar reservas. Erro: " . $ex->getMessage();
        }
    }

    public function consultaQuartos() {
        $conecta = $this->conecta();

        $sql = "select * from quartos";
        $stmt = $conecta->prepare($sql);

        try {
            if ($stmt->execute()):
                $res = $stmt->fetchAll();
                $count = count($res);
                if ($count >= 1):
                    foreach ($res as $key) {
                        $quarto_id = $key['quarto_id'];
                        $quarto_nome = $key['quarto_nome'];
                        $quarto_valor = $key['quarto_valor'];
                        $quarto_config = $key['quarto_config'];
                        $quarto_itens = $key['quarto_itens'];

                        $this->setQuartoId($quarto_id);
                        $this->setQuartoNome($quarto_nome);
                        $this->setQuartoValor($quarto_valor);
                        $this->setQuartoConfig($quarto_config);
                        $this->setQuartoItens($quarto_itens);

                        $this->consultaReservas();
                    }
                else:
                    echo 'Nenhum quarto cadastrado.';
                endif;
            endif;
        } catch (Exception $ex) {
            echo "Erro ao buscar quartos. Erro: " . $ex->getMessage();
        }
    }

    #######################################
    #######################################
    # VERIFICANDO E CRIANDO PRE RESERVA
    #######################################
    #######################################

    public function dadosPreReserva($reserva_checkIn, $reserva_checkOut, $quarto_id) {
        $this->setReservaCheckIn($reserva_checkIn);
        $this->setReservaCheckOut($reserva_checkOut);
        $this->setQuartoId($quarto_id);
    }

    public function preReserva() {
        $conn = $this->conecta();

        $reserva_checkIn = $this->getReservaCheckIn();
        $reserva_checkOut = $this->getReservaCheckOut();
        $reserva_start = $this->getReservaStart();
        $quarto_id = $this->getQuartoId();
        $reserva_status = "pendente";

        #falta acrescentar valor e cliente
        $sql = "insert into reservas set reserva_quarto = :quarto, reserva_start = :start, reserva_status = :status, reserva_checkin = :checkin, reserva_checkout = :checkout";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':quarto', $quarto_id);
        $stmt->bindParam(':start', $reserva_start);
        $stmt->bindParam(':status', $reserva_status);
        $stmt->bindParam(':checkin', $reserva_checkIn);
        $stmt->bindParam(':checkout', $reserva_checkOut);

        try {
            if ($stmt->execute()):
                header("Location: ./minhasReservas.php");
                die();
            endif;
        } catch (Exception $ex) {
            
        }
    }

    public function checkReserva() {
        $conn = $this->conecta();

        $reserva_checkIn = $this->getReservaCheckIn();
        $reserva_checkOut = $this->getReservaCheckOut();
        #$reserva_hoje = strtotime(date("d/m/Y H:i:s"));
        #$reservasoma = strtotime("+2 hour", $reserva_hoje);
        $quarto_id = $this->getQuartoId();

        $condicao_um = "reserva_quarto = '$quarto_id' && '$reserva_checkIn' = reserva_checkin";
        $condicao_dois = "reserva_quarto = '$quarto_id' && '$reserva_checkIn' < reserva_checkin && '$reserva_checkOut' > reserva_checkin";
        $condicao_tres = "reserva_quarto = '$quarto_id' && '$reserva_checkIn' > reserva_checkin && '$reserva_checkIn' < reserva_checkout";

        $sql = "select * from reservas where " . $condicao_um . " ||" . $condicao_dois . " ||" . $condicao_tres;
        $stmt = $conn->prepare($sql);

        try {
            if ($stmt->execute()):
                $reserva_hoje = strtotime(date("Y/m/d H:i:s"));
                $reserva_start = $reserva_hoje + 60;

                $res = $stmt->fetchAll();
                $count = count($res);
                foreach ($res as $key) {
                    $reserva_validade = $key['reserva_start'];
                    $reserva_status = $key['reserva_status'];
                    if ($reserva_status == "ativa"):
                        echo "reserva ativa";
                    elseif ($reserva_status == "pendente"):
                        if ($reserva_validade < $reserva_hoje):
                            $this->setReservaStart($reserva_start);
                            $this->preReserva();
                        else:
                            echo "reserva 3";
                        endif;
                        echo "reserva 2";
                    elseif ($reserva_status == "expirada"):
                        $this->setReservaStart($reserva_start);
                        $this->preReserva();
                    endif;
                }
                if ($count == 0):
                    $this->setReservaStart($reserva_start);
                    $this->preReserva();
                endif;
            endif;
        } catch (Exception $ex) {
            echo "Erro ao verificar prereservas. Erro: " . $ex->getMessage();
        }
    }

}
