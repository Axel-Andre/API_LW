# Configuration
.PHONY: archive install help config upload
.DEFAULT_goal= help


# Parameters
archive = archive.zip
webdir = /var/www/api
ssh = ssh pierredesforges@35.231.13.167

help: ## Affiche l'aide
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-10s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

archive: ## Create an archive of this project
	rm -rf $(archive)
	git archive master -o $(archive)

install: ## Make basic install
	composer install
	make config
	php artisan key:generate
	php artisan passport:keys
	php artisan migrate
	php artisan db:seed
	npm install
	npm run build

config: ## Create and edit configuration files
	rm -f .env
	cp .env.example .env
	nano .env

upload: ## Upload le projet sur le serveur et lance l'installation
	make archive
	rsync -a $(archive) -e $(ssh):~/
	$(ssh) "mkdir /var/www"
	$(ssh) "mkdir $(webdir)"
	$(ssh) "unzip -o $(archive) -d $(webdir)/"
	$(ssh) "$(webdir)/make install"
	$(ssh) "rm $(archive)"

ssh: ## Connect to ssh
	$(ssh)
