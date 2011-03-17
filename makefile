# http://www.gnu.org/software/make/manual/make.html
# http://linuxlib.ru/prog/make_379_manual.html


# Директории
DIRS = log cache


# Ложные цели
.PHONY := dirs cc test optimize clean update



# Сборка проекта (Default)
build: cc
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


# Deploy
update: cc optimize

optimize: dirs
	php ./symfony project:optimize frontend
	@echo


# Тесты
test: build
	-phpunit --configuration ./test/phpunit.xml ./test/AllTests.php
	@echo


# Директории
$(DIRS):
	# foreach dir name
	mkdir -p $@

dirs: $(DIRS)
	-chmod 0777 $(DIRS)
	@echo
