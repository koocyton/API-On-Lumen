<?php
/**
 * Created by IntelliJ IDEA.
 * User: henry
 * Date: 2017/12/22
 * Time: 下午11:35
 */
namespace App\Utils;

class RSAHelper
{
  // 私钥签名
  public static function PrivateSign($originalString, $privateKeyString) {
    $privateContent = self::formatPrivateKeyString($privateKeyString);
    $privateKey = openssl_get_privatekey($privateContent);
    $sign = "";
    openssl_sign($originalString, $sign, $privateKey);
    openssl_free_key($privateKey);
    // 最终的签名
    return base64_encode($sign);
  }

  // 公钥验签
  public static function PublicVerifySign($originalData, $sign, $publicKeyString)
  {
    $publicContent = self::formatPublicKeyString($publicKeyString);
    $publicKey = openssl_get_publickey($publicContent);
    $result = (bool)openssl_verify($originalData, base64_decode($sign), $publicKey);
    openssl_free_key($publicKey);
    return $result;
  }

  // 格式化私钥字符串
  public static function formatPrivateKeyString($privateKeyString) {
    return self::appendFlags($privateKeyString, 0);
  }

  // 格式化公钥字符串
  public static function formatPublicKeyString($publicKeyString) {
    return self::appendFlags($publicKeyString, 1);
  }

  private static function appendFlags($keyString, $isPublic = true) {
    $content = "";
    for($ii=0; $ii<100; $ii++) {
      $section = @substr($keyString, $ii*64, 64);
      if (empty($section)) {
        break;
      }
      $content .= $section . "\n";
    }

    if ($isPublic) {
      return "-----BEGIN PUBLIC KEY-----\n" . $content . "-----END PUBLIC KEY-----";
    }
    else {
      return "-----BEGIN PRIVATE KEY-----\n" . $content . "-----END PRIVATE KEY-----";
    }
  }
}