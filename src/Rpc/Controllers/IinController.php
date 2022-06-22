<?php

namespace ZnKaz\Iin\Rpc\Controllers;

use ZnCore\Domain\Entity\Helpers\EntityHelper;
use ZnKaz\Iin\Domain\Helpers\IinParser;
use ZnLib\Rpc\Domain\Entities\RpcRequestEntity;
use ZnLib\Rpc\Domain\Entities\RpcResponseEntity;

class IinController
{

    public function getInfo(RpcRequestEntity $requestEntity): RpcResponseEntity
    {
        $code = $requestEntity->getParamItem('code');
        $entity = IinParser::parse($code);
        $response = new RpcResponseEntity();
        $response->setResult(EntityHelper::toArray($entity, true));
        return $response;
    }
}
