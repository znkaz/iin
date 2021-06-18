<?php

namespace ZnCore\Base\Tests\Unit;

use ZnKaz\Base\Domain\Entities\IndividualEntity;
use ZnKaz\Base\Domain\Entities\JuridicalEntity;
use ZnKaz\Base\Domain\Exceptions\BadDateException;
use ZnKaz\Base\Domain\Exceptions\BadTypeException;
use ZnKaz\Base\Domain\Helpers\IinParser;
use ZnTool\Test\Base\BaseTest;

final class ValidateTest extends BaseTest
{

    public function testIndividualSuccess()
    {
        IinParser::parse('770712345674');
        IinParser::parse('921104356789');
        
        $entity = IinParser::parse('870620312341');
        $this->assertInstanceOf(IndividualEntity::class, $entity);
    }

    public function testIndividualBadCheckSum()
    {
        $this->expectException(\Exception::class);
        IinParser::parse('770712345671');
    }

    public function testIndividualBadDateMonth()
    {
        $this->expectException(BadDateException::class);
        IinParser::parse('772712345672');
    }

    public function testBadType()
    {
        $this->expectException(BadTypeException::class);
        IinParser::parse('770772345671');
    }

    public function testJuridicalSuccess()
    {
        IinParser::parse('090440002978');
        IinParser::parse('000140001813');
        IinParser::parse('961240001036');
        IinParser::parse('961240001016');
        IinParser::parse('970240000890');

        $entity = IinParser::parse('050340004626');
        $this->assertInstanceOf(JuridicalEntity::class, $entity);
    }

    public function testJuridicalBadCheckSum()
    {
        $this->expectException(\Exception::class);
        IinParser::parse('090440002971');
    }
}
