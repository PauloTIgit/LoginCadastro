<?php

class Cadastro extends Ligacao {

    private $nome;
    private $email;
    private $senha;
    private $cpf;

///////////// SET

    protected function setNome($nome){
        $this->nome = $nome;
    }
    protected function setEmail($email){
        $this->email = $email;
    }
    protected function setSenha($senha){
        $this->senha = $senha;
    }
    protected function setCPF($cpf){
        $this->cpf = $cpf;
    }

///////////// GET

    protected function getNome(){
        return $this->nome;
    }
    protected function getEmail(){
        return $this->email;
    }
    protected function getSenha(){
        return $this->senha;
    }
    protected function getCPF(){
        return $this->cpf;
    }

    #########################
    # CADASTRO
    #########################

    public function dadosForm($nome, $email, $senha, $cpf){
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setCPF($cpf);
    }

    public function cadastra(){

        $conn = $this->conecta();

        $nome = $this->getNome();
        $email = $this->getEmail();
        $senha = $this->getSenha();
        $cpf = $this->getCPF();

        $sql = "select aluno_status from alunos where aluno_email = '$email'";
        $stmt = $conn->prepare($sql);

        try {
            if($stmt->execute()):
                $count = $stmt->rowCount();
                if($count>0):
                    $_SESSION['erro'] = "O email informado já possui cadastro.";
                    header("Location:../login.php");
                    die();
                else:
                    $sql2 = "insert into alunos set aluno_nome = :nome, aluno_email = :email, aluno_senha = :senha, aluno_cpf = :cpf, aluno_status = 1";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bindParam(':nome', $nome);
                    $stmt2->bindParam(':email', $email);
                    $stmt2->bindParam(':senha', $senha);
                    $stmt2->bindParam(':cpf', $cpf);

                    try{
                        if($stmt2->execute()):
                            $count = $stmt2->rowCount();
                            if($count>0):
                                $_SESSION['sucesso'] = "Cadastro realizado com sucesso. Agora você já pode logar na área do aluno.";
                                header("Location:../login.php");
                                die();
                            else:
                                $_SESSION['erro'] = "Desculpe, ocorreu um erro ao realizar o cadastro.";
                                header("Location:../login.php");
                                die();
                            endif;
                        else:
                            $_SESSION['erro'] = "Desculpe, ocorreu um erro ao executar o comando. Erro: ".print_r($stmt->errorInfo());
                            header("Location:../login.php");
                            die();
                        endif;
                    }catch (PDOException $e){
                        $_SESSION['erro'] = "Desculpe, houve um erro de conexão. Erro: ".$e->getMessage();
                        header("Location:../login.php");
                        die();
                    }
                endif;
            else:
                $_SESSION['erro'] = "Desculpe, ocorreu um erro ao executar o comando. Erro: ".print_r($stmt->errorInfo());
                header("Location:../login.php");
                die();
            endif;
        }catch (PDOException $e){
            $_SESSION['erro'] = "Desculpe, houve um erro de conexão. Erro: ".$e->getMessage();
            header("Location:../login.php");
            die();
        }

    }

    #########################
    # LOGIN
    #########################

    public function loginDados($email, $senha){
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    public function login(){
        $conn = $this->conecta();

        $email = $this->getEmail();
        $senha = $this->getSenha();

        $sql = "select * from alunos where aluno_email = '$email'";
        $stmt = $conn->prepare($sql);

        try{
            if($stmt->execute()):
                $count = $stmt->rowCount();
                if($count>0):
                    $res = $stmt->fetchAll();
                    foreach ($res as $chave):
                        $status = $chave['aluno_status'];
                        if($status == 0):
                            $_SESSION['erro'] = "Desculpe, seu cadastro está bloqueado.";
                            header("Location:../login.php");
                            die();
                        endif;
                        $id = $chave['aluno_id'];
                        $nome = $chave['aluno_nome'];
                        $email = $chave['aluno_email'];
                        $cpf = $chave['aluno_cpf'];
                        $senhaBD = $chave['aluno_senha'];
                        $foto = $chave['aluno_foto'];
                        $nivel = $chave['aluno_nivel'];
                        if(!password_verify($senha, $senhaBD)):
                            $_SESSION['erro'] = "Os dados não conferem.";
                            header("Location:../login.php");
                            die();
                        endif;
                        $_SESSION['logado'] = 1;
                        $_SESSION['nivel'] = $nivel;
                        $_SESSION['id'] = $id;
                        $_SESSION['nome'] = $nome;
                        $_SESSION['email'] = $email;
                        $_SESSION['cpfa'] = $cpf;
                        $_SESSION['foto'] = $foto;
                        if($nivel == 'aluno'):
                            $_SESSION['sucesso'] = "Login realizado com sucesso.";
                            header("Location:../../plataforma/");
                            die();
                        elseif($nivel == 'staff'):
                            $_SESSION['sucesso'] = "Login realizado com sucesso.";
                            header("Location:../../staff/");
                            die();
                        else:
                            $_SESSION['erro'] = "Há um erro com seu cadastro. Por favor entre em contato com suporte@professorricardopereira.com.br.";
                            header("Location:../login.php");
                            die();
                        endif;
                    endforeach;
                else:
                    $_SESSION['erro'] = "Dados não conferem.";
                    header("Location:../login.php");
                    die();
                endif;
            else:
            endif;
        }catch (PDOException $e){
            $_SESSION['erro'] = "Desculpe, houve um erro de conexão. Erro: ".$e->getMessage();
            header("Location:../login.php");
            die();
        }

    }

}