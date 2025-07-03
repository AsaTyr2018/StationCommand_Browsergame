# StationCommand Browser Game Skeleton

This repository contains the initial framework for **Station Command**, a browser-based sci-fi strategy game. It provides a simple PHP structure with a tick-based event loop and modular agents.

## Requirements

- PHP 8.x

## Installation

1. Install dependencies using Composer:
   ```bash
   composer install
   ```
2. Start the PHP built-in server:
   ```bash
   php -S localhost:8000 -t public
   ```
3. Open `http://localhost:8000` in your browser.

## User Interface

The default page now displays a simple overlay layout built with Tailwind CSS:

- Top bar shows resources and finances.
- Left sidebar lists station modules.
- The center area provides a station overview.
- Right sidebar contains defense and security information.

## Project Structure

- `public/` &mdash; Entry point of the application.
- `src/Core/` &mdash; Core framework classes such as the `Kernel` and `AgentInterface`.
- `src/Modules/` &mdash; Place for game modules. An example module is provided.

The framework follows a service-oriented MVC style where each domain (agent) encapsulates its logic and communicates via defined interfaces.
