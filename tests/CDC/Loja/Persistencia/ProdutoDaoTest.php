<?php

namespace CDC\Loja\Persistencia;

use PDO;
use CDC\Loja\Test\TestCase;
use CDC\Loja\Persistencia\ProdutoDao;
use CDC\Loja\Produto\Produto;

class ProdutoDaoTest extends TestCase
{

    private $conexao;

    protected function setUp()
    {
        parent::setUp();

        $this->conexao = new PDO("sqlite:test.db");

        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->criaTabela();
    }

    protected function criaTabela()
    {
        $sqlString = "CREATE TABLE produto ";
        $sqlString .= "(id INTEGER PRIMARY KEY, nome TEXT, ";
        $sqlString .= "valor_unitario TEXT, status TINYINT(1))";

        $this->conexao->query($sqlString);
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->conexao = null;
        unlink("test.db");
    }

    public function testDeveAdicionarUmProduto()
    {
        # $Instancia o objeto de manipulação de dados do produto
        $produtoDao = new ProdutoDao($this->conexao);

        # Instancia o produto a ser inserido
        $produto = new Produto("Geladeira", 150.0);

        # insere o produto
        $conexao = $produtoDao->adiciona($produto);

        # Consulta o ID inserido no banco
        $salvo = $produtoDao->porId($conexao->lastInsertId());

        # Verifica se os dados inseridos são os dados do produto instanciado no teste
        $this->assertEquals($produto->getNome(), $salvo['nome']);
        $this->assertEquals(
            $produto->getValorUnitario(),
            $salvo['valor_unitario']
        );
        $this->assertEquals($produto->getStatus(), $salvo['status']);
    }
}
