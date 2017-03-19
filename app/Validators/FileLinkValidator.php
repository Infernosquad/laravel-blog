<?php

namespace App\Validators;

class FileLinkValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $isValid = false;

        $ch = curl_init($value);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 200){
            $allowedContentTypes = [
                'image/jpeg'
            ];

            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

            if(in_array($contentType,$allowedContentTypes)){
                $isValid = true;
            }
        }

        curl_close($ch);

        return $isValid;
    }
}