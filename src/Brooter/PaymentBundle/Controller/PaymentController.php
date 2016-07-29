<?php

namespace Brooter\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonDecode;

class PaymentController extends Controller
{

    public function preparePaypalExpressCheckoutPaymentAction(Request $request)
    {

        

        $gatewayName = 'paypal_payment_gateway';

        $storage = $this->get('payum')->getStorage('Brooter\PaymentBundle\Entity\Payment');

        /** @var \Brooter\PaymentBundle\Entity\Payment $details */
        $details = $storage->create();
        $details['PAYMENTREQUEST_0_CURRENCYCODE'] = 'USD';
        $details['PAYMENTREQUEST_0_AMT'] = 1.23;
        $storage->update($details);

        $captureToken = $this->get('payum')->getTokenFactory()->createCaptureToken(
            $gatewayName,
            $details,
            'brooter_payment_done' // the route to redirect after capture;
        );

        return $this->redirect($captureToken->getTargetUrl());
    }
    public function captureDoneAction(Request $request)
    {
        $token = $this->get('payum')->getHttpRequestVerifier()->verify($request);

        $identity = $token->getDetails();
        $model = $this->get('payum')->getStorage($identity->getClass())->find($identity);

        $gateway = $this->get('payum')->getGateway($token->getGatewayName());

        // you can invalidate the token. The url could not be requested any more.
        // $this->get('payum')->getHttpRequestVerifier()->invalidate($token);

        // Once you have token you can get the model from the storage directly.
        //$identity = $token->getDetails();
        //$details = $payum->getStorage($identity->getClass())->find($identity);

        // or Payum can fetch the model for you while executing a request (Preferred).
        $gateway->execute($status = new GetHumanStatus($token));
        $details = $status->getFirstModel();

        // you have order and payment status
        // so you can do whatever you want for example you can just print status and payment details.







        echo "<br/>";
        echo "<br/>";



        if($status->getValue()=='captured')
        {
            return $this->redirectToRoute('brooter_payment_successful');
        }
        else
        {
            return $this->redirectToRoute('brooter_payment_cancel');
        }
//        return new JsonResponse(array(
//            'status' => $status->getValue(),
//            'details' => iterator_to_array($details),
//            )
//        );
    }
    public function successfulAction(Request $request)
    {
        echo "Success full Payment made. Chal ab ghar ja.";
        die;
    }

    public function cancelAction(Request $request)
    {
        echo "abe payment to de jaa";
        die;
    }


}
