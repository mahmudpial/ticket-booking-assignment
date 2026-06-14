# 🎟️ Real-Time Ticket Booking Notification System

A full-stack application demonstrating real-time event broadcasting using **Laravel** on the backend and **Pusher WebSockets** on the frontend. Whenever a ticket is booked, the client portal receives an instant push notification — no page refresh required.

---

## ✨ Features

| Feature | Description |
|---|---|
| ⚡ Real-Time Broadcasting | WebSocket integration via Pusher pushes events from server to client instantly |
| 🏛️ Decoupled Architecture | Clean separation between the Laravel API backend and the static HTML frontend |
| 🔄 Synchronous Queue | `QUEUE_CONNECTION=sync` ensures events are dispatched immediately during development |
| 🔍 Debug Logging | Pusher client-side logging enabled for connection status and event tracking in the browser console |

---

## 📁 Project Structure

```text
real-time-ticket-booking/
├── backend/          # Laravel 11+ Application — API & Event Broadcaster
└── frontend/         # Vanilla HTML + JavaScript — Pusher WebSocket Listener
```

---

## 🛠️ Installation & Setup

### Prerequisites

- PHP `>= 8.2`
- Composer
- A [Pusher](https://pusher.com/) account with an active app (free tier works)
- Node.js / VS Code with Live Server (for the frontend)

---

### 1. Backend Setup (Laravel)

**Step 1** — Navigate into the backend directory:

```bash
cd backend
```

**Step 2** — Install PHP dependencies:

```bash
composer install
```

**Step 3** — Create the environment file from the example template:

```bash
cp .env.example .env
```

**Step 4** — Open `.env` and configure your Pusher credentials:

```env
BROADCAST_CONNECTION=pusher
QUEUE_CONNECTION=sync

PUSHER_APP_ID="YOUR_PUSHER_APP_ID"
PUSHER_APP_KEY="YOUR_PUSHER_APP_KEY"
PUSHER_APP_SECRET="YOUR_PUSHER_APP_SECRET"
PUSHER_APP_CLUSTER="YOUR_PUSHER_CLUSTER"
```

> ⚠️ You can find these values in your Pusher dashboard under **App Keys**.

**Step 5** — Clear the config cache to apply the new `.env` values:

```bash
php artisan optimize:clear
```

**Step 6** — Start the local development server:

```bash
php artisan serve --port=8001
```

The backend will be available at: `http://127.0.0.1:8001`

---

### 2. Frontend Setup (Booking Portal)

**Step 1** — Navigate to the `frontend/` directory and open `index.html`.

**Step 2** — Locate the Pusher initialization block and update it with your actual credentials:

```JavaScript
var pusher = new Pusher('YOUR_PUSHER_APP_KEY', {
    cluster: 'YOUR_PUSHER_CLUSTER'
});
```

**Step 3** — Serve `index.html` using a local web server. The recommended method is the **Live Server** extension in VS Code.

The frontend portal will be available at: `http://127.0.0.1:5500`

---

## 🧪 Testing the Real-Time Flow

Follow these steps to verify the end-to-end broadcast:

1. **Open the frontend portal** at `http://127.0.0.1:5500/index.html` in your browser.

2. **Open Developer Tools** (`F12` → Console tab). Confirm that Pusher connects successfully — you should see the state transition:
   ```
   connecting → connected
   ```

3. **Trigger a booking event** by visiting the backend endpoint in a new tab:
   ```
   http://127.0.0.1:8001/ticket-booking
   ```

4. **Switch back to the portal tab.** A real-time notification will appear instantly — no page refresh needed.

---

## ⚙️ Environment Variables Reference

| Variable | Description |
|---|---|
| `BROADCAST_CONNECTION` | Set to `pusher` to enable Pusher broadcasting |
| `QUEUE_CONNECTION` | Set to `sync` for synchronous event dispatch during development |
| `PUSHER_APP_ID` | Your Pusher application ID |
| `PUSHER_APP_KEY` | Your Pusher application key (used on both backend and frontend) |
| `PUSHER_APP_SECRET` | Your Pusher application secret (backend only) |
| `PUSHER_APP_CLUSTER` | Your Pusher cluster region (e.g., `ap2`, `mt1`) |

---

## 🧰 Tech Stack

**Backend**
- [Laravel 11+](https://laravel.com/) — PHP framework for API and event broadcasting
- [Laravel Broadcasting](https://laravel.com/docs/broadcasting) — Built-in event broadcast system
- [Pusher PHP SDK](https://github.com/pusher/pusher-http-php) — Server-side Pusher integration

**Frontend**
- Vanilla HTML & JavaScript — Lightweight, dependency-free portal
- [Pusher JS](https://github.com/pusher/pusher-js) — Client-side WebSocket listener

---

## 👤 Developer

**Pial Mahmud**
Full-Stack Software Engineer — Laravel & Vue.js Specialist

- 🌐 Portfolio: [portfolio-and-blog-app-fontend.vercel.app](https://portfolio-and-blog-app-fontend.vercel.app)
- 💻 GitHub: [github.com/mahmudpial](https://github.com/mahmudpial)
- 📧 Email: [pialmahmud80@gmail.com](mailto:pialmahmud80@gmail.com)

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
