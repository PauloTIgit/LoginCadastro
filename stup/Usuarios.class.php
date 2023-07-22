<?php


class Usuarios extends Ligacao
{
    private $user_id;
    private $user_nome;
    private $user_email;
    private $user_telefone;
    private $user_senha;
    private $user_status;
    private $user_nivel;
    private $user_cpf;
    private $user_hash;

    ///////////////////Função SET 

    protected function setUserId($user_id)
    {
        $this -> user_id = $user_id;
    }
    protected function setUserNome($user_nome)
    {
        $this->user_nome = $user_nome;
    }
    protected function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }
    protected function setUserTelefone($user_telefone)
    {
        $this->user_telefone = $user_telefone;
    }
    protected function setUserSenha($user_senha)
    {
        $this->user_senha = $user_senha;
    }
    protected function setUserStatus($user_status)
    {
        $this->user_status = $user_status;
    }
    protected function setUserNivel($user_nivel)
    {
        $this->user_nivel = $user_nivel;
    }
    protected function setUserCPF($user_cpf)
    {
        $this->user_cpf = $user_cpf;
    }
    protected function setUserHash($user_hash)
    {
        $this->user_hash = $user_hash;
    }

    ///////////////////Função GET 

    protected function getUserId()
    {
        return  $this-> user_id;
    }
    protected function getUserNome()
    {
        return $this->user_nome;
    }
    protected function getUserEmail()
    {
        return $this->user_email;
    }
    protected function getUserTelefone()
    {
        return $this->user_telefone;
    }
    protected function getUserSenha()
    {
        return $this->user_senha;
    }
    protected function getUserStatus()
    {
        $this->user_status;
    }
    protected function getUserNivel()
    {
        $this->user_nivel;
    }
    protected function getUserCPF()
    {
        $this->user_cpf;
    }
    protected function getUserHash()
    {
        $this->user_hash;
    }

    ///////////Funções Publicas

    public function informarUserDados(
        $user_nome, 
        $user_email, 
        $user_telefone, 
        $user_senha,
        $user_status,
        $user_nivel,
        $user_cpf,
        $user_hash
        )
    {
        $this -> setUserNome($user_nome);
        $this -> setUserEmail($user_email);
        $this -> setUserTelefone($user_telefone);
        $this -> setUserSenha($user_senha);
        $this -> setUserStatus($user_status);
        $this -> setUserNivel($user_nivel);
        $this -> setUserCPF($user_cpf);
        $this -> setUserHash($user_hash);
    }

    public function cadastrarUsuario($user_nome, $user_email, $user_telefone, $user_senha, $user_hash){
        $conecta =          $this  ->  conecta();
        $user_nome =        $this  ->  getUserNome();
        $user_telefone =    $this  ->  getUserTelefone();
        $user_email =       $this  ->  getUserEmail();
        $user_senha =       $this  ->  getUserSenha();
        $$user_hash =       $this  ->  getUserHash();
        $user_status = 'ativo';
        $user_nivel = 'user';

        echo 'Nome: '. $user_nome .'<br>'.
             'Email: '. $user_email . '<br>' .
             'Telefone: ' . $user_telefone . '<br>' .
             'Senha: ' .$user_senha . '<br>';

        $sql = "INSERT  INTO `usuario` (`user_nome`, `user_email`, `user_senha`,`user_telefone`, `user_status`, `user_nivel`, `user_hash`) 
                        VALUES ('$user_nome', '$user_email', '$user_senha' , '$user_telefone', '$user_status', '$user_nivel' , '$user_hash')";

        $stmt = $conecta -> prepare($sql);

        var_dump($stmt);
        try {
            if($stmt -> execute()){
                $res = $stmt->fetchAll();
                $cont = count($res);
            }
        } catch ( Exception $erro) {
            echo 'Erro de cadastro = ' . $erro->getMessage();
        }
    }

    public function consultarEmail()
    {
        $conecta = $this->conecta();

        $user_email = $this->getUserEmail();

        $sql = "SELECT * FROM usuario WHERE user_email = '$user_email'";

        $stmt = $conecta->prepare($sql);

        try {
            if ($stmt->execute()) {
                $res = $stmt->fetchAll();
                $cont = count($res);
                if ($cont > 0) {
                    $resultado = '1';
                    $_SESSION['erro'] = 'email_ja_cadastrado';
                } else {
                    $resultado = '0';
                    $_SESSION['sucesso'] = 'email_cadastrado';
                }
            }
        } catch (Exception $erro) {
            echo 'Erro de consulta= ' . $erro->getMessage();
        }
        return $resultado . '<br>';
        
    }
}

