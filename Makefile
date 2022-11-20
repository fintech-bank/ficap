.PHONY: helpers
helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -F
	php artisan ide-helper:meta
