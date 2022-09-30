import LaravelEcho from 'laravel-echo';

const PusherJS = require('pusher-js');

const client = new PusherJS(
    process.env.NEXT_PUBLIC_PUSHER_APP_KEY,
    {
        wsHost: process.env.NEXT_PUBLIC_PUSHER_HOST,
        wsPort: process.env.NEXT_PUBLIC_PUSHER_PORT,
        forceTLS: false,
        encrypted: true,
        disableStats: true,
        enabledTransports: ['ws', 'wss'],
    }
);

const Echo = new LaravelEcho({
    broadcaster: 'pusher',
    client,
});

export default Echo
