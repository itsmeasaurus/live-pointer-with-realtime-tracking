# Real-Time Cursor Tracking Application

This Laravel application enables real-time cursor tracking across multiple clients using Laravel Broadcasting, the Reverb server, and Whisper for seamless client-to-client connections. Users can view each other's cursor movements on their screens in real-time, facilitating interactive online experiences.

## Features

- Real-time cursor movement broadcasting.
- Client-to-client connections using Whisper.

## Prerequisites

Before setting up the project, ensure you have the following installed:
- PHP >= 7.3
- Laravel Broadcasting
- Laravel Reverb
- Laravel Echo

## Installation

1. **Clone the repository and Initialize the project**
   ```bash
   git clone https://github.com/itsmeasaurus/live-pointer-with-realtime-tracking.git
   cd live-pointer-with-realtime-tracking
   composer install
   npm install
   cp .env.example .env
   php artisan migrate
   php artisan reverb:start (in one terminal)
   npm run dev (in another terminal)

2. **Register and L**
   ```bash
   Create accounts and ready to see.
