<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;

abstract class AfterResponse
{
    public static function get(ActionSchemaInterface $actionSchema, object|array|null $objectResponse)
    {
        if (is_null($actionSchema->afterIndex)) {
            return null;
        }
        
        $propertyChain = explode('.', $actionSchema->afterIndex);
  
        $after = $objectResponse;
       
        foreach ($propertyChain as $property) {
            if (is_null($new = @$after->{$property})) {
                return null;
            }

            $after = $new;
        }
      
        return $after;
    }
}
