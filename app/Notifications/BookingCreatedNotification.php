<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $template = EmailTemplate::where('id', 4)->first();

        $this->booking->load(['properties', 'users']);
        $content = $template->body;
        $content = str_replace('{property_name}', $this->booking->properties->name ?? 'N/A', $content);
        $content = str_replace('{user_name}', $this->booking->users->first_name . ' ' . $this->booking->users->last_name ?? 'N/A', $content);
        $content = str_replace('{total_guest}', $this->booking->guest ?? 'N/A', $content);
        $content = str_replace('{total_night}', $this->booking->total_night ?? 'N/A', $content);
        $content = str_replace('{start_date}', date('M d, Y', strtotime($this->booking->start_date)) ?? 'N/A', $content);

        // Replace booking detail link placeholder
        $bookingDetailUrl = url('/admin/bookings/edit/' . $this->booking->id);
        $detailLink = '<a href="' . $bookingDetailUrl . '" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px;">Click here to view the Booking in detail</a>';
        $content = str_replace('{booking_detail_link}', $detailLink, $content);

        $processedTemplate = (object)[
            'subject' => $template->subject,
            'content' => $content
        ];

        return (new MailMessage)
            ->subject($template->subject)
            ->view('emails.template', [
                'template' => $processedTemplate
            ]);
    }
}
