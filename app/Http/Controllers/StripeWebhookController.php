<?php

namespace App\Http\Controllers;

use App\Models\BookingPaymentInfo;
use Illuminate\Http\Request;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Events\WebhookReceived;
use Illuminate\Support\Str;
use Laravel\Cashier\Http\Controllers\WebhookController;

class StripeWebhookController extends WebhookController
{
    /**
     * Handle incoming webhooks from Stripe.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function handleWebhook(Request $request)
    {
        // Decode the JSON payload from the request
        $payload = json_decode($request->getContent(), true);

        // Generate the method name based on the event type
        $method = 'handle' . Str::studly(str_replace('.', '_', $payload['type']));

        // Dispatch the WebhookReceived event
        WebhookReceived::dispatch($payload);

        // Check if the method exists and call it
        if (method_exists($this, $method)) {
            $this->setMaxNetworkRetries();
            $response = $this->{$method}($payload['data']['object']);

            // Dispatch the WebhookHandled event
            WebhookHandled::dispatch($payload);

            return $response;
        }

        // If the method does not exist, handle it as a missing method
        return $this->missingMethod($payload);
    }

    /**
     * Handle the completion of a Checkout Session.
     *
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    protected function handleCheckoutSessionCompleted($data)
    {
        // Update the booking information for a completed Checkout Session
        $bookinginfo = BookingPaymentInfo::where('booking_id', $data['metadata']['bookingid']);
        $bookinginfo->update([
            'payment_intent_id' => $data['payment_intent'],
            'status' => $data['status'],
            'updated_at' => now(),
        ]);
    }

    /**
     * Handle the expiration of a Checkout Session.
     *
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    protected function handleCheckoutSessionExpired($data)
    {
        // Update the booking information for an expired Checkout Session
        $bookinginfo = BookingPaymentInfo::where('booking_id', $data['metadata']['bookingid']);
        $bookinginfo->update([
            'payment_intent_id' => $data['payment_intent'],
            'status' => $data['status'],
            'updated_at' => now(),
        ]);
    }

}
