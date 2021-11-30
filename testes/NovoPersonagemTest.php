<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use PHPUnit\Framework\TestCase;

class NovoPersonagemTest extends TestCase
{
    public function testNovoPersonagem()
    {
        #Arrange: Abrir navegador
        $driver = RemoteWebDriver::create('http://localhost:9515');

        #Act: Abrir página
        $driver->get('http://localhost/sistema-rpg');

        #Assert: Verificar título
        self::assertStringContainsString('Gestão de conhecimento dos personagens | RPG', $driver->getTitle());

        #Tear Down: Fechar navegador
        $driver->close();



    }
}

?>