<?php
/*
	Class Cliente.class.php
	By Leonardo Alves Carrilho
	25/11/2016
 */
class Cliente{

	private $id;
	private $name;
	private $email;
	private $conn;

	function salvar(){
		try{
			// cria uma instância de objeto da classe Conectar
			$this->conn = new Conectar();
            // Escreve a consulta
            $qry = "INSERT INTO cliente (id, nome, email) VALUES (null, ?, ?)";
			// preparando para receber params
			$sql = $this->conn->prepare($qry);
			// passando os 2 params
			@$sql->bindParam(1, $this->getName(), PDO::PARAM_STR);
			@$sql->bindParam(2, $this->getEmail(), PDO::PARAM_STR);
			// executa e checa se teve sucesso
			if ($sql->execute() == 1){
				return 'Registro salvo com sucesso!';
			}
			// limpa
			$this->conn = null;
		} catch (PDOException $exc){
			// pega o erro
			echo 'Erro ao salvar registro'.$exec->getMessage();
		}
	} // salvar

    function consultar(){
        try{
            $this->conn = new Conectar();
            $sql = $this->conn->query();
            $qry = "SELECT * FROM cliente ORDER BY nome";
            $sql->execute($qry);
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exec){
            return "Erro ao executar consulta. ".$exec->getMessage();
        }
    } // consultar

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    private function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    private function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

} // class
?>