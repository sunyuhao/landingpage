<?php
namespace Wunderman\ArvatoBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\RequestException;


class ArvatoProvider
{
    private $container;
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @return string
     */
    public function sendInactifs($a, $b, $c)
    {    	

    		$base_url =  $this->container->getParameter("arvato_base_url_dev");

            try {
                /** @var Client $client */
                $client = new Client ([
                    'verify' => false,
                    'base_uri' => $base_url,
                ]);
                $options = [
                    'headers'=> ['Accept' => 'application/json'],
                ];
                $response = $client->request('GET',
                    'GetVerifCompte'
                    .'?LastName='.strtoupper($a)
                    .'&CardNum='.$b
                    .'&ZipCodeBase='.$c,
                    $options);

                $body = $response->getBody();
                $result =json_decode($body);

                $returnInfos= $result -> ReturnInfos;
                $returnInfo = $returnInfos[0] -> ReturnInfo;
                $err        = $returnInfos[0] -> Err;
                $email      = $result -> Email;
                $optinEmail = $result -> AgreeEmail;
                $customerId = $result -> CustomerId;
                $ifNumber = $a;
            } catch (ClientException $e) {
                $returnInfo = 99;
                $err        = "";
                $email      = "";
                $optinEmail = "";
                $customerId = "";
                $ifNumber = "";
            }catch (ServerException $e) {
                $returnInfo = 99;
                $err        = "";
                $email      = "";
                $optinEmail = "";
                $customerId = "";
                $ifNumber   = "";
            } catch (RequestException $e) {
                $returnInfo = 99;
                $err        = "";
                $email      = "";
                $optinEmail = "";
                $customerId = "";
                $ifNumber   = "";
            }

        //CALL api send $number return result
            if ($returnInfo != 2)
            {
                if($returnInfo == 1 )
                {
                    return true;
                }
                elseif($returnInfo == 0 )
                {
                    //not exist
                    return  "USER_Not_Exist";
                }
                elseif($returnInfo == 99 )
                {
                	//WS KO
                	return  "WS_KO";
                }else{
                	return  "WS_KO";
                }
            }
            elseif($returnInfo == 2)
            {
                if($err != ""){
                    // erreur sur la valeur du champ nom
                    return "verify_err_".$err;
                }else{
            	return  "WS_KO";
            	}       
            }else{
            	return  "WS_KO";
            }       	
    }

}
