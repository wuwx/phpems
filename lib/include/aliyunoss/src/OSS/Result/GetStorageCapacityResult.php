<?php

/*
 * This file is part of the phpems/phpems.
 *
 * (c) oiuv <i@oiuv.cn>
 *
 * 项目维护：oiuv(QQ:7300637) | 定制服务：火眼(QQ:278768688)
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace OSS\Result;

use OSS\Core\OssException;

/**
 * Class AclResult  GetBucketAcl interface returns the result class, encapsulated
 * The returned xml data is parsed.
 */
class GetStorageCapacityResult extends Result
{
    /**
     * Parse data from response.
     *
     * @throws OssException
     *
     * @return string
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        if (empty($content)) {
            throw new OssException('body is null');
        }
        $xml = simplexml_load_string($content);
        if (isset($xml->StorageCapacity)) {
            return intval($xml->StorageCapacity);
        }

        throw new OssException('xml format exception');
    }
}
