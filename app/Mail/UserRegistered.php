<?php
    
    namespace App\Mail;
    
    use App\Models\User;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    
    class UserRegistered extends Mailable
    {
        use Queueable, SerializesModels;
        
        protected User $user; // Propiedad protegida
        
        /**
         * Create a new message instance.
         */
        public function __construct(User $user)
        {
            $this->user = $user;
        }
        
        /**
         * Build the message.
         */
        public function build()
        {
            return $this->subject('Nuevo usuario registrado')
              ->view('emails.user_registered')
              ->with([
                'user' => $this->user, // Pasamos los datos a la vista
              ]);
        }
    }