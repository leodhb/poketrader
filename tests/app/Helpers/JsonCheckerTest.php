<?php

use Helpers\JsonChecker;

class JsonCheckerTest extends \PHPUnit\Framework\TestCase
{
    public function testJsonVerification_ShouldBeTrue()
    {
        $real_result = JsonChecker::isValid("{\"player1_deck\":[{\"pokemon_img\":\"https:\/\/raw.githubusercontent.com\/PokeAPI\/sprites\/master\/sprites\/pokemon\/25.png\",\"pokemon_name\":\"pikachu\",\"pokemon_id\":25,\"pokemon_xp\":112,\"diff\":\"dnO4raxleb91laW\",\"pokedex_id\":\"#pokedex_p1\"}],\"player2_deck\":[{\"pokemon_img\":\"https:\/\/raw.githubusercontent.com\/PokeAPI\/sprites\/master\/sprites\/pokemon\/731.png\",\"pokemon_name\":\"pikipek\",\"pokemon_id\":731,\"pokemon_xp\":53,\"diff\":\"8ooTRflJ3BFLSft\",\"pokedex_id\":\"#pokedex_p2\"}]}");
        $expected_result = true;
        $this->assertSame($expected_result, $real_result);
    }

    public function testJsonVerification_ShouldBeFalse()
    {
        $real_result = JsonChecker::isValid("dude that's not a json");
        $expected_result = false;
        $this->assertSame($expected_result, $real_result);
    }

    public function testBase64JsonVerification_ShouldBeTrue()
    {
        $real_result = JsonChecker::isValid(base64_decode("eyJwbGF5ZXIxX2RlY2siOlt7InBva2Vtb25faW1nIjoiaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL1Bva2VBUEkvc3ByaXRlcy9tYXN0ZXIvc3ByaXRlcy9wb2tlbW9uLzI1LnBuZyIsInBva2Vtb25fbmFtZSI6InBpa2FjaHUiLCJwb2tlbW9uX2lkIjoyNSwicG9rZW1vbl94cCI6MTEyLCJkaWZmIjoiZG5PNHJheGxlYjkxbGFXIiwicG9rZWRleF9pZCI6IiNwb2tlZGV4X3AxIn1dLCJwbGF5ZXIyX2RlY2siOlt7InBva2Vtb25faW1nIjoiaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL1Bva2VBUEkvc3ByaXRlcy9tYXN0ZXIvc3ByaXRlcy9wb2tlbW9uLzczMS5wbmciLCJwb2tlbW9uX25hbWUiOiJwaWtpcGVrIiwicG9rZW1vbl9pZCI6NzMxLCJwb2tlbW9uX3hwIjo1MywiZGlmZiI6Ijhvb1RSZmxKM0JGTFNmdCIsInBva2VkZXhfaWQiOiIjcG9rZWRleF9wMiJ9XX0="));
        $expected_result = true;
        $this->assertSame($expected_result, $real_result);
    }

    public function testBase64JsonVerification_ShouldBeFalse()
    {
        $real_result = JsonChecker::isValid(base64_decode("Y29tL1Bva2VBUEkvc3ByaXRlcy9tYXN0ZXIvc3ByaXRlcy9wb2tlbW9uLzI1LnBuZyIsInBva2Vtb25fbmFtZSI6InBpa2FjaHUiLCJwb2tlbW9uX2lkIjoyNSwicG9rZW1vbl94cCI6MTEyLCJkaWZmIjoiZG5PNHJheGxlYjkxbGFXIiwicG9rZWRleF9pZCI6IiNwb2tlZGV4X3AxIn1dLCJwbGF5ZXIyX2RlY2siOlt7InBva2Vtb25faW1nIjoiaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL1Bva2VBUEkvc3ByaXRlcy9tYXN0ZXIvc3ByaXRlcy9wb2tlbW9uLzczMS5wbmciLCJwb2tlbW9uX25hbWUiOiJwaWtpcGVrIiwicG9rZW1vbl9pZCI6NzMxLCJwb2tlbW9uX3hwIjo1MywiZGlmZiI6Ijh"));
        $expected_result = false;
        $this->assertSame($expected_result, $real_result);
    }


}
