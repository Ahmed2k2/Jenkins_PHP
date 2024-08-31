<?php
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase {
    public function testPageContainsHelloWorld() {
        $page = file_get_contents('http://localhost');
        $this->assertStringContainsString('Hello, World!', $page);
    }
}

