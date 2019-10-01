<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Payment;
use Cart;

class NewProductCreate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */



    public function __construct()
    {
       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $userId = auth()->user()->id;
        $costumerName = auth()->user()->name;
        $cartContent = Cart::session($userId)->getContent();
        foreach ($cartContent as $item ) {
            $name = $item->name;
            $price = $item->price;
            $quantity = $item->quantity;
        }
        return (new MailMessage)
                    ->line('Konsumatori me emrin  '. $costumerName  .' ka blere  '. $name .' me qmim '.$price . ' sasia eshte ' .$quantity  )
                    ->action('DigitalStore Notification' , url('/'))
                    ->line('Falemiderit qe po e perdorni aplikacionin tone');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
