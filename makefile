# http://www.gnu.org/software/make/manual/make.html
# http://linuxlib.ru/prog/make_379_manual.html


# Директории
DIRS = log cache


# Ложные цели
.PHONY := build dirs cc test optimize clean update dev


# Сборка проекта (Default)
build: cc
	php ./symfony doctrine:build --all-classes
	@echo


# Очистка
clean:
	mv ./config/databases.yml ../
	git clean -fdx
	mv ../databases.yml ./config/
	@echo

cc: dirs
	php ./symfony cc
	@echo


# Ребилд DEV
dev: cc build
	php ./symfony doctrine:drop-db --no-confirmation --env=dev
	php ./symfony doctrine:create-db --env=dev
	php ./symfony doctrine:migrate --env=dev
	php ./symfony doctrine:data-load --env=dev
	@echo


# Deploy
update: cc optimize

optimize: dirs
	php ./symfony project:optimize frontend
	@echo


# Тесты
test: build
	php ./symfony doctrine:drop-db --no-confirmation --env=test
	php ./symfony doctrine:create-db --env=test
	php ./symfony doctrine:migrate --env=test
	@echo
	-phpunit --configuration ./test/phpunit.xml ./test/AllTests.php
	@echo


# Директории
$(DIRS):
	# foreach dir name
	mkdir -p $@

dirs: $(DIRS)
	-chmod 0777 $(DIRS)
	@echo
