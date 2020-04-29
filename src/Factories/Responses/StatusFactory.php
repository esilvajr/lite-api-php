<?php

namespace Arquivei\LiteApi\Sdk\Factories\Responses;

use Arquivei\LiteApi\Sdk\Responses\Http\Status as HttpStatus;
use Arquivei\LiteApi\Sdk\Responses\Status;

class StatusFactory
{
    public function createFromArray(array $httpResponse): Status {

        if ($httpResponse['status']['code'] == 200) {

            $nfeSucessfullyResponse = new Status(new Status\IsSuccess());

            $nfeSucessfullyResponse->setStatus(
                (new HttpStatus())
                    ->setCode($httpResponse['status']['code'])->setMessage($httpResponse['status']['message'])
            );

            $nfeSucessfullyResponse->getResponse()->setAccessKey($httpResponse['data']['access_key']);
            $nfeSucessfullyResponse->getResponse()->setStatus($httpResponse['data']['status']);

            return $nfeSucessfullyResponse;
        }

        $nfeErrorResponse = new Status(new Status\IsError());

        $nfeErrorResponse->setStatus(
            (new HttpStatus())
                ->setCode($httpResponse['status']['code'])->setMessage($httpResponse['status']['message'])
        );
        $nfeErrorResponse->getResponse()->setError($httpResponse['errors']);

        return $nfeErrorResponse;
    }
}
