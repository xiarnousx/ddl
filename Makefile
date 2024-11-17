# make up
up:
	@chmod +x ./bash/up.sh
	@./bash/up.sh

# make down
down:
	@chmod +x ./bash/down.sh
	@./bash/down.sh

# make sh svc=web
sh:
	@chmod +x ./bash/web.sh
	@./bash/$(svc).sh

# make logs svc=web
# make logs svc=db
# make logs svc=phpmyadmin
logs:
	@docker compose logs -f $(svc)

ps:
	@chmod +x ./bash/ps.sh
	@./bash/ps.sh
