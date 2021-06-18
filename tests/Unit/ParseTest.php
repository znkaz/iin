<?php

namespace ZnCore\Base\Tests\Unit;

use ZnKaz\Base\Domain\Entities\IndividualEntity;
use ZnKaz\Base\Domain\Entities\JuridicalEntity;
use ZnKaz\Base\Domain\Enums\JuridicalPartEnum;
use ZnKaz\Base\Domain\Enums\JuridicalTypeEnum;
use ZnKaz\Base\Domain\Enums\SexEnum;
use ZnKaz\Base\Domain\Helpers\IinParser;
use ZnTool\Test\Base\BaseTest;

final class ParseTest extends BaseTest
{

    public function testIndividualSuccess()
    {
        /** @var IndividualEntity $entity */
        $entity = IinParser::parse('870620312341');
        $this->assertInstanceOf(IndividualEntity::class, $entity);

        $this->assertEquals(SexEnum::MALE, $entity->getSex());
        $this->assertEquals(3, $entity->getCentury());
        $this->assertEquals('870620312341', $entity->getValue());
        $this->assertEquals(1234, $entity->getSerialNumber());
        $this->assertEquals(1, $entity->getCheckSum());

        $this->assertEquals(1987, $entity->getBirthday()->getYear());
        $this->assertEquals(87, $entity->getBirthday()->getDecade());
        $this->assertEquals(6, $entity->getBirthday()->getMonth());
        $this->assertEquals(20, $entity->getBirthday()->getDay());
        $this->assertEquals(1900, $entity->getBirthday()->getEpoch());
    }

    public function testJuridicalSuccess()
    {
        /** @var JuridicalEntity $entity */
        $entity = IinParser::parse('050340004626');
        $this->assertInstanceOf(JuridicalEntity::class, $entity);

        $this->assertEquals(JuridicalTypeEnum::INDIVIDUAL_RESIDENT, $entity->getType());
        $this->assertEquals(JuridicalPartEnum::HEAD, $entity->getPart());
        $this->assertEquals('050340004626', $entity->getValue());
        $this->assertEquals(462, $entity->getSerialNumber());
        $this->assertEquals(6, $entity->getCheckSum());

        $this->assertEquals(5, $entity->getRegistrationDate()->getYear());
        $this->assertEquals(5, $entity->getRegistrationDate()->getDecade());
        $this->assertEquals(3, $entity->getRegistrationDate()->getMonth());
        $this->assertEquals(1, $entity->getRegistrationDate()->getDay());
        $this->assertEquals(0, $entity->getRegistrationDate()->getEpoch());

    }
}
