<?php

use Models\Trade;
use PHPUnit\Util\InvalidDataSetException;

class TradeModelTest extends \PHPUnit\Framework\TestCase
{

    public function testTradePokemon_ShouldBeTrue()
    {
        $class = new Trade();
        
        $data = [
            "player1" => "TestPlayer1",
            "player2" => "TestPlayer2",
            "trade_data" => "eyJwbGF5ZXIxX2RlY2siOlt7InBva2Vtb25faW1nIjoiaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL1Bva2VBUEkvc3ByaXRlcy9tYXN0ZXIvc3ByaXRlcy9wb2tlbW9uLzI1LnBuZyIsInBva2Vtb25fbmFtZSI6InBpa2FjaHUiLCJwb2tlbW9uX2lkIjoyNSwicG9rZW1vbl94cCI6MTEyLCJkaWZmIjoiZG5PNHJheGxlYjkxbGFXIiwicG9rZWRleF9pZCI6IiNwb2tlZGV4X3AxIn1dLCJwbGF5ZXIyX2RlY2siOlt7InBva2Vtb25faW1nIjoiaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL1Bva2VBUEkvc3ByaXRlcy9tYXN0ZXIvc3ByaXRlcy9wb2tlbW9uLzczMS5wbmciLCJwb2tlbW9uX25hbWUiOiJwaWtpcGVrIiwicG9rZW1vbl9pZCI6NzMxLCJwb2tlbW9uX3hwIjo1MywiZGlmZiI6Ijhvb1RSZmxKM0JGTFNmdCIsInBva2VkZXhfaWQiOiIjcG9rZWRleF9wMiJ9XX0=",
        ];
        $real_result = $class->trade($data);

        $expected_result = true;

        $this->assertSame($expected_result, $real_result);
    }

    public function testTradePokemon_invalidTradeData_ShouldBeFalse()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid trade data");

        $class = new Trade();
        $data = [
            "player1" => "TestPlayer1",
            "player2" => "TestPlayer2",
            "trade_data" => "json_invalido_irmao"
        ];
        $class->trade($data);
    }

    public function testTradePokemon_invalidDataSet_ShouldBeFalse()
    {
        $this->expectException(InvalidDataSetException::class);
        $this->expectExceptionMessage("Faltam argumentos na requisição");

        $class = new Trade();
        $data = [
            "player1" => "TestPlayer1",
            "player2" => "TestPlayer2", /* Trade data removed :D */
        ];
        $class->trade($data);
    }
}
