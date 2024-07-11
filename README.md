# Tortoise Travels 🐢

**Backstory:**
Once upon a time in the peaceful land of Terra Turtlia, there lived a tortoise named Timmy who dreamed of exploring beyond the familiar shores of his home. Timmy had always been curious about the vast world that lay beyond, filled with mysterious lands, hidden treasures, and ancient secrets. One day, he stumbled upon a mystical scroll that promised to guide him through the most challenging terrains, but only if he could decode its commands.

With your help, Timmy can embark on this grand adventure. By inputting simple commands, you can direct Timmy across the Cartesian grid, helping him navigate through forests, cross rivers, and climb mountains. Each successful journey brings Timmy closer to uncovering the greatest secrets of Terra Turtlia and becoming the most renowned traveler in the tortoise world.

**Why Use Tortoise Travels?**
- **Captivating Adventure:** Embark on an exciting journey with Timmy as he explores new lands and uncovers ancient secrets.
- **User-Friendly:** Simple input commands make it easy for anyone to guide Timmy on his travels.
- **Educational and Fun:** Learn programming basics and improve your problem-solving skills in an enjoyable way.
- **Immersive Storyline:** Get lost in the enchanting tale of Timmy’s travels and be part of his legendary adventure.

Join Timmy in Tortoise Travels and help him become the greatest explorer Terra Turtlia has ever known!

## Getting Started
### Using Symfony server
1. Run `symfony serve` to start the symfony built in server
2. Access your website at http://127.0.0.1:8000

### Using Docker
1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d --wait` to set up and start a fresh Symfony project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## Features

* Production, development and CI ready
* Just 1 service by default
* Blazing-fast performance thanks to [the worker mode of FrankenPHP](https://github.com/dunglas/frankenphp/blob/main/docs/worker.md) (automatically enabled in prod mode)
* [Installation of extra Docker Compose services](docs/extra-services.md) with Symfony Flex
* Automatic HTTPS (in dev and prod)
* HTTP/3 and [Early Hints](https://symfony.com/blog/new-in-symfony-6-3-early-hints) support
* Real-time messaging thanks to a built-in [Mercure hub](https://symfony.com/doc/current/mercure.html)
* [Vulcain](https://vulcain.rocks) support
* Native [XDebug](docs/xdebug.md) integration
* Super-readable configuration
